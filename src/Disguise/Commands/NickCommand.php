<?php

namespace Disguise\Commands;

use Disguise\main;
use pocketmine\command\CommandSender;
use pocketmine\command\PluginCommand;
use pocketmine\Player;
use pocketmine\plugin\Plugin;
use pocketmine\utils\TextFormat as T;

class NickCommand extends PluginCommand
{

    public function __construct(main $main)
    {
        parent::__construct("nick", $main);
        $this->setUsage("Do /nick <name>");
    }

    public function execute(CommandSender $sender, string $commandLabel, array $args)
    {
        if ($sender instanceof Player){
            if (isset($args[1])){
                $sender->setDisplayName($args[1]);
            } else{$sender->sendMessage(T::RED . "Please Specify what you want your nick to be!");}
        }
    }

}