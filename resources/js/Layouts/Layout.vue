<script setup>
const companyName = import.meta.env.VITE_COMPANY_NAME || 'Above and Beyond Care'; // Default value if env variable is not set

const logo = new URL('../assets/images/logo.png', import.meta.url).href;

const favicon = new URL('../assets/images/favicon_io/favicon.ico', import.meta.url).href;

</script>

<template>
    <Head>
        <link rel="icon" type="image/x-icon" :href="favicon" />
</Head>
    <div class="min-h-screen flex flex-col">
        <header class="bg-white h-20 w-full fixed top-0 z-50 shadow flex justify-between items-stretch px-3">
            <!-- Logo with responsive sizing -->
            <Link v-if="!$page.props.auth.user" :href="route('home')" class="text-indigo-600 font-bold flex items-center pl-5" >
                <img :src="logo" class="w-40 h-auto sm:w-60" /><!-- sm:-60Smaller logo on mobile -->
            </Link>
            <div class="flex-grow hidden sm:flex justify-center">
                <div class="flex items-stretch" v-if="!$page.props.auth.user">
                    <Link :href="route('home')" class="flex items-center font-bold text-gray-800 px-3 transition-colors hover:text-indigo-600 hover:bg-lime-200" :class="{ 'bg-slate-200' : $page.component === 'Home' }" >HOME</Link>
                    <Link :href="route('about')" class="flex items-center text-gray-800 px-3 transition-colors hover:text-indigo-600 hover:hover:bg-lime-200" :class="{ 'bg-slate-200' : $page.component === 'About' }">ABOUT</Link>
                    <Link :href="route('nurseassistant')" class="flex items-center text-gray-800 px-3 transition-colors hover:text-indigo-600 hover:hover:bg-lime-200" :class="{ 'bg-slate-200' : $page.component === 'NurseAssistant' }">NURSE ASSISTANT</Link>
                    <Link :href="route('homehealthaid')" class="flex items-center text-gray-800 px-3 transition-colors hover:text-indigo-600 hover:hover:bg-lime-200" :class="{ 'bg-slate-200' : $page.component === 'HomeHealthAid' }">HOME HEALTH AIDE</Link>
                    <Link :href="route('medicationadmini')" class="flex items-center text-gray-800 px-3 transition-colors hover:text-indigo-600 hover:hover:bg-lime-200" :class="{ 'bg-slate-200' : $page.component === 'MedicationAdmini' }">MEDICATION ADMINISTRATION</Link>
                    <Link :href="route('bls-cpr-aed')" class="flex items-center text-gray-800 px-3 transition-colors hover:text-indigo-600 hover:hover:bg-lime-200" :class="{ 'bg-slate-200' : $page.component === 'BlsCpr' }">BLS/CPR/AED</Link>
                    <Link :href="route('contact')" class="flex items-center text-gray-800 px-3 transition-colors hover:text-indigo-600 hover:hover:bg-lime-200" :class="{ 'bg-slate-200' : $page.component === 'Contact' }">CONTACT</Link>
                </div>

                <div class="flex items-stretch no-print" v-else >
                    <Link :href="route('admin.dashboard')" class="flex items-center font-bold text-gray-800 px-3 transition-colors hover:text-indigo-600 hover:bg-lime-200" :class="{ 'bg-slate-200' : $page.component === 'DashBoard' }" >DashBoard</Link>
                    <Link :href="route('admin.settings')" class="flex items-center font-bold text-gray-800 px-3 transition-colors hover:text-indigo-600 hover:hover:bg-lime-200" :class="{ 'bg-slate-200' : $page.component === 'Settings' }">Settings</Link>
                </div>
            </div>    
                <!-- Logout visible when Auth -->
            <div v-if="$page.props.auth.user" class="flex items-center ml-0 no-print">
                <Link 
                :href="route('logout')" 
                method="post" 
                as="button" 
                type="button" 
                class="bg-indigo-600 text-white py-1 px-3 rounded hover:bg-indigo-700 transition-colors ring-offset-1 focus:ring-1 focus:ring-indigo-700">
                Logout
                </Link>
            </div>
                <!-- Login and Signup always visible when not Auth-->
                <div v-else class="flex items-center ml-10">
                <Link :href="route('login')" class="text-black py-1 px-3 transition-colors hover:text-indigo-500 hover:bg-indigo-100 rounded mx-3">Login</Link>
                <Link :href="route('register')" class="bg-indigo-600 text-white py-1 px-3 rounded hover:bg-indigo-700 transition-colors ring-offset-1 focus:ring-1 focus:ring-indigo-700">Signup</Link>
            </div>
            <!-- Mobile Menu Button -->
            <div class="sm:hidden h-full flex items-center ml-4">
                <button class="flex items-center justify-center h-8 w-8 rounded transition-colors hover:bg-indigo-100 hover:text-indigo-600">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="w-6 h-6">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5" />
                    </svg>
                </button>
            </div>
            
        </header>

        <main class="flex-grow p-4 mt-20">
            <slot />
        </main>

        <footer class="bg-gray-800 text-white py-4 mt-4">
            <div class="container mx-auto text-center">
                <p>&copy; {{ new Date().getFullYear() }} {{ companyName }}. All rights reserved.</p>
                <div class="flex justify-center space-x-4 mt-2">
                    <Link :href="route('privacy')" class="hover:text-indigo-400">Privacy Policy</Link>
                </div>
            </div>
        </footer>
    </div>
</template>
