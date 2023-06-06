<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Negara extends Model
{
    protected $table = "negara";
    use HasFactory, HasUuids;

    public function klub_bola(){
        return $this->hasMany((KlubBola::class));
    }
}
