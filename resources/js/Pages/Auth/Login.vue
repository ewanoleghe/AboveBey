<template>
    <Head title=" | Login" />
    <div class="bg-lime-300 text-center mb-3 -mt-3">
        <h1 class="text-3xl font-bold p-6">Login</h1>
    </div>

    <div class="flex flex-wrap mx-2 justify-center mt-8 pt-8">
        <div class="flex-none w-full md:w-1/4 mb-2 md:mb-4 p-4 bg-gray-200 rounded-lg shadow-md min-w-[220px]">
            <form @submit.prevent="submit">
                <TextInput 
                    name="Email" 
                    type="email" 
                    v-model="form.email" 
                    :message="form.errors.email" 
                />
                
                <TextInput 
                    name="Password" 
                    type="password" 
                    v-model="form.password" 
                    :message="form.errors.password" 
                />
                <div class="flex items-center justify-between mb-2">
                    <div class="flex items-center gap-2">
                        <input 
                            type="checkbox" 
                            id="remember_me" 
                            v-model="form.remember" 
                        />
                        <label for="remember_me">Remember Me</label>
                    </div>
                    <p class="text-slate-600">
                        Need an account? 
                        <Link :href="route('register')" class="text-link">Register</Link>
                    </p>
                </div>

                <div> 
                    <button 
                        class="bg-lime-400 text-black font-bold py-2 px-4 w-full rounded text-center" 
                        :class="form.processing ? 'bg-white text-black' : 'bg-orange-400 text-black'" 
                        :disabled="form.processing"
                    >
                        <span v-if="form.processing" class="absolute flex items-center">
                            <!-- Spinner SVG -->
                            <svg class="w-5 h-5 animate-spin text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <circle class="opacity-25" cx="12" cy="12" r="10" stroke-width="4"></circle>
                                <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8v2a6 6 0 100 12v2a8 8 0 01-8-8z"></path>
                            </svg>
                        </span>
                        <span v-if="!form.processing">Login</span>
                        <span v-if="form.processing" class="ml-8">Sending Application...</span>
                    </button>

                </div>    
            </form>
        </div>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';
import TextInput from '../Components/TextInputRegister.vue';

const form = useForm({
    email: '',
    password: '',
    remember: false, // Default value for remember me
    errors: {},
    processing: false,
});

const submit = () => {
    form.post(route('login'), { // Change to the correct login route
        onError: () => form.reset('password'),
    });
};
</script>
