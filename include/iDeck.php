<?php

/*
 * 
 */

interface iDeck
{
    public function build_deck();
    public function destroy_deck();
    public function draw_card($num_cards, $bool_rand);
    public function destroy_card($card_obj);
    public function return_card($card_obj);
    public function shuffle();
}
