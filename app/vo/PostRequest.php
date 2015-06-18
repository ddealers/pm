<?php
/**
 * Created by PhpStorm.
 * User: ACISS
 * Date: 17/06/2015
 * Time: 09:32 PM
 */

class PostRequest {

    protected $typePost;

    protected $postType;

    function __construct($typePost, $postType)
    {
        $this->typePost = $typePost;
        $this->postType = $postType;
    }


    /**
     * @return mixed
     */
    public function getTypePost()
    {
        return $this->typePost;
    }

    /**
     * @param mixed $typePost
     */
    public function setTypePost($typePost)
    {
        $this->typePost = $typePost;
    }

    /**
     * @return mixed
     */
    public function getPostType()
    {
        return $this->postType;
    }

    /**
     * @param mixed $postType
     */
    public function setPostType($postType)
    {
        $this->postType = $postType;
    }



}