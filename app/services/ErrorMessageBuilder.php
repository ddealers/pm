<?php
/**
 * Created by PhpStorm.
 * User: ACISS
 * Date: 22/06/2015
 * Time: 09:31 PM
 */

namespace Pm\Services;


use Phalcon\Validation\Message\Group;
use Pm\Vo\ErrorResult;

class ErrorMessageBuilder implements IErrorMessageBuilder{


    /**
     * @param Group $messages
     * @return ErrorResult
     */
    public function createErrorResult(Group $messages)
    {
        $errorResult = new ErrorResult();
        if (count($messages)) {
            foreach ($messages as $message) {
                $errorResult->messages[] = $message->getMessage();
            }
        }
        return $errorResult;
    }

    /**
     * @param \Phalcon\Mvc\Model\MessageInterface[] $messages
     * @return ErrorResult
     */
    public function createModelErrorResult($messages)
    {
        $errorResult = new ErrorResult();
        if (count($messages)) {
            foreach ($messages as $message) {
                $errorResult->messages[] = $message->getMessage();
            }
        }
        return $errorResult;
    }
}