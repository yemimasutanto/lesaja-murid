<?php

Namespace App\Models;

use Phalcon\Mvc\Model;
use Phalcon\Validation;
use Phalcon\Validation\Validator\Email;
use Phalcon\Validation\Validator\Password;

class Murid extends Model
{
    // variables
    public $id_murid;
    public $nama_murid;
    public $email_murid;
    public $password_murid;


    // // validate email
    // public function validation(){
    //     $validator = new Validation();

    //     $validator->add('email_murid', new Email (
    //             [
    //                 'model'   => $this,
    //                 'message' => 'Email is not valid',
    //             ]
    //         )
    //     );

    //     $validator->add('password_murid', new Password (
    //         [
    //             'model'   => $this,
    //             'message' => 'Password is not valid',
    //         ]
    //     )
    // );
    //     return $this->validate($validator);
    // }

}
