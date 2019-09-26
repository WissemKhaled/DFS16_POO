<?php

class Character implements CombatZone
{
    protected $name;
    public $health;
    protected $mana;
    protected $weapon;
    protected $damageWeapon;
    protected $lvl;
    protected $job;
    public $damage;

    const LOW_HEALTH = 10;
    const MEDIUM_HEALTH = 200;
    const HIGH_HEALTH = 300000;

    //Attributs statiques
    private static $message = "Je suis un texte d'un attribut static";

    // Hydratation
    /*public function hydrate(array $donnees)
    {
        if (isset($donnees['name']))
        {
            $this->setName($donnees['name']);
        }
        if (isset($donnees['health']))
        {
            $this->setHealth($donnees['health']);
        }
        if (isset($donnees['mana']))
        {
            $this->setMana($donnees['mana']);
        }
        if (isset($donnees['weapon']))
        {
            $this->setWeapon($donnees['weapon']);
        }
        if (isset($donnees['lvl']))
        {
            $this->setLvl($donnees['lvl']);
        }
        if (isset($donnees['job']))
        {
            $this->setJob($donnees['job']);
        }
        if (isset($donnees['damage']))
        {
            $this->setDamage($donnees['damage']);
        }
    }*/


	public function getName(): ?string {
		return $this->name;
	}

	public function setName( $name) {
        $this->name = $name;  
	}

	public function getMana(): ?int {
		return $this->mana;
	}

	public function setMana( $mana) {
		$this->mana = $mana;
	}

	public function getHealth(): ?int {
		return $this->health;
	}

	public function setHealth( $health) {

        $this->health = $health;

		
	}

	public function getWeapon(): ?string {
		return $this->weapon;
    }


	public function setWeapon( $weapon) {
		$this->weapon = $weapon;
	}

    public function getDamageWeapon(): ?int {
		return $this->damageWeapon;
    }

	public function setDamageWeapon( $damageWeapon) {
		$this->damageWeapon = $damageWeapon;
    }
    
	public function getLvl(): ?int {
		return $this->lvl;
	}

	public function setLvl( $lvl) {
		$this->lvl = $lvl;
	}

    public function getJob(): ?string {
		return $this->job;
	}

	public function setJob($job) {
		$this->job = $job;
    }
    
    public function getDamage(): ?int {
		return $this->damage;
	}

	public function setDamage($damage) {
		$this->damage = $damage;
	}
    public function __construct(string $name, int $mana, int $health, string $weapon, int $damageWeapon, int $lvl, string $job, int $damage)
    {
        $this->setName($name);
        $this->setMana($mana);
        $this->setHealth($health);
        $this->setWeapon($weapon);
        $this->setDamageWeapon($damageWeapon);
        $this->setLvl($lvl);
        $this->setJob($job);
        $this->setDamage($damage);
    }

    // Methode statiques

    public static function dead($idChara)
    {
        $dbhost = "localhost";
        $dbname = "pooCharacters";
        $dbusername = "root";
        $dbpassword = "0000";
        $link = new PDO("mysql:host=$dbhost;dbname=$dbname", $dbusername, $dbpassword);
    
        $requeteDelete = $link->prepare("DELETE FROM Characters WHERE idChara = $idChara ");
        
        $requeteDelete->execute();
        
    }

    // Methode non statiques
    public function combat( $combattant)
    {   
            $this->setDamage($this->getDamageWeapon());
            $combattant->health -= $this->getDamage();
            
    }
}


