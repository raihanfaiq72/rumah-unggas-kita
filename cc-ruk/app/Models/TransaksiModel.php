<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransaksiModel extends Model
{
    use HasFactory;

    protected $table = 'transaksi';
    protected $guarded = ['id'];

    public function item()
    {
        return $this->belongsTo(ItemModel::class, 'idItem', 'id');
    }

    public function user()
    {
        return $this->belongsTo(UserModel::class, 'idUser', 'id');
    }

    public function toko()
    {
        return $this->belongsTo(TokoModel::class, 'idToko', 'id');
    }
}
