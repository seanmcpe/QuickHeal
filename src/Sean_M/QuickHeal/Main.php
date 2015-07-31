<?php
namespace Sean_M\QuickHeal;

use pocketmine\Server;
use pocketmine\plugin\PluginBase;
use pocketmine\event\Listener;
use pocketmine\Player;
use pocketmine\event\player\PlayerDeathEvent;
use pocketmine\utils\TextFormat;

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
        $config = $this->getConfig();
        $p = $event->getPlayer();
        $i = $config->get("id");
        $ph = $p->getHealth();
        $h = $config->get("health");
        $sh = $ph + $h;
          if($i == "282" and $ph !== 20){
// Thank you, xFlare, for helping me with the next four lines!
            $id = 282;
            $d = 0;
            $c = 1;
            $ms = Item::get($id, $d, $c);
            $p->setHealth($sh);
            $p->getInventory()->removeItem($ms);
            $id = 281;
            $d = 0;
            $c = 1;
            $b = Item::get($id, $d, $c);
            $p->getInventory()->addItem($b);
               if($i == "459" and $ph !== 20){
                 $id = 459;
                 $d = 0;
                 $c = 1;
                 $bs = Item::get($id, $d, $c);
                 $p->setHealth($sh);
                 $p->getInventory()->removeItem($bs);
                 $id = 281;
                 $d = 0;
                 $c = 1;
                 $b = Item::get($id, $d, $c);
                 $p->getInventory()->addItem($b);
          }else{
// Add later.
         }
      }
   }
}  
