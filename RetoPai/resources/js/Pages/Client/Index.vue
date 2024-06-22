<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, Link, usePage, router } from '@inertiajs/vue3';
import { ref } from 'vue';

const page = usePage();
const clients = ref(page.props.clients);
const onDeleteSuccess = (e) => {
    clients.value = e.props.clients;
};

const confirmDelete = (client) => {
    if (window.confirm(`¿Estás seguro de que deseas eliminar a ${client.name}?`)) {
        // Proceed with the deletion if confirmed
        router.delete(route('client.destroy', client.id), {
            onSuccess: onDeleteSuccess,
        });
    }
};
</script>

<template>
    <Head title="Administrar Clientes" />

    <AuthenticatedLayout>
        <template #header>
            <div class="flex justify-between">
                <h2 class="font-semibold text-xl text-gray-800 leading-tight">Clientes</h2>
                <Link :href="route('client.create')">
                    Crear Contacto
                </Link>
            </div>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div className="relative overflow-x-auto">
                        <table className="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
                            <thead className="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                                <tr>
                                    <th scope="col" className="px-6 py-3">
                                        Nombre
                                    </th>
                                    <th scope="col" className="px-6 py-3">
                                        Correo
                                    </th>
                                    <th scope="col" className="px-6 py-3">
                                        Teléfono
                                    </th>
                                    <th scope="col" className="px-6 py-3">
                                        Día De Nacimiento
                                    </th>
                                    <th scope="col" className="px-6 py-3">
                                        Dirección
                                    </th>
                                    <th scope="col" className="px-6 py-3">
                                        Id-Stripe
                                    </th>
                                    <th scope="col" className="px-6 py-3">
                                        Acciones
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="client in clients" :key="client.id" className="bg-white border-b dark:bg-gray-800 dark:border-gray-700">
                                    <th scope="row" className="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                                        {{ client.name }}
                                    </th>
                                    <td className="px-6 py-4">
                                        {{ client.email }}
                                    </td>
                                    <td className="px-6 py-4">
                                        {{ client.phone }}
                                    </td>
                                    <td className="px-6 py-4">
                                        {{ client.birthdate }}
                                    </td>
                                    <td className="px-6 py-4">
                                        {{ client.address}}
                                    </td>
                                    <td className="px-6 py-4">
                                        {{ client.stripe_customer_id }}
                                    </td>
                                    <td className="px-6 py-4">
                                        <div class="space-x-4">
                                            <Link :href="route('client.edit', client.id)">
                                                Editar
                                            </Link>
                                            <button @click.prevent="confirmDelete(client)">
                                                Eliminar
                                            </button>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
