<script setup lang="ts">
import Navigation from "@/Components/Navigation.vue"
import { getInitials } from "@/Utilities/name"
import { router } from "@inertiajs/vue3"
import Avatar from "primevue/avatar"
</script>

<template>
    <div class="mx-auto grid h-screen w-3/4 grid-cols-12">
        <div class="col-span-3 border-r border-r-slate-100 p-8">
            <div class="flex h-full flex-col justify-between">
                <div>
                    <h1 class="text-3xl font-extrabold">Chirp</h1>

                    <Navigation />
                </div>

                <div
                    class="flex cursor-pointer items-center justify-between gap-2 rounded-full p-2 hover:bg-slate-300 hover:bg-opacity-20"
                    @click="router.post('logout')"
                >
                    <div class="inline-flex items-center gap-2">
                        <Avatar
                            :label="getInitials($page.props.auth.user.name)"
                            shape="circle"
                        />

                        <div class="text-sm">
                            <p>{{ $page.props.auth.user.name }}</p>
                            <p class="text-slate-400">@{{ $page.props.auth.user.username }}</p>
                        </div>
                    </div>

                    <i class="pi pi-ellipsis-h" />
                </div>
            </div>
        </div>

        <div class="col-span-6 border-r border-r-slate-100">
            <slot />
        </div>

        <div class="col-span-3 p-16">
            <h2 class="text-2xl font-bold">Trends</h2>
        </div>
    </div>
</template>
