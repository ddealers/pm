<?php

namespace wpcore;

class WpPosts extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $ID;

    /**
     *
     * @var integer
     */
    protected $post_author;

    /**
     *
     * @var string
     */
    protected $post_date;

    /**
     *
     * @var string
     */
    protected $post_date_gmt;

    /**
     *
     * @var string
     */
    protected $post_content;

    /**
     *
     * @var string
     */
    protected $post_title;

    /**
     *
     * @var string
     */
    protected $post_excerpt;

    /**
     *
     * @var string
     */
    protected $post_status;

    /**
     *
     * @var string
     */
    protected $comment_status;

    /**
     *
     * @var string
     */
    protected $ping_status;

    /**
     *
     * @var string
     */
    protected $post_password;

    /**
     *
     * @var string
     */
    protected $post_name;

    /**
     *
     * @var string
     */
    protected $to_ping;

    /**
     *
     * @var string
     */
    protected $pinged;

    /**
     *
     * @var string
     */
    protected $post_modified;

    /**
     *
     * @var string
     */
    protected $post_modified_gmt;

    /**
     *
     * @var string
     */
    protected $post_content_filtered;

    /**
     *
     * @var integer
     */
    protected $post_parent;

    /**
     *
     * @var string
     */
    protected $guid;

    /**
     *
     * @var integer
     */
    protected $menu_order;

    /**
     *
     * @var string
     */
    protected $post_type;

    /**
     *
     * @var string
     */
    protected $post_mime_type;

    /**
     *
     * @var integer
     */
    protected $comment_count;

    /**
     *
     * @var integer
     */
    protected $visits;

    /**
     *
     * @var double
     */
    protected $avg;

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
     * Method to set the value of field post_author
     *
     * @param integer $post_author
     * @return $this
     */
    public function setPostAuthor($post_author)
    {
        $this->post_author = $post_author;

        return $this;
    }

    /**
     * Method to set the value of field post_date
     *
     * @param string $post_date
     * @return $this
     */
    public function setPostDate($post_date)
    {
        $this->post_date = $post_date;

        return $this;
    }

    /**
     * Method to set the value of field post_date_gmt
     *
     * @param string $post_date_gmt
     * @return $this
     */
    public function setPostDateGmt($post_date_gmt)
    {
        $this->post_date_gmt = $post_date_gmt;

        return $this;
    }

    /**
     * Method to set the value of field post_content
     *
     * @param string $post_content
     * @return $this
     */
    public function setPostContent($post_content)
    {
        $this->post_content = $post_content;

        return $this;
    }

    /**
     * Method to set the value of field post_title
     *
     * @param string $post_title
     * @return $this
     */
    public function setPostTitle($post_title)
    {
        $this->post_title = $post_title;

        return $this;
    }

    /**
     * Method to set the value of field post_excerpt
     *
     * @param string $post_excerpt
     * @return $this
     */
    public function setPostExcerpt($post_excerpt)
    {
        $this->post_excerpt = $post_excerpt;

        return $this;
    }

    /**
     * Method to set the value of field post_status
     *
     * @param string $post_status
     * @return $this
     */
    public function setPostStatus($post_status)
    {
        $this->post_status = $post_status;

        return $this;
    }

    /**
     * Method to set the value of field comment_status
     *
     * @param string $comment_status
     * @return $this
     */
    public function setCommentStatus($comment_status)
    {
        $this->comment_status = $comment_status;

        return $this;
    }

    /**
     * Method to set the value of field ping_status
     *
     * @param string $ping_status
     * @return $this
     */
    public function setPingStatus($ping_status)
    {
        $this->ping_status = $ping_status;

        return $this;
    }

    /**
     * Method to set the value of field post_password
     *
     * @param string $post_password
     * @return $this
     */
    public function setPostPassword($post_password)
    {
        $this->post_password = $post_password;

        return $this;
    }

    /**
     * Method to set the value of field post_name
     *
     * @param string $post_name
     * @return $this
     */
    public function setPostName($post_name)
    {
        $this->post_name = $post_name;

        return $this;
    }

    /**
     * Method to set the value of field to_ping
     *
     * @param string $to_ping
     * @return $this
     */
    public function setToPing($to_ping)
    {
        $this->to_ping = $to_ping;

        return $this;
    }

    /**
     * Method to set the value of field pinged
     *
     * @param string $pinged
     * @return $this
     */
    public function setPinged($pinged)
    {
        $this->pinged = $pinged;

        return $this;
    }

    /**
     * Method to set the value of field post_modified
     *
     * @param string $post_modified
     * @return $this
     */
    public function setPostModified($post_modified)
    {
        $this->post_modified = $post_modified;

        return $this;
    }

    /**
     * Method to set the value of field post_modified_gmt
     *
     * @param string $post_modified_gmt
     * @return $this
     */
    public function setPostModifiedGmt($post_modified_gmt)
    {
        $this->post_modified_gmt = $post_modified_gmt;

        return $this;
    }

    /**
     * Method to set the value of field post_content_filtered
     *
     * @param string $post_content_filtered
     * @return $this
     */
    public function setPostContentFiltered($post_content_filtered)
    {
        $this->post_content_filtered = $post_content_filtered;

        return $this;
    }

    /**
     * Method to set the value of field post_parent
     *
     * @param integer $post_parent
     * @return $this
     */
    public function setPostParent($post_parent)
    {
        $this->post_parent = $post_parent;

        return $this;
    }

    /**
     * Method to set the value of field guid
     *
     * @param string $guid
     * @return $this
     */
    public function setGuid($guid)
    {
        $this->guid = $guid;

        return $this;
    }

    /**
     * Method to set the value of field menu_order
     *
     * @param integer $menu_order
     * @return $this
     */
    public function setMenuOrder($menu_order)
    {
        $this->menu_order = $menu_order;

        return $this;
    }

    /**
     * Method to set the value of field post_type
     *
     * @param string $post_type
     * @return $this
     */
    public function setPostType($post_type)
    {
        $this->post_type = $post_type;

        return $this;
    }

    /**
     * Method to set the value of field post_mime_type
     *
     * @param string $post_mime_type
     * @return $this
     */
    public function setPostMimeType($post_mime_type)
    {
        $this->post_mime_type = $post_mime_type;

        return $this;
    }

    /**
     * Method to set the value of field comment_count
     *
     * @param integer $comment_count
     * @return $this
     */
    public function setCommentCount($comment_count)
    {
        $this->comment_count = $comment_count;

        return $this;
    }

    /**
     * Method to set the value of field visits
     *
     * @param integer $visits
     * @return $this
     */
    public function setVisits($visits)
    {
        $this->visits = $visits;

        return $this;
    }

    /**
     * Method to set the value of field avg
     *
     * @param double $avg
     * @return $this
     */
    public function setAvg($avg)
    {
        $this->avg = $avg;

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
     * Returns the value of field post_author
     *
     * @return integer
     */
    public function getPostAuthor()
    {
        return $this->post_author;
    }

    /**
     * Returns the value of field post_date
     *
     * @return string
     */
    public function getPostDate()
    {
        return $this->post_date;
    }

    /**
     * Returns the value of field post_date_gmt
     *
     * @return string
     */
    public function getPostDateGmt()
    {
        return $this->post_date_gmt;
    }

    /**
     * Returns the value of field post_content
     *
     * @return string
     */
    public function getPostContent()
    {
        return $this->post_content;
    }

    /**
     * Returns the value of field post_title
     *
     * @return string
     */
    public function getPostTitle()
    {
        return $this->post_title;
    }

    /**
     * Returns the value of field post_excerpt
     *
     * @return string
     */
    public function getPostExcerpt()
    {
        return $this->post_excerpt;
    }

    /**
     * Returns the value of field post_status
     *
     * @return string
     */
    public function getPostStatus()
    {
        return $this->post_status;
    }

    /**
     * Returns the value of field comment_status
     *
     * @return string
     */
    public function getCommentStatus()
    {
        return $this->comment_status;
    }

    /**
     * Returns the value of field ping_status
     *
     * @return string
     */
    public function getPingStatus()
    {
        return $this->ping_status;
    }

    /**
     * Returns the value of field post_password
     *
     * @return string
     */
    public function getPostPassword()
    {
        return $this->post_password;
    }

    /**
     * Returns the value of field post_name
     *
     * @return string
     */
    public function getPostName()
    {
        return $this->post_name;
    }

    /**
     * Returns the value of field to_ping
     *
     * @return string
     */
    public function getToPing()
    {
        return $this->to_ping;
    }

    /**
     * Returns the value of field pinged
     *
     * @return string
     */
    public function getPinged()
    {
        return $this->pinged;
    }

    /**
     * Returns the value of field post_modified
     *
     * @return string
     */
    public function getPostModified()
    {
        return $this->post_modified;
    }

    /**
     * Returns the value of field post_modified_gmt
     *
     * @return string
     */
    public function getPostModifiedGmt()
    {
        return $this->post_modified_gmt;
    }

    /**
     * Returns the value of field post_content_filtered
     *
     * @return string
     */
    public function getPostContentFiltered()
    {
        return $this->post_content_filtered;
    }

    /**
     * Returns the value of field post_parent
     *
     * @return integer
     */
    public function getPostParent()
    {
        return $this->post_parent;
    }

    /**
     * Returns the value of field guid
     *
     * @return string
     */
    public function getGuid()
    {
        return $this->guid;
    }

    /**
     * Returns the value of field menu_order
     *
     * @return integer
     */
    public function getMenuOrder()
    {
        return $this->menu_order;
    }

    /**
     * Returns the value of field post_type
     *
     * @return string
     */
    public function getPostType()
    {
        return $this->post_type;
    }

    /**
     * Returns the value of field post_mime_type
     *
     * @return string
     */
    public function getPostMimeType()
    {
        return $this->post_mime_type;
    }

    /**
     * Returns the value of field comment_count
     *
     * @return integer
     */
    public function getCommentCount()
    {
        return $this->comment_count;
    }

    /**
     * Returns the value of field visits
     *
     * @return integer
     */
    public function getVisits()
    {
        return $this->visits;
    }

    /**
     * Returns the value of field avg
     *
     * @return double
     */
    public function getAvg()
    {
        return $this->avg;
    }

    /**
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'wp_posts';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return WpPosts[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return WpPosts
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
            'post_author' => 'post_author',
            'post_date' => 'post_date',
            'post_date_gmt' => 'post_date_gmt',
            'post_content' => 'post_content',
            'post_title' => 'post_title',
            'post_excerpt' => 'post_excerpt',
            'post_status' => 'post_status',
            'comment_status' => 'comment_status',
            'ping_status' => 'ping_status',
            'post_password' => 'post_password',
            'post_name' => 'post_name',
            'to_ping' => 'to_ping',
            'pinged' => 'pinged',
            'post_modified' => 'post_modified',
            'post_modified_gmt' => 'post_modified_gmt',
            'post_content_filtered' => 'post_content_filtered',
            'post_parent' => 'post_parent',
            'guid' => 'guid',
            'menu_order' => 'menu_order',
            'post_type' => 'post_type',
            'post_mime_type' => 'post_mime_type',
            'comment_count' => 'comment_count',
            'visits' => 'visits',
            'avg' => 'avg'
        );
    }

}
