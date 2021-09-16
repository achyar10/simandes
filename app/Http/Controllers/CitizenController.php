<?php

namespace App\Http\Controllers;

use App\Models\Citizen;
use App\Models\Education;
use App\Models\FamilyCard;
use App\Models\MasterRw;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class CitizenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['citizens'] = Citizen::paginate(5);
        return view('admin.citizen.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['familycards'] = FamilyCard::all();
        $data['rws'] = MasterRw::all();
        $data['education'] = Education::all();
        $data['works'] = Work::all();
        return view('admin.citizen.create', $data);
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
            'nik' => 'required|unique:citizens',
            'fullname' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'pob' => 'required',
            'religion' => 'required',
            'relationship' => 'required',
            'status_married' => 'required',
            'work_id' => 'required',
            'education_id' => 'required',
        ]);
        $data['blood_type'] = $request->blood_type;
        $data['family_id'] = $request->family_id;
        $data['address'] = $request->address;
        $data['password'] = Hash::make(date('dmY', strtotime($request->dob)));
        Citizen::create($data);
        return redirect()->route('citizen')->with('success', 'Data berhasil ditambah');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data['familycards'] = FamilyCard::all();
        $data['rws'] = MasterRw::all();
        $data['education'] = Education::all();
        $data['works'] = Work::all();
        $data['citizen'] = Citizen::find($id);
        return view('admin.citizen.edit', $data);
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
            'fullname' => 'required',
            'gender' => 'required',
            'dob' => 'required',
            'pob' => 'required',
            'religion' => 'required',
            'relationship' => 'required',
            'status_married' => 'required',
            'work_id' => 'required',
            'education_id' => 'required',
        ]);
        $data['blood_type'] = $request->blood_type;
        $data['family_id'] = $request->family_id;
        $data['address'] = $request->address;
        Citizen::where('id', $id)->update($data);
        return redirect()->route('citizen')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        Citizen::destroy($request->id);
        return redirect()->route('citizen')->with('success', 'Data berhasil dihapus');
    }

    public function import()
    {
        $data['rws'] = MasterRw::all();
        return view('admin.citizen.import', $data);
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
        Citizen::insertOrIgnore($arr);
        return redirect()->route('citizen')->with('success', 'Upload data selesai');
    }
}
