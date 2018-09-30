<?php

namespace App\GraphQL\Query\User;

use App\Exceptions\NotFound;
use App\GraphQL\Query\User\UserType;
use App\Model\User\User;
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

    /**
     * @param FieldConfig $config
     */
    public function build(FieldConfig $config): void
    {
        $config->addArgument('id',  new IntType());
    }

    /**
     * @param             $value
     * @param array       $args
     * @param ResolveInfo $info
     *
     * @return array
     * @throws \Exception
     */
    public function resolve($value, array $args, ResolveInfo $info): array
    {
        if (isset($args['id'])  && $args['id'] === 1) {
            return (array)$this->users->get($args['id']);
        }

        throw new NotFound('User not found');
    }
}