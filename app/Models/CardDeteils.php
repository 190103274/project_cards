<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardDeteils extends Model
{
    use HasFactory;
    protected $fillable = ['card_id', 'filename'];
    public function card(){
        return $this->belongsTo('App\Models\Card');
    }
}
