<?php

namespace JoseCelano\Framework\Presentation\Console;

interface ConsoleCommand
{
    /**
     * @param array $input
     * @param string $output
     */
    public function execute($input, & $output);
}