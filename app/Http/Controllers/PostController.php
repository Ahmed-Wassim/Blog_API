<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;

class PostController extends Controller
{
    use ResponseTrait;
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $posts = Post::with('user', 'category', 'tags')->filter(request(['search']))->latest()->get();
        return $this->sendResponse($posts, 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePostRequest $request)
    {
        $post = Post::create($request->validated());
        $post->tags()->attach($request->tags);
        return $this->sendSuccess($post, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Post $post)
    {
        return $this->sendResponse($post, 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePostRequest $request, Post $post)
    {
        $post->update($request->validated());
        $post->tags()->sync($request->tags);
        return $this->sendSuccess($post, 201);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function archive(Post $post)
    {
        $post->delete();
        return $this->sendSuccess($post, 201);
    }

    public function destroy(Post $post)
    {
        $post->tags()->detach();
        $post->forceDelete();
        return $this->sendSuccess($post, 201);
    }

    public function restore(Request $request, string $slug)
    {
        $post = Post::onlyTrashed()->where('slug', $slug)->firstOrFail();
        $post->restore();
        return $this->sendSuccess($post, 201);
    }

    public function Archived()
    {
        $posts = Post::onlyTrashed()->get();
        return $this->sendResponse($posts, 200);
    }
}
