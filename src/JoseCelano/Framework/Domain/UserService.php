<?php

namespace JoseCelano\Framework\Domain;

use JoseCelano\Framework\Domain\Exception\DuplicateUserEmailException;
use JoseCelano\Framework\Domain\Exception\DuplicateUserIdException;
use JoseCelano\Framework\Domain\Exception\DuplicateUserNameException;

class UserService
{
    /** @var  UserRepository */
    private $userRepository;

    /**
     * UserService constructor.
     * @param UserRepository $userRepository
     */
    public function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    public function registerUser(User $newUser)
    {
        $this->guardThatIdIsNotDuplicate($newUser);
        $this->guardThatEmailIsNotDuplicate($newUser);
        $this->guardThatUsernameIsNotDuplicate($newUser);

        $this->userRepository->insert($newUser);
    }

    /**
     * @param User $newUser
     */
    private function guardThatIdIsNotDuplicate(User $newUser)
    {
        $user = $this->userRepository->userOfId($newUser->getId());
        if (!is_null($user)) {
            throw new DuplicateUserIdException($newUser->getId()->getValue());
        }
    }

    /**
     * @param User $newUser
     */
    private function guardThatEmailIsNotDuplicate(User $newUser)
    {
        $user = $this->userRepository->userOfEmail($newUser->getEmail());
        if (!is_null($user)) {
            throw new DuplicateUserEmailException($newUser->getEmail());
        }
    }

    /**
     * @param User $newUser
     */
    private function guardThatUsernameIsNotDuplicate(User $newUser)
    {
        $user = $this->userRepository->userOfUsername($newUser->getUsername());
        if (!is_null($user)) {
            throw new DuplicateUserNameException($newUser->getUsername());
        }
    }
}