<?php

namespace App\GraphQL\Query\Root;

use App\GraphQL\Query\User\UserField;
use Youshido\GraphQL\Config\Object\ObjectTypeConfig;
use Youshido\GraphQL\Type\Object\AbstractObjectType;

class RootType extends AbstractObjectType
{
    /**
     * @var UserField
     */
    private $user;

    public function __construct(UserField $user)
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