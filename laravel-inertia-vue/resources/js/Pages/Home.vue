<script setup lang="ts">
import AuthenticatedLayout from "@/Layouts/AuthenticatedLayout.vue"
import { Head, useForm } from "@inertiajs/vue3"
import Button from "primevue/button"
import Textarea from "primevue/textarea"

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
                <pre>Tweets</pre>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
