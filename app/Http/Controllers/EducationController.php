<?php

namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EducationController extends Controller
{

        function EducationCreate(Request $request){
            try{
                $request->validate([
                    'degree' => 'required|string|min:2',
                    'institute' => 'required|string|min:2',
                    'start_date' => 'required|date',
                    'end_date' => 'required|date',
                    'description' => 'required|string|min:2',

                ]);
                $user_id=Auth::id();
                Education::create([
                    'degree'=>$request->input('degree'),
                    'institute'=>$request->input('institute'),
                    'start_date'=>$request->input('start_date'),
                    'end_date'=>$request->input('end_date'),
                    'description'=>$request->input('description'),
                    'user_id'=>$user_id
                ]);
                return response()->json(['status' => 'success', 'message' => "Request Successful"]);
            }catch (\Exception $e){
                return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
            }
        }



        function EducationList(Request $request){
            try{
                $user_id=Auth::id();
                $rows= Education::where('user_id',$user_id)->get();
                return response()->json(['status' => 'success', 'rows' => $rows]);
            }catch (\Exception $e){
                return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
            }
        }


        function EducationDelete(Request $request){
            try{
                $request->validate([
                    'id' => 'required|string|min:1'
                ]);
                $user_id=Auth::id();
                $eduation_id=$request->input('id');
                Education::where('id',$eduation_id)->where('user_id',$user_id)->delete();
                return response()->json(['status' => 'success', 'message' => "Request Successful"]);
            }catch (\Exception $e){
                return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
            }
        }



        function EducationUpdate(Request $request){

            try {
                $request->validate([
                    'id' => 'required|string|min:1',
                    'degree' => 'required|string|min:2',
                    'institute' => 'required|string|min:2',
                    'start_date' => 'required|date',
                    'end_date' => 'required|date',
                    'description' => 'required|string|min:2',
                ]);

                $education_id=$request->input('id');
                $user_id=Auth::id();
                Education::where('id',$education_id)->where('user_id',$user_id)->update([
                    'degree'=>$request->input('degree'),
                    'institute'=>$request->input('institute'),
                    'start_date'=>$request->input('start_date'),
                    'end_date'=>$request->input('end_date'),
                    'description'=>$request->input('description'),

                ]);
                return response()->json(['status' => 'success', 'message' => "Request Successful"]);

            }catch (\Exception $e){
                return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
            }
        }


}
