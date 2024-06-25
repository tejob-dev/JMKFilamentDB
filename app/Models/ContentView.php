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

    public function accueilprojetitems()
    {
        return $this->morphedByMany(
            Accueilprojetitem::class,
            'content_viewable'
        );
    }

    public function publications()
    {
        return $this->morphedByMany(Publication::class, 'content_viewable');
    }

    public function galleries()
    {
        return $this->morphedByMany(Gallerie::class, 'content_viewable');
    }

    public function opportunites()
    {
        return $this->morphedByMany(Opportunite::class, 'content_viewable');
    }

    public function cultures()
    {
        return $this->morphedByMany(Culture::class, 'content_viewable');
    }

    public function impacts()
    {
        return $this->morphedByMany(Impact::class, 'content_viewable');
    }

    public function produits()
    {
        return $this->morphedByMany(Produit::class, 'content_viewable');
    }

    public function valeurs()
    {
        return $this->morphedByMany(Valeur::class, 'content_viewable');
    }

    public function visions()
    {
        return $this->morphedByMany(Vision::class, 'content_viewable');
    }

    public function missions()
    {
        return $this->morphedByMany(Mission::class, 'content_viewable');
    }

    public function videos()
    {
        return $this->morphedByMany(Video::class, 'content_viewable');
    }
}
