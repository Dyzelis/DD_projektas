<?php
declare(strict_types=1);

namespace App\Entity;

use Acelaya\Doctrine\Type\PhpEnumType;
use App\Entity\OrdersEnum;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass="App\Repository\OrderRepository")
 * @ORM\Table(name="car_order")
 */
class Order
{

    protected const status_created = "created";
    protected const status_in_progress = "in progress";
    protected const status_repaired = "repaired";
    protected const status_canceled = "canceled";
    protected const status_suspended = "suspended";
    protected const status_ready_to_return = "ready to return";
    protected const status_returned = "returned";

    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     * @Assert\NotBlank()
     */
    private $date;

    /**
     * @ORM\Column(type="string", length=32)
     * @Assert\NotBlank()
     */
    private $status;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\User", inversedBy="orders")
     * @ORM\JoinColumn(nullable=false)
     */
    private $user;

    /**
     * @ORM\ManyToOne(targetEntity="App\Entity\Car", inversedBy="orders")
     * @ORM\JoinColumn(nullable=false)
     * @Assert\NotBlank()
     */
    private $car;

    /**
     * @ORM\ManyToMany(targetEntity="App\Entity\Service")
     * @Assert\NotBlank()
     */
    private $services;

    /**
     * @ORM\OneToOne(targetEntity="App\Entity\Cheque", cascade={"persist", "remove"})
     */
    private $cheque;

    public function __construct()
    {
        $this->services = new ArrayCollection();
    }

    public function getId()
    {
        return $this->id;
    }

    public function getStatus()
    {
        return $this->status;
    }

    public function setStatus(string $status)
    {
        $this->status = $status;

        return $this;
    }

    public function getUser(): ?User
    {
        return $this->user;
    }

    public function setUser(?User $user): self
    {
        $this->user = $user;

        return $this;
    }

    public function getCar(): ?Car
    {
        return $this->car;
    }

    public function setCar(?Car $car): self
    {
        $this->car = $car;

        return $this;
    }

    /**
     * @return Collection|Service[]
     */
    public function getServices(): Collection
    {
        return $this->services;
    }

    public function addServices(Service $service): self
    {
        if (!$this->services->contains($service)) {
            $this->services[] = $service;
        }

        return $this;
    }

    public function removeServices(Service $service): self
    {
        if ($this->services->contains($service)) {
            $this->services->removeElement($service);
        }

        return $this;
    }

    public function getCheque(): ?Cheque
    {
        return $this->cheque;
    }

    public function setCheque(?Cheque $cheque): self
    {
        $this->cheque = $cheque;

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
    /*TODO Add function to calculate all price*/
    public function calculate()
    {
        $price = 0;
        foreach ($this->services as $service){
            $price+=$service->getPrice();
        }

        return $price;
    }
}