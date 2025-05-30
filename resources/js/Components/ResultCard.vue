<!-- <script setup>
defineProps({
  result: Object
});
</script>

<template>
  <div class="p-4 border rounded bg-white shadow">
    <div class="text-xl font-semibold">
      {{ result.product }}
    </div>
    <div class="text-gray-700">
      {{ result.price }} kr på {{ result.store }}
    </div>
    <p v-if="result.distance" class="text-sm text-gray-500">
      Avstånd: {{ result.distance }} km
    </p>
    <a
      v-if="result.store_coords"
      :href="`https://www.google.com/maps/search/?api=1&query=${result.store_coords}`"
      target="_blank"
      class="text-blue-500 text-sm hover:underline"
    >
      Visa på karta
    </a>
  </div>
</template> -->
<script setup>
import { ref } from 'vue'

defineProps({
  result: Object,
})

const showMapModal = ref(false)
</script>

<template>
  <div class="p-4 border rounded bg-white shadow">
    <div class="text-xl font-semibold">
      {{ result.product }}
    </div>

    <div class="text-gray-700">
      {{ result.price }} kr på {{ result.store }}
    </div>

    <p v-if="result.distance" class="text-sm text-gray-500">
      Avstånd: {{ result.distance }} km
    </p>

    <!-- Mini Map preview -->
    <div
      v-if="result.store_coords"
      class="mt-2 cursor-pointer border rounded overflow-hidden"
      @click="showMapModal = true"
    >
      <iframe
        class="w-full h-40"
        :src="`https://www.google.com/maps?q=${result.store_coords}&z=15&output=embed`"
        frameborder="0"
        allowfullscreen
      ></iframe>
    </div>

    <!-- Modal -->
    <div
      v-if="showMapModal"
      class="fixed inset-0 z-50 bg-black bg-opacity-60 flex items-center justify-center"
      @click.self="showMapModal = false"
    >
      <div class="bg-white rounded-lg overflow-hidden w-full max-w-2xl">
        <div class="flex justify-between items-center p-4 border-b">
          <h2 class="text-lg font-semibold">Plats för {{ result.store }}</h2>
          <button @click="showMapModal = false" class="text-gray-500 hover:text-gray-700 text-xl">&times;</button>
        </div>
        <iframe
          class="w-full h-[500px]"
          :src="`https://www.google.com/maps?q=${result.store_coords}&z=15&output=embed`"
          frameborder="0"
          allowfullscreen
        ></iframe>
      </div>
    </div>

    <!-- Optional: fallback link -->
    <a
      v-if="result.store_coords"
      :href="`https://www.google.com/maps/search/?api=1&query=${result.store_coords}`"
      target="_blank"
      class="text-blue-500 text-sm hover:underline block mt-2"
    >
      Visa på karta (extern länk)
    </a>
  </div>
</template>






