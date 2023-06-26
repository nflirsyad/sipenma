<?php

namespace App\Http\Controllers;

use App\Models\Aduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\DataTables;

class JenisAduanController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Aduan::select('id','nama')->get();
            return DataTables::of($data)->addIndexColumn()
            ->addColumn('action', function($data){
                $button = '<button type="button" name="edit" id="'.$data->id.'" class="edit btn btn-primary btn-xs me-2">Edit</button>';
                $button .= '<button type="button" name="delete" id="'.$data->id.'" class="delete btn btn-danger btn-xs">Delete</i></button>';
                return $button;
            })
            ->make(true);
        }
        return view('admin.jenis_aduan');
    }

    public function store(Request $request)
    {
        $data = Aduan::create([
            'nama'   => $request->nama
        ]);

        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
            'data'    => $data  
        ]);
        
        return response()->json(['success' => 'Data Added successfully.']);
    }

    /**
     * Update the specified resource in storage.
     */
    public function edit(string $id)
    {
        if(request()->ajax())
        {
            $data = Aduan::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    public function update(Request $request)
    {
        $form_data = array(
            'nama'    =>  $request->nama
        );
 
        Aduan::whereId($request->hidden_id)->update($form_data);
 
        return response()->json(['success' => 'Data is successfully updated']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $data = Aduan::findOrFail($id);
        $data->delete();
    }

}
