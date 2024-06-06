<?php

namespace JM\commands;

use JM\Cosmetics;
use JM\utils\CosmeticEntity;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat;

class SpawnCommand extends Command {
    public function __construct() {
        parent::__construct('npc', '§6spawn npc cosmetics');
        $this->setPermission('cosmetics.spawn');
    }
    public function execute(CommandSender $sender, string $commandLabel, array $args): void {
        if (!$sender instanceof Player) {
            $sender->sendMessage('You cannot use this command from the console');
            return;
        }
        if (!$sender->hasPermission('cosmetics.spawn')) {
            $sender->sendMessage(TextFormat::colorize(Cosmetics::getInstance()->prefix . '&c You do not have permission to use this command'));
            return;
        }
        if (empty($args)) {
            $sender->sendMessage(TextFormat::colorize(Cosmetics::getInstance()->prefix . '&c Usage: /npc spawn'));
            return;
        }
        if (isset($args[0]) && $args[0] === "spawn") {
            $entity = CosmeticEntity::create($sender);
            $entity->setNameTag(Cosmetics::getInstance()->getConfig()->getNested('npc-name'));
            $entity->setNameTagAlwaysVisible(true);
            $entity->setNameTagVisible(true);
            $entity->spawnToAll();

            $sender->sendMessage(TextFormat::colorize(Cosmetics::getInstance()->prefix . '&a The NPC just spawned successfully'));
        } else {
            $sender->sendMessage(TextFormat::colorize(Cosmetics::getInstance()->prefix . '&c An error just occurred'));
        }
    }
}