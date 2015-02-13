<?php
namespace Assignment1\Vector;

class Vector
{
	/**
	 * The x-value of the vector.
	 * @var mixed
	 */
	private $x;

	/**
	 * The y-value of the vector.
	 * @var mixed
	 */
	private $y;

	/**
	 * Construct a vector with the values $x and $y.
	 * @param mixed $x
	 * @param mixed $y
	 */
	public function __construct($x, $y)
	{
		$this->x = $x;
		$this->y = $y;
	}

	/**
	 * Returns the X value of the vector.
	 * @return mixed
	 */
	public function getX()
	{
		return $this->x;
	}

	/**
	 * Returns the Y value of the vector.
	 * @return mixed
	 */
	public function getY()
	{
		return $this->y;
	}

	/**
	 * Set the X value of the vector. Returns the updated vector.
	 * @param  mixed $x
	 * @return Vector
	 */
	public function setX($x)
	{
		$this->x = $x;

		return $this;
	}

	/**
	 * Set the Y value of the vector. Returns the updated vector.
	 * @param  mixed $y
	 * @return Vector
	 */
	public function setY($y)
	{
		$this->y = $y;

		return $this;
	}

	/**
	 * Returns an array representation of this vector in the form [x, y].
	 * @return array
	 */
	public function toArray()
	{
		return [$this->x, $this->y];
	}
}
