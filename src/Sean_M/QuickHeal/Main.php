<?php
namespace Sean_M\QuickHeal;

use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\Player;
use pocketmine\event\player\PlayerInteractEvent;

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
        $setHp = $playerHp + $health;
          if($playerHp <= $player->getMaxHealth()) {
             $damage = 0;
             $count = 1;
             $removeItem = Item::get($item, $damage, $count);
                $player->setHealth($setHp);
                $player->getInventory()->removeItem($removeItem);
          } 
     }
}  
