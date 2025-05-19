<?php
namespace App\Builders;

use Illuminate\Database\Eloquent\Builder;

class TODOListBuilder extends Builder
{
    public function uncompleted() {
        return $this->where('is_completed', false);
    }

    public function withItemsCount() {
        return $this->withCount([
            'items as itemsCount',
            'items as completedItemsCount' => function ($query) {
                $query->where('is_completed', true);
        }]);
    }
}