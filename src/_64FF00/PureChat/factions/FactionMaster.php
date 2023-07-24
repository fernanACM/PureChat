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
use ShockedPlot7560\FactionMaster\API\MainAPI;
use pocketmine\Server;

class FactionMaster implements FactionsInterface{
    
    public function getAPI(): ?Plugin{
        return Server::getInstance()->getPluginManager()->getPlugin("FactionMaster");
    }

    public function getPlayerFaction(Player $player): string{
        $factionName = null;
        $faction = MainAPI::getFactionOfPlayer($player->getName());
        if(!is_null($faction)) $factionName = $faction->getName();
        if($factionName === "" || is_null($factionName)) $factionName = "";
        return $factionName;        
    }

    public function getPlayerRank(Player $player): string{
        $factionRank = null;
        $member = MainAPI::getUser($player->getName());
        if(!is_null($member)) $factionRank = $member->getRank();
        if($factionRank === "" || is_null($factionRank)) $factionRank = "";
        return $factionRank;
    }
}