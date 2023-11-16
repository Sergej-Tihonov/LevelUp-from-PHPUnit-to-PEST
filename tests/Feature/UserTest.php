<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    public function test_cat_create_user(): void
    {
        User::factory()->create();
        $this->assertDatabaseCount('users', 1);

        $users = User::all();
        $this->assertEquals(1, $users->count());
    }
}
