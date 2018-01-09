<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Sentinel;
use DateTime;
use DateTimezone;

class GalleryController extends Controller
{
    public function gallery() {
        $gallary = DB::table('gallery')
                ->join('users', 'gallery.photographer_id', '=', 'users.id')
                ->join('news_categories', 'gallery.category_id', '=', 'news_categories.id')
                ->select('gallery.*', 'news_categories.category_name', 'users.first_name', 'users.last_name')
                ->get();
        
        $menu = view('backEnd.layouts.super-admin-menu');
        return view('backEnd.gallery.manage-gallery',['gallery'=>$gallary])->with('menu', $menu);
    }
    
    public function addPhoto() {
        $role = Sentinel::findRoleBySlug('photographer');
        $all_photographers = $role->users()->get();
        $all_categories = DB::table('news_categories')
                ->where('pub_status',1)
                ->orderBy('category_name', 'asc')->get();
        $menu = view('backEnd.layouts.super-admin-menu');
        
        return view('backEnd.gallery.add-photo',[
            'all_photographers'=>$all_photographers,
            'all_categories'=>$all_categories
            ])->with('menu', $menu);
    }
    
    public function postAddPhoto(Request $request) {

        $this->validate($request, [
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data = array();
        $image = $request->file('image');
        $image_name = time() . str_random(5) . '.' . strtolower($image->getClientOriginalExtension());
        $path = public_path('\images\gallery');
        $image->move($path, $image_name);

        $data['image'] = '/images/gallery/' . $image_name;
        $data['category_id'] = $request->category_id;
        $data['photographer_id'] = $request->photographer_id;
        $data['image_title'] = $request->image_title;
        $data['description'] = $request->description;
        $data['created_at'] = new DateTime('now', new DateTimezone('Asia/Dhaka'));

        DB::table('gallery')->insert($data);
        \Session::flash('message_success', 'Image Saved Successfully!');
        return redirect('/gallery');
    }
    
    public function postEditImage(Request $request) {

        
        $this->validate($request, [
            'trailer_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data = array();
        $image = $request->file('trailer_image');
        if (!empty($image)) {
            $image_name = time() . str_random(5) . '.' . strtolower($image->getClientOriginalExtension());
            $path = public_path('\images\gallery');
            $image->move($path, $image_name);
            $data['image'] = '/images/gallery/' . $image_name;
        }
        
        $data['category_id'] = $request->category_id;
        $data['photographer_id'] = $request->photographer_id;
        $data['image_title'] = $request->image_title;
        $data['description'] = $request->description;
        $data['updated_at'] = new DateTime('now', new DateTimezone('Asia/Dhaka'));

        DB::table('gallery')->where('id',$request->id)->update($data);
        \Session::flash('message_success', 'Image Updated Successfully!');
        return redirect('/gallery');
    }
    
    public function editImage($id) {
        $role = Sentinel::findRoleBySlug('photographer');
        $all_photographers = $role->users()->get();
        $all_categories = DB::table('news_categories')->orderBy('category_name', 'asc')->get();
        $image = DB::table('gallery')->where('id',$id)->first();
        $menu = view('backEnd.layouts.super-admin-menu');
        return view('backEnd.gallery.edit-image',[
            'all_photographers'=>$all_photographers,
            'all_categories'=>$all_categories,
            'image'=>$image
            ])->with('menu', $menu);
    }
    
    public function imagePublish($id){
        $data = array();
        $data['pub_status']=1;
        $data['updated_at'] = new DateTime('now', new DateTimezone('Asia/Dhaka'));
        DB::table('gallery')->where('id',$id)->update($data);
        
        return redirect('/gallery');
    }
    
    public function imageUnpublish($id){
        $data = array();
        $data['pub_status']=0;
        $data['updated_at'] = new DateTime('now', new DateTimezone('Asia/Dhaka'));
        DB::table('gallery')->where('id',$id)->update($data);
        
        return redirect('/gallery');
    }
    
    public function deleteImage(Request $request) {
        DB::table('gallery')->where('id',$request->id)->delete();
        return redirect('/gallery');
    }

}
