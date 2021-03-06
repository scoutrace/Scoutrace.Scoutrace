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
class Team {

	/**
	 * Given answers
	 *
	 * @var \Doctrine\Common\Collections\Collection<\Scoutrace\Scoutrace\Domain\Model\Answer>
	 * @ORM\OneToMany(mappedBy="team")
	 */
	protected $answers;

}
?>