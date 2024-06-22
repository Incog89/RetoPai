<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, useForm } from '@inertiajs/vue3';
import InputLabel from '@/Components/InputLabel.vue';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const initialValues = {
    name: '',
    email: '',
    phone: '',
    birthdate: null,
    address: null
}

const form = useForm(initialValues)

const submit = () => {
    form.post(route('client.store'))
}

</script>

<template>
    <Head title="Crear Clientes" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Crear Cliente Nuevo</h2>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="flex justify-center bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <form class="w-1/3 py-5 space-y-3" @submit.prevent="submit">
                        <div>
                            <InputLabel for="name" value="Nombre" />

                            <TextInput
                                id="name"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.name"
                                required
                                autofocus
                                autocomplete="name"
                                placeholder="Ej.- Eduardo Bustos Moran"
                            />

                            <InputError class="mt-2" :message="form.errors.name" />
                        </div>

                        <div>
                            <InputLabel for="email" value="Email" />

                            <TextInput
                                id="email"
                                type="email"
                                class="mt-1 block w-full"
                                v-model="form.email"
                                required
                                autocomplete="email"
                                placeholder="Ej.- eduardo@example.com"
                            />

                            <InputError class="mt-2" :message="form.errors.email" />
                        </div>

                        <div>
                            <InputLabel for="phone" value="Teléfono" />

                            <TextInput
                                id="phone"
                                type="tel"
                                class="mt-1 block w-full"
                                v-model="form.phone"
                                required
                                autocomplete="tel"
                                placeholder="Ej.- 1234567890"
                            />

                            <InputError class="mt-2" :message="form.errors.phone" />
                        </div>

                        <div>
                            <InputLabel for="birthdate" value="Fecha de Nacimiento" />

                            <TextInput
                                id="birthdate"
                                type="date"
                                class="mt-1 block w-full"
                                v-model="form.birthdate"
                                required
                                autocomplete="off"
                            />

                            <InputError class="mt-2" :message="form.errors.birthdate" />
                        </div>

                        <div>
                            <InputLabel for="address" value="Dirección" />

                            <TextInput
                                id="address"
                                type="text"
                                class="mt-1 block w-full"
                                v-model="form.address"
                                autocomplete="address"
                                placeholder="Ej.- Calle 123, Ciudad"
                            />

                            <InputError class="mt-2" :message="form.errors.address" />
                        </div>
                        <div class="flex justify-center">
                            <PrimaryButton>
                                Crear Cliente
                            </PrimaryButton>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
