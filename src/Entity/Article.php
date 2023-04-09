<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use DateTime;
use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM ;
use Doctrine\DBAL\Types\Types;
use Symfony\Component\Validator\Constraints\Date;

#[ORM\Entity(repositoryClass : ArticleRepository::class)]
#[ApiResource]

class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id;

    #[ORM\Column(length: 255)]
    private ?string $title;

    #[ORM\Column(length: 255 , nullable: true)]
    private ?string $type;

    #[ORM\Column(length: 255)]
    private ?string $journal;

    #[ORM\Column (type: Types::DATE_MUTABLE)]
    private ?\DateTime $date;

    #[ORM\Column]
    private ?int $firstpage;

    #[ORM\Column]
    private ?int $lastpage;

    #[ORM\Column]
    private ?string $editor;

    #[ORM\Column(length: 255)]
    private ?string $description;

    #[ORM\Column(length: 255)]
    private ?string $DOI;

    #[ORM\ManyToMany(targetEntity: Person::class, mappedBy: 'article')]
    private Collection $authors;

    /**
     * @param string|null $title
     * @param string|null $type
     * @param string|null $journal
     * @param DateTime|null $date
     * @param int|null $firstpage
     * @param int|null $lastpage
     * @param string|null $editor
     * @param string|null $description
     * @param string|null $DOI
     */
    public function __construct(?string $title, ?string $type, ?string $journal, ?DateTime $date, ?int $firstpage, ?int $lastpage, ?string $editor, ?string $description, ?string $DOI)
    {
        $this->title = $title;
        $this->type = $type;
        $this->journal = $journal;
        $this->date = $date;
        $this->firstpage = $firstpage;
        $this->lastpage = $lastpage;
        $this->editor = $editor;
        $this->description = $description;
        $this->DOI = $DOI;
    }

    /**
     * @return string|null
     */
    public function getJournal(): ?string
    {
        return $this->journal;
    }

    /**
     * @param string|null $journal
     */
    public function setJournal(?string $journal): void
    {
        $this->journal = $journal;
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
    public function getDOI(): ?string
    {
        return $this->DOI;
    }

    /**
     * @param string|null $DOI
     */
    public function setDOI(?string $DOI): void
    {
        $this->DOI = $DOI;
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
    public function getTitle(): ?string
    {
        return $this->title;
    }

    /**
     * @param string|null $title
     */
    public function setTitle(?string $title): void
    {
        $this->title = $title;
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
     * @return DateTime|null
     */
    public function getDate(): ?DateTime
    {
        return $this->date;
    }

    /**
     * @param DateTime|null $date
     */
    public function setDate(?DateTime $date): void
    {
        $this->date = $date;
    }

    /**
     * @return int|null
     */
    public function getFirstpage(): ?int
    {
        return $this->firstpage;
    }

    /**
     * @param int|null $firstpage
     */
    public function setFirstpage(?int $firstpage): void
    {
        $this->firstpage = $firstpage;
    }

    /**
     * @return int|null
     */
    public function getLastpage(): ?int
    {
        return $this->lastpage;
    }

    /**
     * @param int|null $lastpage
     */
    public function setLastpage(?int $lastpage): void
    {
        $this->lastpage = $lastpage;
    }

    /**
     * @return string|null
     */
    public function getEditor(): ?string
    {
        return $this->editor;
    }

    /**
     * @param string|null $editor
     */
    public function setEditor(?string $editor): void
    {
        $this->editor = $editor;
    }



}