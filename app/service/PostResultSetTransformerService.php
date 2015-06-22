<?php

/**
 * Created by PhpStorm.
 * User: ACISS
 * Date: 22/06/2015
 * Time: 12:26 AM
 */
class PostResultSetTransformerService implements IPostResultSetTransformerService
{

    public function transform($posts)
    {
        $result = array();
        foreach ($posts as $post) {
            /* @var $post Post */
            $postVo = new PostVo();
            $postVo->setId($post->getId());
            $postVo->setAuthor($post->getAuthor());
            $postVo->setAvg($post->getAvg());
            $postVo->setComments($post->getComments());
            $postVo->setContent($post->getContent());
            $postVo->setDate($post->getDate());
            $postVo->setDest($post->getDest());
            $postVo->setEmbed($post->getEmbed());
            $postVo->setHour($post->getHour());
            $postVo->setKeywords($post->getKeywords());
            $postVo->setMetaCss($post->getMetaCss());
            $postVo->setMetaFb($post->getMetaFb());
            $postVo->setMetaVars($post->getMetaVars());
            $result[] = $postVo;
        }
        return $result;
    }

}