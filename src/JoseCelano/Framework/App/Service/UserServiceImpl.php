<?php

namespace JoseCelano\Framework\App\Service;

use JoseCelano\Framework\Domain\UserRepository;
use JoseCelano\Framework\Presentation\Dto\UserDto;

class UserServiceImpl implements UserService
{
    /**
     * @var UserRepository
     */
    private $userRepository;


    function __construct(UserRepository $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @param string $textToFind
     * @return UserDto[]
     */
    public function search($textToFind)
    {
        // TODO
        //return $this->userRepository->fullTextSearchShortedByName($textToFind);
    }
}