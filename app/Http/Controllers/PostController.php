<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'List Artikel';
        $data['uri'] = 'post';

        $data['rows'] = Post::with('category')->with('user')->paginate(5);
        $view = 'admin.post.index';
        return view($view, $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Artikel';
        $data['uri'] = 'post';
        $data['categories'] = Category::all();
        $view = 'admin.post.create';
        return view($view, $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $uri = 'post';

        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'slug' => 'required|unique:posts',
            'is_active' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif,svg|max:1024'
        ]);
        $nameFile = null;
        if ($request->image) $nameFile = $this->upload('post', $request->image);
        $data = [
            'category_id' => $request->category_id,
            'title' => $request->title,
            'slug' => $request->slug,
            'description' => $request->description,
            'is_active' => $request->is_active,
            'image' => $nameFile,
            'user_id' => auth()->user()->id
        ];
        Post::create($data);
        return redirect()->route($uri)->with('success', 'Data berhasil ditambah');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['title'] = 'Artikel';
        $data['uri'] = 'post';
        $data['categories'] = Category::all();
        $data['row'] = Post::find($id);

        $view = 'admin.post.edit';
        return view($view, $data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required',
            'title' => 'required',
            'is_active' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif,svg|max:1024'
        ]);
        $data = [
            'category_id' => $request->category_id,
            'title' => $request->title,
            'description' => $request->description,
            'is_active' => $request->is_active,
            'user_id' => auth()->user()->id
        ];
        if ($request->image) {
            $nameFile = $this->upload('post', $request->image);
            $data['image'] = $nameFile;
        }
        Post::where('id', $id)->update($data);
        return redirect()->route('post')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Post::destroy($request->id);
        return redirect()->route('post')->with('success', 'Data berhasil dihapus');
    }

    public function upload($path, $image)
    {
        if (!File::exists($path)) {
            File::makeDirectory($path);
        }
        $nameFile = time() . '.' . $image->extension();
        $image->move(public_path($path), $nameFile);
        return $nameFile;
    }
}
