<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateClientphysiqueAPIRequest;
use App\Http\Requests\API\UpdateClientphysiqueAPIRequest;
use App\Models\Clientphysique;
use App\Repositories\ClientphysiqueRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use Response;

/**
 * Class ClientphysiqueController
 * @package App\Http\Controllers\API
 */

class ClientphysiqueAPIController extends AppBaseController
{
    /** @var  ClientphysiqueRepository */
    private $clientphysiqueRepository;

    public function __construct(ClientphysiqueRepository $clientphysiqueRepo)
    {
        $this->clientphysiqueRepository = $clientphysiqueRepo;
    }

    /**
     * Display a listing of the Clientphysique.
     * GET|HEAD /clientphysiques
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $clientphysiques = $this->clientphysiqueRepository->all(
            $request->except(['skip', 'limit']),
            $request->get('skip'),
            $request->get('limit')
        );

        return $this->sendResponse($clientphysiques->toArray(), 'Clientphysiques retrieved successfully');
    }

    /**
     * Store a newly created Clientphysique in storage.
     * POST /clientphysiques
     *
     * @param CreateClientphysiqueAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateClientphysiqueAPIRequest $request)
    {
        $input = $request->all();

        $clientphysique = $this->clientphysiqueRepository->create($input);

        return $this->sendResponse($clientphysique->toArray(), 'Clientphysique saved successfully');
    }

    /**
     * Display the specified Clientphysique.
     * GET|HEAD /clientphysiques/{id}
     *
     * @param int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var Clientphysique $clientphysique */
        $clientphysique = $this->clientphysiqueRepository->find($id);

        if (empty($clientphysique)) {
            return $this->sendError('Clientphysique not found');
        }

        return $this->sendResponse($clientphysique->toArray(), 'Clientphysique retrieved successfully');
    }

    /**
     * Update the specified Clientphysique in storage.
     * PUT/PATCH /clientphysiques/{id}
     *
     * @param int $id
     * @param UpdateClientphysiqueAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateClientphysiqueAPIRequest $request)
    {
        $input = $request->all();

        /** @var Clientphysique $clientphysique */
        $clientphysique = $this->clientphysiqueRepository->find($id);

        if (empty($clientphysique)) {
            return $this->sendError('Clientphysique not found');
        }

        $clientphysique = $this->clientphysiqueRepository->update($input, $id);

        return $this->sendResponse($clientphysique->toArray(), 'Clientphysique updated successfully');
    }

    /**
     * Remove the specified Clientphysique from storage.
     * DELETE /clientphysiques/{id}
     *
     * @param int $id
     *
     * @throws \Exception
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var Clientphysique $clientphysique */
        $clientphysique = $this->clientphysiqueRepository->find($id);

        if (empty($clientphysique)) {
            return $this->sendError('Clientphysique not found');
        }

        $clientphysique->delete();

        return $this->sendSuccess('Clientphysique deleted successfully');
    }
}
