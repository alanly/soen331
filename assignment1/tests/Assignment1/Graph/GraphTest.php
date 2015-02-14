<?php
namespace Assignment1\Graph;

use Assignment1\TestCase;
use Assignment1\Set\Set;
use Assignment1\Vertex\Vertex;

class GraphTest extends TestCase
{
	// axiom 1
	public function testNewGraphHasEmptyVertices()
	{
		$this->assertEquals((new Graph)->vertices()->isEmpty(), true);
	}
	
	// axiom 2
	public function testNewGraphHasEmptyEdges()
	{
		$this->assertEquals((new Graph)->edges()->isEmpty(), true);
	}
	
	// axiom 3
	public function testNewGraphHasZeroVertices()
	{
		$this->assertEquals((new Graph)->countAllVertices(), 0);
	}
	
	// axiom 4
	public function testNewGraphHasZeroEdges()
	{
		$this->assertEquals((new Graph)->countAllEdges(), 0);
	}
	
	// axiom 5
	public function testCardinalityDistinctVertices()
	{
		$g = new Graph;
		$v = new Vertex;
		$w = new Vertex;

		$g->insertVertex($v);
		$g->insertVertex($w);
		
		$this->assertEquals($g->vertices()->size(), 2);
	}
	
	// axiom 6
	public function testCardinalitySameVertices()
	{
		$g = new Graph;
		$v = new Vertex;

		$g->insertVertex($v);
		$g->insertVertex($v);
		
		$this->assertEquals($g->vertices()->size(), 1);
	}
	
	// axiom 7
	public function testVertexInsertAndRemoveAreInverse()
	{
		$g = new Graph;
		$v = new Vertex;

		$g->insertVertex($v)->removeVertex($v);
		
		$this->assertEquals($g->countAllVertices(), 0);
	}
	
	// axiom 8
	public function testEdgeInsertAndRemoveAreInverse()
	{
		$g = new Graph;
		$v = new Vertex;
		$w = new Vertex;
		
		$g->insertEdge($v, $w, 'foo')->removeEdge($v, $w);
		
		$this->assertEquals($g->countAllEdges(), 0);
	}

	// axiom 9
	public function testAreAdjacent()
	{
		$g = new Graph;
		$u = new Vertex;
		$v = new Vertex;
		$w = new Vertex;

		$g->insertEdge($v, $w, 'foo');
		$g->insertEdge($w, $u, 'bar');
		
		$this->assertTrue($g->areAdjacent($v, $w));
		$this->assertFalse($g->areAdjacent($v, $u));
	}
	
	// axiom 10
	public function testIncidentEdges()
	{
		$g = new Graph;
		$u = new Vertex;
		$v = new Vertex;
		$w = new Vertex;

		$g->insertEdge($v, $w, 'foo');
		$g->insertEdge($w, $u, 'bar');

		$e = $g->getEdge($v, $w);
		$f = $g->getEdge($w, $u);
		
		$s = new Set;
		$s->add($e);
		$s->add($f);

		$this->assertNotNull($g->incidentEdges($w));
		$this->assertEquals($s->toArray(), $g->incidentEdges($w)->toArray());
	}
	
	// axiom 11
	public function testOpposite()
	{
		$g = new Graph;
		$u = new Vertex;
		$v = new Vertex;
		$w = new Vertex;

		$g->insertEdge($v, $w, 'foo');
		$g->insertEdge($w, $u, 'bar');
		$e = $g->getEdge($v, $w);
		$f = $g->getEdge($w, $u);
		
		$this->assertSame($g->opposite($v, $e), $w);
		$this->assertSame($g->opposite($u, $f), $w);
	}
	
	// axiom 12
	public function testEndVertices()
	{
		$g = new Graph;
		$v = new Vertex;
		$w = new Vertex;

		$g->insertEdge($v, $w, 'foo');
		$e = $g->getEdge($v, $w);
		
		$this->assertTrue($g->endVertices($e)->isMember($v));
		$this->assertTrue($g->endVertices($e)->isMember($w));
	}
	
	// axiom 13
	public function testGetEdgeElem()
	{
		$g = new Graph;
		$v = new Vertex;
		$w = new Vertex;

		$g->insertEdge($v, $w, 'foo');
		$e = $g->getEdge($v, $w);
		
		$this->assertNotNull($g->getEdgeElem($e));
		$this->assertSame($g->getEdgeElem($e), 'foo');
	}
	
	// axiom 14
	public function testReplaceEdgeElem()
	{
		$g = new Graph;
		$v = new Vertex;
		$w = new Vertex;

		$g->insertEdge($v, $w, 'foo');
		$e = $g->getEdge($v, $w);
		$g->replaceEdgeElem($e, 'bar');

		// extra asserts for extra quality control
		$this->assertNotEquals($g->getEdgeElem($e), 'foo');
		$this->assertEquals($g->getEdgeElem($e), 'bar');
	}
}
