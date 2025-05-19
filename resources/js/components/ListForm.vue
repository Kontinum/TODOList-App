<script setup lang="ts">
import { InertiaForm } from '@inertiajs/vue3';
import FormError from './FormError.vue';
import { ListData } from '@/types/types';

    defineProps<{
        form: InertiaForm<ListData>;
    }>();

    const emits = defineEmits(['createList']);

    const emitListSubmitted = () => {                
        emits('createList');
    };
</script>

<template>
    <form class="mt-6 space-y-4" @submit.prevent="emitListSubmitted">
            <div>
            <label for="name" class="block text-sm font-medium text-gray-700">Name <span class=" text-red-600">*</span></label>
            <input v-model="form.name" type="text" id="name" name="name" required class="p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-gray-50">
            <FormError v-if="form.errors.name" :error="form.errors.name" /> 
            </div>
            <div>
            <label for="description" class="block text-sm font-medium text-gray-700">Description</label>
            <textarea v-model="form.description" id="description" name="description" rows="3" class="p-2 mt-1 block w-full rounded-md border-gray-300 shadow-sm focus:border-blue-500 focus:ring-blue-500 bg-gray-50"></textarea>
            </div>
            <div class="text-right">
                <button type="submit" class="right inline-flex justify-center rounded-md border border-transparent bg-blue-600 py-2 px-4 text-sm font-medium text-white shadow-sm hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-blue-500 focus:ring-offset-2">Create List
            </button>
            </div>
        </form>
</template>