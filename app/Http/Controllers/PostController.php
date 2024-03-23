<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class PostController extends Controller
{
    public function store()
    {
        if (! Gate::allows('create_post')) {
            return response()->json([
            "message" => "forbidden"
            ],403);
        }
        $post = Post::create(request()->all());
        return response()->json([
            "message" => "created"
        ]);
    }

    public function update($id)
    {
        $post = Post::find($id);
        if (! Gate::allows('update_post',$post)) {
            return response()->json([
            "message" => "forbidden"
            ],403);
        }
        $post->update(request()->all());
        return response()->json([
            "message" => "updated"
        ]);
    }
}
