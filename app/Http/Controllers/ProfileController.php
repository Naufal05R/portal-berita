<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use RealRashid\SweetAlert\Facades\Alert;

class ProfileController extends Controller
{
    public function editPassword()
    {
        return view('admin.profile.change-password');
    }

    public function updatePassword(Request $request)
    {
        $this->validate($request, [
            'current_password' => 'required|string',
            'password' => 'required|min:8|string',
            'confirmation_password' => 'required|min:8|string',
        ]);

        $currentPasswordStatus = Hash::check($request->current_password, auth()->user()->password);
        if ($currentPasswordStatus) {
            User::findOrFail(Auth::user()->id)->update([
                'password' => Hash::make($request->password)
            ]);
            return redirect()->back()->with([Alert::success('Success', 'Password Berhasil diupdate')]);
        } else {
            return redirect()->back()->with([Alert::error('Error', 'Password Salah')]);
        }
    }
}
