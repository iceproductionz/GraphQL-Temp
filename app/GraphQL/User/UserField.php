<?php

namespace App\GraphQL\User;

use App\GraphQL\Message\User\UserType;
use App\Repository\Users;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Field\AbstractField;
use Youshido\GraphQL\Type\AbstractType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;

class UserField extends AbstractField
{
    /**
     * @var Users
     */
    private $users;

    public function __construct(Users $users)
    {
        parent::__construct([]);
        $this->users = $users;
    }

    /**
     * @return AbstractObjectType|AbstractType
     */
    public function getType()
    {
        return new UserType();
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        return (array)$this->users->get(0);
    }
}