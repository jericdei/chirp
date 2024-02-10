<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue"
import { getInitials } from "@/Utilities/name"
import { Chirp } from "@/types/models"
import { Head, useForm } from "@inertiajs/vue3"
import Avatar from "primevue/avatar"
import Button from "primevue/button"
import Textarea from "primevue/textarea"
import moment from "moment"

const props = defineProps<{
    chirps: Chirp[]
}>()

const form = useForm<{
    message?: string
}>({
    message: undefined,
})
</script>

<template>
    <AuthenticatedLayout>
        <Head title="Home" />

        <div class="flex flex-col gap-8 p-8">
            <div>
                <Textarea
                    v-model="form.message"
                    class="w-full"
                    variant="outlined"
                    placeholder="What is happening?"
                    auto-resize
                />

                <div class="mt-4 flex justify-end">
                    <Button
                        label="Post"
                        rounded
                        size="small"
                    />
                </div>
            </div>

            <div>
                <div
                    v-for="chirp in chirps"
                    :key="chirp.id"
                    class="flex gap-2"
                >
                    <Avatar
                        :label="getInitials(chirp.user.name)"
                        shape="circle"
                    />

                    <div class="flex flex-col gap-2">
                        <div class="flex gap-2">
                            <span>{{ chirp.user.name }}</span>
                            <span>@{{ chirp.user.username }}</span>
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
