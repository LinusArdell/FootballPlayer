<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Klub extends Model
{
    protected $table = "klub";
    use HasFactory, HasUuids;

    public function negaras(){
        return $this->belongsTo(Negara::class, 'negara_id');
    }
}
