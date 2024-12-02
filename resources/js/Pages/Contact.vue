<template>
    <Head title=" | Contact" />
    <div class="bg-lime-300 text-center mb-3 -mt-3">
        <h1 class="text-3xl font-bold p-6">NATCEP-Accredited and Endorsed In-Person NURSE AIDE/ASSISTANT (CNA) Training Courses</h1>
        
    </div>

        <div class="flex flex-wrap mx-2 justify-center">
            <!-- column 4 Hidden -->
            <div class="flex-none w-full md:w-1/12 mb-2 md:mb-4 p-4 rounded-lg min-w-[220px]">
                <h1 class="text-2xl font-bold">{{ 'Contact Us' }}</h1>
            </div>
            <!-- column 2 -->
            <div class="flex-none w-full md:w-1/3 mb-2 md:mb-4 p-4 mx-2 bg-gray-200 rounded-lg shadow-md min-w-[220px]">

                <div class="flex flex-col md:flex-row justify-center space-x-0 md:space-x-4 h-full">
                    <div class="w-full md:w-3/3 bg-lime-300 flex flex-col justify-between mb-4 md:mb-0">
                        <img class="w-full h-72 object-cover"  :src="cna_group"  alt="CNA" />
                        <div class="p-4 flex-grow">
                            <h2 class="text-xl font-bold">Our Address - Above and Beyond Care</h2> 
                            <hr class="border-t-2 border-black">
                            <p class="p-4 text-center text-2xl">
                                1152 Saint Georges Avenue, <br >Woodbridge, New Jersey 07001, <br >United States
                            </p>
                            <p class="font-bold p-2 text-center text-2xl">
                                <a href="tel:7326341057">Tel: (732)-634-1057</a>
                            </p>
                            <hr class="border-t-1 border-gray-400 mb-5 py-2">
                            <!-- MAP Goes Here-->
                            <div style="overflow:hidden; position:relative; width:100%; height:0; padding-bottom:77.25%;">
                                <iframe 
                                    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3021.8590836356285!2d-74.28668308459267!3d40.5729919793525!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c3f34a645372bd%3A0x4da5d44d49ee789c!2s1152%20Saint%20Georges%20Ave%2C%20Woodbridge%2C%20NJ%2007001%2C%20USA!5e0!3m2!1sen!2s!4v1602203173484!5m2!1sen!2s" 
                                    width="600" 
                                    height="450" 
                                    style="border:0; position:absolute; top:0; left:0; width:100%; height:100%;" 
                                    allowfullscreen="" 
                                    loading="lazy">
                                </iframe>
                            </div>
                        </div>
                        <!-- <Link :href="route('nurseassistant')" class="bg-lime-400 text-black font-bold py-2 px-4 w-full rounded text-center">View More</Link> -->
                    </div>
                </div>
            </div>
         <!-- column 3 -->

        <div class="flex-none w-full md:w-1/3 mb-2 md:mb-4 p-4 mx-2 bg-gray-200 rounded-lg shadow-md min-w-[220px]">

            <div class="flex flex-col md:flex-row justify-center space-x-0 md:space-x-4 h-full">
                    <div class="w-full md:w-3/3 bg-orange-300 flex flex-col justify-between mb-4 md:mb-0">
                        <img class="w-full h-72 object-cover" :src="medical" alt="MedAdmin" />
                        <div class="p-4 flex-grow">
                            <h2 class="text-xl font-bold">Drop us a line</h2> 
                            <hr class="border-t-2 border-black mb-5">
                            <p v-if="$page.props.flash.message" class="p-4 bg-green-200">{{ $page.props.flash.message }} </p>
                            <p v-if="$page.props.flash.message_body" class="p-4 bg-green-200">  {{ $page.props.flash.message_body }}  </p>
                            <p class="text-center font-bold  p-2">Let's get this conversation started. tell us a bit more about yourself, and we will get in touch as soon as we can.</p>
                            <hr class="border-t-1 border-gray-400 mb-5 py-2">
                            <form @submit.prevent="submit" class="flex flex-col space-y-4">
                                <div class="flex flex-col sm:flex-row">
                                    <label class="w-full sm:w-1/3 mb-2 sm:mb-0" for="name">Full Name</label>
                                    <TextInput 
                                        v-model="form.name" 
                                        :message="form.errors.name" 
                                        :disabled="form.disabled"  
                                        class="w-full sm:w-2/3" 
                                    />
                                </div>

                                <div class="flex flex-col sm:flex-row">
                                    <label class="w-full sm:w-1/3 mb-2 sm:mb-0" for="email">Email Address</label>
                                    <TextInput 
                                        type="email" 
                                        v-model="form.email" 
                                        :message="form.errors.email" 
                                        :disabled="form.disabled"  
                                        class="w-full sm:w-2/3" 
                                    />
                                </div>

                                <div class="flex flex-col sm:flex-row">
                                    <label class="w-full sm:w-1/3 mb-2 sm:mb-0" for="phone">Phone Number</label>
                                    <TextInput 
                                        type="tel" 
                                        v-model="form.phone" 
                                        :message="form.errors.phone" 
                                        :disabled="form.disabled"  
                                        class="w-full sm:w-2/3" 
                                    />
                                </div>

                                <div class="flex flex-col sm:flex-row">
                                    <label class="w-full sm:w-1/3 mb-2 sm:mb-0" for="message">Message</label>
                                    <textarea 
                                        class="w-full sm:w-2/3 mt-2 h-32 border rounded p-2 mb-4"
                                        name="content" 
                                        v-model="form.content" 
                                        :disabled="form.disabled"  
                                    ></textarea>
                                    <small class="text-red-900 font-bold" v-if="form.errors.content">{{ form.errors.content }}</small> 
                                </div>

                                        <!-- CHECKBOX -->
                                <div class="flex items-center mb-4">
                                    <input 
                                        type="checkbox" 
                                        id="agree" 
                                        v-model="form.agree" 
                                        :disabled="form.disabled" 
                                        class="mr-2"
                                    />
                                    <label for="agree" class="text-sm">
                                        *By sending this message, you agree to receive marketing messaging (email/SMS) from Above and Beyond Care Training. Data rates may apply.
                                    </label>
                                </div>

                                <!-- Error message for missing checkbox -->
                                <small v-if="form.errors.agree" class="text-red-900 font-bold">
                                    You must agree to receive marketing messages to proceed.
                                </small>
                                
                                 <!-- reCAPTCHA -->
                                <div class="g-recaptcha" 
                                    data-sitekey="YOUR_SITE_KEY" 
                                    @recaptcha="onRecaptcha" 
                                    data-callback="onRecaptcha">
                                </div>

                                <small v-if="form.errors.recaptcha" class="text-red-900 font-bold">
                                    You must complete the reCAPTCHA to submit the form.
                                </small>


                                        
                                <div> 
                                    <button 
                                        class="font-bold py-2 px-4 w-full rounded text-center relative flex items-center justify-center" 
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
                                        <span v-if="!form.processing">Send It</span>
                                        <span v-if="form.processing" class="ml-8">Sending...</span>
                                    </button>
                                </div>
                            </form>
 
                        </div>
                    </div>
            </div>

        </div>
                <!-- column 4 Hidden -->

        <div class="flex-none w-full md:w-1/12 mb-2 md:mb-4 p-4 rounded-lg min-w-[220px]">
        </div>
    </div>

    <!-- row 2 -->
    <div class="flex flex-wrap mx-2 justify-center">
        <div class="flex-none w-full md:w-1/12 mb-2 md:mb-4 p-4 rounded-lg min-w-[220px]">
            <h1 class="text-3xl font-bold"></h1>
        </div>
        <div class="flex-none w-full md:w-1/3 mb-2 md:mb-4 p-4 mx-2 bg-gray-200 rounded-lg shadow-md min-w-[220px]">
            <h2 class="text-xl font-semibold">Column 1 Row 1</h2>
            <p>Content for column 1 Row 1 goes here.</p>
        </div>
        <div class="flex-none w-full md:w-1/3 mb-2 md:mb-4 p-4 mx-2 bg-gray-200 rounded-lg shadow-md min-w-[220px]">
            <h2 class="text-xl font-semibold">Column 2 Row 2</h2>
            <p>Content for column 2 Row 2 goes here.</p>
        </div>
        <div class="flex-none w-full md:w-1/12 mb-2 md:mb-4 p-4 rounded-lg min-w-[220px]">
        </div>
    </div>
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';
import TextInput from "./Components/TextInput.vue";
import { onMounted } from 'vue';

