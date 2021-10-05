<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['title'] = 'List Banner';
        $data['uri'] = 'banner';
        $data['rows'] = Banner::paginate(5);
        $view = 'admin.banner.index';
        return view($view, $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['title'] = 'Banner';
        $data['uri'] = 'banner';
        $view = 'admin.banner.create';
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
        $uri = 'banner';

        $request->validate([
            'name' => 'required',
            'is_active' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif,svg|max:1024'
        ]);
        $nameFile = null;
        if ($request->image) $nameFile = $this->upload('banner', $request->image);
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'is_active' => $request->is_active,
            'image' => $nameFile
        ];
        Banner::create($data);
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
        $data['title'] = 'Banner';
        $data['uri'] = 'banner';
        $data['row'] = Banner::find($id);

        $view = 'admin.banner.edit';
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
            'name' => 'required',
            'is_active' => 'required',
            'image' => 'mimes:jpeg,jpg,png,gif,svg|max:1024'
        ]);
        $data = [
            'name' => $request->name,
            'description' => $request->description,
            'is_active' => $request->is_active,
        ];
        if ($request->image) {
            $nameFile = $this->upload('banner', $request->image);
            $data['image'] = $nameFile;
        }
        Banner::where('id', $id)->update($data);
        return redirect()->route('banner')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Banner::destroy($request->id);
        return redirect()->route('banner')->with('success', 'Data berhasil dihapus');
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
