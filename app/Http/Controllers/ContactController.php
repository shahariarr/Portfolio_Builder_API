<?php

namespace App\Http\Controllers;

use App\Models\contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ContactController extends Controller
{
    function ContactCreate(Request $request){
        try{
            $request->validate([
                'title' => 'required|string|min:1',
                'description' => 'required|string|min:1',

            ]);
            $user_id=Auth::id();
            contact::create([
                'title'=>$request->input('title'),
                'description'=>$request->input('description'),
                'user_id'=>$user_id

            ]);
            return response()->json(['status' => 'success', 'message' => "Request Successful"]);
        }catch (\Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    function ContactList(Request $request){
        try{
            $user_id=Auth::id();
            $rows= contact::where('user_id',$user_id)->get();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        }catch (\Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }


    function ContactDelete(Request $request){
        try{
            $request->validate([
                'id' => 'required|string|min:1'
            ]);
            $user_id=Auth::id();
            $contact_id=$request->input('id');
            contact::where('id',$contact_id)->where('user_id',$user_id)->delete();
            return response()->json(['status' => 'success', 'message' => "Request Successful"]);
        }catch (\Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }



    function ContactUpdate(Request $request){

        try {
            $request->validate([
                'id' => 'required|string|min:1',
                'title' => 'required|string|min:1',
                'description' => 'required|string|min:1',

            ]);

            $contact_id=$request->input('id');
            $user_id=Auth::id();
            contact::where('id',$contact_id)->where('user_id',$user_id)->update([

                'title'=>$request->input('title'),
                'description'=>$request->input('description'),

            ]);
            return response()->json(['status' => 'success', 'message' => "Request Successful"]);

        }catch (\Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

}
