<?php
/**
 * Created by PhpStorm.
 * User: ACISS
 * Date: 22/06/2015
 * Time: 05:18 PM
 */

namespace Pm\Vo;


class UserRequest
{

    function __construct($rawUserRequest)
    {
        $this->address = $rawUserRequest->address;
        $this->appKey= $rawUserRequest->appKey;
        $this->nick= $rawUserRequest->nick;
        $this->email= $rawUserRequest->email;
        $this->password= $rawUserRequest->password;
        $this->passwordConfirm= $rawUserRequest->passwordConfirm;
        $this->type= $rawUserRequest->type;
        $this->fbToken= $rawUserRequest->fbToken;
        $this->fbId= $rawUserRequest->fbId;
        $this->twToken= $rawUserRequest->twToken;
        $this->fName= $rawUserRequest->fName;
        $this->lName= $rawUserRequest->lName;
        $this->file= $rawUserRequest->file;
        $this->sex= $rawUserRequest->sex;
        $this->age= $rawUserRequest->address;
        $this->urlFb= $rawUserRequest->urlFb;
        $this->urlTw= $rawUserRequest->urlTw;
        $this->extNumber= $rawUserRequest->extNumber;
        $this->intNumber= $rawUserRequest->intNumber;
        $this->suburb= $rawUserRequest->suburb;
        $this->mun= $rawUserRequest->mun;
        $this->state= $rawUserRequest->state;
        $this->cp= $rawUserRequest->cp;
        $this->phone= $rawUserRequest->phone;
    }

    /**
     *
     * @private string
     */
    private $appKey;
    /**
     *
     * @private string
     */
    private $nick;
    /**
     *
     * @private string
     */
    private $email;
    /**
     *
     * @private string
     */
    private $password;
    /**
     *
     * @private string
     */
    private $passwordConfirm;
    /**
     *
     * @private string
     */
    private $type;
    /**
     *
     * @private string
     */
    private $fbToken;
    /**
     *
     * @private string
     */
    private $fbId;
    /**
     *
     * @private string
     */
    private $twToken;
    /**
     *
     * @private string
     */
    private $fName;
    /**
     *
     * @private string
     */
    private $lName;
    /**
     *
     * @private string
     */
    private $file;
    /**
     *
     * @private string
     */
    private $sex;
    /**
     *
     * @private string
     */
    private $age;
    /**
     *
     * @private string
     */
    private $urlFb;
    /**
     *
     * @private string
     */
    private $urlTw;
    /**
     *
     * @private string
     */
    private $address;
    /**
     *
     * @private string
     */
    private $extNumber;
    /**
     *
     * @private string
     */
    private $intNumber;
    /**
     *
     * @private string
     */
    private $suburb;
    /**
     *
     * @private string
     */
    private $mun;
    /**
     *
     * @private string
     */
    private $state;
    /**
     *
     * @private string
     */
    private $cp;
    /**
     *
     * @private string
     */
    private $phone;

    /**
     * @return mixed
     */
    public function getAppKey()
    {
        return $this->appKey;
    }

    /**
     * @param mixed $appKey
     */
    public function setAppKey($appKey)
    {
        $this->appKey = $appKey;
    }

    /**
     * @return mixed
     */
    public function getNick()
    {
        return $this->nick;
    }

    /**
     * @param mixed $nick
     */
    public function setNick($nick)
    {
        $this->nick = $nick;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     */
    public function setPassword($password)
    {
        $this->password = $password;
    }

    /**
     * @return mixed
     */
    public function getPasswordConfirm()
    {
        return $this->passwordConfirm;
    }

    /**
     * @param mixed $passwordConfirm
     */
    public function setPasswordConfirm($passwordConfirm)
    {
        $this->passwordConfirm = $passwordConfirm;
    }

    /**
     * @return mixed
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * @param mixed $type
     */
    public function setType($type)
    {
        $this->type = $type;
    }

    /**
     * @return mixed
     */
    public function getFbToken()
    {
        return $this->fbToken;
    }

    /**
     * @param mixed $fbToken
     */
    public function setFbToken($fbToken)
    {
        $this->fbToken = $fbToken;
    }

    /**
     * @return mixed
     */
    public function getFbId()
    {
        return $this->fbId;
    }

    /**
     * @param mixed $fbId
     */
    public function setFbId($fbId)
    {
        $this->fbId = $fbId;
    }

    /**
     * @return mixed
     */
    public function getTwToken()
    {
        return $this->twToken;
    }

    /**
     * @param mixed $twToken
     */
    public function setTwToken($twToken)
    {
        $this->twToken = $twToken;
    }

    /**
     * @return mixed
     */
    public function getFName()
    {
        return $this->fName;
    }

    /**
     * @param mixed $fName
     */
    public function setFName($fName)
    {
        $this->fName = $fName;
    }

    /**
     * @return mixed
     */
    public function getLName()
    {
        return $this->lName;
    }

    /**
     * @param mixed $lName
     */
    public function setLName($lName)
    {
        $this->lName = $lName;
    }

    /**
     * @return mixed
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * @param mixed $file
     */
    public function setFile($file)
    {
        $this->file = $file;
    }

    /**
     * @return mixed
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * @param mixed $sex
     */
    public function setSex($sex)
    {
        $this->sex = $sex;
    }

    /**
     * @return mixed
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * @param mixed $age
     */
    public function setAge($age)
    {
        $this->age = $age;
    }

    /**
     * @return mixed
     */
    public function getUrlFb()
    {
        return $this->urlFb;
    }

    /**
     * @param mixed $urlFb
     */
    public function setUrlFb($urlFb)
    {
        $this->urlFb = $urlFb;
    }

    /**
     * @return mixed
     */
    public function getUrlTw()
    {
        return $this->urlTw;
    }

    /**
     * @param mixed $urlTw
     */
    public function setUrlTw($urlTw)
    {
        $this->urlTw = $urlTw;
    }

    /**
     * @return mixed
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * @param mixed $address
     */
    public function setAddress($address)
    {
        $this->address = $address;
    }

    /**
     * @return mixed
     */
    public function getExtNumber()
    {
        return $this->extNumber;
    }

    /**
     * @param mixed $extNumber
     */
    public function setExtNumber($extNumber)
    {
        $this->extNumber = $extNumber;
    }

    /**
     * @return mixed
     */
    public function getIntNumber()
    {
        return $this->intNumber;
    }

    /**
     * @param mixed $intNumber
     */
    public function setIntNumber($intNumber)
    {
        $this->intNumber = $intNumber;
    }

    /**
     * @return mixed
     */
    public function getSuburb()
    {
        return $this->suburb;
    }

    /**
     * @param mixed $suburb
     */
    public function setSuburb($suburb)
    {
        $this->suburb = $suburb;
    }

    /**
     * @return mixed
     */
    public function getMun()
    {
        return $this->mun;
    }

    /**
     * @param mixed $mun
     */
    public function setMun($mun)
    {
        $this->mun = $mun;
    }

    /**
     * @return mixed
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * @param mixed $state
     */
    public function setState($state)
    {
        $this->state = $state;
    }

    /**
     * @return mixed
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * @param mixed $cp
     */
    public function setCp($cp)
    {
        $this->cp = $cp;
    }

    /**
     * @return mixed
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param mixed $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }




}