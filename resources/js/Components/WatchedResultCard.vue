<script setup>
import { ref } from 'vue'
import { EyeOff } from 'lucide-vue-next'
import { router } from '@inertiajs/vue3'

const props = defineProps({
  result: Object,
})

const isRemoving = ref(false)

const removeFromWatchlist = () => {
  isRemoving.value = true
  router.delete(route('saved-products.destroy', props.result.id), {
    preserveScroll: true,
    onFinish: () => {
      isRemoving.value = false
    },
  })
}
</script>

<template>
  <div class="p-4 border border-green-200 rounded-lg bg-green-50 shadow-sm relative">

    <button
      @click="removeFromWatchlist"
      class="absolute top-2 right-2 text-green-400 hover:text-red-600"
      :title="'Ta bort från bevakning'"
    >
      <EyeOff class="size-5" />
    </button>

    <div class="text-xl font-bold text-green-800">
      {{ result.product }}
    </div>
    <div class="text-green-700">
      {{ result.price }} kr på {{ result.store }}
    </div>
    <p v-if="result.distance" class="text-sm text-green-600">
      Avstånd: {{ result.distance }} km
    </p>
  </div>
</template>
