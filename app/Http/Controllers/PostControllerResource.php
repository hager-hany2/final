<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\New_;
use  App\Events\NewNotification;

class PostControllerResource extends Controller
{
    /**
     * Display a listing of the resource.
     */

    public function __construct()
    {
        $this->middleware('auth');  //Because not everyone is allowed to make a comment

    }


    public function index()
    {
        $posts = Post::with(['comment', function ($e) {
            $e->select('id', 'post_id', 'comment');
        }])->get();
        return view('Post', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        Comment::create([
            'post_id' => $request->post_id,
            'user_id' => $request->user_id,
            'comment' => $request->comment,

        ]);
        $data = [
            'user_id' => Auth::id(),
            'user_id' => Auth::user()->name,
            'comment' => $request->post_info,
            'post_id' => $request->post_id,

        ];
        event(new  NewNotification($data));
        return redirect()->back()->with('message', 'the post created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
