<?php

namespace App\Http\Controllers;

use App\Models\social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SocialController extends Controller
{
    function SocialCreate(Request $request){
        try{
            $request->validate([
                'facebook' => 'required|string|min:1',
                'twitter' => 'required|string|min:1',
                'instagram' => 'required|string|min:1',
                'linkedin' => 'required|string|min:1',
                'github' => 'required|string|min:1',


            ]);
            $user_id=Auth::id();
            social::create([
                'facebook'=>$request->input('facebook'),
                'twitter'=>$request->input('twitter'),
                'instagram'=>$request->input('instagram'),
                'linkedin'=>$request->input('linkedin'),
                'github'=>$request->input('github'),
                'user_id'=>$user_id

            ]);
            return response()->json(['status' => 'success', 'message' => "Request Successful"]);
        }catch (\Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    function SocialList(Request $request){
        try{
            $user_id=Auth::id();
            $rows= social::where('user_id',$user_id)->get();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        }catch (\Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }


    function SocialDelete(Request $request){
        try{
            $request->validate([
                'id' => 'required|string|min:1'
            ]);
            $user_id=Auth::id();
            $social_id=$request->input('id');
            social::where('id',$social_id)->where('user_id',$user_id)->delete();
            return response()->json(['status' => 'success', 'message' => "Request Successful"]);
        }catch (\Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }



    function SocialUpdate(Request $request){

        try {
            $request->validate([
                'id' => 'required|string|min:1',
                'facebook' => 'required|string|min:1',
                'twitter' => 'required|string|min:1',
                'instagram' => 'required|string|min:1',
                'linkedin' => 'required|string|min:1',
                'github' => 'required|string|min:1',

            ]);

            $social_id=$request->input('id');
            $user_id=Auth::id();
            social::where('id',$social_id)->where('user_id',$user_id)->update([

                'facebook'=>$request->input('facebook'),
                'twitter'=>$request->input('twitter'),
                'instagram'=>$request->input('instagram'),
                'linkedin'=>$request->input('linkedin'),
                'github'=>$request->input('github'),

            ]);
            return response()->json(['status' => 'success', 'message' => "Request Successful"]);

        }catch (\Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }
}
