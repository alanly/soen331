<?php
namespace Assignment1\Edge;

use Assignment1\TestCase;
use \Mockery as m;

class UndirectedEdgeTest extends TestCase
{
	private function getMockVertex()
	{
		return m::mock('Assignment1\Vertex\VertexInterface');
	}

	public function testNewEdgeContainsTheGivenVerticesAndElement()
	{
		$v = $this->getMockVertex();
		$w = $this->getMockVertex();
		$e = 'foobar';

		$e = new UndirectedEdge($v, $w, $e);

		$this->assertCount(2, $e->vertices());
		$this->assertTrue($e->vertices()->isMember($v));
		$this->assertTrue($e->vertices()->isMember($w));
		$this->assertSame('foobar', $e->element());
	}

	public function testReplacingElementUpdatesTheElementOnTheEdge()
	{
		$v = $this->getMockVertex();
		$w = $this->getMockVertex();
		$e = 'foo';

		$e = new UndirectedEdge($v, $w, $e);
		$e->replaceElement('bar');

		$this->assertSame('bar', $e->element());
	}

	/**
	 * @expectedException Assignment1\Edge\Exceptions\NullElementException
	 */
	public function testExceptionThrownWhenReplacingElementWithNull()
	{
		$v = $this->getMockVertex();
		$w = $this->getMockVertex();
		$e = 'foo';

		$e = new UndirectedEdge($v, $w, $e);
		$e->replaceElement(null);
	}

	public function testEdgeCanBeExpressedAsASetOfItsState()
	{
		$v = $this->getMockVertex();
		$w = $this->getMockVertex();
		$e = 'foo';

		$e = new UndirectedEdge($v, $w, $e);

		$set = $e->toSet();

		$this->assertCount(2, $set);

		$this->assertTrue($set->isMember($e->element()));

		$verticesSet = null;

		foreach ($set as $value) {
			if (is_object($value) && get_class($value) === 'Assignment1\Set\Set') {
				$verticesSet = $value;
			}
		}

		$this->assertNotNull($verticesSet);

		$vertices = $e->vertices()->toArray();

		$this->assertTrue($verticesSet->isMember($vertices[0]));
		$this->assertTrue($verticesSet->isMember($vertices[1]));
	}
}