<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use CloudinaryLabs\CloudinaryLaravel\Facades\Cloudinary;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardPostController extends Controller
{
    public function index()
    {
        $posts = Post::latest()->paginate(10);
        $categories = Category::latest()->get();
        $tags = Tag::latest()->get();
        // dd($category->name);
        return view(
            'dashboard.posts.index',
            compact('posts', 'categories', 'tags')
        );
    }
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();
        return view('dashboard.posts.create', compact('categories', 'tags'));
    }
    public function store(Post $post)
    {
        // dd(request()->all());
        $newPost = request()->validate([
            'title' => ['required', 'max:255'],
            'body' => ['required', 'max:2000'],
            'thumbnail' => ['required', 'image', 'file'],
            'thumbnail_id' => ['nullable', 'string'],
            'category_id' => ['required', 'max:255', 'alpha_dash'],
            'tags' => ['required'],
        ]);
        if (request()->hasFile('thumbnail')) {
            $uploadedFile = Cloudinary::upload(
                request()
                    ->file('thumbnail')
                    ->getRealPath()
            );
            $thumbnail = $uploadedFile->getSecurePath();
            $thumbnail_public_id = $uploadedFile->getPublicId();
            // dd($thumbnail->getPublicId());
            // dd($uploadedFileUrl);
            // $thumbnail = request()
            //     ->file('thumbnail')
            //     ->getClientOriginalName();
            // $newPost['thumbnail'] = request()
            //     ->file('thumbnail')
            //     ->storeAs('thumbnails', $thumbnail, 'public');
            // $post->update($newPost);
        }
        $post = Post::create([
            'user_id' => auth()->id(),
            'title' => $newPost['title'],
            'body' => $newPost['body'],
            'thumbnail' => $thumbnail,
            'thumbnail_id' => $thumbnail_public_id,
            'category_id' => $newPost['category_id'],
        ]);
        // dd($post);
        $post->tags()->attach(request('tags'));
        return redirect(route('admin-posts'))->with(
            'msg',
            'Successfully Uploaded'
        );
    }
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $categories = Category::latest()->get();
        $tags = Tag::latest()->get();
        // dd($post->tags);
        return view(
            'dashboard.posts.edit',
            compact('post', 'categories', 'tags')
        );
    }
    public function update(Post $post, $id)
    {
        $post = Post::findOrFail($id);
        $newPost = request()->validate([
            'title' => ['max:255'],
            'body' => ['max:2000'],
            'thumbnail' => ['image', 'file'],
            'thumbnail_id' => ['nullable', 'string'],
            'category_id' => ['max:255', 'alpha_dash'],
            // 'tags' => ['']
        ]);
        if (request()->hasFile('thumbnail')) {
            $thumbnail = request()
                ->file('thumbnail')
                ->getClientOriginalName();
            $newPost['thumbnail'] = request()
                ->file('thumbnail')
                ->storeAs('thumbnails', $thumbnail, 'public');
            $post->update($newPost);
        }
        $post->update($newPost);
        // dd($post);
        $post->tags()->sync(request('tags'));
        return redirect(route('admin-posts'))->with(
            'msg',
            'Successfully Uploaded'
        );
    }
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        Cloudinary::destroy($post->thumbnail_id);
        $post->delete();
        return redirect(route('admin-posts'))->with(
            'delete',
            'Successfully Deleted'
        );
    }
}
