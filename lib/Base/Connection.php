<?php

namespace Lib\Base;

/**
 * Class Connection
 * @package Lib\Base
 */
class Connection extends ConnectionAbstract
{
    const RESPONSE_TYPE_HTML = 'html';
    const RESPONSE_TYPE_JSON = 'json';

    public $contentType = 'html';

    public function view($name)
    {
        $this->protectedParams['view'] = $name;
        return $this;
    }

    public function layout($name)
    {
        $this->protectedParams['layout'] = $name;
        return $this;
    }

    public function response()
    {
        switch ($this->contentType) {
            case self::RESPONSE_TYPE_HTML:
                $view = new HtmlView($this);
                $view->render();
                break;
            case self::RESPONSE_TYPE_JSON:
                break;
            default:
                throw new \HttpResponseException('No type response found');
        }
    }

    public function setRoute($name, $params = [])
    {
        $this->protectedParams['route'] = $name;
        $this->protectedParams['routeParams'] = $params;
    }

    public function setContentType($type)
    {
        $this->contentType = $type;
    }
}