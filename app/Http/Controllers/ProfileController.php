<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function edit()
    {
        return view("profile.edit");
    }

    public function update(Request $request)
    {
        $user= \App\User::find(\Illuminate\Support\Facades\Auth::id());
        if($request->photo){
        $request -> validate([  
            "photo"=>"required|mimes:jpg,png,jpeg",
        ]);
        $file = $request->file("photo");
        $newFileName=uniqid()."_profile.".$file->getClientOriginalExtension();
        $dir= "/public/profile/";
        // $file->move("store/",$newFileName);
        $file->storeAs($dir,$newFileName);
        // \Illuminate\Support\Facades\Storage::putFileAs($dir,$file,$newFileName);
        
      
       $user->photo =$newFileName;
    }
       $user->name =$request->name;
       $user->email =$request->email;
       $user->update();

        return redirect()->route("profile.edit");

    }
}
