<?php
namespace Assignment1\Graph;

use Assignment1\TestCase;
use Assignment1\Set\Set;
use Assignment1\Vertex\Vertex;

class DirectedGraphTest extends TestCase
{
	public function testNewDirectedGraphHasEmptyVertices()
	{
		$this->assertEquals((new DirectedGraph)->vertices()->isEmpty(), true);
	}
	
	public function testNewDirectedGraphHasEmptyEdges()
	{
		$this->assertEquals((new DirectedGraph)->edges()->isEmpty(), true);
	}
	
	public function testNewDirectedGraphHasZeroVertices()
	{
		$this->assertEquals((new Graph)->countAllVertices(), 0);
	}
	
	public function testNewDirectedGraphHasZeroEdges()
	{
		$this->assertEquals((new Graph)->countAllEdges(), 0);
	}
}
