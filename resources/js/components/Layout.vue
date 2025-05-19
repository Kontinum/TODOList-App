<script setup>
import { Head } from '@inertiajs/vue3';
import BaseDiv from './BaseDiv.vue';
import FlexVHCenter from './FlexVHCenter.vue';
import Logo from './Logo.vue';

</script>

<template>
    <Head title="TODO App" />
        <FlexVHCenter>
            <BaseDiv>
                <Logo title="TODO App" />
                <slot></slot>
            </BaseDiv>
        </FlexVHCenter>
</template>