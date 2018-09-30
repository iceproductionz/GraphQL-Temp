<?php

namespace App\Http\Controllers;

use App\GraphQL\Query\Root\RootType;
use Illuminate\Http\Request;
use Youshido\GraphQL\Execution\Processor;
use Youshido\GraphQL\Schema\Schema;

class GraphQL extends Controller
{
    /**
     * @var RootType
     */
    private $rootType;

    /**
     * Create a new controller instance.
     *
     * @param RootType         $rootType
     */
    public function __construct(RootType $rootType)
    {

        $this->rootType = $rootType;
    }

    /**
     * @param Request $request
     *
     * @return string
     */
    public function index(Request $request): string
    {
        $processor = new Processor(new Schema([
            'query'     => $this->rootType,
        ]));

        $input = key($request->query->all());

        $processor->processPayload($input);

        return json_encode($processor->getResponseData());
    }
}
