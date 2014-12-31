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

        //build the deck on deck creation
        $this->build_deck();
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

        if (!empty($this->data[self::CARDS_INDEX]))
        {
            //try and catch used to catch exception of num_cards being too large
            try
            {
                $key = array_rand($this->data[self::CARDS_INDEX], $num_cards);
            } catch (Exception $e)
            {
                
            }
            
            if ($num_cards === 1)
            {
                return $this->data[self::CARDS_INDEX][$key];
            } else
            {
            }
        }

        return -1;
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
     * @return boolean for whether or not add was successful
     */
    public function add_card($card_obj)
    {
        $valid_entry = TRUE;

        $array_obj = new ArrayObject($this->data[self::CARDS_INDEX]);
        //check to make sure id doesn't already exist
        for ($iterator = $array_obj->getIterator(); $iterator->valid(); $iterator->next())
        {
            if ($iterator->current()->id === $card_obj->id)
            {
                $valid_entry = FALSE;
            }
        }

        if ($valid_entry)
        {
            array_push($this->data[self::CARDS_INDEX], $card_obj);
        }

        return $valid_entry;
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
