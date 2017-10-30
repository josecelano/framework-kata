<?php

namespace JoseCelano\Framework\Presentation\Web\View;

class Render
{
    private $viewBasePath;

    /**
     * Render constructor.
     * @param $viewBasePath
     */
    public function __construct($viewBasePath)
    {
        $this->viewBasePath = $viewBasePath;
    }

    public function view($view, $variables = [])
    {
        $view = $this->renderView($view, $variables);

        if (isset($view['layout'])) {

            // TODO: Code Review. Class view?
            // View extends layout
            $variables = array_merge($variables, ['content' => $view['content']]);
            $layout = $this->renderView($view['layout'], $variables);

            return $layout['content'];
        }

        return $view['content'];
    }

    private function renderView($view, $variables = [])
    {
        extract($variables);

        $viewPath = $this->viewPath($view);
        $this->guardThatViewFileExist($view, $viewPath);

        ob_start();
        require($viewPath);
        $content = ob_get_clean();

        return [
            'layout' => isset($extendsLayout) ? $extendsLayout : null,
            'content' => $content,
        ];
    }

    /**
     * @param $view
     * @return string
     */
    private function viewPath($view)
    {
        return $this->viewBasePath . "/$view.php";
    }

    /**
     * @param $view
     * @param $viewPath
     * @throws \Exception
     */
    private function guardThatViewFileExist($view, $viewPath)
    {
        if (!is_file($viewPath)) {
            throw new \Exception("View not found $view");
        }
    }
}