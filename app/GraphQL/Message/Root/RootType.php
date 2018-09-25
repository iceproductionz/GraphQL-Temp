<?php

namespace App\GraphQL\Message\Root;

use App\GraphQL\Message\User\UserType;
use App\GraphQL\User\User;
use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\StringType;

class RootType extends AbstractObjectType
{
    /**
     * @var User
     */
    private $user;

    public function __construct(User $user)
    {
        parent::__construct([]);
        $this->user = $user;
    }

    /**
     * @param ObjectTypeConfig $config
     */
    public function build($config): void
    {
        $config->addField($this->user);
    }

    /**
     * @return bool|string
     */
    public function getName()
    {
        return 'RootQueryType';
    }
}