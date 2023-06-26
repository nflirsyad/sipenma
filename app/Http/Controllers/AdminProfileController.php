<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfilePasswordRequest;
use App\Models\Admin;
use App\Models\User;
use Dotenv\Exception\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Mockery\Matcher\HasKey;

class AdminProfileController extends Controller
{
    public function index(){
        return view('admin/profile');
    }

    public function edit(string $id)
    {
        if(request()->ajax())
        {
            $data = User::findOrFail($id);
            return response()->json(['result' => $data]);
        }
    }

    public function update(Request $request){
        
        $user = User::find(Auth::user()->id);

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

    public function update_password(Request $request){

        $user = User::find(Auth::user()->password);

       

        try{
            $currentPass = Auth::user()->password;
            if (Hash::check($request->oldPassword, $currentPass)) {
                $user = User::find(Auth::id());
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

        // $user = User::find(Auth::user()->id);

        // $request->validate([
        //     'password' => ['string', 'min:3', 'max:191', 'required'],
        // ]);

        // if (Hash::check($request['oldPassword'], $user->passsword)) {
            
        //     $user->password = Hash::make($request['newPassword']);
        //     $user->save();

        //     return Redirect()->back()->with('success','Password telah berhasil diubah!');
        // }else{  
            
        //     return Redirect()->back()->with('error','Password tidak cocok!');

        // }
    }
}