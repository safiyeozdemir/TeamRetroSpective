<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserRepository::class)
 * @ORM\Table(name="`user`")
 * @method string getUserIdentifier()
 */
class User implements UserInterface
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=30, unique=true)
     */
    private $userName;

    /**
     * @ORM\OneToMany(targetEntity=Comment::class, mappedBy="commentUser")
     */
    private $comments;

    /**
     * @ORM\Column(type="string", length=180, nullable=true, unique=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string")
     */
    private $password;

    /**
     * @var array
     *
     * @ORM\Column(type="json",nullable=true)
     */
    private $roles = [];

    /**
     * @ORM\Column(type="datetime")
     */
    private $createdAt;

    /**
     * @ORM\OneToMany(targetEntity=Retro::class, mappedBy="user", orphanRemoval=true)
     */
    private $retros;

    /**
     * @ORM\OneToMany(targetEntity=CommentLike::class, mappedBy="likeUser")
     */
    private $commentLikes;

    /**
     * @ORM\OneToMany(targetEntity=RetroUser::class, mappedBy="user")
     */
    private $retroUsers;



    public function __construct()
    {
        $this->comments = new ArrayCollection();
        $this->retros = new ArrayCollection();
        $this->retroID = new ArrayCollection();
        $this->retroUsers = new ArrayCollection();

    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserName(): ?string
    {
        return $this->userName;
    }

    public function setUserName(string $userName): self
    {
        $this->userName = $userName;

        return $this;
    }



    /**
     * @return Collection|Comment[]
     */
    public function getComments(): Collection
    {
        return $this->comments;
    }

    public function addComment(Comment $comment): self
    {
        if (!$this->comments->contains($comment)) {
            $this->comments[] = $comment;
            $comment->setCommentUser($this);
        }

        return $this;
    }

    public function removeComment(Comment $comment): self
    {
        if ($this->comments->removeElement($comment)) {
            // set the owning side to null (unless already changed)
            if ($comment->getCommentUser() === $this) {
                $comment->setCommentUser(null);
            }
        }

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeInterface
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeInterface $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    /**
     * @return Collection|Retro[]
     */
    public function getRetros(): Collection
    {
        return $this->retros;
    }

    public function addRetro(Retro $retro): self
    {
        if (!$this->retros->contains($retro)) {
            $this->retros[] = $retro;

        }

        return $this;
    }

    public function removeRetro(Retro $retro): self
    {
        if ($this->retros->removeElement($retro)) {
            // set the owning side to null (unless already changed)
            if ($retro->getUserId() === $this) {
                $retro->setUserId(null);
            }
        }

        return $this;
    }

    /**
     * Returns the roles or permissions granted to the user for security.
     */
    public function getRoles(): array
    {
        $roles = $this->roles;

        // guarantees that a user always has at least one role for security
        if (empty($roles)) {
            $roles[] = 'ROLE_USER';
        }

        return array_unique($roles);
    }

    public function setRoles(array $roles): void
    {
        $this->roles = $roles;
    }

    /**
     * Returns the salt that was originally used to encode the password.
     *
     * {@inheritdoc}
     */
    public function getSalt(): ?string
    {
        // We're using bcrypt in security.yaml to encode the password, so
        // the salt value is built-in and and you don't have to generate one
        // See https://en.wikipedia.org/wiki/Bcrypt

        return null;
    }

    /**
     * Removes sensitive data from the user.
     *
     * {@inheritdoc}
     */
    public function eraseCredentials(): void
    {
        // if you had a plainPassword property, you'd nullify it here
        // $this->plainPassword = null;
    }

    /**
     * {@inheritdoc}
     */
    public function __serialize(): array
    {
        // add $this->salt too if you don't use Bcrypt or Argon2i
        return [$this->id, $this->userName, $this->password];
    }

    /**
     * {@inheritdoc}
     */
    public function __unserialize(array $data): void
    {
        // add $this->salt too if you don't use Bcrypt or Argon2i
        [$this->id, $this->userName, $this->password] = $data;
    }


    public function __call($name, $arguments)
    {
        // TODO: Implement @method string getUserIdentifier()
    }

    /**
     * @return mixed
     */
    public function getCommentLikes()
    {
        return $this->commentLikes;
    }

    /**
     * @param mixed $commentLikes
     */
    public function setCommentLikes($commentLikes): void
    {
        $this->commentLikes = $commentLikes;
    }

    /**
     * @return ArrayCollection
     */
    public function getRetroID(): ArrayCollection
    {
        return $this->retroID;
    }

    /**
     * @param ArrayCollection $retroID
     */
    public function setRetroID(ArrayCollection $retroID): void
    {
        $this->retroID = $retroID;
    }

    /**
     * @return Collection|RetroUser[]
     */
    public function getRetroUsers(): Collection
    {
        return $this->retroUsers;
    }

    public function addRetroUser(RetroUser $retroUser): self
    {
        if (!$this->retroUsers->contains($retroUser)) {
            $this->retroUsers[] = $retroUser;
            $retroUser->setUserID($this);
        }

        return $this;
    }

    public function removeRetroUser(RetroUser $retroUser): self
    {
        if ($this->retroUsers->removeElement($retroUser)) {
            // set the owning side to null (unless already changed)
            if ($retroUser->getUserID() === $this) {
                $retroUser->setUserID(null);
            }
        }

        return $this;
    }




}
