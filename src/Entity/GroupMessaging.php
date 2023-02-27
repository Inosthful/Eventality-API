<?php

namespace App\Entity;

use App\Repository\GroupMessagingRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GroupMessagingRepository::class)]
class GroupMessaging
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 255)]
    private ?string $content = null;

    #[ORM\ManyToOne(inversedBy: 'groupMessagings')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $userSenderFk = null;

    #[ORM\ManyToOne(inversedBy: 'groupMessagings')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Event $eventRecipientFk = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->date;
    }

    public function setDate(\DateTimeInterface $date): self
    {
        $this->date = $date;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): self
    {
        $this->content = $content;

        return $this;
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

    public function getEventRecipientFk(): ?Event
    {
        return $this->eventRecipientFk;
    }

    public function setEventRecipientFk(?Event $eventRecipientFk): self
    {
        $this->eventRecipientFk = $eventRecipientFk;

        return $this;
    }
}
