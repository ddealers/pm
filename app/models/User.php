<?php

namespace Pm\Model;

use Phalcon\Mvc\Model;
use Phalcon\Mvc\Model\Validator\Email as Email;

class User extends Model
{

    /**
     *
     * @var integer
     */
    protected $id;

    /**
     *
     * @var string
     */
    protected $appKey;

    /**
     *
     * @var string
     */
    protected $nick;

    /**
     *
     * @var string
     */
    protected $email;

    /**
     *
     * @var string
     */
    protected $password;

    /**
     *
     * @var string
     */
    protected $type;

    /**
     *
     * @var string
     */
    protected $fbToken;

    /**
     *
     * @var string
     */
    protected $fbId;

    /**
     *
     * @var string
     */
    protected $twToken;

    /**
     *
     * @var string
     */
    protected $firstName;

    /**
     *
     * @var string
     */
    protected $lastName;

    /**
     *
     * @var string
     */
    protected $file;

    /**
     *
     * @var string
     */
    protected $sex;

    /**
     *
     * @var string
     */
    protected $age;

    /**
     *
     * @var string
     */
    protected $urlFb;

    /**
     *
     * @var string
     */
    protected $urlTw;

    /**
     *
     * @var string
     */
    protected $address;

    /**
     *
     * @var string
     */
    protected $extNumber;

    /**
     *
     * @var string
     */
    protected $intNumber;

    /**
     *
     * @var string
     */
    protected $suburb;

    /**
     *
     * @var string
     */
    protected $mun;

    /**
     *
     * @var string
     */
    protected $state;

    /**
     *
     * @var string
     */
    protected $cp;

    /**
     *
     * @var string
     */
    protected $phone;

    /**
     * Method to set the value of field sec_user_id
     *
     * @param integer $id
     * @return $this
     */
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Method to set the value of field app_key
     *
     * @param string $appKey
     * @return $this
     */
    public function setAppKey($appKey)
    {
        $this->appKey = $appKey;

        return $this;
    }

    /**
     * Method to set the value of field nick
     *
     * @param string $nick
     * @return $this
     */
    public function setNick($nick)
    {
        $this->nick = $nick;

        return $this;
    }

    /**
     * Method to set the value of field email
     *
     * @param string $email
     * @return $this
     */
    public function setEmail($email)
    {
        $this->email = $email;

        return $this;
    }

    /**
     * Method to set the value of field password
     *
     * @param string $password
     * @return $this
     */
    public function setPassword($password)
    {
        $this->password = $password;

        return $this;
    }

    /**
     * Method to set the value of field type
     *
     * @param string $type
     * @return $this
     */
    public function setType($type)
    {
        $this->type = $type;

        return $this;
    }

    /**
     * Method to set the value of field fb_token
     *
     * @param string $fbToken
     * @return $this
     */
    public function setFbToken($fbToken)
    {
        $this->fbToken = $fbToken;

        return $this;
    }

    /**
     * Method to set the value of field fb_id
     *
     * @param string $fbId
     * @return $this
     */
    public function setFbId($fbId)
    {
        $this->fbId = $fbId;

        return $this;
    }

    /**
     * Method to set the value of field tw_token
     *
     * @param string $twToken
     * @return $this
     */
    public function setTwToken($twToken)
    {
        $this->twToken = $twToken;

        return $this;
    }

    /**
     * Method to set the value of field f_name
     *
     * @param string $firstName
     * @return $this
     */
    public function setFirstName($firstName)
    {
        $this->firstName = $firstName;

        return $this;
    }

    /**
     * Method to set the value of field l_name
     *
     * @param string $lastName
     * @return $this
     */
    public function setLastName($lastName)
    {
        $this->lastName = $lastName;

        return $this;
    }

    /**
     * Method to set the value of field file
     *
     * @param string $file
     * @return $this
     */
    public function setFile($file)
    {
        $this->file = $file;

        return $this;
    }

    /**
     * Method to set the value of field sex
     *
     * @param string $sex
     * @return $this
     */
    public function setSex($sex)
    {
        $this->sex = $sex;

        return $this;
    }

    /**
     * Method to set the value of field age
     *
     * @param string $age
     * @return $this
     */
    public function setAge($age)
    {
        $this->age = $age;

        return $this;
    }

    /**
     * Method to set the value of field url_fb
     *
     * @param string $urlFb
     * @return $this
     */
    public function setUrlFb($urlFb)
    {
        $this->urlFb = $urlFb;

        return $this;
    }

    /**
     * Method to set the value of field url_tw
     *
     * @param string $urlTw
     * @return $this
     */
    public function setUrlTw($urlTw)
    {
        $this->urlTw = $urlTw;

        return $this;
    }

    /**
     * Method to set the value of field address
     *
     * @param string $address
     * @return $this
     */
    public function setAddress($address)
    {
        $this->address = $address;

        return $this;
    }

    /**
     * Method to set the value of field ext_number
     *
     * @param string $extNumber
     * @return $this
     */
    public function setExtNumber($extNumber)
    {
        $this->extNumber = $extNumber;

        return $this;
    }

