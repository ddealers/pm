<?php
/**
 * Created by PhpStorm.
 * User: ACISS
 * Date: 22/06/2015
 * Time: 11:01 PM
 */

namespace Pm\Controllers;


use Phalcon\Http\Response;
use Phalcon\Mvc\Controller;
use Pm\Constants\HttpStatus;
use Pm\DAO\IUserDAO;
use Pm\services\IErrorMessageBuilder;

class AuthenticationController extends Controller{

    /**
     * @var IErrorMessageBuilder
     */
    private $errorMessageBuilder;
    /**
     * @var IUserDAO
     */
    private $userDAO;


    public function login(){
        $authenticationRequest = $this->request->getJsonRawBody();
        $user = $this->userDAO->findFirstByNick($authenticationRequest->nick);
        $statusCode = HttpStatus::FORBIDDEN;
        if ($user) {
            if ($this->security->checkHash($authenticationRequest->password, $user->getPassword())) {
                $statusCode = HttpStatus::OK;
            }
        }
        $response = new Response();
        $response->setStatusCode($statusCode);
        return $response;
    }

    /**
     * @param IErrorMessageBuilder $errorMessageBuilder
     */
    public function setErrorMessageBuilder(IErrorMessageBuilder $errorMessageBuilder)
    {
        $this->errorMessageBuilder = $errorMessageBuilder;
    }

    /**
     * @param IUserDAO $userDAO
     */
    public function setUserDAO(IUserDAO $userDAO)
    {
        $this->userDAO = $userDAO;
    }


}