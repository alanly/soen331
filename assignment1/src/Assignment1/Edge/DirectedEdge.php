<?php
namespace Assignment1\Edge;

use Assignment1\Vector\Vector;
use Assignment1\Vertex\VertexInterface as Vertex;

class DirectedEdge extends UndirectedEdge
{
	/**
	 * Constructs a new directed edge between vertex $origin and $dest, holding
	 * an element $e. An exception is thrown if the element is null.
	 * @param Vertex $origin [description]
	 * @param Vertex $dest   [description]
	 * @param [type] $e      [description]
	 * @throws Assignment1\Edge\Exceptions\NullElementException
	 */
	public function __construct(Vertex $origin, Vertex $dest, $e)
	{
		parent::__construct($origin, $dest, $e);
	}

	/**
	 * Returns a vector of the vertices that define the edge.
	 * @return Vector
	 */
	public function vertices()
	{
		return new Vector($this->startVertex, $this->endVertex);
	}
}
