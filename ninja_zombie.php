<?php
interface Fighter
{
	public function __construct();

	public function toPunch($enemy);

	public function toKick($enemy);

	public function setName($name);

	public function getName();

	public function takingDamage($enemyAttack);
	
}
/**
* 
*/
class Ninja implements Fighter
{
	private $life;
	private $toPunch;
	private $toKick;
	private $name;
	private $katana;

	public function __construct()
	{
		$this->life = 100;
		$this->toPunch = 1;
		$this->toKick = 2;
		$this->katana = 5;
	}

	public function setName($name){
		if(is_string($name)){
			$this->name = $name;
		}
	}

	public function getName(){
		return $this->name;
	}

	public function getLife(){
		if ($this->life <=0) {
			return  $this->name.' lost, that life is below '. $this->life;
		}
		return $this->life;
	}

	public function toPunch($enemy){
		return $enemy->takingDamage($this->toPunch);
	}

	public function toKick($enemy){
		return $enemy->takingDamage($this->toKick);
	}

	public function katana($enemy){
		return $enemy->takingDamage($this->katana);
	}


	public function takingDamage($enemyAttack){
		$this->life = $this->life-$enemyAttack;
		getLife();
		
	}
	

}

class Zombie implements Fighter
{
	private $life;
	private $toPunch;
	private $toKick;
	private $name;
	private $castingSpell;

	public function __construct()
	{
		$this->life = 100;
		$this->toPunch = 1;
		$this->toKick = 2;

		$this->castingSpell = 0;
	}

	public function castingSpell(){
		if($this->castingSpell == 0){
			$this->castingSpell =+ 1;
			$message = 'The Magic spell is activate for the next attack';

		} elseif($this->castingSpell <= 1)
		{
			$this->castingSpell = 2;

			$message = 'This spell was already use';
		}
	}

	public function getLife(){
		if ($this->life <=0) {
			return  $this->name.' loose';
		}
		return $this->life;
	}

	public function toPunch($enemy){
		if($this->castingSpell == 1){
			$toPunchBoost = $this->toPunch*3;
			return $enemy->takingDamage($toPunchBoost);
		}
		return $enemy->takingDamage($this->toPunch);
	}

	public function toKick($enemy){
		if($this->castingSpell == 1){
			$toKickBoost = $this->toKick*3;
			return $enemy->takingDamage($toKickBoost);
		}
		return $enemy->takingDamage($this->toKick);
	}

	public function setName($name){
		if(is_string($name)){
			$this->name = $name;
		}
	}

	public function getName(){
		return $this->name;
	}


	public function takingDamage($enemyAttack){
		$this->life = $this->life-$enemyAttack;
		return $this->life;
		
	}
}


$fighter_1 = new Ninja();
$fighter_1->setName('MIMJAAA');
$fighter_2 = new Zombie();
$fighter_2->setName('Gneeeeee');

var_dump($fighter_1->getName());
var_dump($fighter_2->getName());

$fighter_1->katana($fighter_2);
var_dump($fighter_2->getLife());

$fighter_2->toKick($fighter_1);
var_dump($fighter_1->getLife());

$fighter_1->toPunch($fighter_2);
var_dump($fighter_2->getLife());

$fighter_2->castingSpell($fighter_1);
var_dump($fighter_1->getLife());

$fighter_2->toKick($fighter_1);
var_dump($fighter_1->getLife());

