<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class status extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
    ];

    public function masakan()
    {
        return $this->hasMany(masakan::class);
    }
    public function order()
    {
        return $this->hasMany(order::class, 'id_status');
    }

    public function transaksi()
    {
        return $this->hasMany(transaksi::class, 'id_status');
    }

    public function details()
    {
        return $this->hasMany(detail_orderan::class, 'id_status');
    }

}
