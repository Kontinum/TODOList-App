<?php
namespace App\Repositories;

use App\DTOs\ItemDto;
use App\Models\TODOItem;

class TODOItemRepository {
    public function saveItem(ItemDto $itemDto): TODOItem {
        return TODOItem::query()
            ->create($itemDto->toArray());        
    }

    public function completeItem($itemId): bool {
        return TODOItem::query()
            ->where('id', $itemId)
            ->update(['is_completed' => true]);

    }
}