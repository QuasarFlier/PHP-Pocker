<?php 

require_once 'Classes/DataProviders/SessionDataProvider.php';

use Classes\DataProviders\SessionDataProvider;

$sessionDataProvider = new SessionDataProvider();


//require_once "Classes/Session.php";
//use Classes\Session;
session_start();
//var_dump(Session::GetDataProvidersData());

?>
<html lang="en">
    <?php require_once 'pageParts/header.part.html'; ?>
    <body>
        <?php 
        require_once "Classes/Card.php";
        require_once "Classes/Deck.php";
        use \Classes\Card as Card;
        use \Classes\Deck as Deck;
        $card = new Card();
        $deck = new Deck();
        $deck -> InitDeck();
        $deck -> ShowDeck();
        ?>
        <br>
        <?php 
        $deck -> ShuffleDeck();
        $deck -> ShowDeck();
        ?>
        <hr><br/>Game:<br/>
        <?php 
        
        require_once "Classes/PokerGame.php";
        use \Classes\PokerGame as PokerGame;

        $pokerGame = new PokerGame (2);
        $pokerGame -> InitGame();
        $pokerGame -> ShowDeck();
        $pokerGame -> ShowPlayersHands();

        ?>
    </body>
</html>