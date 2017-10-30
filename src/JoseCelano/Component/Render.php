<?php

namespace JoseCelano\Component;

class Render
{
    private static $render;

    public static function this()
    {
        if (is_null(self::$render)) {
            self::$render = new self();
        }

        return self::$render;
    }

    public function component($className, $props = [], $nestingLevel = 0, $echo = true)
    {
        $component = $this->createComponentOfClass($className, $props);

        if ($component instanceof ReactStyle) {

            $thisRender = $this;
            $renderer = function ($name, $props = [], $nestingLevel = 0) use ($thisRender) {
                $nestingLevel++;
                $html = $thisRender->component($name, $props, $nestingLevel);
                return $html;
            };

            $html = $component->render($renderer);
            if ($echo && $nestingLevel == 0) echo $html;
            return $html;
        }

        if ($component instanceof VueStyle) {
            $html = $this->renderView($component);
            if ($echo && $nestingLevel == 0) echo $html;
            return $html;
        }

        throw new \Exception("Invalid component class $className");
    }

    /**
     * @param $className
     * @param $props
     * @return mixed
     */
    private function createComponentOfClass($className, $props)
    {
        return new $className($props);
    }

    /**
     * You can access component props inside the template with: $component->attribute ot $props->attribute
     * @param VueStyle $component
     * @return string
     */
    private function renderView(VueStyle $component)
    {
        $props = (object)$component->props();

        $this->guardThatViewFileExist($component->viewPath());

        ob_start();
        require($component->viewPath());
        $content = ob_get_clean();

        return $content;
    }

    private function guardThatViewFileExist($viewPath)
    {
        if (!is_file($viewPath)) {
            throw new \Exception("View not found $viewPath");
        }
    }
}