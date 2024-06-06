<?php

namespace JM\forms;

use FormAPI\SimpleForm;
use JM\Cosmetics;
use pocketmine\player\Player;
use pocketmine\utils\SingletonTrait;
use pocketmine\utils\TextFormat;

class ParticlesForm
{
    public $hearts = [];
    public $torment = [];
    public $flame = [];
    public $happy = [];
    public $smoke = [];
    public $snowball = [];
    public $red = [];
    public $blue = [];
    public $green = [];
    public $yellow = [];
    public $aqua = [];
    public $pink = [];
    public $rainbow = [];

    use SingletonTrait;
    public function onLoad(): void
    {
        self::setInstance($this);
    }
    public function openParticlesForm(Player $player)
    {
        $form = new SimpleForm(function (Player $player, int $data = null) {
            $result = $data;
            if ($result === null) {
                return;
            }
            switch ($result) {
                case 0:
                    if (!$player->hasPermission("cosmetics.particles.hearts")) {
                        $player->sendMessage(TextFormat::colorize(Cosmetics::getInstance()->prefix . "§c You dont have permissions for use this"));
                        return;
                    }
                    if (!in_array($player->getName(), $this->hearts)) {
                        $this->hearts[] = $player->getName();
                        $player->sendMessage(TextFormat::colorize(Cosmetics::getInstance()->prefix . "&a You has actived the particles &l&4HEARTS"));
                        if (in_array($player->getName(), $this->flame)) {
                            unset($this->flame[array_search($player->getName(), $this->flame)]);
                        } else if (in_array($player->getName(), $this->happy)) {
                            unset($this->happy[array_search($player->getName(), $this->happy)]);
                        } else if (in_array($player->getName(), $this->torment)) {
                            unset($this->torment[array_search($player->getName(), $this->torment)]);
                        } else if (in_array($player->getName(), $this->smoke)) {
                            unset($this->smoke[array_search($player->getName(), $this->smoke)]);
                        } else if (in_array($player->getName(), $this->snowball)) {
                            unset($this->snowball[array_search($player->getName(), $this->snowball)]);
                        }
                    } else {
                        $player->sendMessage(TextFormat::colorize(Cosmetics::getInstance()->prefix . "&c You already have the particles activated"));
                    }
                    break;
                case 1:
                    if (!$player->hasPermission("cosmetics.particles.flame")) {
                        $player->sendMessage(TextFormat::colorize(Cosmetics::getInstance()->prefix . "§c You dont have permissions for use this"));
                        return;
                    }
                    if (!in_array($player->getName(), $this->flame)) {
                        $this->flame[] = $player->getName();
                        $player->sendMessage(TextFormat::colorize(Cosmetics::getInstance()->prefix . "&a You has actived the particles &l&4FLAMES"));
                        if (in_array($player->getName(), $this->hearts)) {
                            unset($this->hearts[array_search($player->getName(), $this->hearts)]);
                        } else if (in_array($player->getName(), $this->torment)) {
                            unset($this->torment[array_search($player->getName(), $this->torment)]);
                        } else if (in_array($player->getName(), $this->happy)) {
                            unset($this->happy[array_search($player->getName(), $this->happy)]);
                        } else if (in_array($player->getName(), $this->smoke)) {
                            unset($this->smoke[array_search($player->getName(), $this->smoke)]);
                        } else if (in_array($player->getName(), $this->snowball)) {
                            unset($this->snowball[array_search($player->getName(), $this->snowball)]);
                        }
                    } else {
                        $player->sendMessage(TextFormat::colorize(Cosmetics::getInstance()->prefix . "&c You already have the particles activated"));
                    }
                    break;
                case 2:
                    if (!$player->hasPermission("cosmetics.particles.villager")) {
                        $player->sendMessage(TextFormat::colorize(Cosmetics::getInstance()->prefix . "§c You dont have permissions for use this"));
                        return;
                    }
                    if (!in_array($player->getName(), $this->happy)) {
                        $this->happy[] = $player->getName();
                        $player->sendMessage(TextFormat::colorize(Cosmetics::getInstance()->prefix . "&a You has actived the particles &l&4ALDEAN"));
                        if (in_array($player->getName(), $this->hearts)) {
                            unset($this->hearts[array_search($player->getName(), $this->hearts)]);
                        } else if (in_array($player->getName(), $this->torment)) {
                            unset($this->torment[array_search($player->getName(), $this->torment)]);
                        } else if (in_array($player->getName(), $this->flame)) {
                            unset($this->flame[array_search($player->getName(), $this->flame)]);
                        } else if (in_array($player->getName(), $this->smoke)) {
                            unset($this->smoke[array_search($player->getName(), $this->smoke)]);
                        } else if (in_array($player->getName(), $this->snowball)) {
                            unset($this->snowball[array_search($player->getName(), $this->snowball)]);
                        }
                    } else {
                        $player->sendMessage(TextFormat::colorize(Cosmetics::getInstance()->prefix . "&c You already have the particles activated"));
                    }
                    break;
                case 3:
                    if (!$player->hasPermission("cosmetics.particles.smoke")) {
                        $player->sendMessage(TextFormat::colorize(Cosmetics::getInstance()->prefix . "§c You dont have permissions for use this"));
                        return;
                    }
                    if (!in_array($player->getName(), $this->smoke)) {
                        $this->smoke[] = $player->getName();
                        $player->sendMessage(TextFormat::colorize(Cosmetics::getInstance()->prefix . "&a You has actived the particles &l&SMOKE"));
                        if (in_array($player->getName(), $this->hearts)) {
                            unset($this->hearts[array_search($player->getName(), $this->hearts)]);
                        } else if (in_array($player->getName(), $this->torment)) {
                            unset($this->torment[array_search($player->getName(), $this->torment)]);
                        } else if (in_array($player->getName(), $this->flame)) {
                            unset($this->flame[array_search($player->getName(), $this->flame)]);
                        } else if (in_array($player->getName(), $this->happy)) {
                            unset($this->happy[array_search($player->getName(), $this->happy)]);
                        } else if (in_array($player->getName(), $this->snowball)) {
                            unset($this->snowball[array_search($player->getName(), $this->snowball)]);
                        }
                    } else {
                        $player->sendMessage(TextFormat::colorize(Cosmetics::getInstance()->prefix . "&c You already have the particles activated"));
                    }
                    break;
                case 4:
                    if (!$player->hasPermission("cosmetics.particles.snowball")) {
                        $player->sendMessage(TextFormat::colorize(Cosmetics::getInstance()->prefix . "§c You dont have permissions for use this"));
                        return;
                    }
                    if (!in_array($player->getName(), $this->snowball)) {
                        $this->snowball[] = $player->getName();
                        $player->sendMessage(TextFormat::colorize(Cosmetics::getInstance()->prefix . "&a You has actived the particles &l&SNOWBALL"));
                        if (in_array($player->getName(), $this->hearts)) {
                            unset($this->hearts[array_search($player->getName(), $this->hearts)]);
                        } else if (in_array($player->getName(), $this->torment)) {
                            unset($this->torment[array_search($player->getName(), $this->torment)]);
                        } else if (in_array($player->getName(), $this->flame)) {
                            unset($this->flame[array_search($player->getName(), $this->flame)]);
                        } else if (in_array($player->getName(), $this->happy)) {
                            unset($this->happy[array_search($player->getName(), $this->happy)]);
                        } else if (in_array($player->getName(), $this->smoke)) {
                            unset($this->smoke[array_search($player->getName(), $this->smoke)]);
                        }
                    } else {
                        $player->sendMessage(TextFormat::colorize(Cosmetics::getInstance()->prefix . "&c You already have the particles activated"));
                    }
                    break;
                case 5:
                    $player->sendMessage(TextFormat::colorize(Cosmetics::getInstance()->prefix . "&a You has removed the particles"));
                    if (in_array($player->getName(), $this->hearts)) {
                        unset($this->hearts[array_search($player->getName(), $this->hearts)]);
                    } else if (in_array($player->getName(), $this->torment)) {
                        unset($this->torment[array_search($player->getName(), $this->torment)]);
                    } else if (in_array($player->getName(), $this->flame)) {
                        unset($this->flame[array_search($player->getName(), $this->flame)]);
                    } else if (in_array($player->getName(), $this->happy)) {
                        unset($this->happy[array_search($player->getName(), $this->happy)]);
                    } else if (in_array($player->getName(), $this->smoke)) {
                        unset($this->smoke[array_search($player->getName(), $this->smoke)]);
                    } else if (in_array($player->getName(), $this->snowball)) {
                        unset($this->snowball[array_search($player->getName(), $this->snowball)]);
                    }
                    break;
            }
        });
        $msg_down = "§8Click for use this";
        $form->setTitle("§l§a* §5Particles §9Menu §a*§r");
        $form->addButton("§l§4Hearts§r\n$msg_down", 0, "textures/ui/health_boost_effect");
        $form->addButton("§l§6Flames§r\n$msg_down", 0, "textures/ui/icon_trending");
        $form->addButton("§l§9Villager§r\n$msg_down", 0, "textures/ui/icon_deals");
        $form->addButton("§l§8Smoke§r\n$msg_down", 0, "textures/ui/flame_empty_image");
        $form->addButton( "§l§fSnow§r\n$msg_down", 0, "textures/ui/icon_winter");
        $form->addButton("§l§4Remove particles", 0, "textures/ui/cancel");
        $form->sendToPlayer($player);
        return $form;
    }
}
