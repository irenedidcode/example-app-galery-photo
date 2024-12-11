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
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

use function Pest\Laravel\post;

class GaleriPhotoController extends Controller
{
    public function index() 
    {

        return view ('admin.galeri-photo.index',[
            'pageTitle' => 'Galeri-Photo',
            'listPost' => Post::with('image')->get(),
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
                    // $path = $file->store('image', 'public');

                    $originalName = $file->getClientOriginalName();

                    $uniqueName = time() . '_' . $originalName;

                    $path = $file->storeAs('image' , $uniqueName, 'public');

                    // Save file information to the database

                    Image::create([
                        'name' =>  $originalName,
                        'post_id' => $post->id,
                        'path' => $path,
                    ]);
                }
            }
        }
        
        return redirect()->route('admin-galeri-photo')->with('success', 'Post created successfully.');
    }
    
    public function edit(string $slug) {
        $post = Post::with('image')->where('slug', $slug)->first();
        
        return view('admin.galeri-photo.edit', [
            'pageTitle' => 'Edit Album',
            'post'      => $post,
            'images'    => $post->image,
            'listCategory' => Category::categories,
        ]);
        
    }

    public function updategaleri(request $request,Post $post)
    {
        // dd($request);
        //logic for update
        
        $checkBoxImage = Image::whereIn('id',$request->input('images') ?? [])->get();
        // dd($images);
        // melakukan pengecekan jika ada list chechbox image yang di hapus
        if ($checkBoxImage) {
            // melakukan looping untuk membongkar array checkBoxImage
            foreach ($checkBoxImage as $images) {
                // melakukan penghapusan file image di storage
    
                Storage::disk('public')->delete($images->path);
                // menghapus objek image dari table image
                $images->delete();
    
                dd('berhasil menghapus gambar yang di ceklis');
            }
        
        
        $validate = $request->validate([
            
            'title'     => 'required|unique:posts,title', // Check for unique title
            'category'  => 'required',
            'desc'      => 'required',
            'images'    => 'nullable',
            'images.*'  => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'title.required' => 'Nama harus diisi',
            'title.unique' => 'Judul sudah ada, silakan gunakan judul lain', // Custom error message
            'desc.required' => 'Di isi ya sayang',
            'category.required' => 'Isi la panteg',
            'images.required' => 'Fotonya isi ya',
        ]);
        
        $post->update([
            'title' => $validate['title'],
            'category' => $validate['category'],
            'desc' => $validate['desc'],
            'slug' => Str::slug($validate['title']),
            'user_id' => Auth::user()->id,
        ]);
        //menggambil request input image
        
        // jika ada request file images
        if ($request->hasFile('images')) {

            foreach ($request->file('images') as $file) {
                //membuat atau menyimpan file baru
                if ($file->isValid()) {
                    // mengambil nama original nama file image
                    
                    $originalName = $file->getClientOriginalName();
                    
                    // membuat nama file menjadi  unik
                    $uniqueName = time() . '_' . $originalName;
                    
                    $path = $file->storeAs('images', $uniqueName, 'public');

                    // menyimpan file ke storage disk
                    
                    Image::create([
                        'name' =>  $originalName,
                        'post_id' => $post->id,
                        'path' => $path,
                        ]);

                    return redirect(route('admin-galeri-photo', absolute:false));
                } else {
                    return redirect(route('admin-galeri-photo', absolute:false));
                }
            }
        }
        }
    } 


    public function show(Post $post) 
    {
        return view('admin.galeri-photo.show', [
            'pageTitle' => 'Show Galeri',
            'album'     =>  Post::where('id', $post->id)->with('image')->first(),
        ]);
    }

    public function update(Request $request) 
    {
        dd($request);
        //logic for update
        $validate = $request->validate([
            'title'     => 'required|unique:posts,title', // Check for unique title
            'category'  => 'required',
            'desc'      => 'required',
            'images'    => 'nullable',
            'images.*'  => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ], [
            'title.required' => 'Nama harus diisi',
            'title.unique' => 'Judul sudah ada, silakan gunakan judul lain', // Custom error message
            'desc.required' => 'Di isi ya sayang',
            'category.required' => 'Isi la panteg',
            'images.required' => 'Fotonya isi ya',
        ]);

        $post->update([
            'title' => $validate['title'],
            'category' => $validate['category'],
            'desc' => $validate['desc'],
            'slug' => Str::slug($validate['title']),
            'user_id' => Auth::user()->id,
        ]);
       dd($post);
    }

    public function destroy(Post $post)
    {

        $album = Post::with('image')->find($post->id);
        foreach ($album->image as $images) {
            // melakukan penghapusan file image di storage

            Storage::disk('public')->delete($images->path);
            // menghapus objek image dari table image
            $images->delete();
        }

        $post->delete();

        return redirect(route('admin-galeri-photo', absolute:false))->with('status', 'deleted-successfully');;
    }

}