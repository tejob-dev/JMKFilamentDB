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
        // return $this->morphTo();
        // return $this->belongsToMany(ContentView::class, 'content_viewables', 'content_viewable_id', 'content_view_id');
        return $this->morphToMany(ContentView::class, 'content_viewable', 'content_viewables', 'content_viewable_id', 'content_view_id');
        // return $this->morphedByMany(Accueilserviceitem::class, 'content_viewables');
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
