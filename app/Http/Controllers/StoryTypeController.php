<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use DateTime;
use DateTimezone;

class StoryTypeController extends Controller
{
    public function storyTypes()
    {
       $menu = view('backEnd.layouts.super-admin-menu');
       $all_types = DB::table('story_types')->orderBy('id','desc')->get();
       return view('backEnd.story type.manage-story-type',['all_types'=>$all_types])->with('panel-menu', $menu);
    }

   
    public function addTypeOfSrory()
    {
        return view('backEnd.story type.create-story-type');
    }

    
    public function postAddTypeOfSrory(Request $request)
    {
        $this->validate($request, [
            'story_type_name'=>'required|max:255|unique:story_types',
            'description'=>'required',
        ]);
        $data = array();
        $data['story_type_name']=$request->story_type_name;
        $data['description']=$request->description;
        $data['created_at'] = new DateTime('now', new DateTimezone('Asia/Dhaka'));
        DB::table('story_types')->insert($data);
        
        \Session::flash('message_success', 'Successfully added a new type!');
        
        return redirect('/story-types');
    }

    public function editStoryType($id)
    {
        $category = DB:: table('news_categories')->where('id',$id)->first();
        $menu = view('backEnd.layouts.super-admin-menu');
       
        return view('backEnd.superAdmin.edit-category', ['category' => $category])->with('panel-menu', $menu);
    }

    
    public function postEditStoryType(Request $request)
    {
        $this->validate($request, [
            'name'=>'required|max:255',
            'description'=>'required',
        ]);
        $data = array();
        $data['category_name']=$request->name;
        $data['description']=$request->description;
        $data['created_at'] = new DateTime('now', new DateTimezone('Asia/Dhaka'));
        DB::table('news_categories')->where('id',$request->id)->update($data);
        
        \Session::flash('message_success', 'Successfully Updated Category!');
        
        return redirect('/categories');
    }

}
