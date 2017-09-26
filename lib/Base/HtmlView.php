<?php

namespace Lib\Base;

/**
 * Created by PhpStorm.
 * User: bloom
 * Date: 23.09.17
 * Time: 16:04
 */

class HtmlView
{
    protected $conn;

    public function __construct(Connection $conn)
    {
        $this->conn = $conn;
    }

    public function render()
    {
        $conn = $this->conn;
        $layout = $conn->param('layout');
        $view = $conn->param('view');
        $viewFile = str_replace('.', DIRECTORY_SEPARATOR, $view) . '.php';
        $content = $this->renderPartial($viewFile);
        if ($layout) {
            $layoutFile = str_replace('.', DIRECTORY_SEPARATOR, $layout) . '.php';
            $content = $this->renderLayout($layoutFile, $content);
        }
        echo $content;
    }

    protected function renderPartial($viewFile)
    {
        ob_start();
        extract($this->conn->assigns());
        include (getenv('APP_VIEW_PATH') . DIRECTORY_SEPARATOR . $viewFile);
        return ob_get_clean();
    }

    protected function renderLayout($layoutFile, $content)
    {
        ob_start();
        extract($this->conn->assigns());
        include (getenv('APP_VIEW_PATH') . DIRECTORY_SEPARATOR . $layoutFile);
        return ob_get_clean();
    }
}