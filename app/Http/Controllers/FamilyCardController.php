<?php

namespace App\Http\Controllers;

use App\Models\FamilyCard;
use App\Models\MasterRw;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class FamilyCardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['familycards'] = FamilyCard::paginate(5);
        return view('admin.familycard.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['rws'] = MasterRw::all();
        return view('admin.familycard.create', $data);
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
            'rt_id' => 'required',
            'number' => 'required|unique:family_cards',
            'head_of_family' => 'required',
            'address' => 'required',
            'print_date' => 'required',
            'zip' => 'required',
        ]);
        FamilyCard::create($data);
        return redirect()->route('familycard')->with('success', 'Data berhasil ditambah');
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
        $data['familycard'] = FamilyCard::find($id);
        return view('admin.familycard.edit', $data);
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
            'rt_id' => 'required',
            'head_of_family' => 'required',
            'address' => 'required',
            'print_date' => 'required',
            'zip' => 'required',
        ]);
        FamilyCard::where('id', $id)->update($data);
        return redirect()->route('familycard')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        FamilyCard::destroy($request->id);
        return redirect()->route('familycard')->with('success', 'Data berhasil dihapus');
    }

    public function import()
    {
        $data['rws'] = MasterRw::all();
        return view('admin.familycard.import', $data);
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
        FamilyCard::insertOrIgnore($arr);
        return redirect()->route('familycard')->with('success', 'Upload data selesai');
    }
}
