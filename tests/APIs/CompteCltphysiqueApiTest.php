<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\CompteCltphysique;

class CompteCltphysiqueApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_compte_cltphysique()
    {
        $compteCltphysique = factory(CompteCltphysique::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/compte_cltphysiques', $compteCltphysique
        );

        $this->assertApiResponse($compteCltphysique);
    }

    /**
     * @test
     */
    public function test_read_compte_cltphysique()
    {
        $compteCltphysique = factory(CompteCltphysique::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/compte_cltphysiques/'.$compteCltphysique->id
        );

        $this->assertApiResponse($compteCltphysique->toArray());
    }

    /**
     * @test
     */
    public function test_update_compte_cltphysique()
    {
        $compteCltphysique = factory(CompteCltphysique::class)->create();
        $editedCompteCltphysique = factory(CompteCltphysique::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/compte_cltphysiques/'.$compteCltphysique->id,
            $editedCompteCltphysique
        );

        $this->assertApiResponse($editedCompteCltphysique);
    }

    /**
     * @test
     */
    public function test_delete_compte_cltphysique()
    {
        $compteCltphysique = factory(CompteCltphysique::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/compte_cltphysiques/'.$compteCltphysique->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/compte_cltphysiques/'.$compteCltphysique->id
        );

        $this->response->assertStatus(404);
    }
}
