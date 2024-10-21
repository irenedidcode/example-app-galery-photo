<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Image;
use App\Helpers\Category;
use Illuminate\Container\Attributes\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class GaleriPhotoController extends Controller
{
    public function index() {
        // menampilkan isi data post dan images

        // dd(Post::all());
        // Post::all();

        return view ('admin.galeri-photo.index',[
            'pageTitle' => 'Galeri-Photo',
            'listPost' => Post::with('image')->get(),
        ]);

    }

    public function create() {
        // dd('rencana rencana dan rencana');
        return view('admin.galeri-photo.create', [
            'pageTitle' => 'Create Galeri',
            'listCategory' => Category::categories
        ]);
    }

    public function store(Request $request) {
        $validate = $request->validate([
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
        ]);
    
        // Handle image uploads
        if ($validate['images']) {
            foreach ($request->file('images') as $file) {
                if ($file->isValid()) {
                    // Store the file and get the path
                    $path = $file->store('image', 'public');
                    
                    // Save file information to the database
                    Image::create([
                        'post_id' => $post->id,
                        'path' => $path,
                    ]);
                }
            }
        }
    
        return redirect()->route('admin-galeri-photo')->with('success', 'Post created successfully.');
    }
    
    public function edit (string $slug) {
        $post = Post::where('slug', $slug)->first();
        dd($post);
    }
        // $post = Post::findOrfail($slug);
        // mengvembalikan ke halaman viewe admin-galeri-photo
        // return view('admin.galeri-photo.edit', [
        //     'pageTitle' => 'Edit Album',
        //     'post'      => $post,
        //     'listCategory' => Category::categories

        // ]);

        // return redirect(route('admin-galeri-photo', absolute: false));
        // dd($post);
        // return redirect();


    public function delete() {
        dd('anj gua dilupain',);
    }
}