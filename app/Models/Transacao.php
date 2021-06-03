<?php

namespace App\Models;

use Carbon\Carbon;
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

    public function toArray()
    {
        $created_at = (new Carbon($this->created_at))->format('Y-m-d');
        return [
            'id' => $this->id,
            'titulo' => $this->titulo,
            'valor' => $this->valor,
            'tipo' => $this->tipo_id,
            'categoria' => $this->categoria_id,
            'created_at' => $created_at
        ];
    }

    public function tipo() {
        return $this->belongsTo(Tipo::class);
    }

    public function categoria() {
        return $this->belongsTo(Categoria::class);
    }

}
