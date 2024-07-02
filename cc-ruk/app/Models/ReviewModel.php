<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReviewModel extends Model
{
    use HasFactory;
    protected $table = 'review';
    protected $guarded = ['id'];

    public function transaksi()
    {
        return $this->belongsTo(transaksiModel::class, 'idTransaksi', 'id');
    }
}
