<?php
namespace Scoutrace\Scoutrace\Tests\Unit\Domain\Model;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Scoutrace.Scoutrace".   *
 *                                                                        *
 *                                                                        */
use Scoutrace\Scoutrace\Domain\Model\Event;

/**
 * Testcase for Event
 */
class EventTest extends \TYPO3\Flow\Tests\UnitTestCase {

	/**
	 * Event model
	 * @var \Scoutrace\Scoutrace\Domain\Model\Event
	 */
	protected $fixture;

	/**
	 * Setup
	 */
	public function setUp() {
		$this->fixture = new Event();
	}

	/**
	 * @test
	 */
	public function titleCanBeSetAndRetrieved() {
		$title = 'Super duper scoutrace!!!';

		$this->fixture->setTitle($title);
		$this->assertSame($title, $this->fixture->getTitle());
	}

	/**
	 * @test
	 */
	public function activitiesCanBeSetAndRetrieved() {
		$this->markTestSkipped();
		$this->fixture->setActivities($this->getMock('\Doctrine\Common\Collections\Collection'));
		$this->assertInstanceOf('\Doctrine\Common\Collections\Collection', $this->fixture->getActivities());
	}


}
?>