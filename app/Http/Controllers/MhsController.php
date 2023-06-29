<?php

namespace App\Http\Controllers;

use App\Models\Mahasiswa;
use App\Models\Aduan;
use App\Models\PetugasAduan;
use App\Models\MhsAduan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

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
        $user = Auth::user();
    $jenisAduan = MhsAduan::where('nim', $user->nim)->orderBy('id', 'ASC')->get();
    return view('mahasiswa.aduan', compact('jenisAduan'));
    }

    public function create_aduan()
    {
        $jenisAduan = Aduan::all();
        return view('mahasiswa.create_aduan',compact('jenisAduan'));
    }

    public function store_aduan(Request $request)
    {
         $validatedData = $request->validate([
            'jenis_aduan' => 'required',
            'judul_aduan' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'required|image|mimes:jpeg,png,jpg'
        ]);

        $imagePath = $request->file('gambar')->store('gambar', 'public');

        // MhsAduan::create([
        //     'jenis_aduan' => $validatedData['jenis_aduan'],
        //     'judul_aduan' => $validatedData['judul_aduan'],
        //     'deskripsi' => $validatedData['deskripsi'],
        //     'gambar' => $imagePath,
        // ]);

        $mhs_aduan = new MhsAduan();
        $mhs_aduan->jenis_aduan = $validatedData['jenis_aduan'];
        $mhs_aduan->judul_aduan = $validatedData['judul_aduan'];
        $mhs_aduan->deskripsi = $validatedData['deskripsi'];
        $mhs_aduan->gambar = $imagePath;
        $nim = auth()->user()->nim;
        $mhs_aduan->nim = $nim;
        $mhs_aduan->save();

        $petugas_aduan = new PetugasAduan();
        $petugas_aduan->jenis_aduan = $validatedData['jenis_aduan'];
        $petugas_aduan->judul_aduan = $validatedData['judul_aduan'];
        $petugas_aduan->deskripsi = $validatedData['deskripsi'];
        $petugas_aduan->gambar = $imagePath;

        $mahasiswa = Mahasiswa::where('nim', $nim)->first();
        $petugas_aduan->nama = $mahasiswa->nama_mahasiswa;
        $petugas_aduan->mhs_aduan_id = $mhs_aduan->id;
        $petugas_aduan->save();


        return redirect()->route('mhs_aduan')->with('success','Data pengaduan berhasil ditambahkan.');
    }

    public function edit_aduan(string $id)
    {
        $aduan = MhsAduan::findOrFail($id);
        $jenisAduan = Aduan::all();
        return view('mahasiswa.edit_aduan',compact('aduan','jenisAduan'));
    }

    public function update_aduan(Request $request, string $id)
    {
        // Retrieve the aduan by ID
        $aduan = MhsAduan::findOrFail($id);

        // Validate the form data
        $validatedData = $request->validate([
            'jenis_aduan' => 'required',
            'judul_aduan' => 'required',
            'deskripsi' => 'required',
            'gambar' => 'nullable|image|mimes:jpeg,png,jpg'
        ]);

        // Update the aduan with the new data
        $aduan->jenis_aduan = $validatedData['jenis_aduan'];
        $aduan->judul_aduan = $validatedData['judul_aduan'];
        $aduan->deskripsi = $validatedData['deskripsi'];

        if ($request->hasFile('gambar')) {
            if ($aduan->gambar) {
                Storage::disk('public')->delete($aduan->gambar);
            }

            // Upload the new image and update the aduan's gambar field
            $gambar = $request->file('gambar');
            $imagePath = $gambar->store('gambar', 'public');
            $aduan->gambar = $imagePath;
        }

        // Save the updated aduan
        $aduan->save();

        // Update the corresponding entry in the petugas_aduan table
        $petugasAduan = PetugasAduan::where('mhs_aduan_id', $aduan->id)->first();
        $petugasAduan->jenis_aduan = $aduan->jenis_aduan;
        $petugasAduan->judul_aduan = $aduan->judul_aduan;
        $petugasAduan->deskripsi = $aduan->deskripsi;
        $petugasAduan->save();

        // Redirect the user with a success message
        return redirect()->route('mhs_aduan')->with('success', 'Data pengaduan berhasil diperbarui.');
    }


    public function destroy_aduan($id)
    {
        PetugasAduan::where('mhs_aduan_id', $id)->delete();
        $mhs_aduan = MhsAduan::findOrFail($id);

        // Delete the associated image file from the file system
        $imagePath = $mhs_aduan->gambar;
        Storage::delete($imagePath);

        // Delete the mhs_aduan from the database
        $mhs_aduan->delete();


        return redirect()->route('mhs_aduan')->with('success', 'Data pengaduan berhasil dihapus.');
    }

    public function m_detail_aduan(string $id)
    {
        $aduan = MhsAduan::findOrFail($id);
        $jenisAduan = Aduan::all();
        return view('mahasiswa.detail_aduan', compact('aduan', 'jenisAduan'));
    }

}
