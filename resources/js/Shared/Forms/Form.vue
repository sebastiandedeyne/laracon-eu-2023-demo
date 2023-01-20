<template>
    <form action="{{ $component->action }}" method="POST">
        @csrf
        @method($component->method)

        <div class="space-y-6">
            {{ $slot }}
        </div>
    </form>
</template>

<script setup lang="ts">
defineProps<{
    action: string;
    method: 'GET' | 'POST' | 'PUT' | 'PATCH' | 'DELETE'
}>()
</script>
