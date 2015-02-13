<?php
namespace Assignment1\Set;

class Set implements SetInterface, \IteratorAggregate
{
	/**
	 * A dictionary containing the elements. To enforce uniqueness, the actual
	 * element is stored as the `key` in the (key,value) relation. The value can
	 * be an arbitrary placeholder.
	 * @var array
	 */
	private $elements = [];

	/**
	 * Add element $e to the set and return an updated set.
	 * @param mixed $e
	 * @return Set
	 */
	public function add($e)
	{
		if (! $this->isMember($e)) {
			$this->elements[$e] = 1;
		}

		return $this;
	}

	/**
	 * Remove element $e from the set and return an updated set.
	 * @param  mixed $e
	 * @return Set
	 */
	public function remove($e)
	{
		unset($this->elements[$e]);

		return $this;
	}

	/**
	 * Return the number of elements in the set.
	 * @return int
	 */
	public function size()
	{
		return count($this->elements);
	}

	/**
	 * Test whether the set is empty or not.
	 * @return boolean
	 */
	public function isEmpty()
	{
		return $this->size() === 0;
	}

	/**
	 * Test whether the set holds element $e.
	 * @param  mixed  $e
	 * @return boolean
	 */
	public function isMember($e)
	{
		return isset($this->elements[$e]);
	}

	/**
	 * Return the set as an array of elements.
	 * @return array
	 */
	public function toArray()
	{
		return array_keys($this->elements);
	}

	/**
	 * Returns an external iterator instance.
	 * @return Traversable
	 */
	public function getIterator()
	{
		return new \ArrayIterator($this->toArray());
	}
}
