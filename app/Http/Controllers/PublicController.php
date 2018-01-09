<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class PublicController extends Controller {

    public function index() {
        // short film = 4; natok = 4; cinema = 6; 
        // tarokalap = 7; shuting cholche = 8;
        //  bivido = 9; muvie review = 10; music = 11;
        $latest_news = DB::table('news')->where('pub_status', 1)
                        ->where('category_id', '!=', 7)
                        ->where('category_id', '!=', 10)
                        ->orderBy('id', 'desc')
                        ->limit(3)->get();
        $all_alapon = DB::table('news')
                        ->where('category_id', 7)
                        ->where('pub_status', 1)
                        ->orderBy('id', 'desc')
                        ->limit(3)->get();
        $shutting_chochce = DB::table('news')
                        ->where('category_id', 8)
                        ->where('pub_status', 1)
                        ->orderBy('id', 'desc')
                        ->limit(3)->get();

        $bivido = DB::table('news')
                        ->where('category_id', 9)
                        ->where('pub_status', 1)
                        ->orderBy('id', 'desc')
                        ->limit(4)->get();
        $all_music = DB::table('news')
                        ->where('category_id', 11)
                        ->where('pub_status', 1)
                        ->orderBy('id', 'desc')
                        ->limit(4)->get();

        $populer_news = DB::table('news')
                        ->where('pub_status', 1)
                        ->orderBy('hit_count', 'desc')
                        ->limit(5)->get();

        $gallery1 = DB::table('gallery')->where('category_id', '<=', 4)->where('pub_status', 1)->inRandomOrder()->limit(8)->get();
        $gallery2 = DB::table('gallery')->where('category_id', '>', 4)->where('pub_status', 1)->inRandomOrder()->limit(8)->get();

        $trailers = DB::table('trailers')->where('pub_status', 1)
                        ->orderBy('id', 'desc')->limit(4)->get();
        $movie_reviews = DB::table('news')
                        ->where('category_id', 10)
                        ->orderBy('hit_count', 'desc')
                        ->where('pub_status', 1)
                        ->orderBy('id', 'desc')
                        ->limit(6)->get();

        return view('web.layouts.master-content', [
            'latest_news' => $latest_news,
            'trailers' => $trailers,
            'all_alapon' => $all_alapon,
            'populer_news' => $populer_news,
            'gallery1' => $gallery1,
            'gallery2' => $gallery2,
            'all_music' => $all_music,
            'shutting_chochce' => $shutting_chochce,
            'bivido' => $bivido,
            'movie_reviews' => $movie_reviews,
        ]);
    }

    public function movies() {
        $latest_news = DB::table('news')->where('pub_status', 1)
                        ->where('category_id', '!=', 7)
                        ->where('category_id', '!=', 10)
                        ->orderBy('id', 'desc')
                        ->limit(3)->get();
        $all_alapon = DB::table('news')
                        ->where('category_id', 7)
                        ->where('pub_status', 1)
                        ->orderBy('id', 'desc')
                        ->limit(3)->get();
        $all_music = DB::table('news')
                        ->where('category_id', 11)
                        ->where('pub_status', 1)
                        ->orderBy('id', 'desc')
                        ->limit(4)->get();
        $populer_news = DB::table('news')
                        ->where('pub_status', 1)
                        ->orderBy('hit_count', 'desc')
                        ->limit(5)->get();

        $shutting_chochce = DB::table('news')
                        ->where('category_id', 8)
                        ->where('pub_status', 1)
                        ->orderBy('id', 'desc')
                        ->limit(3)->get();



        $bivido = DB::table('news')
                        ->where('category_id', 9)
                        ->where('pub_status', 1)
                        ->orderBy('id', 'desc')
                        ->limit(4)->get();
        $movie_reviews = DB::table('news')
                        ->where('category_id', 10)
                        ->where('pub_status', 1)
                        ->orderBy('id', 'desc')
                        ->limit(6)->get();

        $gallery1 = DB::table('gallery')->where('category_id', '<=', 4)->where('pub_status', 1)->inRandomOrder()->limit(8)->get();
        $gallery2 = DB::table('gallery')->where('category_id', '>', 4)->where('pub_status', 1)->inRandomOrder()->limit(8)->get();

        $trailers = DB::table('trailers')
                        ->where('pub_status', 1)
                        ->orderBy('id', 'desc')->limit(4)->get();
        $popular_movies = DB::table('trailers')
                        ->where('pub_status', 1)
                        ->orderBy('id', 'desc')->limit(4)->get();

        return view('web.layouts.master-content2', [
            'latest_news' => $latest_news,
            'trailers' => $trailers,
            'all_alapon' => $all_alapon,
            'populer_news' => $populer_news,
            'gallery1' => $gallery1,
            'gallery2' => $gallery2,
            'popular_movies' => $popular_movies,
            'movie_reviews' => $movie_reviews,
            'all_music' => $all_music,
            'shutting_chochce' => $shutting_chochce,
            'bivido' => $bivido,
        ]);
    }

    public function shortFilm() {
        $latest_news = DB::table('news')->where('pub_status', 1)
                        ->where('category_id', '!=', 7)
                        ->orderBy('id', 'desc')
                        ->limit(3)->get();
        $all_alapon = DB::table('news')
                        ->where('category_id', 7)
                        ->where('pub_status', 1)
                        ->orderBy('id', 'desc')
                        ->limit(3)->get();
        $populer_news = DB::table('news')
                        ->where('pub_status', 1)
                        ->orderBy('hit_count', 'desc')
                        ->limit(5)->get();

        $shutting_chochce = DB::table('news')
                        ->where('category_id', 8)
                        ->where('pub_status', 1)
                        ->orderBy('id', 'desc')
                        ->limit(3)->get();

        $all_music = DB::table('news')
                        ->where('category_id', 11)
                        ->where('pub_status', 1)
                        ->orderBy('id', 'desc')
                        ->limit(4)->get();
        $movie_reviews = DB::table('news')
                        ->where('category_id', 10)
                        ->where('pub_status', 1)
                        ->orderBy('id', 'desc')
                        ->limit(6)->get();

        $bivido = DB::table('news')
                        ->where('category_id', 9)
                        ->where('pub_status', 1)
                        ->orderBy('id', 'desc')
                        ->limit(4)->get();


        $gallery1 = DB::table('gallery')->where('category_id', '<=', 4)->where('pub_status', 1)->inRandomOrder()->limit(8)->get();
        $gallery2 = DB::table('gallery')->where('category_id', '>', 4)->where('pub_status', 1)->inRandomOrder()->limit(8)->get();

        $trailers = DB::table('trailers')
                        ->where('pub_status', 1)
                        ->orderBy('id', 'desc')->limit(4)->get();
        $popular_movies = DB::table('trailers')
                        ->where('pub_status', 1)
                        ->orderBy('id', 'desc')->limit(4)->get();

        return view('web.layouts.master-content2', [
            'latest_news' => $latest_news,
            'trailers' => $trailers,
            'all_alapon' => $all_alapon,
            'populer_news' => $populer_news,
            'shutting_chochce' => $shutting_chochce,
            'all_music' => $all_music,
            'bivido' => $bivido,
            'movie_reviews' => $movie_reviews,
            'gallery1' => $gallery1,
            'gallery2' => $gallery2,
            'popular_movies' => $popular_movies,
        ]);
    }

    public function drama() {
        $latest_news = DB::table('news')->where('pub_status', 1)
                        ->where('category_id', '!=', 7)
                        ->orderBy('id', 'desc')
                        ->limit(3)->get();
        $all_alapon = DB::table('news')
                        ->where('category_id', 7)
                        ->where('pub_status', 1)
                        ->orderBy('id', 'desc')
                        ->limit(3)->get();
        $populer_news = DB::table('news')
                        ->where('pub_status', 1)
                        ->orderBy('hit_count', 'desc')
                        ->limit(5)->get();

        $shutting_chochce = DB::table('news')
                        ->where('category_id', 8)
                        ->where('pub_status', 1)
                        ->orderBy('id', 'desc')
                        ->limit(3)->get();

        $all_music = DB::table('news')
                        ->where('category_id', 11)
                        ->where('pub_status', 1)
                        ->orderBy('id', 'desc')
                        ->limit(4)->get();
        $movie_reviews = DB::table('news')
                        ->where('category_id', 10)
                        ->where('pub_status', 1)
                        ->orderBy('id', 'desc')
                        ->limit(6)->get();

        $bivido = DB::table('news')
                        ->where('category_id', 9)
                        ->where('pub_status', 1)
                        ->orderBy('id', 'desc')
                        ->limit(4)->get();


        $gallery1 = DB::table('gallery')->where('category_id', '<=', 4)->where('pub_status', 1)->inRandomOrder()->limit(8)->get();
        $gallery2 = DB::table('gallery')->where('category_id', '>', 4)->where('pub_status', 1)->inRandomOrder()->limit(8)->get();

        $trailers = DB::table('trailers')
                        ->where('pub_status', 1)
                        ->orderBy('id', 'desc')->limit(4)->get();
        $popular_movies = DB::table('trailers')
                        ->where('pub_status', 1)
                        ->orderBy('id', 'desc')->limit(5)->get();

        return view('web.layouts.master-content2', [
            'latest_news' => $latest_news,
            'trailers' => $trailers,
            'all_alapon' => $all_alapon,
            'populer_news' => $populer_news,
            'shutting_chochce' => $shutting_chochce,
            'all_music' => $all_music,
            'bivido' => $bivido,
            'movie_reviews' => $movie_reviews,
            'gallery1' => $gallery1,
            'gallery2' => $gallery2,
            'popular_movies' => $popular_movies,
        ]);
    }

    public function newsDetails($title, $id) {

        $id_facke = substr($id, 3);
        $size = strlen($id_facke);
        $id = (int) substr($id_facke, 0, $size - 2);


        $hit_count['hit_count'] = DB::table('news')->where('id', $id)->first()->hit_count + 1;
        DB::table('news')->where('id', $id)->update($hit_count);
        $latest_news = DB::table('news')->where('pub_status', 1)->orderBy('id', 'desc')->limit(4)->get();
        $populer_news = DB::table('news')
                        ->where('pub_status', 1)
                        ->orderBy('hit_count', 'desc')
                        ->limit(5)->get();
        $movie_reviews = DB::table('news')
                        ->where('category_id', 10)
                        ->orderBy('hit_count', 'desc')
                        ->where('pub_status', 1)
                        ->orderBy('id', 'desc')
                        ->limit(6)->get();
        $news = DB::table('news')
                ->join('users', 'news.reporter_id', '=', 'users.id')
                ->join('news_categories', 'news.category_id', '=', 'news_categories.id')
                ->where('news.id', $id)
                ->where('news.pub_status', 1)
                ->select('news.*', 'news_categories.category_name', 'users.first_name', 'users.last_name')
                ->first();

        return view('web.pages.news-details', [
            'news' => $news,
            'latest_news' => $latest_news,
            'movie_reviews' => $movie_reviews,
            'populer_news' => $populer_news]);
    }

    public function contactUs() {
        return view('web.pages.contact');
    }

    public function aboutUs() {
        $gallery1 = DB::table('gallery')->where('category_id', 7)->where('pub_status', 1)->inRandomOrder()->limit(8)->get();
        $gallery2 = DB::table('gallery')->where('category_id', '!=', 7)->where('pub_status', 1)->inRandomOrder()->limit(8)->get();

        return view('web.pages.about',[
            'gallery1' => $gallery1,
            'gallery2' => $gallery2,
        ]);
    }

    public function mainSlider() {
        
    }
    
    public function more(Request $request) {
        return $this->menuPage($request->category_id); 
    }
    
    public function music() {
        return $this->menuPage(11);  
    }
    public function shuttingCholche() {
        return $this->menuPage(8);  
    }
    public function alapon() {
        return $this->menuPage(7);  
    }
    public function movieReview() {
        return $this->menuPage(10);  
    }
    public function bivido() {
        return $this->menuPage(9);  
    }
    
    private function menuPage($category_id) {
        
        $latest_news = DB::table('news')
                ->where('pub_status', 1)
                ->orderBy('id', 'desc')->limit(4)->get();
        
        $all_data = DB::table('news')
                ->where('category_id', $category_id)
                ->where('pub_status', 1)
                ->orderBy('id', 'desc')->limit(20)->get();
        $populer_news = DB::table('news')
                        ->where('pub_status', 1)
                        ->orderBy('hit_count', 'desc')
                        ->limit(5)->get();
        $movie_reviews = DB::table('news')
                        ->where('category_id', 10)
                        ->orderBy('hit_count', 'desc')
                        ->where('pub_status', 1)
                        ->orderBy('id', 'desc')
                        ->limit(6)->get();
        
        $gallery1 = DB::table('gallery')->where('category_id', $category_id)->where('pub_status', 1)->inRandomOrder()->limit(8)->get();
        $gallery2 = DB::table('gallery')->where('category_id', '!=', $category_id)->where('pub_status', 1)->inRandomOrder()->limit(8)->get();

        
        
        return view('web.pages.more', [
            'all_data' => $all_data,
            'latest_news' => $latest_news,
            'movie_reviews' => $movie_reviews,
            'gallery1' => $gallery1,
            'gallery2' => $gallery2,
            'populer_news' => $populer_news]);
    }

}
