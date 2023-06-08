<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pemain extends Model
{
    protected $table = "pemain";
    use HasFactory, HasUuids;

    protected $fillable = ['nama', 'nomor_punggung', 'posisi', 'foto'];

    public function klub(){
        return $this->belongsTo(Klub::class, 'klub_id');
    }
}
