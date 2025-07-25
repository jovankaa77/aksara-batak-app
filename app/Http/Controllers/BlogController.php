<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index(Request $request)
    {
        $perPage = 8;

        $query = Post::published()
            ->select('id', 'title', 'slug', 'thumbnail', 'published_at');

        if ($search = $request->query('search')) {
            $query->where('title', 'like', "%{$search}%");
        }

        $paginator = $query->latest('published_at')->paginate($perPage)->withQueryString();
        $posts = $paginator->items();
        $pagination = [
            'count' => $paginator->count(),
            'total' => $paginator->total(),
            'next'  => $paginator->nextPageUrl(),
            'prev'  => $paginator->previousPageUrl(),
            'current_page' => $paginator->currentPage(),
            'last_page' => $paginator->lastPage(),
        ];

        if ($request->ajax()) {
            // Kembalikan hanya partial HTML
            return view('blog._grid', compact('posts', 'pagination'))->render();
        }

        return view('blog.index', compact('posts', 'pagination'));
    }


    public function show($slug)
    {
        $post = Post::published()->where('slug', $slug)->firstOrFail();
        return view('blog.show', compact('post'));
    }
}
