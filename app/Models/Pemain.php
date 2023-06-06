<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemain extends Model
{
    protected $table = "Pemain";
    use HasFactory, HasUlids;

    protected $fillable = ['nama', 'nomor_punggung', 'posisi', 'foto'];

    public function klubBola(){
        return $this->belongsTo(KlubBola::class, 'klub_id');
    }
}
