<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;
use DateTime;
use DateTimezone;

class CategoryController extends Controller
{
    public function categories()
    {
       $menu = view('backEnd.layouts.super-admin-menu');
       $all_categories = DB::table('news_categories')->orderBy('id','desc')->get();
       return view('backEnd.superAdmin.categories',['all_categories'=>$all_categories])->with('panel-menu', $menu);
    }

   
    public function addCategory()
    {
        $menu = view('backEnd.layouts.super-admin-menu');
        return view('backEnd.superAdmin.create-category')->with('panel-menu', $menu);
    }

    
    public function postAddCategory(Request $request)
    {
        $this->validate($request, [
            'category_name'=>'required|max:255',
            'description'=>'required'
        ]);
        
        $data = array();
        $data['category_name']=$request->category_name;
        $data['description']=$request->description;
        $data['created_at'] = new DateTime('now', new DateTimezone('Asia/Dhaka'));
        DB::table('news_categories')->insert($data);
        
        \Session::flash('message_success', 'Successfully added a new Category!');
        
        return redirect('/categories');
    }

    public function editCategory($id)
    {
        $category = DB:: table('news_categories')->where('id',$id)->first();
        $menu = view('backEnd.layouts.super-admin-menu');
       
        return view('backEnd.superAdmin.edit-category', ['category' => $category])->with('panel-menu', $menu);
    }

    
    public function postEditCategory(Request $request)
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

    
    public function categoryPublish($id){
        $data = array();
        $data['pub_status']=1;
        DB::table('news_categories')->where('id',$id)->update($data);
        
        return redirect('/categories');
    }
    
    public function categoryUnpublish($id){
        $data = array();
        $data['pub_status']=0;
        $data['updated_at'] = new DateTime('now', new DateTimezone('Asia/Dhaka'));
        DB::table('news_categories')->where('id',$id)->update($data);
        
        return redirect('/categories');
    }
}
