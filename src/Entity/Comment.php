<?php

namespace App\Entity;

use App\Repository\CommentRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;

/**
 * @ORM\Entity(repositoryClass=CommentRepository::class)
 */
class Comment
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $comment_type;

    /**
     * @ORM\Column(type="datetime")
     */
    private $created_at;

    /**
     * @ORM\ManyToOne(targetEntity="User")
     * @ORM\JoinColumn(nullable=false)
     */
    private $userid;
    /**
     * @ORM\ManyToOne(targetEntity="Retro")
     * @ORM\JoinColumn(nullable=false)
     */
    private $retroid;
    /**
     * @ORM\OneToMany(targetEntity="CommentGroup", mappedBy="commentid")
     * @ORM\OneToMany(targetEntity="CommentLike", mappedBy="commentid")
     */
    private $commenttogroup;
    /**
     * @ORM\OneToMany(targetEntity="CommentGroup", mappedBy="commenttype")
     */
    private $commenttogrouptyepe;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCommentType(): ?int
    {
        return $this->comment_type;
    }

    public function setCommentType(int $comment_type): self
    {
        $this->comment_type = $comment_type;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->created_at;
    }

    public function setCreatedAt(\DateTimeInterface $created_at): self
    {
        $this->created_at = $created_at;

        return $this;
    }
    public function getUserId(){
        return $this->userid;
    }
    public function setUserId($userid):void{
        $this->userid=$userid;
    }
    public function getRetroId(){
        return $this->retroid;
    }
    public function setRetroId($retroid):void{
        $this->retroid=$retroid;
    }
}
