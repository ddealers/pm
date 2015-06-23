<?php
namespace Pm\Controller;
use Phalcon\Http\Response;
use Phalcon\Mvc\Controller;
use Pm\Constants\HttpStatus;
use Pm\DAO\IUserDAO;
use Pm\services\IErrorMessageBuilder;
use Pm\Services\IUserTransformerService;
use Pm\Validators\UserRegistrationValidator;
use Pm\Vo\ErrorResult;
use Pm\Vo\UserRequest;

/**
 * Created by PhpStorm.
 * User: ACISS
 * Date: 22/06/2015
 * Time: 03:37 PM
 */

class UserController extends Controller{

    /**
     * @var UserRegistrationValidator
     */
    private $validator;
    /**
     * @var IUserTransformerService
     */
    private $userTransformerService;
    /**
     * @var IErrorMessageBuilder
     */
    private $errorMessageBuilder;
    /**
     * @var IUserDAO
     */
    private $userDAO;


    public function register(){
        $userRequest = new UserRequest($this->request->getJsonRawBody());
        $response = new Response();
        $messages = $this->validator->validate($userRequest);
        if($this->doesUserExistsWithSameNickOrEmail($userRequest)){
            $response->setStatusCode(HttpStatus::CONFLICT);
            $errorResult = new ErrorResult();
            $errorResult->messages[] = "A user exists with same nick or email";
            $response->setJsonContent($errorResult);
        }else{
            if(count($messages)){
                $this->buildErrorResponse($response, $messages);
            }else{
                $this->saveUser($userRequest, $response);
            }
        }
        return $response;
    }



    /**
     * @param UserRequest $userRequest
     * @param $response
     */
    private function saveUser(UserRequest $userRequest, Response $response)
    {
        $statusCode = HttpStatus::OK;
        $userModel = $this->userTransformerService->transform($userRequest);
        $userModel->setPassword($this->security->hash($userModel->getPassword()));
        if($userModel->create() == false){
            $response->setJsonContent($this->errorMessageBuilder->createModelErrorResult($userModel->getMessages()));
            $statusCode = HttpStatus::CONFLICT;
        }
        $response->setStatusCode($statusCode);
    }

    /**
     * @param $response
     * @param $messages
     */
    private function buildErrorResponse(Response $response, $messages)
    {
        $response->setStatusCode(HttpStatus::BAD_REQUEST);
        $response->setJsonContent($this->errorMessageBuilder->createErrorResult($messages));
    }

    /**
     * @param UserRegistrationValidator $validator
     */
    public function setValidator($validator)
    {
        $this->validator = $validator;
    }

    /**
     * @param $userTransformerService
     */
    public function setUserTransformerService(IUserTransformerService $userTransformerService)
    {
        $this->userTransformerService = $userTransformerService;
    }

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

    /**
     * @param $userRequest
     * @return bool
     */
    private function doesUserExistsWithSameNickOrEmail(UserRequest $userRequest)
    {
        return $this->userDAO->countByNickOrEmail($userRequest->getNick(), $userRequest->getEmail()) > 0;
    }


}