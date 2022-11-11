<?php

namespace App\Http\Controllers;

use App\Models\Source;
use App\Models\User;

class AdminController extends Controller
{
    public function profile(int $id)
    {
        $user = User::find($id);

        return view('manager.profile', ['user' => $user]);
    }
}
