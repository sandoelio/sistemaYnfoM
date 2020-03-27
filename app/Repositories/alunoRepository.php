<?php

namespace App\Repositories;

use App\Models\aluno;
use App\Repositories\BaseRepository;

/**
 * Class alunoRepository
 * @package App\Repositories
 * @version December 20, 2019, 6:51 pm UTC
*/

class alunoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nome',
        'cpf'
    ];

    /**
     * Return searchable fields
     *
     * @return array
     */
    public function getFieldsSearchable()
    {
        return $this->fieldSearchable;
    }

    /**
     * Configure the Model
     **/
    public function model()
    {
        return aluno::class;
    }
}
