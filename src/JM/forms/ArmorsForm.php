<?php

namespace JM\forms;

use FormAPI\SimpleForm;
use FormAPI\CustomForm;
use FormAPI\ModalForm;
use FormAPI\Form;
use JM\Cosmetics;
use pocketmine\color\Color;
use pocketmine\item\VanillaItems;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat;

class ArmorsForm
{
    public function openArmorsForm(Player $player)
    {
        $form = new SimpleForm(function (Player $player, ?int $data = null) {
            if ($data === null) {
                return true;
            }
            if (!$player->hasPermission('cosmetics.armors')) {
                $player->sendMessage(TextFormat::colorize(Cosmetics::getInstance()->prefix . '&c You dont have permissions for use this'));
                return true;
            }
            switch ($data) {
                case 0:
                    $player->getArmorInventory()->clearAll();
                    $player->sendMessage(TextFormat::colorize(Cosmetics::getInstance()->prefix . '&a Your armor has just been removed'));
                    break;
                case 1:
                    // DARK BLUE ARMOR
                    $player->getArmorInventory()->clearAll();
                    $player->getArmorInventory()->setHelmet(VanillaItems::LEATHER_CAP()->setCustomColor(new Color(0, 0, 170)));
                    $player->getArmorInventory()->setChestplate(VanillaItems::LEATHER_TUNIC()->setCustomColor(new Color(0, 0, 170)));
                    $player->getArmorInventory()->setLeggings(VanillaItems::LEATHER_PANTS()->setCustomColor(new Color(0, 0, 170)));
                    $player->getArmorInventory()->setBoots(VanillaItems::LEATHER_BOOTS()->setCustomColor(new Color(0, 0, 170)));
                    $player->sendMessage(TextFormat::colorize(Cosmetics::getInstance()->prefix . '&a Your armor is now &l&1Dark Blue&r'));
                    break;
                case 2:
                    // DARK GREEN ARMOR
                    $player->getArmorInventory()->clearAll();
                    $player->getArmorInventory()->setHelmet(VanillaItems::LEATHER_CAP()->setCustomColor(new Color(0, 170, 0)));
                    $player->getArmorInventory()->setChestplate(VanillaItems::LEATHER_TUNIC()->setCustomColor(new Color(0, 170, 0)));
                    $player->getArmorInventory()->setLeggings(VanillaItems::LEATHER_PANTS()->setCustomColor(new Color(0, 170, 0)));
                    $player->getArmorInventory()->setBoots(VanillaItems::LEATHER_BOOTS()->setCustomColor(new Color(0, 170, 0)));
                    $player->sendMessage(TextFormat::colorize(Cosmetics::getInstance()->prefix . '&a Your armor is now &l&2Dark Green&r'));
                    break;
                case 3:
                    // AQUA DARK ARMOR
                    $player->getArmorInventory()->clearAll();
                    $player->getArmorInventory()->setHelmet(VanillaItems::LEATHER_CAP()->setCustomColor(new Color(0, 170, 170)));
                    $player->getArmorInventory()->setChestplate(VanillaItems::LEATHER_TUNIC()->setCustomColor(new Color(0, 170, 170)));
                    $player->getArmorInventory()->setLeggings(VanillaItems::LEATHER_PANTS()->setCustomColor(new Color(0, 170, 170)));
                    $player->getArmorInventory()->setBoots(VanillaItems::LEATHER_BOOTS()->setCustomColor(new Color(0, 170, 170)));
                    $player->sendMessage(TextFormat::colorize(Cosmetics::getInstance()->prefix . '&a Your armor is now &l&3Dark Aqua&r'));
                    break;
                case 4:
                    // RED DARK ARMOR
                    $player->getArmorInventory()->clearAll();
                    $player->getArmorInventory()->setHelmet(VanillaItems::LEATHER_CAP()->setCustomColor(new Color(170, 0, 0)));
                    $player->getArmorInventory()->setChestplate(VanillaItems::LEATHER_TUNIC()->setCustomColor(new Color(170, 0, 0)));
                    $player->getArmorInventory()->setLeggings(VanillaItems::LEATHER_PANTS()->setCustomColor(new Color(170, 0, 0)));
                    $player->getArmorInventory()->setBoots(VanillaItems::LEATHER_BOOTS()->setCustomColor(new Color(170, 0, 0)));
                    $player->sendMessage(TextFormat::colorize(Cosmetics::getInstance()->prefix . '&a Your armor is now &l&4Dark Red&r'));
                    break;
                case 5:
                    // PURPLE DARK ARMOR
                    $player->getArmorInventory()->clearAll();
                    $player->getArmorInventory()->setHelmet(VanillaItems::LEATHER_CAP()->setCustomColor(new Color(170, 0, 170)));
                    $player->getArmorInventory()->setChestplate(VanillaItems::LEATHER_TUNIC()->setCustomColor(new Color(170, 0, 170)));
                    $player->getArmorInventory()->setLeggings(VanillaItems::LEATHER_PANTS()->setCustomColor(new Color(170, 0, 170)));
                    $player->getArmorInventory()->setBoots(VanillaItems::LEATHER_BOOTS()->setCustomColor(new Color(170, 0, 170)));
                    $player->sendMessage(TextFormat::colorize(Cosmetics::getInstance()->prefix . '&a Your armor is now &l&5Dark Purple&r'));
                    break;
                case 6:
                    // GOLD ARMOR
                    $player->getArmorInventory()->clearAll();
                    $player->getArmorInventory()->setHelmet(VanillaItems::LEATHER_CAP()->setCustomColor(new Color(255, 170, 0)));
                    $player->getArmorInventory()->setChestplate(VanillaItems::LEATHER_TUNIC()->setCustomColor(new Color(255, 170, 0)));
                    $player->getArmorInventory()->setLeggings(VanillaItems::LEATHER_PANTS()->setCustomColor(new Color(255, 170, 0)));
                    $player->getArmorInventory()->setBoots(VanillaItems::LEATHER_BOOTS()->setCustomColor(new Color(255, 170, 0)));
                    $player->sendMessage(TextFormat::colorize(Cosmetics::getInstance()->prefix . '&a Your armor is now &l&6Gold&r'));
                    break;
                case 7:
                    // GRAY ARMOR
                    $player->getArmorInventory()->clearAll();
                    $player->getArmorInventory()->setHelmet(VanillaItems::LEATHER_CAP()->setCustomColor(new Color(170, 170, 170)));
                    $player->getArmorInventory()->setChestplate(VanillaItems::LEATHER_TUNIC()->setCustomColor(new Color(170, 170, 170)));
                    $player->getArmorInventory()->setLeggings(VanillaItems::LEATHER_PANTS()->setCustomColor(new Color(170, 170, 170)));
                    $player->getArmorInventory()->setBoots(VanillaItems::LEATHER_BOOTS()->setCustomColor(new Color(170, 170, 170)));
                    $player->sendMessage(TextFormat::colorize(Cosmetics::getInstance()->prefix . '&a Your armor is now &l&7Gray&r'));
                    break;
                case 8:
                    // GRAY DARK ARMOR
                    $player->getArmorInventory()->clearAll();
                    $player->getArmorInventory()->setHelmet(VanillaItems::LEATHER_CAP()->setCustomColor(new Color(85, 85, 85)));
                    $player->getArmorInventory()->setChestplate(VanillaItems::LEATHER_TUNIC()->setCustomColor(new Color(85, 85, 85)));
                    $player->getArmorInventory()->setLeggings(VanillaItems::LEATHER_PANTS()->setCustomColor(new Color(85, 85, 85)));
                    $player->getArmorInventory()->setBoots(VanillaItems::LEATHER_BOOTS()->setCustomColor(new Color(85, 85, 85)));
                    $player->sendMessage(TextFormat::colorize(Cosmetics::getInstance()->prefix . '&a Your armor is now &l&8Dark Gray&r'));
                    break;
                case 9:
                    // BLUE ARMOR
                    $player->getArmorInventory()->clearAll();
                    $player->getArmorInventory()->setHelmet(VanillaItems::LEATHER_CAP()->setCustomColor(new Color(85, 85, 255)));
                    $player->getArmorInventory()->setChestplate(VanillaItems::LEATHER_TUNIC()->setCustomColor(new Color(85, 85, 255)));
                    $player->getArmorInventory()->setLeggings(VanillaItems::LEATHER_PANTS()->setCustomColor(new Color(85, 85, 255)));
                    $player->getArmorInventory()->setBoots(VanillaItems::LEATHER_BOOTS()->setCustomColor(new Color(85, 85, 255)));
                    $player->sendMessage(TextFormat::colorize(Cosmetics::getInstance()->prefix . '&a Your armor is now &l&9Blue&r'));
                    break;
                case 10:
                    // BLACK ARMOR
                    $player->getArmorInventory()->clearAll();
                    $player->getArmorInventory()->setHelmet(VanillaItems::LEATHER_CAP()->setCustomColor(new Color(0, 0, 0)));
                    $player->getArmorInventory()->setChestplate(VanillaItems::LEATHER_TUNIC()->setCustomColor(new Color(0, 0, 0)));
                    $player->getArmorInventory()->setLeggings(VanillaItems::LEATHER_PANTS()->setCustomColor(new Color(0, 0, 0)));
                    $player->getArmorInventory()->setBoots(VanillaItems::LEATHER_BOOTS()->setCustomColor(new Color(0, 0, 0)));
                    $player->sendMessage(TextFormat::colorize(Cosmetics::getInstance()->prefix . '&a Your armor is now &l&0Black&r'));
                    break;
                case 11:
                    // GREEN ARMOR
                    $player->getArmorInventory()->clearAll();
                    $player->getArmorInventory()->setHelmet(VanillaItems::LEATHER_CAP()->setCustomColor(new Color(85, 255, 85)));
                    $player->getArmorInventory()->setChestplate(VanillaItems::LEATHER_TUNIC()->setCustomColor(new Color(85, 255, 85)));
                    $player->getArmorInventory()->setLeggings(VanillaItems::LEATHER_PANTS()->setCustomColor(new Color(85, 255, 85)));
                    $player->getArmorInventory()->setBoots(VanillaItems::LEATHER_BOOTS()->setCustomColor(new Color(85, 255, 85)));
                    $player->sendMessage(TextFormat::colorize(Cosmetics::getInstance()->prefix . '&a Your armor is now &l&aGreen&r'));
                    break;
                case 12:
                    // AQUA ARMOR
                    $player->getArmorInventory()->clearAll();
                    $player->getArmorInventory()->setHelmet(VanillaItems::LEATHER_CAP()->setCustomColor(new Color(85, 255, 255)));
                    $player->getArmorInventory()->setChestplate(VanillaItems::LEATHER_TUNIC()->setCustomColor(new Color(85, 255, 255)));
                    $player->getArmorInventory()->setLeggings(VanillaItems::LEATHER_PANTS()->setCustomColor(new Color(85, 255, 255)));
                    $player->getArmorInventory()->setBoots(VanillaItems::LEATHER_BOOTS()->setCustomColor(new Color(85, 255, 255)));
                    $player->sendMessage(TextFormat::colorize(Cosmetics::getInstance()->prefix . '&a Your armor is now &l&bAqua&r'));
                    break;
                case 13:
                    // RED ARMOR
                    $player->getArmorInventory()->clearAll();
                    $player->getArmorInventory()->setHelmet(VanillaItems::LEATHER_CAP()->setCustomColor(new Color(255, 85, 85)));
                    $player->getArmorInventory()->setChestplate(VanillaItems::LEATHER_TUNIC()->setCustomColor(new Color(255, 85, 85)));
                    $player->getArmorInventory()->setLeggings(VanillaItems::LEATHER_PANTS()->setCustomColor(new Color(255, 85, 85)));
                    $player->getArmorInventory()->setBoots(VanillaItems::LEATHER_BOOTS()->setCustomColor(new Color(255, 85, 85)));
                    $player->sendMessage(TextFormat::colorize(Cosmetics::getInstance()->prefix . '&a Your armor is now &l&cRed&r'));
                    break;
                case 14:
                    // LIGHT PURPLE ARMOR
                    $player->getArmorInventory()->clearAll();
                    $player->getArmorInventory()->setHelmet(VanillaItems::LEATHER_CAP()->setCustomColor(new Color(255, 85, 255)));
                    $player->getArmorInventory()->setChestplate(VanillaItems::LEATHER_TUNIC()->setCustomColor(new Color(255, 85, 255)));
                    $player->getArmorInventory()->setLeggings(VanillaItems::LEATHER_PANTS()->setCustomColor(new Color(255, 85, 255)));
                    $player->getArmorInventory()->setBoots(VanillaItems::LEATHER_BOOTS()->setCustomColor(new Color(255, 85, 255)));
                    $player->sendMessage(TextFormat::colorize(Cosmetics::getInstance()->prefix . '&a Your armor is now &l&dLight Purple&r'));
                    break;
                case 15:
                    // YELLOW ARMOR
                    $player->getArmorInventory()->clearAll();
                    $player->getArmorInventory()->setHelmet(VanillaItems::LEATHER_CAP()->setCustomColor(new Color(255, 255, 85)));
                    $player->getArmorInventory()->setChestplate(VanillaItems::LEATHER_TUNIC()->setCustomColor(new Color(255, 255, 85)));
                    $player->getArmorInventory()->setLeggings(VanillaItems::LEATHER_PANTS()->setCustomColor(new Color(255, 255, 85)));
                    $player->getArmorInventory()->setBoots(VanillaItems::LEATHER_BOOTS()->setCustomColor(new Color(255, 255, 85)));
                    $player->sendMessage(TextFormat::colorize(Cosmetics::getInstance()->prefix . '&a Your armor is now &l&eYellow&r'));
                    break;
            }
        });
        $msg_down = "§8Click for use this";
        $form->setTitle(TextFormat::colorize('&l&a* &4Armors &dMenu &a*&r'));
        $form->addButton("§l§4Remove Armor§r", 0, "textures/ui/cancel");
        $form->addButton("§l§1Dark Blue§r\n$msg_down", 0, "textures/blocks/wool_colored_blue");
        $form->addButton("§l§2Dark Green§r\n$msg_down", 0, "textures/blocks/wool_colored_green");
        $form->addButton("§l§3Dark Aqua§r\n$msg_down", 0, "textures/blocks/wool_colored_cyan");
        $form->addButton("§l§4Dark Red§r\n$msg_down", 0, "textures/blocks/wool_colored_red");
        $form->addButton("§l§5Dark Purple§r\n$msg_down", 0, "textures/blocks/wool_colored_purple");
        $form->addButton("§l§6Gold§r\n$msg_down", 0, "textures/blocks/wool_colored_yellow");
        $form->addButton("§l§7Gray§r\n$msg_down", 0, "textures/blocks/wool_colored_gray");
        $form->addButton("§l§8Dark Gray§r\n$msg_down", 0, "textures/blocks/wool_colored_gray");
        $form->addButton("§l§9Blue§r\n$msg_down", 0, "textures/blocks/wool_colored_light_blue");
        $form->addButton("§l§0Black§r\n$msg_down", 0, "textures/blocks/wool_colored_black");
        $form->addButton("§l§aGreen§r\n$msg_down", 0, "textures/blocks/wool_colored_green");
        $form->addButton("§l§bAqua§r\n$msg_down", 0, "textures/blocks/wool_colored_cyan");
        $form->addButton("§l§cRed§r\n$msg_down", 0, "textures/blocks/wool_colored_red");
        $form->addButton("§&§dLight Purple§r\n$msg_down", 0, "textures/blocks/wool_colored_pink");
        $form->addButton("§l§eYellow§r\n$msg_down", 0, "textures/blocks/wool_colored_yellow");
        $form->sendToPlayer($player);
        return $form;
    }
}
