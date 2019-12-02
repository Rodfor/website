<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\PriceGuideRepository")
 */
class PriceGuide
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="float")
     */
    private $sell; //average sell price

    /**
     * @ORM\Column(type="float")
     */
    private $low; //lowest listed price

    /**
     * @ORM\Column(type="float")
     */
    private $lowex; //lowest price ex+ quality

    /**
     * @ORM\Column(type="float")
     */
    private $lowfoil; //lowest foil price

    /**
     * @ORM\Column(type="float")
     */
    private $avg; //average listed price

    /**
     * @ORM\Column(type="float")
     */
    private $trend; 

    /**
     * @ORM\Column(type="float")
     */
    private $trendfoil;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getSell(): ?float
    {
        return $this->sell;
    }

    public function setSell(float $sell): self
    {
        $this->sell = $sell;

        return $this;
    }

    public function getLow(): ?float
    {
        return $this->low;
    }

    public function setLow(float $low): self
    {
        $this->low = $low;

        return $this;
    }

    public function getLowex(): ?float
    {
        return $this->lowex;
    }

    public function setLowex(float $lowex): self
    {
        $this->lowex = $lowex;

        return $this;
    }

    public function getLowfoil(): ?float
    {
        return $this->lowfoil;
    }

    public function setLowfoil(float $lowfoil): self
    {
        $this->lowfoil = $lowfoil;

        return $this;
    }

    public function getAvg(): ?float
    {
        return $this->avg;
    }

    public function setAvg(float $avg): self
    {
        $this->avg = $avg;

        return $this;
    }

    public function getTrend(): ?float
    {
        return $this->trend;
    }

    public function setTrend(float $trend): self
    {
        $this->trend = $trend;

        return $this;
    }

    public function getTrendfoil(): ?float
    {
        return $this->trendfoil;
    }

    public function setTrendfoil(float $trendfoil): self
    {
        $this->trendfoil = $trendfoil;

        return $this;
    }
}
