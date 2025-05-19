<?php
namespace App\Repositories;

use App\DTOs\ListDto;
use App\Models\TODOList;

class TODOListRepository {
    public function getUncompletedLists() {
        return TODOList::query()
            ->uncompleted()
            ->withItemsCount()
            ->get();
    }

    public function saveList(ListDto $listDto): TODOList {
        return TODOList::query()
            ->create($listDto->toArray());        
    }

    public function deleteListAndItems(int $id): void {
        $list = TODOList::query()
            ->where('id', $id)
            ->firstOrFail();

        $list->items()->delete();
        $list->deleteOrFail();
    }

    public function getListWithItems(int $id): TODOList {
        return TODOList::query()
            ->with('items')
            ->withItemsCount()
            ->where('id', $id)
            ->firstOrFail();
    }
}