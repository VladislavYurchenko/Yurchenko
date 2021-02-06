<?php

use PHPUnit\Framework\TestCase;
use yurchenko\Quadratic;
use yurchenko\YurchenkoException;

require __DIR__ . './../vendor/autoload.php';

class QuadraticTest extends TestCase {
    /**
     * @dataProvider providerEquation2
     * @param $a
     * @param $b
     * @param $c
     * @param $res
     */
    public function testEquation2($a, $b, $c, $res) {
        $fTest = new Quadratic();
        $this->assertEquals($res, $fTest->equation2($a, $b, $c));
    }
    /**
     * @dataProvider providerEquation2YurchenkoException
     * @param $a
     * @param $b
     * @param $c
     * @param $res
     */
    public function testEquation2YurchenkoException($a, $b, $c, $res) {
        $this->expectException(YurchenkoException::class);
        $fTest = new Quadratic();
        $this->assertEquals($res, $fTest->equation2($a, $b, $c));
    }
    /**
     * @dataProvider providerEquation2TypeErrorException
     * @param $a
     * @param $b
     * @param $c
     * @param $res
     */
    public function testEquation2TypeErrorException($a, $b, $c, $res) {
        $this->expectException(TypeError::class);
        $fTest = new Quadratic();
        $this->assertEquals($res, $fTest->equation2($a, $b, $c));
    }

    public function providerEquation2 (): array
    {
        return array (
            array (15, 9, 0,[0.0 ,-0.6]),
            array (1, 6, -40,[ 4.0,-10.0]),
            array (0, 1, 1,[-1]),
            array (0, 1, 2, [-2.0]),
            array (false, true, 1==0, [0]),
        );
    }
    public function providerEquation2YurchenkoException (): array
    {
        return array (
            array (0, 0, 0, 0),
            array (4, 2, 1, 0),
            array (true, true, true, [0]),
            array (false, false, false, [0]),
            array (true, false, true, [0]),
        );
    }
    public function providerEquation2TypeErrorException(): array
    {
        return array (
            array ('a', 'b', 'c', 0),
            array (null, null, null, 0)
        );
    }
}

?>