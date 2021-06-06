<?php

namespace App\Entity;

use App\Repository\RetroRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\ORM\Mapping\OneToMany;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=RetroRepository::class)
 */
class Retro
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
    private $retro_link;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank
     */
    private $retro_name;

    /**
     * @ORM\OneToMany (targetEntity="BrainStorm", mappedBy="retroid")
     * @ORM\OneToMany (targetEntity="Comment", mappedBy="retroid")
     */
    private $retrobrainstorm;

    /**
     * @ORM\Column(type="string", length=100)
     * @Assert\NotBlank
     */
    private $team_name;


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRetroLink(): ?string
    {
        return $this->retro_link;
    }

    public function setRetroLink(string $retro_link): self
    {
        $this->retro_link = $retro_link;

        return $this;
    }

    public function getRetroName(): ?string
    {
        return $this->retro_name;
    }

    public function setRetroName(string $retro_name): self
    {
        $this->retro_name = $retro_name;

        return $this;
    }

    public function getTeamName(): ?string
    {
        return $this->team_name;
    }

    public function setTeamName(string $team_name): self
    {
        $this->team_name = $team_name;

        return $this;
    }





}
