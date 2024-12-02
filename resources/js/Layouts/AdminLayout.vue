<template>
    <div class="flex flex-col h-screen">
      <header class="bg-gray-800 text-white p-5">
        <nav class="flex justify-between">
          <ul class="flex space-x-4">
            <li><router-link to="/">Home</router-link></li>
            <li><router-link to="/about">About</router-link></li>
            <li><router-link to="/nurse-assistant">Nurse Assistant</router-link></li>
            <li><router-link to="/home-health-aide">Home Health Aide</router-link></li>
            <li><router-link to="/medication-administration">Medication Administration</router-link></li>
            <li><router-link to="/bls-cpr-aed">BLS/CPR/AED</router-link></li>
            <li><router-link to="/contact">Contact</router-link></li>
          </ul>
          <div class="flex space-x-4">
            <router-link to="/login" class="hover:underline">Login</router-link>
            <router-link to="/signup" class="hover:underline">Signup</router-link>
          </div>
        </nav>
      </header>
  
      <main class="flex-1 p-5">
        <h1 class="text-3xl">Hello Admin</h1>
        <p>Welcome to your dashboard. Here you can manage users, view reports, and adjust settings.</p>
      </main>
  
      <footer class="bg-gray-800 text-white p-5">
        <p>© 2024 Above and Beyond Care. All rights reserved.</p>
        <p>
          <router-link to="/privacy-policy" class="hover:underline">Privacy Policy</router-link> |
          <router-link to="/terms-of-service" class="hover:underline">Terms of Service</router-link>
        </p>
      </footer>
    </div>
  </template>
  
  <script setup>
  import { defineComponent } from 'vue';
  
  defineComponent({});
  </script>
  
  <style scoped>
  /* Add your styles here if needed */
  </style>
  