<?php

use yurchenko\Line;
use PHPUnit\Framework\TestCase;

require __DIR__ . './../vendor/autoload.php';

class LineTest extends TestCase {
    /**
     * @dataProvider providerSolve
     */
    public function testSolve($a, $b, $c, $res) {
        $fTest = new Line();
        $this->assertEquals($res, $fTest->solve($a, $b, $c));
    }
    /**
     * @dataProvider providerSolveWithExc
     */
    public function testSolveWithExc($a, $b, $c, $res) {
        $this->expectException(\yurchenko\YurchenkoException::class);
        $fTest = new Line();
        $this->assertEquals($res, $fTest->solve($a, $b, $c));
    }

    public function providerSolve ()
    {
        return array (
            array (1, 1, 1,[-1]),
            array (1, 2, 3,[-2]),
            array (99999966666999999999, 666666666666666666666, "jajajaj",[-6.666668888867407]),
            array (9999996666699999999999999966666999999999, 1, "jajajaj",[-1.0000003333301111E-40])

        );
    }
    public function providerSolveWithExc ()
    {
        return array (
            array (0, 0, 0, 0),
            array ('a', 'b', 'c',0),
            array (false, true, 1==0,0),
            array (null, null, null,0),

        );
    }
}
?>