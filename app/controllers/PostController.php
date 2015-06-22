<?php
/**
 * Created by PhpStorm.
 * User: ACISS
 * Date: 16/06/2015
 * Time: 04:39 PM
 */

use Hateoas\HateoasBuilder;
use Phalcon\Http\Response;
use Phalcon\Logger;

class PostController extends \Phalcon\Mvc\Controller
{

    /**
     * @var IPostDAO
     */
    private $postDAO;

    /**
     * @var IPostResultSetTransformerService
     */
    private $postResultSetTransformerService;

    /**
     * @param IPostResultSetTransformerService $postResultSetTransformerService
     */
    public function setPostResultSetTransformerService($postResultSetTransformerService)
    {
        $this->postResultSetTransformerService = $postResultSetTransformerService;
    }
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
        $postRequest = new PostRequest(
            $this->request->get("typePost"),
            $this->request->get("postType"),
            $this->request->get("startDate"),
            $this->request->get("endDate"),
            $this->request->get("date"),
            $this->request->get("program"),
            $this->request->get("order"),
            $this->request->get("orderDir"),
            $this->request->get("maxResults")
        );

        $posts = $this->postDAO->findBy($postRequest);

        return $this->buildResponse($posts, false);
    }

    public function findById($id){
        $post = $this->postDAO->findById($id);
        return $this->buildResponse(array($post), true);
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
    public function buildResponse($posts, $allowSingle)
    {
        $response = new Response();
        if ($this->postsNotFound($posts)) {
            $response->setStatusCode(404);
        } else {
            $hateoas = HateoasBuilder::create()->build();
            $postVos = $this->postResultSetTransformerService->transform($posts);
            $postVos = $this->convertToSingleRecordIfNecessary($allowSingle, $postVos);
            $jsonResult = $hateoas->serialize($postVos, 'json');
            $response->setContent($jsonResult);
        }
        return $response;
    }

    /**
     * @param $allowSingle
     * @param $postVos
     * @return mixed
     */
    public function convertToSingleRecordIfNecessary($allowSingle, $postVos)
    {
        if ($allowSingle && sizeof($postVos) == 1) {
            $postVos = $postVos[0];
            return $postVos;
        }
        return $postVos;
    }
}