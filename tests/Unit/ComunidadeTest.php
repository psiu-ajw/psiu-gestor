<?php

namespace Tests\Unit;

use App\Models\Community;
use App\Models\User;
use PHPUnit\Framework\TestCase;

class ComunidadeTest extends TestCase
{
    /**
     * @test
     */
    public function test_if_comunidade_columns_is_correct()
    {
        $comunidade = new Community();
        $expected = ['name', 'description'];
        $arrayCompared = array_diff($expected, $comunidade->getFillable());
        $this->assertEquals(0, count($arrayCompared));
    }
}
