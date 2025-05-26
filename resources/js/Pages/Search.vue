<template>
  <AppLayout title="Sök matvara">
    <div class="max-w-4xl mx-auto p-4 sm:p-6">
      <h1 class="text-2xl sm:text-3xl font-bold mb-4">Sök efter matvaror</h1>

      <div class="flex flex-col sm:flex-row sm:items-center gap-4 mb-6">
        <input
          v-model="form.q"
          type="text"
          placeholder="Skriv t.ex. Bananer"
          class="flex-1 p-3 border rounded"
        />
        <label class="inline-flex items-center gap-2">
          <input type="checkbox" v-model="form.organic" />
          Endast ekologiskt
        </label>
      </div>

      <div v-if="results.length" class="space-y-4">
        <div
          v-for="result in results"
          :key="result.product"
          class="p-4 border rounded bg-white shadow"
        >
          <div class="text-xl font-semibold">
            {{ result.product }}
          </div>
          <div class="text-gray-700">
            {{ result.price }} kr på {{ result.store }}
          </div>
          <a
            v-if="result.store_coords"
            :href="`https://www.google.com/maps/search/?api=1&query=${result.store_coords}`"
            target="_blank"
            class="text-blue-500 text-sm hover:underline"
          >
            Visa på karta
          </a>
        </div>
      </div>

      <div v-else-if="form.q" class="text-gray-500 mt-4">Inga resultat hittades.</div>
    </div>
  </AppLayout>
</template>

<script setup>
import { ref, watch } from 'vue'
import { useForm } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
import { defineProps } from 'vue'
import debounce from 'lodash/debounce'

const props = defineProps({
  results: Array,
  query: String,
  organic: Boolean,
})

const form = useForm({
  q: props.query || '',
  organic: props.organic || false,
})

const search = debounce(() => {
  form.get(route('search.index'), { preserveState: true, replace: true })
}, 500)

watch(() => [form.q, form.organic], search)
</script>


