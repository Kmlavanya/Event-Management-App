<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;

class AdminController extends Controller
{
    public function index()
    {
        return view('admin');
    }

    // public function viewUsers()
    // {
    //     $users = User::where('role', 'user')->get();
    //     return view('admin.view-users', compact('users'));
    // }

    

    public function viewUsers(Request $request)
    {
        if ($request->ajax()) {
            $data = User::where('role', 'user')->select(['id', 'name', 'email', 'role']);
            return DataTables::of($data)
                ->addIndexColumn()
                ->make(true);
        }

        return view('admin.view-users');
    }
}

