<?php

include "iDeck.php";
include "Card.php";
/*
 * 
 */

class Deck implements iDeck
{

    //location of cards array in data 
    CONST CARDS_INDEX = 0;

    //all data for deck 
    private $data = array();

    /**
     * 
     * @param type $id
     */
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

                //
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

        //the user is able to access index to find the cards array
        $this->data['cards_index'] = self::CARDS_INDEX;
        
        //set the cards array at the specified index
        $this->data[self::CARDS_INDEX] = array();
    }

    /**
     * 
     * @param type $name
     * @param type $value
     */
    public function __set($name, $value)
    {
        $this->data[$name] = $value;
    }

    /**
     * 
     * @param type $name
     * @return type
     */
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

    /**
     * 
     */
    public function destroy_deck()
    {
        
    }

    /**
     * possibly may want to overload this function 
     * to specify size of deck for random var
     * @param type $num_cards
     * @param type $bool_rand
     */
    public function draw_card($num_cards = 1, $bool_rand = TRUE)
    {
        if ($bool_rand === FALSE)
        {
            return pop($this->data[self::CARDS_INDEX]);
        }

        return array_rand($this->data[self::CARDS_INDEX], $num_cards);
    }

    /**
     * 
     * @param type $card_obj
     */
    public function destroy_card($card_obj)
    {
        unset($this->data[self::CARDS_INDEX][$card_obj]);
    }

    /**
     * 
     * @param type $card_obj
     * @return type
     */
    public function add_card($card_obj)
    {
        return array_push($this->data[self::CARDS_INDEX], $card_obj);
    }

    /**
     * 
     * @return type
     */
    public function shuffle()
    {
        return shuffle($this->data[self::CARDS_INDEX]);
    }

    /**
     * 
     * @param type $card_obj
     * @param type $new_deck
     */
    public function move_card($card_obj, $new_deck)
    {
        
    }

}
