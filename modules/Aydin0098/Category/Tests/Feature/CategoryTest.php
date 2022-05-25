<?php

namespace Aydin0098\Category\Tests\Feature;

use Aydin0098\Category\Models\Category;
use Aydin0098\RolePermissions\Database\Seeders\RolePermissionSeeder;
use Aydin0098\User\Database\Factories\UserFactory;
use Aydin0098\User\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CategoryTest extends TestCase
{
    use WithFaker;
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_manage_categories_permission_holders_can_see_categories_panel()
    {
        $this->actionAsAdmin();
        $this->seed(RolePermissionSeeder::class);
        auth()->user()->givePermissionTo('manage categories');
        $this->get(route('categories.index'))->assertOk();

    }
    public function test_normal_user_can_not_see_categories_panel()
    {
        $this->actionAsAdmin();
        $this->get(route('categories.index'))->assertStatus(403);

    }
    public function test_user_can_create_category()
    {
        $this->actionAsAdmin();
        $this->seed(RolePermissionSeeder::class);
        auth()->user()->givePermissionTo('manage categories');
        $this->createCategory();
        $this->assertEquals(1,Category::all()->count());

    }
    public function test_permitted_user_can_update_category()
    {
        $this->actionAsAdmin();
        $this->seed(RolePermissionSeeder::class);
        auth()->user()->givePermissionTo('manage categories');
        $this->createCategory();
        $this->assertEquals(1,Category::all()->count());
        $this->post(route('categories.update',1),['title' => $this->faker->word , 'slug' => $this->faker->word]);

    }
    public function test_user_can_delete_category()
    {
        $this->actionAsAdmin();
        $this->seed(RolePermissionSeeder::class);
        auth()->user()->givePermissionTo('manage categories');
        $this->createCategory();
        $this->assertEquals(1,Category::all()->count());
        $this->delete(route('categories.destroy',1))->assertOk();

    }

    public function actionAsAdmin()
    {
        $this->actingAs((User::factory()->create()));
    }

    private function createCategory()
    {
        $this->post(route('categories.store'),['title' => $this->faker->word , 'slug' => $this->faker->word]);
    }

}
