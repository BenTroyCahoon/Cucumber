<script setup>
import { Head } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
import WatchedResultCard from '@/Components/WatchedResultCard.vue'

const props = defineProps({
  products: Array,
})
</script>

<template>
  <AppLayout title="Mina bevakningar">
    <Head title="Mina bevakningar" />

    <div class="max-w-4xl mx-auto p-4 sm:p-6 bg-green-50 rounded-lg shadow">
      <h1 class="text-2xl sm:text-3xl font-bold text-green-800 mb-6">Mina bevakningar</h1>

      <div v-if="products.length" class="space-y-4">
        <WatchedResultCard
          v-for="product in products"
          :key="product.id"
          :result="product"
        />
      </div>

      <div v-else class="text-gray-500">Du har inga bevakade produkter ännu.</div>
    </div>
  </AppLayout>
</template>
