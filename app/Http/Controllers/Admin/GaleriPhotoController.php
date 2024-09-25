<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Helpers\Category;
use Illuminate\Support\Facades\Auth;

class GaleriPhotoController extends Controller
{
    public function index() {

        // dd(Post::all());
        return view ('admin.galeri-photo.index',[
            'pageTitle' => 'Galeri-Photo',
            'listPost' => Post::all(),
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
            'title'     =>'required',
            'category'  =>'required',
            'descr'=>'required'

                ],[
                    'title.required' => 'Nama harus diisi',
                    'desc.required' => 'di isi ya sayang',
                    'category.required' => 'isi la panteg'
                ]);
       // dd($validated);
        $post = post:: create([
            'title' => $validate['title'],
            'category' => $validate['category'],
            'desc' =>$validate['desc'],
            'user_id' => Auth::user()->id,

        ]);
        return redirect(route('admin-galeri-photo', absolute: false));
        dd($post);
        return redirect();



    }
    public function edit (string $postId) {
        $post = Post::findOrfail($postId);

        // mengvembalikan ke halaman viewe admin-galeri-photo
        return view('admin.galeri-photo.edit', [
            'pageTitle' => 'Edit Album',
            'post'      => $post,
            'listCategory' => Category::categories

        ]);



        //dd('bansat kau', $post);
    }

    public function delete() {
        dd('anj gua dilupain',);
    }
}
