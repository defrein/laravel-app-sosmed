<?php

namespace App\Http\Controllers\Admin;

use App\Models\Idea;
use App\Models\User;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Gate;

class CommentController extends Controller
{

    public function index(){
        $comments = Comment::latest()->paginate(5);

        return view("admin.comments.index", compact("comments"));
    }

    public function destroy(Comment $comment){
        $comment->delete();

        return redirect()->route("admin.comments.index")->with("success","Comment deleted successfully!");
    }
}
