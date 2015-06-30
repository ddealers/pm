<?php
/**
 * Created by PhpStorm.
 * User: ACISS
 * Date: 22/06/2015
 * Time: 05:32 PM
 */

namespace Pm\Validator;


use Phalcon\Validation;
use Phalcon\Validation\Validator;
use Phalcon\Validation\Validator\Confirmation;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\InclusionIn;
use Phalcon\Validation\Validator\PresenceOf;
use Phalcon\Validation\Validator\StringLength;

class UserRegistrationValidator extends Validation{

    public function initialize()
    {
        $this->setMaxLength('nick', 100);
        $this->setMaxLength('email', 100);
        $this->setMaxLength('fbToken', 100);
        $this->setMaxLength('twToken', 100);
        $this->setMaxLength('fbId', 100);
        $this->setMaxLength('firstName', 100);
        $this->setMaxLength('lastName', 100);
        $this->setMaxLength('appKey', 100);
        $this->setMaxLength('lastName', 100);
        $this->setMaxLength('lastName', 100);
        $this->setMaxLength('lastName', 100);

        $this->add('type', new InclusionIn(array(
            'message' => 'The type must be normal, facebook or twitter',
            'domain' => array('normal','facebook ', 'twitter')
        )));

        $this->add('appKey', new PresenceOf(array(
            'message' => 'The appKey is required'
        )));

        $this->add('nick', new PresenceOf(array(
            'message' => 'The nick is required'
        )));

        $this->add('password', new PresenceOf(array(
            'message' => 'The password is required'
        )));

        $this->add('passwordConfirm', new PresenceOf(array(
            'message' => 'The password is required'
        )));

        $this->add('email', new Email(array(
            'message' => 'The e-mail is not valid'
        )));

        $this->add('password', new StringLength(array(
            'max' => 100,
            'min' => 9,
            'messageMaximum' => 'Password is too long',
            'messageMinimum' => 'Password should be at least 9 character long'
        )));

        $this->add('password', new Confirmation(array(
            'message' => 'Password doesn\'t match confirmation',
            'with' => 'passwordConfirm'
        )));

        $this->add('sex', new InclusionIn(array(
            'message' => 'The sex must be woman or man',
            'domain' => array('woman', 'man')
        )));
    }

    /**
     * @param $field
     * @param $max
     * @return StringLength
     */
    public function setMaxLength($field, $max)
    {
        $this->add($field, new StringLength(array(
            'max' => $max,
            'messageMaximum' => $field.' should be at most 100 character long'
        )));
    }

}