<?php
/**
 * Created by PhpStorm.
 * User: ACISS
 * Date: 17/06/2015
 * Time: 09:25 PM
 */

class PostDAO implements IPostDAO{

    public function findBy(PostRequest $postRequest)
    {
        $query = Post::query();
        $parameters = array();
        $parameters = $this->applyTypePostFilter($postRequest, $query, $parameters);
        $parameters = $this->applyPostTypeFilter($postRequest, $query, $parameters);
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
        if ($postRequest) {
            $query->andWhere("postType = :postType:");
            $parameters["postType"] = $postRequest->getPostType();
            return $parameters;
        }
        return $parameters;
    }

}