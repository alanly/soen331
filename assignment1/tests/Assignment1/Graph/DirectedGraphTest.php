<?php
namespace Assignment1\Graph;

use Assignment1\TestCase;
use Assignment1\Set\Set;
use Assignment1\Vertex\Vertex;

class DirectedGraphTest extends TestCase
{
	// axiom 1
	public function testNewDirectedGraphHasEmptyVertices()
	{
		$this->assertEquals((new DirectedGraph)->vertices()->isEmpty(), true);
	}
	
	// axiom 2
	public function testNewDirectedGraphHasEmptyEdges()
	{
		$this->assertEquals((new DirectedGraph)->edges()->isEmpty(), true);
	}
	
	// axiom 3
	public function testNewDirectedGraphHasZeroVertices()
	{
		$this->assertEquals((new Graph)->countAllVertices(), 0);
	}
	
	// axiom 4
	public function testNewDirectedGraphHasZeroEdges()
	{
		$this->assertEquals((new Graph)->countAllEdges(), 0);
	}
	
	// axiom 5
	public function testIncomingEdgesOf()
	{
		$g = new DirectedGraph;
		$v = new Vertex;
		$w = new Vertex;

		$g->insertDirectedEdge($v, $w, 'x');
		$g->insertDirectedEdge($w, $v, 'y');

		$e = $g->getEdge($w, $v);

		$s = new Set;
		$s->add($e);
		
		$this->assertEquals($g->incomingEdgesOf($v)->toArray(), $s->toArray());
	}
	
	// axiom 6
	public function testIndegree()
	{
		$g = new DirectedGraph;
		$v = new Vertex;
		$w = new Vertex;

		$g->insertDirectedEdge($v, $w, 'x');
		$g->insertDirectedEdge($w, $v, 'y');

		$this->assertEquals($g->inDegreeOf($v), 1);
	}
	
	// axiom 7
	public function testOutdegree()
	{
		$g = new DirectedGraph;
		$v = new Vertex;
		$w = new Vertex;

		$g->insertDirectedEdge($v, $w, 'x');
		$g->insertDirectedEdge($w, $v, 'y');

		$this->assertEquals($g->outDegreeOf($v), 1);
	}
	
	// axiom 8
	public function testOutgoingEdgesOf()
	{
		$g = new DirectedGraph;
		$v = new Vertex;
		$w = new Vertex;

		$g->insertDirectedEdge($v, $w, 'x');
		$g->insertDirectedEdge($w, $v, 'y');

		$e = $g->getEdge($v, $w);

		$s = new Set;
		$s->add($e);

		$this->assertEquals($g->outgoingEdgesOf($v)->toArray(), $s->toArray());
	}
	
	// axiom 9
	public function testInDegreeOfAlternate()
	{
		$g = new DirectedGraph;
		$u = new Vertex;
		$v = new Vertex;
		$w = new Vertex;

		$g->insertDirectedEdge($v, $w, 'x');
		$g->insertDirectedEdge($u, $w, 'y');

		$this->assertEquals($g->inDegreeOf($w), 2);
	}
	
	// axiom 10
	public function testOutDegreeOfAlternate()
	{
		$g = new DirectedGraph;
		$u = new Vertex;
		$v = new Vertex;
		$w = new Vertex;

		$g->insertDirectedEdge($v, $w, 'x');
		$g->insertDirectedEdge($u, $w, 'y');

		$this->assertEquals($g->outDegreeOf($v), 1);
	}
}
