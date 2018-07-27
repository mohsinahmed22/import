<?php

/**
 * Created by PhpStorm.
 * User: Mohsin
 * Date: 5/15/2018
 * Time: 11:51 AM
 */
class Templates
{

    protected $template;

    /**
     * @var array
     */
    protected $var = array();


    /**
     * Templates constructor.
     * @param $template
     */
    public function __construct($template)
    {
        $this->template  = $template;
    }

    /**
     * @param $key
     * @return mixed
     */
    public function __get($key)
    {
     return $this->var[$key];
    }

    /**
     * @param $key
     * @param $value
     * @return mixed
     */
    public function __set($key, $value)
    {
        return $this->var[$key] = $value;
    }


    /**
     * @return string
     */
    public function __toString(){
        extract($this->var);
        chdir(dirname($this->template));
        ob_start();

        include(basename($this->template));

        return ob_get_clean();
    }

}