<?php

namespace App\GraphQL\User;

use App\GraphQL\Message\User\UserType;
use App\GraphQL\Type\Type;
use Youshido\GraphQL\Execution\ResolveInfo;
use Youshido\GraphQL\Field\AbstractField;
use Youshido\GraphQL\Type\AbstractType;
use Youshido\GraphQL\Type\Object\AbstractObjectType;

class User extends AbstractField
{
    /**
     * @var AbstractType
     */
    private $userType;

    /**
     * User constructor.
     *
     * @param UserType $userType
     */
    public function __construct(UserType $userType)
    {
        parent::__construct([]);
        $this->userType = $userType;
    }

    /**
     * @return AbstractObjectType|AbstractType
     */
    public function getType()
    {
        return $this->userType;
    }
}