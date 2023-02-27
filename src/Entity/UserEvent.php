<?php

namespace App\Entity;

use App\Repository\UserEventRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserEventRepository::class)]
class UserEvent
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $participeIsValid = null;

    #[ORM\Column]
    private ?bool $bookmark = null;

    #[ORM\Column]
    private ?bool $invite = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $inviteDate = null;

    #[ORM\Column]
    private ?bool $alert = null;

    #[ORM\ManyToOne(inversedBy: 'userEvents')]
    private ?Reaction $reactionFk = null;

    #[ORM\ManyToOne(inversedBy: 'userEvents')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Roles $roleFk = null;

    #[ORM\ManyToOne(inversedBy: 'userEvents')]
    #[ORM\JoinColumn(nullable: false)]
    private ?User $userFk = null;

    #[ORM\ManyToOne(inversedBy: 'userEventFk')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Event $event = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isParticipeIsValid(): ?bool
    {
        return $this->participeIsValid;
    }

    public function setParticipeIsValid(bool $participeIsValid): self
    {
        $this->participeIsValid = $participeIsValid;

        return $this;
    }

    public function isBookmark(): ?bool
    {
        return $this->bookmark;
    }

    public function setBookmark(bool $bookmark): self
    {
        $this->bookmark = $bookmark;

        return $this;
    }

    public function isInvite(): ?bool
    {
        return $this->invite;
    }

    public function setInvite(bool $invite): self
    {
        $this->invite = $invite;

        return $this;
    }

    public function getInviteDate(): ?\DateTimeInterface
    {
        return $this->inviteDate;
    }

    public function setInviteDate(\DateTimeInterface $inviteDate): self
    {
        $this->inviteDate = $inviteDate;

        return $this;
    }

    public function isAlert(): ?bool
    {
        return $this->alert;
    }

    public function setAlert(bool $alert): self
    {
        $this->alert = $alert;

        return $this;
    }

    public function getReactionFk(): ?Reaction
    {
        return $this->reactionFk;
    }

    public function setReactionFk(?Reaction $reactionFk): self
    {
        $this->reactionFk = $reactionFk;

        return $this;
    }

    public function getRoleFk(): ?Roles
    {
        return $this->roleFk;
    }

    public function setRoleFk(?Roles $roleFk): self
    {
        $this->roleFk = $roleFk;

        return $this;
    }

    public function getUserFk(): ?User
    {
        return $this->userFk;
    }

    public function setUserFk(?User $userFk): self
    {
        $this->userFk = $userFk;

        return $this;
    }

    public function getEvent(): ?Event
    {
        return $this->event;
    }

    public function setEvent(?Event $event): self
    {
        $this->event = $event;

        return $this;
    }
}
