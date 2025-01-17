<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\{Post, Like};
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        
    return view('user.dashboard', [
        'pageTitle' => 'Dashboard-user',
        'posts'     => Post::with(['image', 'likes'])->get()
    ]);
}
}
