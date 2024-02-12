<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue"
import { getInitials } from "@/Utilities/name"
import { Chirp } from "@/types/models"
import { Head, useForm, usePage } from "@inertiajs/vue3"
import Avatar from "primevue/avatar"
import Button from "primevue/button"
import Textarea from "primevue/textarea"
import moment from "moment"

const props = defineProps<{
    chirps: Chirp[]
}>()

const form = useForm<{
    user_id: number
    content?: string
}>({
    user_id: usePage().props.auth.user.id,
    content: undefined,
})

async function submit() {
    form.post(route("chirps.store"), {
        onSuccess: () => form.reset("content"),
    })
}
</script>

<template>
    <AuthenticatedLayout>
        <Head title="Home" />

        <div class="flex max-h-screen flex-col gap-8 overflow-y-scroll">
            <form
                @submit.prevent="submit"
                class="p-8"
            >
                <Textarea
                    v-model="form.content"
                    class="w-full"
                    variant="outlined"
                    placeholder="What is happening?"
                    auto-resize
                />

                <div class="mt-4 flex justify-end">
                    <Button
                        type="submit"
                        label="Post"
                        rounded
                        size="small"
                    />
                </div>
            </form>

            <div class="divide-y divide-slate-300 border-t border-slate-300 p-2">
                <div
                    v-for="chirp in props.chirps"
                    :key="chirp.id"
                    class="flex w-full gap-2"
                >
                    <div class="p-4">
                        <Avatar
                            :label="getInitials(chirp.user.name)"
                            shape="circle"
                        />
                    </div>

                    <div class="flex w-full flex-col gap-2 py-4">
                        <div class="flex gap-2">
                            <span>{{ chirp.user.name }}</span>
                            <span class="text-slate-500">@{{ chirp.user.username }}</span>
                            <span>·</span>
                            <span>{{ moment(chirp.created_at).fromNow() }}</span>
                        </div>

                        <div>
                            <p>{{ chirp.content }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
