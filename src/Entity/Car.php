<?php

namespace App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass="App\Repository\CarRepository")
 */
class Car
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $license_plate;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $veh_id_number;

    /**
     * @ORM\Column(type="string", length=32)
     */
    private $eng�_id_number;

    public function getId()
    {
        return $this->id;
    }

    public function getLicensePlate(): ?string
    {
        return $this->license_plate;
    }

    public function setLicensePlate(string $license_plate): self
    {
        $this->license_plate = $license_plate;

        return $this;
    }

    public function getVehIdNumber(): ?string
    {
        return $this->veh_id_number;
    }

    public function setVehIdNumber(string $veh_id_number): self
    {
        $this->veh_id_number = $veh_id_number;

        return $this;
    }

    public function getEng�IdNumber(): ?string
    {
        return $this->eng�_id_number;
    }

    public function setEng�IdNumber(string $eng�_id_number): self
    {
        $this->eng�_id_number = $eng�_id_number;

        return $this;
    }
}
