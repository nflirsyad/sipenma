<?php

namespace App\Http\Controllers;

use App\Models\Petugas;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PetugasController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $petugas = Petugas::orderBy('id','ASC')->get();
        return view('admin.petugas',compact('petugas'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create_petugas');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // Petugas::create($request->all());
        Petugas::create([
            'nama_petugas' => $request->nama_petugas,
            'username' => $request->username,
            'email' => $request->email,
            'password' => Hash::make($request->password),
        ]);

        return redirect()->route('petugas.index')->with('success','Data petugas berhasil ditambahkan.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $petugas = Petugas::findOrFail($id);
        return view('admin.edit_petugas',compact('petugas'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $petugas = Petugas::findOrFail($id);
        $petugas->update($request->all());
        
        return redirect()->route('petugas.index')->with('success','Data petugas berhasil diubah.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $petugas = Petugas::findOrFail($id);
        $petugas->delete();
        return redirect()->route('petugas.index')->with('success','Data petugas berhasil dihapus.');
    }

    public function petugas_profile()
    {
        return view('petugas.profile');
    }

    public function petugas_edit(string $id)
    {
        if(request()->ajax())
        {
            $data = Petugas::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function petugas_update(Request $request)
    {
        $user = Petugas::find(Auth::user()->id);

        $request->validate([
            'username' => ['string', 'min:3', 'max:191', 'required'],
            'email' => ['email', 'string', 'min:3', 'max:191', 'required'],
        ]);

        if ($user) {
            
            $user->username = $request['username'];
            $user->email = $request['email'];
            $user->save();

            return Redirect()->back()->with('success','Profil telah berhasil diubah!');
        }else{
            
            return Redirect()->back()->with('error','Profil gagal diubah!');

        }
    }

    public function petugas_update_password(Request $request){

        $user = Petugas::find(Auth::user()->password);
        try{
            $currentPass = Auth::user()->password;
            if (Hash::check($request->oldPassword, $currentPass)) {
                $user = Petugas::find(Auth::id());
                $user -> password = Hash::make($request->newPassword);
                $user -> save();
    
                return Redirect()->back()->with('success','Password telah berhasil diubah!');
            }else{
                return Redirect()->back()->with('error','Password tidak cocok!');
            }
    
        }catch (\Exception $ex){
            return $ex;
            return redirect()->back()->with(['error' => 'Something error please try again later']);
        }

    }

}
