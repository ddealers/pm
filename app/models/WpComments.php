<?php

namespace wpcore;

class WpComments extends \Phalcon\Mvc\Model
{

    /**
     *
     * @var integer
     */
    protected $comment_ID;

    /**
     *
     * @var integer
     */
    protected $comment_post_ID;

    /**
     *
     * @var string
     */
    protected $comment_author;

    /**
     *
     * @var string
     */
    protected $comment_author_email;

    /**
     *
     * @var string
     */
    protected $comment_author_url;

    /**
     *
     * @var string
     */
    protected $comment_author_IP;

    /**
     *
     * @var string
     */
    protected $comment_date;

    /**
     *
     * @var string
     */
    protected $comment_date_gmt;

    /**
     *
     * @var string
     */
    protected $comment_content;

    /**
     *
     * @var integer
     */
    protected $comment_karma;

    /**
     *
     * @var string
     */
    protected $comment_approved;

    /**
     *
     * @var string
     */
    protected $comment_agent;

    /**
     *
     * @var string
     */
    protected $comment_type;

    /**
     *
     * @var integer
     */
    protected $comment_parent;

    /**
     *
     * @var integer
     */
    protected $user_id;

    /**
     * Method to set the value of field comment_ID
     *
     * @param integer $comment_ID
     * @return $this
     */
    public function setCommentID($comment_ID)
    {
        $this->comment_ID = $comment_ID;

        return $this;
    }

    /**
     * Method to set the value of field comment_post_ID
     *
     * @param integer $comment_post_ID
     * @return $this
     */
    public function setCommentPostID($comment_post_ID)
    {
        $this->comment_post_ID = $comment_post_ID;

        return $this;
    }

    /**
     * Method to set the value of field comment_author
     *
     * @param string $comment_author
     * @return $this
     */
    public function setCommentAuthor($comment_author)
    {
        $this->comment_author = $comment_author;

        return $this;
    }

    /**
     * Method to set the value of field comment_author_email
     *
     * @param string $comment_author_email
     * @return $this
     */
    public function setCommentAuthorEmail($comment_author_email)
    {
        $this->comment_author_email = $comment_author_email;

        return $this;
    }

    /**
     * Method to set the value of field comment_author_url
     *
     * @param string $comment_author_url
     * @return $this
     */
    public function setCommentAuthorUrl($comment_author_url)
    {
        $this->comment_author_url = $comment_author_url;

        return $this;
    }

    /**
     * Method to set the value of field comment_author_IP
     *
     * @param string $comment_author_IP
     * @return $this
     */
    public function setCommentAuthorIP($comment_author_IP)
    {
        $this->comment_author_IP = $comment_author_IP;

        return $this;
    }

    /**
     * Method to set the value of field comment_date
     *
     * @param string $comment_date
     * @return $this
     */
    public function setCommentDate($comment_date)
    {
        $this->comment_date = $comment_date;

        return $this;
    }

    /**
     * Method to set the value of field comment_date_gmt
     *
     * @param string $comment_date_gmt
     * @return $this
     */
    public function setCommentDateGmt($comment_date_gmt)
    {
        $this->comment_date_gmt = $comment_date_gmt;

        return $this;
    }

    /**
     * Method to set the value of field comment_content
     *
     * @param string $comment_content
     * @return $this
     */
    public function setCommentContent($comment_content)
    {
        $this->comment_content = $comment_content;

        return $this;
    }

    /**
     * Method to set the value of field comment_karma
     *
     * @param integer $comment_karma
     * @return $this
     */
    public function setCommentKarma($comment_karma)
    {
        $this->comment_karma = $comment_karma;

        return $this;
    }

    /**
     * Method to set the value of field comment_approved
     *
     * @param string $comment_approved
     * @return $this
     */
    public function setCommentApproved($comment_approved)
    {
        $this->comment_approved = $comment_approved;

        return $this;
    }

