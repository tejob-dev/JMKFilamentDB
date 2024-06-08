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

            $view  = View::make('frontend.services.index', compact('slug'));
    
            return $view;
        }else{

            $firstservice = Accueilserviceitem::first();

            if($firstservice){
                $view  = View::make('frontend.services.index', ['slug' => $firstservice->slug]);
    
                return $view;
            }

        }

        return redirect('/');

    }

}
