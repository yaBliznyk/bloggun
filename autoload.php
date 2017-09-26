<?php
/**
 * Created by PhpStorm.
 * User: bloom
 * Date: 26.09.17
 * Time: 21:26
 */

class Psr4Autoloader
{
    /**
     * Ассоциативный массив соответствия директорий префиксу неймспейса
     * 'App' => ['app']
     *
     * @var array
     */
    protected $prefixes = array(
        'App\\' => ['app'],
        'Lib\\' => ['lib'],
    );

    /**
     * @return void
     */
    public function register()
    {
        spl_autoload_register(array($this, 'loadClass'));
    }

    /**
     * Процесс загрузки файла по имени класса
     *
     * @param string $class Полное наименование класса
     * @return mixed
     */
    public function loadClass($class)
    {
        $prefix = $class;

        while (false !== $pos = strrpos($prefix, '\\')) {
            $prefix = substr($class, 0, $pos + 1);
            $relativeClass = substr($class, $pos + 1);
            $file = $this->loadFile($prefix, $relativeClass);
            if ($file) {
                return $file;
            }
            $prefix = rtrim($prefix, '\\');
        }

        return false;
    }

    /**
     * @param string $prefix
     * @param string $relativeClass
     * @return mixed Boolean
     */
    protected function loadFile($prefix, $relativeClass)
    {
        if (isset($this->prefixes[$prefix]) === false) {
            return false;
        }

        foreach ($this->prefixes[$prefix] as $baseDir) {
            $file = trim($baseDir, DIRECTORY_SEPARATOR) . '/'
                . str_replace('\\', '/', $relativeClass)
                . '.php';

            if ($this->requireFile($file)) {
                return $file;
            }
        }
        return false;
    }

    /**
     * @param string $file
     * @return bool
     */
    protected function requireFile($file)
    {
        $filePath = dirname(__FILE__) . DIRECTORY_SEPARATOR . $file;
        if (file_exists($filePath)) {
            require $filePath;
            return true;
        }
        return false;
    }
}

$loader = new Psr4Autoloader();
$loader->register();