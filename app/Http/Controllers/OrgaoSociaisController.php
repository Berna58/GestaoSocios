<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Role;

class OrgaoSociaisController extends Controller
{
    public function index()
    {
        $users = User::join('roles', 'users.role_id', '=', 'roles.id')
            ->where('roles.name', 'admin')
            ->get(['users.*']);

        return view('orgaossociais', ['users' => $users]);
    }
}
