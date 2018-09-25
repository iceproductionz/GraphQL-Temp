<?php

namespace App\Http\Controllers;

use App\GraphQL\Message\Root\RootType;
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
     * @param RootType $rootType
     */
    public function __construct(RootType $rootType)
    {
        $this->rootType = $rootType;
    }

    public function index(Request $request)
    {
        $processor = new Processor(new Schema([
            'query' => $this->rootType
        ]));

        $processor->processPayload($request->query);

        return json_encode($processor->getResponseData());
    }
}
