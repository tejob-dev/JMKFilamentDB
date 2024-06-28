<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CompositeView extends Model
{
    use HasFactory;
    use Searchable;

    protected $guarded = [];

    protected $searchableFields = ['*'];

    protected $table = 'composite_views';

    public function contentViews()
    {
        return $this->hasMany(ContentView::class);
    }

    // public function contentViews()
    // {
    //     // return $this->morphTo();
    //     // return $this->belongsToMany(ContentView::class, 'content_viewables', 'content_viewable_id', 'content_view_id');
    //     return $this->morphToMany(ContentView::class, 'content_viewable', 'content_viewables', 'content_viewable_id', 'content_view_id');
    //     // return $this->morphedByMany(Accueilserviceitem::class, 'content_viewables');
    // }
}
