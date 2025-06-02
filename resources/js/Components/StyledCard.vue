<template>
  <div class="bg-white dark:bg-gray-800 shadow rounded-2xl p-6 border border-gray-200 dark:border-gray-700">
    <div v-if="title || hasIcon" class="flex items-center mb-4 space-x-3">
      <slot name="icon">
        <img
          src="/images/cucumber.png"
          alt="Logo"
          class="w-6 h-6 object-contain"
        />
      </slot>
      <h3 class="text-lg font-semibold text-gray-900 dark:text-gray-100">
        {{ title }}
      </h3>
    </div>

    <div>
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
