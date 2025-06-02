<script setup>
import { ref } from 'vue';
import { Head, Link, router } from '@inertiajs/vue3';
import Banner from '@/Components/Banner.vue';
import Dropdown from '@/Components/Dropdown.vue';
import DropdownLink from '@/Components/DropdownLink.vue';
import NavLink from '@/Components/NavLink.vue';
import ResponsiveNavLink from '@/Components/ResponsiveNavLink.vue';

defineProps({
  title: String,
});

const showingNavigationDropdown = ref(false);

const logout = () => {
  router.post(route('logout'));
};
</script>

<template>
  <div>
    <Head :title="title" />

    <Banner />

    <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
   <nav class="bg-white dark:bg-gray-800 border-b border-gray-100 dark:border-gray-700 font-sans">
  <!-- Match main content width (like search & result cards) -->
  <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
    <div class="flex justify-between items-center h-16">
        
        <!-- Logo + Title -->
        <div class="flex items-center space-x-3">
            <Link :href="route('dashboard')">
            <img src="/images/cucumber.png" alt="Matpriskollen logo" class="h-9 w-9 object-contain" />
            </Link>
            <span class="text-xl font-bold text-green-700 tracking-wide">
            TURBULENTA TIDER.
            </span>
        </div>

        <!-- Right Side (User Avatar or Login/Register) -->
        <div>
            <template v-if="$page.props.auth.user">
            <Dropdown align="right" width="48">
                <template #trigger>
                <button class="flex text-sm border-2 border-transparent rounded-full focus:outline-none">
                    <img class="h-9 w-9 rounded-full object-cover" :src="$page.props.auth.user.profile_photo_url" :alt="$page.props.auth.user.name ?? 'Användare'">
                </button>
                </template>
                <template #content>
                <DropdownLink :href="route('profile.show')">Profil</DropdownLink>
                <form @submit.prevent="logout">
                    <DropdownLink as="button">Logga ut</DropdownLink>
                </form>
                </template>
            </Dropdown>
            </template>
            <template v-else>
            <div class="space-x-3 text-sm">
                <Link :href="route('login')" class="text-gray-600 hover:text-green-700">Logga in</Link>
                <Link :href="route('register')" class="text-green-700 font-semibold">Skapa konto</Link>
            </div>
            </template>
        </div>
        </div>
    </div>
    </nav>


      <header v-if="$slots.header" class="bg-white dark:bg-gray-800 shadow">
        <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
          <slot name="header" />
        </div>
      </header>

      <main>
        <slot />
      </main>
    </div>
  </div>
</template>

