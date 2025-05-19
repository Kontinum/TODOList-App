<script setup lang="ts">
import FormError from '@/components/FormError.vue';
import Layout from '@/components/Layout.vue';
import { router, useForm } from '@inertiajs/vue3';
import { computed } from 'vue';

const props = defineProps({
    listWithItems: {
        type: Object,
        required: true,
    }
});

const form = useForm({
    list_id: props.listWithItems.id,
    name: '',
});

// Define a computed property to check if the list is uncompleted
const uncompletedList = computed(() => {
    return ((props.listWithItems.itemsCount - props.listWithItems.completedItemsCount) > 0) || (props.listWithItems.itemsCount === 0);
});

const addItem = (event: KeyboardEvent) => {
    const input = event.target as HTMLInputElement;
    const itemName = input.value.trim();    

    if (event.key === 'Enter' && itemName) {  
              
        form.post(route('items.store'), {
            onSuccess: () => {
                form.reset();
            },
        });
        input.value = '';
    }
};

const completeItem = (itemId: number) => {    
    router.post(route('items.complete', itemId));
};
</script>

<template>
    <Layout>
        <div class="flex flex-col space-x-2 my-auto">
        <div class="flex flex-col space-x-2">
        <p class="italic font-bold">{{ listWithItems.items.length }} item/s in {{ listWithItems.name }}</p>
        <p class=" text-sm italic text-gray-600 ml-2">{{ listWithItems.description }}</p>
        </div>
        <div v-if="uncompletedList " class="flex space-x-2">
            <input type="text" v-model="form.name" @keypress.enter="addItem" class="border rounded-md mt-2 px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-blue-400 w-full" placeholder="Enter item to add">
            <FormError v-if="form.errors.name" :error="form.errors.name" />     
        </div>
        <div v-else>
            <p class=" text-blue-400">This list is completed!</p>
        </div>
        <div class="mt-2 flex flex-row">
            <ul class="list-disc list-inside space-x-4">
                <li v-for="item in listWithItems.items" :key="item.id">
                    <span :class="{ 'text-gray-400': item.is_completed }">{{ item.name }}</span>
                    <button v-if="!item.is_completed" 
                    @click="completeItem(item.id)" 
                    title="Check item" class=" ml-2 font-bold hover:text-red-500">&check;</button>
                </li>
            </ul>
        </div>
        </div>        
    </Layout>
</template>
