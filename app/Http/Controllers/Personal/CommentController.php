<?php

namespace App\Http\Controllers\Personal;

use App\Http\Controllers\Controller;
use App\Http\Requests\Personal\Comment\UpdateRequest;
use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function index()
    {
        $comments = auth()->user()->comments()->paginate(10);
        return view('personal.comments.index', compact('comments'));
    }

    public function edit(Comment $comment)
    {
        return view('personal.comments.edit', compact('comment'));
    }

    public function update(UpdateRequest $request, Comment $comment)
    {
        $data = $request->validated();
        $comment->update($data);
        return redirect()->route('personal.comment.index');
    }

    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->route('personal.comment.index');
    }
}
