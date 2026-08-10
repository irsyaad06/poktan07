@extends('admin.layout')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <h1 style="margin: 0;">Kelola Data Petani</h1>
        <a href="{{ route('petani.create') }}" class="btn btn-primary"><i class="ph-bold ph-plus"></i> Tambah Petani</a>
    </div>

    <div class="admin-card">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama</th>
                    <th>Peran</th>
                    <th>Lokasi</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($petanis as $petani)
                <tr>
                    <td>{{ $petani->id }}</td>
                    <td style="font-weight: 500;">{{ $petani->name }}</td>
                    <td>{{ $petani->role }}</td>
                    <td>{{ $petani->location }}</td>
                    <td>
                        <a href="{{ route('petani.edit', $petani->id) }}" class="btn btn-outline" style="padding: 0.25rem 0.5rem; font-size: 0.8rem;">Ubah</a>
                        <form action="{{ route('petani.destroy', $petani->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline" style="padding: 0.25rem 0.5rem; font-size: 0.8rem; color: #b91c1c; border-color: #fca5a5;" onclick="return confirm('Hapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if(count($petanis) === 0)
            <p style="text-align: center; color: var(--text-muted); padding: 1rem;">Belum ada data petani.</p>
        @endif
    </div>
@endsection
