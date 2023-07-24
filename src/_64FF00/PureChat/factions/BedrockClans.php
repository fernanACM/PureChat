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
use Wertzui123\BedrockClans\Main;
use Wertzui123\BedrockClans\Clan;
use pocketmine\Server;

class BedrockClans implements FactionsInterface{
    
    public function getAPI(): ?Plugin{
        return Server::getInstance()->getPluginManager()->getPlugin("FactionMaster");
    }

    public function getPlayerFaction(Player $player): string{
        $factionName = null;
        $faction = Main::getInstance()->getPlayer($player)->getClan();
        if(!is_null($faction)) $factionName = $faction->getDisplayName();
        if($factionName === "" || is_null($factionName)) $factionName = "";
        return $factionName;          
    }

    public function getPlayerRank(Player $player): string{
        $factionRank = null;
        $member = Main::getInstance()->getPlayer($player)->getClan();
        if(!is_null($member)) $factionRank = Clan::getRankName($member->getRank($player), true);
        if($factionRank === "" || is_null($factionRank)) $factionRank = "";
        return $factionRank;
    }
}