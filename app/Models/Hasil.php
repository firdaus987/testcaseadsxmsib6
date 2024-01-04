<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;
    protected $table = 'hasil';
    protected $fillable = [
        'id_user',
        'id_periode',
        'declarative_knowledge',
        'procedural_knowledge',
        'conditional_knowledge',
        'km_total',
        'km_class',
        'planning',
        'information_management',
        'monitoring',
        'debugging',
        'evaluation',
        'rm_total',
        'rm_class'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }

    public function periode()
    {
        return $this->belongsTo(Periode::class, 'id_periode');
    }
}
