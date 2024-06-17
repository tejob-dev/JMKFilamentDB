<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Actualite extends Model
{
    use HasFactory;
    use Searchable;

    protected $guarded = [];

    protected $searchableFields = ['*'];

    protected $casts = [
        'dateactu' => 'datetime',
    ];

    public function typeformation()
    {
        return $this->belongsTo(Typeformation::class);
    }

    public function accueilactu()
    {
        return $this->belongsTo(Accueilactu::class);
    }

    public function contentViews()
    {
        return $this->morphToMany(ContentView::class, 'content_viewable');
    }
}
