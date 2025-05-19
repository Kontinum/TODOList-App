<?php

namespace App\Http\Controllers;
;

use App\DTOs\ItemDto;
use App\Http\Requests\SaveItemRequest;
use App\Models\TODOItem;
use App\Repositories\TODOItemRepository;;
use Exception;

class ItemsController extends Controller
{
    public function __construct(
        private readonly TODOItemRepository $todoItemRepository
    ) {    
    }

    public function store(SaveItemRequest $saveItemRequest) {
        try {
            $validatedData = $saveItemRequest->validated();
            $data = ItemDto::fromArray($validatedData);
            $this->todoItemRepository->saveItem($data);
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
        
        return redirect()->back()->with('success', 'Item created successfully');
    }

    
    public function completeItem(TODOItem $item) {
        try {
            $this->todoItemRepository->completeItem($item->id);
        } catch (Exception $e ) {
            return redirect()->back()->withErrors($e->getMessage());
        }

        return redirect()->route('lists.show', $item->list_id)
            ->with('success', 'Item completed successfully');
        //return redirect()->back()->with('success', 'Item completed successfully');
    }
}
