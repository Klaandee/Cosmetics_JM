<?php

namespace JM\commands;

use JM\Cosmetics;
use JM\commands\SpawnCommand;
use JM\commands\CosmeticsCommand;

class Commands {
    public static function register(): void {
        Cosmetics::getInstance()->getServer()->getCommandMap()->register('npc', new SpawnCommand());
        Cosmetics::getInstance()->getServer()->getCommandMap()->register('cosmetics', new CosmeticsCommand());
    }
}