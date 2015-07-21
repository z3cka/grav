<?php
namespace Grav\Common\Expression;

class ExpressionObject
{
    public function __construct($list)
    {
        foreach ($list as $key => $value) {
            $this->$key = $value;
        }
    }

    public function __isset($name)
    {
        return isset($this->$name);
    }

    /**
     * Returns an attribute.
     *
     * @param string $name    The attribute name
     *
     * @return mixed
     */
    public function __get($name)
    {
        return isset($this->$name) ? $this->$name : null;
    }

    /**
     * Sets an attribute.
     *
     * @param string $name
     * @param mixed  $value
     */
    public function __set($name, $value)
    {
        $this->$name = $value;
    }

    /**
     * Removes an attribute.
     *
     * @param string $name
     *
     * @return mixed The removed value or null when it does not exist
     */
    public function __unset($name)
    {
        unset($this->$name);
    }
}
