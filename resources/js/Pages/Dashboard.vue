
<template>
  <AppLayout title="Välkommen">
    <div class="bg-gradient-to-br from-green-50 to-gray-100 min-h-screen py-12 px-6">
      <h1 class="text-3xl sm:text-4xl font-bold text-green-700 mb-8 text-center">Välkommen tillbaka!</h1>

      <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6 max-w-6xl mx-auto">

        <div class="bg-white p-6 rounded-xl shadow hover:shadow-md transition">
          <div class="flex items-center mb-4">
            <svg class="w-6 h-6 text-green-500 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path d="M3 3h18M9 3v18m6-18v18M3 9h18M3 15h18"></path>
            </svg>
            <h2 class="font-semibold text-lg text-green-800">Jämför priser enkelt</h2>
          </div>
          <p class="text-sm text-gray-600">
            Få en översikt av matpriser i olika butiker direkt i mobilen – snabbt och enkelt.
          </p>
        </div>
        
        <div class="bg-white p-6 rounded-xl shadow hover:shadow-md transition">
          <div class="flex items-center mb-4">
            <svg class="w-6 h-6 text-green-500 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path d="M17.657 16.657L13.414 12 17.657 7.343 16.243 6l-6 6 6 6z"></path>
            </svg>
            <h2 class="font-semibold text-lg text-green-800">Se närmast butik</h2>
          </div>
          <p class="text-sm text-gray-600">
            Baserat på din plats visar vi de närmaste butikerna som har varan du söker.
          </p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow hover:shadow-md transition">
          <div class="flex items-center mb-4">
            <svg class="w-6 h-6 text-green-500 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path d="M12 22s8-4 8-10V5a8 8 0 1 0-16 0v7c0 6 8 10 8 10z"></path>
            </svg>
            <h2 class="font-semibold text-lg text-green-800">Spara och bevaka</h2>
          </div>
          <p class="text-sm text-gray-600">
            Bevaka dina favoritvaror – få notis när priset sjunker eller ny butik dyker upp.
          </p>
        </div>

        <div class="bg-white p-6 rounded-xl shadow hover:shadow-md transition">
          <div class="flex items-center mb-4">
            <svg class="w-6 h-6 text-green-500 mr-2" fill="none" stroke="currentColor" stroke-width="2" viewBox="0 0 24 24">
              <path d="M12 11c0-1.104.896-2 2-2s2 .896 2 2-.896 2-2 2-2-.896-2-2zM4 6h16v12H4z"></path>
            </svg>
            <h2 class="font-semibold text-lg text-green-800">Datasäkerhet först</h2>
          </div>
          <p class="text-sm text-gray-600">
            All information lagras säkert. Vi använder kryptering och följer GDPR.
          </p>
        </div>

      </div>
    </div>
  </AppLayout>
</template>

<script setup>
import AppLayout from '@/Layouts/AppLayout.vue'
</script>

