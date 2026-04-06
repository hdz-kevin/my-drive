<script setup lang="ts">
import SearchForm from '@/components/app/SearchForm.vue';
import AppLayout from '@/layouts/app/AppSidebarLayout.vue';
import type { BreadcrumbItem } from '@/types';

const { breadcrumbs = [] } = defineProps<{
    breadcrumbs?: BreadcrumbItem[];
}>();
</script>

<template>
    <AppLayout :breadcrumbs="breadcrumbs">
        <div class="space-y-5 px-8 py-6">
            <div class="flex items-center justify-between overflow-hidden">
                <SearchForm />

                <div>
                    Actions
                </div>
            </div>

            <slot />
        </div>
    </AppLayout>
</template>
