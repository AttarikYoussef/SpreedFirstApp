<?php

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

use App\Rssinfo;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Route::get('/contact', function () {

    /*
    $infos = Rssinfo::all();
    //DB::table('rssinfo')->get();
    foreach($infos as $info){
        echo $info->source;
    }

    $rssnew = new Rssinfo();
    $rssnew->category="test";
    $rssnew->title="test";
    $rssnew->description="test";
    $rssnew->media="test";
    $rssnew->pubDate="2021-06-02";
    $rssnew->source="test";
    $rssnew->save();
    echo "Ajouter Avec Succes";
*/

    $content = file_get_contents("https://www.france24.com/fr/rss");
 
    // Instantiate XML element
    $a = new SimpleXMLElement($content);
        
    echo "<ul>";
        
    foreach($a->channel->item as $entry) {
    echo "<li><a href='$entry->link' title='$entry->title'>" . $entry->title . "</a></li>";
    }
        
    echo "</ul>";

});
