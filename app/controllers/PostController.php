<?php
/**
 * Created by PhpStorm.
 * User: ACISS
 * Date: 16/06/2015
 * Time: 04:39 PM
 */

use Phalcon\Http\Response;
use Phalcon\Logger;

class PostController extends \Phalcon\Mvc\Controller
{

    /**
     * @var IPostDAO
     */
    protected  $postDAO;

    /**
     * @param mixed $postDAO
     *
     */
    public function setPostDAO($postDAO)
    {
        $this->postDAO = $postDAO;
    }

    public function get()
    {
        $postRequest = new PostRequest($this->request->get("typePost"), $this->request->get("postType"));

        $posts = $this->postDAO->findBy($postRequest);

        return $this->buildResponse($posts);
    }

    /**
     * @param $posts
     * @return bool
     */
    public function postsNotFound($posts)
    {
        return sizeof($posts) == 0;
    }

    /**
     * @param $posts
     * @return Response
     */
    public function buildResponse($posts)
    {
        $response = new Response();
        if ($this->postsNotFound($posts)) {
            $response->setStatusCode(404);
        } else {
            $response->setJsonContent($posts);
        }
        return $response;
    }
}