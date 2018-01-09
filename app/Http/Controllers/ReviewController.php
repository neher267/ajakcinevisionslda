<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Sentinel;
use DB;
use DateTime;
use DateTimezone;

class ReviewController extends Controller
{
    
       public function movieReview($title, $id) {

        $id_facke = substr($id, 3);
        $size = strlen($id_facke);
        $id = (int) substr($id_facke, 0, $size - 2);
        $hit_count['hit_count'] = DB::table('news')->where('id', $id)->first()->hit_count + 1;
        DB::table('news')->where('id', $id)->update($hit_count);
        $latest_news = DB::table('news')
                ->where('category_id', '!=', 7)
                ->where('category_id', '!=', 10)
                ->where('pub_status', 1)
                ->orderBy('id', 'desc')
                ->limit(4)->get();
        $populer_news = DB::table('news')
                        ->where('pub_status', 1)
                        ->orderBy('hit_count', 'desc')
                        ->limit(5)->get();
        $movie_reviews = DB::table('news')
                        ->where('category_id', 10)
                        ->where('pub_status', 1)
                        ->orderBy('id', 'desc')
                        ->limit(6)->get();
        $visitor_reviews = DB::table('reviews')
                        ->where('news_id', $id)
                        ->where('pub_status', 1)
                        ->limit(6)->get();
        $news = DB::table('news')
                ->join('users', 'news.reporter_id', '=', 'users.id')
                ->where('news.id', $id)
                ->where('news.pub_status', 1)
                ->select('news.*', 'users.first_name', 'users.last_name')
                ->first();

        return view('web.pages.movie-review', [
            'news' => $news, 
            'latest_news' => $latest_news, 
            'movie_reviews' => $movie_reviews, 
            'visitor_reviews' => $visitor_reviews, 
            'populer_news' => $populer_news]);
    }
    
    public function addRevied(Request $request) {
        $user =  Sentinel::getUser();
        $data = array();
        $data ['news_id'] = $request->news_id;
        $data ['review_by'] = $user->first_name.' '.$user->last_name;
        $data ['review'] = $request->review;
        $data['created_at'] = new DateTime('now', new DateTimezone('Asia/Dhaka'));
        DB::table('reviews')->insert($data);
        
        return redirect()->back()->with('success', "Thank you for your review!");
        
    }
}
