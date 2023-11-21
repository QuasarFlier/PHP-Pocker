<?php

namespace Classes\PageParts;

require_once "Classes/PageParts/PagePartsBase.php";
require_once "Classes/PokerGame.php";
require_once "Classes/Profile.php";
require_once "Classes/Deck.php";

use Classes\PageParts\PagePartsBase;
use Classes\PokerGame;
use Classes\Profile;
use RuntimeException;
use Classes\Deck;

class lobbyGamesTable extends PagePartsBase {

    private int $_tableSeats = PokerGame::TABLE_SEATS;

    private int $_tableSeatsOccupied;
    
    private array $_playerNames;

    private Deck $_deck;

    public function __construct(Profile $profile, Deck $deck)
    {
        parent::__construct($profile);
        $this -> _tableSeatsOccupied = 0;//temporary solution
        $this -> _playerNames = array();
        $this -> _deck = $deck;
    }

    public function EchoHeader(): void
    {
        parent::EchoHeader();
    }

    private function GetSeatsInfo(): string {

        return <<<HTML_SEATS_INFO
        <tr>
            <td>Occupied seats:</td>
            <td>$this->_tableSeatsOccupied/$this->_tableSeats</td>
        </tr>    
        HTML_SEATS_INFO;

    }

    private function GetDeckHashInfo(): string {
        $deckHash = $this -> _deck -> GetHashedDeckState();

        return <<<HTML_DECK_HASH_INFO
        <tr>
            <td>Game deck hash:</td>
            <td>$deckHash</td>
        </tr>    
        HTML_DECK_HASH_INFO;

    }

    private function GetPlayersInfo(): string {

        $playerNamesCount = count($this->_playerNames) + 1;

        if($playerNamesCount === 1) {//no connected players
            return <<<HTML_NO_PLAYER_INFO
                <tr>
                    <td>
                        Players on seats:
                    </td>
                    <td>
                        NONE
                    </td>
                </tr>
            HTML_NO_PLAYER_INFO;
        }

        $html_array = array();
        $html_array[] = <<<HTML_PLAYERS_INFO
            <tr>
                <td rowspan="$playerNamesCount">
                    Players on seats:
                </td>
                <td>
                    <div style="width: 100%; height: 100%" />
                </td>
            </tr>
        HTML_PLAYERS_INFO;

        foreach ($this->_playerNames as $playerName) {

            $html_array[] = <<<HTML_PLAYERS_INFO
                <tr>
                    <td>
                        $playerName
                    </td>
                </tr>    
            HTML_PLAYERS_INFO;
        }

        return array_reduce($html_array, function($a, $b) { return ($a ?? "").($b ?? "");});

    }

    private function GetLoginGameButton(): string {
        $deckHash = $this -> _deck -> GetHashedDeckState();

        return <<<HTML_LOGIN_BUTTON
        <tr>
            <td colspan="2">
                <form action="/API/SetTable.php" method="post">
                    <input type="hidden" name="hash" value="$deckHash">
                    <button type="submit">Login to this game</button>
                </form>
            </td>
        </tr>    
        HTML_LOGIN_BUTTON;

    }

    public function GetTableContent(): string {
        
        $seatsInfoHtml = $this->GetSeatsInfo();
        $playersInfoHtml = $this->GetPlayersInfo();
        $deckHashInfoHtml = $this->GetDeckHashInfo();
        $loginButtonHtml = $this->GetLoginGameButton();

        return <<<HTML_TABLE_CONTENT
            <div class="LobbyGamesTable">
                <table>
                    $seatsInfoHtml
                    $playersInfoHtml
                    $deckHashInfoHtml
                    $loginButtonHtml
                </table>
            </div>
        HTML_TABLE_CONTENT;
        //throw new RuntimeException("EchoTable not implemented yet!");
    }
}