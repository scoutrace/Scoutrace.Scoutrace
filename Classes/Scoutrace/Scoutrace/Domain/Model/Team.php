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

	
	/**
	 * Team Name
	 * 
	 * Could be something like "Skovduerne" or "Team 5"
	 *
	 * @var string
	 * @Flow\Validate(type="NotEmpty")
	 */
	protected $name;

	/**
	 * Contact 
	 * 
	 * The team contact or team captaiin
	 *
	 * @var \Doctrine\Common\Collections\Collection<\Scoutrace\Scoutrace\Domain\Model\Account>
	 * @Flow\Validate(type="NotEmpty")
	 */
	protected $contact;

	/**
	 * Team members
	 * 
	 * @var \Doctrine\Common\Collections\Collection<\Scoutrace\Scoutrace\Domain\Model\Account>
	 * @ORM\ManyToMany(mappedBy="teams")
	 */
	protected $teamMembers;

	/**
	 * Constructor
	 */
	public function __construct() {
		$this->teamMembers = new ArrayCollection();
	}
}
?>
