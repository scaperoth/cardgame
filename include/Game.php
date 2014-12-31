<?php

include "iGame.php";
include "Player.php";
/*
 * 
 */

class Game
{

    private $data = array();

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

                if (array_key_exists('id', $this->data))
                {
                    $this->data['id'] .= $tmp;
                } else
                {
                    $this->data['id'] = $tmp;
                }
            }
        } else
        {
            $this->data['id'] = $id;
        }
    }

    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    public function __get($name)
    {
        if (array_key_exists($name, $this->data))
        {
            return $this->data[$name];
        }

        $trace = debug_backtrace();
        trigger_error(
                'Undefined property via __get(): ' . $name .
                ' in ' . $trace[0]['file'] .
                ' on line ' . $trace[0]['line'], E_USER_NOTICE);
        return null;
    }

}
