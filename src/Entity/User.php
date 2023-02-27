<?php

namespace App\Entity;

use App\Repository\UserRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Security\Core\User\PasswordAuthenticatedUserInterface;
use Symfony\Component\Security\Core\User\UserInterface;

#[ORM\Entity(repositoryClass: UserRepository::class)]
#[ORM\Table(name: '`user`')]
class User implements UserInterface, PasswordAuthenticatedUserInterface
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 180, unique: true)]
    private ?string $email = null;

    #[ORM\Column]
    private array $roles = [];

    /**
     * @var string The hashed password
     */
    #[ORM\Column]
    private ?string $password = null;

    #[ORM\Column(length: 255)]
    private ?string $pseudo = null;

    #[ORM\Column]
    private ?int $age = null;

    #[ORM\Column(length: 255)]
    private ?string $bio = null;

    #[ORM\Column(length: 255)]
    private ?string $slogan = null;

    #[ORM\Column(length: 255)]
    private ?string $photo = null;

    #[ORM\Column(length: 255)]
    private ?string $tel = null;

    #[ORM\Column]
    private ?bool $onlineStatus = null;

    #[ORM\Column]
    private ?bool $proStatus = null;

    #[ORM\Column]
    private ?int $level = null;

    #[ORM\Column(length: 255)]
    private ?string $returnApiValue = null;

    #[ORM\OneToMany(mappedBy: 'userSenderFk', targetEntity: Blocklist::class)]
    private Collection $blocklists;

    #[ORM\OneToMany(mappedBy: 'userSenderFk', targetEntity: Follow::class)]
    private Collection $follows;

    #[ORM\OneToMany(mappedBy: 'userSenderFk', targetEntity: GroupMessaging::class)]
    private Collection $groupMessagings;

    #[ORM\OneToMany(mappedBy: 'userSenderFk', targetEntity: PrivateMessage::class)]
    private Collection $privateMessages;

    #[ORM\ManyToOne(inversedBy: 'users')]
    #[ORM\JoinColumn(nullable: false)]
    private ?City $userCityFk = null;

    #[ORM\OneToOne(inversedBy: 'userRef', cascade: ['persist', 'remove'])]
    #[ORM\JoinColumn(nullable: false)]
    private ?UserSettings $userSettingsFk = null;

    #[ORM\ManyToMany(targetEntity: Tag::class, inversedBy: 'users')]
    private Collection $userTagFk;

    #[ORM\ManyToMany(targetEntity: UserNotification::class, inversedBy: 'users')]
    private Collection $userNotificationFk;

    #[ORM\ManyToMany(targetEntity: Reward::class, inversedBy: 'users')]
    private Collection $userRewardFk;

    #[ORM\OneToMany(mappedBy: 'userFk', targetEntity: UserEvent::class)]
    private Collection $userEvents;


    public function __construct()
    {
        $this->blocklists = new ArrayCollection();
        $this->follows = new ArrayCollection();
        $this->groupMessagings = new ArrayCollection();
        $this->privateMessages = new ArrayCollection();
        $this->userTagFk = new ArrayCollection();
        $this->userNotificationFk = new ArrayCollection();
        $this->userRewardFk = new ArrayCollection();
        $this->userEvents = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    /**
     * A visual identifier that represents this user.
     *
     * @see UserInterface
     */
    public function getUserIdentifier(): string
    {
        return (string) $this->email;
    }

    /**
     * @see UserInterface
     */
    public function getRoles(): array
    {
        $roles = $this->roles;
        // guarantee every user at least has ROLE_USER
        $roles[] = 'ROLE_USER';

        return array_unique($roles);
    }

    public function setRoles(array $roles): self
    {
        $this->roles = $roles;

        return $this;
    }

    /**
     * @see PasswordAuthenticatedUserInterface
     */
    public function getPassword(): string
    {
        return $this->password;
    }

    public function setPassword(string $password): self
    {
        $this->password = $password;

        return $this;
    }

    /**
     * @see UserInterface
     */
    public function eraseCredentials()
    {
        // If you store any temporary, sensitive data on the user, clear it here
        // $this->plainPassword = null;
    }

    /**
     * @return Collection<int, Blocklist>
     */
    public function getBlocklists(): Collection
    {
        return $this->blocklists;
    }

    public function addBlocklist(Blocklist $blocklist): self
    {
        if (!$this->blocklists->contains($blocklist)) {
            $this->blocklists->add($blocklist);
            $blocklist->setUserSenderFk($this);
        }

        return $this;
    }

    public function removeBlocklist(Blocklist $blocklist): self
    {
        if ($this->blocklists->removeElement($blocklist)) {
            // set the owning side to null (unless already changed)
            if ($blocklist->getUserSenderFk() === $this) {
                $blocklist->setUserSenderFk(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, Follow>
     */
    public function getFollows(): Collection
    {
        return $this->follows;
    }

    public function addFollow(Follow $follow): self
    {
        if (!$this->follows->contains($follow)) {
            $this->follows->add($follow);
            $follow->setUserSenderFk($this);
        }

        return $this;
    }

    public function removeFollow(Follow $follow): self
    {
        if ($this->follows->removeElement($follow)) {
            // set the owning side to null (unless already changed)
            if ($follow->getUserSenderFk() === $this) {
                $follow->setUserSenderFk(null);
            }
        }

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
            $groupMessaging->setUserSenderFk($this);
        }

        return $this;
    }

    public function removeGroupMessaging(GroupMessaging $groupMessaging): self
    {
        if ($this->groupMessagings->removeElement($groupMessaging)) {
            // set the owning side to null (unless already changed)
            if ($groupMessaging->getUserSenderFk() === $this) {
                $groupMessaging->setUserSenderFk(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, PrivateMessage>
     */
    public function getPrivateMessages(): Collection
    {
        return $this->privateMessages;
    }

    public function addPrivateMessage(PrivateMessage $privateMessage): self
    {
        if (!$this->privateMessages->contains($privateMessage)) {
            $this->privateMessages->add($privateMessage);
            $privateMessage->setUserSenderFk($this);
        }

        return $this;
    }

    public function removePrivateMessage(PrivateMessage $privateMessage): self
    {
        if ($this->privateMessages->removeElement($privateMessage)) {
            // set the owning side to null (unless already changed)
            if ($privateMessage->getUserSenderFk() === $this) {
                $privateMessage->setUserSenderFk(null);
            }
        }

        return $this;
    }

    public function getUserCityFk(): ?City
    {
        return $this->userCityFk;
    }

    public function setUserCityFk(?City $userCityFk): self
    {
        $this->userCityFk = $userCityFk;

        return $this;
    }

    public function getUserSettingsFk(): ?UserSettings
    {
        return $this->userSettingsFk;
    }

    public function setUserSettingsFk(UserSettings $userSettingsFk): self
    {
        $this->userSettingsFk = $userSettingsFk;

        return $this;
    }

    /**
     * @return Collection<int, Tag>
     */
    public function getUserTagFk(): Collection
    {
        return $this->userTagFk;
    }

    public function addUserTagFk(Tag $userTagFk): self
    {
        if (!$this->userTagFk->contains($userTagFk)) {
            $this->userTagFk->add($userTagFk);
        }

        return $this;
    }

    public function removeUserTagFk(Tag $userTagFk): self
    {
        $this->userTagFk->removeElement($userTagFk);

        return $this;
    }

    /**
     * @return Collection<int, UserNotification>
     */
    public function getUserNotificationFk(): Collection
    {
        return $this->userNotificationFk;
    }

    public function addUserNotificationFk(UserNotification $userNotificationFk): self
    {
        if (!$this->userNotificationFk->contains($userNotificationFk)) {
            $this->userNotificationFk->add($userNotificationFk);
        }

        return $this;
    }

    public function removeUserNotificationFk(UserNotification $userNotificationFk): self
    {
        $this->userNotificationFk->removeElement($userNotificationFk);

        return $this;
    }

    /**
     * @return Collection<int, Reward>
     */
    public function getUserRewardFk(): Collection
    {
        return $this->userRewardFk;
    }

    public function addUserRewardFk(Reward $userRewardFk): self
    {
        if (!$this->userRewardFk->contains($userRewardFk)) {
            $this->userRewardFk->add($userRewardFk);
        }

        return $this;
    }

    public function removeUserRewardFk(Reward $userRewardFk): self
    {
        $this->userRewardFk->removeElement($userRewardFk);

        return $this;
    }

    /**
     * @return Collection<int, UserEvent>
     */
    public function getUserEvents(): Collection
    {
        return $this->userEvents;
    }

    public function addUserEvent(UserEvent $userEvent): self
    {
        if (!$this->userEvents->contains($userEvent)) {
            $this->userEvents->add($userEvent);
            $userEvent->setUserFk($this);
        }

        return $this;
    }

    public function removeUserEvent(UserEvent $userEvent): self
    {
        if ($this->userEvents->removeElement($userEvent)) {
            // set the owning side to null (unless already changed)
            if ($userEvent->getUserFk() === $this) {
                $userEvent->setUserFk(null);
            }
        }

        return $this;
    }

    public function getPseudo(): ?string
    {
        return $this->pseudo;
    }

    public function setPseudo(string $pseudo): self
    {
        $this->pseudo = $pseudo;

        return $this;
    }

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getBio(): ?string
    {
        return $this->bio;
    }

    public function setBio(string $bio): self
    {
        $this->bio = $bio;

        return $this;
    }

    public function getSlogan(): ?string
    {
        return $this->slogan;
    }

    public function setSlogan(string $slogan): self
    {
        $this->slogan = $slogan;

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

    public function getTel(): ?string
    {
        return $this->tel;
    }

    public function setTel(string $tel): self
    {
        $this->tel = $tel;

        return $this;
    }

    public function isOnlineStatus(): ?bool
    {
        return $this->onlineStatus;
    }

    public function setOnlineStatus(bool $onlineStatus): self
    {
        $this->onlineStatus = $onlineStatus;

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

    public function getLevel(): ?int
    {
        return $this->level;
    }

    public function setLevel(int $level): self
    {
        $this->level = $level;

        return $this;
    }

    public function getReturnApiValue(): ?string
    {
        return $this->returnApiValue;
    }

    public function setReturnApiValue(string $returnApiValue): self
    {
        $this->returnApiValue = $returnApiValue;

        return $this;
    }
}