const form = useForm({
    name: null,
    email: null,
    phone: null,
    content: null,
    recaptcha: null,  // Store the reCAPTCHA response here
    agree: false,  // Track checkbox state
    disabled: false, // Track disabled state
});

const siteKey = import.meta.env.VITE_RECAPTCHA_SITE_KEY;

const onRecaptcha = (response) => {
    console.log('reCAPTCHA Response:', response);
    form.recaptcha = response;  // Save the reCAPTCHA response token
};

onMounted(() => {
    const script = document.createElement('script');
    script.src = 'https://www.google.com/recaptcha/api.js';
    script.async = true;
    script.defer = true;
    document.head.appendChild(script);

    script.onload = () => {
        const recaptchaDiv = document.getElementById('recaptcha');
        if (window.grecaptcha && recaptchaDiv) {
            window.grecaptcha.render('recaptcha', {
                sitekey: 'YOUR_ACTUAL_SITE_KEY',
                callback: onRecaptcha,
            });
        }
    };
});


const submit = () => {
    form.post(route('contact'), {    // OR form.post('/contact', {   since we using ziggy
        preserveScroll: true,
        data: {
            recaptcha: form.recaptcha,  // Send the reCAPTCHA token with the form
        },
        // onError: () => form.reset()
        onSuccess: () => {
            form.name = null;
            form.email = null;
            form.phone = null;
            form.content = null;
            form.recaptcha = null;

            // Disable all input fields
            form.disabled = true;
        },
    });

};

const cna_group = new URL('../assets/images/cna_group.jpg', import.meta.url).href
const HHA = new URL('../assets/images/HHA.jpg', import.meta.url).href
const medical = new URL('../assets/images/medical.jpg', import.meta.url).href
const bls = new URL('../assets/images/bls.jpg', import.meta.url).href

</script>
