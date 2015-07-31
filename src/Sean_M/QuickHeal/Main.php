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
          if($i == "282" or $i == "459"){
          if($ph !== 20){
        

     }
}
