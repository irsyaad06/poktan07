@extends('admin.layout')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <h1 style="margin: 0;">Kelola Kegiatan</h1>
        <a href="{{ route('kegiatan.create') }}" class="btn btn-primary"><i class="ph-bold ph-plus"></i> Tambah Kegiatan</a>
    </div>

    <div class="admin-card">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Judul Kegiatan</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($kegiatans as $kegiatan)
                <tr>
                    <td>{{ $kegiatan->id }}</td>
                    <td style="font-weight: 500;">{{ $kegiatan->title }}</td>
                    <td>{{ $kegiatan->date }}</td>
                    <td>
                        <a href="{{ route('kegiatan.edit', $kegiatan->id) }}" class="btn btn-outline" style="padding: 0.25rem 0.5rem; font-size: 0.8rem;">Ubah</a>
                        <form action="{{ route('kegiatan.destroy', $kegiatan->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline" style="padding: 0.25rem 0.5rem; font-size: 0.8rem; color: #b91c1c; border-color: #fca5a5;" onclick="return confirm('Hapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if(count($kegiatans) === 0)
            <p style="text-align: center; color: var(--text-muted); padding: 1rem;">Belum ada data kegiatan.</p>
        @endif
    </div>
@endsection
