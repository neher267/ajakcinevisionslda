<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use DB;
use Session;
use DateTime;
use DateTimezone;

class NewsController extends Controller {

    public function manageNews() {
        $all_news = DB::table('news')
                ->join('users', 'news.reporter_id', '=', 'users.id')
                ->join('news_categories', 'news.category_id', '=', 'news_categories.id')
                ->orderBy('news.id', 'desc')
                ->select('news.*', 'news_categories.category_name', 'users.first_name', 'users.last_name')
                ->get();
        $menu = view('backEnd.layouts.super-admin-menu');
        return view('backEnd.superAdmin.manage-news', ['all_news' => $all_news])->with('panel-menu', $menu);
    }

    public function reporterAllNews() {
        $user = Sentinel::getUser();
        $all_news = DB::table('news')
                ->join('news_categories', 'news.category_id', '=', 'news_categories.id')
                ->where('news.reporter_id',$user->id)
                ->orderBy('news.id', 'desc')
                ->select('news.*', 'news_categories.category_name')
                ->get();
        $menu = view('backEnd.layouts.news-reporter-menu');
        return view('backEnd.news reporter.manage-news', ['all_news' => $all_news])->with('panel-menu', $menu);
    }

    public function writeNews() {
        $all_categories = DB::table('news_categories')->orderBy('category_name', 'asc')->get();
        $menu = view('backEnd.layouts.news-reporter-menu');
        return view('backEnd.news reporter.write-news', ['all_categories' => $all_categories])->with('panel-menu', $menu);
    }

    public function postEditNews(Request $request) {

        $this->validate($request, [
            'news_title' => 'required|max:255',
            'short_description' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data = array();
        $image = $request->file('image');
        if (!empty($image)) {
            $image_name = time() . str_random(5) . '.' . strtolower($image->getClientOriginalExtension());
            $path = public_path('\images\news');
            $image->move($path, $image_name);
            $data['image'] = '/images/news/' . $image_name;
        }
        
        $data['category_id'] = $request->category_id;
        $data['reporter_id'] = Sentinel::getUser()->id;
        $data['news_title'] = $request->news_title;
        $data['short_description'] = $request->short_description;
        $data['description'] = $request->description;
        $data['image_title'] = $request->image_title;
        $data['updated_at'] = new DateTime('now', new DateTimezone('Asia/Dhaka'));

        DB::table('news')->where('id', $request->id)->update($data);
        \Session::flash('message_success', 'News Update Successfully!');
        return redirect('/news');
    }
    
    public function editNews($id) {
        $news = DB::table('news')
                ->where('news.id', $id)
                ->first();
        $all_categories = DB::table('news_categories')->orderBy('category_name', 'asc')->get();
        return view('/backEnd.news reporter.edit-news',[
            'news'=>$news,
            'all_categories'=>$all_categories,
            ]);
    }
    
        public function postWriteNews(Request $request) {

        $this->validate($request, [
            'news_title' => 'required|max:255',
            'short_description' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data = array();
        $image = $request->file('image');
        $image_name = time() . str_random(5) . '.' . strtolower($image->getClientOriginalExtension());
        $path = public_path('\images\news');
        $image->move($path, $image_name);

        $data['image'] = '/images/news/' . $image_name;
        $data['category_id'] = $request->category_id;
        $data['reporter_id'] = Sentinel::getUser()->id;
        $data['news_title'] = $request->news_title;
        $data['short_description'] = $request->short_description;
        $data['description'] = $request->description;
        $data['image_title'] = $request->image_title;
        $data['created_at'] = new DateTime('now', new DateTimezone('Asia/Dhaka'));

        DB::table('news')->insert($data);
        \Session::flash('message_success', 'News Saved Successfully!');
        return redirect('/write-news');
    }

    public function checkNews($id) {
        $news = DB::table('news')
                ->join('users', 'news.reporter_id', '=', 'users.id')
                ->join('news_categories', 'news.category_id', '=', 'news_categories.id')
                ->where('news.id', $id)
                ->select('news.*', 'news_categories.category_name', 'users.first_name', 'users.last_name')
                ->first();
        $latest_news = array();
        $populer_news = array();
        return view('web.pages.news-details', [
            'news' => $news,
            'latest_news' => $latest_news,
            'populer_news' => $populer_news,
             ]);
    }

    public function newsPublish($id){
        $data = array();
        $data['pub_status']=1;
        $data['updated_at'] = new DateTime('now', new DateTimezone('Asia/Dhaka'));
        DB::table('news')->where('id',$id)->update($data);
        
        return redirect('/manage-news');
    }
    
    public function newsUnpublish($id){
        $data = array();
        $data['pub_status']=0;
        $data['updated_at'] = new DateTime('now', new DateTimezone('Asia/Dhaka'));
        DB::table('news')->where('id',$id)->update($data);
        
        return redirect('/manage-news');
    }
}
