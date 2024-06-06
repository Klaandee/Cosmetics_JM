<?php

namespace JM;

use JM\commands\Commands;
use JM\forms\MenuForm;
use JM\forms\ArmorsForm;
use JM\forms\SizeForm;
use JM\forms\CapesForm;
use JM\utils\CosmeticEntity;
use JM\utils\Particles;
use JM\EventListener;
use pocketmine\utils\Config;
use pocketmine\entity\EntityDataHelper;
use pocketmine\entity\EntityFactory;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\plugin\PluginBase;
use pocketmine\world\World;
use pocketmine\utils\SingletonTrait;

class Cosmetics extends PluginBase
{
    public $prefix = '&8[&6Cosmetics JM&8]&r';
    
    use SingletonTrait;
    public function onLoad(): void
    {
        self::setInstance($this);
    }
    public function onEnable(): void
    {
        Commands::register();
        EntityFactory::getInstance()->register(CosmeticEntity::class, function (World $world, CompoundTag $nbt): CosmeticEntity {
            return new CosmeticEntity(EntityDataHelper::parseLocation($nbt, $world), CosmeticEntity::parseSkinNBT($nbt), $nbt);
        }, ["EntitysNPC"]);

        $this->getServer()->getPluginManager()->registerEvents(new EventListener($this), $this);
        $this->getScheduler()->scheduleRepeatingTask(new Particles($this), 5);
        $this->saveDefaultConfig();
        $this->saveResource('config.yml');
        $this->getLogger()->info('Cosmetics by JM has been enabled');

        $capes = new Config($this->getDataFolder() . "config.yml", Config::YAML);
        if (is_array($capes->get("standard_capes"))) {
            foreach ($capes->get("standard_capes") as $cape) {
                $this->saveResource("$cape.png");
            }
            $capes->set("standard_capes", "done");
            $capes->save();
        }
    }
    public function getMenuForm(): MenuForm
    {
        return new MenuForm;
    }
    public function getArmorsForm(): ArmorsForm
    {
        return new ArmorsForm;
    }
    public function getSizeForm(): SizeForm
    {
        return new SizeForm;
    }
    public function getCapesForm(): CapesForm
    {
        return new CapesForm;
    }
}