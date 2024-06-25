<?php

namespace App\Http\Controllers;

use App\Models\Video;
use App\Models\Equipe;
use App\Models\Impact;
use App\Models\Valeur;
use App\Models\Vision;
use App\Models\Culture;
use App\Models\Mission;
use App\Models\Produit;
use App\Models\Gallerie;
use App\Models\Actualite;
use App\Models\Formation;
use App\Models\Opportunite;
use App\Models\Publication;
use Illuminate\Http\Request;
use App\Models\Accueilclientitem;
use App\Models\Accueilprojetitem;
use App\Models\Accueilmanageritem;
use App\Models\Accueilserviceitem;
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

    public function projets($slug = null){


        if($slug){

            $allitems = Accueilprojetitem::get();
            $itemfit = $allitems->filter(function ($item) use($slug) {
                return preg_match("/$slug/i",formatSlug($item->title, "projets/", ".html")) == true ;
            });
            $slugid = $itemfit?->first()->id??null;
            // dd($slug, $itemfit);
            if(!$slugid) return redirect('/');

            $view  = View::make('frontend.projets.index', ['slug' => $slugid]);
    
            return $view;
        }else{

            $firstitem = Accueilprojetitem::first();

            if($firstitem){
                $view  = View::make('frontend.projets.index', ['slug' => $firstitem->id]);
    
                return $view;
            }

        }

        return redirect('/');

    }
    
    public function missions($slug = null){


        if($slug){

            $allitems = Mission::get();
            $itemfit = $allitems->filter(function ($item) use($slug) {
                return preg_match("/$slug/i",formatSlug($item->title, "missions/", ".html")) == true ;
            });
            $slugid = $itemfit?->first()->id??null;
            // dd($slug, $itemfit);
            if(!$slugid) return redirect('/');

            $view  = View::make('frontend.missions.index', ['slug' => $slugid]);
    
            return $view;
        }else{

            $firstitem = Mission::first();

            if($firstitem){
                $view  = View::make('frontend.missions.index', ['slug' => $firstitem->id]);
    
                return $view;
            }

        }

        return redirect('/');

    }
    
    public function visions($slug = null){


        if($slug){

            $allitems = Vision::get();
            $itemfit = $allitems->filter(function ($item) use($slug) {
                return preg_match("/$slug/i",formatSlug($item->title, "missions/", ".html")) == true ;
            });
            $slugid = $itemfit?->first()->id??null;
            // dd($slug, $itemfit);
            if(!$slugid) return redirect('/');

            $view  = View::make('frontend.visions.index', ['slug' => $slugid]);
    
            return $view;
        }else{

            $firstitem = Vision::first();

            if($firstitem){
                $view  = View::make('frontend.visions.index', ['slug' => $firstitem->id]);
    
                return $view;
            }

        }

        return redirect('/');

    }
    
    public function valeurs($slug = null){


        if($slug){

            $allitems = Valeur::get();
            $itemfit = $allitems->filter(function ($item) use($slug) {
                return preg_match("/$slug/i",formatSlug($item->title, "valeurs/", ".html")) == true ;
            });
            $slugid = $itemfit?->first()->id??null;
            // dd($slug, $itemfit);
            if(!$slugid) return redirect('/');

            $view  = View::make('frontend.valeurs.index', ['slug' => $slugid]);
    
            return $view;
        }else{

            $firstitem = Valeur::first();

            if($firstitem){
                $view  = View::make('frontend.valeurs.index', ['slug' => $firstitem->id]);
    
                return $view;
            }

        }

        return redirect('/');

    }
    
    public function equipes($slug = null){


        if($slug){

            $allitems = Equipe::get();
            $itemfit = $allitems->filter(function ($item) use($slug) {
                return preg_match("/$slug/i",formatSlug($item->title, "equipes/", ".html")) == true ;
            });
            $slugid = $itemfit?->first()->id??null;
            // dd($slug, $itemfit);
            if(!$slugid) return redirect('/');

            $view  = View::make('frontend.equipes.index', ['slug' => $slugid]);
    
            return $view;
        }else{

            $firstitem = Equipe::first();

            if($firstitem){
                $view  = View::make('frontend.equipes.index', ['slug' => $firstitem->id]);
    
                return $view;
            }

        }

        return redirect('/');

    }
    
    public function produits($slug = null){


        if($slug){

            $allitems = Produit::get();
            $itemfit = $allitems->filter(function ($item) use($slug) {
                return preg_match("/$slug/i",formatSlug($item->title, "produits/", ".html")) == true ;
            });
            $slugid = $itemfit?->first()->id??null;
            // dd($slug, $itemfit);
            if(!$slugid) return redirect('/');

            $view  = View::make('frontend.produits.index', ['slug' => $slugid]);
    
            return $view;
        }else{

            $firstitem = Produit::first();

            if($firstitem){
                $view  = View::make('frontend.produits.index', ['slug' => $firstitem->id]);
    
                return $view;
            }

        }

        return redirect('/');

    }
    
    public function impacts($slug = null){


        if($slug){

            $allitems = Impact::get();
            $itemfit = $allitems->filter(function ($item) use($slug) {
                return preg_match("/$slug/i",formatSlug($item->title, "impacts/", ".html")) == true ;
            });
            $slugid = $itemfit?->first()->id??null;
            // dd($slug, $itemfit);
            if(!$slugid) return redirect('/');

            $view  = View::make('frontend.impacts.index', ['slug' => $slugid]);
    
            return $view;
        }else{

            $firstitem = Impact::first();

            if($firstitem){
                $view  = View::make('frontend.impacts.index', ['slug' => $firstitem->id]);
    
                return $view;
            }

        }

        return redirect('/');

    }
    
    public function cultures($slug = null){


        if($slug){

            $allitems = Culture::get();
            $itemfit = $allitems->filter(function ($item) use($slug) {
                return preg_match("/$slug/i",formatSlug($item->title, "cultures/", ".html")) == true ;
            });
            $slugid = $itemfit?->first()->id??null;
            // dd($slug, $itemfit);
            if(!$slugid) return redirect('/');

            $view  = View::make('frontend.cultures.index', ['slug' => $slugid]);
    
            return $view;
        }else{

            $firstitem = Culture::first();

            if($firstitem){
                $view  = View::make('frontend.cultures.index', ['slug' => $firstitem->id]);
    
                return $view;
            }

        }

        return redirect('/');

    }
    
    public function opportunits($slug = null){


        if($slug){

            $allitems = Opportunite::get();
            $itemfit = $allitems->filter(function ($item) use($slug) {
                return preg_match("/$slug/i",formatSlug($item->title, "opportunites/", ".html")) == true ;
            });
            $slugid = $itemfit?->first()->id??null;
            // dd($slug, $itemfit);
            if(!$slugid) return redirect('/');

            $view  = View::make('frontend.opportunits.index', ['slug' => $slugid]);
    
            return $view;
        }else{

            $firstitem = Opportunite::first();

            if($firstitem){
                $view  = View::make('frontend.opportunits.index', ['slug' => $firstitem->id]);
    
                return $view;
            }

        }

        return redirect('/');

    }
    
    public function actualites($slug = null){


        if($slug){

            $allitems = Actualite::get();
            $itemfit = $allitems->filter(function ($item) use($slug) {
                return preg_match("/$slug/i",formatSlug($item->title, "actualites/", ".html")) == true ;
            });
            $slugid = $itemfit?->first()->id??null;
            // dd($slug, $itemfit);
            if(!$slugid) return redirect('/');

            $view  = View::make('frontend.actualites.index', ['slug' => $slugid]);
    
            return $view;
        }else{

            $firstitem = Actualite::first();

            if($firstitem){
                $view  = View::make('frontend.actualites.index', ['slug' => $firstitem->id]);
    
                return $view;
            }

        }

        return redirect('/');

    }
    
    public function publications($slug = null){


        if($slug){

            $allitems = Publication::get();
            $itemfit = $allitems->filter(function ($item) use($slug) {
                return preg_match("/$slug/i",formatSlug($item->title, "publications/", ".html")) == true ;
            });
            $slugid = $itemfit?->first()->id??null;
            // dd($slug, $itemfit);
            if(!$slugid) return redirect('/');

            $view  = View::make('frontend.publications.index', ['slug' => $slugid]);
    
            return $view;
        }else{
            
            $firstitem = Publication::first();

            if($firstitem){
                $view  = View::make('frontend.publications.index', ['slug' => $firstitem->id]);
    
                return $view;
            }

        }

        return redirect('/');

    }
    
    public function photos($slug = null){


        if($slug){

            $allitems = Gallerie::get();
            $itemfit = $allitems->filter(function ($item) use($slug) {
                return preg_match("/$slug/i",formatSlug($item->title, "photos/", ".html")) == true ;
            });
            $slugid = $itemfit?->first()->id??null;
            // dd($slug, $itemfit);
            if(!$slugid) return redirect('/');

            $view  = View::make('frontend.photos.index', ['slug' => $slugid]);
    
            return $view;
        }else{
            
            $firstitem = Gallerie::first();

            if($firstitem){
                $view  = View::make('frontend.photos.index', ['slug' => $firstitem->id]);
    
                return $view;
            }

        }

        return redirect('/');

    }
    
    public function videos($slug = null){


        if($slug){

            $allitems = Video::get();
            $itemfit = $allitems->filter(function ($item) use($slug) {
                return preg_match("/$slug/i",formatSlug($item->title, "videos/", ".html")) == true ;
            });
            $slugid = $itemfit?->first()->id??null;
            // dd($slug, $itemfit);
            if(!$slugid) return redirect('/');

            $view  = View::make('frontend.videos.index', ['slug' => $slugid]);
    
            return $view;
        }else{
            
            $firstitem = Video::first();

            if($firstitem){
                $view  = View::make('frontend.videos.index', ['slug' => $firstitem->id]);
    
                return $view;
            }

        }

        return redirect('/');

    }
    
    public function formations($slug = null){


        if($slug){

            $allitems = Formation::get();
            $itemfit = $allitems->filter(function ($item) use($slug) {
                return preg_match("/$slug/i",formatSlug($item->title, "formations/", ".html")) == true ;
            });
            $slugid = $itemfit?->first()->id??null;
            // dd($slug, $itemfit);
            if(!$slugid) return redirect('/');

            $view  = View::make('frontend.formations.index', ['slug' => $slugid]);
    
            return $view;
        }else{
            
            $firstitem = Formation::first();

            if($firstitem){
                $view  = View::make('frontend.formations.index', ['slug' => $firstitem->id]);
    
                return $view;
            }

        }

        return redirect('/');

    }
    
    public function managers($slug = null){


        if($slug){

            $allitems = Accueilmanageritem::get();
            $itemfit = $allitems->filter(function ($item) use($slug) {
                return preg_match("/$slug/i",formatSlug($item->title, "managers/", ".html")) == true ;
            });
            $slugid = $itemfit?->first()->id??null;
            // dd($slug, $itemfit);
            if(!$slugid) return redirect('/');

            $view  = View::make('frontend.managers.index', ['slug' => $slugid]);
    
            return $view;
        }else{
            
            $firstitem = Accueilmanageritem::first();

            if($firstitem){
                $view  = View::make('frontend.managers.index', ['slug' => $firstitem->id]);
    
                return $view;
            }

        }

        return redirect('/');

    }
    
    public function clients($slug = null){


        if($slug){

            $allitems = Accueilclientitem::get();
            $itemfit = $allitems->filter(function ($item) use($slug) {
                return preg_match("/$slug/i",formatSlug($item->title, "clients/", ".html")) == true ;
            });
            $slugid = $itemfit?->first()->id??null;
            // dd($slug, $itemfit);
            if(!$slugid) return redirect('/');

            $view  = View::make('frontend.clients.index', ['slug' => $slugid]);
    
            return $view;
        }else{
            
            $firstitem = Accueilclientitem::first();

            if($firstitem){
                $view  = View::make('frontend.clients.index', ['slug' => $firstitem->id]);
    
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

                $slug = $cid;
                $view  = View::make('frontend.clients.index', compact('slug'));
        
                return $view;
            }elseif($cname == "Formation"){

                $slug = $cid;
                $view  = View::make('frontend.formations.index', compact('slug'));
        
                return $view;
            }elseif($cname == "Accueilmanageritem"){

                $slug = $cid;
                $view  = View::make('frontend.managers.index', compact('slug'));
        
                return $view;
            }elseif($cname == "Actualite"){

                $slug = $cid;
                $view  = View::make('frontend.actualites.index', compact('slug'));
        
                return $view;
            }elseif($cname == "Equipe"){

                $slug = $cid;
                $view  = View::make('frontend.equipes.index', compact('slug'));
        
                return $view;
            }elseif($cname == "Accueilprojetitem"){

                $slug = $cid;
                $view  = View::make('frontend.projets.index', compact('slug'));
        
                return $view;
            }elseif($cname == "Accueilprojetitem"){

                $slug = $cid;
                $view  = View::make('frontend.projets.index', compact('slug'));
        
                return $view;
            }elseif($cname == "Publication"){

                $slug = $cid;
                $view  = View::make('frontend.publications.index', compact('slug'));
        
                return $view;
            }elseif($cname == "Gallerie"){

                $slug = $cid;
                $view  = View::make('frontend.photos.index', compact('slug'));
        
                return $view;
            }elseif($cname == "Opportunite"){

                $slug = $cid;
                $view  = View::make('frontend.opportunits.index', compact('slug'));
        
                return $view;
            }elseif($cname == "Culture"){

                $slug = $cid;
                $view  = View::make('frontend.cultures.index', compact('slug'));
        
                return $view;
            }elseif($cname == "Impact"){

                $slug = $cid;
                $view  = View::make('frontend.impacts.index', compact('slug'));
        
                return $view;
            }elseif($cname == "Produit"){

                $slug = $cid;
                $view  = View::make('frontend.produits.index', compact('slug'));
        
                return $view;
            }elseif($cname == "Valeur"){

                $slug = $cid;
                $view  = View::make('frontend.valeurs.index', compact('slug'));
        
                return $view;
            }elseif($cname == "Vision"){

                $slug = $cid;
                $view  = View::make('frontend.visions.index', compact('slug'));
        
                return $view;
            }elseif($cname == "Mission"){

                $slug = $cid;
                $view  = View::make('frontend.missions.index', compact('slug'));
        
                return $view;
            }elseif($cname == "Video"){

                $slug = $cid;
                $view  = View::make('frontend.videos.index', compact('slug'));
        
                return $view;
            }

        }

        return redirect('/administration');

    }

}
