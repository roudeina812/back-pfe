<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PersonRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass : PersonRepository::class)]
#[ApiResource]
class Person
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\Column(length: 255)]
    private ?string $firstname;

    #[ORM\Column(length: 255)]
    private ?string $lastname;

    #[ORM\Column(length: 255)]
    private ?string $email;

    #[ORM\Column(length: 255)]
    private ?string $password;

    #[ORM\Column(type: Types::BLOB , nullable: true)]
    private $photo = null;

    #[ORM\Column(length: 255)]
    private ?string $profession;

    #[ORM\Column(length: 255)]
    private ?string $team;

    #[ORM\Column(length: 255)]
    private ?string $interest;

    #[ORM\ManyToMany(targetEntity: Article::class, inversedBy: 'authors')]
    private Collection $article;

    #[ORM\ManyToMany(targetEntity: Autorisation::class, mappedBy: 'numauto')]
    private Collection $autorisations;

    /**
     * @param string|null $firstname
     * @param string|null $lastname
     * @param string|null $email
     * @param string|null $password
     * @param string|null $profession
     * @param string|null $team
     * @param string|null $interest
     */
    public function __construct(?string $firstname, ?string $lastname, ?string $email, ?string $password, ?string $profession, ?string $team, ?string $interest)
    {
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->email = $email;
        $this->password = $password;
        $this->profession = $profession;
        $this->team = $team;
        $this->interest = $interest;
    }


    /**
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @param int|null $id
     */
    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    /**
     * @return string|null
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * @param string|null $firstname
     */
    public function setFirstname(?string $firstname): void
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string|null
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * @param string|null $lastname
     */
    public function setLastname(?string $lastname): void
    {
        $this->lastname = $lastname;
    }

    /**
     * @return string|null
     */
    public function getEmail(): ?string
    {
        return $this->email;
    }

    /**
     * @param string|null $email
     */
    public function setEmail(?string $email): void
    {
        $this->email = $email;
    }

    /**
     * @return string|null
     */
    public function getPassword(): ?string
    {
        return $this->password;
    }

    /**
     * @param string|null $password
     */
    public function setPassword(?string $password): void
    {
        $this->password = $password;
    }

    /**
     * @return string|null
     */
    public function getProfession(): ?string
    {
        return $this->profession;
    }

    /**
     * @param string|null $profession
     */
    public function setProfession(?string $profession): void
    {
        $this->profession = $profession;
    }

    /**
     * @return string|null
     */
    public function getTeam(): ?string
    {
        return $this->team;
    }

    /**
     * @param string|null $team
     */
    public function setTeam(?string $team): void
    {
        $this->team = $team;
    }

    /**
     * @return string|null
     */
    public function getInterest(): ?string
    {
        return $this->interest;
    }

    /**
     * @param string|null $interest
     */
    public function setInterest(?string $interest): void
    {
        $this->interest = $interest;
    }


}