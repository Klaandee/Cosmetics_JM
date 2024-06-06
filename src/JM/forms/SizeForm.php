<?php

namespace JM\forms;

use FormAPI\CustomForm;
use FormAPI\SimpleForm;
use JM\Cosmetics;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat;

class SizeForm
{
    public function openSizeForm(Player $player)
    {
        $form = new SimpleForm(function (Player $player, ?int $data = null) {
            if ($data === null) {
                return true;
            }
            if (!$player->hasPermission('cosmetics.size')) {
                $player->sendMessage(TextFormat::colorize(Cosmetics::getInstance()->prefix . '&c You dont have permissions for use this'));
                return true;
            }
            switch ($data) {
                case 0:
                    $player->setScale(1);
                    $player->sendMessage(TextFormat::colorize(Cosmetics::getInstance()->prefix . "&a your size has re-established"));
                    break;
                case 1:
                    $player->setScale(2);
                    $player->sendMessage(TextFormat::colorize(Cosmetics::getInstance()->prefix . "&a your size has changed to &l&5Big"));
                    break;
                case 2:
                    $player->setScale(0.5);
                    $player->sendMessage(TextFormat::colorize(Cosmetics::getInstance()->prefix . "&a your size has changed to &l&5Small"));
                    break;
                case 3:
                    $this->customSize($player);
                    break;
            }
        });
        $form->setTitle(TextFormat::colorize('&l&a* &1Change &5Size &a*&r'));
        $form->addButton("§l§4Restore§r", 0, "textures/blocks/barrier");
        $form->addButton("§l§aBig§r", 0, "textures/ui/dressing_room_animation");
        $form->addButton("§l§cSmall§r", 0, "textures/ui/dressing_room_animation");
        $form->addButton("§l§5Custom Size§r", 0, "textures/items/shulker_shell");
        $form->sendToPlayer($player);
        return $form;
    }
    public function customSize(Player $player)
    {
        $form = new CustomForm(function (Player $player, array $data = null) {
            if ($data === null) {
                return true;
            }
            $result = $data[0];
            $player->setScale($result);
            $player->sendMessage(TextFormat::colorize(Cosmetics::getInstance()->prefix . "&a your size has changed to &l&5$result"));
        });
        $form->setTitle(TextFormat::colorize("&l&a* &6Custom &dSize &a*&r"));
        $form->addSlider('§l§6Size§r', 1, 4);
        $form->sendToPlayer($player);
        return $form;
    }
}
