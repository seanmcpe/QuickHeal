<?php
namespace Sean_M\QuickHeal;

use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\Player;
use pocketmine\event\player\PlayerInteractEvent;
use pocketmine\network\protocol\SetHealthPacket;

class Main extends PluginBase implements Listener {

    public $config;

    public function onLoad() {
        $this->getLogger()->info(TextFormat::GREEN . "Loading QuickHeal by Sean_M...");
    }

     public function onEnable() {
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->saveDefaultConfig();
        $this->config = $this->getConfig()->getAll();
        $this->getLogger()->info(TextFormat::GREEN . "QuickHeal by Sean_M enabled!");
     }

     public function onDisable() {
        $this->getLogger()->info(TextFormat::RED . "QuickHeal by Sean_M disabled!");
     }

     public function onInteract(PlayerInteractEvent $event) {
// Proper item naming and enchantments will be in QuickHeal v1.5.0 — coming once PocketMine implements naming & enchantments.
        $config = $this->getConfig();
        $player = $event->getPlayer();
        $item = $config->get("id");
        $playerHp = $player->getHealth();
        $health = $config->get("health");
        $healthPk = new SetHealthPacket();
        $setHp->health = $playerHp + $health;
          if($playerHp <= $player->getMaxHealth()) {
             $damage = 0;
             $count = 1;
             $removeItem = Item::get($item, $damage, $count);
                $player->dataPacket($setHp);
                $player->getInventory()->removeItem($removeItem);
          } 
     }
}  
