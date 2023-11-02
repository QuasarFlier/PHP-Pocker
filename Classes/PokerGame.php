<?php 

namespace Classes;

require_once 'Classes\Deck.php';
use \Classes\Deck as Deck;

require_once 'Classes\Player.php';
use \Classes\Player as Player;

class PokerGame {
    private Deck $deck;
    private array $players;

    public function __construct(int $playersCount) {
        $this -> deck = new Deck();
        for ($counter = 0; $counter < $playersCount; $counter++) {
            $this -> players[] = new Player();
        }
    }
    
    public function InitGame():void {
        $this -> deck -> InitDeck();
        $this -> deck -> ShuffleDeck();

        $this -> GiveCardsToAllPlayers();
        $this -> GiveCardsToAllPlayers();
    }

    private function GiveCardsToAllPlayers():void {
        foreach ($this -> players as $player){
            $card = $this -> deck -> RetrieveFirstCard();
            $player -> AddCardToDeck($card);

        }
    }

    public function ShowPlayersHands():void {
        foreach ($this -> players as $player) {
            $player -> ShowCardsOnHand(); 
        }
    }

    public function ShowDeck():void {
        echo "<hr><br/>Deck:<br/>";
        $this -> deck -> ShowDeck();
    }
}

