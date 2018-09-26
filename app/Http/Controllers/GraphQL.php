<?php

namespace App\Http\Controllers;

use App\GraphQL\Message\Root\RootType;
use App\GraphQL\Message\User\UserType;
use Illuminate\Http\Request;
use Youshido\GraphQL\Execution\Processor;
use Youshido\GraphQL\Schema\Schema;
use Youshido\GraphQL\Type\NonNullType;
use Youshido\GraphQL\Type\Object\ObjectType;
use Youshido\GraphQL\Type\Scalar\IntType;

class GraphQL extends Controller
{
    /**
     * @var RootType
     */
    private $rootType;

    /**
     * Create a new controller instance.
     *
     * @param RootType $rootType
     */
    public function __construct(RootType $rootType)
    {
        $this->rootType = $rootType;
    }

    /**
     * @param Request $request
     *
     * @return string
     * @throws \Youshido\GraphQL\Exception\ConfigurationException
     */
    public function index(Request $request)
    {
        $processor = new Processor(new Schema([
            'query'     => $this->rootType
        ]));

        $input = key($request->query->all());

        $processor->processPayload($input);

        return json_encode($processor->getResponseData());
    }
}
