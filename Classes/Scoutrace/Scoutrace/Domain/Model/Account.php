<?php
namespace Scoutrace\Scoutrace\Domain\Model;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Scoutrace.Scoutrace".   *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;
use Doctrine\ORM\Mapping as ORM;
use TYPO3\Party\Domain\Model\AbstractParty;

/**
 * @Flow\Entity
 */
class Account extends AbstractParty {

	/**
	 * Events
	 *
	 * @var \Doctrine\Common\Collections\Collection<\Scoutrace\Scoutrace\Domain\Model\Event>
	 * @ORM\ManyToMany(inversedBy="organizers")
	 */
	protected $events;


}
?>