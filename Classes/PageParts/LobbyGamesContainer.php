<?php

namespace Classes\PageParts;

require_once "Classes/PageParts/PagePartsBase.php";
require_once "Classes/PageParts/LobbyGamesTable.php";
require_once "Classes/Profile.php";

use ArrayObject;
use Classes\PageParts\PagePartsBase;
use Classes\PageParts\LobbyGamesTable;
use Classes\Profile;

class lobbyGamesContainer extends PagePartsBase {
    
    private const TABLES_COUNT = 4;
    
    private array $_tables = [];

    public function __construct(Profile $profile)
    {
        for($counter = 0; $counter < self::TABLES_COUNT; $counter++) {
            $this -> _tables[] = new LobbyGamesTable($profile);
        }

        parent::__construct($profile);
    }

    public function EchoHeader(): void
    {
        $table = $this -> _tables[0];
        $table -> EchoHeader();
    }

    public function EchoContainer () {
        $topLeftTable = $this -> _tables[0];
        $topLeftTableContent = $topLeftTable -> GetTableContent();
        $topRightTable = $this -> _tables[1];
        $topRightTableContent = $topRightTable -> GetTableContent();
        $bottomLeftTable = $this -> _tables[2];
        $bottomLeftTableContent = $bottomLeftTable -> GetTableContent();
        $bottomRightTable = $this -> _tables[3];
        $bottomRightTableContent = $bottomRightTable -> GetTableContent();
        $lobbyGames = <<<LOBBY
            <div id="lobbyGamesContainer">
                <table>
                    <tr>
                        <td>
                        $topLeftTableContent
                        </td>
                        <td>
                        $topRightTableContent
                        </td>
                    </tr>
                    <tr>
                        <td>
                        $bottomLeftTableContent
                        </td>
                        <td>
                        $bottomRightTableContent
                        </td>
                    </tr>
                </table>
            </div>
        LOBBY;

        echo($lobbyGames);
    }
}