<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function __construct()
    {
        $this->authorizeResource(Post::class);
    }
    public function index()
    {
        // if (request()->user()->cannot('viewAny', Post::class)) {
        //     return response()->json([
        //                 "message" => "forbidden"
        //             ], 403);
        //     // $this->authorize('viewAny', Post::class);
        // }
        return response()->json([
            "data" => Post::all()
        ]);
    }
    public function store()
    {
        // $this->authorize('create', Post::class);

        // if (!Gate::allows('create_post')) {
        //     return response()->json([
        //         "message" => "forbidden"
        //     ], 403);
        // }
        $post = Post::create(request()->all());
        return response()->json([
            "message" => "created"
        ]);
    }

    public function update(Post $post)
    {
        // if (!Gate::allows('update_post', $post)) {
        //     return response()->json([
        //         "message" => "forbidden"
        //     ], 403);
        // }
        // $this->authorize('update', $post);
        $post->update(request()->all());
        return response()->json([
            "message" => "updated"
        ]);
    }
    public function destroy(Post $post)
    {
        $post->delete();
    }
}
