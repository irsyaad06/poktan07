@extends('admin.layout')

@section('content')
<div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 2rem;">
    <h1 style="font-size: 1.5rem; font-weight: 600;">Persetujuan Akun</h1>
</div>

@if(session('success'))
    <div style="padding: 1rem; background: rgba(34, 197, 94, 0.1); color: var(--primary-dark); border-radius: var(--radius-md); border: 1px solid var(--primary-light); margin-bottom: 1.5rem;">
        <i class="ph-bold ph-check-circle"></i> {{ session('success') }}
    </div>
@endif

<div class="admin-card">
    <table class="table">
        <thead>
            <tr>
                <th>Nama Lengkap</th>
                <th>Email</th>
                <th>Tanggal Daftar</th>
                <th>Status</th>
                <th style="width: 250px;">Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($users as $user)
                <tr>
                    <td>{{ $user->name }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->created_at->format('d M Y') }}</td>
                    <td>
                        @if($user->is_approved)
                            <span style="display: inline-flex; align-items: center; gap: 0.3rem; padding: 0.4rem 0.75rem; border-radius: var(--radius-full); font-size: 0.75rem; font-weight: 600; background: rgba(34, 197, 94, 0.1); color: var(--primary-dark);">
                                <i class="ph-bold ph-check"></i> Disetujui
                            </span>
                        @else
                            <span style="display: inline-flex; align-items: center; gap: 0.3rem; padding: 0.4rem 0.75rem; border-radius: var(--radius-full); font-size: 0.75rem; font-weight: 600; background: rgba(239, 68, 68, 0.1); color: #b91c1c;">
                                <i class="ph-bold ph-clock"></i> Menunggu
                            </span>
                        @endif
                    </td>
                    <td>
                        <div style="display: flex; gap: 0.5rem;">
                            <form action="{{ route('users.update', $user->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                @if($user->is_approved)
                                    <input type="hidden" name="action" value="unapprove">
                                    <button type="submit" class="btn btn-outline" style="padding: 0.4rem 0.8rem;" title="Batalkan Persetujuan">
                                        <i class="ph-bold ph-x"></i> Batalkan
                                    </button>
                                @else
                                    <input type="hidden" name="action" value="approve">
                                    <button type="submit" class="btn btn-primary" style="padding: 0.4rem 0.8rem;" title="Setujui Akun">
                                        <i class="ph-bold ph-check"></i> Setujui
                                    </button>
                                @endif
                            </form>
                            
                            <form action="{{ route('users.destroy', $user->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus akun ini secara permanen?')">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger" style="padding: 0.4rem 0.8rem;">
                                    <i class="ph-bold ph-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" style="text-align: center; color: var(--text-muted); padding: 2rem;">
                        Belum ada data pendaftar.
                    </td>
                </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection
