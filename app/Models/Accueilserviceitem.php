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
}
