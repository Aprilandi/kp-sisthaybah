<?php

namespace Tests\Unit;

use PHPUnit\Framework\TestCase;

class cobaTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testTambah()
    {
        $a=20;
        $b=2;
        $c=$a+$b;
        $this->assertEquals(22, $c);
    }

    public function testKurang()
    {
        $a=20;
        $b=2;
        $c=$a-$b;
        $this->assertEquals(18, $c);
    }

    public function testKali()
    {
        $a=20;
        $b=2;
        $c=$a*$b;
        $this->assertEquals(40, $c);
    }

    public function testBagi()
    {
        $a=20;
        $b=2;
        $c=$a/$b;
        $this->assertEquals(10, $c);
    }
}
