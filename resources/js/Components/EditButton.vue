<script setup lang="ts">
import { Link } from '@inertiajs/vue3';
defineProps<{
    href: string
}>()
</script>

<template>
    <Link :href="href"
        class="inline-flex items-center px-4 py-2 bg-yellow-600 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-yellow-500 active:bg-yellow-700 focus:outline-none focus:ring-2 focus:ring-yellow-500 focus:ring-offset-2 transition ease-in-out duration-150">
    Edit
    </Link>
</template>
