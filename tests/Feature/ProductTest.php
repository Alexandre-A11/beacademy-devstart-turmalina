<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use SebastianBergmann\Comparator\Factory;
use App\Models\Product;

class ProductTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_product()
    {
        $user = User::factory()->create([
            'is_admin' => 1,
        ]);

        $response = $this->post('/login',[
            'email'=> $user->email,
            'password' => 'password',
            
        ]);

        $this->actingAs($user);

        $response = $this->get('/products');

        $response->assertStatus(200);
    }

    public function test_create_new_product()
    {
        $user = User::factory()->create([
            'is_admin' => 1,
        ]);

        $response = $this->actingAs($user)
            ->post('/product', [
                'name' => 'Canetinha hidrografica',
                'quantity' => 200,
                'description' => 'canetinha a base de água',
                'category' => 'arte',
                'price' => 1.20,
                'sale_price' => 15.00,
            ]);

        $response = $this->get('/products');

        $response->assertStatus(200);
    }

    public function test_user_can_show_product()
    {
        $user = User::factory()->create([
            'is_admin' => 1,
        ]);

        $product = Product::factory()->create();

        $response = $this->actingAs($user)
                ->get('/products/'.$product->id);


        $response->assertStatus(200);
    }

    public function test_user_auth_can_delete_product()
    {
        $user = User::factory()->create([
            'is_admin' => 1,
        ]);

        $product = Product::factory()->create();

        $response = $this->actingAs($user)
                ->delete('/products/'.$product->id);


        $response->assertStatus(200);
    }




}
