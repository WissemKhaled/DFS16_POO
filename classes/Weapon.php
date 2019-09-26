<?php

class Weapon
{
    private $name;
    private $power;

	public function getName(): ?string {
		return $this->name;
	}

	public function setName( $name) {
		$this->name = $name;
	}

	public function getPower(): ?int {
		return $this->power;
	}

	public function setPower( $power) {
		$this->power = $power;
	}

    public function __construct(string $name, int $power)
    {
        $this->setName($name);
        $this->setPower($power);
    }
     
}