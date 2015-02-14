<?php
namespace Assignment1\Graph;

use Assignment1\Graph\Exceptions\NonExistentEdgeException;
use Assignment1\Graph\GraphInterface;
use Assignment1\Set\Set;
use Assignment1\Edge\UndirectedEdge;

class Graph Implements GraphInterface
{
	private $edges;
	private $vertices;
	
  function __construct()
	{
		$this->edges = new Set;
		$this->vertices = new Set;
  }

	public function vertices()
	{
		return $this->vertices;
	}

	public function edges()
	{
		return $this->edges;
	}
	
	public function countAllVertices()
	{
		return $this->vertices->size();
	}
	
	public function countAllEdges()
	{
		return $this->edges->size();
	}

	public function getEdge($v, $w)
	{
		foreach($this->edges as $edge)
		{
			if ($edge->vertices()->isMember($v) && $edge->vertices()->isMember($w))
			{
				return $edge;
			}
		}
		
		throw new NonExistentEdgeException;
	}
	
	public function incidentEdges($v)
	{
		$s = new Set;
		
		foreach($this->edges as $edge)
		{
			if ($edge->vertices()->isMember($v))
			{
				$s->add($edge);
			}
		}
		
		if ($s->size() == 2)
			return $s;
		
		return null;
	}
	
	public function opposite($v, $e)
	{
		foreach($this->edges as $edge)
		{
			if ($e === $edge)
			{
				if ($e->vertices()->isMember($v))
				{
					return $e->vertices()->remove($v)->toArray()[0];
				}
			}
		}
		
		return null;
	}
	
	public function endVertices($e)
	{
		foreach($this->edges as $edge)
		{
			if ($e === $edge)
			{
				return $e->vertices();
			}
		}
		
		return null;
	}
	
	public function areAdjacent($v, $w)
	{
		foreach($this->edges as $edge)
		{
			if ($edge->vertices()->isMember($v) && $edge->vertices()->isMember($w))
			{
				return true;
			}
		}
		
		return false;
	}
	
	public function insertVertex($v)
	{
		$this->vertices->add($v);
		
		return $this;
	}
	
	public function removeVertex($v)
	{
		$this->vertices->remove($v);
		
		return $this;
	}
	
	public function insertEdge($v, $w, $x)
	{
		$e = new UndirectedEdge($v, $w, $x);
		$this->edges->add($e);
		
		return $this;
	}
	
	public function removeEdge($v, $w)
	{
		foreach($this->edges as $edge)
		{
			if ($edge->vertices()->isMember($v) && $edge->vertices()->isMember($w))
			{
				$this->$edges->remove($edge);
			}
		}
		
		return $this;
	}
		
	public function getEdgeElem($e)
	{
		foreach($this->edges as $edge)
		{
			if ($e === $edge)
			{
				return $edge->element();
			}
		}
		
		return null;
	}
		
	public function replaceEdgeElem($e, $x)
	{
		foreach($this->edges as $edge)
		{
			if ($e === $edge)
			{ 
				$edge->replaceElement($x);
			}
		}
		
		return $this;
	}
}