<?php

namespace App\Repository;

use App\Model\User\User;
use Faker\Factory;

class Users
{
    public function all()
    {
        $list = [];

        for ($i=0; $i < 10; $i++) {

            $factory = Factory::create();

            $user = new User();
            $user->date_of_birth = $factory->dateTimeThisCentury;
            $user->first_name    = $factory->firstName;
            $user->last_name     = $factory->lastName;

            $list[] =  $user;
        }

        return $list;
    }

    public function get($id): User
    {
        $factory = Factory::create();

        $user = new User();
        $user->date_of_birth = $factory->dateTimeThisCentury;
        $user->first_name    = $factory->firstName;
        $user->last_name     = $factory->lastName;

        return $user;
    }
}