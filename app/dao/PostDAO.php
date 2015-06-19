<?php

/**
 * Created by PhpStorm.
 * User: ACISS
 * Date: 17/06/2015
 * Time: 09:25 PM
 */
class PostDAO implements IPostDAO
{

    public function findBy(PostRequest $postRequest)
    {
        $query = Post::query();
        $parameters = array();
        $parameters = $this->applyFieldFilters($postRequest, $query, $parameters);
        $this->applyOrder($postRequest, $query);
        $this->applyLimit($postRequest, $query);
        $query->bind($parameters);
        $posts = $query->execute();
        return $posts->toArray();
    }

    /**
     * @param PostRequest $postRequest
     * @param $query
     * @param $parameters
     * @return mixed
     */
    public function applyTypePostFilter(PostRequest $postRequest, $query, $parameters)
    {
        if ($postRequest->getTypePost()) {
            $query->andWhere("typePost = :typePost:");
            $parameters["typePost"] = $postRequest->getTypePost();
            return $parameters;
        }
        return $parameters;
    }

    /**
     * @param PostRequest $postRequest
     * @param $query
     * @param $parameters
     * @return mixed
     */
    public function applyPostTypeFilter(PostRequest $postRequest, $query, $parameters)
    {
        if ($postRequest->getPostType()) {
            $query->andWhere("postType = :postType:");
            $parameters["postType"] = $postRequest->getPostType();
            return $parameters;
        }
        return $parameters;
    }

    /**
     * @param PostRequest $postRequest
     * @param $query
     * @param $parameters
     * @return mixed
     */
    public function applyDateRangeFilter(PostRequest $postRequest, $query, $parameters)
    {
        if ($this->isDateRange($postRequest)) {
            //$query->betweenWhere("date", $postRequest->getStartDate(), $postRequest->getEndDate());
            $query->andWhere("date between :startDate: and :endDate:");
            $parameters["startDate"] = $postRequest->getStartDate();
            $parameters["endDate"] = $postRequest->getEndDate();
        } else if ($this->isOpenEndRange($postRequest)) {
            $query->andWhere("date >= :startDate:");
            $parameters["startDate"] = $postRequest->getStartDate();
        } else if ($this->isCloseEndRange($postRequest)) {
            $query->andWhere("date <= :endDate:");
            $parameters["endDate"] = $postRequest->getEndDate();
        }
        return $parameters;
    }

    /**
     * @param PostRequest $postRequest
     * @param $query
     * @param $parameters
     * @return mixed
     */
    public function applyDateFilter(PostRequest $postRequest, $query, $parameters)
    {
        if ($postRequest->getDate()) {
            $query->andWhere("date = :date:");
            $parameters["date"] = $postRequest->getDate();
            return $parameters;
        }
        return $parameters;
    }

    /**
     * @param PostRequest $postRequest
     * @return bool
     */
    public function isDateRange(PostRequest $postRequest)
    {
        return $postRequest->getStartDate() && $postRequest->getEndDate();
    }

    /**
     * @param PostRequest $postRequest
     * @return bool
     */
    public function isOpenEndRange(PostRequest $postRequest)
    {
        return $postRequest->getStartDate() && !$postRequest->getEndDate();
    }

    /**
     * @param PostRequest $postRequest
     * @return bool
     */
    public function isCloseEndRange(PostRequest $postRequest)
    {
        return !$postRequest->getStartDate() && $postRequest->getEndDate();
    }

    /**
     * @param PostRequest $postRequest
     * @param $query
     */
    public function applyOrder(PostRequest $postRequest, $query)
    {
        if ($postRequest->getOrder()) {
            $orderStatement = $postRequest->getOrder();
            if ($postRequest->getOrderDir()) {
                $orderStatement .= ' '.$postRequest->getOrderDir();
            }
            $query->orderBy($orderStatement);
        }
    }

    /**
     * @param PostRequest $postRequest
     * @param $query
     */
    public function applyLimit(PostRequest $postRequest, $query)
    {
        if ($postRequest->getMaxResults() !== null && $postRequest->getMaxResults() <= 5000) {
            $query->limit($postRequest->getMaxResults(), 0);
        }else{
            $query->limit(5000, 0);
        }
    }

    /**
     * @param PostRequest $postRequest
     * @param $query
     * @param $parameters
     * @return mixed
     */
    public function applyProgramFilter(PostRequest $postRequest, $query, $parameters)
    {
        if ($postRequest->getProgram()) {
            $query->andWhere("program = :program:");
            $parameters["program"] = $postRequest->getProgram();
            return $parameters;
        }
        return $parameters;
    }

    /**
     * @param PostRequest $postRequest
     * @param $query
     * @param $parameters
     * @return mixed
     */
    public function applyFieldFilters(PostRequest $postRequest, $query, $parameters)
    {
        $parameters = $this->applyTypePostFilter($postRequest, $query, $parameters);
        $parameters = $this->applyPostTypeFilter($postRequest, $query, $parameters);
        $parameters = $this->applyDateRangeFilter($postRequest, $query, $parameters);
        $parameters = $this->applyDateFilter($postRequest, $query, $parameters);
        $parameters = $this->applyProgramFilter($postRequest, $query, $parameters);
        return $parameters;
    }


}