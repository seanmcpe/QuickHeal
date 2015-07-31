<?php
namespace Sean_M\QuickHeal;

use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\utils\TextFormat;
use pocketmine\Player;
use pocketmine\event\player\PlayerInteractEvent;

class Main extends PluginBase implements Listener{

    public $config;

    public function onLoad(){
        $this->getLogger()->info(TextFormat::GREEN . "Loading QuickHeal by Sean_M...");
    }

     public function onEnable(){
        $this->getServer()->getPluginManager()->registerEvents($this, $this);
        $this->saveDefaultConfig();
        $this->config = $this->getConfig()->getAll();
        $this->getLogger()->info(TextFormat::GREEN . "QuickHeal by Sean_M enabled!");
     }

     public function onDisable(){
        $this->getLogger()->info(TextFormat::GREEN . "QuickHeal by Sean_M disabled!");
     }

     public function onInteract(PlayerInteractEvent $event){
// Item naming and enchantments will be in QuickHeal v1.5.0 — coming once MCPE v0.12 is publicly released.
        $config = $this->getConfig();
        $player = $event->getPlayer();
        $item = $config->get("id");
        $playerhealth = $player->getHealth();
        $health = $config->get("health");
        $sethealth = $playerhealth + $health;
          if($item == "282" and $playerhealth !== 20){
            $id = 282;
            $damage = 0;
            $count = 1;
            $mstew = Item::get($id, $damage, $count);
            $player->setHealth($sethealth);
            $player->getInventory()->removeItem($mstew);
            $id = 281;
            $damage = 0;
            $count = 1;
            $bowl = Item::get($id, $damage, $count);
            $player->getInventory()->addItem($bowl);
               if($item == "459" and $playerhealth !== 20){
                 $id = 459;
                 $damage = 0;
                 $count = 1;
                 $bstew = Item::get($id, $damage, $count);
                 $player->setHealth($sethealth);
                 $player->getInventory()->removeItem($bstew);
                 $id = 281;
                 $damage = 0;
                 $count = 1;
                 $bowl = Item::get($id, $damage, $count);
                 $player->getInventory()->addItem($bowl);
          }else{
        if($item !== "282" or "459"){
          $damage = 0;
          $count = 1;
          $itemusing = Item::get($item, $damage, $count);
          $player->setHealth($sethealth);  
          $player->getInventory()->removeItem($item);
// Implement custom addItem code in the future.
            }
         } 
      }
   }
}  
