<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KlubBola extends Model
{
    protected $table = "KlubBola";
    use HasFactory, HasUuids;

    public function negara(){
        return $this->belongsTo(Negara::class, 'negara_id');
    }
}
