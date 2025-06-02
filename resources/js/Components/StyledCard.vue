<template>
  <div class="bg-green-50 border border-green-100 rounded-2xl shadow-md hover:shadow-lg transition p-6">
    <div v-if="title || hasIcon" class="flex items-center mb-4 space-x-3">
      <slot name="icon">
        <img
          src="/images/cucumber.png"
          alt="Logo"
          class="w-6 h-6 object-contain"
        />
      </slot>
      <h3 class="text-lg font-bold text-green-700 tracking-wide uppercase">
        {{ title }}
      </h3>
    </div>

    <div class="text-gray-700 text-sm">
      <slot />
    </div>
  </div>
</template>

<script setup>
import { computed, useSlots } from 'vue';

defineProps({
  title: String,
});

const slots = useSlots();
const hasIcon = computed(() => !!slots.icon);
</script>

