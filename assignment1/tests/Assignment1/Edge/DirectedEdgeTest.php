<?php
namespace Assignment1\Edge;

use Assignment1\TestCase;
use \Mockery as m;

class DirectedEdgeTest extends TestCase
{
	private function getMockVertex()
	{
		return m::mock('Assignment1\Vertex\VertexInterface');
	}

	public function testNewEdgeContainsTheGivenOrderedVerticesAndElement()
	{
		$v = $this->getMockVertex();
		$w = $this->getMockVertex();
		$e = 'foobar';

		$e = new DirectedEdge($v, $w, $e);

		$this->assertInstanceOf('Assignment1\Vector\Vector', $e->vertices());
		$this->assertSame($v, $e->vertices()->getX());
		$this->assertSame($w, $e->vertices()->getY());
		$this->assertSame('foobar', $e->element());
	}

	public function testEdgeCanBeExpressedAsASetOfItsState()
	{
		$v = $this->getMockVertex();
		$w = $this->getMockVertex();
		$e = 'foobar';

		$e = new DirectedEdge($v, $w, $e);

		$set = $e->toSet();

		$this->assertCount(2, $set);
		$this->assertTrue($set->isMember($e->element()));

		$vertex = null;

		foreach ($set as $value) {
			if (is_object($value) && get_class($value) === 'Assignment1\Vector\Vector') {
				$vertex = $value;
			}
		}

		$this->assertNotNull($vertex);

		$this->assertSame($v, $vertex->getX());
		$this->assertSame($w, $vertex->getY());
	}
}
