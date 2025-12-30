<?php

namespace App\Jobs;

use App\Models\Alternatif;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use Illuminate\Support\Facades\Storage;

class ProcessAlternatifImage implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected int $alternatifId;

    /**
     * Create a new job instance.
     */
    public function __construct(int $alternatifId)
    {
        $this->alternatifId = $alternatifId;
    }

    /**
     * Execute the job.
     */
    public function handle(): void
    {
        $alternatif = Alternatif::find($this->alternatifId);
        if (!$alternatif || !$alternatif->foto) {
            return;
        }

        $disk = Storage::disk('public');
        if (!$disk->exists($alternatif->foto)) {
            return;
        }

        $path = $disk->path($alternatif->foto);
        $data = @file_get_contents($path);
        if ($data === false) {
            return;
        }

        // imagecreatefromstring supports jpeg/png/gif; skip svg/webp if unsupported
        $src = @imagecreatefromstring($data);
        if ($src === false) {
            return;
        }

        $srcW = imagesx($src);
        $srcH = imagesy($src);
        $max = 256; // target max dimension
        $scale = min($max / max(1, $srcW), $max / max(1, $srcH), 1);
        $newW = max(1, (int) floor($srcW * $scale));
        $newH = max(1, (int) floor($srcH * $scale));

        $dst = imagecreatetruecolor($newW, $newH);
        // Fill background white for formats with transparency when converting to JPEG
        $white = imagecolorallocate($dst, 255, 255, 255);
        imagefill($dst, 0, 0, $white);
        imagecopyresampled($dst, $src, 0, 0, 0, 0, $newW, $newH, $srcW, $srcH);

        ob_start();
        imagejpeg($dst, null, 80);
        $blob = ob_get_clean();

        imagedestroy($src);
        imagedestroy($dst);

        if ($blob !== false) {
            // Store small JPEG blob in DB
            $alternatif->foto_blob = $blob;
            $alternatif->save();
        }
    }
}
