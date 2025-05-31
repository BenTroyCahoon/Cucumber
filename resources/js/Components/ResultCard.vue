<!-- <script setup>
import { ref } from 'vue'
import { usePage, router } from '@inertiajs/vue3'
import { Eye, EyeOff } from 'lucide-vue-next'

const props = defineProps({
  result: Object,
})

const page = usePage()
const user = page.props.auth?.user

const isSaved = ref(false)
const showMapModal = ref(false)

const toggleWatch = () => {
  if (!user) {
    alert('Registrera dig för att kunna bevaka produkter!')
    return
  }

  isSaved.value = !isSaved.value

  if (isSaved.value) {
    router.post(route('saved-products.store'), { product_id: props.result.id })
  } else {
    router.delete(route('saved-products.destroy', props.result.id))
  }
}
</script>

<template>
  <div class="p-4 border rounded bg-white shadow relative">
    <button @click="toggleWatch" class="absolute top-2 right-2 text-gray-400 hover:text-blue-500">
      <Eye v-if="!isSaved" class="size-5" />
      <EyeOff v-else class="size-5" />
    </button>

    <div class="text-xl font-semibold">
      {{ result.product }}
    </div>

    <div class="text-gray-700">
      {{ result.price }} kr på {{ result.store }}
    </div>

    <p v-if="result.distance" class="text-sm text-gray-500">
      Avstånd: {{ result.distance }} km
    </p>

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

    <a
      v-if="result.store_coords"
      :href="`https://www.google.com/maps/search/?api=1&query=${result.store_coords}`"
      target="_blank"
      class="text-blue-500 text-sm hover:underline block mt-2"
    >
      Visa på karta (extern länk)
    </a>
  </div>
</template> -->
<!-- <script setup>
import { ref } from 'vue'
import { usePage, router } from '@inertiajs/vue3'
import { Eye, EyeOff } from 'lucide-vue-next'

const props = defineProps({
  result: Object
})

const page = usePage()
const user = page.props.auth?.user

const isSaved = ref(false)
const showMapModal = ref(false)

const toggleWatch = () => {
  if (!user) {
    alert('Registrera dig för att kunna bevaka produkter!')
    return
  }

  isSaved.value = !isSaved.value

  if (isSaved.value) {
    router.post(route('saved-products.store'), { product_id: props.result.id })
  } else {
    router.delete(route('saved-products.destroy', props.result.id))
  }
}
</script>

<template>
  <div class="p-4 border rounded bg-white shadow relative">

    <button @click="toggleWatch" class="absolute top-2 right-2 text-gray-400 hover:text-blue-500">
      <Eye v-if="!isSaved" class="size-5" />
      <EyeOff v-else class="size-5" />
    </button>

    <div class="text-xl font-semibold">
      {{ result.product }}
    </div>
    <div class="text-gray-700">
      {{ result.price }} kr på {{ result.store }}
    </div>
    <p v-if="result.distance" class="text-sm text-gray-500">
      Avstånd: {{ result.distance }} km
    </p>

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


    <transition name="fade">
      <div
        v-if="showMapModal"
        class="fixed inset-0 z-50 bg-black bg-opacity-70 flex items-center justify-center px-4"
      >
        <div class="bg-white rounded-xl shadow-xl overflow-hidden max-w-4xl w-full relative">
          <div class="flex justify-between items-center p-4 border-b">
            <h2 class="text-lg font-semibold">Plats för {{ result.store }}</h2>
            <button @click="showMapModal = false" class="text-gray-600 hover:text-black text-2xl leading-none">&times;</button>
          </div>
          <iframe
            class="w-full h-[600px]"
            :src="`https://www.google.com/maps?q=${result.store_coords}&z=15&output=embed`"
            frameborder="0"
            allowfullscreen
          ></iframe>
        </div>
      </div>
    </transition>

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

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.3s ease;
}
.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style> -->
<script setup>
import { ref, onMounted, onUnmounted } from 'vue'
import { usePage, router } from '@inertiajs/vue3'
import { Eye, EyeOff } from 'lucide-vue-next'

const props = defineProps({
  result: Object,
})

const page = usePage()
const user = page.props.auth?.user

const isSaved = ref(false)
const showMapModal = ref(false)

const toggleWatch = () => {
  if (!user) {
    alert('Registrera dig för att kunna bevaka produkter!')
    return
  }

  isSaved.value = !isSaved.value

  if (isSaved.value) {
    router.post(route('saved-products.store'), { product_id: props.result.id })
  } else {
    router.delete(route('saved-products.destroy', props.result.id))
  }
}

// Optional: Close modal with ESC key
const handleKey = (e) => {
  if (e.key === 'Escape') {
    showMapModal.value = false
  }
}

onMounted(() => window.addEventListener('keydown', handleKey))
onUnmounted(() => window.removeEventListener('keydown', handleKey))
</script>

<template>
  <div class="p-4 border rounded bg-white shadow relative">
    <!-- Watch toggle -->
    <button @click="toggleWatch" class="absolute top-2 right-2 text-gray-400 hover:text-blue-500">
      <Eye v-if="!isSaved" class="size-5" />
      <EyeOff v-else class="size-5" />
    </button>

    <div class="text-xl font-semibold">
      {{ result.product }}
    </div>
    <div class="text-gray-700">
      {{ result.price }} kr på {{ result.store }}
    </div>
    <p v-if="result.distance" class="text-sm text-gray-500">
      Avstånd: {{ result.distance }} km
    </p>

    <!-- Map preview with hover effect -->
    <div
      v-if="result.store_coords"
      class="mt-2 relative cursor-pointer border rounded overflow-hidden group"
      @click="showMapModal = true"
    >
      <iframe
        class="w-full h-40 pointer-events-none"
        :src="`https://www.google.com/maps?q=${result.store_coords}&z=15&output=embed`"
        frameborder="0"
        allowfullscreen
      ></iframe>
      <div
        class="absolute inset-0 bg-black bg-opacity-30 flex items-center justify-center opacity-0 group-hover:opacity-100 transition-opacity"
      >
        <span class="text-white text-sm font-medium">Visa större karta</span>
      </div>
    </div>

    <!-- Modal with larger map -->
    <transition name="fade">
      <div
        v-if="showMapModal"
        class="fixed inset-0 z-50 bg-black bg-opacity-70 flex items-center justify-center px-4"
        @click.self="showMapModal = false"
      >
        <div class="bg-white rounded-xl shadow-xl overflow-hidden max-w-4xl w-full relative">
          <div class="flex justify-between items-center p-4 border-b">
            <h2 class="text-lg font-semibold">Plats för {{ result.store }}</h2>
            <button @click="showMapModal = false" class="text-gray-600 hover:text-black text-2xl leading-none">&times;</button>
          </div>
          <iframe
            class="w-full h-[600px]"
            :src="`https://www.google.com/maps?q=${result.store_coords}&z=15&output=embed`"
            frameborder="0"
            allowfullscreen
          ></iframe>
        </div>
      </div>
    </transition>

    <!-- External fallback link -->
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

<style scoped>
.fade-enter-active,
.fade-leave-active {
  transition: opacity 0.3s ease;
}
.fade-enter-from,
.fade-leave-to {
  opacity: 0;
}
</style>


