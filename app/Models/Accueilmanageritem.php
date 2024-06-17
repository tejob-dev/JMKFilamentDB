<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Accueilmanageritem extends Model
{
    use HasFactory;
    use Searchable;

    protected $guarded = [];

    protected $searchableFields = ['*'];

    public function accueilmanager()
    {
        return $this->belongsTo(Accueilmanager::class);
    }

    public function contentViews()
    {
        return $this->morphToMany(ContentView::class, 'content_viewable');
    }
}
