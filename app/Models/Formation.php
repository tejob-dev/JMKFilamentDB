<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Formation extends Model
{
    use HasFactory;
    use Searchable;

    protected $guarded = [];

    protected $searchableFields = ['*'];

    public function typeformation()
    {
        return $this->belongsTo(Typeformation::class);
    }

    public function accueilformation()
    {
        return $this->belongsTo(Accueilformation::class);
    }
}
