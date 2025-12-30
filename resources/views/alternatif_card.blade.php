<div class="card">
    @php
        $fotoSrc = null;
        if (!empty($alternatif->foto_blob)) {
            $fotoSrc = 'data:image/jpeg;base64,' . base64_encode($alternatif->foto_blob);
        } elseif (!empty($alternatif->foto) && \Illuminate\Support\Facades\Storage::disk('public')->exists($alternatif->foto)) {
            $fotoSrc = asset('storage/' . $alternatif->foto);
        } else {
            $fotoSrc = asset('images/default-photo.svg');
        }
    @endphp
    <img src="{{ $fotoSrc }}" class="card-img-top img-fluid img-thumbnail rounded" alt="{{ $alternatif->nama_alternatif }}" style="height: 200px; object-fit: cover;" loading="lazy" width="400" height="200">
    <div class="card-body">
        <h5 class="card-title">{{ $alternatif->nama_alternatif }}</h5>
        <p class="card-text">Kode: {{ $alternatif->kode_alternatif }}</p>
        <a href="{{ route('alternatifs.show', $alternatif->id) }}" class="btn btn-primary mr-2">Detail</a>
        <a href="{{ route('alternatifs.edit', $alternatif->id) }}" class="btn btn-warning mr-2">Edit</a>
        <form action="{{ route('alternatifs.destroy', $alternatif->id) }}" method="POST" style="display: inline-block;">
            @csrf
            @method('DELETE')
            <button type="submit" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus alternatif ini?')">Hapus</button>
        </form>
    </div>
</div>
