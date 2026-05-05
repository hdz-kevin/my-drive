<script setup lang="ts">
import {
  Dialog,
  DialogContent,
  DialogFooter,
  DialogHeader,
  DialogTitle,
} from '@/components/ui/dialog'
import { Button } from '@/components/ui/button'
import { Input } from '@/components/ui/input'
import { Label } from '@/components/ui/label'
import InputError from '../InputError.vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps<{ modelValue: boolean }>();

const emit = defineEmits(['update:modelValue']);

const form = useForm<{
  name: string;
}>({
  name: "",
});

const createFolder = () => {
  console.log("Creating folder...");
}

const closeModal = () => {
  emit('update:modelValue', false);
  form.clearErrors();
  form.reset();
}

</script>

<template>
  <Dialog :open="modelValue" @update:open="closeModal">
    <DialogContent class="sm:max-w-115" :show-close-button="false">
      <DialogHeader>
        <DialogTitle>Create New Folder</DialogTitle>
      </DialogHeader>

      <form @submit.prevent="createFolder">
        <div class="py-4">
          <div class="space-y-4">
            <Label for="folderName" class="block sr-only">
              Name
            </Label>
            <Input
              type="text"
              id="folderName"
              v-model="form.name"
              class="mt-1 block w-full"
              :class="form.errors.name ? 'border-red-500 focus:border-e-red-500 focus:ring-red-500' : ''"
              placeholder="Folder Name"
            />
            <InputError :message="form.errors.name" class="mt-2" />
          </div>
        </div>

        <DialogFooter>
          <Button @click="closeModal" type="button" variant="ghost">
            Cancel
          </Button>
          <Button
            type="submit"
            :class="{ 'opacity-25': form.processing }"
            :disabled="form.processing"
          >
            Save
          </Button>
        </DialogFooter>
      </form>
    </DialogContent>
  </Dialog>
</template>
