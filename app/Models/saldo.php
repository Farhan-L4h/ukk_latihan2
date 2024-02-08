<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class saldo extends Model
{
    use HasFactory;

    protected $fillable = [
        'saldo',
        'pin',
    ];

    public function orders()
    {
        return $this->hasMany(transaksi::class, 'saldo');
    }
    public function user()
    {
        return $this->hasMany(User::class);
    }
}
