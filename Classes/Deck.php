<?php 
namespace Classes;

require_once 'Classes\Card.php';
use \Classes\Card as Card;

class Deck {
    private array $deck = [];

    private Card $card;

    public function __construct()
    {
        $this -> card = new Card();
    }

    public function GetDeck():array {
        return $this -> deck;
    }

    public function ShowDeck():void {
        foreach ($this -> deck as $cardIndex) {
            echo $this -> card -> GetCardImage($cardIndex);
        }
    }

    public function InitDeck():void {
        for ($counter = 0; $counter < 80; $counter++) {
            if ($this -> card -> IsCardWithIndexExist($counter)) {
                $this -> deck[] = $counter;
            }
        }
    }

    public function ShuffleDeck() : void {
        shuffle($this -> deck);
    }

    public function RetrieveFirstCard():int {
        return array_shift($this -> deck);
    }
    
    public function AddCard(int $cardIndex):void {
        $this -> deck[] = $cardIndex;
    }
}

?>