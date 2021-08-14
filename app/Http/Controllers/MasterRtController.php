<?php

namespace App\Http\Controllers;

use App\Models\MasterRt;
use App\Models\MasterRw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class MasterRtController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['rts'] = MasterRt::with('rw')->paginate(5);
        return view('admin.rt.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['rws'] = MasterRw::all();
        return view('admin.rt.create', $data);
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
            'rw_id' => 'required',
            'number' => 'required|unique:master_rts',
            'pic' => 'required',
            'phone' => 'required',
        ]);
        $data['email'] = 'ketuart' . $request->number . '@waringinjaya.id';
        $data['password'] = Hash::make('12345678');
        MasterRt::create($data);
        return redirect()->route('rt')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['rws'] = MasterRw::all();
        $data['rt'] = MasterRt::find($id);
        return view('admin.rt.edit', $data);
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
            'rw_id' => 'required',
            'pic' => 'required',
            'phone' => 'required',
        ]);
        MasterRt::where('id', $id)->update($data);
        return redirect()->route('rt')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        MasterRt::destroy($request->id);
        return redirect()->route('rt')->with('success', 'Data berhasil dihapus');
    }

    public function import()
    {
        $data['rws'] = MasterRw::all();
        return view('admin.rt.import', $data);
    }

    public function template_excel()
    {
        return response()->download(public_path('template_excel/Template_Data_rt.xls'));
    }

    public function processImport(Request $request)
    {
        $request->validate([
            'rw_id' => 'required',
            'rows' => 'required',
        ]);
        $rows = explode("\n", $request->rows);
        $arr = [];
        foreach ($rows as $row) {
            $exp = explode("\t", $row);
            if (count($exp) != 4) continue;
            $arr[] = [
                'rw_id' => $request->rw_id,
                'number' => trim($exp[0]),
                'pic' => trim($exp[1]),
                'phone' => trim($exp[2]),
                'email' => trim($exp[3]),
                'password' => Hash::make('12345678'),
                'created_at' => date('Y-m-d H:i:s'),
                'updated_at' => date('Y-m-d H:i:s')
            ];
        }
        MasterRt::insertOrIgnore($arr);
        return redirect()->route('rt')->with('success', 'Upload data selesai');
    }
}
