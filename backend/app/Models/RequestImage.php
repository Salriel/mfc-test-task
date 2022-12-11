<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RequestImage
 * @package App\Models
 */
class RequestImage extends Model
{
    use HasFactory;

    public function request(){
        $this->belongsTo(Request::class);
    }
}

