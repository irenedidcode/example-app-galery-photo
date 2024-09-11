<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Helpers\Category;

class GaleriPhotoController extends Controller
{
    public function index() 
    {

        // dd(Post::all());
        return view ('admin.galeri-photo.index',[
            'pageTitle' => 'Galeri-Photo',
            'listPost' => Post::all(),
        ]);
            
    }

    public function create() 
    {
        // dd('rencana rencana dan rencana');
        return view('admin.galeri-photo.create', [
            'pageTitle' => 'Create Galeri',
            'listCategory' => Category::categories
        ]);
    }

    public function store(Request $request) 
    {
        $validated = $request->validate([
            'title'      => 'required', 
            'desc'      => 'required', 
            'category'  => 'required',
            'images'     => 'required'
        ],[
            'title.required' => 'janlup isi woe',
            'desc.required' => 'isi woe',
            'images.required' => 'masukkin potonya'
        ]);

        $post = Post::create([
            'title' => $validated['title'],
            'desc' => $validated['desc'],
            'category' => $validated['category'],
            'user_id' => auth()->user()->id
        ]);

        
        return redirect(route('admin-galeri-photo', absolute: false));
        dd($post);
    }

    public function edit(string $postId) 
    {
        $post = Post::findOrfail($postId);
        dd('test masuk alamat', $post);
    }
}
