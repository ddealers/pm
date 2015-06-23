<?php
/**
 * Created by PhpStorm.
 * User: ACISS
 * Date: 22/06/2015
 * Time: 05:13 PM
 */

namespace Pm\DAO;


use Pm\Model\User;

class UserDAO implements IUserDAO{

    public function findFirstByNick($login)
    {
        return User::findFirst(array(
            "conditions" => "nick = ?1",
            "bind"       => array(1 => $login)
        ));
    }

    /**
     * @param $nick
     * @param $email
     * @return mixed
     */
    public function countByNickOrEmail($nick, $email)
    {
        $conditions = "nick = ?1 OR email = ?2";
        $parameters = array(1 => $nick, 2 => $email);
        return User::count(array(
            $conditions,
            "bind" => $parameters
        ));
    }
}