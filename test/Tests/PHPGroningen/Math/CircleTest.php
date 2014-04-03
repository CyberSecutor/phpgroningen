<?php

/**
 * Test for the Circle class.
 *
 * @package PHPGroningen
 * @subpackage Test
 */

namespace Tests\PHPGroningen\Math;

use PHPGroningen\Recorder;
use PHPGroningen\Math\Circle;

/**
 * Description.
 */
class CircleTest extends \PHPUnit_Framework_TestCase
{
    protected static $circle;

    public static function setUpBeforeClass() {
        self::$circle = new Circle();
        echo "Setup!!!\n\n\n";
    }

    /**
     * Provider for setRadius.
     *
     * @return array
     */
    public function setRadiusProvider()
    {
        return array(
            array(
                5
            ),
            array(
                 10
            ),
            array(
                -20
            ),
            array(
                "10",
                'InvalidArgumentException'
            ),
            array(
                null,
                'InvalidArgumentException'
            ),
            array(
                1
            )
        );
    }

    /**
     * Provider for setRadius.
     *
     * @return array
     */
    public function setInvalidRadiusProvider()
    {
        return array(
            array(
                "10"
            ),
            array(
                null
            )
        );
    }

    /**
     * Test for setRadius
     *
     * @dataProvider setRadiusProvider
     */
    public function testSetRadius($radius, $expectedExeption = null)
    {
        $recorder = new Recorder;
        $circle = new Circle($recorder);

        $this->assertEmpty($recorder->getRecords());


        if ($expectedExeption !== null) {
            $this->setExpectedException($expectedExeption);
        }

        $circle->setRadius($radius);

        $records = $recorder->getRecords();
        $this->assertCount(2, $records);
        $this->assertEquals('radius updated', current($records));

        $this->assertEquals($radius, $circle->getRadius(), 'Hey, de radius ging niet goed');

    }

    /**
     * Test for setRadius with invalid values.
     *
     * @dataProvider setInvalidRadiusProvider
     * @expectedException InvalidArgumentException
     */
    public function testSetRadiusException ($radius) {
        $circle = self::$circle;
        $circle->setRadius($radius);
    }
}
