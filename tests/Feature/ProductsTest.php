<?php

namespace Tests\Feature;

use App\Product;
use Tests\TestCase;
use Tests\WithStubUser;
use Illuminate\Foundation\Testing\DatabaseMigrations;


/* 
  Vi valde fokusera våra tester på alla operation för produkterna, då 
  allt krestar kring produkterna i denna app. Utöver produkterna testar vi även
  authentication som är en viktig feature. 

  PS. tester för Stores och Reviews skulle se liknande ut om man hade gjort tester på dessa.
*/

class ProductsTest extends TestCase
{
    use DatabaseMigrations, WithStubUser;

    public function setUp(): void
    {
        parent::setUp();
        $this->artisan('migrate:refresh --seed');
    }

    // test auth requirements for our product auth routes 
    public function testAauthentication()
    {
        $this->assertAuthenticationRequired('/products', 'post');
        $this->assertAuthenticationRequired('/products/create');
        $this->assertAuthenticationRequired('/products/1', 'put');
        $this->assertAuthenticationRequired('/products/1', 'delete');
        $this->assertAuthenticationRequired('/products/1/edit');
    }

    // test product index page renders successfully
    public function testIndexPage()
    {
        $response = $this->get('/products');
        $response->assertStatus(200);
        $response->assertViewIs('products.index');
    }

    // test the creation of products
    public function testCreateProduct()
    {
        $this->actingAs($this->createStubUser());

        $response = $this->get('/products/create');
        $response->assertStatus(200);
        $response->assertViewIs('products.create');

        $this->post('/products', ['title' => 'Product title', 'brand' => 'Product brand', 'price' => 123, 'image' => 'Product image url', 'description' => 'Product description'])
            ->assertRedirect('/products');

        $response = $this->get('/products');
        $response->assertSee('Product title');
    }

    // test product show page renders successfully
    public function testViewProduct()
    {
        $product = $this->createProduct();
        $response = $this->get("/products/{$product->id}");
        $response->assertStatus(200);
        $response->assertViewIs('products.show');
        $response->assertSee('Product title');
    }

    // test product edit page renders successfully
    public function testEditProductPage()
    {
        $this->actingAs($this->createStubUser());

        $product = $this->createProduct();
        $response = $this->get("/products/{$product->id}/edit");
        $response->assertStatus(200);
        $response->assertViewIs('products.edit');
        $response->assertSee('Product title');
    }

    // test product update functionallity
    public function testUpdateProduct()
    {
        $this->actingAs($this->createStubUser());

        $product = $this->createProduct();
        $response = $this->put("/products/{$product->id}", ['title' => 'Updated title', 'brand' => 'Product brand', 'price' => 123, 'image' => 'Product image url', 'description' => 'Product description'])
            ->assertRedirect('/products');

        $response = $this->get('/products');
        $response->assertSee('Updated title');
        $response->assertDontSee('Product title');
    }

    // test product destroy functionallity
    public function testDestroyProduct()
    {
        $this->actingAs($this->createStubUser());

        $product = $this->createProduct();
        $response = $this->delete("/products/{$product->id}")
            ->assertRedirect('/products');

        $response = $this->get('/products');
        $response->assertDontSee('Product title');
    }


    private function createProduct()
    {
        $product = new Product;
        $product->title = 'Product title';
        $product->brand = 'Product brand';
        $product->price = 123;
        $product->image = 'Product image url';
        $product->description = 'Product description';
        $product->save();

        return $product;
    }
}
