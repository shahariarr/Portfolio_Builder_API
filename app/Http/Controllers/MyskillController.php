<?php

namespace App\Http\Controllers;

use App\Models\Myskill;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MyskillController extends Controller
{
    function SkillCreate(Request $request){
        try{
            $request->validate([


                'skills'=>'required|array',


            ]);
            $user_id=Auth::id();
            Myskill::create([
                'skills'=>json_encode($request->input('skills')),
                'user_id'=>$user_id

            ]);
            return response()->json(['status' => 'success', 'message' => "Request Successful"]);
        }catch (\Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    function SkillList(Request $request){
        try{
            $user_id=Auth::id();
            $rows= Myskill::where('user_id',$user_id)->get();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        }catch (\Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }


    function SkillDelete(Request $request){
        try{
            $request->validate([
                'id' => 'required|string|min:1'
            ]);
            $user_id=Auth::id();
            $project_id=$request->input('id');
            Myskill::where('id',$project_id)->where('user_id',$user_id)->delete();
            return response()->json(['status' => 'success', 'message' => "Request Successful"]);
        }catch (\Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }



    function SkillUpdate(Request $request){

        try {
            $request->validate([
                'id' => 'required|string|min:1',
                'skills'=>'required|array',
            ]);

            $skill_id=$request->input('id');
            $user_id=Auth::id();
            Myskill::where('id',$skill_id)->where('user_id',$user_id)->update([

                'skills'=>json_encode($request->input('skills')),

            ]);
            return response()->json(['status' => 'success', 'message' => "Request Successful"]);

        }catch (\Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

}
