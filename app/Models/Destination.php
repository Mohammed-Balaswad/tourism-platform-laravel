<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use App\Models\User;


class Destination extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'image', 'best_time_to_visit', 'booking_link', 'admin_id', 'category_id'];

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id');
    }    

    public function agencies()
    {
        return $this->belongsToMany(Agency::class, 'destination_agency'); // ربط الوجهة بالوكالات
    }

    public function reviews()
    {
        return $this->hasMany(Review::class); // التقييمات المرتبطة بالوجهة
    }
   

 


}
