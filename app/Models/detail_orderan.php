<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class detail_orderan extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_order',
        'id_masakan',
        'total_pesanan',
        'keterangan',
        'id_status',
    ];

    public function user(){
        return $this->belongsTo(User::class, 'id_user');
    }
    public function order(){
        return $this->belongsTo(order::class, 'id_order');
    }
    public function transaksi(){
        return $this->hashMany(transaksi::class, 'id');
    }
    public function masakan(){
        return $this->belongsTo(masakan::class, 'id_masakan');
    }
    public function status(){
        return $this->belongsTo(status::class, 'id_status');
    }
    
}
