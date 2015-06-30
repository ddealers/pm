<?php
namespace Pm\Controller;
/**
 * Created by PhpStorm.
 * User: ACISS
 * Date: 16/06/2015
 * Time: 04:39 PM
 */

use Hateoas\HateoasBuilder;
use Phalcon\Http\Response;
use Phalcon\Logger;
use Phalcon\Mvc\Controller;
use Pm\DAO\IPostDAO;
use Pm\Services\IPostResultSetTransformerService;
use Pm\Vo\PostRequest;

class PostController extends Controller
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
     * @param  $postResultSetTransformerService
     */
    public function setPostResultSetTransformerService(
        IPostResultSetTransformerService $postResultSetTransformerService)
    {
        $this->postResultSetTransformerService = $postResultSetTransformerService;
    }
    /**
     * @param $postDAO
     *
     */
    public function setPostDAO(IPostDAO $postDAO)
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
            $this->request->get("tags"),
            $this->request->get("order"),
            $this->request->get("orderDir"),
            $this->request->get("maxResults")
        );

        $posts = $this->postDAO->findBy($postRequest);

        return $this->buildResponse($posts, false);
    }

    public function findById($id){
        $post = $this->postDAO->findById($id);
        $posts = array();
        if($post){
            $posts[] = $post;
        }
        return $this->buildResponse($posts, true);
    }

    /**
     * @param $posts
     * @return bool
     */
    private function postsNotFound($posts)
    {
        return sizeof($posts) == 0;
    }

    /**
     * @param $posts
     * @param $allowSingle
     * @return Response
     */
    private function buildResponse($posts, $allowSingle)
    {
        $response = new Response();
        if ($this->postsNotFound($posts)) {
            if(is_array($posts)){
                $response->setJsonContent($posts);
            }
            $response->setStatusCode(404, "Not Found");
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
    private function convertToSingleRecordIfNecessary($allowSingle, $postVos)
    {
        if ($allowSingle && sizeof($postVos) == 1) {
            $postVos = $postVos[0];
            return $postVos;
        }
        return $postVos;
    }
}