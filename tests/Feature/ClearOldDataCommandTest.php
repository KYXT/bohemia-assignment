<?php

namespace Tests\Feature;

use Artisan;
use Tests\TestCase;

class ClearOldDataCommandTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function testCommandExist()
    {
        $this->assertTrue(
            array_key_exists('data:clear', Artisan::all())
        );
    }
}
