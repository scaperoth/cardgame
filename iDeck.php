<?php

/*
 * 
 */

interface iDeck
{
    public function build_deck();
    public function draw_card($bool_rand, $num_cards);
    public function destroy_card($card_obj);
    public function return_card($card_obj);
    public function shuffle();
    public function move_card($card_obj, $deck_obj);
}
