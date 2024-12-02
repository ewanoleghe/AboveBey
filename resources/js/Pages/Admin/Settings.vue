<template>
    <Head title=" | Admin Settings" />
    <div class="bg-gray-200 text-center mb-3 -mt-3">
        <h1 class="text-3xl">Hello, {{ user.name }}.</h1>
        <h6 class="text-sm font-bold">{{ user.email }}</h6>
    </div>

    <div class="flex flex-wrap mx-2 justify-center">
        <!-- Admin Settings Header -->
        <div class="flex-none w-full md:w-1/12 mb-2 md:mb-4 p-4 rounded-lg min-w-[220px]">
            <h1 class="text-2xl font-bold">Admin Settings <br> Classes</h1>
        </div>

        <!-- Update User Details -->
        <div class="flex-none w-full md:w-4/6 mb-2 md:mb-4 p-4 mx-2 bg-orange-300 rounded-lg shadow-md min-w-[220px]">
            <div class="p-4">
                <h2 class="text-xl font-bold">Update Your Details</h2>
                <hr class="border-t-2 border-black">

                <form @submit.prevent="handleUpdate">
                    <div class="mb-4">
                        <label for="name" class="block text-gray-700">Name</label>
                        <input
                            v-model="userForm.name"
                            type="text"
                            id="name"
                            class="mt-1 block w-full p-2 border rounded"
                            required
                        />
                    </div>

                    <div class="mb-4">
                        <label for="email" class="block text-gray-700">Email</label>
                        <input
                            v-model="userForm.email"
                            type="email"
                            id="email"
                            class="mt-1 block w-full p-2 border rounded"
                            required
                        />
                    </div>

                    <div class="mb-4">
                        <label for="password" class="block text-gray-700">New Password</label>
                        <input
                            v-model="userForm.password"
                            type="password"
                            id="password"
                            class="mt-1 block w-full p-2 border rounded"
                            placeholder="Leave blank if not changing"
                        />
                    </div>

                    <div class="mb-4">
                        <label for="password_confirmation" class="block text-gray-700">Confirm Password</label>
                        <input
                            v-model="userForm.password_confirmation"
                            type="password"
                            id="password_confirmation"
                            class="mt-1 block w-full p-2 border rounded"
                            placeholder="Leave blank if not changing"
                        />
                    </div>

                    <button 
                        type="submit"
                        class="bg-blue-500 text-white p-2 rounded"                        
                    >
                        Update Settings
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref } from 'vue';
import { useForm } from '@inertiajs/vue3';

const props = defineProps({
    user: Object,
});

// Initialize the user settings form
const userForm = useForm({
    name: props.user?.name || '', // Use props to set initial values
    email: props.user?.email || '',
    password: '',
    password_confirmation: '', // For confirming the password
});

// Validate the password
const validatePasswords = () => {
    if (userForm.password !== userForm.password_confirmation) {
        alert('Passwords do not match.');
        return false;
    }
    return true;
};

// Handle form submission
const handleUpdate = async () => {
    if (!validatePasswords()) return;

    try {
        await userForm.post(route('SubmitAdminSettings'));
        alert('Settings updated successfully!');
    } catch (error) {
        console.error('Error updating settings:', error);
        alert('Failed to update settings. Please try again.');
    }
};
</script>
