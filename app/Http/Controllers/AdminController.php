<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Hash;

class AdminController extends Controller
{
    public function list()
    {
        $data['header_title'] = 'Admin List';
        return view('admin.admin.list', $data);
    }

    public function add()
    {
        $data['header_title'] = 'Add New Officer';
        return view('admin.admin.add', $data);
    }

    public function insert(Request $request)
    {
        // dd($request->all());
        // Validate the form
        // $request->validate([
        //     'name' => ['required','string','max:255'],
        //     'email' => ['required','string','email','max:255','unique:users'],
        //     'password' => ['required','string','min:8','confirmed'],
        // ]);

        // Create a new user
        $user = new User;
        $user->name = trim($request->name);
        $user->email = trim($request->email);
        $user->password = Hash::make($request->password);
        $user->user_type = 2; // Assuming 1 for admin
        $user->save();

        // Redirect to the admin list page
        return redirect('admin/admin/list')->with('success', 'Officer added successfully');
    }
}
