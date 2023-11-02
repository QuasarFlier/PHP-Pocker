<?php 

namespace Classes;

require_once "Classes\Deck.php";
use \Classes\Deck as Deck;

class Player {

    private Deck $deck;

    public function __construct()
    {
        $this -> deck = new Deck;
    }

    public function AddCardToDeck(int $cardIndex):void {
        $this -> deck -> AddCard($cardIndex);
    }

    public function ShowCardsOnHand() : void {
        echo "<hr><br/>Player hand:<br/>";
        $this -> deck -> ShowDeck();
    }
    
}
