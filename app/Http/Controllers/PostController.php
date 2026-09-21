<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\Models\Category;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use App\Models\Post;
use Illuminate\Support\Facades\Storage;
use App\Http\Requests\PostCreateRequest;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       
        $posts = Post::latest()->simplePaginate(15);
        return view('post.index', [
         
            'posts'=>$posts,
            ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::get();
        return view('post.create', [
           'categories' => $categories,
        ] );
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PostCreateRequest $request)
    {
      
        $data = $request->validated();

        $image = $data['image'];
      //  unset($data['image']);

        $data['user_id'] = Auth::id();
        //slug generation от titile за по-красиви url
        $slug = Str::slug($data['title']);
        $originalSlug = $slug;
        $count = 1;
    //проверка има ли такъв слаг
        while (Post::where('slug', $slug)->exists()) {
            $slug = $originalSlug . '-' . $count++;
        }

        $data['slug'] = $slug;
    
        $imagePath = $image->store('posts', 'public');
        $data['image'] = $imagePath;

        Post::create($data);

        return redirect()->route('dashboard');

       
    }

    /**
     * Display the specified resource.
     */
    public function show($username, Post $post)
    {
        if ($post->user->username !== $username) {
            abort(404);
        }

        return view('post.show', [
            'post' => $post,
        ]);
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Post $post)
    {
        return view('post.edit', compact('post'));
    }
    /**
     * Update the specified reso.
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->validate([
            'title' => ['required', 'string', 'max:255'],
            'content' => ['required', 'string'],
            'image' => ['nullable', 'image', 'max:2048'],
        ]);

        if ($request->hasFile('image')) {

            if ($post->image) {
                Storage::disk('public')->delete($post->image);
            }

            $data['image'] = $request->file('image')->store('posts', 'public');
        }

        $post->update($data);

        return redirect()->route('post.show', [
            'username' => $post->user->username,
            'post' => $post->slug,
        ]);
    }
    /**
     
     */
    public function destroy(Post $post)
    {
        // (опционально) удаляем картинку с диска
        if ($post->image) {
            \Storage::disk('public')->delete($post->image);
        }

        // удаляем пост
        $post->delete();

        return redirect()->route('dashboard')
            ->with('success', 'Post deleted successfully');
    }
    public function clap(Post $post)
    {
        $user = auth()->user();

        $existing = $post->claps()->where('user_id', $user->id)->first();

        if ($existing) {
            $existing->delete();
        } else {
            $post->claps()->create([
                'user_id' => $user->id
            ]);
        }

        return back();
    }
    public function category(Category $category)
    {
        $posts = $category->posts()
            ->latest()->simplePaginate(5);

        return view('post.index', [
       'posts' => $posts,
        ]);
    }

}
