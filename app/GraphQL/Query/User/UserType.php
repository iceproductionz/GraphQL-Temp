<?php

namespace App\GraphQL\Query\User;

use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\DateTimeType;
use Youshido\GraphQL\Type\Scalar\IntType;
use Youshido\GraphQL\Type\Scalar\StringType;

class UserType extends AbstractObjectType
{
    /**
     * @param ObjectTypeConfig $config
     *
     * @throws \Youshido\GraphQL\Exception\ConfigurationException
     */
    public function build($config): void
    {
        $config
            ->addField('id', new IntType())
            ->addField('first_name', new StringType())
            ->addField('last_name', new StringType())
            ->addField('date_of_birth', new DateTimeType());

        $config->addFields(
            [
                'user' => [
                    // we specify the output type – simple Int, since it doesn't have a structure
                    'type'    => new IntType(),
                    // we need a post ID and we set it to be required Int
                    'args'    => [
                        'id' => new NonNullType(new IntType())
                    ],
                    // simple resolve function that always returns 2
                    'resolve' => function () {
                        return 2;
                    },
                ]
            ]
        );

    }

    public function getName()
    {
        return 'User';  // if you don't do getName – className without "Type" will be used
    }
}