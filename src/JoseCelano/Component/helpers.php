<?php

function render($name, $props = [], $nestingLevel = 0, $echo = true)
{
    $html = JoseCelano\Component\Render::this()->component($name, $props, $nestingLevel);
    if ($echo && $nestingLevel = 0) echo $html;
    return $html;
}

function captureRender($name, $props = [], $nestingLevel = 0)
{
    return JoseCelano\Component\Render::this()->component($name, $props, $nestingLevel, false);
}