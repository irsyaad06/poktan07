@extends('admin.layout')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <h1 style="margin: 0;">Kelola Mitra Agen</h1>
        <a href="{{ route('agen.create') }}" class="btn btn-primary"><i class="ph-bold ph-plus"></i> Tambah Mitra Agen</a>
    </div>

    <div class="admin-card">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Agen</th>
                    <th>Tipe</th>
                    <th>Kontak</th>
                    <th>Cakupan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($agens as $agen)
                <tr>
                    <td>{{ $agen->id }}</td>
                    <td style="font-weight: 500;">{{ $agen->name }}</td>
                    <td>{{ $agen->type }}</td>
                    <td>{{ $agen->contact }}</td>
                    <td>{{ $agen->coverage }}</td>
                    <td>
                        <a href="{{ route('agen.edit', $agen->id) }}" class="btn btn-outline" style="padding: 0.25rem 0.5rem; font-size: 0.8rem;">Ubah</a>
                        <form action="{{ route('agen.destroy', $agen->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline" style="padding: 0.25rem 0.5rem; font-size: 0.8rem; color: #b91c1c; border-color: #fca5a5;" onclick="return confirm('Hapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if(count($agens) === 0)
            <p style="text-align: center; color: var(--text-muted); padding: 1rem;">Belum ada data mitra agen.</p>
        @endif
    </div>
@endsection
