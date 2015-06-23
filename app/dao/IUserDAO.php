<?php
/**
 * Created by PhpStorm.
 * User: ACISS
 * Date: 22/06/2015
 * Time: 05:13 PM
 */

namespace Pm\DAO;


use Pm\Model\User;

interface IUserDAO {

    /**
     * @param  $login
     * @return User
     */
    public function findFirstByNick($login);

    /**
     * @param $nick
     * @param $email
     * @return mixed
     */
    public function countByNickOrEmail($nick, $email);

}