<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Aduan;
use App\Models\MhsAduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class   MhsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('mahasiswa.profile');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
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
        if(request()->ajax())
        {
            $data = Mahasiswa::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function mhs_update(Request $request)
    {
        $user = Mahasiswa::find(Auth::user()->id);

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

    public function mhs_update_password(Request $request){

        $user = Mahasiswa::find(Auth::user()->password);
        try{
            $currentPass = Auth::user()->password;
            if (Hash::check($request->oldPassword, $currentPass)) {
                $user = Mahasiswa::find(Auth::id());
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function aduan()
    {
        $mahasiswa = Mahasiswa::orderBy('id','ASC')->get();
        return view('mahasiswa.aduan',compact('mahasiswa'));
    }
    
    public function create_aduan()
    {
        $jenisAduan = Aduan::all();
        return view('mahasiswa.create_aduan',compact('jenisAduan'));
    }
    
    public function store_aduan()
    {
         // Validate the incoming request data
         $validatedData = $request->validate([
            'jenis_aduan' => 'required',
            'judul_aduan' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image',
        ]);

        // Store the image file
        $imagePath = $request->file('gambar')->store('public/images');

        // Create a new Aduan model instance and fill it with the validated data
        $aduan = new Aduan;
        $aduan->jenis_aduan = $validatedData['jenis_aduan'];
        $aduan->judul_aduan = $validatedData['judul_aduan'];
        $aduan->deskripsi = $validatedData['deskripsi'];
        $aduan->gambar = $imagePath;
        $aduan->save();
    }

}
