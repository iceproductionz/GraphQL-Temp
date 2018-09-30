<?php

namespace App\Repository;

use App\Model\User\Collection;
use App\Model\User\User;
use Iceproductionz\Stream\Csv;
use Illuminate\Support\Facades\Storage;
use GrahamCampbell\Flysystem\FlysystemManager;

class Users
{
    /**
     * @var Collection
     */
    private $mapCollection;

    /**
     * Users constructor.
     *
     * @param FlysystemManager $flysystemManager
     */
    public function __construct(FlysystemManager $flysystemManager)
    {
        $file = $flysystemManager->readStream('users.csv');

        $this->mapCollection = new Collection(new Csv($file));
    }

    /**
     * @param $id
     *
     * @return User
     * @throws \Exception
     */
    public function get(int $id): User
    {
        return $this->mapCollection->findById($id);
    }
}