<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Services\SupabaseStorageService;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $perPage = 10;
        $query = Post::select('id', 'title', 'thumbnail', 'status', 'published_at', 'created_at');

        if ($search = $request->query('search')) {
            $query->where('title', 'like', "%{$search}%");
        }

        $paginator = $query->orderBy('created_at', 'desc')->paginate($perPage)->withQueryString();
        $posts = $paginator->items();
        $pagination = [
            'count' => $paginator->count(),
            'total' => $paginator->total(),
            'next'  => $paginator->nextPageUrl(),
            'prev'  => $paginator->previousPageUrl(),
            'current_page' => $paginator->currentPage(),
            'last_page' => $paginator->lastPage(),
        ];

        // Jika permintaan AJAX, kembalikan partial
        if ($request->ajax()) {
            return view('admin.posts._table', compact('posts', 'pagination'));
        }

        return view('admin.posts.index', compact('posts', 'pagination'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.posts.form',[
            'isEdit'=>false,
            'supabaseApiKey' => env('SUPABASE_API_KEY')
        ]);
    }
    
    /**
     * Store a newly created resource in storage.
    */
    public function store(Request $request, SupabaseStorageService $storage)
    {

        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png|max:2048',
            'is_published' => 'string|in:true,false',
        ]);
        
        $post = new Post();
        $post->title = $request->title;
        $post->body = $request->body;
        
        if ($request->is_published === 'true') {
            $post->status = 'published';
            $post->published_at = now();
        } else {
            $post->status = 'draft';
        }
        
        if ($request->hasFile('thumbnail')) {
            $file = $request->file('thumbnail');
            $url = $storage->upload($file);
            $post->thumbnail = $url;
        }
        
        
        $post->save();
        
        return redirect()->route('admin.posts.index')->with('success', 'Post created successfully.');
    }


    
    /**
     * Display the specified resource.
    */
    public function show(string $id)
    {
        return view('admin.posts.show', [
            'post' => Post::findOrFail($id)
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $post = Post::findOrFail($id);
        return view('admin.posts.form', [
            'isEdit' => true,
            'supabaseApiKey' => env('SUPABASE_API_KEY'),
            'post' => $post
        ]);
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Post $post, SupabaseStorageService $storage)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'body' => 'required|string',
            'thumbnail' => 'nullable|image|mimes:jpg,jpeg,png,webp|max:2048',
            'is_published' => 'string|in:true,false',
        ]);
        
        $post->title = $request->title;
        $post->body = $request->body;
        $post->published_at = $request->published_at;
        
        $post->status = $request->is_published == 'true' ? 'published' : 'draft';
        
        if ($request->hasFile('thumbnail')) {
            // Hapus file lama jika ada
            if ($post->thumbnail) {
                try {
                    $storage->delete($post->thumbnail);
                } catch (\Exception $e) {
                    return redirect()->route('admin.posts.index')->with('error', 'Gagal menghapus thumbnail lama: ' . $e->getMessage());
                }
            }

            // Upload file baru
            $file = $request->file('thumbnail');
            $url = $storage->upload($file);
            $post->thumbnail = $url;
        }

        $post->save();

        return redirect()->route('admin.posts.index')->with('success', 'Post updated successfully.');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Post $post, SupabaseStorageService $storage)
    {

        if ($post->thumbnail) {
            try {
                $storage->delete($post->thumbnail);
            } catch (\Exception $e) {
                return redirect()->route('admin.posts.index')->with('error', 'Gagal menghapus thumbnail: ' . $e->getMessage());
            }
        }

        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Post dan thumbnail berhasil dihapus.');
    }

    public function toggle(Post $post)
    {
        $post->status = $post->status === 'published' ? 'draft' : 'published';
        if ($post->status === 'published') {
            $post->published_at = now();
        } else {
            $post->published_at = null;
        }
        $post->save();

        return back();
    }

}
