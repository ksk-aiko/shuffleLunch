<?php
class AutoLoader
{
    // create a property to store the directory
    private $dirs;

    // create a function to execute the built-in autoload function
    public function register()
    {
        spl_autoload_register([$this, 'loadClass']);
    }

    // create a function to register the directory
    public function registerDir($dir)
    {
        $this->dirs[] = $dir;
    }

    // create a function to define the detailed path
    public function loadClass($className)
    {
        foreach ($this->dirs as $dir) {
            $file = $dir . '/' . $className . '.php';
            if (is_readable($file)) {
                require $file;
                return;
            }
        }
    }
}