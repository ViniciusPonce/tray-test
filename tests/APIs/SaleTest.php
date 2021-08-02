<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Sale;

class SaleTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_sale()
    {
        $sale = Sale::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/sales', $sale
        );

        $this->assertApiResponse($sale);
    }

    /**
     * @test
     */
    public function test_read_sale()
    {
        $sale = Sale::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/sales/'.$sale->id
        );

        $this->assertApiResponse($sale->toArray());
    }

    /**
     * @test
     */
    public function test_update_sale()
    {
        $sale = Sale::factory()->create();
        $editedsale = Sale::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/sales/'.$sale->id,
            $editedsale
        );

        $this->assertApiResponse($editedsale);
    }

    /**
     * @test
     */
    public function test_delete_sale()
    {
        $sale = Sale::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/sales/'.$sale->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/sales/'.$sale->id
        );

        $this->response->assertStatus(404);
    }
}
