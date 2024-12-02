<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class NewsPortalController extends Controller
{
    public function index(){
        // mengirim data ke halaman new portal
        return view('admin.newsportals.index', [
            'pageTitle' => 'News Portal',
            'newsportals' => Post::with('contents')->get()
        ]);
    }

    public function create() {
        // dd('rencana rencana dan rencana');
        return view('admin.newsportals.create', [
            'pageTitle' => 'Create News Portal',
            'newsportals' => Post::with('contents')->get()
        ]);
    }

    public function store(Request $request) {
        dd($request);
        /* $validate = $request->validate([
            'title'     => 'required|unique:posts,title', // Check for unique title
            'category'  => 'required',
            'desc'      => 'required',
            'images'    => 'required',
            'images.*'  => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'title.required' => 'Nama harus diisi',
            'title.unique' => 'Judul sudah ada, silakan gunakan judul lain', // Custom error message
            'desc.required' => 'Di isi ya sayang',
            'category.required' => 'Isi la panteg',
            'images.required' => 'Fotonya isi ya',
        ]);

        // Create post
        $post = Post::create([
            'title' => $validate['title'],
            'category' => $validate['category'],
            'desc' => $validate['desc'],
            'slug' => Str::slug($validate['title']),
            'user_id' => Auth::user()->id,
        ]); */

        
        return redirect()->route('admin-newsportal')->with('success', 'News portalz created successfully.');
    }
}             
