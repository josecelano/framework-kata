<?php

namespace JoseCelano\Framework\App\Service;

use JoseCelano\Framework\Presentation\Dto\UserDto;

interface UserService
{
    /**
     * @param string $textToFind
     * @return UserDto[]
     */
    public function search($textToFind);
}