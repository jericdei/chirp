<script setup lang="ts">
import NavigationLink from "@/Components/NavigationLink.vue"
</script>

<template>
    <nav class="mt-16">
        <ul class="flex flex-col items-start gap-4 text-xl">
            <NavigationLink href="/">
                <i class="pi pi-home text-xl" />
                Home
            </NavigationLink>

            <NavigationLink :href="`/${$page.props.auth.user.username}`">
                <i class="pi pi-user text-xl" />
                Profile
            </NavigationLink>
        </ul>
    </nav>
</template>
