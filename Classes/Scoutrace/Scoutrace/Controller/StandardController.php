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
		$account = $this->accountRepository->findByIdentifierAndAuthenticationProviderName($email, 'FacebookProvider');
		if ($account instanceof \TYPO3\Flow\Security\Account) {
			$this->addFlashMessage('You have logged in using facebook and you have an account already');
			$this->redirect('index');
		} else {
			try {
				$roleIdentifiers = array('Scoutrace.Scoutrace:User');
				$account = $this->accountFactory->createAccountWithPassword($email, "asdfsdf", $roleIdentifiers, 'FacebookProvider');
				$user = new \TYPO3\Party\Domain\Model\Person();
				$user->addAccount($account);
				$this->partyRepository->add($user);
				$this->accountRepository->add($account);
				$this->addFlashMessage('You have logged in using facebook and you have created an account');
				$this->persistenceManager->persistsAll();
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
