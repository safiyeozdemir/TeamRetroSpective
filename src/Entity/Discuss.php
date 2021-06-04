<?php

namespace App\Entity;

use App\Repository\DiscussRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
/**
 * @ORM\Entity(repositoryClass=DiscussRepository::class)
 */
class Discuss
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */

    private $user_discuss;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(nullable=false)
     */

    private $userid;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserDiscuss(): ?string
    {
        return $this->user_discuss;
    }

    public function setUserDiscuss(string $user_discuss): self
    {
        $this->user_discuss = $user_discuss;

        return $this;
    }

    /**
     * @return mixed
     */
    public function getUserid()
    {
        return $this->userid;
    }

    /**
     * @param mixed $userid
     */
    public function setUserid($userid): void
    {
        $this->userid = $userid;
    }


}
