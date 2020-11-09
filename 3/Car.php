<?php
require_once 'LightableInterface.php';
require_once 'Vehicle.php';

class Car extends Vehicle implements LightableInterface
{
    /**
     * @var string
     */
    private $energy;

    /**
     * @var int
     */
    private $energyLevel;

    private bool $hasParkBrake = true;

    /**
     * @return bool
     */
    public function isHasParkBrake(): bool
    {
        return $this->hasParkBrake;
    }

    /**
     * @param bool $hasParkBrake
     */
    public function setHasParkBrake(bool $hasParkBrake): void
    {
        $this->hasParkBrake = $hasParkBrake;
    }


    const ALLOWED_ENERGIES = [
        'fuel',
        'electric',
    ];

    public function __construct(string $color, int $nbSeats, string $energy)
    {
        parent::__construct($color, $nbSeats);
        $this->setEnergy($energy);
    }

    public function getEnergy(): string
    {
        return $this->energy;
    }

    public function setEnergy(string $energy): Car
    {
        if (in_array($energy, self::ALLOWED_ENERGIES)) {
            $this->energy = $energy;
        }
        return $this;
    }

    public function getEnergyLevel(): int
    {
        return $this->energyLevel;
    }

    public function setEnergyLevel(int $energyLevel): void
    {
        $this->energyLevel = $energyLevel;
    }
    public function switchOn(): bool
    {
        return true;
    }
    public function switchOff(): bool
    {
        return false;
    }

    public function setParkBrake()
    {

    }

    public function start()
    { if ($this->hasParkBrake === true)
    {
        throw new Exception("Frein à main actif");
    }
        return 'La voiture avance';
    }
}
