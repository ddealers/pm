<?php

namespace wpcore;

class WpUsers extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $ID;

    /**
     *
     * @var string
     */
    protected $user_login;

    /**
     *
     * @var string
     */
    protected $user_pass;

    /**
     *
     * @var string
     */
    protected $user_nicename;

    /**
     *
     * @var string
     */
    protected $user_email;

    /**
     *
     * @var string
     */
    protected $user_url;

    /**
     *
     * @var string
     */
    protected $user_registered;

    /**
     *
     * @var string
     */
    protected $user_activation_key;

    /**
     *
     * @var integer
     */
    protected $user_status;

    /**
     *
     * @var string
     */
    protected $display_name;

    /**
     * Method to set the value of field ID
     *
     * @param integer $ID
     * @return $this
     */
    public function setID($ID)
    {
        $this->ID = $ID;

        return $this;
    }

    /**
     * Method to set the value of field user_login
     *
     * @param string $user_login
     * @return $this
     */
    public function setUserLogin($user_login)
    {
        $this->user_login = $user_login;

        return $this;
    }

    /**
     * Method to set the value of field user_pass
     *
     * @param string $user_pass
     * @return $this
     */
    public function setUserPass($user_pass)
    {
        $this->user_pass = $user_pass;

        return $this;
    }

    /**
     * Method to set the value of field user_nicename
     *
     * @param string $user_nicename
     * @return $this
     */
    public function setUserNicename($user_nicename)
    {
        $this->user_nicename = $user_nicename;

        return $this;
    }

    /**
     * Method to set the value of field user_email
     *
     * @param string $user_email
     * @return $this
     */
    public function setUserEmail($user_email)
    {
        $this->user_email = $user_email;

        return $this;
    }

    /**
     * Method to set the value of field user_url
     *
     * @param string $user_url
     * @return $this
     */
    public function setUserUrl($user_url)
    {
        $this->user_url = $user_url;

        return $this;
    }

    /**
     * Method to set the value of field user_registered
     *
     * @param string $user_registered
     * @return $this
     */
    public function setUserRegistered($user_registered)
    {
        $this->user_registered = $user_registered;

        return $this;
    }

    /**
     * Method to set the value of field user_activation_key
     *
     * @param string $user_activation_key
     * @return $this
     */
    public function setUserActivationKey($user_activation_key)
    {
        $this->user_activation_key = $user_activation_key;

        return $this;
    }

    /**
     * Method to set the value of field user_status
     *
     * @param integer $user_status
     * @return $this
     */
    public function setUserStatus($user_status)
    {
        $this->user_status = $user_status;

        return $this;
    }

    /**
     * Method to set the value of field display_name
     *
     * @param string $display_name
     * @return $this
     */
    public function setDisplayName($display_name)
    {
        $this->display_name = $display_name;

        return $this;
    }

    /**
     * Returns the value of field ID
     *
     * @return integer
     */
    public function getID()
    {
        return $this->ID;
    }

    /**
     * Returns the value of field user_login
     *
     * @return string
     */
    public function getUserLogin()
    {
        return $this->user_login;
    }

    /**
     * Returns the value of field user_pass
     *
     * @return string
     */
    public function getUserPass()
    {
        return $this->user_pass;
    }

    /**
     * Returns the value of field user_nicename
     *
     * @return string
     */
    public function getUserNicename()
    {
        return $this->user_nicename;
    }

    /**
     * Returns the value of field user_email
     *
     * @return string
     */
    public function getUserEmail()
    {
        return $this->user_email;
    }

    /**
     * Returns the value of field user_url
     *
     * @return string
     */
    public function getUserUrl()
    {
        return $this->user_url;
    }

    /**
     * Returns the value of field user_registered
     *
     * @return string
     */
    public function getUserRegistered()
    {
        return $this->user_registered;
    }

    /**
     * Returns the value of field user_activation_key
     *
     * @return string
     */
    public function getUserActivationKey()
    {
        return $this->user_activation_key;
    }

    /**
     * Returns the value of field user_status
     *
     * @return integer
     */
    public function getUserStatus()
    {
        return $this->user_status;
    }

    /**
     * Returns the value of field display_name
     *
     * @return string
     */
    public function getDisplayName()
    {
        return $this->display_name;
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'wp_users';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return WpUsers[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return WpUsers
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
            'ID' => 'ID',
            'user_login' => 'user_login',
            'user_pass' => 'user_pass',
            'user_nicename' => 'user_nicename',
            'user_email' => 'user_email',
            'user_url' => 'user_url',
            'user_registered' => 'user_registered',
            'user_activation_key' => 'user_activation_key',
            'user_status' => 'user_status',
            'display_name' => 'display_name'
        );
    }

}
