<?php
namespace Scoutrace\Scoutrace\Controller;

/*                                                                        *
 * This script belongs to the TYPO3 Flow package "Scoutrace.Scoutrace".   *
 *                                                                        *
 *                                                                        */

use TYPO3\Flow\Annotations as Flow;

/**
 * Standard controller for the Scoutrace.Scoutrace package 
 *
 * @Flow\Scope("singleton")
 */
class StandardController extends \TYPO3\Flow\Mvc\Controller\ActionController {
	/**
	 * @Flow\Inject
	 * @var \TYPO3\Flow\Security\AccountRepository
	 */
	protected $accountRepository;

	/**
	 * @Flow\Inject
	 * @var \TYPO3\Party\Domain\Repository\PartyRepository
	 */
	protected $partyRepository;

	/**
	 * @Flow\Inject
	 * @var \TYPO3\Flow\Security\Cryptography\HashService
	 */
	protected $hashService;

	/**
	* @Flow\Inject
	* @var \TYPO3\Flow\Security\AccountFactory
	*/
	protected $accountFactory;

	/**
	 * @Flow\Inject
	 * @var \TYPO3\Flow\Persistence\PersistenceManagerInterface
	 */
	protected $persistenceManager;

	/**
	 * Index action
	 *
	 * @return void
	 */
	public function indexAction() {
		$this->view->assign('foos', array(
			'bar', 'baz'
		));
	}

	public function loginfacebookAction() {
		$arguments = $this->request->getArguments();
		$email = $arguments['email'];
		$userid = $arguments['userid'];
		$username = $arguments['username'];
		$name = $arguments['name'];
		$firstName = $arguments['firstname'];
		$lastName = $arguments['lastname'];
		$account = $this->accountRepository->findByIdentifierAndAuthenticationProviderName($email, 'FacebookProvider');
		if ($account instanceof \TYPO3\Flow\Security\Account) {
			$this->addFlashMessage('You have logged in using facebook and you have an account already');
			$this->redirect('index');
		} else {
			try {
				$roleIdentifiers = array('Scoutrace.Scoutrace:User');
				//$new_account = $this->accountFactory->createAccountWithPassword($email, "asdfsdf", $roleIdentifiers, 'FacebookProvider');
				$person = new \TYPO3\Party\Domain\Model\Person();
				$title = ''; //Like mr. or mrs.
				$middleName = '';
				$otherName = ''; // Like Jr. or IV.
				$alias = $username;
				$personName = new \TYPO3\Party\Domain\Model\PersonName($title, $firstName, $middleName, $lastName, $otherName, $alias);
				$person->setName($personName);
				$electronicAddress = new \TYPO3\Party\Domain\Model\ElectronicAddress();
				$electronicAddress->setIdentifier($email);
				$electronicAddress->setType('Email');
				//$electronicAddress->setType($electronicAddress->TYPE_EMAIL);
				$electronicAddress->setApproved(true);
				$person->addElectronicAddress($electronicAddress);
				//$person->addAccount($new_account);
				$this->partyRepository->add($person);
				$accounts = $person->getAccounts();
				foreach ($accounts as $account) {
					$this->accountRepository->add($account);
				}
				$this->addFlashMessage('You have logged in using facebook and you have created an account');
				$this->persistenceManager->persistAll();
				$this->redirect('index');
			} catch (\TYPO3\Flow\Security\Exception\NoSuchRoleException $exception) {
				$this->outputLine($exception->getMessage());
				$this->addFlashMessage('Some error happen');
				$this->redirect('index');
			}
		}
	}

}

?>
