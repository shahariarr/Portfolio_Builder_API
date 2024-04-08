<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;

class BlogController extends Controller
{
    function BlogCreate(Request $request){
        try{
            $request->validate([
                'title' => 'required|string|min:2',
                'description' => 'required|string|min:2',
                'image' => 'nullable|image',

            ]);
            if($request->hasFile('image')){
                $image = $request->file('image');
                $fileNameToStore = 'blog_image_'.md5((uniqid())).time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('BlogImages'), $fileNameToStore);
            }

            $user_id=Auth::id();
            Blog::create([

                'title'=>$request->input('title'),
                'description'=>$request->input('description'),
                'image'=>$fileNameToStore,
                'user_id'=>$user_id
            ]);
            return response()->json(['status' => 'success', 'message' => "Request Successful"]);
        }catch (\Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }

    function BlogList(Request $request){
        try{
            $user_id=Auth::id();
            $rows= Blog::where('user_id',$user_id)->get();
            return response()->json(['status' => 'success', 'rows' => $rows]);
        }catch (\Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }


    function BlogDelete(Request $request){
        try{
            $request->validate([
                'id' => 'required|string|min:1'
            ]);
            $user_id=Auth::id();
            $blog_id=$request->input('id');
            Blog::where('id',$blog_id)->where('user_id',$user_id)->delete();
            return response()->json(['status' => 'success', 'message' => "Request Successful"]);
        }catch (\Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }




    function BlogUpdate(Request $request){
        try {
            $request->validate([
                'id' => 'required|string|min:1',
                'title' => 'required|string|min:2',
                'description' => 'required|string|min:2',
                'image' => 'nullable|image',
            ]);

            $blog_id = $request->input('id');
            $user_id = Auth::id();

            $blog = Blog::where('id', $blog_id)->where('user_id', $user_id)->first();

            if($request->hasFile('image')){
                // Delete old image
                if($blog->image){
                    $oldImagePath = public_path('BlogImages').'/'.$blog->image;
                    if(File::exists($oldImagePath)) {
                        File::delete($oldImagePath);
                    }
                }

                $image = $request->file('image');
                $fileNameToStore = 'blog_image_'.md5((uniqid())).time().'.'.$image->getClientOriginalExtension();
                $image->move(public_path('BlogImages'), $fileNameToStore);
            } else {
                $fileNameToStore = $blog->image;
            }

            $blog->update([
                'title'=>$request->input('title'),
                'description'=>$request->input('description'),
                'image' => $fileNameToStore
            ]);

            return response()->json(['status' => 'success', 'message' => "Request Successful"]);

        }catch (\Exception $e){
            return response()->json(['status' => 'fail', 'message' => $e->getMessage()]);
        }
    }



}
