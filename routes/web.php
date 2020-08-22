<?php
use App\Movie;
use App\Advert;
use App\Wallpaper;
use App\Page_visit;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', function () {

//     $total_page_visit = Page_visit::count();

//     if (!Page_visit::where('user_ip', $_SERVER['REMOTE_ADDR'])->first()) {
//         $visit = new Page_visit;
//         $visit->user_ip = $_SERVER['REMOTE_ADDR'];
//         $visit->save();
//     }
//     // return $total_page_visit;
//     $ads = Advert::orderBy('id', 'asc')->paginate(4);
//     $slide = Movie::orderBy('id', 'desc')->paginate(3);
//     $f_movies = Movie::where('category', 'Foregin Movies')->orderBy('id', 'desc')->paginate(5);
//     $ani_movies = Movie::where('category', 'Animation Movies')->orderBy('id', 'desc')->paginate(5);
//     $a_movies = Movie::where('category', 'African Movies')->orderBy('id', 'desc')->paginate(5);
//     return view('welcome', compact('slide', 'ani_movies', 'f_movies','a_movies', 'ads', 'total_page_visit'));
// })->name('welcome');

// Route::get('/movie/{id}/{name}', function ($id, $name) {
//     $ads = Advert::orderBy('id', 'asc')->paginate(4);
//     $movie = Movie::findOrFail($id);
//     $name = $movie->m_name;
//     return view('singlemovie', compact('movie', 'ads'));
// });


Route::get('/', function () {
    
    if (!Page_visit::where('user_ip', $_SERVER['REMOTE_ADDR'])->first()) {
        $visit = new Page_visit;
        $visit->user_ip = $_SERVER['REMOTE_ADDR'];
        $visit->save();
    }

    $slide = Movie::orderBy('id', 'desc')->paginate(6);
    $wallpapers = Wallpaper::orderBy('id', 'desc')->paginate(6);
    $ads = Advert::orderBy('id', 'asc')->paginate(6);
    $f_movies = Movie::where('category', 'Foregin Movies')->orderBy('id', 'desc')->paginate(5);
    $ani_movies = Movie::where('category', 'Animation Movies')->orderBy('id', 'desc')->paginate(5);
    $a_movies = Movie::where('category', 'African Movies')->orderBy('id', 'desc')->paginate(5);
    return view('welcome', compact('slide', 'ani_movies', 'f_movies', 'a_movies', 'wallpapers', 'ads'));
})->name('home');

Route::get('/movie/{id}/{name}', function ($id, $name) {
    $movie = Movie::findOrFail($id);
    $name = $movie->m_name;
    return view('single_movie', compact('movie'));
});

Route::get('/movies', function () {
    $count = Movie::count();
    // $ads = Advert::orderBy('id', 'asc')->paginate(4);
    $all_movies = Movie::orderBy('id', 'desc')->paginate(12);
    return view('movies', compact('count','all_movies'));
})->name('movies');

Route::get('/wallpapers', function () {
    $all_wallpapers = Wallpaper::orderBy('id', 'desc')->paginate(12);
    return view('wallpapers', compact('all_wallpapers'));
})->name('wallpapers');

Route::get('/search', function () {
    if(!isset($_GET['query'])){
        return view('404');
    }
    $search_query = $_GET['query'];
    $search_result = Movie::where([
        ['m_name', 'LIKE', '%'.$search_query.'%']
    ])->paginate(12);
    return view('search', compact('search_result', 'search_query'));
});


Route::get('auth/validate', 'Auth\authenticate@validateAccount')->name('validate.account');
Route::get('/logout', 'Auth\authenticate@logout')->name('logout');

Route::group(['prefix' => 'auth', 'middleware' => 'AccountRegulator'], function () {

    Route::get('login', 'Auth\authenticate@show_login')->name('login');
    Route::get('register', 'Auth\authenticate@show_register')->name('register');
    Route::post('login', 'Auth\authenticate@auth_attempt')->name('authenticate');
    Route::post('register', 'Auth\authenticate@register')->name('user.register');

});


// admin route group
Route::group(['prefix' => 'admin', 'middleware' => ['AuthenticateAccount', 'AdminRouteGuard']], function () {
    Route::get('/', 'AdminController@index')->name('admin.dashboard');

    // movies route
    Route::get('/add_movie', 'AdminController@add_movie_page')->name('add_movie_page');
    Route::post('/add_movie', 'AdminController@add_movie')->name('add_movie');
    Route::get('/all_movies', 'AdminController@all_movies_page')->name('all_movies_page');
    Route::get('/all_movies/{id}/delete', 'AdminController@delete_movie')->name('delete');
    Route::get('/all_movies/{id}/edit', 'AdminController@edit_movie_page')->name('edit_movie_page');
    Route::post('/all_movies/{id}/edit', 'AdminController@edit_movie')->name('edit_movie');

    // adverts route
    Route::get('/add_advert', 'AdminController@add_advert_page')->name('add_advert_page');
    Route::post('/add_advert', 'AdminController@add_advert')->name('add_advert');
    Route::get('/all_advert', 'AdminController@all_adverts_page')->name('all_adverts_page');
    Route::get('/all_advert/{id}/delete', 'AdminController@delete_advert')->name('delete_advert');

    // adverts route
    Route::get('/add_wallpaper', 'AdminController@add_wallpaper_page')->name('add_wallpaper_page');
    Route::post('/add_wallpaper', 'AdminController@add_wallpaper')->name('add_wallpaper');
    Route::get('/all_wallpaper', 'AdminController@all_wallpapers_page')->name('all_wallpapers_page');
    Route::get('/all_wallpaper/{id}/delete', 'AdminController@delete_wallpaper')->name('delete_wallpaper');
});

// user route groupe
Route::group(['prefix' => 'dashboard', 'middleware' => ['AuthenticateAccount', 'UserRouteGuard']], function () {
    Route::get('/', 'UserController@index')->name('user.dashboard');

});

