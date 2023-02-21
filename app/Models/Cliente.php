<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['nome', 'nomeReduzido', 'endereco', 'bairro', 'estado', 'cep', 'foneDdd', 'foneNumero',
                            'cnpjCpf', 'email', 'statusCliente', 'exportado'];
}
