<?php

namespace JoseCelano\Framework\App\Service;

use JoseCelano\Framework\Domain\CheckLoginUserSpecification;
use JoseCelano\Framework\Domain\Exception\DuplicateUserNameException;
use JoseCelano\Framework\Domain\User;
use JoseCelano\Framework\Domain\UserId;
use JoseCelano\Framework\Domain\UserRepository;

class AuthenticationService
{
    /** @var  Session */
    private $sessionService;

    /** @var  UserRepository */
    private $userRepository;

    /** @var  User */
    private $loggedInUser;

    /**
     * AuthenticationService constructor.
     * @param Session $sessionService
     * @param UserRepository $userRepository
     */
    public function __construct(Session $sessionService, UserRepository $userRepository)
    {
        $this->sessionService = $sessionService;
        $this->userRepository = $userRepository;
    }

    public function authenticateUser($username, $password)
    {
        $users = $this->userRepository->query(new CheckLoginUserSpecification($username, $password));

        if (count($users) == 1) {
            $this->loginUser($users[0]);
            return true;
        }

        return false;
    }

    private function loginUser(User $user)
    {
        $this->loggedInUser = $user;
        $this->sessionService->put('logged_in_user_id', $user->getId()->getValue());
    }

    public function logoutUser()
    {
        $this->loggedInUser = null;
        $this->sessionService->delete('logged_in_user_id');
    }

    public function getUser()
    {
        $loggedInUserId = $this->sessionService->get('logged_in_user_id');

        if ($loggedInUserId && !$this->loggedInUser) {
            $this->loggedInUser = $this->userRepository->userOfId(UserId::fromString($loggedInUserId));
        }

        return $this->loggedInUser;
    }
}