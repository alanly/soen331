<?php
namespace Assignment1\Set;

class Set implements SetInterface, \IteratorAggregate
{
	/**
	 * A dictionary containing the elements. The key is the hash value of the
	 * object.
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
		$hashValue = $this->getHashValue($e);

		if (! $this->isMember($hashValue)) {
			$this->elements[$hashValue] = $e;
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
		unset($this->elements[$this->getHashValue($e)]);

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
		return isset($this->elements[$this->getHashValue($e)]);
	}

	/**
	 * Return the set as an array of elements.
	 * @return array
	 */
	public function toArray()
	{
		return array_values($this->elements);
	}

	/**
	 * Returns an external iterator instance.
	 * @return Traversable
	 */
	public function getIterator()
	{
		return new \ArrayIterator($this->toArray());
	}

	/**
	 * Returns the hash value for the object or value $e.
	 * @param  mixed $e
	 * @return string
	 */
	private function getHashValue($e)
	{
		if (is_object($e)) {
			return spl_object_hash($e);
		}

		return sha1($e);
	}
}
