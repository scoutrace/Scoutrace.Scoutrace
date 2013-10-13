<?php
namespace Scoutrace\Scoutrace\Domain\Model;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Scoutrace.Scoutrace".   *
 *                                                                        *
 *                                                                        */

use Doctrine\Common\Collections\ArrayCollection;
use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Flow\Entity
 */
class Event {

	/**
	 * Event title
	 *
	 * @var string
	 * @Flow\Validate(type="NotEmpty")
	 */
	protected $title;

	/**
	 * Activities
	 *
	 * @var \Doctrine\Common\Collections\Collection<\Scoutrace\Scoutrace\Domain\Model\Activity>
	 * @ORM\OneToMany(mappedBy="event")
	 */
	protected $activities;

	/**
	 * Teams
	 *
	 * @var \Doctrine\Common\Collections\Collection<\Scoutrace\Scoutrace\Domain\Model\Team>
	 * @ORM\OneToMany(mappedBy="event")
	 */
	protected $teams;

	/**
	 * Organizers
	 *
	 * @var \Doctrine\Common\Collections\Collection<\Scoutrace\Scoutrace\Domain\Model\Account>
	 * @ORM\ManyToMany(mappedBy="events")
	 */
	protected $organizers;

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->activities = new ArrayCollection();
		$this->organizers = new ArrayCollection();
		$this->teams = new ArrayCollection();
	}

	/**
	 * @param string $title
	 */
	public function setTitle($title) {
		$this->title = $title;
	}

	/**
	 * @return string
	 */
	public function getTitle() {
		return $this->title;
	}

	/**
	 * @param \Doctrine\Common\Collections\Collection<\Scoutrace\Scoutrace\Domain\Model\Activity> $activities
	 */
	public function setActivities($activities) {
		$this->activities = $activities;
	}

	/**
	 * @return \Doctrine\Common\Collections\Collection
	 */
	public function getActivities() {
		return $this->activities;
	}

	/**
	 * Remove activtiy
	 *
	 * @var \Scoutrace\Scoutrace\Domain\Model\Activity
	 * @return void
	 */
	public function removeActivity(\Scoutrace\Scoutrace\Domain\Model\Activity $activity) {
		$this->activities->remove($activity);
	}

	/**
	 * Add activity
	 *
	 * @var \Scoutrace\Scoutrace\Domain\Model\Activity
	 */
	public function addActivity(\Scoutrace\Scoutrace\Domain\Model\Activity $activity) {
		$activity->setEvent($this);
		$this->activities->add($activity);
	}




}
?>
