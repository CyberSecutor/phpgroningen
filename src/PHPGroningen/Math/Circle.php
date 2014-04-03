<?php

/**
 * Circle math calculations class.
 *
 * @package PHPGroningen
 * @subpackage Math
 */

namespace PHPGroningen\Math;

use \InvalidArgumentException;
use \LogicExeption;

/**
 * A Circualr math class.
 */
class Circle
{
    /**
     * A short version of PI.
     *
     * @const float PI
     */
    const PI = 3.14159265358979323846264338327950288419716939937510;

    /**
     * The radius for the circle.
     *
     * @var float $radius the radius for the circle.
     */
    private $radius;

    /**
     * The diameter of the circle.
     *
     * @var float $diameter the diamater of the circle
     */
    private $diameter;

    /**
     * Setter for radius the radius for the circle.
     *
     * @param float $value
     * @return Circle $this
     */
    public function setRadius($value)
    {
        $this->radius = $value;
        $this->diameter = $value * 2;

        return $this;
    }

    /**
     * Getter for radius the radius for the circle.
     *
     * @throws LogicException if radius has not been set
     * @return float the radius for the circle.
     */
    public function getRadius()
    {
        if (!isset($this->radius)) {
            throw new LogicException('radius not set');
        }

        return $this->radius;
    }

    /**
     * Setter for diameter the diamater of the circle
     *
     * @param float $value
     * @return Circle $this
     */
    public function setDiameter($value)
    {
        if (is_float($value) === false) {
            throw new InvalidArgumentException();
        }

        $this->diameter = $value;
        $this->radius = $value / 2;

        return $this;
    }

    /**
     * Getter for diameter the diamater of the circle
     *
     * @throws LogicException if diameter has not been set
     * @return float the diamater of the circle
     */
    public function getDiameter()
    {
        if (!isset($this->diameter)) {
            throw new LogicException('diameter not set');
        }

        return $this->diameter;
    }

    /*
     * Get the circomference of the circle.
     *
     * @return float
     */
    function getCircomference() {
        return 2 * PI * $this->getDiameter();
    }

    /**
     * Get the area for the circle.
     *
     * @return Circle $this
     */
    public function getArea()
    {
        return PI * pow(2, $this->getRadius());
    }
}

