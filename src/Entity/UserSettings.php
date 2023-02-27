<?php

namespace App\Entity;

use App\Repository\UserSettingsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: UserSettingsRepository::class)]
class UserSettings
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column]
    private ?bool $mailNotif = null;

    #[ORM\Column]
    private ?bool $smsNotif = null;

    #[ORM\Column]
    private ?bool $invisibleStatus = null;

    #[ORM\Column]
    private ?bool $blocklistNotif = null;

    #[ORM\OneToOne(mappedBy: 'userSettingsFk', cascade: ['persist', 'remove'])]
    private ?User $userRef = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function isMailNotif(): ?bool
    {
        return $this->mailNotif;
    }

    public function setMailNotif(bool $mailNotif): self
    {
        $this->mailNotif = $mailNotif;

        return $this;
    }

    public function isSmsNotif(): ?bool
    {
        return $this->smsNotif;
    }

    public function setSmsNotif(bool $smsNotif): self
    {
        $this->smsNotif = $smsNotif;

        return $this;
    }

    public function isInvisibleStatus(): ?bool
    {
        return $this->invisibleStatus;
    }

    public function setInvisibleStatus(bool $invisibleStatus): self
    {
        $this->invisibleStatus = $invisibleStatus;

        return $this;
    }

    public function isBlocklistNotif(): ?bool
    {
        return $this->blocklistNotif;
    }

    public function setBlocklistNotif(bool $blocklistNotif): self
    {
        $this->blocklistNotif = $blocklistNotif;

        return $this;
    }

    public function getUserRef(): ?User
    {
        return $this->userRef;
    }

    public function setUserRef(User $userRef): self
    {
        // set the owning side of the relation if necessary
        if ($userRef->getUserSettingsFk() !== $this) {
            $userRef->setUserSettingsFk($this);
        }

        $this->userRef = $userRef;

        return $this;
    }
}
