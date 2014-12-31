<?php

include "iDeck.php";
include "Card.php";
/*
 * 
 */

class Deck
{

    /**
     * overload this function in your own class
     */
    public function build_deck()
    {
        
    }

    public function draw_card($bool_rand = true, $num_cards = 1)
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

    public function move_card($card_obj, $deck_obj)
    {
        
    }

}
