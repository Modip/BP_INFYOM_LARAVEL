<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCompteCltphysiqueRequest;
use App\Http\Requests\UpdateCompteCltphysiqueRequest;
use App\Repositories\CompteCltphysiqueRepository;
use App\Http\Controllers\AppBaseController;
use Illuminate\Http\Request;
use Flash;
use Response;

class CompteCltphysiqueController extends AppBaseController
{
    /** @var  CompteCltphysiqueRepository */
    private $compteCltphysiqueRepository;

    public function __construct(CompteCltphysiqueRepository $compteCltphysiqueRepo)
    {
        $this->compteCltphysiqueRepository = $compteCltphysiqueRepo;
    }

    /**
     * Display a listing of the CompteCltphysique.
     *
     * @param Request $request
     *
     * @return Response
     */
    public function index(Request $request)
    {
        $compteCltphysiques = $this->compteCltphysiqueRepository->all();

        return view('compte_cltphysiques.index')
            ->with('compteCltphysiques', $compteCltphysiques);
    }

    /**
     * Show the form for creating a new CompteCltphysique.
     *
     * @return Response
     */
    public function create()
    {
        return view('compte_cltphysiques.create');
    }

    /**
     * Store a newly created CompteCltphysique in storage.
     *
     * @param CreateCompteCltphysiqueRequest $request
     *
     * @return Response
     */
    public function store(CreateCompteCltphysiqueRequest $request)
    {
        $input = $request->all();

        $compteCltphysique = $this->compteCltphysiqueRepository->create($input);

        Flash::success('Compte Cltphysique saved successfully.');

        return redirect(route('compteCltphysiques.index'));
    }

    /**
     * Display the specified CompteCltphysique.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $compteCltphysique = $this->compteCltphysiqueRepository->find($id);

        if (empty($compteCltphysique)) {
            Flash::error('Compte Cltphysique not found');

            return redirect(route('compteCltphysiques.index'));
        }

        return view('compte_cltphysiques.show')->with('compteCltphysique', $compteCltphysique);
    }

    /**
     * Show the form for editing the specified CompteCltphysique.
     *
     * @param int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $compteCltphysique = $this->compteCltphysiqueRepository->find($id);

        if (empty($compteCltphysique)) {
            Flash::error('Compte Cltphysique not found');

            return redirect(route('compteCltphysiques.index'));
        }

        return view('compte_cltphysiques.edit')->with('compteCltphysique', $compteCltphysique);
    }

    /**
     * Update the specified CompteCltphysique in storage.
     *
     * @param int $id
     * @param UpdateCompteCltphysiqueRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompteCltphysiqueRequest $request)
    {
        $compteCltphysique = $this->compteCltphysiqueRepository->find($id);

        if (empty($compteCltphysique)) {
            Flash::error('Compte Cltphysique not found');

            return redirect(route('compteCltphysiques.index'));
        }

        $compteCltphysique = $this->compteCltphysiqueRepository->update($request->all(), $id);

        Flash::success('Compte Cltphysique updated successfully.');

        return redirect(route('compteCltphysiques.index'));
    }

    /**
     * Remove the specified CompteCltphysique from storage.
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        $compteCltphysique = $this->compteCltphysiqueRepository->find($id);

        if (empty($compteCltphysique)) {
            Flash::error('Compte Cltphysique not found');

            return redirect(route('compteCltphysiques.index'));
        }

        $this->compteCltphysiqueRepository->delete($id);

        Flash::success('Compte Cltphysique deleted successfully.');

        return redirect(route('compteCltphysiques.index'));
    }
}
