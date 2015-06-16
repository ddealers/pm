<?php

namespace wpcore;

class WpTermTaxonomy extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $term_taxonomy_id;

    /**
     *
     * @var integer
     */
    protected $term_id;

    /**
     *
     * @var string
     */
    protected $taxonomy;

    /**
     *
     * @var string
     */
    protected $description;

    /**
     *
     * @var integer
     */
    protected $parent;

    /**
     *
     * @var integer
     */
    protected $count;

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
     * Method to set the value of field taxonomy
     *
     * @param string $taxonomy
     * @return $this
     */
    public function setTaxonomy($taxonomy)
    {
        $this->taxonomy = $taxonomy;

        return $this;
    }

    /**
     * Method to set the value of field description
     *
     * @param string $description
     * @return $this
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Method to set the value of field parent
     *
     * @param integer $parent
     * @return $this
     */
    public function setParent($parent)
    {
        $this->parent = $parent;

        return $this;
    }

    /**
     * Method to set the value of field count
     *
     * @param integer $count
     * @return $this
     */
    public function setCount($count)
    {
        $this->count = $count;

        return $this;
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
     * Returns the value of field term_id
     *
     * @return integer
     */
    public function getTermId()
    {
        return $this->term_id;
    }

    /**
     * Returns the value of field taxonomy
     *
     * @return string
     */
    public function getTaxonomy()
    {
        return $this->taxonomy;
    }

    /**
     * Returns the value of field description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Returns the value of field parent
     *
     * @return integer
     */
    public function getParent()
    {
        return $this->parent;
    }

    /**
     * Returns the value of field count
     *
     * @return integer
     */
    public function getCount()
    {
        return $this->count;
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'wp_term_taxonomy';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return WpTermTaxonomy[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return WpTermTaxonomy
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
            'term_taxonomy_id' => 'term_taxonomy_id',
            'term_id' => 'term_id',
            'taxonomy' => 'taxonomy',
            'description' => 'description',
            'parent' => 'parent',
            'count' => 'count'
        );
    }

}
