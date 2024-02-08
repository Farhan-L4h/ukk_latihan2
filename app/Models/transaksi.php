<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class transaksi extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_user',
        'id_detail',
        'id_masakan',
        'tanggal',
        'kembali',
        'total_bayar',
        'id_status',
        
    ];

    public function statuses(){
        return $this->belongsTo(status::class, 'id_status');
    }
    public function users(){
        return $this->belongsTo(User::class, 'id_user');
    }
    public function details(){
        return $this->belongsTo(detail_orderan::class, 'id_detail');
    }
    public function saldos(){
        return $this->belongsTo(saldo::class, 'id_saldo');
    }
    public function masakans(){
        return $this->belongsTo(masakan::class, 'id_masakan');
    }
    


}
