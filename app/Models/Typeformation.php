<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Typeformation extends Model
{
    use HasFactory;
    use Searchable;

    protected $guarded = [];

    protected $searchableFields = ['*'];

    public function formations()
    {
        return $this->hasMany(Formation::class);
    }

    public function actualites()
    {
        return $this->hasMany(Actualite::class);
    }
}
