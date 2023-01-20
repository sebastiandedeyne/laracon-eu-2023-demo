<template>
    <label class="block">
        <span class="block font-bold uppercase text-sm">{{ label }}</span>
        <input
            type="text"
            :value="modelValue"
            @input="updateValue($event.target.value)"
            class="block w-full border-b mt-1 px-1"
        >
    </label>
</template>

<script setup lang="ts">
defineProps<{
    label: string;
    modelValue: string;
}>()

const emit = defineEmits<{
  (e: 'update:modelValue', value: string): void;
}>()

function updateValue(value: string) {
  emit('update:modelValue', value)
}
</script>
