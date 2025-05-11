<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Review extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'destination_id', 'rating', 'comment'];

 
public function user() {
    return $this->belongsTo(User::class, 'user_id');
}

public function destination() {
    return $this->belongsTo(Destination::class, 'destination_id');
}

    
   
}
