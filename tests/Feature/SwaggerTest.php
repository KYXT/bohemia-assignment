<?php

namespace Tests\Feature;

use Tests\TestCase;

class SwaggerTest extends TestCase
{
    /**
     * Test is swagger available
     *
     * @return void
     */
    public function testSwaggerStatus()
    {
        $response = $this->get('/api/doc');

        $response->assertStatus(200);
    }
}
