<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ItemModel extends Model
{
    use HasFactory;
    protected $table = 'item';
    protected $guarded = ['id'];

    public function toko()
    {
        return $this->belongsTo(TokoModel::class, 'idToko', 'id');
    }
}
