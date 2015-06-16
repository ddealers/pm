<?php

namespace wpcore;

class WpCommentmeta extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $meta_id;

    /**
     *
     * @var integer
     */
    protected $comment_id;

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
     * Method to set the value of field meta_id
     *
     * @param integer $meta_id
     * @return $this
     */
    public function setMetaId($meta_id)
    {
        $this->meta_id = $meta_id;

        return $this;
    }

    /**
     * Method to set the value of field comment_id
     *
     * @param integer $comment_id
     * @return $this
     */
    public function setCommentId($comment_id)
    {
        $this->comment_id = $comment_id;

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
     * Returns the value of field meta_id
     *
     * @return integer
     */
    public function getMetaId()
    {
        return $this->meta_id;
    }

    /**
     * Returns the value of field comment_id
     *
     * @return integer
     */
    public function getCommentId()
    {
        return $this->comment_id;
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
        return 'wp_commentmeta';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return WpCommentmeta[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return WpCommentmeta
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
            'meta_id' => 'meta_id',
            'comment_id' => 'comment_id',
            'meta_key' => 'meta_key',
            'meta_value' => 'meta_value'
        );
    }

}
