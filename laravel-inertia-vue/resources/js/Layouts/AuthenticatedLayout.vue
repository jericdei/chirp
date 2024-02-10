<script setup lang="ts">
import Avatar from "primevue/avatar"
</script>

<template>
    <div class="mx-auto grid h-screen w-3/4 grid-cols-12">
        <div class="col-span-3 border-r border-r-slate-100 p-8">
            <div class="flex h-full flex-col justify-between">
                <div>
                    <h1 class="text-3xl font-extrabold">Chirp</h1>

                    <nav class="mt-16">
                        <ul class="flex flex-col items-start gap-4 text-xl">
                            <li
                                class="cursor-pointer rounded-full py-2 pl-4 pr-8 hover:bg-slate-300 hover:bg-opacity-20"
                            >
                                <a
                                    href="#"
                                    class="inline-flex items-center justify-start gap-4 font-bold"
                                >
                                    <i class="pi pi-home text-xl" />
                                    Home
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>

                <div>
                    <div
                        class="flex cursor-pointer items-center justify-between gap-2 rounded-full p-2 hover:bg-slate-300 hover:bg-opacity-20"
                    >
                        <div class="inline-flex items-center gap-2">
                            <Avatar
                                label="FU"
                                shape="circle"
                            />

                            <div class="text-sm">
                                <p>Name</p>
                                <p class="text-slate-400">@username</p>
                            </div>
                        </div>

                        <i class="pi pi-ellipsis-h" />
                    </div>
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
