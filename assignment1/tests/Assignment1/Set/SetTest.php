<?php
namespace Assignment1\Set;

use Assignment1\TestCase;

class SetTest extends TestCase
{
	public function testNewSetIsEmpty()
	{
		$this->assertTrue((new Set)->isEmpty());
	}

	public function testArbitraryElementIsNotAMemberOfANewSet()
	{
		$this->assertFalse((new Set)->isMember('foobar'));
	}

	public function testElementAddedToSetIsAMemberOfThatSet()
	{
		$this->assertTrue((new Set)->add('foobar')->isMember('foobar'));
	}

	public function testAddIsIndependentOfOrder()
	{
		$s_a = (new Set)->add('foo')->add('bar');
		$s_b = (new Set)->add('bar')->add('foo');

		$this->assertCount(2, $s_a);
		$this->assertCount(2, $s_b);

		$this->assertContains('foo', $s_a);
		$this->assertContains('bar', $s_a);
		$this->assertContains('foo', $s_b);
		$this->assertContains('bar', $s_b);
	}

	public function testSequenceOfAddAndRemoveOverTheSameSetWithASingleElementResultsInOriginalSet()
	{
		$origSet = new Set;
		$origValues = $origSet->toArray();

		$updatedSet = $origSet->add('foo')->remove('foo');
		$updatedValues = $updatedSet->toArray();

		$this->assertSame($origValues, $updatedValues);
	}

	public function testSizeOfNewSetIsZero()
	{
		$this->assertSame(0, (new Set)->size());
	}

	public function testSizeOfSetWithNewlyAddedMemberIsOriginalSizePlusOne()
	{
		$s = new Set;
		$s->add('foo');

		$this->assertSame($s->size() + 1, $s->add('bar')->size());
	}

	public function testSizeOfSetWithExistingMemberAddedIsUnchangedFromOriginalSize()
	{
		$s = new Set;
		$s->add('foo');

		$this->assertSame($s->size(), $s->add('foo')->size());
	}
}
