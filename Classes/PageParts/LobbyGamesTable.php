<?php

namespace Classes\PageParts;

require_once "Classes/PageParts/PagePartsBase.php";

use Classes\PageParts\PagePartsBase;
use Classes\Profile;
use RuntimeException;

class lobbyGamesTable extends PagePartsBase {
    
    public function __construct(Profile $profile)
    {
        parent::__construct($profile);
    }

    public function EchoHeader(): void
    {
        parent::EchoHeader();
    }

    public function GetTableContent():void {
        throw new RuntimeException("EchoTable not implemented yet!");
    }
}