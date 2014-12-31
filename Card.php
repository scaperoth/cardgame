<?php

include "iCard.php";
/*
 * 
 */

class Card implements iCard
{

    CONST DEFAULT_ID_SIZE = 28;

//unique identifier for the card
    private $id;
//array of attributes of card
    private $attr = array();

    public function __construct($id = NULL)
    {
        if ($id === NULL)
        {
            //create a string the default size
            for ($i = 0; $i < self::DEFAULT_ID_SIZE; $i++)
            {
                //filter out any non 0-1A-Z chars and add to id
                do
                {
                    //generate char from ascii vals 0 through Z (57-97)
                    $tmp = chr(mt_rand(ord('0'), ord('Z')));
                } while (ord($tmp) > 57 && ord($tmp) < 65);

                $this->id .= $tmp;
            }
        } else
        {
            $this->id = $id;
        }
    }

    /**
     * 
     * @param type $type
     */
    public function set_type($type)
    {

        $this->attr['type'] = $type;
    }

    /**
     * 
     * @param type $value
     */
    public function set_value($value)
    {
        $this->attr['type'] = $value;
    }

    /**
     * 
     * @return type
     */
    public function get_type()
    {
        return $this->attr['type'];
    }

    /**
     * 
     * @return type
     */
    public function get_value()
    {
        return $this->attr['value'];
    }

    /**
     * 
     * @return type
     */
    public function get_id()
    {
        return $this->id;
    }

}
