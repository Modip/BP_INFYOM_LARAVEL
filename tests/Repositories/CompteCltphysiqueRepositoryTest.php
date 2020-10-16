<?php namespace Tests\Repositories;

use App\Models\CompteCltphysique;
use App\Repositories\CompteCltphysiqueRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class CompteCltphysiqueRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var CompteCltphysiqueRepository
     */
    protected $compteCltphysiqueRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->compteCltphysiqueRepo = \App::make(CompteCltphysiqueRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_compte_cltphysique()
    {
        $compteCltphysique = factory(CompteCltphysique::class)->make()->toArray();

        $createdCompteCltphysique = $this->compteCltphysiqueRepo->create($compteCltphysique);

        $createdCompteCltphysique = $createdCompteCltphysique->toArray();
        $this->assertArrayHasKey('id', $createdCompteCltphysique);
        $this->assertNotNull($createdCompteCltphysique['id'], 'Created CompteCltphysique must have id specified');
        $this->assertNotNull(CompteCltphysique::find($createdCompteCltphysique['id']), 'CompteCltphysique with given id must be in DB');
        $this->assertModelData($compteCltphysique, $createdCompteCltphysique);
    }

    /**
     * @test read
     */
    public function test_read_compte_cltphysique()
    {
        $compteCltphysique = factory(CompteCltphysique::class)->create();

        $dbCompteCltphysique = $this->compteCltphysiqueRepo->find($compteCltphysique->id);

        $dbCompteCltphysique = $dbCompteCltphysique->toArray();
        $this->assertModelData($compteCltphysique->toArray(), $dbCompteCltphysique);
    }

    /**
     * @test update
     */
    public function test_update_compte_cltphysique()
    {
        $compteCltphysique = factory(CompteCltphysique::class)->create();
        $fakeCompteCltphysique = factory(CompteCltphysique::class)->make()->toArray();

        $updatedCompteCltphysique = $this->compteCltphysiqueRepo->update($fakeCompteCltphysique, $compteCltphysique->id);

        $this->assertModelData($fakeCompteCltphysique, $updatedCompteCltphysique->toArray());
        $dbCompteCltphysique = $this->compteCltphysiqueRepo->find($compteCltphysique->id);
        $this->assertModelData($fakeCompteCltphysique, $dbCompteCltphysique->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_compte_cltphysique()
    {
        $compteCltphysique = factory(CompteCltphysique::class)->create();

        $resp = $this->compteCltphysiqueRepo->delete($compteCltphysique->id);

        $this->assertTrue($resp);
        $this->assertNull(CompteCltphysique::find($compteCltphysique->id), 'CompteCltphysique should not exist in DB');
    }
}
