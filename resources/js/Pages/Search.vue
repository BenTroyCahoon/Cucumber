
<template>
  <AppLayout title="Sök matvara">
    <div class="max-w-4xl mx-auto p-4 sm:p-6 min-h-screen bg-green-50">

      <h1 class="text-2xl sm:text-3xl font-bold mb-4">Sök efter matvaror</h1>

      <div class="flex flex-col sm:flex-row sm:items-center gap-4 mb-6">
          <input
          v-model="form.q"
          type="text"
          placeholder="Skriv t.ex. Bananer"
          class="flex-1 p-3 border border-gray-300 rounded shadow-sm focus:ring-green-600 focus:border-green-600"
        />

        <label class="inline-flex items-center gap-2 text-gray-700">
          <input type="checkbox" v-model="form.organic" class="text-green-600 focus:ring-green-500" />
          Endast ekologiskt
        </label>

        <select
          v-model="form.sort"
          class="p-3 pr-8 border border-gray-300 rounded shadow-sm focus:ring-green-600 focus:border-green-600"
        >
          <option value="price">Sortera: Billigast</option>
          <option value="distance">Sortera: Närmast</option>
          <option value="smart">Sortera: Smartast</option>
        </select>
      </div>

      <div v-if="form.q && results.length" class="space-y-4">
      <ResultCard
        v-for="result in results"
        :key="result.product + result.store"
        :result="result"
      />
  </div>

<div v-else-if="form.q" class="text-gray-500 mt-4">Inga resultat hittades.</div>


      <div v-else-if="form.q" class="text-gray-500 mt-4">Inga resultat hittades.</div>
    </div>
  </AppLayout>
</template>

<script setup>
import { ref, watch, onMounted } from 'vue'
import { useForm } from '@inertiajs/vue3'
import AppLayout from '@/Layouts/AppLayout.vue'
import debounce from 'lodash/debounce'
import ResultCard from '@/Components/ResultCard.vue'

const props = defineProps({
  results: Array,
  query: String,
  organic: Boolean,
  sort: String,
})

const form = useForm({
  q: props.query || '',
  organic: props.organic || false,
  latitude: null,
  longitude: null,
  sort: props.sort || 'price',
})

const search = debounce(() => {
  form.get(route('search.index'), {
    preserveState: true,
    replace: true,
  })
}, 500)

watch(() => [form.q, form.organic, form.sort], search)

onMounted(() => {
  navigator.geolocation.getCurrentPosition(
    (pos) => {
      form.latitude = pos.coords.latitude
      form.longitude = pos.coords.longitude
      search()
    },
    (err) => {
      console.warn('Location access denied or failed.', err)
    }
  )
})
</script>
