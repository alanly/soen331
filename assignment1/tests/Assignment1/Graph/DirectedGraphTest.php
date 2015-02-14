<?php
namespace Assignment1\Graph;

use Assignment1\TestCase;

class DirectedGraphTest extends TestCase
{
	public function testIncomingEdgesOf()
	{
		$g = new Graph;
		$v = new Vertex;
		$w = new Vertex;

		$g->insertDirectedEdge($v, $w, 'x');
		$g->insertDirectedEdge($w, $v, 'y');

		$e = $g->getEdge($v, $w);

		$s = new Set;
		$s->add($e);
		$s->add($e);
		
		$this->assertEquals($g->incomingEdgesOf($v)->toArray(), $s->toArray());
	}
}
