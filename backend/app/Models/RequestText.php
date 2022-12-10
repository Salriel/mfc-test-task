<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Class RequestText
 * @package App\Models
 *
 * @property int id
 */
class RequestText extends Model
{
    use HasFactory;
    protected $fillable = [
        'text'
    ];

    public function request(){
        return $this->belongsTo(Request::class);
    }
}
