<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\PartnersRepository;
use App\Repository\PersonRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass : PartnersRepository::class)]
#[ApiResource]
class Partners
{

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id ;

    #[ORM\Column(length: 255)]
    private ?string $name ;

    #[ORM\Column(length: 255)]
    private ?string $type ;

    #[ORM\Column(length: 255)]
    private ?string $description ;

    #[ORM\Column(length: 255)]
    private ?string $urlpage ;

    #[ORM\Column(type: Types::BLOB , nullable: true) ]
    private $photo = null;

    /**
     * @param string|null $name
     * @param string|null $type
     * @param string|null $description
     * @param string|null $urlpage
     */
    public function __construct(?string $name, ?string $type, ?string $description, ?string $urlpage)
    {
        $this->name = $name;
        $this->type = $type;
        $this->description = $description;
        $this->urlpage = $urlpage;
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
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * @param string|null $name
     */
    public function setName(?string $name): void
    {
        $this->name = $name;
    }

    /**
     * @return string|null
     */
    public function getType(): ?string
    {
        return $this->type;
    }

    /**
     * @param string|null $type
     */
    public function setType(?string $type): void
    {
        $this->type = $type;
    }

    /**
     * @return string|null
     */
    public function getDescription(): ?string
    {
        return $this->description;
    }

    /**
     * @param string|null $description
     */
    public function setDescription(?string $description): void
    {
        $this->description = $description;
    }

    /**
     * @return string|null
     */
    public function getUrlpage(): ?string
    {
        return $this->urlpage;
    }

    /**
     * @param string|null $urlpage
     */
    public function setUrlpage(?string $urlpage): void
    {
        $this->urlpage = $urlpage;
    }



}