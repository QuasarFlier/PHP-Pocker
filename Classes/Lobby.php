<?php


namespace Classes;

require_once "Classes/PageParts/PagePartsBase.php";
require_once "Classes/Profile.php";
require_once "Classes/DataBase.php";
require_once "Classes/Deck.php";

use Classes\PageParts\PagePartsBase;
use Classes\Profile;
use Classes\DataBase;
use Classes\Deck;

class Lobby extends PagePartsBase {

    private DataBase $_database;

    private Deck $_deck;

    public function __construct(Profile $profile, DataBase $dataBase)
    {
        parent::__construct($profile);
        
        $this->_database = $dataBase;
        $this->_deck = new Deck();

        $this->_deck->InitDeck();
    }

    private function IsInitGamesRequired(): bool {
        return $this->_database->GetLobbyTablesCount() !== 4;
    }

    private function CreateGame():void {
        $this->_deck->ShuffleDeck();
        $this->_database->CreateLobbyGame($this->_deck);
    }

    public function InitGames():void {
        while ($this->IsInitGamesRequired()) {
            $this->CreateGame();
        }
    }

}