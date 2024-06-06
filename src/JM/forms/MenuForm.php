<?php

namespace JM\forms;

use FormAPI\SimpleForm;
use JM\Cosmetics;
use JM\forms\ParticlesForm;
use pocketmine\player\Player;
use pocketmine\utils\TextFormat;

class MenuForm {
    public function openMenuForm(Player $player) {
        $form = new SimpleForm(function(Player $player, ?int $data = null) {
            if($data === null) {
                return true;
            }
            switch ($data) {
                case 0:
                    Cosmetics::getInstance()->getArmorsForm()->openArmorsForm($player);
                break;
                case 1:
                    Cosmetics::getInstance()->getSizeForm()->openSizeForm($player);
                break;
                case 2:
                    Cosmetics::getInstance()->getCapesForm()->openCapesForm($player);
                break;
                case 3:
                    ParticlesForm::getInstance()->openParticlesForm($player);
                break;
            }
        });
        $form->setTitle(TextFormat::colorize('&l&a* &6Cosmetics &dMenu &a*&r'));
        $form->addButton('§l§4Armors§r' , 0, "textures/items/netherite_chestplate");
        $form->addButton('§l§9Size§r' , 0, "textures/items/ender_pearl");
        $form->addButton('§l§1Capes§r' , 0, "textures/items/cake");
        $form->addButton('§l§5Particles§r' , 0, "textures/ui/particles");
        $form->sendToPlayer($player);
        return $form;
    }
}