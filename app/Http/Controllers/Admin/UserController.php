<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Petani;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index()
    {
        $users = User::where('role', 'petani')->orderBy('created_at', 'desc')->get();
        return view('admin.users.index', compact('users'));
    }

    public function update(Request $request, User $user)
    {
        $action = $request->input('action');
        
        if ($action === 'approve') {
            $user->update(['is_approved' => true]);
            
            // Automatically create Petani profile if not exists
            if (!$user->petani) {
                Petani::create([
                    'user_id' => $user->id,
                    'name' => $user->name,
                    'role' => 'Anggota Tani',
                ]);
            }
            
            return back()->with('success', 'Akun berhasil disetujui.');
        } elseif ($action === 'unapprove') {
            $user->update(['is_approved' => false]);
            return back()->with('success', 'Persetujuan akun berhasil dibatalkan.');
        }
        
        return back();
    }
    
    public function destroy(User $user)
    {
        $user->delete();
        return back()->with('success', 'Akun berhasil dihapus.');
    }
}
