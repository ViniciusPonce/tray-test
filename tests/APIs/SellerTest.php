<?php

namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Seller;

class SellerTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_seller()
    {
        $seller = Seller::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/sellers', $seller
        );

        $this->assertApiResponse($seller);
    }

    /**
     * @test
     */
    public function test_read_seller()
    {
        $seller = Seller::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/sellers/'.$seller->id
        );

        $this->assertApiResponse($seller->toArray());
    }

    /**
     * @test
     */
    public function test_update_seller()
    {
        $seller = Seller::factory()->create();
        $editedSeller = Seller::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/sellers/'.$seller->id,
            $editedSeller
        );

        $this->assertApiResponse($editedSeller);
    }

    /**
     * @test
     */
    public function test_delete_seller()
    {
        $seller = Seller::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/sellers/'.$seller->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/sellers/'.$seller->id
        );

        $this->response->assertStatus(404);
    }
}
