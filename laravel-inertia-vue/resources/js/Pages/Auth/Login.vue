<script setup lang="ts">
import GuestLayout from "@/Layouts/GuestLayout.vue"
import { Head, useForm } from "@inertiajs/vue3"
import Button from "primevue/button"
import Checkbox from "primevue/checkbox"
import InputText from "primevue/inputtext"
import Password from "primevue/password"

defineProps<{
    status?: string
}>()

const form = useForm({
    email: "",
    password: "",
    remember: false,
})

const submit = () => {
    form.post(route("login"), {
        onFinish: () => {
            form.reset("password")
        },
    })
}
</script>

<template>
    <GuestLayout>
        <Head title="Log in" />

        <div
            v-if="status"
            class="mb-4 text-sm font-medium text-green-600"
        >
            {{ status }}
        </div>

        <form @submit.prevent="submit">
            <div>
                <label for="email">Email</label>

                <InputText
                    v-model="form.email"
                    id="email"
                    type="email"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="username"
                />

                <small
                    v-if="form.errors.email"
                    class="mt-2"
                    >{{ form.errors.email }}</small
                >
            </div>

            <div class="mt-4">
                <label for="password">Password</label>

                <Password
                    id="password"
                    class="w-full"
                    input-class="w-full"
                    v-model="form.password"
                    required
                    autocomplete="current-password"
                    :feedback="false"
                    toggle-mask
                />

                <small
                    v-if="form.errors.password"
                    class="mt-2"
                    >{{ form.errors.password }}</small
                >
            </div>

            <div class="mt-4 block">
                <label class="flex items-center">
                    <Checkbox
                        name="remember"
                        v-model="form.remember"
                        binary
                    />

                    <span class="ms-2 text-sm text-gray-600 dark:text-gray-400">Remember me</span>
                </label>
            </div>

            <div class="mt-4 flex items-center justify-end">
                <Button
                    type="submit"
                    class="ms-4"
                    :class="{ 'opacity-25': form.processing }"
                    :disabled="form.processing"
                    label="Log in"
                />
            </div>
        </form>
    </GuestLayout>
</template>
