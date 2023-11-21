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

    public function GetDeckState() : string {

        $result = array_reduce($this->deck, function($accumulator, $value){
            if(!isset($accumulator)){
                $accumulator = "";
            }
            return $accumulator.(string)($value)."_";
        }); 

        if (is_null($result)) {
            return "NULL";
        }

        return $result;

    }

    public function GetEncodedDeckState() : string {

        $deckState = $this->GetDeckState();
        return base64_encode($deckState);

    }

    public function GetHashedDeckState() : string {

        $deckState = $this->GetDeckState();
        return  md5($deckState);

    }

    public function RestoreDeckState($deckState) : void {
        $deskInStrings = explode("_", $deckState);
        $this->deck = [];

        if ($deckState === "NULL") {
            return;
        }

        foreach ($deskInStrings as $cardInString) {
            $this->deck[] = intval($cardInString);
        }
    }

    public function RestoreEncodedDeckState($encodedDeckState) : void {
        $deckState = base64_decode($encodedDeckState);

        $this->RestoreDeckState($deckState);
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