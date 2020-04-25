<?php

Namespace App\Models;

use Phalcon\Mvc\Model;
use Phalcon\Validation;
use Phalcon\Validation\Validator\Email;

class Users extends Model
{
    // variables
    public $id;
    public $name;
    public $email;
    public $pass;
    public $active;
    public $created;
    public $updated;
    public $ismember;

    // validate email
    public function validation()
    {
        $validator = new Validation();

        $validator->add(
            'email',
            new Email (
                [
                    'model'   => $this,
                    'message' => 'Email is not valid',
                ]
            )
        );

        return $this->validate($validator);
    }
}

