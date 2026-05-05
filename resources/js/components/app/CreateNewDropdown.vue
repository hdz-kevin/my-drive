<script setup lang="ts">
import { Plus } from 'lucide-vue-next';
import { Button } from '@/components/ui/button';
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuSeparator,
    DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu';
import { ref } from 'vue';
import CreateFolderModal from './CreateFolderModal.vue';

const createFolderModal = ref(false);

const showCreateFolderModal = () => {
    createFolderModal.value = true;
}
</script>

<template>
    <DropdownMenu>
        <DropdownMenuTrigger as-child class="mb-4">
            <Button
                variant="outline"
                class="h-10 rounded-lg border-gray-300 bg-inherit text-gray-800 hover:cursor-pointer"
            >
                <Plus />
                Create New
            </Button>
        </DropdownMenuTrigger>
        <DropdownMenuContent class="w-56" align="start">
            <DropdownMenuItem @click="showCreateFolderModal" class="h-9 hover:cursor-pointer">
                New Folder
            </DropdownMenuItem>
            <DropdownMenuSeparator />
            <DropdownMenuItem class="h-9 hover:cursor-pointer">Upload Files</DropdownMenuItem>
            <DropdownMenuItem class="h-9 hover:cursor-pointer">Upload Folder</DropdownMenuItem>
        </DropdownMenuContent>
    </DropdownMenu>

    <CreateFolderModal v-model="createFolderModal" />
</template>
