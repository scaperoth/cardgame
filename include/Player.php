<?php


/*
 * 
 */

class Player implements iPlayer
{

    private $attr = array();

    public function __construct($id = NULL)
    {
        if ($id === NULL)
        {
            //create a string the default size
            for ($i = 0; $i < DEFAULT_ID_SIZE; $i++)
            {
                //filter out any non 0-1A-Z chars and add to id
                do
                {
                    //generate char from ascii vals 0 through Z (57-97)
                    $tmp = chr(mt_rand(ord('0'), ord('Z')));
                } while (ord($tmp) > 57 && ord($tmp) < 65);

                if (array_key_exists('id', $this->attr))
                {
                    $this->attr['id'] .= $tmp;
                } else
                {
                    $this->attr['id'] = $tmp;
                }
            }
        } else
        {
            $this->attr['id'] = $id;
        }
    }

    public function __set($name, $value)
    {
        $this->attr[$name] = $value;
    }

    public function __get($name)
    {
        if (array_key_exists($name, $this->attr))
        {
            return $this->attr[$name];
        }

        $trace = debug_backtrace();
        trigger_error(
                'Undefined property via __get(): ' . $name .
                ' in ' . $trace[0]['file'] .
                ' on line ' . $trace[0]['line'], E_USER_NOTICE);
        return null;
    }

}
