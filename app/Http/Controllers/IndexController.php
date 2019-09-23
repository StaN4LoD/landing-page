<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Page;
use App\People;
use App\Portfolio;
use App\Service;
use DB;

class IndexController extends Controller
{
    //

    public function execute (Request $request) {

    $pages = Page::all();
    $peoples = People::take(3)->get();
    $portfolios = Portfolio::get(array('name', 'filter', 'images'));
    $services = Service::where('id', '<', 20)->get();

    $tags = DB::table('portfolios')->distinct()->pluck('filter');

    $menu = array();

    foreach ($pages as $page) {

            $item = array('title'=>$page->name, 'alias'=>$page->alias);
            array_push($menu, $item);
    }

    // Статические пункты меню
    $item = array('title'=>'Service', 'alias'=>'service');
    array_push($menu, $item);

    $item = array('title'=>'Portfolio', 'alias'=>'Portfolio');
    array_push($menu, $item);

    $item = array('title'=>'Clients', 'alias'=>'clients');
    array_push($menu, $item);

    $item = array('title'=>'Team', 'alias'=>'team');
    array_push($menu, $item);

    $item = array('title'=>'Contact', 'alias'=>'contact');
    array_push($menu, $item);



    return view('site.index', array(

                                        'menu'=>$menu,
                                        'pages'=>$pages,
                                        'services'=>$services,
                                        'portfolios'=>$portfolios,
                                        'peoples'=>$peoples,
                                        'tags'=>$tags

                                        ));


    }

}
