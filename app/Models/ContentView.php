<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Support\Facades\URL;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ContentView extends Model
{
    use HasFactory;
    use Searchable;

    protected $guarded = [];

    protected $searchableFields = ['*'];

    protected $table = 'content_views';

    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(function (Builder $builder) {
            // Add your global scope filtering logic here
            // For example:
            // if(URL::getRequest()->getPathInfo() == "/administration/content-views")
            // $builder->with("content_viewable");
        });
    }

    public function contentViewType()
    {
        return $this->belongsTo(ContentViewType::class);
    }

    // public function content_viewable()
    // {
    //     return $this->morphTo();
    // }

    public function accueilserviceitems()
    {
        return $this->morphedByMany(
            Accueilserviceitem::class,
            'content_viewable'
        );
    }

    public function formations()
    {
        return $this->morphedByMany(Formation::class, 'content_viewable');
    }

    public function accueilmanageritems()
    {
        return $this->morphedByMany(
            Accueilmanageritem::class,
            'content_viewable'
        );
    }

    public function accueilclientitems()
    {
        return $this->morphedByMany(
            Accueilclientitem::class,
            'content_viewable'
        );
    }

    public function actualites()
    {
        return $this->morphedByMany(Actualite::class, 'content_viewable');
    }

    public function equipes()
    {
        return $this->morphedByMany(Equipe::class, 'content_viewable');
    }

    public function compositeView()
    {
        return $this->belongsTo(CompositeView::class);
    }
}
