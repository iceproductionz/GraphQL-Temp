<?php

namespace App\Model\User;

use App\Exceptions\NotSupported;

class User
{
    /**
     * @var int
     */
    public $id;

    /**
     * @var string
     */
    public $first_name;

    /**
     * @var string
     */
    public $last_name;

    /**
     * @var \DateTimeImmutable
     */
    public $date_of_birth;

    /**
     * User constructor.
     *
     * @param int                $id
     * @param string             $first_name
     * @param string             $last_name
     * @param \DateTimeImmutable $date_of_birth
     */
    public function __construct(int $id, string $first_name, string $last_name, \DateTimeImmutable $date_of_birth)
    {
        $this->id = $id;
        $this->first_name = $first_name;
        $this->last_name = $last_name;
        $this->date_of_birth = $date_of_birth;
    }
}