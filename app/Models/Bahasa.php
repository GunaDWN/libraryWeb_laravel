<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Buku;

class Bahasa extends Model
{
    use HasFactory;
    protected $table='bahasa';

    public function buku(){
        return $this->hasMany(Buku::class);
    }
}
