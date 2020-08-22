<?php

namespace App\Http\Controllers;

use App\Admin;
use App\User;
use App\Movie;
use App\Advert;
use App\Wallpaper;
use App\Page_visit;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    { 
        $visit_count = '0';
        $visit_count = Page_visit::count();
        $user_count = User::count();
        $movie_count = Movie::count();
        $wallpaper_count = Wallpaper::count();
        $advert_count = Advert::count();
        return view('admin.index', compact('movie_count','wallpaper_count', 'advert_count', 'visit_count', 'user_count'));
    }

    // movie management section amd all relevant functions
    public function add_movie_page()
    {
        return view('admin.add_movie');
    }
    public function add_movie(Request $request)
    {
        $request->validate([
            'movie_name' => 'required',
            'movie_size' => 'required',
            'download_link' => 'required',
            // 'ytb_link' => 'required',
            'category' => 'required',
            'photo' => 'required|file|mimes:png,jpg,jpeg'
        ]);
        $save_movie = new Movie;
        $save_movie->m_name = $request->movie_name;
        $save_movie->m_size = $request->movie_size;
        $save_movie->d_link = $request->download_link;
        $save_movie->ytb_link = $request->youtube_trailer_link;
        $save_movie->overview = $request->overview;
        $save_movie->category = $request->category;

        // generate random code to store name
        for( $Id= mt_rand(1,9), $increment = 1; $increment < 8; $increment++){
            $Id .= mt_rand(0,9);
        }

        $extension = $request->photo->extension();
        $movie_name = $request->movie_name.$Id.".".$extension;

        $save_movie->photo = 'movies/'.$movie_name;
        $save_movie->save();
        $request->file('photo')->storeAs('public/movies', $movie_name);

        return redirect()->back()->with('success', 'Your movie upload was successfull');
    }
     /**
     * Show all movies in application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function all_movies_page()
    {
        $count = Movie::count();
        $movies = Movie::orderBy('id', 'desc')->paginate(12);
        return view('admin.all_movies',compact('movies', 'count'));
    }
    public function delete_movie($id)
    {
        $delete = Movie::findOrFail($id);
        $delete->delete();
        return redirect()->back()->with('success', " You've successfully deleted a movie");
    }
    public function edit_movie_page($id)
    {
        $movie = Movie::findOrFail($id);
        return view('admin.edit_movie',compact('movie'));
    }
    public function edit_movie(Request $request, $id)
    {
        $request->validate([
            'movie_name' => 'required',
            'movie_size' => 'required',
            'download_link' => 'required',
            'category' => 'required',
        ]);
        $movie = Movie::findOrFail($id);
        $movie->m_name = $request->movie_name;
        $movie->m_size = $request->movie_size;
        $movie->d_link = $request->download_link;
        $movie->ytb_link = $request->youtube_trailer_link;
        $movie->overview = $request->overview;
        $movie->category = $request->category;
        $movie->save();
        return redirect()->back()->with('success', 'This Movie '.$request->movie_name.' has been successfully Updated');
    }


    // adverts management section and all functions
    public function add_advert_page()
    {
        return view('admin.add_advert');
    }

    public function all_adverts_page()
    {
        $adverts = Advert::orderBy('id', 'desc')->paginate(12);
        return view('admin.all_adverts', compact('adverts'));
    }
    public function add_advert(Request $request)
    {
        $request->validate([
            'photo' => 'required|file|mimes:png,jpg,jpeg'
        ]);


        $save_ads = new Advert;
        $save_ads->ads= $request->ads;
        $save_ads->ads_link = $request->ads_link;

        // generate random code to store name
        for( $Id= mt_rand(1,9), $increment = 1; $increment < 8; $increment++){
            $Id .= mt_rand(0,9);
        }

        $extension = $request->photo->extension();
        $ads_name = $Id.".".$extension;

        $save_ads->photo = 'adverts/'.$ads_name;
        $save_ads->save();

        $request->file('photo')->storeAs('public/adverts', $ads_name);
        // $path = $request->photo->storeAs('movies', $movie_name);

        return redirect()->back()->with('success', 'You have successfully posted an advert');
    }
    public function delete_advert($id)
    {
        $delete = Advert::findOrFail($id);
        $delete->delete();
        return redirect()->back()->with('success', " You've successfully deleted an advert");
    }




    // Wallpaper management section and all functions
    public function add_wallpaper_page()
    {
        return view('admin.Add_wallpaper');
    }

    public function all_wallpapers_page()
    {
        $wallpapers = Wallpaper::orderBy('id', 'desc')->paginate(12);
        return view('admin.all_wallpapers', compact('wallpapers'));
    }

    public function add_wallpaper(Request $request)
    {
        $request->validate([
            'photo' => 'required|file|mimes:png,jpg,jpeg'
        ]);


        $save_ = new Wallpaper;
        $save_->name = $request->name;

        // generate random code to store name
        for( $Id= mt_rand(1,9), $increment = 1; $increment < 8; $increment++){
            $Id .= mt_rand(0,9);
        }

        $extension = $request->photo->extension();
        $wallpaper_name = $Id.".".$extension;

        $save_->photo = 'wallpapers/'.$wallpaper_name;
        $save_->save();

        $request->file('photo')->storeAs('public/wallpapers', $wallpaper_name);
        // $path = $request->photo->storeAs('movies', $movie_name);

        return redirect()->back()->with('success', 'You have successfully posted a new wallpaper & it is now avialable for download');
    }
    public function delete_wallpaper($id)
    {
        $delete = Wallpaper::findOrFail($id);
        $delete->delete();
        return redirect()->back()->with('success', " You've successfully deleted a wallpaper");
    }
}
