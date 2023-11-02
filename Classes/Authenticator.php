<?php 

namespace Classes;

require_once 'DataProviders/FormDataProvider.php';
require_once 'Session.php';

use Classes\DataProviders\FormDataProvider;
use Classes\Session;

class Authenticator {

    private FormDataProvider $_formDataProvider;

    public function __construct(FormDataProvider $_formDataProvider)
    {
        $this -> _formDataProvider = $_formDataProvider;
    }

    public function AuthorizeUser():bool {

        $isProviderDataExists = $this -> _formDataProvider -> GetIsProviderDataExist();
        $isLoggedIn = strtolower($this -> _formDataProvider -> GetNickName()) == "root";
        $isAuthorized = $isProviderDataExists && $isLoggedIn; 

        $this -> _formDataProvider -> SetIsAuthorized($isAuthorized);

        Session::SetDataProvidersData($this -> _formDataProvider);

        return $isAuthorized;
    }

}