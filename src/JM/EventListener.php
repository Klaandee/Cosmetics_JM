<?php

namespace JM;

use JM\Cosmetics;
use pocketmine\event\Listener;
use pocketmine\event\player\PlayerJoinEvent;
use pocketmine\utils\Config;
use pocketmine\entity\Skin;
use pocketmine\event\player\PlayerChangeSkinEvent;
use pocketmine\utils\SingletonTrait;

class EventListener implements Listener
{
    protected $skin = [];
    use SingletonTrait;
    public function onLoad(): void {
        self::setInstance($this);
    }
    public function onJoin(PlayerJoinEvent $event)
    {
        $player = $event->getPlayer();
        $this->skin[$player->getName()] = $player->getSkin();
        $playercape = new Config(Cosmetics::getInstance()->getDataFolder() . "data.yml", Config::YAML);

        if (file_exists(Cosmetics::getInstance()->getDataFolder() . $playercape->get($player->getName()) . ".png")) {
            $oldSkin = $player->getSkin();
            $capeData = $this->createCape($playercape->get($player->getName()));
            $setCape = new Skin($oldSkin->getSkinId(), $oldSkin->getSkinData(), $capeData, $oldSkin->getGeometryName(), $oldSkin->getGeometryData());

            $player->setSkin($setCape);
            $player->sendSkin();
        } else {
            $playercape->remove($player->getName());
            $playercape->save();
        }
    }
    public function createCape($capeName)
    {
        $path = Cosmetics::getInstance()->getDataFolder() . "{$capeName}.png";
        $img = @imagecreatefrompng($path);
        $bytes = '';
        $l = (int) @getimagesize($path)[1];

        for ($y = 0; $y < $l; $y++) {
            for ($x = 0; $x < 64; $x++) {
                $rgba = @imagecolorat($img, $x, $y);
                $a = ((~((int)($rgba >> 24))) << 1) & 0xff;
                $r = ($rgba >> 16) & 0xff;
                $g = ($rgba >> 8) & 0xff;
                $b = $rgba & 0xff;
                $bytes .= chr($r) . chr($g) . chr($b) . chr($a);
            }
        }

        @imagedestroy($img);

        return $bytes;
    }
    public function onChangeSkin(PlayerChangeSkinEvent $event) {
        $player = $event->getPlayer();
        $this->skin[$player->getName()] = $player->getSkin();
    }
}