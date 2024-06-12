<?php

namespace App\Http\Controllers;

use App\Models\Accueilserviceitem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class FrontendController extends Controller
{
    //
    public function services($slug = null){


        if($slug){

            $allservices = Accueilserviceitem::get();
            $itemfit = $allservices->filter(function ($item) use($slug) {
                return preg_match("/$slug/i",formatSlug($item->title, "services/", ".html")) == true ;
            });
            $slugid = $itemfit?->first()->id??null;
            // dd($slug, $itemfit);
            if(!$slugid) return redirect('/');

            $view  = View::make('frontend.services.index', ['slug' => $slugid]);
    
            return $view;
        }else{

            $firstservice = Accueilserviceitem::first();

            if($firstservice){
                $view  = View::make('frontend.services.index', ['slug' => $firstservice->id]);
    
                return $view;
            }

        }

        return redirect('/');

    }
    
    public function makePreview($cid = null, $cname = null){

        if(!$cid) return redirect('/administration');

        if($cname){

            if($cname == "Accueilserviceitem"){
                $slug = $cid;
                $view  = View::make('frontend.services.index', compact('slug'));
        
                return $view;
            }elseif($cname == "Accueilclientitem"){

                return redirect('/administration');
            }

        }

        return redirect('/administration');

    }

}
