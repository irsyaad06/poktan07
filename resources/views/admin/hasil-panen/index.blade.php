@extends('admin.layout')

@section('content')
    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
        <h1 style="margin: 0;">Kelola Hasil Panen</h1>
        <a href="{{ route('hasil-panen.create') }}" class="btn btn-primary"><i class="ph-bold ph-plus"></i> Tambah Hasil Panen</a>
    </div>

    <div class="admin-card">
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nama Produk</th>
                    <th>Petani</th>
                    <th>Tipe</th>
                    <th>Grade</th>
                    <th>Harga</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($hasilPanens as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td style="font-weight: 500;">{{ $item->name }}</td>
                    <td>{{ $item->petani->name ?? '-' }}</td>
                    <td>{{ $item->type }}</td>
                    <td>{{ $item->grade }}</td>
                    <td>{{ $item->price }}</td>
                    <td>
                        <a href="{{ route('hasil-panen.edit', $item->id) }}" class="btn btn-outline" style="padding: 0.25rem 0.5rem; font-size: 0.8rem;">Edit</a>
                        <form action="{{ route('hasil-panen.destroy', $item->id) }}" method="POST" style="display: inline-block;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-outline" style="padding: 0.25rem 0.5rem; font-size: 0.8rem; color: #b91c1c; border-color: #fca5a5;" onclick="return confirm('Hapus data ini?')">Hapus</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        @if(count($hasilPanens) === 0)
            <p style="text-align: center; color: var(--text-muted); padding: 1rem;">Belum ada data hasil panen.</p>
        @endif
    </div>
@endsection
