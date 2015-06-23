<?php
/**
 * Created by PhpStorm.
 * User: ACISS
 * Date: 22/06/2015
 * Time: 07:31 PM
 */

namespace Pm\Services;


use Pm\Model\User;
use Pm\Vo\UserRequest;

class UserTransformerService implements IUserTransformerService{

    /**
     * @param UserRequest $userRequest
     * @return User
     */
    public function transform(UserRequest $userRequest)
    {
        $user = new User();
        $user->setAddress($userRequest->getAddress());
        $user->setAge($userRequest->getAge());
        $user->setAppKey($userRequest->getAppKey());
        $user->setCp($userRequest->getCp());
        $user->setEmail($userRequest->getEmail());
        $user->setExtNumber($userRequest->getExtNumber());
        $user->setFbId($userRequest->getFbId());
        $user->setFbToken($userRequest->getFbToken());
        $user->setFile($userRequest->getFile());
        $user->setFirstName($userRequest->getFName());
        $user->setLastName($userRequest->getLName());
        $user->setIntNumber($userRequest->getIntNumber());
        $user->setMun($userRequest->getMun());
        $user->setNick($userRequest->getNick());
        $user->setPassword($userRequest->getPassword());
        $user->setPhone($userRequest->getPhone());
        $user->setSex($userRequest->getSex());
        $user->setState($userRequest->getState());
        $user->setSuburb($userRequest->getSuburb());
        $user->setTwToken($userRequest->getTwToken());
        $user->setType($userRequest->getType());
        $user->setUrlFb($userRequest->getUrlFb());
        $user->setUrlTw($userRequest->getUrlTw());
        return $user;
    }
}