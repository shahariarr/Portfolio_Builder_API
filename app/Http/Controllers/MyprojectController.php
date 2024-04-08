<?php

namespace App\Http\Controllers;

use App\Models\MyProject;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use SebastianBergmann\CodeCoverage\Report\Xml\Project;

class MyprojectController extends Controller
{
    function ProjectCreate(Request $request){
        try{
            $request->validate([
                'project_name'=>'required|string|min:2',
                'project_description'=>'required|string|min:2',
                'project_link'=>'required|string|min:2',
                'project_technology'=>'required|array|min:1|nullable',
                'project_image'=>'nullable|image',

            ]);
            if($request->hasFile('project_image')){
                $image = $request->file('project_image');
                $fileNameToStore = 'project_image_'.md5((uniqid())).time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('ProjectImages'), $fileNameToStore);
            }

            $user_id=Auth::id();
            MyProject::create([
                'project_name'=>$request->input('project_name'),
                'project_description'=>$request->input('project_description'),
                'project_link'=>$request->input('project_link'),
                'project_technology'=>json_encode($request->input('project_technology')),
                'project_image'=>$fileNameToStore,
                'user_id'=>$user_id

            ]);
            return response()->json(['status' => 'success', 'message' => "Request Successful"]);
        }catch (\Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }



    function ProjectList(Request $request){
        try{
            $user_id=Auth::id();
            $rows= MyProject::where('user_id',$user_id)->get();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        }catch (\Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }


    function ProjectDelete(Request $request){
        try{
            $request->validate([
                'id' => 'required|string|min:1'
            ]);
            $user_id=Auth::id();
            $project_id=$request->input('id');
            MyProject::where('id',$project_id)->where('user_id',$user_id)->delete();
            return response()->json(['status' => 'success', 'message' => "Request Successful"]);
        }catch (\Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }




    function ProjectUpdate(Request $request){
        try {
            $request->validate([
                'id' => 'required|string|min:1',
                'project_name'=>'required|string|min:2',
                'project_description'=>'required|string|min:2',
                'project_link'=>'required|string|min:2',
                'project_technology'=>'required|array',
                'project_image'=>'nullable|image',
            ]);

            $project_id = $request->input('id');
            $user_id = Auth::id();
            $project = MyProject::where('id', $project_id)->where('user_id', $user_id)->first();

            if (!$project) {
                return response()->json(['status' => 'fail', 'message' => "Project not found"]);
            }

            if($request->hasFile('project_image')){
                // Delete old image
                if($project->project_image){
                    $oldImagePath = public_path('ProjectImages').'/'.$project->project_image;
                    if(File::exists($oldImagePath)) {
                        File::delete($oldImagePath);
                    }
                }

                $image = $request->file('project_image');
                $fileNameToStore = 'project_image_'.md5((uniqid())).time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('ProjectImages'), $fileNameToStore);
            } else {
                $fileNameToStore = $project->project_image;
            }

            $project->update([
                'project_name'=>$request->input('project_name'),
                'project_description'=>$request->input('project_description'),
                'project_link'=>$request->input('project_link'),
                'project_technology'=>json_encode($request->input('project_technology')),
                'project_image'=>$fileNameToStore,
            ]);

            return response()->json(['status' => 'success', 'message' => "Request Successful"]);

        }catch (\Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

}
