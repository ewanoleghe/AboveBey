<template>
    <Head title=" | Registration" />
    <div class="bg-lime-300 text-center mb-3 -mt-3">
        <h1 class="text-3xl font-bold p-6">User Registration</h1>
    </div>

    <div class="flex flex-wrap mx-2 justify-center">
        <div class="flex-none w-full md:w-1/4 mb-2 md:mb-4 p-4 bg-gray-200 rounded-lg shadow-md min-w-[220px]">
            <form @submit.prevent="submit" class="space-y-6">

                <TextInput
                    v-model="form.name"
                    name="Name"
                    :message="form.errors.name"
                />

                <TextInput
                    v-model="form.email"
                    name="Email"
                    type="email"
                    :message="form.errors.email"
                />

                <TextInput
                    v-model="form.password"
                    name="Password"
                    type="password"
                    :message="form.errors.password"
                />

                <TextInput
                    v-model="form.password_confirmation"
                    name="Password Confirmation"
                    type="password"
                />

                <TextInput
                    v-model="form.authcode"
                    name="Auth Code"
                    type="password"
                    :message="form.errors.authcode"
                />

                <div>
                    <p class="text-slate-600 mb-2">
                        Already a user? <Link :href="route('login')" class="text-blue-600 underline">Login</Link>
                    </p>
                    <button 
                        class="bg-lime-400 text-black font-bold py-2 px-4 w-full rounded hover:bg-lime-500 transition duration-200" 
                        :disabled="form.processing">
                        <span v-if="form.processing">Registering...</span>
                        <span v-else>Register</span>
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
    name: '',
    email: '',
    password: '',
    password_confirmation: '',
    authcode: '',
    errors: {},
    processing: false,
});

const submit = () => {
    form.processing = true;

    form.post(route('register'), {
        onSuccess: () => {
            form.reset(); // Reset all fields on success
            form.processing = false;
        },
        onError: (errors) => {
            form.errors = errors; // Store errors in form
            form.processing = false;
            
            // Reset specific fields on error
            form.password = null; // or '' depending on your setup
            form.password_confirmation = null; // or ''
            form.authcode = null; // or ''
        },
    });
};
</script>
