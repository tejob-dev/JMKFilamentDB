<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Equipe extends Model
{
    use HasFactory;
    use Searchable;

    protected $guarded = [];

    protected $searchableFields = ['*'];

    public function accueiltemoin()
    {
        return $this->belongsTo(Accueiltemoin::class);
    }

    public function contentViews()
    {
        // return $this->morphTo();
        // return $this->belongsToMany(ContentView::class, 'content_viewables', 'content_viewable_id', 'content_view_id');
        return $this->morphToMany(ContentView::class, 'content_viewable', 'content_viewables', 'content_viewable_id', 'content_view_id');
        // return $this->morphedByMany(Accueilserviceitem::class, 'content_viewables');
    }
}
