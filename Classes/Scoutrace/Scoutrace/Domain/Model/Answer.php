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
class Answer {

	/**
	 * Activity
	 *
	 * @var \Scoutrace\Scoutrace\Domain\Model\Activity
	 * @ORM\ManyToOne(inversedBy="answers")
	 */
	protected $activity;

	/**
	 * Team
	 *
	 * @var \Scoutrace\Scoutrace\Domain\Model\Team
	 * @ORM\ManyToOne(inversedBy="answers")
	 */
	protected $team;

}
?>