<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreatealunoRequest;
use App\Http\Requests\UpdatealunoRequest;
use App\Repositories\alunoRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class alunoController extends AppBaseController
{
    /** @var  alunoRepository */
    private $alunoRepository;

    public function __construct(alunoRepository $alunoRepo)
    {
        $this->alunoRepository = $alunoRepo;
    }

    /**
     * Display a listing of the aluno.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $alunos = $this->alunoRepository->all();

        return view('alunos.index')
            ->with('alunos', $alunos);
    }

    /**
     * Show the form for creating a new aluno.
     *
     * @return Response
     */
    public function create()
    {
        return view('alunos.create');
    }

    /**
     * Store a newly created aluno in storage.
     *
     * @param CreatealunoRequest $request
     *
     * @return Response
     */
    public function store(CreatealunoRequest $request)
    {
        $input = $request->all();

        $aluno = $this->alunoRepository->create($input);

        Flash::success('Aluno saved successfully.');

        return redirect(route('alunos.index'));
    }

    /**
     * Display the specified aluno.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $aluno = $this->alunoRepository->find($id);

        if (empty($aluno)) {
            Flash::error('Aluno not found');

            return redirect(route('alunos.index'));
        }

        return view('alunos.show')->with('aluno', $aluno);
    }

    /**
     * Show the form for editing the specified aluno.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $aluno = $this->alunoRepository->find($id);

        if (empty($aluno)) {
            Flash::error('Aluno not found');

            return redirect(route('alunos.index'));
        }

        return view('alunos.edit')->with('aluno', $aluno);
    }

    /**
     * Update the specified aluno in storage.
     *
     * @param int $id
     * @param UpdatealunoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdatealunoRequest $request)
    {
        $aluno = $this->alunoRepository->find($id);

        if (empty($aluno)) {
            Flash::error('Aluno not found');

            return redirect(route('alunos.index'));
        }

        $aluno = $this->alunoRepository->update($request->all(), $id);

        Flash::success('Aluno updated successfully.');

        return redirect(route('alunos.index'));
    }

    /**
     * Remove the specified aluno from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $aluno = $this->alunoRepository->find($id);

        if (empty($aluno)) {
            Flash::error('Aluno not found');

            return redirect(route('alunos.index'));
        }

        $this->alunoRepository->delete($id);

        Flash::success('Aluno deleted successfully.');

        return redirect(route('alunos.index'));
    }
}
