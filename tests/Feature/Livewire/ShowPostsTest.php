<?php

namespace Tests\Feature\Livewire;

use App\Http\Livewire\PostsList;
use Livewire\Livewire;
use Tests\TestCase;

class PostsListTest extends TestCase
{
    /** @test */
    public function the_component_can_render()
    {
        $component = Livewire::test(PostsList::class);

        $component->assertStatus(200);
    }
}
