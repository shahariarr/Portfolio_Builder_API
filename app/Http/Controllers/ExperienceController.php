<?php

namespace App\Http\Controllers;

use App\Models\experience;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ExperienceController extends Controller
{
    function ExperienceCreate(Request $request){
        try{
            $request->validate([
                'company' => 'required|string|min:2',
                'position' => 'required|string|min:2',
                'start_date' => 'required|date',
                'end_date' => 'required|date',
                'worktime' => 'required|string|min:2',



            ]);
            $user_id=Auth::id();
            experience::create([
                'company'=>$request->input('company'),
                'position'=>$request->input('position'),
                'start_date'=>$request->input('start_date'),
                'end_date'=>$request->input('end_date'),
                'worktime'=>$request->input('worktime'),
                'user_id'=>$user_id
            ]);
            return response()->json(['status' => 'success', 'message' => "Request Successful"]);
        }catch (\Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }



    function ExperienceList(Request $request){
        try{
            $user_id=Auth::id();
            $rows= experience::where('user_id',$user_id)->get();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        }catch (\Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }


    function ExperienceDelete(Request $request){
        try{
            $request->validate([
                'id' => 'required|string|min:1'
            ]);
            $user_id=Auth::id();
            $experience_id=$request->input('id');
            experience::where('id',$experience_id)->where('user_id',$user_id)->delete();
            return response()->json(['status' => 'success', 'message' => "Request Successful"]);
        }catch (\Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }



    function ExperienceUpdate(Request $request){

        try {
            $request->validate([
                'id' => 'required|string|min:1',
                'company' => 'required|string|min:2',
                'position' => 'required|string|min:2',
                'start_date' => 'required|date',
                'end_date' => 'required|date',
                'worktime' => 'required|string|min:2',
            ]);

            $experience_id=$request->input('id');
            $user_id=Auth::id();
            experience::where('id',$experience_id)->where('user_id',$user_id)->update([
                'company'=>$request->input('company'),
                'position'=>$request->input('position'),
                'start_date'=>$request->input('start_date'),
                'end_date'=>$request->input('end_date'),
                'worktime'=>$request->input('worktime'),

            ]);
            return response()->json(['status' => 'success', 'message' => "Request Successful"]);

        }catch (\Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }
}
