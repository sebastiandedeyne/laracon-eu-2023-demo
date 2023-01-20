<template>
    <label class="block">
        <span class="block font-bold uppercase text-sm">{{ label }}</span>
        <select
            @input="updateValue($event.target.value)"
            class="p-0 block w-full border-b mt-1 px-1"
        >
            <option value=""></option>
            <option
                v-for="option in options"
                :key="option.value"
                :value="option.value"
                :selected="option.value == modelValue"
            >
                {{ option.label }}
            </option>
        </select>
    </label>
</template>

<script setup lang="ts">
defineProps<{
    label: string;
    modelValue: string|number;
    options: App.Http.Resources.OptionResource[];
}>()

const emit = defineEmits<{
  (e: 'update:modelValue', value: string|number): void;
}>()

function updateValue(value: string|number) {
  emit('update:modelValue', value)
}
</script>
