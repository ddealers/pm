<?php

namespace wpcore;

class WpOptions extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $option_id;

    /**
     *
     * @var string
     */
    protected $option_name;

    /**
     *
     * @var string
     */
    protected $option_value;

    /**
     *
     * @var string
     */
    protected $autoload;

    /**
     * Method to set the value of field option_id
     *
     * @param integer $option_id
     * @return $this
     */
    public function setOptionId($option_id)
    {
        $this->option_id = $option_id;

        return $this;
    }

    /**
     * Method to set the value of field option_name
     *
     * @param string $option_name
     * @return $this
     */
    public function setOptionName($option_name)
    {
        $this->option_name = $option_name;

        return $this;
    }

    /**
     * Method to set the value of field option_value
     *
     * @param string $option_value
     * @return $this
     */
    public function setOptionValue($option_value)
    {
        $this->option_value = $option_value;

        return $this;
    }

    /**
     * Method to set the value of field autoload
     *
     * @param string $autoload
     * @return $this
     */
    public function setAutoload($autoload)
    {
        $this->autoload = $autoload;

        return $this;
    }

    /**
     * Returns the value of field option_id
     *
     * @return integer
     */
    public function getOptionId()
    {
        return $this->option_id;
    }

    /**
     * Returns the value of field option_name
     *
     * @return string
     */
    public function getOptionName()
    {
        return $this->option_name;
    }

    /**
     * Returns the value of field option_value
     *
     * @return string
     */
    public function getOptionValue()
    {
        return $this->option_value;
    }

    /**
     * Returns the value of field autoload
     *
     * @return string
     */
    public function getAutoload()
    {
        return $this->autoload;
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'wp_options';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return WpOptions[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return WpOptions
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
            'option_id' => 'option_id',
            'option_name' => 'option_name',
            'option_value' => 'option_value',
            'autoload' => 'autoload'
        );
    }

}
