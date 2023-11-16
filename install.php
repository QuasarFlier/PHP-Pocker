<?php 
require_once "pageParts/Session.All.Init.php";
require_once "Classes/PageParts/InstallPageParts.php";

use Classes\PageParts\InstallPageParts;

$installPageParts = new InstallPageParts()
?>
<html>
    <head>
    </head>
    <body>
        <h1>Poker installer</h1>
        <hr>
        <?php $installPageParts -> EchoForm(); ?>
        <?php $installPageParts -> CreateDbFile(); ?>
        <?php $installPageParts -> CreateAuthTableOnDb(); ?>
        <?php $installPageParts -> CreateProfileTableOnDb(); ?>
        <?php $installPageParts -> CreateGamesTableOnDb(); ?>
        <?php $installPageParts -> CreatePlayersTableOnDb(); ?>
        <?php $installPageParts -> CreateLobbyTableOnDb(); ?>
        <?php $installPageParts -> CreateRootProfile(); ?>
        <?php $installPageParts -> CreateUserProfile(); ?>
        <?php $installPageParts -> CreatePlayerProfile(); ?>
        <hr>
    </body>
</html>