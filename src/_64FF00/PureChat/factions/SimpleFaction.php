<?php
#      _       ____   __  __ 
#     / \     / ___| |  \/  |
#    / _ \   | |     | |\/| |
#   / ___ \  | |___  | |  | |
#  /_/   \_\  \____| |_|  |_|
# The creator of this plugin was fernanACM.
# https://github.com/fernanACM
namespace _64FF00\PureChat\factions;

use pocketmine\player\Player;
use pocketmine\plugin\Plugin;
use pocketmine\utils\Config;
use Ayzrix\SimpleFaction\API\FactionsAPI;
use pocketmine\Server;

class SimpleFaction implements FactionsInterface{
    
    public function getAPI(): ?Plugin{
        return Server::getInstance()->getPluginManager()->getPlugin("SimpleFaction");
    }

    public function getPlayerFaction(Player $player): string{
        $factionName = null;
        $factionName = FactionsAPI::getFaction($player->getName());
        if($factionName === "" || is_null($factionName)) $factionName = "";
        return $factionName;
    }

    public function getPlayerRank(Player $player): string{
        if(FactionsAPI::isInFaction($player->getName()))
        {
            if(FactionsAPI::getRank($player->getName()) === "Leader") {
                return '**';
            }elseif(FactionsAPI::getRank($player->getName()) === "Officer"){
                return '*';
            }else{
                return '';
            }
        }
        return '';
    }
}