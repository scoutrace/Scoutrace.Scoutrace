<?php
namespace Scoutrace\Scoutrace\Domain\Model;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Scoutrace.Scoutrace".   *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;

/**
 * @Flow\Entity
 */
class Activity {

	/**
	 * Activity title
	 *
	 * @var string
	 * @Flow\Validate(type="notEmpty")
	 */
	protected $title;

	/**
	 * Event
	 *
	 * @var \Scoutrace\Scoutrace\Domain\Model\Event
	 * @ORM\ManyToOne(inversedBy="activities")
	 */
	protected $event;

	/**
	 * Answers
	 *
	 * @var \Doctrine\Common\Collections\Collection<\Scoutrace\Scoutrace\Domain\Model\Answer>
	 * @ORM\OneToMany(mappedBy="activity")
	 */
	protected $answers;

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
	 * Set event
	 *
	 * @var \Scoutrace\Scoutrace\Domain\Model\Event
	 * @return void
	 */
	public function setEvent(\Scoutrace\Scoutrace\Domain\Model\Event $event) {
		$this->event = $event;
	}

	/**
	 * Get event
	 *
	 * @return \Scoutrace\Scoutrace\Domain\Model\Event
	 */
	public function getEvent() {
		return $this->event;
	}
}
?>