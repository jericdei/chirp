<script setup lang="ts">
import GuestLayout from "@/Layouts/GuestLayout.vue"
import { Head, Link, useForm } from "@inertiajs/vue3"
import Button from "primevue/button"
import InputText from "primevue/inputtext"
import Password from "primevue/password"

const form = useForm({
    name: "",
    email: "",
    password: "",
    password_confirmation: "",
})

const submit = () => {
    form.post(route("register"), {
        onFinish: () => {
            form.reset("password", "password_confirmation")
        },
    })
}
</script>

<template>
    <GuestLayout>
        <Head title="Register" />

        <form @submit.prevent="submit">
            <div>
                <label for="name">Name</label>

                <InputText
                    v-model="form.name"
                    id="name"
                    type="text"
                    class="mt-1 block w-full"
                    required
                    autofocus
                    autocomplete="username"
                />

                <small
                    v-if="form.errors.name"
                    class="mt-2"
                    >{{ form.errors.name }}</small
                >
            </div>

            <div class="mt-4">
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

            <div class="mt-4">
                <label for="password_confirmation">Password Confirmation</label>

                <Password
                    id="password_confirmation"
                    class="w-full"
                    input-class="w-full"
                    v-model="form.password_confirmation"
                    required
                    autocomplete="current-password"
                    :feedback="false"
                    toggle-mask
                />

                <small
                    v-if="form.errors.password_confirmation"
                    class="mt-2"
                    >{{ form.errors.password_confirmation }}</small
                >
            </div>

            <div class="mt-4 flex items-center justify-end">
                <Link
                    :href="route('login')"
                    class="rounded-md text-sm text-gray-600 underline hover:text-gray-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:text-gray-400 dark:hover:text-gray-100 dark:focus:ring-offset-gray-800"
                >
                    Already registered?
                </Link>

                <Button
                    type="submit"
                    class="ms-4"
                    :class="{ 'opacity-25': form.processing }"
                    label="Register"
                    :disabled="form.processing"
                />
            </div>
        </form>
    </GuestLayout>
</template>
