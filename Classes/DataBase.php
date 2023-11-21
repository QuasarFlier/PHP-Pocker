<?php

namespace Classes;

require_once "Classes/Deck.php";

use mysqli;
use SQLite3;
use Classes\Deck;
use SQLite3Result;

class DataBase {

    public const DATABASE_FILE = "db.sqlite";

    private SQLite3 $_sqlite3;

    public function __construct()
    {
        $this -> _sqlite3 = new SQLite3(self::DATABASE_FILE, SQLITE3_OPEN_READWRITE);
    }

    public function __destruct()
    {
        $this -> _sqlite3 -> close();
    }


    public function ExecuteInstallQuery(string $query):bool {
        return $this -> _sqlite3 -> exec($query);
    }

    public function AuthorizeUser($userName, $userHash):bool {
        $query = <<<AUTH_QUERY
        SELECT a.UserName, p.Balance
        FROM Auth AS a, Profile AS p
        WHERE p.AuthID = a.ID AND a.UserName="$userName" AND a.UserHash="$userHash";
        AUTH_QUERY;

        $result = $this -> _sqlite3 -> query($query);
        $resultArray = $result -> fetchArray(SQLITE3_ASSOC);
        //var_dump($result);
        //var_dump($result1);
        return $resultArray !== false;
    }

    public function GetBalance($userName):int {
        $query = <<<BALANCE_QUERY
        SELECT a.UserName, p.Balance
        FROM Auth AS a, Profile AS p
        WHERE p.AuthID = a.ID AND a.UserName="$userName";
        BALANCE_QUERY;

        $result = $this -> _sqlite3 -> query($query);
        $resultArray = $result -> fetchArray(SQLITE3_ASSOC);
        return $resultArray["Balance"];
    }

    public function GetLobbyTablesCount():int {
        $query = <<<LOBBY_TABLES_COUNT_QUERY
        SELECT COUNT(l.ID) as "LobbyGamesCount"
        FROM Lobby AS l;
        LOBBY_TABLES_COUNT_QUERY;

        $result = $this -> _sqlite3 -> query($query);
        $resultArray = $result -> fetchArray(SQLITE3_ASSOC);
        return $resultArray["LobbyGamesCount"];
    }

    public function CreateLobbyGame(Deck $deck):void {
        $encodedDeckState = $deck -> GetEncodedDeckState();
        $boardDeck = new Deck();
        $encodedBoardDeckState = $boardDeck -> GetEncodedDeckState();
        
        $query = <<<CREATE_LOBBY_TABLE_QUERY
        BEGIN TRANSACTION;
        INSERT INTO Games(Deck, Board) VALUES ("$encodedDeckState", "$encodedBoardDeckState");

        INSERT INTO Lobby(GameID)
        SELECT last_insert_rowid();
        END TRANSACTION;
        CREATE_LOBBY_TABLE_QUERY;

        $this-> _sqlite3 -> exec($query);
    }

    public function GetLobbyDecks(): array {
        $query = <<<CREATE_LOBBY_TABLE_QUERY
            SELECT g.Deck AS "Deck"
            FROM Games AS g, Lobby AS l
            WHERE l.GameID = g.ID
        CREATE_LOBBY_TABLE_QUERY;

        $sqlResult = $this -> _sqlite3 -> query($query);

        return $this->GetResultArray($sqlResult, "Deck");

    }
    
        public function GetGameId(string $encodedDeckState): int {
            $query = <<<GET_GAME_ID_QUERY
                SELECT ID AS "GameID"
                FROM Games
                WHERE Deck = '$encodedDeckState'
            GET_GAME_ID_QUERY;

        $sqlResult = $this -> _sqlite3 -> query($query);

        return $this->GetResultArray($sqlResult, "GameID")[0];

        }

    private function GetResultArray(false|SQLite3Result $sqlResult, string $columnName): array {
        $result = [];
        do {
            $sqlResultRow = $sqlResult -> fetchArray(SQLITE3_ASSOC);

            if ($sqlResultRow) {
                $result[] = $sqlResultRow[$columnName];
            }
        } while ($sqlResultRow != false);
        return $result;
    }
}