<script setup lang="ts">
import Layout from '@/components/Layout.vue';
import { router } from '@inertiajs/vue3';

defineProps({
    lists: {
        type: Object,
        required: true,
    },
});

const deleteItem = (listId: number) => {
    router.delete(route('lists.destroy', { id: listId }), {
            onError: (errors) => {
                console.error(errors);
            },
        });
};
</script>

<template>
    <Layout>
        <div class="flex flex-col space-x-2 my-auto">
        <div class="flex space-x-2">
        <p class="italic font-bold">{{ lists.length }} list/s</p>
        <a class="bg-gray-100 ring ring-blue-400 pl-2 pr-2 hover:ring-2" :href="route('lists.create')">New list</a>
        </div>
        <div class="mt-2 flex flex-row">
            <ul class="list-disc list-inside space-x-4">
                <li v-for="list in lists" :key="list.id">
                    <a class=" underline" :href="route('lists.show', { id: list.id })">{{ list.name }}</a>
                    <span class="ml-1 italic font-thin text-gray-400">({{ list.completedItemsCount }}/{{ list.itemsCount }})</span>
                    <button class="ml-2 hover:text-red-600" title="Delete list" @click="deleteItem(list.id)">x</button>
                </li>
            </ul>
        </div>
        </div>        
    </Layout>
</template>
