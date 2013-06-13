<?php
namespace Scoutrace\Scoutrace\Command;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Scoutrace.Scoutrace".   *
 *                                                                        *
 *                                                                        */

use Scoutrace\Scoutrace\Domain\Model\Activity;
use Scoutrace\Scoutrace\Domain\Model\Event;
use Scoutrace\Scoutrace\Domain\Model\Team;
use TYPO3\Flow\Annotations as Flow;

/**
 * @Flow\Scope("singleton")
 */
class SetupCommandController extends \TYPO3\Flow\Cli\CommandController {

	/**
	 * Inject Event repository
	 *
	 * @var \Scoutrace\Scoutrace\Domain\Repository\EventRepository
	 * @Flow\Inject
	 */
	protected $eventRepository;

	/**
	 * Create data for demo/dev purpose
	 *
	 * @param integer $events Number of demo events to create (default 10)
	 * @param integer $activities Number of demo activities to create per event (default 10)
	 * @param integer $teams Number of demo teams to create per event (default 5)
	 *
	 * @return void
	 */
	public function demoCommand($events = 10, $activities = 10, $teams = 5) {
		$eventsCount = 1;
		do {
			$event = new Event();
			$event->setTitle('Test event #' . $eventsCount);
			$activityCount = 1;
			do {
				$activity = new Activity();
				$activity->setTitle('Test activity #' . $eventsCount . '-' . $activityCount);
				$event->addActivity($activity);
				$activityCount++;
			} while ($activityCount <= $activities);

			$this->eventRepository->add($event);

			$this->outputFormatted('Event <b>%s</b> was created with ' . $activities . ' activities attached', array('Test event #' . $eventsCount));
			$eventsCount++;
		} while ($eventsCount <= $events);
	}

}

?>