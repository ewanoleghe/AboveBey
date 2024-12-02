<template>
    <Head title=" | View User" />
    <div class="bg-gray-200 text-center mb-3 -mt-3 no-print">
        <h1 class="text-3xl">Hello, {{ $page.props.auth.user.name}}.</h1>
            <h6 class="text-sm font-bold">{{ $page.props.auth.user.email}}</h6>
            <p>Welcome to your dashboard. Here you can manage enrollments, create and view classes, and adjust settings.</p>        <!-- New div for paragraph spanning two columns -->
    <div class="flex flex-wrap mx-2 mb-4 justify-center">
        
    </div>
    </div>

        <div class="flex flex-wrap mx-2 justify-center">
            <!-- column 4 Hidden -->
            <div class="flex-none w-full md:w-1/12 mb-2 md:mb-4 p-4 rounded-lg min-w-[220px] no-print">
                <h1 class="text-xl font-bold">{{ "Basic Life Support" }}<br>{{ "Registration" }}</h1>
                             <!-- Print Button -->
                <button @click="printPage" class="mt-8 bg-blue-500 text-white px-4 py-2 rounded">
                    <i class="fas fa-print"></i> 
                </button>
            </div>
            <!-- column 2 -->
            <div class="flex-none w-full md:w-1/3 mb-2 md:mb-4 p-4 mx-2 bg-gray-200 rounded-lg shadow-md min-w-[220px]">

                <div class="flex flex-col md:flex-row justify-center space-x-0 md:space-x-4 h-full">
                    <div class="w-full md:w-3/3 bg-lime-300 flex flex-col justify-between mb-4 md:mb-0">
                        <div class="p-4 flex-grow">
                            <h2 class="text-xl font-bold">BLS/CPR/AED Enrollment</h2> 
                            <hr class="border-t-2 border-black">
                            <!-- CMA START -->
                            <div class="pt-3">
                                <table class="min-w-full bg-white border border-gray-300">
                                    <thead>
                                        <tr class="bg-gray-200">
                                            <th class="px-4 py-2 text-left text-3xl" colspan="2">{{ blsApplication.first_name }} {{ blsApplication.last_name }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="border px-4 py-2 text-left font-bold">First Name</td>
                                            <td class="border px-4 py-2 font-bold">{{ blsApplication.first_name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border px-4 py-2 text-left font-bold">Last Name</td>
                                            <td class="border px-4 py-2 font-bold">{{ blsApplication.last_name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border px-4 py-2 text-left font-bold">SSN</td>
                                            <td class="border px-4 py-2 font-bold">{{ blsApplication.ssn }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border px-4 py-2 text-left font-bold">Email</td>
                                            <td class="border px-4 py-2 font-bold">{{ blsApplication.email }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border px-4 py-2 text-left font-bold">Phone Number</td>
                                            <td class="border px-4 py-2 font-bold">{{ blsApplication.phone }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border px-4 py-2 text-left font-bold">Address</td>
                                            <td class="border px-4 py-2 font-bold">{{ blsApplication.address }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border px-4 py-2 text-left font-bold">City</td>
                                            <td class="border px-4 py-2 font-bold">{{ blsApplication.city }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border px-4 py-2 text-left font-bold">County</td>
                                            <td class="border px-4 py-2 font-bold">{{ blsApplication.county }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border px-4 py-2 text-left font-bold">Post Code</td>
                                            <td class="border px-4 py-2 font-bold">{{ blsApplication.postcode }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border px-4 py-2 text-left font-bold">Signature</td>
                                            <td class="border px-4 py-2 font-bold">{{ blsApplication.signature }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
         <!-- column 3 -->

         <!-- Class Statistics -->

        <div class="flex-none w-full md:w-1/3 mb-2 md:mb-4 p-4 mx-2 bg-gray-200 rounded-lg shadow-md min-w-[220px]">

            <div class="flex flex-col md:flex-row justify-center space-x-0 md:space-x-4 h-full">
                    <div class="w-full md:w-3/3 bg-orange-300 flex flex-col justify-between mb-4 md:mb-0">
                        <div class="p-4 flex-grow">
                            <h2 class="text-xl font-bold">Class Details</h2> 
                            <hr class="border-t-2 border-black">
                            <!-- CMA START -->
                            <div class="pt-3">
                                <table class="min-w-full bg-white border border-gray-300">
                                    <thead>
                                        <tr class="bg-gray-200">
                                            <th class="px-4 py-2 text-left text-3xl" colspan="2">{{ blsApplication.program_name }}</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="border px-4 py-2 text-left font-bold">Program ID</td>
                                            <td class="border px-4 py-2 font-bold">{{ blsApplication.cna_class_id }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border px-4 py-2 text-left font-bold">Program Name</td>
                                            <td class="border px-4 py-2 font-bold">{{ blsApplication.program_name }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border px-4 py-2 text-left font-bold">Training Code</td>
                                            <td class="border px-4 py-2 font-bold">{{ blsApplication.training_code }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border px-4 py-2 text-left font-bold">Class Type</td>
                                            <td class="border px-4 py-2 font-bold">{{ blsApplication.class_type }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border px-4 py-2 text-left font-bold">Start Date - End Date</td>
                                            <td class="border px-4 py-2 font-bold">{{ getDate(blsApplication.course_start) }} - {{ getDate(blsApplication.course_end) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border px-4 py-2 text-left font-bold">Time</td>
                                            <td class="border px-4 py-2 font-bold">{{ formatTime(blsApplication.time_start) }} - {{ formatTime(blsApplication.time_end) }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border px-4 py-2 text-left font-bold">Application Fee</td>
                                            <td class="border px-4 py-2 font-bold">${{ blsApplication.application_fee }}</td>
                                        </tr>
                                        <tr>
                                            <td class="border px-4 py-2 text-left font-bold">Payment Status</td>
                                            <td class="border px-4 py-2 font-bold">{{ blsApplication.payment_status }}</td>
                                        </tr>
                                        <tr>
                                            <td  colspan="2"
                                                :class="[blsApplication.payment_status === 'paid' ? 'bg-red-400' : 'bg-lime-300', 
                                                        'text-black', 'text-center', 'font-bold', 'text-xl', 'p-2']">
                                                <button 
                                                    @click="updatePaymentStatus(blsApplication.id)"
                                                    class="text-black no-print">
                                                    {{ blsApplication.payment_status === 'paid' ? 'Set Pending' : 'Set Paid' }}
                                                </button>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            
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
import { router } from '@inertiajs/vue3';

const props = defineProps({
    blsApplication: {
    type: Object,
    required: true,
  },
});

// Format Date
const getDate = (date) =>
new Date(date).toLocaleDateString("en-us", {
    year: "numeric",
    month: "short",
    day: "numeric",
});

// Format Time
const formatTime = (timeString) => {
  const [hours, minutes] = timeString.split(':');
  const hours12 = (hours % 12) || 12; // Convert to 12-hour format
  const ampm = hours < 12 ? 'AM' : 'PM'; // Determine am/pm

  return `${String(hours12).padStart(2, '0')}.${minutes}${ampm}`;
};

// Update Payment Status
const updatePaymentStatus = async (id) => {
    try {
        // Send a PATCH request to update the payment status while preserving scroll
        await router.patch('/admin/update_bls_payment_status', { id }, { preserveScroll: true });
    } catch (error) {
        console.error('Error updating payment status:', error);
    }
};

// Print Function
const printPage = () => {
    window.print();
};

// Your existing functions (getDate, formatTime, updatePaymentStatus)
</script>

<style>
@media print {
    .no-print {
        display: none !important;
    }
}
</style>