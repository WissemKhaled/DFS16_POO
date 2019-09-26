<?php

class Mage extends Character
{
    protected $spell;

	public function getSpell(): ?string {
		return $this->spell;
	}

	public function setSpell($spell) {
		$this->spell = $spell;
	}
    public function __construct(string $name, int $mana, int $health, object $weapon, int $lvl, string $job, string $spell)
    {
        parent::__construct($name, $mana, $health, $weapon, $lvl, $job);
        $this->setSpell($spell);
    }
}
