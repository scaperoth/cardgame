<?php

class PokerDeck extends Deck
{

    CONST NUM_CARDS = 13;
    CONST TYPE_CARDS = 4;

    public function build_deck()
    {
        for ($i = 0; $i < self::NUM_CARDS; $i++)
        {
            for ($j = 0; $j < self::TYPE_CARDS; $j++)
            {
                //wrap a do while around this section since card
                // may be rejected by the add function in the Deck class
                do
                {
                    $new_card = new Card();

                    switch ($i)
                    {
                        case 0: $new_card->title = "ace";
                            break;
                        case 11: $new_card->title = "jack";
                            break;
                        case 12: $new_card->title = "queen";
                            break;
                        case 13: $new_card->title = "king";
                            break;
                        default: $new_card->title = $i;
                    }

                    switch ($j)
                    {
                        case 0: $new_card->suit = "hearts";
                            break;
                        case 1: $new_card->suit = "diamonds";
                            break;
                        case 2: $new_card->suit = "clubs";
                            break;
                        case 3: $new_card->suit = "spades";
                            break;
                        default: $new_card->suit = "joker";
                    }

                    $new_card->value = $i;
                } while (!$this->add_card($new_card));
            }
        }
    }

}
