<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Categoria extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = "categorias";

    protected $fillable = ['nome'];

    protected $visible = ['id','nome'];

    public function transacoes() {
        return $this->hasMany(Transacao::class);
    }
}
