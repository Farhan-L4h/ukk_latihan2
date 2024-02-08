<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_masakan',
        'jumlah',
        'tanggal',
        'no_meja',
        'keterangan',
        'status',
    ];

    public function masakans(){
        return $this->belongsTo(masakan::class, 'id_masakan');
    }

    public function users(){
        return $this->belongsTo(User::class, 'id_user');
    }
    public function statuses(){
        return $this->belongsTo(status::class, 'id_status');
    }

    public function transaksi()
    {
        return $this->hasMany(transaksi::class);
    }

    public function details()
    {
        return $this->hasMany(detail_orderan::class, 'id_order');
    }
}
