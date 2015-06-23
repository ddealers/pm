<?php
/**
 * Created by PhpStorm.
 * User: ACISS
 * Date: 22/06/2015
 * Time: 09:31 PM
 */

namespace Pm\services;


use Phalcon\Validation\Message\Group;

interface IErrorMessageBuilder {

    public function createErrorResult(Group $messages);

    public function createModelErrorResult($messages);

}