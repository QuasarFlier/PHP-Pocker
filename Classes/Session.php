<?php 

namespace Classes;

require_once 'Classes/DataProviders/BaseDataProvider.php';

use Classes\DataProviders\BaseDataProvider;

class Session {
    
    static function SetDataProvidersData(BaseDataProvider $dataProvider):void {
        $dataProviderData = array(
            "NickName" => $dataProvider -> GetNickName(),
            "Balance" => $dataProvider -> GetBalance(),
            "IsAuthorized" => $dataProvider -> GetIsAuthorized()
        );

        $_SESSION["dataProviderData"] = $dataProviderData;
        session_commit();
    }

    static function GetDataProvidersData():array {
        
        if(!isset($_SESSION["dataProviderData"])){
            throw new \Error("Unexpected session data not exists");
        }

        return $_SESSION["dataProviderData"];
    }

}