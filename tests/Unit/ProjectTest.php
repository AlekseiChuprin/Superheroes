<?php

namespace Tests\Unit;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;
use App\Http\Requests\HeroRequest;

class ProjectTest extends TestCase{

    use RefreshDatabase;

    public function testExample()
    {
        $responce = $this->get('/');
        $responce->assertOk();
    }

    public function testStoreValidate()
    {
        $responce = $this->post('/heroes/{hero}',[

        ]);
        $this->assertEquals(405, $responce->status());
    }



}






