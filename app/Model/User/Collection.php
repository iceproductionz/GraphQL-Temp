<?php

namespace App\Model\User;

use App\Exceptions\NotFound;
use Iceproductionz\Stream\Stream;

class Collection
{
    /**
     * @var Stream
     */
    private $stream;

    /**
     * Collection constructor.
     *
     * @param Stream $stream
     */
    public function __construct(Stream $stream)
    {
        $this->stream = $stream;
    }

    /**
     * @param int $id
     *
     * @return User
     * @throws NotFound
     * @throws \Exception
     */
    public function findById(int $id): User
    {
        while ($this->stream->eof() === false) {
            $data = $this->stream->read();
            $user = new User((int)$data[0], $data[1], $data[2], new \DateTimeImmutable($data[3]));
            $user->first_name = $data[1];
            $user->last_name = $data[2];
            $user->date_of_birth = $data[3];

            if ($user->id === $id) {
                return $user;
            }
        }

        throw new NotFound(' User not found');
    }
}
