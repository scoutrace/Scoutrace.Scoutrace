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
}
?>