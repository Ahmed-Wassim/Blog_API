<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreCommentRequest;
use App\Models\Post;
use Illuminate\Http\Request;
use App\Traits\ResponseTrait;

class CommentController extends Controller
{
    use ResponseTrait;

    public function store(StoreCommentRequest $post)
    {
        $post->comments()->create([
            'user_id' => auth()->user()->id,
            'body' => request('body'),
        ]);

        return $this->sendSuccess($post->comments, 201);
    }

    public function destroy(Post $post, $comment)
    {
        $comment = $post->comments()->find($comment);
        $comment->delete();
        return $this->sendSuccess($comment, 200);
    }
}
