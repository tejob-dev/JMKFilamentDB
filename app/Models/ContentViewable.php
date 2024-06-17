<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Pivot;

class ContentViewable extends Model
{

    protected $guarded = [];

    public $timestamps = false;

    protected $table = "content_viewables";
}
