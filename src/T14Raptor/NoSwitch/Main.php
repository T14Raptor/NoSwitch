<?php

declare(strict_types=1);

namespace T14Raptor\NoSwitch;

use pocketmine\event\entity\EntityDamageEvent;
use pocketmine\event\Listener;
use pocketmine\plugin\PluginBase;

class Main extends PluginBase implements Listener{

	public function onEnable(){
		$this->getServer()->getPluginManager()->registerEvents($this, $this);
	}

	/**
	 * @ignoreCancelled true
	 * @priority HIGH
	 */
	public function onEntityDamage(EntityDamageEvent $ev) : void{
		if($ev->getModifier(EntityDamageEvent::MODIFIER_PREVIOUS_DAMAGE_COOLDOWN) < 0.0){
			$ev->setCancelled();
		}
	}
}