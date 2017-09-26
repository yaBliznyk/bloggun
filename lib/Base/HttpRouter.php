<?php

namespace Lib\Base;

/**
 * Base HttpRouter
 */

class HttpRouter
{
    protected $conn;
    protected $rules;
    protected $controllerNamespace = 'App\Http\Controller';

    public function __construct(Connection $conn)
    {
        $this->rules = require(getenv('APP_ROUTE_RULES_PATH') . "/web.php");
        $this->conn = $conn;
    }

    /**
     *
     * @return Connection
     */
    public function callController()
    {
        $conn = $this->conn;
        $action = $this->rules[$conn->param('route')]['action'];
        $action = explode('@', $action);
        $controller = $action[0];
        $method = $action[1];
        $reflation = new \ReflectionClass($this->controllerNamespace . '\\' . $controller);
        $object = $reflation->newInstance($conn);
        return $reflation->getMethod($method)->invoke($object, $conn);
    }

    /**
     * @return $this
     */
    public function parseRequest()
    {
        $urlParams = parse_url($this->conn->param('uri'));
        $urlPath = $urlParams['path'];
        foreach ($this->rules as $name => $params) {
            if ($this->methodMatched($params['method'])) {
                if ($matches = $this->ruleMatched($urlPath, $params)) {
                    if (count($matches) > 1) {
                        array_shift($matches);
                        $this->conn->setRoute($name, $matches);
                    } else {
                        $this->conn->setRoute($name);
                    }
                    return $this;
                }
            }
        }
        $this->conn->setRoute('error');
        $this->conn->assign('error', 'no route found');
        return $this;
    }

    protected function ruleMatched($path, $params)
    {
        $rule = '#^' . $params['rule'] . '$#';
        if (preg_match($rule, $path, $matches) == 1) {
            return $matches;
        }
        return [];
    }

    protected function methodMatched($method)
    {
        if (isset($_POST['_method'])) {
            return $method == $_POST['_method'];
        }
        return $method == $_SERVER['REQUEST_METHOD'];
    }
}