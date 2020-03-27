<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class aluno
 * @package App\Models
 * @version December 20, 2019, 6:51 pm UTC
 *
 * @property string nome
 * @property string cpf
 */
class aluno extends Model
{
    use SoftDeletes;

    public $table = 'aluno';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];



    public $fillable = [
        'nome',
        'cpf'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nome' => 'string',
        'cpf' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'nome' => 'required',
        'cpf' => 'required'
    ];

    
}
