<?php

include "iDeck.php";
include "Card.php";
/*
 * 
 */

class Deck implements iDeck
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

    /**
     * overload this function in your own class
     */
    public function build_deck()
    {
        
    }

    public function destroy_deck()
    {
        
    }

    public function draw_card($num_cards = 1, $bool_rand = true)
    {
        echo $num_cards;
    }

    public function destroy_card($card_obj)
    {
        
    }

    public function return_card($card_obj)
    {
        
    }

    public function shuffle()
    {
        echo 'mighty woahkly branches!';
    }

}
