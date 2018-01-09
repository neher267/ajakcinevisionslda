<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use DateTime;
use DateTimezone;
use Session;

class TrailerController extends Controller {

    public function trailers() {
        $trailers = DB::table('trailers')->orderBy('id', 'desc')->get();
        $menu = view('backEnd.layouts.super-admin-menu');
        return view('backEnd.trailers.manage-trailer', ['trailers' => $trailers])->with('panel-menu', $menu);
    }

    public function addTrailer() {
        $all_categories = DB::table('news_categories')->orderBy('category_name', 'asc')->get();
        $story_types = DB::table('story_types')->orderBy('story_type_name', 'asc')->get();
        $menu = view('backEnd.layouts.super-admin-menu');
        return view('backEnd.trailers.create-trailer', ['all_categories' => $all_categories, 'story_types' => $story_types])->with('panel-menu', $menu);
    }

    public function postAddTrailer(Request $request) {

        $this->validate($request, [
            'title' => 'required|max:255',
            'trailer_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data = array();
        $image = $request->file('trailer_image');
        $image_name = time() . str_random(5) . '.' . strtolower($image->getClientOriginalExtension());
        $path = public_path('\images\trailer');
        $image->move($path, $image_name);

        $data['trailer_image'] = '/images/trailer/' . $image_name;
        $data['category_id'] = $request->category_id;
        $data['title'] = $request->title;
        $data['story_type_id'] = $request->story_type_id;
        $data['summary_of_story'] = $request->summary_of_story;
        $data['cast'] = $request->cast;
        $data['shooting_location'] = $request->shooting_location;
        $data['script_writer'] = $request->script_writer;
        $data['producer_name'] = $request->producer_name;
        $data['director_name'] = $request->director_name;
        $data['released_on'] = $request->released_on;
        $data['released_no_of_hall'] = $request->released_no_of_hall;
        $data['telecast_chanel'] = $request->telecast_chanel;
        $data['on_air_time'] = $request->on_air_time;
        $data['video_url'] = $request->video_url;
        $data['created_at'] = new DateTime('now', new DateTimezone('Asia/Dhaka'));

        DB::table('trailers')->insert($data);
        \Session::flash('message_success', 'Trailer Saved Successfully!');
        return redirect('/trailers');
    }

    public function postEditTrailer(Request $request) {

        $this->validate($request, [
            'title' => 'required|max:255',
            'trailer_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $data = array();
        $image = $request->file('trailer_image');
        if (!empty($image)) {
            $image_name = time() . str_random(5) . '.' . strtolower($image->getClientOriginalExtension());
            $path = public_path('\images\trailer');
            $image->move($path, $image_name);
            $data['trailer_image'] = '/images/trailer/' . $image_name;
        }

        $data['category_id'] = $request->category_id;
        $data['title'] = $request->title;
        $data['story_type_id'] = $request->story_type_id;
        $data['summary_of_story'] = $request->summary_of_story;
        $data['cast'] = $request->cast;
        $data['shooting_location'] = $request->shooting_location;
        $data['script_writer'] = $request->script_writer;
        $data['producer_name'] = $request->producer_name;
        $data['director_name'] = $request->director_name;
        $data['released_on'] = $request->released_on;
        $data['released_no_of_hall'] = $request->released_no_of_hall;
        $data['telecast_chanel'] = $request->telecast_chanel;
        $data['on_air_time'] = $request->on_air_time;
        $data['video_url'] = $request->video_url;
        $data['created_at'] = new DateTime('now', new DateTimezone('Asia/Dhaka'));

        DB::table('trailers')->where('id',$request->id)->update($data);
        \Session::flash('message_success', 'Trailer Update Successfully!');
        return redirect('/trailers');
    }

    public function editTrailer($id) {
        $trailer = DB::table('trailers')->where('id', $id)->first();
        $all_categories = DB::table('news_categories')->orderBy('category_name', 'asc')->get();
        $story_types = DB::table('story_types')->orderBy('story_type_name', 'asc')->get();
        $menu = view('backEnd.layouts.super-admin-menu');

        return view('backEnd.trailers.edit-trailer', ['all_categories' => $all_categories, 'story_types' => $story_types, 'trailer' => $trailer])->with('panel-menu', $menu);
    }

    public function trailerPublish($id) {
        $data = array();
        $data['pub_status'] = 1;
        $data['updated_at'] = new DateTime('now', new DateTimezone('Asia/Dhaka'));

        DB::table('trailers')->where('id', $id)->update($data);
        return redirect('/trailers');
    }

    public function trailerUnpublish($id) {
        $data = array();
        $data['pub_status'] = 0;
        $data['updated_at'] = new DateTime('now', new DateTimezone('Asia/Dhaka'));

        DB::table('trailers')->where('id', $id)->update($data);
        return redirect('/trailers');
    }

    public function deleteTrailer(Request $request) {
        DB::table('trailers')->where('id',$request->id)->delete();
        return redirect('/trailers');
    }

}
