<?php

namespace Disguise\Commands;

use Disguise\main;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\Player;
use pocketmine\utils\TextFormat as T;

class DisguiseCommand extends PluginCommand
{

    private $main;

    public function __construct(main $main)
    {
        parent::__construct("disguise", $main);
        $this->main = $main;
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        $players = $this->main->getServer()->getOnlinePlayers();
        $player = array_rand($players);
        $plamount = count($players);

        if ($player instanceof Player) {
            if ($sender instanceof Player) {
                if ($plamount > 1) {
                    $skin = $player->getSkin();
                    $sender->setSkin($skin);
                    $sender->setDisplayName($player->getName());
                    $sender->sendMessage(T::GREEN . "Disguise Enabled!");
                } else $sender->sendMessage(T::RED . "There is no-one to disguise into");
            }
        }
    }

}