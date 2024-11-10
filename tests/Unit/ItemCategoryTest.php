<?php

namespace Tests\Unit;

use Tests\TestCase;
use App\Models\Category;

class LoginTest extends TestCase
{
    /**
     * A basic unit test example.
     */
    public function test_login_form()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_add_category()
    {
        $category = Category::create([
            'category_name' => 'Others'
        ]);

        $this->assertDatabaseHas('itemcategories', ['id' => $category->id
        ]);
    }

    public function test_update_category()
    {
        $category = Category::find(3);

        $updatedCategoryData = [
            'category_name' => 'ICT'
        ];

        $category->update($updatedCategoryData);

        $updatedCategoryData = Category::find($category->id);

        $this->assertDatabaseHas('itemcategories', ['id' => $category->id]);
    }

    public function test_delete_category()
    {
        $category = Category::factory()->count(1)->make();

        $category = Category::latest();

        $category->delete();

        $this->assertDatabaseMissing('itemcategories', ['id' => $category->id]);
    }
}
