<template>
    <Head title=" | Make CMA CLass" />
    <div class="bg-lime-300 text-center mb-3 -mt-3">
        <h1 class="text-3xl font-bold p-6">Add CMA Training Courses</h1>
        
    </div>

        <div class="flex flex-wrap mx-2 justify-center">
            <!-- column 4 Hidden -->
            <div class="flex-none w-full md:w-1/12 mb-2 md:mb-4 p-4 rounded-lg min-w-[220px]">
                <h1 class="text-2xl font-bold">{{ "Add CMA Training" }} </h1>
            </div>
            <div class="flex-none w-full md:w-3/6 mb-2 md:mb-4 p-4 mx-2 bg-orange-300 rounded-lg shadow-md min-w-[220px]">

                <div class="flex flex-col md:flex-row justify-center space-x-0 md:space-x-4 h-full">
                    <div class="w-full md:w-3/3 bg-gray-200 flex flex-col justify-between mb-4 md:mb-0">
                        <img class="w-full h-72 object-cover"  :src="cna_group"  alt="CMA" />
                        <div class="p-4 flex-grow">
                            <h2 class="text-xl font-bold">{{ "Add CMA Training" }}</h2> 
                            <hr class="border-t-2 border-black mb-4">
                            <h2 class="text-2xl font-bold justify-center text-center p-4">Create a New CMA Programm</h2>
                            <p class="justify-center mb-4 mt-2 text-xl pb-5">
                                Please fill in your details in this Form below to Create a Training Program.
                            </p>
                            <form @submit.prevent="submit" class="flex flex-wrap mt-5">
                                <div class="flex flex-col w-full md:w-5/12 mr-2 mb-4"> <!-- Adjusted for mobile -->
                                    <label for="courseEnd" class="w-1/3 font-bold">Class Start Date</label>
                                    <Datepicker
                                        v-model="form.course_start"
                                        :format="'YYYY-MM-DD'"
                                        placeholder="Select start date"
                                        id="courseStart"
                                        :disabled="form.disabled"
                                        class="border-gray-300 rounded text-gray-700 w-80 h-8"
                                    />
                                </div>

                                <div class="flex flex-col w-full md:w-5/12 mr-2 mb-4"> <!-- Adjusted for mobile -->
                                    <label for="courseEnd" class="w-1/3 font-bold">Class End Date</label>
                                    <Datepicker
                                        v-model="form.course_end"
                                        name="Class Start Time"
                                        :format="'YYYY-MM-DD'"
                                        placeholder="Select end date"
                                        id="courseEnd"
                                        :disabled="form.disabled"
                                        class="border-gray-300 rounded text-gray-700 w-80 h-8"
                                    />
                                </div>

                                <div class="flex flex-col w-full md:w-5/12 mr-2 mb-4"> <!-- Adjusted for mobile -->
                                    <TextInput 
                                        type="text" 
                                        v-model="form.time_start" 
                                        name="Class Start Time"
                                        :message="form.errors.time_start" 
                                        :disabled="form.disabled"  
                                    />
                                </div>

                                <div class="flex flex-col w-full md:w-5/12 mr-2 mb-4"> <!-- Adjusted for mobile -->
                                    <TextInput 
                                        type="text" 
                                        v-model="form.time_end" 
                                        name="Class Start Time"
                                        :message="form.errors.time_end" 
                                        :disabled="form.disabled"  
                                    />
                                </div>

                                <div class="flex flex-col w-full md:w-5/12 mr-2 mb-4"> <!-- Adjusted for mobile -->
                                    <TextInput 
                                        v-model="form.program_name" 
                                        name="New Program Name"
                                        :message="form.errors.program_name" 
                                        :disabled="form.disabled"  
                                    />
                                </div>

                                <div class="flex flex-col w-full mb-4"> <!-- Adjusted for mobile -->
                                    <TextInput 
                                        v-model="form.training_code" 
                                        name="Class Code"
                                        :message="form.errors.training_code" 
                                        :disabled="form.disabled"  
                                        class="w-full"
                                    />
                                </div>

                                <div class="flex flex-col w-full md:w-5/12 mr-2 mb-4"> <!-- Adjusted for mobile -->
                                    <TextInput 
                                        v-model="form.location" 
                                        name="Location"
                                        :message="form.errors.location" 
                                        :disabled="form.disabled"  
                                        class="w-full"
                                    />
                                </div>

                                <div class="flex flex-col w-full md:w-5/12 mr-2 mb-4"> <!-- Adjusted for mobile -->
                                    <TextInput 
                                        v-model="form.class_type"  
                                        name="Class Type"
                                        :message="form.errors.class_type" 
                                        :disabled="form.disabled"  
                                    />
                                </div>

                                <div class="flex flex-col w-full md:w-5/12 mr-2 mb-4"> <!-- Adjusted for mobile -->
                                    <TextInput 
                                        v-model="form.total_hours" 
                                        name="Total Hours Required"
                                        :message="form.errors.total_hours" 
                                        :disabled="form.disabled"  
                                    />
                                </div>

                                <div class="flex flex-col w-full md:w-5/12 mr-2 mb-4">
                                    <TextInput 
                                        v-model="form.application_fee" 
                                        name="Application Fee $"
                                        :message="form.errors.application_fee" 
                                        :disabled="form.disabled" 
                                    />
                                </div>
                                

                                <button 
                                        class="bg-lime-400 text-black font-bold py-2 px-4 w-full rounded text-center" 
                                        :class="form.processing ? 'bg-white text-black' : 'bg-orange-400 text-black'" 
                                        :disabled="form.processing"
                                    >
                                        <span v-if="form.processing" class="absolute flex items-center">
                                            <!-- Spinner SVG -->
                                            <svg class="w-5 h-5 animate-spin text-black" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                                <circle class="opalocation-25" cx="12" cy="12" r="10" stroke-width="4"></circle>
                                                <path class="opalocation-75" fill="currentColor" d="M4 12a8 8 0 018-8v2a6 6 0 100 12v2a8 8 0 01-8-8z"></path>
                                            </svg>
                                        </span>
                                        <span v-if="!form.processing">Submit to Create New Class</span>
                                        <span v-if="form.processing" class="ml-8">Creating New HHa Class...</span>
                                    </button>

                                   
                            </form> 
                        </div>
                                    
                    </div>
                </div>
            </div>
         <!-- column 3 -->

        <div class="flex-none w-full md:w-1/6 mb-2 md:mb-4 p-4 mx-2 bg-gray-200 rounded-lg shadow-md min-w-[220px]">

            <div class="flex flex-col md:flex-row justify-center space-x-0 md:space-x-4 h-full">
                    <div class="w-full md:w-3/3 bg-lime-300 flex flex-col justify-between mb-4 md:mb-0">
                        <img class="w-full h-72 object-cover" :src="medical" alt="MedAdmin" />
                        <div class="p-4 flex-grow">
                            <h2 class="text-xl font-bold">Input example</h2> 
                            <hr class="border-t-2 border-black mb-5">
                            <p v-if="$page.props.flash.message" class="p-4 bg-green-200">{{ $page.props.flash.message }} </p>
                            <p v-if="$page.props.flash.message_body" class="p-4 bg-green-200">  {{ $page.props.flash.message_body }}  </p>

                            <div class="flex flex-wrap flex-col w-full mb-2 md:mb-2 p-2 bg-white rounded-lg shadow-md min-w-[220px]">
                                <table class="mt-1 text-x text-sm">
                                    <thead>
                                       
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-left pb-2"  colspan="1">Class Start Date</td>
                                            <th class="text-right pb-2"  colspan="2">{{ currentDate  }}</th>
                                            
                                        </tr>
                                        <tr>
                                            <td class="text-left pb-2"  colspan="1">Class End Date</td>
                                            <th class="text-right pb-2"  colspan="2">{{ currentDate  }}</th>
                                            
                                        </tr>
                                        <tr>
                                            <td class="text-left pb-2"  colspan="1">Class Start Time</td>
                                            <th class="text-right pb-2"  colspan="2">{{ currentTime   }}</th>
                                            
                                        </tr>
                                        <tr>
                                            <td class="text-left pb-4"  colspan="1">Class End Time</td>
                                            <th class="text-right pb-4"  colspan="2">{{ currentTime   }}</th>
                                            
                                        </tr>
                                        <tr>
                                            <td class="text-left pb-6" colspan="1"> Program Name</td>
                                            <td class="text-right pb-6" colspan="2">{{ "Medication Admin" }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-left pb-4" colspan="1">Class Code</td>
                                            <td class="text-right pb-4" colspan="2">{{ "Medication Admin/CMA-BL-r.21" }}</td>
                                        </tr>
                                        
                                        <tr>
                                            <td class="text-left pb-2" colspan="1">Location</td>
                                            <td class="text-right pb-2" colspan="2">{{ "Woodbridge Township" }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-left pb-2" colspan="1">Class Type</td>
                                            <td class="text-right pb-2" colspan="2">{{ "In-Person" }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-left pb-2 pt-2" colspan="1">Hours Required</td>
                                            <th class="text-right pb-2 pt-2" colspan="2">{{ "60" }}</th>
                                        </tr>
                                        <tr>
                                            <td class="text-left pb-2 pt-2" colspan="1">Application Fee</td>
                                            <th class="text-right pb-2 pt-2" colspan="2">{{ "250.00" }}</th>
                                        </tr>
                                    </tbody>
                                </table>
                                
                            </div>
                            <hr class="border-t-1 border-gray-400 mb-5 py-2">

                           
                        </div>
                    </div>
            </div>

        </div>
                <!-- column 4 Hidden -->

        <div class="flex-none w-full md:w-1/12 mb-2 md:mb-4 p-4 rounded-lg min-w-[220px]">
        </div>
    </div>

    
</template>

<script setup>
import { useForm } from '@inertiajs/vue3';
import TextInput from "./../../Components/TextInputTakeClass.vue";
import Datepicker from 'vue3-datepicker';
import { ref } from 'vue';

const currentDate = ref(getCurrentDate());

function getCurrentDate() {
    const date = new Date();
    return date.toISOString().split('T')[0]; // Format YYYY-MM-DD
}

const currentTime = ref(getCurrentTime());

function getCurrentTime() {
    const date = new Date();
    return date.toLocaleTimeString([], { hour: '2-digit', minute: '2-digit' }); // Format as HH:MM
}

// Initialize the form
const form = useForm({
    course_start: '',
    course_end: '',
    time_start: '',
    time_end: '',
    training_code: '',
    location: '',
    program_name: '',
    class_type: '',
    total_hours: '',
    application_fee: '',
    disabled: false,
});

// Function to format date to YYYY-MM-DD
const formatDate = (date) => {
    if (!date) return ''; // Return empty string if no date provided

    // Create a Date object from the input
    const dateObj = new Date(date);

    // Check if the date is valid
    if (isNaN(dateObj.getTime())) {
        console.error('Invalid date:', date); // Log error for debugging
        return ''; // Return empty string for invalid dates
    }

    // Format and return the date as YYYY-MM-DD
    return dateObj.toISOString().split('T')[0]; // Extracts the YYYY-MM-DD part
};

const submit = () => {
    // Format the dates before submitting
    const formattedData = {
        ...form,
        course_start: formatDate(form.course_start),
        course_end: formatDate(form.course_end),
    };

    form.post(route('SubmitRegisterMedClass'), {
        data: formattedData, // Use formatted data for submission
        preserveScroll: true,
        onSuccess: () => {
            form.reset(); // Reset form values without losing training data
            form.disabled = true; // Disable fields after submission
        },
        onError: (errors) => {
            console.error('Form submission failed:', errors);
            // Handle errors if needed
        },
    });
};


const cna_group = new URL('../../../assets/images/cna_group.jpg', import.meta.url).href;
const medical = new URL('../../../assets/images/medical.jpg', import.meta.url).href;

</script>

