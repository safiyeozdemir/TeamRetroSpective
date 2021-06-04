<?php

namespace App\Entity;

use App\Repository\CommentGroupRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\ManyToOne;
use Doctrine\ORM\Mapping\OneToMany;

/**
 * @ORM\Entity(repositoryClass=CommentGroupRepository::class)
 */
class CommentGroup
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
    private $group_name;
    /**
     * @ORM\ManyToOne(targetEntity="Retro")
     * @ORM\JoinColumn(nullable=false)
     */
    private $retroid;

    /**
     * @ORM\ManyToOne(targetEntity="Comment")
     * @ORM\JoinColumn(nullable=false)
     */
    private $commentid;

    /**
     * @ORM\ManyToOne(targetEntity="Comment")
     * @ORM\JoinColumn(nullable=false)
     */
    private $commenttype;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getGroupName(): ?string
    {
        return $this->group_name;
    }

    public function setGroupName(string $group_name): self
    {
        $this->group_name = $group_name;

        return $this;
    }
    public function getRetroId(){
        return $this->retroid;
    }
    public function setRetroId($retroid):void{
        $this->retroid=$retroid;
    }

    /**
     * @return mixed
     */
    public function getCommentid()
    {
        return $this->commentid;
    }

    /**
     * @param mixed $commentid
     */
    public function setCommentid($commentid): void
    {
        $this->commentid = $commentid;
    }

    /**
     * @return mixed
     */
    public function getCommenttype()
    {
        return $this->commenttype;
    }

    /**
     * @param mixed $commenttype
     */
    public function setCommenttype($commenttype): void
    {
        $this->commenttype = $commenttype;
    }


    /**
     * @return mixed
     */





}
