<script setup lang="ts">
    import { defineProps } from 'vue';
    import { type LogoProp } from '@/types/types';

    const props = defineProps<LogoProp>();
</script>

<template>
    <div class="mb-2 text-center italic text-xl font-bold text-amber-700">
        {{ props.title }}
    </div>
</template>