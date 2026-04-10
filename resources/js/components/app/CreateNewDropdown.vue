<script setup lang="ts">
import {
    DropdownMenu,
    DropdownMenuContent,
    DropdownMenuItem,
    DropdownMenuSeparator,
    DropdownMenuTrigger,
} from '@/components/ui/dropdown-menu';
import { Button } from '@/components/ui/button';
import { Plus } from 'lucide-vue-next';
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
            <DropdownMenuItem class="h-9">New Folder</DropdownMenuItem>
            <DropdownMenuSeparator />
            <DropdownMenuItem class="h-9">Upload Files</DropdownMenuItem>
            <DropdownMenuItem class="h-9">Upload Folder</DropdownMenuItem>
        </DropdownMenuContent>
    </DropdownMenu>
</template>
