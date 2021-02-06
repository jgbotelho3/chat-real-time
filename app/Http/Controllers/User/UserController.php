<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;


class UserController extends Controller
{
    public function profile()
    {
        return view('users.profile');
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $data = $request->all();

        if($request->email){
            unset($data['email']);
        }

        if($request->password){
            $data['password'] = bcrypt($data['password']);
        }else{
            unset($data['password']);
        }

        if($request->hasFile('image') && $request->file('image')->isValid()){

                if($user->image && Storage::exists("users/{$user->image}")){
                    Storage::delete("users/{$user->image}");
                }

            $nameImage = Str::kebab($request->name).uniqid($user->id);
            $extension = $request->image->extension();
            $nameFile = "{$nameImage}.{$extension}";
            $data['image'] = $nameFile;

            $isUploaded = $request->image->storeAs('users', $nameFile);

            if(!$isUploaded){
                return redirect()->route('profile')->with('error', 'Upload image profile failed');
            }
        }

        $user->update($data);

        return redirect()->route('profile')->with('success', 'Profile updated!');

    }
}
