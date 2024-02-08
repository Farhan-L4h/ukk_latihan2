<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class masakan extends Model
{
    use HasFactory;

    protected $fillable = [
        'image',
        'nama_masakan',
        'harga',
        'stock',
        'id_status',
        'deskripsi',
    ];

    public function status(){
        return $this->belongsTo(status::class, 'id_status');
    }

    public function orders()
    {
        return $this->hasMany(order::class);
    }
    public function transaksis()
    {
        return $this->hasMany(transaksi::class);
    }

    public function details()
    {
        return $this->hasMany(detail_orderan::class);
    }
}
