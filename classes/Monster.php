<?php

class Monster implements CombatZone
{
    protected $name;
    public $health;
    public $damage;

	public function getName(): ?string {
		return $this->name;
	}

	public function setName( $name) {
		$this->name = $name;
	}

	public function getHealth(): ?int {
		return $this->health;
	}

	public function setHealth( $health) {
		$this->health = $health;
	}

    public function getDamage(): ?int {
		return $this->damage;
	}

	public function setDamage( $damage) {
		$this->damage = $damage;
    }
    
    public function __construct(string $name, int $health, int $damage)
    {
        $this->setName($name);
        $this->setDamage($damage);
        $this->setHealth($health);
    }

    public static function dead($idMonster)
    {
        $dbhost = "localhost";
        $dbname = "pooCharacters";
        $dbusername = "root";
        $dbpassword = "0000";

        $link = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword);
        $requeteDelete = $link->prepare("DELETE FROM Monster WHERE idMonster = $idMonster ");
        $requeteDelete->execute();
        
    }

    public function combat( $combattant)
    {
            $this->setDamage($this->getDamage() + rand (10 , 12));
            $combattant->health -= $this->getDamage();

    }
}