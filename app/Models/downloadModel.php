<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class downloadModel extends Model
{
    protected $table = "downloads";

    protected  $fillable = ['filename', 'owner', 'downloaded_by'];
}
