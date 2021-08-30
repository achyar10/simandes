<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\MasterRt;

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
}
