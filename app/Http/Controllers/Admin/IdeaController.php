<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use App\Http\Controllers\Controller;
use App\Models\Idea;
use Illuminate\Support\Facades\Gate;

class IdeaController extends Controller
{

    public function index(){
        $ideas = Idea::latest()->paginate(5);

        return view("admin.ideas.index", compact("ideas"));
    }
}
