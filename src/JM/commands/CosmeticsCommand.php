<?php

namespace JM\commands;

use JM\Cosmetics;
use pocketmine\command\Command;
use pocketmine\command\CommandSender;
use pocketmine\utils\TextFormat;
use pocketmine\player\Player;

class CosmeticsCommand extends Command {
    public function __construct() {
        parent::__construct('cosmetics', '§6open cosmetics menu');
        $this->setPermission('cosmetics.open');        
    }
    public function execute(CommandSender $sender, string $commandLabel, array $args): void {
        if (!$sender instanceof Player) {
            $sender->sendMessage('You cannot use this command from the console');
            return;
        }
        if (!$sender->hasPermission('cosmetics.open')) {
            $sender->sendMessage(TextFormat::colorize(Cosmetics::getInstance()->prefix . '&c You do not have permission to use this command'));
            return;
        }
        if (empty($args)) {
            Cosmetics::getInstance()->getMenuForm()->openMenuForm($sender);
            return;
        }
        if (isset($args[0]) && $args[0] === "plugin") {
            $sender->sendMessage(TextFormat::colorize('&8Name:&7 Cosmetics_JM' . PHP_EOL . '&8Author:&7 JM' . PHP_EOL . '&8API:&7 5.0.0' . PHP_EOL . '&8Version:&7 2.5' . PHP_EOL . '&8Github:&7 https://github.com/Klaandee'));
            return;
        }
    }
}