<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PlayerRepository")
 */
class Player
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $Name;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\user", inversedBy="players")
     */
    private $UserPlayer;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->Name;
    }

    public function setName(string $Name): self
    {
        $this->Name = $Name;

        return $this;
    }

    public function getUserPlayer(): ?user
    {
        return $this->UserPlayer;
    }

    public function setUserPlayer(?user $UserPlayer): self
    {
        $this->UserPlayer = $UserPlayer;

        return $this;
    }
}
