<template>
    <Head title=" | Contact" />
    <div class="bg-lime-300 text-center mb-3 -mt-3">
        <h1 class="text-3xl font-bold p-6">NATCEP-Accredited and Endorsed In-Person HOME HEALTH AIDE (HHA) Training Courses</h1>
        
    </div>

        <div class="flex flex-wrap mx-2 justify-center">
            <!-- column 4 Hidden -->
            <div class="flex-none w-full md:w-1/12 mb-2 md:mb-4 p-4 rounded-lg min-w-[220px]">
                <h1 class="text-2xl font-bold">{{ HhaClass.program_name }} </h1>
            </div>
            <!-- column 2 -->
            <div class="flex-none w-full md:w-3/6 mb-2 md:mb-4 p-4 mx-2 bg-gray-200 rounded-lg shadow-md min-w-[220px]">

                <div class="flex flex-col md:flex-row justify-center space-x-0 md:space-x-4 h-full">
                    <div class="w-full md:w-3/3 bg-orange-300 flex flex-col justify-between mb-4 md:mb-0">
                        <img class="w-full h-72 object-cover"  :src="cna_group"  alt="CNA" />
                        <div class="p-4 flex-grow">
                            <h2 class="text-xl font-bold">{{ HhaClass.program_name }}</h2> 
                            <hr class="border-t-2 border-black mb-4">
                            <h2 class="text-2xl font-bold justify-center text-center p-4">Register Now</h2>
                            <p class="justify-center mb-4 mt-2 text-xl pb-5">
                                Please fill in your details in this Registration Form below to start your registration process.<br>
                                Complete sus datos en este formulario de registro a continuación para comenzar su proceso.

                            </p>
                            <form @submit.prevent="submit" class="flex flex-wrap mt-5">
                                <div class="flex flex-col w-full md:w-5/12 mr-2 mb-4"> <!-- Adjusted for mobile -->
                                    <TextInput 
                                        v-model="form.first_name" 
                                        name="Student First Name"
                                        :message="form.errors.first_name" 
                                        :disabled="form.disabled"  
                                    />
                                </div>

                                <div class="flex flex-col w-full md:w-5/12 mr-2 mb-4"> <!-- Adjusted for mobile -->
                                    <TextInput 
                                        v-model="form.last_name" 
                                        name="Student Last Name"
                                        :message="form.errors.last_name" 
                                        :disabled="form.disabled"  
                                    />
                                </div>

                                <div class="flex flex-col w-full md:w-5/12 mr-2 mb-4"> <!-- Adjusted for mobile -->
                                    <TextInput 
                                        type="text" 
                                        v-model="form.ssn" 
                                        name="Social Security Num"
                                        placeholder="XXX-XX-XXXX"
                                        :message="form.errors.ssn" 
                                        :disabled="form.disabled"  
                                    />
                                </div>

                                <div class="flex flex-col w-full md:w-5/12 mr-2 mb-4"> <!-- Adjusted for mobile -->
                                    <TextInput 
                                        type="email" 
                                        v-model="form.email" 
                                        name="Email Address"
                                        :message="form.errors.email" 
                                        :disabled="form.disabled"  
                                    />
                                </div>

                                <div class="flex flex-col w-full md:w-5/12 mr-2 mb-4"> <!-- Adjusted for mobile -->
                                    <TextInput 
                                        type="tel" 
                                        v-model="form.phone" 
                                        name="Phone Number"
                                        :message="form.errors.phone" 
                                        :disabled="form.disabled"  
                                    />
                                </div>

                                <div class="flex flex-col w-full mb-4"> <!-- Adjusted for mobile -->
                                    <TextInput 
                                        v-model="form.address" 
                                        name="Correspondence Address"
                                        :message="form.errors.address" 
                                        :disabled="form.disabled"  
                                        class="w-full"
                                    />
                                </div>

                                <div class="flex flex-col w-full md:w-5/12 mr-2 mb-4"> <!-- Adjusted for mobile -->
                                    <TextInput 
                                        v-model="form.city" 
                                        name="City"
                                        :message="form.errors.city" 
                                        :disabled="form.disabled"  
                                        class="w-full"
                                    />
                                </div>

                                <div class="flex flex-col w-full md:w-5/12 mr-2 mb-4"> <!-- Adjusted for mobile -->
                                    <TextInput 
                                        v-model="form.county"  
                                        name="County"
                                        :message="form.errors.county" 
                                        :disabled="form.disabled"  
                                    />
                                </div>

                                <div class="flex flex-col w-full md:w-5/12 mr-2 mb-4"> <!-- Adjusted for mobile -->
                                    <TextInput 
                                        v-model="form.postcode" 
                                        name="ZIP / Postal Code"
                                        :message="form.errors.postcode" 
                                        :disabled="form.disabled"  
                                    />
                                </div>

                                <div class="flex flex-col w-full justify-center item-center md:w-5/12 mr-2 mb-4">
                                    <label class="mb-1 font-bold">ENROLLMENT AGREEMENT <span class="text-sm">(Opens in New Tab)</span></label>
                                    <ul>
                                        <li class="flex items-center" v-for="(item, index) in confirmationItems" :key="index">
                                            <a :href="route('nurseassistant', item.key)" target="_blank" class="flex items-center w-full">
                                                <input 
                                                    type="checkbox" 
                                                    v-model="form.confirmations[item.key]" 
                                                    class="transform scale-150 mr-2"
                                                />
                                                <span class="ml-2">{{ item.label }}</span>
                                            </a>
                                        </li>
                                    </ul>
                                </div>

                                <div class="flex flex-col w-full md:w-5/12 mr-2 mb-4">
                                    <TextInput 
                                        v-model="form.signature" 
                                        name="Signature (Initials)"
                                        :message="form.errors.signature" 
                                        :disabled="form.disabled" 
                                    />
                                    <span class="text-sm bg-white p-1 rounded-lg">
                                        By providing my Full Name or Initials, I agree that the Full Name or Initials will be 
                                        the electronic representation of my signature for all purposes when I use then for documents, 
                                        including legally binding contracts with Above and Beyound Care - 
                                        just the same as a pen-and-paper signature or initial.
                                    </span>    
                                </div>
                                <div class="flex flex-col w-full md:w-5/12 mr-2 mb-4">
                                    * By checking these boxes "I Confirm that I have read all document and Agree to the terms of the documents" 
                                </div>

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
                                        <span v-if="!form.processing">Submit Application</span>
                                        <span v-if="form.processing" class="ml-8">Sending Application...</span>
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
                            <h2 class="text-xl font-bold">Application Summary</h2> 
                            <hr class="border-t-2 border-black mb-5">
                            <p v-if="$page.props.flash.message" class="p-4 bg-green-200">{{ $page.props.flash.message }} </p>
                            <p v-if="$page.props.flash.message_body" class="p-4 bg-green-200">  {{ $page.props.flash.message_body }}  </p>
                            <p class="text-center text-x mb-4 pb-4 ">
                                {{ HhaClass.program_name }} Program Summary
                            </p>
                            <div class="flex flex-wrap flex-col w-full mb-2 md:mb-2 p-2 bg-white rounded-lg shadow-md min-w-[220px]">
                                <table class="mt-1 text-x text-sm">
                                    <thead>
                                        <tr>
                                            <th class="text-left pb-2" colspan="3">{{ HhaClass.training_code }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="text-left pb-2"  colspan="1">Classroom</td>
                                            <th class="text-right pb-2"  colspan="2">{{ HhaClass.class_type }}</th>
                                            
                                        </tr>
                                        <tr>
                                            <th class="text-left pb-2 justify-center mt-4 pt-4" colspan="3">Training Date</th>
                                        </tr>
                                        <tr>
                                            <td class="text-left pb-2" colspan="1"> Starts</td>
                                            <td class="text-right pb-2" colspan="2">{{ formatCnaDate(HhaClass.course_start) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-left pb-2" colspan="1">End</td>
                                            <td class="text-right pb-2" colspan="2">{{ formatCnaDate(HhaClass.course_end) }}</td>
                                        </tr>
                                        <tr>
                                            <th class="text-left pb-2 justify-center mt-4 pt-4" colspan="3">Classroom Time</th>
                                        </tr>
                                        <tr>
                                            <td class="text-left pb-2" colspan="1">Start Time</td>
                                            <td class="text-right pb-2" colspan="2">{{ formatCnaTime(HhaClass.time_start) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-left pb-2" colspan="1">End Time</td>
                                            <td class="text-right pb-2" colspan="2">{{ formatCnaTime(HhaClass.time_end) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="text-left pb-2 pt-8" colspan="1">*Application Fee</td>
                                            <th class="text-right pb-2 pt-8" colspan="2">{{ HhaClass.application_fee }}</th>
                                        </tr>
                                    </tbody>
                                </table>
                                
                            </div>
                            <hr class="border-t-1 border-gray-400 mb-5 py-2">

                            <div class="flex-none w-full mb-2 md:mb-2 p-2 bg-white rounded-lg shadow-md min-w-[220px]">
                                <p class="mt-1 text-sm pb-1 text-balance "><strong>*</strong> There is a non-refundable application 
                                    fee of $200.00. This fee is not part of tuition.  The tuition will cover the 
                                entire program.  The student is responsible for 100% percent of the total tuition payable on or 
                                before the first day of class.  All tuition monies paid by the student will be refunded if the applicant 
                                cancels this contract within three (3) business days from the date of signing.  This refund, less the 
                                registration fee, is applicable even if instruction has begun.</p>
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
import TextInput from "./../../Components/TextInputTakeClass.vue";

const props = defineProps({
    HhaClass: Object,
});

// Format Date
const formatCnaDate = (date) => {
    return new Date(date).toLocaleDateString("en-us", {
        year: "numeric",
        month: "short",
        day: "numeric",
    });
};

const formatCnaTime = (timeString) => {
    const [hours, minutes] = timeString.split(':');
    const hours12 = (hours % 12) || 12; // Convert to 12-hour format
    const ampm = hours < 12 ? 'AM' : 'PM';
    return `${String(hours12).padStart(2, '0')}.${minutes}${ampm}`;
};

// Initialize the form
const form = useForm({
    first_name: null,
    last_name: null,
    ssn: null,
    email: null,
    phone: null,
    city: null,
    address: null,
    county: null,
    postcode: null,
    signature: null,
    confirmations: {
        complaintPolicy: false,
        programDescription: false,
        registrationRequirements: false,
        evaluationTechniques: false,
        studentRecords: false,
        tuitionCosts: false,
    },
    disabled: false,
    // Initialize Table Data here
    cna_class_id: String(props.HhaClass.id), // Convert to string   
    program_name: String(props.HhaClass.program_name),
    training_code: String(props.HhaClass.training_code),
    class_type: String(props.HhaClass.class_type),
    course_start: String(props.HhaClass.course_start),
    course_end: String(props.HhaClass.course_end),
    time_start: String(props.HhaClass.time_start),
    time_end: String(props.HhaClass.time_end),
    application_fee: String(props.HhaClass.application_fee),

});

// Define the confirmation items
const confirmationItems = [
    { key: 'complaintPolicy', label: 'Complaint/Dispute Resolution Policy' },
    { key: 'programDescription', label: 'Program Description: Certified Nurse Aide Course (90 Hours)' },
    { key: 'registrationRequirements', label: 'Registration Requirements for Nurse Aide Course' },
    { key: 'evaluationTechniques', label: 'Student Evaluation Techniques' },
    { key: 'studentRecords', label: 'Student Records' },
    { key: 'tuitionCosts', label: 'Tuition and Additional Cost for Nurse Aide Course' },
];

const submit = () => {
    // Check if all confirmation checkboxes are selected
    const unconfirmedItems = confirmationItems.filter(item => !form.confirmations[item.key]);
    if (unconfirmedItems.length > 0) {
        alert(`Please confirm the following Enrollment Agreement items before submitting the form:\n- ${unconfirmedItems.map(item => item.label).join('\n- ')}`);
        return; // Stop the submission
    }

    // Prepare the payload
    const payload = {
        ...form.data(), // Spread the form data
        // Include additional class data    
        cna_class_id: form.cna_class_id,
        program_name: form.program_name,
        training_code: form.training_code,
        class_type: form.class_type,
        course_start: form.course_start,
        course_end: form.course_end,
        time_start: form.time_start,
        time_end: form.time_end,
        application_fee: form.application_fee,
    };

    form.post(route('hha.submit'), {
        data: payload, // Use the combined payload
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

