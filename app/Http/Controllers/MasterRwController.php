<?php

namespace App\Http\Controllers;

use App\Models\MasterRw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MasterRwController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['rws'] = MasterRw::paginate(5);
        return view('admin.rw.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.rw.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'number' => 'required|unique:master_rws',
            'pic' => 'required',
            'phone' => 'required',
        ]);
        $data['email'] = 'ketuarw' . $request->number . '@waringinjaya.id';
        $data['password'] = Hash::make('12345678');
        MasterRw::create($data);
        return redirect()->route('rw')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['rw'] = MasterRw::find($id);
        return view('admin.rw.edit', $data);
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
        $data = $request->validate([
            'pic' => 'required',
            'phone' => 'required',
        ]);
        MasterRw::where('id', $id)->update($data);
        return redirect()->route('rw')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        MasterRw::destroy($request->id);
        return redirect()->route('rw')->with('success', 'Data berhasil dihapus');
    }

    public function import()
    {
        return view('admin.rw.import');
    }

    public function template_excel()
    {
        return response()->download(public_path('template_excel/Template_Data_Rw.xls'));
    }

    public function processImport(Request $request)
    {
        $request->validate([
            'rows' => 'required'
        ]);
        $rows = explode("\n", $request->rows);
        $arr = [];
        foreach ($rows as $row) {
            $exp = explode("\t", $row);
            if (count($exp) != 4) continue;
            $arr[] = [
                'number' => trim($exp[0]),
                'pic' => trim($exp[1]),
                'phone' => trim($exp[2]),
                'email' => trim($exp[3]),
                'password' => Hash::make('12345678'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
        }
        MasterRw::insertOrIgnore($arr);
        return redirect()->route('rw')->with('success', 'Upload data selesai');
    }
}
