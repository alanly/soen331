<?php
namespace Assignment1\Graph;

use Assignment1\Graph\Graph;
use Assignment1\Set\Set;
use Assignment1\Edge\DirectedEdge;

class DirectedGraph extends Graph
{
  function __construct()
	{
  }

	public function insertDirectedEdge($v, $w, $x)
	{
		$this->vertices()->add($v);
		$this->vertices()->add($w);
				
		$e = new DirectedEdge($v, $w, $x);
		$this->edges->add($e);
		
		return $this;
	}
	
	public function incomingEdgesOf($v)
	{
		$s = new Set;
		
		foreach($this->edges as $edge)
		{
			if ($edge->vertices()->getY() === $v)
			{
				$s->add($edge);
			}
		}
	}
}