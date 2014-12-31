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
    public function add_card($card_obj);
    public function shuffle();
    public function move_card($card_obj, $new_deck);
}
