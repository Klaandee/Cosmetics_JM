<?php

namespace JM\forms;

use FormAPI\SimpleForm;
use JM\Cosmetics;
use JM\EventListener;
use pocketmine\player\Player;
use pocketmine\entity\Skin;
use pocketmine\Server;
use pocketmine\utils\Config;
use pocketmine\utils\TextFormat;

class CapesForm
{
    public function openCapesForm(Player $player)
    {
        $form = new SimpleForm(function (Player $player, ?int $data = null) {
            if ($data === null) {
                return true;
            }
            switch ($data) {
                case 0:
                    $pdata = new Config(Cosmetics::getInstance()->getDataFolder() . "data.yml", Config::YAML);
                    $cfg = new Config(Cosmetics::getInstance()->getDataFolder() . "config.yml", Config::YAML);
                    $oldSkin = $player->getSkin();
                    $setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), "", $oldSkin->getGeometryName(), $oldSkin->getGeometryData());

                    $player->setSkin($setCape);
                    $player->sendSkin();

                    if ($pdata->get($player->getName()) !== null) {
                        $pdata->remove($player->getName());
                        $pdata->save();
                    }

                    $player->sendMessage(TextFormat::colorize(Cosmetics::getInstance()->prefix . '&a Your cape has just removed'));
                    break;
                case 1:
                    $this->openCapeList($player);
                    break;
            }
        });
        $form->setTitle(TextFormat::colorize("&l&a* &4Capes &6Menu &a*&r"));
        $form->addButton("§l§4Remove Cape", 0, "textures/ui/cancel");
        $form->addButton("§l§aChoose Cape", 0, "textures/ui/icon_steve");

        $form->sendToPlayer($player);
        return $form;
    }
    public function openCapeList($player)
    {
        $cfg = new Config(Cosmetics::getInstance()->getDataFolder() . "config.yml", Config::YAML);
        $form = new SimpleForm(function (Player $player, $data = null) {
            $result = $data;

            if (is_null($result)) {
                return true;
            }

            $cape = $data;
            $cfg = new Config(Cosmetics::getInstance()->getDataFolder() . "config.yml", Config::YAML);
            $pdata = new Config(Cosmetics::getInstance()->getDataFolder() . "data.yml", Config::YAML);

            if (!file_exists(Cosmetics::getInstance()->getDataFolder() . $data . ".png")) {
                $player->sendMessage("The choosen Skin is not available!");
                return true;
            }
            if (!$player->hasPermission('cosmetics.capes')) {
                $player->sendMessage(TextFormat::colorize(Cosmetics::getInstance()->prefix . '&c You dont have permissions for use this'));
                return true;
            }
            $oldSkin = $player->getSkin();
            $capeData = EventListener::getInstance()->createCape($cape);
            $setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());

            $player->setSkin($setCape);
            $player->sendSkin();

            $player->sendMessage(TextFormat::colorize(Cosmetics::getInstance()->prefix . '&a You just put on a cape'));
            $pdata->set($player->getName(), $cape);
            $pdata->save();
        });

        $form->setTitle(TextFormat::colorize('&l&a* &4Capes &6List &a*&r'));

        foreach ($this->getCapes() as $capes) {
            $form->addButton("§l§6$capes", -1, "", $capes);
        }

        $form->sendToPlayer($player);
        return $form;
    }

    public function getCapes()
    {
        $list = array();

        foreach (array_diff(scandir(Cosmetics::getInstance()->getDataFolder()), ["..", "."]) as $data) {
            $dat = explode(".", $data);

            if ($dat[1] == "png") {
                array_push($list, $dat[0]);
            }
        }

        return $list;
    }
}