<script setup lang="ts">
import Layout from '@/components/Layout.vue';
import ListForm from '@/components/ListForm.vue';
import { type ListData } from '@/types/types';
import { useForm } from '@inertiajs/vue3';

const form = useForm<ListData>({
        name: '',
        description: '',
    });

const createList = () => {              
    form.post(route('lists.store'), {
            onError: (errors) => {
                console.log(errors);
            },
        });   
};

</script>

<template>
    <Layout>
        <div class="text-center">
            <p class=" italic">Create new TODO List</p>
        </div>
        <ListForm @create-list="createList" :form="form"/>
    </Layout>
</template>