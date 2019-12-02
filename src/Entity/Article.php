<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\ArticleRepository")
 */
class Article
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Product", inversedBy="articles")
     * @ORM\JoinColumn(nullable=false)
     */
    private $product;

    /**
     * @ORM\Column(type="float")
     */
    private $price;

    /**
     * @ORM\Column(type="integer")
     */
    private $count;

    /**
     * @ORM\Column(type="datetime", nullable=true)
     */
    private $lastEdited;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $product_condition;

    /**
     * @ORM\Column(type="boolean")
     */
    private $isFoil;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $links;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getProduct(): ?Product
    {
        return $this->product;
    }

    public function setProduct(?Product $product): self
    {
        $this->product = $product;

        return $this;
    }

    public function getPrice(): ?float
    {
        return $this->price;
    }

    public function setPrice(float $price): self
    {
        $this->price = $price;

        return $this;
    }

    public function getCount(): ?int
    {
        return $this->count;
    }

    public function setCount(int $count): self
    {
        $this->count = $count;

        return $this;
    }

    public function getLastEdited(): ?\DateTimeInterface
    {
        return $this->lastEdited;
    }

    public function setLastEdited(?\DateTimeInterface $lastEdited): self
    {
        $this->lastEdited = $lastEdited;

        return $this;
    }

    public function getProductCondition(): ?string
    {
        return $this->product_condition;
    }

    public function setProductCondition(string $product_condition): self
    {
        $this->product_condition = $product_condition;

        return $this;
    }

    public function getIsFoil(): ?bool
    {
        return $this->isFoil;
    }

    public function setIsFoil(bool $isFoil): self
    {
        $this->isFoil = $isFoil;

        return $this;
    }

    public function getLinks(): ?string
    {
        return $this->links;
    }

    public function setLinks(?string $links): self
    {
        $this->links = $links;

        return $this;
    }
}