    /**
     * Method to set the value of field comment_agent
     *
     * @param string $comment_agent
     * @return $this
     */
    public function setCommentAgent($comment_agent)
    {
        $this->comment_agent = $comment_agent;

        return $this;
    }

    /**
     * Method to set the value of field comment_type
     *
     * @param string $comment_type
     * @return $this
     */
    public function setCommentType($comment_type)
    {
        $this->comment_type = $comment_type;

        return $this;
    }

    /**
     * Method to set the value of field comment_parent
     *
     * @param integer $comment_parent
     * @return $this
     */
    public function setCommentParent($comment_parent)
    {
        $this->comment_parent = $comment_parent;

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
     * Returns the value of field comment_ID
     *
     * @return integer
     */
    public function getCommentID()
    {
        return $this->comment_ID;
    }

    /**
     * Returns the value of field comment_post_ID
     *
     * @return integer
     */
    public function getCommentPostID()
    {
        return $this->comment_post_ID;
    }

    /**
     * Returns the value of field comment_author
     *
     * @return string
     */
    public function getCommentAuthor()
    {
        return $this->comment_author;
    }

    /**
     * Returns the value of field comment_author_email
     *
     * @return string
     */
    public function getCommentAuthorEmail()
    {
        return $this->comment_author_email;
    }

    /**
     * Returns the value of field comment_author_url
     *
     * @return string
     */
    public function getCommentAuthorUrl()
    {
        return $this->comment_author_url;
    }

    /**
     * Returns the value of field comment_author_IP
     *
     * @return string
     */
    public function getCommentAuthorIP()
    {
        return $this->comment_author_IP;
    }

    /**
     * Returns the value of field comment_date
     *
     * @return string
     */
    public function getCommentDate()
    {
        return $this->comment_date;
    }

    /**
     * Returns the value of field comment_date_gmt
     *
     * @return string
     */
    public function getCommentDateGmt()
    {
        return $this->comment_date_gmt;
    }

    /**
     * Returns the value of field comment_content
     *
     * @return string
     */
    public function getCommentContent()
    {
        return $this->comment_content;
    }

    /**
     * Returns the value of field comment_karma
     *
     * @return integer
     */
    public function getCommentKarma()
    {
        return $this->comment_karma;
    }

    /**
     * Returns the value of field comment_approved
     *
     * @return string
     */
    public function getCommentApproved()
    {
        return $this->comment_approved;
    }

    /**
     * Returns the value of field comment_agent
     *
     * @return string
     */
    public function getCommentAgent()
    {
        return $this->comment_agent;
    }

    /**
     * Returns the value of field comment_type
     *
     * @return string
     */
    public function getCommentType()
    {
        return $this->comment_type;
    }

    /**
     * Returns the value of field comment_parent
     *
     * @return integer
     */
    public function getCommentParent()
    {
        return $this->comment_parent;
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
     * Returns table name mapped in the model.
     *
     * @return string
     */
    public function getSource()
    {
        return 'wp_comments';
    }

    /**
     * Allows to query a set of records that match the specified conditions
     *
     * @param mixed $parameters
     * @return WpComments[]
     */
    public static function find($parameters = null)
    {
        return parent::find($parameters);
    }

    /**
     * Allows to query the first record that match the specified conditions
     *
     * @param mixed $parameters
     * @return WpComments
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
            'comment_ID' => 'comment_ID',
            'comment_post_ID' => 'comment_post_ID',
            'comment_author' => 'comment_author',
            'comment_author_email' => 'comment_author_email',
            'comment_author_url' => 'comment_author_url',
            'comment_author_IP' => 'comment_author_IP',
            'comment_date' => 'comment_date',
            'comment_date_gmt' => 'comment_date_gmt',
            'comment_content' => 'comment_content',
            'comment_karma' => 'comment_karma',
            'comment_approved' => 'comment_approved',
            'comment_agent' => 'comment_agent',
            'comment_type' => 'comment_type',
            'comment_parent' => 'comment_parent',
            'user_id' => 'user_id'
        );
    }

}
