<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $user = User::all();
        return view('MasterUser.index')->with('user', $user);
    }
    public function store(Request $request)
    {
        
        $input = $request->all();
        $existingUser = User::where('email', $input['email'])->first();
        if ($existingUser) {
            return redirect('/User-Index')->with('error', 'Email sudah terdaftar');
        }
        User::create([
            'name' => $input['name'],
            'email' => $input['email'],
            'role' => $input['role'],
            'password' => Hash::make($request['password']),

        ]);

        return redirect('/User-Index')->with('success', 'Data berhasil ditambahkan');
    }
   

    public function update(Request $request, $id)
    {
        try {
            $user = $request->validate([
                'name' => 'required',
                'email' => 'required',
                'role' => 'required',
                'password' => 'required',


            ]);
            
            $input = $request->all();
            $input['password'] = Hash::make($input['password']);
            User::find($request->id)->update($input);
          
            return redirect('/User-Index')->with('success', 'Password Berhasil Di Update');
        } catch (\Throwable $th) {
            return redirect('/User-Index')->with('error', 'Password Gagal Di Update');
        }
    }

    public function destroy($id)
    {

        $u = User::findOrFail($id);
        $u->delete();

        return redirect()->back()->with('success', 'Data berhasil dihapus');
    }
}
