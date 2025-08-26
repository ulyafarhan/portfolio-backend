<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::with('user')->latest()->paginate(10);
        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        return view('admin.posts.create');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:posts',
            'excerpt' => 'required|string|max:500',
            'body' => 'required|string',
            'cover_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);

        $imagePath = $request->file('cover_image')->store('posts', 'public');

        $request->user()->posts()->create([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'excerpt' => $validated['excerpt'],
            'body' => $validated['body'],
            'cover_image_url' => $imagePath,
            'published_at' => now(), // Atau null jika ingin sistem draft
        ]);

        return redirect()->route('admin.posts.index')->with('success', 'Blog post created successfully.');
    }

    public function edit(Post $post)
    {
        return view('admin.posts.edit', compact('post'));
    }

    public function update(Request $request, Post $post)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:255|unique:posts,title,' . $post->id,
            'excerpt' => 'required|string|max:500',
            'body' => 'required|string',
            'cover_image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg,webp|max:2048',
        ]);
        
        $imagePath = $post->cover_image_url;
        if ($request->hasFile('cover_image')) {
            Storage::disk('public')->delete($post->cover_image_url);
            $imagePath = $request->file('cover_image')->store('posts', 'public');
        }

        $post->update([
            'title' => $validated['title'],
            'slug' => Str::slug($validated['title']),
            'excerpt' => $validated['excerpt'],
            'body' => $validated['body'],
            'cover_image_url' => $imagePath,
        ]);

        return redirect()->route('admin.posts.index')->with('success', 'Blog post updated successfully.');
    }

    public function destroy(Post $post)
    {
        Storage::disk('public')->delete($post->cover_image_url);
        $post->delete();

        return redirect()->route('admin.posts.index')->with('success', 'Blog post deleted successfully.');
    }
}