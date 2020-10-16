<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateCompteCltphysiqueAPIRequest;
use App\Http\Requests\API\UpdateCompteCltphysiqueAPIRequest;
use App\Models\CompteCltphysique;
use App\Repositories\CompteCltphysiqueRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class CompteCltphysiqueController
 * @package App\Http\Controllers\API
 */

class CompteCltphysiqueAPIController extends AppBaseController
{
    /** @var  CompteCltphysiqueRepository */
    private $compteCltphysiqueRepository;

    public function __construct(CompteCltphysiqueRepository $compteCltphysiqueRepo)
    {
        $this->compteCltphysiqueRepository = $compteCltphysiqueRepo;
    }

    /**
     * Display a listing of the CompteCltphysique.
     * GET|HEAD /compteCltphysiques
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $compteCltphysiques = $this->compteCltphysiqueRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($compteCltphysiques->toArray(), 'Compte Cltphysiques retrieved successfully');
    }

    /**
     * Store a newly created CompteCltphysique in storage.
     * POST /compteCltphysiques
     *
     * @param CreateCompteCltphysiqueAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateCompteCltphysiqueAPIRequest $request)
    {
        $input = $request->all();

        $compteCltphysique = $this->compteCltphysiqueRepository->create($input);

        return $this->sendResponse($compteCltphysique->toArray(), 'Compte Cltphysique saved successfully');
    }

    /**
     * Display the specified CompteCltphysique.
     * GET|HEAD /compteCltphysiques/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var CompteCltphysique $compteCltphysique */
        $compteCltphysique = $this->compteCltphysiqueRepository->find($id);

        if (empty($compteCltphysique)) {
            return $this->sendError('Compte Cltphysique not found');
        }

        return $this->sendResponse($compteCltphysique->toArray(), 'Compte Cltphysique retrieved successfully');
    }

    /**
     * Update the specified CompteCltphysique in storage.
     * PUT/PATCH /compteCltphysiques/{id}
     *
     * @param int $id
     * @param UpdateCompteCltphysiqueAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateCompteCltphysiqueAPIRequest $request)
    {
        $input = $request->all();

        /** @var CompteCltphysique $compteCltphysique */
        $compteCltphysique = $this->compteCltphysiqueRepository->find($id);

        if (empty($compteCltphysique)) {
            return $this->sendError('Compte Cltphysique not found');
        }

        $compteCltphysique = $this->compteCltphysiqueRepository->update($input, $id);

        return $this->sendResponse($compteCltphysique->toArray(), 'CompteCltphysique updated successfully');
    }

    /**
     * Remove the specified CompteCltphysique from storage.
     * DELETE /compteCltphysiques/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var CompteCltphysique $compteCltphysique */
        $compteCltphysique = $this->compteCltphysiqueRepository->find($id);

        if (empty($compteCltphysique)) {
            return $this->sendError('Compte Cltphysique not found');
        }

        $compteCltphysique->delete();

        return $this->sendSuccess('Compte Cltphysique deleted successfully');
    }
}
