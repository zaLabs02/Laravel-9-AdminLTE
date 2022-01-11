<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function profile()
    {
        return view('page.admin.profile');
    }

    public function updateprofile(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:200|min:3',
            'email' => 'required|string|min:3|email',
            'password' => 'required|min:8|confirmed',
            'password_confirmation' => 'required|min:8',
            'user_image' => 'image|mimes:jpg,png,jpeg,gif,svg|max:1024'
        ]);

        $img_old = Auth::user()->user_image;
        $usr = User::findOrFail(Auth::user()->id);
        if ($request->file('user_image')) {
            # delete old img
            if ($img_old && file_exists(public_path().$img_old)) {
                unlink(public_path().$img_old);
            }
            $nama_gambar = time() . '_' . $request->file('user_image')->getClientOriginalName();
            $upload = $request->user_image->storeAs('public/admin/user_profile', $nama_gambar);
            $img_old = Storage::url($upload);
        }
        $usr->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'user_image' => $img_old
        ]);

        return redirect()->route('profile');
    }
}
