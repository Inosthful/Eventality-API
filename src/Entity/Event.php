<?php

namespace App\Entity;

use App\Repository\EventRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EventRepository::class)]
class Event
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $date = null;

    #[ORM\Column(length: 255)]
    private ?string $photo = null;

    #[ORM\Column]
    private ?bool $privateEventStatus = null;

    #[ORM\Column]
    private ?bool $proStatus = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    private ?\DateTimeInterface $creationDate = null;

    #[ORM\Column(length: 255)]
    private ?string $description = null;

    #[ORM\Column(length: 255)]
    private ?string $adress = null;

    #[ORM\Column]
    private ?int $maxParticipants = null;

    #[ORM\Column]
    private ?bool $requiredValidation = null;

    #[ORM\ManyToOne(inversedBy: 'events')]
    #[ORM\JoinColumn(nullable: false)]
    private ?TypeEvent $typeEventFk = null;

    #[ORM\ManyToOne(inversedBy: 'events')]
    private ?Story $storyFk = null;

    #[ORM\ManyToOne(inversedBy: 'events')]
    #[ORM\JoinColumn(nullable: false)]
    private ?City $cityFk = null;

    #[ORM\OneToMany(mappedBy: 'eventRecipientFk', targetEntity: GroupMessaging::class)]
    private Collection $groupMessagings;

    #[ORM\OneToMany(mappedBy: 'event', targetEntity: UserEvent::class)]
    private Collection $userEventFk;

    #[ORM\ManyToMany(targetEntity: Tag::class, inversedBy: 'events')]
    private Collection $eventTagFk;

    public function __construct()
    {
        $this->groupMessagings = new ArrayCollection();
        $this->userEventFk = new ArrayCollection();
        $this->eventTagFk = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
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

    public function getPhoto(): ?string
    {
        return $this->photo;
    }

    public function setPhoto(string $photo): self
    {
        $this->photo = $photo;

        return $this;
    }

    public function isPrivateEventStatus(): ?bool
    {
        return $this->privateEventStatus;
    }

    public function setPrivateEventStatus(bool $privateEventStatus): self
    {
        $this->privateEventStatus = $privateEventStatus;

        return $this;
    }

    public function isProStatus(): ?bool
    {
        return $this->proStatus;
    }

    public function setProStatus(bool $proStatus): self
    {
        $this->proStatus = $proStatus;

        return $this;
    }

    public function getCreationDate(): ?\DateTimeInterface
    {
        return $this->creationDate;
    }

    public function setCreationDate(\DateTimeInterface $creationDate): self
    {
        $this->creationDate = $creationDate;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }

    public function getAdress(): ?string
    {
        return $this->adress;
    }

    public function setAdress(string $adress): self
    {
        $this->adress = $adress;

        return $this;
    }

    public function getMaxParticipants(): ?int
    {
        return $this->maxParticipants;
    }

    public function setMaxParticipants(int $maxParticipants): self
    {
        $this->maxParticipants = $maxParticipants;

        return $this;
    }

    public function isRequiredValidation(): ?bool
    {
        return $this->requiredValidation;
    }

    public function setRequiredValidation(bool $requiredValidation): self
    {
        $this->requiredValidation = $requiredValidation;

        return $this;
    }

    public function getTypeEventFk(): ?TypeEvent
    {
        return $this->typeEventFk;
    }

    public function setTypeEventFk(?TypeEvent $typeEventFk): self
    {
        $this->typeEventFk = $typeEventFk;

        return $this;
    }

    public function getStoryFk(): ?Story
    {
        return $this->storyFk;
    }

    public function setStoryFk(?Story $storyFk): self
    {
        $this->storyFk = $storyFk;

        return $this;
    }

    public function getCityFk(): ?City
    {
        return $this->cityFk;
    }

    public function setCityFk(?City $cityFk): self
    {
        $this->cityFk = $cityFk;

        return $this;
    }

    /**
     * @return Collection<int, GroupMessaging>
     */
    public function getGroupMessagings(): Collection
    {
        return $this->groupMessagings;
    }

    public function addGroupMessaging(GroupMessaging $groupMessaging): self
    {
        if (!$this->groupMessagings->contains($groupMessaging)) {
            $this->groupMessagings->add($groupMessaging);
            $groupMessaging->setEventRecipientFk($this);
        }

        return $this;
    }

    public function removeGroupMessaging(GroupMessaging $groupMessaging): self
    {
        if ($this->groupMessagings->removeElement($groupMessaging)) {
            // set the owning side to null (unless already changed)
            if ($groupMessaging->getEventRecipientFk() === $this) {
                $groupMessaging->setEventRecipientFk(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, UserEvent>
     */
    public function getUserEventFk(): Collection
    {
        return $this->userEventFk;
    }

    public function addUserEventFk(UserEvent $userEventFk): self
    {
        if (!$this->userEventFk->contains($userEventFk)) {
            $this->userEventFk->add($userEventFk);
            $userEventFk->setEvent($this);
        }

        return $this;
    }

    public function removeUserEventFk(UserEvent $userEventFk): self
    {
        if ($this->userEventFk->removeElement($userEventFk)) {
            // set the owning side to null (unless already changed)
            if ($userEventFk->getEvent() === $this) {
                $userEventFk->setEvent(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Tag>
     */
    public function getEventTagFk(): Collection
    {
        return $this->eventTagFk;
    }

    public function addEventTagFk(Tag $eventTagFk): self
    {
        if (!$this->eventTagFk->contains($eventTagFk)) {
            $this->eventTagFk->add($eventTagFk);
        }

        return $this;
    }

    public function removeEventTagFk(Tag $eventTagFk): self
    {
        $this->eventTagFk->removeElement($eventTagFk);

        return $this;
    }
}
