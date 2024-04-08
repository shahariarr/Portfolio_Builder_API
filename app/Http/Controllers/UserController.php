<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    function UserRegistration(Request $request)
    {
        try {
            $request->validate([
                'firstName' => 'required|string|max:50',
                'lastName' => 'required|string|max:50',
                'email' => 'required|string|email|max:50|unique:users,email',
                'mobile' => 'required|string|max:50',
                'password' => 'required|string|min:3'

            ]);
            User::create([
                'firstName' => $request->input('firstName'),
                'lastName' => $request->input('lastName'),
                'email' => $request->input('email'),
                'mobile' => $request->input('mobile'),
                'password' => Hash::make($request->input('password'))
            ]);
            return response()->json(['status' => 'success', 'message' => 'User Registration Successfully']);
        } catch (\Exception $e) {
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    function UserLogin(Request $request){
        try {
            $request->validate([
                'email' => 'required|string|email|max:50',
                'password' => 'required|string|min:3'
            ]);

            $user = User::where('email', $request->input('email'))->first();

            if (!$user || !Hash::check($request->input('password'), $user->password)) {
                return response()->json(['status' => 'failed', 'message' => 'Invalid User']);
            }

            $token = $user->createToken('authToken')->plainTextToken;
            return response()->json(['status' => 'success', 'message' => 'Login Successful','token'=>$token]);

        }catch (\Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }


    function UserLogout(Request $request){
        $request->user()->tokens()->delete();
        // return redirect('/userLogin');
        return response()->json(['status' => 'success', 'message' => 'Logout Successfully']);
    }

    function UserProfile(Request $request){
        return response()->json(['data'=>$request->user()]);
    }


    function UpdateProfile(Request $request){
        try{
            $request->validate([
                'firstName' => 'required|string|max:50',
                'lastName' => 'required|string|max:50',
                'email' => 'required|string|email|max:50',
                'mobile' => 'required|string|max:50',
                'age' => 'required|string|max:50',
                'nationality'=>'required|string|max:50',
                'freelance'=>'required|string|max:50',
                'address'=>'required|string|max:50',
                'langages'=>'required|string|max:50',
                'about'=>'required|string|max:1000',
                'profile_img'=>'nullable|image',
            ]);

            $user = User::where('id','=',Auth::id())->first();

            //Image Upload
            if($request->hasFile('profile_img')){
                // Delete old image
                if($user->profile_img){
                    $oldImagePath = public_path('profileImages').'/'.$user->profile_img;
                    if(File::exists($oldImagePath)) {
                        File::delete($oldImagePath);
                    }
                }

                $image = $request->file('profile_img');
                $fileNameToStore = 'profile_image_'.md5((uniqid())).time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('profileImages'), $fileNameToStore);
            } else {
                $fileNameToStore = $user->profile_img;
            }

            $user->update([
                'firstName'=>$request->input('firstName'),
                'lastName'=>$request->input('lastName'),
                'mobile'=>$request->input('mobile'),
                'age'=>$request->input('age'),
                'nationality'=>$request->input('nationality'),
                'freelance'=>$request->input('freelance'),
                'address'=>$request->input('address'),
                'langages'=>$request->input('langages'),
                'about'=>$request->input('about'),
                'profile_img'=> $fileNameToStore
            ]);

            return response()->json(['status' => 'success', 'message' => 'Request Successful']);

        }catch (\Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }


}
