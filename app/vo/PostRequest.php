<?php
/**
 * Created by PhpStorm.
 * User: ACISS
 * Date: 17/06/2015
 * Time: 09:32 PM
 */
namespace Pm\Vo;

class PostRequest {

    protected $typePost;

    protected $postType;

    protected $startDate;

    protected $endDate;

    protected $date;

    protected $program;

    protected $order;

    protected $orderDir;

    protected $maxResults;

    protected $tags;


    function __construct($typePost, $postType, $startDate, $endDate, $date, $program,$tags, $order,
                         $orderDir, $maxResults)
    {
        $this->typePost = $typePost;
        $this->postType = $postType;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
        $this->date = $date;
        $this->program = $program;
        $this->tags = $tags;
        $this->order = $order;
        $this->orderDir = $orderDir;
        $this->maxResults = $maxResults;
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

    /**
     * @return mixed
     */
    public function getStartDate()
    {
        return $this->startDate;
    }

    /**
     * @param mixed $startDate
     */
    public function setStartDate($startDate)
    {
        $this->startDate = $startDate;
    }

    /**
     * @return mixed
     */
    public function getEndDate()
    {
        return $this->endDate;
    }

    /**
     * @param mixed $endDate
     */
    public function setEndDate($endDate)
    {
        $this->endDate = $endDate;
    }

    /**
     * @return mixed
     */
    public function getDate()
    {
        return $this->date;
    }

    /**
     * @param mixed $date
     */
    public function setDate($date)
    {
        $this->date = $date;
    }

    /**
     * @return mixed
     */
    public function getProgram()
    {
        return $this->program;
    }

    /**
     * @param mixed $program
     */
    public function setProgram($program)
    {
        $this->program = $program;
    }



    /**
     * @return mixed
     */
    public function getOrder()
    {
        return $this->order;
    }

    /**
     * @param mixed $order
     */
    public function setOrder($order)
    {
        $this->order = $order;
    }

    /**
     * @return mixed
     */
    public function getOrderDir()
    {
        return $this->orderDir;
    }

    /**
     * @param mixed $orderDir
     */
    public function setOrderDir($orderDir)
    {
        $this->orderDir = $orderDir;
    }

    /**
     * @return mixed
     */
    public function getMaxResults()
    {
        return $this->maxResults;
    }

    /**
     * @param mixed $maxResults
     */
    public function setMaxResults($maxResults)
    {
        $this->maxResults = $maxResults;
    }

    /**
     * @return mixed
     */
    public function getTags()
    {
        return $this->tags;
    }

    /**
     * @param mixed $tags
     */
    public function setTags($tags)
    {
        $this->tags = $tags;
    }





}