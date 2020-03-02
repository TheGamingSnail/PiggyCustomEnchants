<?php

declare(strict_types=1);

namespace DaPigGuy\PiggyCustomEnchants\enchants\weapons;

use DaPigGuy\PiggyCustomEnchants\enchants\ReactiveEnchantment;
use pocketmine\event\entity\EntityDamageByEntityEvent;
use pocketmine\event\Event;
use pocketmine\inventory\Inventory;
use pocketmine\item\Item;
use pocketmine\player\Player;

class BlessedEnchant extends ReactiveEnchantment
{
    /** @var string */
    public $name = "Blessed";
    /** @var int */
    public $maxLevel = 3;

    public function react(Player $player, Item $item, Inventory $inventory, int $slot, Event $event, int $level, int $stack): void
    {
        if ($event instanceof EntityDamageByEntityEvent) {
            foreach ($player->getEffects()->all() as $effect) {
                if ($effect->getType()->isBad()) {
                    $player->getEffects()->remove($effect->getType());
                }
            }
        }
    }
}