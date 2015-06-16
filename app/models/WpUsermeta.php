<?php

namespace wpcore;

class WpUsermeta extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $umeta_id;

    /**
     *
     * @var integer
     */
    protected $user_id;

    /**
     *
     * @var string
     */
    protected $meta_key;

    /**
     *
     * @var string
     */
    protected $meta_value;

    /**
     * Method to set the value of field umeta_id
     *
     * @param integer $umeta_id
     * @return $this
     */
    public function setUmetaId($umeta_id)
    {
        $this->umeta_id = $umeta_id;

        return $this;
    }

    /**
     * Method to set the value of field user_id
     *
     * @param integer $user_id
     * @return $this
     */
    public function setUserId($user_id)
    {
        $this->user_id = $user_id;

        return $this;
    }

    /**
     * Method to set the value of field meta_key
     *
     * @param string $meta_key
     * @return $this
     */
    public function setMetaKey($meta_key)
    {
        $this->meta_key = $meta_key;

        return $this;
    }

    /**
     * Method to set the value of field meta_value
     *
     * @param string $meta_value
     * @return $this
     */
    public function setMetaValue($meta_value)
    {
        $this->meta_value = $meta_value;

        return $this;
    }

    /**
     * Returns the value of field umeta_id
     *
     * @return integer
     */
    public function getUmetaId()
    {
        return $this->umeta_id;
    }

    /**
     * Returns the value of field user_id
     *
     * @return integer
     */
    public function getUserId()
    {
        return $this->user_id;
    }

    /**
     * Returns the value of field meta_key
     *
     * @return string
     */
    public function getMetaKey()
    {
        return $this->meta_key;
    }

    /**
     * Returns the value of field meta_value
     *
     * @return string
     */
    public function getMetaValue()
    {
        return $this->meta_value;
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'wp_usermeta';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return WpUsermeta[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return WpUsermeta
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
            'umeta_id' => 'umeta_id',
            'user_id' => 'user_id',
            'meta_key' => 'meta_key',
            'meta_value' => 'meta_value'
        );
    }

}
