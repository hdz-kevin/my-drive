<script setup lang="ts">
import Input from '../ui/input/Input.vue';
import { useForm } from '@inertiajs/vue3';

const form = useForm<{
    search: string;
}>({
    search: '',
});
</script>

<template>
    <form class="flex h-16 w-full items-center">
        <Input
            v-model="form.search"
            type="text"
            class="block max-w-3xl py-5 shadow-sm"
            autocomplete
            placeholder="Search for files and folders"
        />
    </form>
</template>
