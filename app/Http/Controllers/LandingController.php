<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index()
    {
        $data['posts'] = Post::where(['is_active' => true])->with('category')->paginate(10);
        return view('home', $data);
    }
}
