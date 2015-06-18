<?php
/**
 * Created by PhpStorm.
 * User: ACISS
 * Date: 17/06/2015
 * Time: 09:26 PM
 */

interface IPostDAO{

    public function findBy(PostRequest $postRequest);

}