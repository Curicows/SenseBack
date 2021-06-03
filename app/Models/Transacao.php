<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Transacao extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "transacaos";

    protected $fillable = ['titulo', 'valor', 'tipo_id', 'categoria_id'];

    protected $visible = ['id','titulo', 'valor', 'tipo_id', 'categoria_id','created_at'];

    protected $casts = [
      'created_at' => 'date:Y-m-d'
    ];

    public function tipo() {
        return $this->belongsTo(Tipo::class);
    }

    public function categoria() {
        return $this->belongsTo(Categoria::class);
    }

}
