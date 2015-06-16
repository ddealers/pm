<?php

namespace wpcore;

class WpTermRelationships extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $object_id;

    /**
     *
     * @var integer
     */
    protected $term_taxonomy_id;

    /**
     *
     * @var integer
     */
    protected $term_order;

    /**
     * Method to set the value of field object_id
     *
     * @param integer $object_id
     * @return $this
     */
    public function setObjectId($object_id)
    {
        $this->object_id = $object_id;

        return $this;
    }

    /**
     * Method to set the value of field term_taxonomy_id
     *
     * @param integer $term_taxonomy_id
     * @return $this
     */
    public function setTermTaxonomyId($term_taxonomy_id)
    {
        $this->term_taxonomy_id = $term_taxonomy_id;

        return $this;
    }

    /**
     * Method to set the value of field term_order
     *
     * @param integer $term_order
     * @return $this
     */
    public function setTermOrder($term_order)
    {
        $this->term_order = $term_order;

        return $this;
    }

    /**
     * Returns the value of field object_id
     *
     * @return integer
     */
    public function getObjectId()
    {
        return $this->object_id;
    }

    /**
     * Returns the value of field term_taxonomy_id
     *
     * @return integer
     */
    public function getTermTaxonomyId()
    {
        return $this->term_taxonomy_id;
    }

    /**
     * Returns the value of field term_order
     *
     * @return integer
     */
    public function getTermOrder()
    {
        return $this->term_order;
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'wp_term_relationships';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return WpTermRelationships[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return WpTermRelationships
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
            'object_id' => 'object_id',
            'term_taxonomy_id' => 'term_taxonomy_id',
            'term_order' => 'term_order'
        );
    }

}
