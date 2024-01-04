<?php
namespace App\Models;

use App\Models\Hadiah;
use App\Models\Pembeli;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pemenang extends Model
{
    use HasFactory;
    protected $table = 'pemenang';
    protected $guarded = [];

    
}

