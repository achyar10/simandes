<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MasterRt;
use App\Models\Post;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class HookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getRts(Request $request)
    {
        $data = MasterRt::where('rw_id', $request->id)
            ->select('id', 'number', 'pic', 'rw_id')
            ->get();
        return response()->json($data, 200);
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Post::class, 'slug', $request->title);
        return response()->json($slug, 200);
    }
}
