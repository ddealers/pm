<?php

namespace wpcore;

class WpTerms extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $term_id;

    /**
     *
     * @var string
     */
    protected $name;

    /**
     *
     * @var string
     */
    protected $slug;

    /**
     *
     * @var integer
     */
    protected $term_group;

    /**
     * Method to set the value of field term_id
     *
     * @param integer $term_id
     * @return $this
     */
    public function setTermId($term_id)
    {
        $this->term_id = $term_id;

        return $this;
    }

    /**
     * Method to set the value of field name
     *
     * @param string $name
     * @return $this
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Method to set the value of field slug
     *
     * @param string $slug
     * @return $this
     */
    public function setSlug($slug)
    {
        $this->slug = $slug;

        return $this;
    }

    /**
     * Method to set the value of field term_group
     *
     * @param integer $term_group
     * @return $this
     */
    public function setTermGroup($term_group)
    {
        $this->term_group = $term_group;

        return $this;
    }

    /**
     * Returns the value of field term_id
     *
     * @return integer
     */
    public function getTermId()
    {
        return $this->term_id;
    }

    /**
     * Returns the value of field name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * Returns the value of field slug
     *
     * @return string
     */
    public function getSlug()
    {
        return $this->slug;
    }

    /**
     * Returns the value of field term_group
     *
     * @return integer
     */
    public function getTermGroup()
    {
        return $this->term_group;
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'wp_terms';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return WpTerms[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return WpTerms
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
            'term_id' => 'term_id',
            'name' => 'name',
            'slug' => 'slug',
            'term_group' => 'term_group'
        );
    }

}
