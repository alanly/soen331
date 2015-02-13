<?php
namespace Assignment1\Edge;

use Assignment1\Edge\Exceptions\NullElementException;
use Assignment1\Set\Set;
use Assignment1\Vertex\VertexInterface as Vertex;

class UndirectedEdge implements EdgeInterface
{
	/**
	 * The start vertex of the edge.
	 * @var Vertex
	 */
	private $startVertex;

	/**
	 * The end vertex of the edge.
	 * @var Vertex
	 */
	private $endVertex;

	/**
	 * The element stored on the edge.
	 * @var mixed
	 */
	private $element;

	/**
	 * Constructs a new undirected edge between vertices $v and $w, with an
	 * element $e. An exception is thrown if the element is null.
	 * @param Vertex $v
	 * @param Vertex $w
	 * @param mixed  $e
	 * @throws Assignment1\Edge\Exceptions\NullElementException
	 */
	public function __construct(Vertex $v, Vertex $w, $e)
	{
		if ($e === null) throw new NullElementException;

		$this->startVertex = $v;
		$this->endVertex = $w;
		$this->element = $e;
	}

	/**
	 * Returns a set of the vertices that make up the edge.
	 * @return Set
	 */
	public function vertices()
	{
		$set = new Set;
		$set->add($this->startVertex)->add($this->endVertex);

		return $set;
	}

	/**
	 * Returns the object that is stored on the edge.
	 * @return mixed
	 */
	public function element()
	{
		return $this->element;
	}

	/**
	 * Replace the element at the edge with element $e. Returns the updated edge.
	 * An exception is thrown is the replacement element is null.
	 * @param  mixed $e
	 * @return EdgeInterface
	 * @throws Assignment1\Edge\Exceptions\NullElementException
	 */
	public function replaceElement($e)
	{
		if ($e === null) throw new NullElementException;

		$this->element = $e;

		return $this;
	}

	/**
	 * Returns the edge as a set made up of a collection of its end-vertices and
	 * the element it holds.
	 * @return Assignment1\Set\SetInterface
	 */
	public function toSet()
	{
		$set = new Set;
		$set->add($this->vertices())->add($this->element());

		return $set;
	}
}
