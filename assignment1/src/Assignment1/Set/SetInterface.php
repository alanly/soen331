<?php
namespace Assignment1\Set;

interface SetInterface
{
	/**
	 * Create a new and empty set.
	 * @return SetInterface
	 */
	public function newset();

	/**
	 * Add element $e to the set and return an updated set.
	 * @param mixed $e
	 * @return SetInterface
	 */
	public function add($e);

	/**
	 * Remove element $e from the set and return an updated set.
	 * @param  mixed $e
	 * @return SetInterface
	 */
	public function remove($e);

	/**
	 * Return the number of elements in the set.
	 * @return int
	 */
	public function size();

	/**
	 * Test whether the set is empty or not.
	 * @return boolean
	 */
	public function isEmpty();

	/**
	 * Test whether the set holds element $e.
	 * @param  mixed  $e
	 * @return boolean
	 */
	public function isMember($e);
}
