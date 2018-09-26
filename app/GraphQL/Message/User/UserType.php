<?php

namespace App\GraphQL\Message\User;

use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\StringType;

class UserType extends AbstractObjectType
{
    /**
     * @param ObjectTypeConfig $config
     */
    public function build($config): void
    {
        $config
            ->addField('first_name', new StringType())
            ->addField('last_name', new StringType())
            ->addField('date_of_birth', new DateTimeType());

    }

    public function getName()
    {
        return 'User';  // if you don't do getName – className without "Type" will be used
    }
}