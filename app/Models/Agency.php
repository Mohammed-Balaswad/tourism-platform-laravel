<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Agency extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'website', 'contact_info', 'admin_id'];

    public function admin()
    {
        return $this->belongsTo(User::class, 'admin_id'); // معرفة المشرف الذي أضاف الوكالة
    }

    public function destinations()
    {
        return $this->belongsToMany(Destination::class, 'destination_agency'); // ربط الوكالة بالوجهات السياحية
    }

}