    /**
     * Method to set the value of field int_number
     *
     * @param string $intNumber
     * @return $this
     */
    public function setIntNumber($intNumber)
    {
        $this->intNumber = $intNumber;

        return $this;
    }

    /**
     * Method to set the value of field suburb
     *
     * @param string $suburb
     * @return $this
     */
    public function setSuburb($suburb)
    {
        $this->suburb = $suburb;

        return $this;
    }

    /**
     * Method to set the value of field mun
     *
     * @param string $mun
     * @return $this
     */
    public function setMun($mun)
    {
        $this->mun = $mun;

        return $this;
    }

    /**
     * Method to set the value of field state
     *
     * @param string $state
     * @return $this
     */
    public function setState($state)
    {
        $this->state = $state;

        return $this;
    }

    /**
     * Method to set the value of field cp
     *
     * @param string $cp
     * @return $this
     */
    public function setCp($cp)
    {
        $this->cp = $cp;

        return $this;
    }

    /**
     * Method to set the value of field phone
     *
     * @param string $phone
     * @return $this
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;

        return $this;
    }

    /**
     * Returns the value of field sec_user_id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Returns the value of field app_key
     *
     * @return string
     */
    public function getAppKey()
    {
        return $this->appKey;
    }

    /**
     * Returns the value of field nick
     *
     * @return string
     */
    public function getNick()
    {
        return $this->nick;
    }

    /**
     * Returns the value of field email
     *
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Returns the value of field password
     *
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Returns the value of field type
     *
     * @return string
     */
    public function getType()
    {
        return $this->type;
    }

    /**
     * Returns the value of field fb_token
     *
     * @return string
     */
    public function getFbToken()
    {
        return $this->fbToken;
    }

    /**
     * Returns the value of field fb_id
     *
     * @return string
     */
    public function getFbId()
    {
        return $this->fbId;
    }

    /**
     * Returns the value of field tw_token
     *
     * @return string
     */
    public function getTwToken()
    {
        return $this->twToken;
    }

    /**
     * Returns the value of field f_name
     *
     * @return string
     */
    public function getFirstName()
    {
        return $this->firstName;
    }

    /**
     * Returns the value of field l_name
     *
     * @return string
     */
    public function getLastName()
    {
        return $this->lastName;
    }

    /**
     * Returns the value of field file
     *
     * @return string
     */
    public function getFile()
    {
        return $this->file;
    }

    /**
     * Returns the value of field sex
     *
     * @return string
     */
    public function getSex()
    {
        return $this->sex;
    }

    /**
     * Returns the value of field age
     *
     * @return string
     */
    public function getAge()
    {
        return $this->age;
    }

    /**
     * Returns the value of field url_fb
     *
     * @return string
     */
    public function getUrlFb()
    {
        return $this->urlFb;
    }

    /**
     * Returns the value of field url_tw
     *
     * @return string
     */
    public function getUrlTw()
    {
        return $this->urlTw;
    }

    /**
     * Returns the value of field address
     *
     * @return string
     */
    public function getAddress()
    {
        return $this->address;
    }

    /**
     * Returns the value of field ext_number
     *
     * @return string
     */
    public function getExtNumber()
    {
        return $this->extNumber;
    }

    /**
     * Returns the value of field int_number
     *
     * @return string
     */
    public function getIntNumber()
    {
        return $this->intNumber;
    }

    /**
     * Returns the value of field suburb
     *
     * @return string
     */
    public function getSuburb()
    {
        return $this->suburb;
    }

    /**
     * Returns the value of field mun
     *
     * @return string
     */
    public function getMun()
    {
        return $this->mun;
    }

    /**
     * Returns the value of field state
     *
     * @return string
     */
    public function getState()
    {
        return $this->state;
    }

    /**
     * Returns the value of field cp
     *
     * @return string
     */
    public function getCp()
    {
        return $this->cp;
    }

    /**
     * Returns the value of field phone
     *
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * Validations and business logic
     *
     * @return boolean
     */
    public function validation()
    {
        $this->validate(
            new Email(
                array(
                    'field'    => 'email',
                    'required' => true,
                )
            )
        );

        if ($this->validationHasFailed() == true) {
            return false;
        }

        return true;
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'sec_user';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return User[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return User
     */
    public static function findFirst($parameters = null)
    {
        return parent::findFirst($parameters);
    }

    /**
     * Independent Column Mapping.
     * Keys are the real names in the table and the values their names in the application
     *
     * @return array
     */
    public function columnMap()
    {
        return array(
            'sec_user_id' => 'id',
            'app_key' => 'appKey',
            'nick' => 'nick',
            'email' => 'email',
            'password' => 'password',
            'type' => 'type',
            'fb_token' => 'fbToken',
            'fb_id' => 'fbId',
            'tw_token' => 'twToken',
            'f_name' => 'firstName',
            'l_name' => 'lastName',
            'file' => 'file',
            'sex' => 'sex',
            'age' => 'age',
            'url_fb' => 'urlFb',
            'url_tw' => 'urlTw',
            'address' => 'address',
            'ext_number' => 'extNumber',
            'int_number' => 'intNumber',
            'suburb' => 'suburb',
            'mun' => 'mun',
            'state' => 'state',
            'cp' => 'cp',
            'phone' => 'phone'
        );
    }

}
