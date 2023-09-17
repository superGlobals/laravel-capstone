<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HahaController extends Controller
{
    public function haha()
    {
        $user = Auth::user();

        if (!$user) {
            return to_route('login');
        }

        if ($user->role === 'admin') {
            return to_route('admin.dashboard');
        }

        if ($user->role === 'teacher') {
            return to_route('teacher.dashboard');
        }
    }
}
