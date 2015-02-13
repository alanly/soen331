<?php
namespace Assignment1\Edge;

interface EdgeInterface
{
	/**
	 * Returns a collection of the vertices that make up the edge.
	 * @return \Traversable
	 */
	public function vertices();

	/**
	 * Returns the object that is stored on the edge.
	 * @return mixed
	 */
	public function element();

	/**
	 * Replace the element at the edge with element $e. Returns the updated edge.
	 * @param  mixed $e
	 * @return EdgeInterface
	 */
	public function replaceElement($e);

	/**
	 * Returns the edge as a set made up of a collection of its end-vertices and
	 * the element it holds.
	 * @return Assignment1\Set\SetInterface
	 */
	public function toSet();
}
