<script setup lang="ts">
import { Link } from "@inertiajs/vue3"

const props = defineProps<{
    href: string
}>()
</script>

<template>
    <li class="cursor-pointer rounded-full py-2 pl-4 pr-8 hover:bg-slate-300 hover:bg-opacity-20">
        <Link
            class="inline-flex items-center justify-start gap-4 font-bold"
            :href="props.href"
        >
            <slot />
        </Link>
    </li>
</template>
