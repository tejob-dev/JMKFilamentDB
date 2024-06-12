<?php

namespace App\Models;

use App\Models\ContentView;
use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Accueilserviceitem extends Model
{
    use HasFactory;
    use Searchable;

    protected $guarded = [];

    protected $searchableFields = ['*'];

    public function accueilservice()
    {
        return $this->belongsTo(Accueilservice::class);
    }

    public function contentViews()
    {
        return $this->morphMany(ContentView::class, 'content_viewable');
    }

    
    // Method to format the 'boutonlien' attribute
    public static function formatBoutonLien($boutonlien, $title)
    {
        // Add your formatting logic here
        // For example, you can prepend 'http://' if it's not present
        $slug = $boutonlien;
        if($boutonlien != null){
            $slug = formatSlug($boutonlien, "services/", ".html");

        }else{
            $slug = formatSlug($title, "services/", ".html");
        }

        // Other formatting logic can be added here

        return $slug;
    }
}
