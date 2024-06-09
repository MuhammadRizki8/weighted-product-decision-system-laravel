<div class="card">
    <img src="{{ asset('storage/' . $alternatif->foto) }}" class="card-img-top img-fluid img-thumbnail rounded" alt="{{ $alternatif->nama_alternatif }}" style="height: 200px; object-fit: cover;">
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
