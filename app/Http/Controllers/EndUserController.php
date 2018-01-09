<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use DB;

class EndUserController extends Controller
{
    public function userProfile() {
        $user = Sentinel::getUser();
        $menu = view('layouts.customer-menu');
        $user_info = DB::table('customers_info')->where('user_id', $user->id)->first();
        return view('endUsers.user-profile',['user'=>$user,'user_info'=>$user_info])->with('panel-menu', $menu);
    }
    
    public function customerHome() {
        return view('layouts.customer-menu');
    }
    
    public function editProfile() {
        $user = Sentinel::getUser();
        $user_info = DB::table('customers_info')->where('user_id', $user->id)->first();
        return view('endUsers.edit-profile',['user'=>$user, 'user_info'=>$user_info]);
    }
    
    public function postEditProfile(Request $request) {
        
        $this->validate($request, [
            'first_name'=>'max:50',
            'last_name'=>'max:50',
            'email'=>'max:255',
            'mobile'=>'max:14',
            'phone'=>'max:10',
            'email'=>'max:255',
            'address'=>'max:255',
            'profile_picture' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        
        $post_data = $request->all();
        $data = array();
        $sentinel_data = array();
        $empty = true;
        
        foreach ($post_data as $value) {
            if(!empty($value)){
                $empty = false;
                break;
            }
        }
        
        if(!empty($request->file('profile_picture'))){
            $image = $request->file('profile_picture');
            $image_name = time().str_random(5).'.'.strtolower($image->getClientOriginalExtension());
            $path = public_path('\images\endUser');
            $image->move($path, $image_name);
            $data['profile_picture'] = '/images/endUser/'.$image_name;
        }
        
        if($empty == false){
            
            $user = Sentinel::getUser();
            
            $data['mobile'] = $request->mobile;
            $data['phone'] = $request->phone;
            $data['address'] = $request->address;
            
            $sentinel_data['first_name'] = $request->first_name;
            $sentinel_data['last_name'] = $request->last_name;
            $sentinel_data['location'] = $request->location;
            DB::table('users')->where('id', $user->id)->update($sentinel_data);
            
            $customer_info = DB::table('customers_info')->where('user_id', $user->id)->first();
            if(!$customer_info){
                $data['user_id'] = $user->id;
                DB::table('customers_info')->insert($data);
            }
            else{
                DB::table('customers_info')->where('user_id', $user->id)->update($data);
            }
            return redirect('/user-profile');
        }
        else{
            return redirect()->back();
        }
    }
}
