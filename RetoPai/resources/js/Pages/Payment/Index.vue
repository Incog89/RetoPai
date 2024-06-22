<template>
    <Head title="Crear Pago Stripe" />

    <AuthenticatedLayout>
      <template #header>
        <div class="flex justify-between">
          <h2 class="font-semibold text-xl text-gray-800 leading-tight">Crear Cliente Nuevo</h2>
        </div>
      </template>

      <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
          <div class="flex justify-center bg-white overflow-hidden shadow-sm sm:rounded-lg">
            <div class="flex justify-center">
              <button type="button" class="btn btn-primary" @click="submit" :disabled="loading">
                Compra única
              </button>
            </div>
          </div>
        </div>
      </div>
    </AuthenticatedLayout>
  </template>

<script setup>
  import { ref } from 'vue';
  import axios from 'axios';
  import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
  import { Head } from '@inertiajs/vue3';

    const loading = ref(false);

    const submit = async () => {
    try {
        loading.value = true;

        // Realiza la solicitud al endpoint correcto
        const response = await axios.get('/dashboard/payments/getSession');

        if (response.data.url) {
            window.location.href = response.data.url;
        } else {
            console.error('No URL returned for checkout session.');
        }
    } catch (error) {
        console.error('Error during checkout:', error);
    } finally {
        loading.value = false;
    }
};
</script>

  <style scoped>
  button {
    padding: 10px 20px;
    font-size: 16px;
    color: white;
    background-color: #6772e5;
    border: none;
    cursor: pointer;
    border-radius: 4px;
  }

  button:disabled {
    background-color: #ccc;
    cursor: not-allowed;
  }
  </style>



