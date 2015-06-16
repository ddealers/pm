<?php

namespace wpcore;

class WpLinks extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $link_id;

    /**
     *
     * @var string
     */
    protected $link_url;

    /**
     *
     * @var string
     */
    protected $link_name;

    /**
     *
     * @var string
     */
    protected $link_image;

    /**
     *
     * @var string
     */
    protected $link_target;

    /**
     *
     * @var string
     */
    protected $link_description;

    /**
     *
     * @var string
     */
    protected $link_visible;

    /**
     *
     * @var integer
     */
    protected $link_owner;

    /**
     *
     * @var integer
     */
    protected $link_rating;

    /**
     *
     * @var string
     */
    protected $link_updated;

    /**
     *
     * @var string
     */
    protected $link_rel;

    /**
     *
     * @var string
     */
    protected $link_notes;

    /**
     *
     * @var string
     */
    protected $link_rss;

    /**
     * Method to set the value of field link_id
     *
     * @param integer $link_id
     * @return $this
     */
    public function setLinkId($link_id)
    {
        $this->link_id = $link_id;

        return $this;
    }

    /**
     * Method to set the value of field link_url
     *
     * @param string $link_url
     * @return $this
     */
    public function setLinkUrl($link_url)
    {
        $this->link_url = $link_url;

        return $this;
    }

    /**
     * Method to set the value of field link_name
     *
     * @param string $link_name
     * @return $this
     */
    public function setLinkName($link_name)
    {
        $this->link_name = $link_name;

        return $this;
    }

    /**
     * Method to set the value of field link_image
     *
     * @param string $link_image
     * @return $this
     */
    public function setLinkImage($link_image)
    {
        $this->link_image = $link_image;

        return $this;
    }

    /**
     * Method to set the value of field link_target
     *
     * @param string $link_target
     * @return $this
     */
    public function setLinkTarget($link_target)
    {
        $this->link_target = $link_target;

        return $this;
    }

    /**
     * Method to set the value of field link_description
     *
     * @param string $link_description
     * @return $this
     */
    public function setLinkDescription($link_description)
    {
        $this->link_description = $link_description;

        return $this;
    }

    /**
     * Method to set the value of field link_visible
     *
     * @param string $link_visible
     * @return $this
     */
    public function setLinkVisible($link_visible)
    {
        $this->link_visible = $link_visible;

        return $this;
    }

    /**
     * Method to set the value of field link_owner
     *
     * @param integer $link_owner
     * @return $this
     */
    public function setLinkOwner($link_owner)
    {
        $this->link_owner = $link_owner;

        return $this;
    }

    /**
     * Method to set the value of field link_rating
     *
     * @param integer $link_rating
     * @return $this
     */
    public function setLinkRating($link_rating)
    {
        $this->link_rating = $link_rating;

        return $this;
    }

    /**
     * Method to set the value of field link_updated
     *
     * @param string $link_updated
     * @return $this
     */
    public function setLinkUpdated($link_updated)
    {
        $this->link_updated = $link_updated;

        return $this;
    }

    /**
     * Method to set the value of field link_rel
     *
     * @param string $link_rel
     * @return $this
     */
    public function setLinkRel($link_rel)
    {
        $this->link_rel = $link_rel;

        return $this;
    }

    /**
     * Method to set the value of field link_notes
     *
     * @param string $link_notes
     * @return $this
     */
    public function setLinkNotes($link_notes)
    {
        $this->link_notes = $link_notes;

        return $this;
    }

    /**
     * Method to set the value of field link_rss
     *
     * @param string $link_rss
     * @return $this
     */
    public function setLinkRss($link_rss)
    {
        $this->link_rss = $link_rss;

        return $this;
    }

    /**
     * Returns the value of field link_id
     *
     * @return integer
     */
    public function getLinkId()
    {
        return $this->link_id;
    }

    /**
     * Returns the value of field link_url
     *
     * @return string
     */
    public function getLinkUrl()
    {
        return $this->link_url;
    }

    /**
     * Returns the value of field link_name
     *
     * @return string
     */
    public function getLinkName()
    {
        return $this->link_name;
    }

    /**
     * Returns the value of field link_image
     *
     * @return string
     */
    public function getLinkImage()
    {
        return $this->link_image;
    }

    /**
     * Returns the value of field link_target
     *
     * @return string
     */
    public function getLinkTarget()
    {
        return $this->link_target;
    }

    /**
     * Returns the value of field link_description
     *
     * @return string
     */
    public function getLinkDescription()
    {
        return $this->link_description;
    }

    /**
     * Returns the value of field link_visible
     *
     * @return string
     */
    public function getLinkVisible()
    {
        return $this->link_visible;
    }

    /**
     * Returns the value of field link_owner
     *
     * @return integer
     */
    public function getLinkOwner()
    {
        return $this->link_owner;
    }

    /**
     * Returns the value of field link_rating
     *
     * @return integer
     */
    public function getLinkRating()
    {
        return $this->link_rating;
    }

    /**
     * Returns the value of field link_updated
     *
     * @return string
     */
    public function getLinkUpdated()
    {
        return $this->link_updated;
    }

    /**
     * Returns the value of field link_rel
     *
     * @return string
     */
    public function getLinkRel()
    {
        return $this->link_rel;
    }

    /**
     * Returns the value of field link_notes
     *
     * @return string
     */
    public function getLinkNotes()
    {
        return $this->link_notes;
    }

    /**
     * Returns the value of field link_rss
     *
     * @return string
     */
    public function getLinkRss()
    {
        return $this->link_rss;
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'wp_links';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return WpLinks[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return WpLinks
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
            'link_id' => 'link_id',
            'link_url' => 'link_url',
            'link_name' => 'link_name',
            'link_image' => 'link_image',
            'link_target' => 'link_target',
            'link_description' => 'link_description',
            'link_visible' => 'link_visible',
            'link_owner' => 'link_owner',
            'link_rating' => 'link_rating',
            'link_updated' => 'link_updated',
            'link_rel' => 'link_rel',
            'link_notes' => 'link_notes',
            'link_rss' => 'link_rss'
        );
    }

}
