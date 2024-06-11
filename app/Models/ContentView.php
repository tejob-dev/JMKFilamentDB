<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
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
            $builder->orderBy("title", "asc");
        });
    }

    public function contentViewType()
    {
        return $this->belongsTo(ContentViewType::class);
    }

    public function content_viewable()
    {
        return $this->morphTo();
    }
}
