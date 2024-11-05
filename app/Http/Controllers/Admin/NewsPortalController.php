<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class NewsPortalController extends Controller
{
    public function index(){
        // mengirim data ke halaman new portal
        return view('admin.galeri-photo.newsportals.index', [
            'pageTitle' => 'News Portal',
            'newsportals' => Post::with('contents')->get()
        ]);
    }
}             