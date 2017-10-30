<?php

namespace JoseCelano\Framework\Presentation\Console;

use JoseCelano\Framework\Presentation\Dto\UserDto;

class ResultPrinter
{
    /**
     * @param UserDto[] $users
     */
    public function printUsers($users)
    {
        if (!is_array($users) || count($users) == 0) {
            return;
        }

        echo "Total: " . count($users) . "\n";

        /** @var UserDto $userDto */
        foreach ($users as $userDto) {
            echo sprintf("User %s %s %s\n", $userDto->getId(), $userDto->getUsername(), $userDto->getEmail());
        }
    }
}