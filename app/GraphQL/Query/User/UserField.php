<?php

namespace App\GraphQL\Query\User;

use App\GraphQL\Query\User\UserType;
use App\Repository\Users;
use Youshido\GraphQL\Config\Field\FieldConfig;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Field\AbstractField;
use Youshido\GraphQL\Type\AbstractType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;
use Youshido\GraphQL\Type\Scalar\IntType;

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

    public function build(FieldConfig $config)
    {
        $config->addArgument('id',  new IntType());
    }

    public function resolve($value, array $args, ResolveInfo $info)
    {
        return (array)$this->users->get(0);
    }
}