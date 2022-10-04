<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\{
    Comment,
    User
};

class CommentController extends Controller
{
    protected $comment;
    protected $user;

    public function __construct(Comment $comment, User $user)
    {
        $this->comment = $comment;
        $this->user = $user;
    }

    public function index(Request $request, $userId)
    {
        if (!$user = $this->user->find($userId)){
            return redirect()->back();
        }

        $comments = $user->comments()
                            ->where('title', 'LIKE', "%{$request->search}%")
                            ->get();


        return view('users.comments.index', compact('user', 'comments'));
    }

    public function create($userId)
    {
        if (!$user = $this->user->find($userId)){
            return redirect()->back();
        }

        return view('users.comments.create', compact('user'));
    }

    public function store(Request $request, $userId)
    {
        if (!$user = $this->user->find($userId)){
            return redirect()->back();
        }

        $user->comments()->create([
            'title' => $request->title,
            'body' => $request->body,
            'visible' => isset($request->visible)
        ]);

        return redirect()->route('comments.index', $user->id);
    }

    public function edit($userId, $id)
    {
        if (!$comment = $this->comment->find($id)){
            return redirect()->back();
        }

        $user = $comment->user;

        return view('users.comments.edit', compact('user', 'comment'));
    }
}
