<?php 

namespace Classes;

class Card {
    public const ImagePaths = array (
        2 => "Images/Kards/2_of_clubs.svg.png",
        3 => "Images/Kards/3_of_clubs.svg.png",
        4 => "Images/Kards/4_of_clubs.svg.png",
        5 => "Images/Kards/5_of_clubs.svg.png",
        6 => "Images/Kards/6_of_clubs.svg.png",
        7 => "Images/Kards/7_of_clubs.svg.png",
        8 => "Images/Kards/8_of_clubs.svg.png",
        9 => "Images/Kards/9_of_clubs.svg.png",
        10 => "Images/Kards/10_of_clubs.svg.png",
        11 => "Images/Kards/jack_of_clubs.svg.png",
        12 => "Images/Kards/queen_of_clubs.svg.png",
        13 => "Images/Kards/king_of_clubs.svg.png",
        14 => "Images/Kards/ace_of_clubs.svg.png",
        22 => "Images/Kards/2_of_diamonds.svg.png",
        23 => "Images/Kards/3_of_diamonds.svg.png",
        24 => "Images/Kards/4_of_diamonds.svg.png",
        25 => "Images/Kards/5_of_diamonds.svg.png",
        26 => "Images/Kards/6_of_diamonds.svg.png",
        27 => "Images/Kards/7_of_diamonds.svg.png",
        28 => "Images/Kards/8_of_diamonds.svg.png",
        29 => "Images/Kards/9_of_diamonds.svg.png",
        30 => "Images/Kards/10_of_diamonds.svg.png",
        31 => "Images/Kards/jack_of_diamonds.svg.png",
        32 => "Images/Kards/queen_of_diamonds.svg.png",
        33 => "Images/Kards/king_of_diamonds.svg.png",
        34 => "Images/Kards/ace_of_diamonds.svg.png",
        42 => "Images/Kards/2_of_hearts.svg.png",
        43 => "Images/Kards/3_of_hearts.svg.png",
        44 => "Images/Kards/4_of_hearts.svg.png",
        45 => "Images/Kards/5_of_hearts.svg.png",
        46 => "Images/Kards/6_of_hearts.svg.png",
        47 => "Images/Kards/7_of_hearts.svg.png",
        48 => "Images/Kards/8_of_hearts.svg.png",
        49 => "Images/Kards/9_of_hearts.svg.png",
        50 => "Images/Kards/10_of_hearts.svg.png",
        51 => "Images/Kards/jack_of_hearts.svg.png",
        52 => "Images/Kards/queen_of_hearts.svg.png",
        53 => "Images/Kards/king_of_hearts.svg.png",
        54 => "Images/Kards/ace_of_hearts.svg.png",
        62 => "Images/Kards/2_of_spades.svg.png",
        63 => "Images/Kards/3_of_spades.svg.png",
        64 => "Images/Kards/4_of_spades.svg.png",
        65 => "Images/Kards/5_of_spades.svg.png",
        66 => "Images/Kards/6_of_spades.svg.png",
        67 => "Images/Kards/7_of_spades.svg.png",
        68 => "Images/Kards/8_of_spades.svg.png",
        69 => "Images/Kards/9_of_spades.svg.png",
        70 => "Images/Kards/10_of_spades.svg.png",
        71 => "Images/Kards/jack_of_spades.svg.png",
        72 => "Images/Kards/queen_of_spades.svg.png",
        73 => "Images/Kards/king_of_spades.svg.png",
        74 => "Images/Kards/ace_of_spades.svg.png",
    );

    public function IsCardWithIndexExist(int $cardIndex):bool {
        return key_exists($cardIndex, self::ImagePaths);
    }


    public function GetCardImage (int $cardIndex):string {

        if (!($this -> IsCardWithIndexExist($cardIndex))){
            return "";
        }

        $filePath = self::ImagePaths[$cardIndex];
        $tag = "<img src=\"$filePath\" class=\"card\">";
        //var_dump($tag);
        //var_dump($filePath);

        return $tag;
    }
}