<script setup lang="ts">
import { type FormError } from '@/types/types';
    const props = defineProps<FormError>();
</script>

<template>
    <p class=" text-red-500 text-sm ml-1 mt-1">{{ props.error }}</p>
</template>