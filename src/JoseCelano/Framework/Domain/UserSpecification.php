<?php

namespace JoseCelano\Framework\Domain;

interface UserSpecification
{
    /**
     * @param User $user
     * @return bool
     */
    public function specifies(User $user);
}