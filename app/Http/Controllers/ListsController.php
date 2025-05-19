<?php

namespace App\Http\Controllers;

use App\DTOs\ListDto;
use App\Http\Requests\CreateListRequest;
use App\Repositories\TODOListRepository;
use Exception;
use Illuminate\Http\Request;

class ListsController extends Controller
{
    public function __construct(
        private readonly TODOListRepository $todoListRepository
    ) {    
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $lists = $this->todoListRepository->getUncompletedLists();

        return inertia('Lists/index', [
            'lists' => $lists,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return inertia('Lists/create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CreateListRequest $createListRequest)
    {
        try {
            $validatedData = $createListRequest->validated();
            $data = ListDto::fromArray($validatedData);
            $this->todoListRepository->saveList($data);

        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
        return to_route('lists.index')->with('success', 'List created successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $listWithItems = $this->todoListRepository->getListWithItems($id);

        return inertia('Lists/show', [
            'listWithItems' => $listWithItems
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $this->todoListRepository->deleteListAndItems($id);
        } catch (Exception $e) {
            return redirect()->back()->withErrors($e->getMessage());
        }
        
        return redirect()->back();
    }
}
