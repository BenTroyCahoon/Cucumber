<script setup>
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
</template>





