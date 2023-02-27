<?php

namespace App\Entity;

use App\Repository\BlocklistRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: BlocklistRepository::class)]
class Blocklist
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\ManyToOne(inversedBy: 'blocklists')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $userSenderFk = null;

    #[ORM\ManyToOne(inversedBy: 'blocklists')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $userRecipientFk = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getUserSenderFk(): ?User
    {
        return $this->userSenderFk;
    }

    public function setUserSenderFk(?User $userSenderFk): self
    {
        $this->userSenderFk = $userSenderFk;

        return $this;
    }

    public function getUserRecipientFk(): ?User
    {
        return $this->userRecipientFk;
    }

    public function setUserRecipientFk(?User $userRecipientFk): self
    {
        $this->userRecipientFk = $userRecipientFk;

        return $this;
    }
}
