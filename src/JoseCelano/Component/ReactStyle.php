<?php

namespace JoseCelano\Component;

interface ReactStyle extends Component
{
    /**
     * @param callable $render
     * @return string
     */
    public function render(callable $render);
}