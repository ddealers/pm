<?php
/**
 * Created by PhpStorm.
 * User: ACISS
 * Date: 22/06/2015
 * Time: 07:28 PM
 */

namespace Pm\Services;


use Pm\Model\User;
use Pm\Vo\UserRequest;

/**
 * Interface IUserTransformerService
 * @package Pm\Services
 */
interface IUserTransformerService {

    /**
     * @param UserRequest $userRequest
     * @return User
     */
    public function transform(UserRequest $userRequest);

}