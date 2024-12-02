<template>
    <Head title=" | All Enrol By Class - BLS/CPR/AED" />
    <div class="bg-gray-200 text-center mb-3 -mt-3">
        <h1 class="text-3xl">Hello, {{ $page.props.auth.user.name}}.</h1>
            <h6 class="text-sm font-bold">{{ $page.props.auth.user.email}}</h6>
            <p>Welcome to your dashboard. Here you can manage enrollments, create and view classes, and adjust settings.</p>        <!-- New div for paragraph spanning two columns -->
    <div class="flex flex-wrap mx-2 mb-4 justify-center">
        
    </div>
    </div>

    <div class="flex flex-wrap mx-2 justify-center">
            <!-- column 4 Hidden -->
            <div class="flex-none w-full md:w-1/12 mb-2 md:mb-4 p-4 rounded-lg min-w-[220px]">
                <h1 class="text-2xl font-bold">{{ getDate(dataEnrolBls.data[0]?.course_start) }} <br>{{ "BLS/CPR/AED" }}<br>{{ "Class" }}</h1>
            </div>
            <!-- column 2 -->
            <div class="flex-none w-full md:w-4/6 mb-2 md:mb-4 p-4 mx-2 bg-orange-300 rounded-lg shadow-md min-w-[220px]">

                <div class="flex flex-col md:flex-row justify-center space-x-0 md:space-x-4 h-full">
                    <div class="w-full md:w-6/6 bg-gray-200 flex flex-col justify-between mb-4 md:mb-0">
                        <div class="p-4 flex-grow">
                            <h2 class="text-xl font-bold">All Registration for {{ getDate(dataEnrolBls.data[0]?.course_start) }}</h2> 
                            <hr class="border-t-2 border-black">

                            <!-- Form Goes Here -->

                            <div class="overflow-x-auto p-2">
                             <!-- Search Bar Goes Here -->
                                <div class="flex justify-end mb-2 mt-5">
                                    <div class="w-1/5">
                                        <input 
                                            type="search" 
                                            placeholder="Search" 
                                            class="h-12 px-3 border border-gray-300 rounded" 
                                            v-model="search" />
                                    </div>
                                </div>

                                <!-- FLASH MESSAGE -->
                                <div class="p-4 flex-grow">
                                    <p v-if="$page.props.flash.message" class="p-4 bg-green-200">{{ $page.props.flash.message }} </p>
                                    <p v-if="$page.props.flash.message_body" class="p-4 bg-green-200">  {{ $page.props.flash.message_body }}  </p>
                                </div>

                             <!-- Table Goes Here -->
                             <table class="min-w-full border-collapse">
                                    <thead>
                                        <tr>
                                            <th class="text-black text-center border border-black"></th>
                                            <th colspan="2" class="text-black text-center border border-black">Name</th>
                                            <th class="text-black text-center border border-black">Start Date</th>
                                            <th class="text-black text-center border border-black">Address</th>
                                            <th class="text-black text-center border border-black">Phone</th>
                                            <th class="text-black text-center border border-black">App. Fee</th>
                                            <th class="text-black text-center border border-black">Email</th>
                                            <th colspan="3" class="text-black text-center font-bold border border-black">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <tr v-for="dataEnrolBls in dataEnrolBls.data" :key="dataEnrolBls.id">
                                        <td class="text-black text-center border border-black">
                                                <span 
                                                    class="cursor-pointer inline-flex items-center" 
                                                    @click="toggleReadStatus(dataEnrolBls)"
                                                >
                                                    <img
                                                    :src="dataEnrolBls.read_unr === 'read' ? env_read : env_unread"
                                                    alt="Envelope"
                                                    class="w-6 h-6"
                                                    />
                                                </span>
                                            </td>
                                            <td class="text-black text-center border border-black">
                                                <span class="text-x text-black-900 font-bold">{{ dataEnrolBls.first_name }}</span><br>
                                            </td>
                                            <td class="text-black text-center border border-black">
                                                <span class="text-x text-black-900 font-bold">{{ dataEnrolBls.last_name  }}</span><br>
                                            </td>
                                            <td class="text-black text-center border border-black">
                                                <span class="text-x font-bold text-black-900">{{ getDate(dataEnrolBls.course_start)  }}</span>
                                            </td>
                                            <td class="text-black justify-center border border-black pl-2">
                                                <span class="text-x text-black-900 font-bold">{{ dataEnrolBls.address  }}</span><br>
                                                <span class="text-x text-black-900">{{ dataEnrolBls.city  }}, {{ dataEnrolBls.county  }}, {{ dataEnrolBls.postcode  }}</span>
                                            </td>
                                            <td class="text-black text-center border border-black">
                                                <span class="text-xs text-black-900 font-bold">{{ dataEnrolBls.phone  }}</span><br>
                                            </td>
                                            <td class="text-black text-center border border-black">
                                                <span class="text-x text-black-900 font-bold">${{ dataEnrolBls.application_fee  }}</span><br>
                                                <span class="text-xs text-black-900 font-bold" 
                                                    :class="dataEnrolBls.payment_status === 'paid' ? 'bg-lime-300' : 'bg-red-400'">
                                                    {{ dataEnrolBls.payment_status }}
                                                </span>
                                            </td>
                                            <td class="text-black text-center border border-black">
                                                <span class="text-x text-black-900">{{ dataEnrolBls.email  }}</span><br>
                                            </td>
                                            <td 
                                                :class="[dataEnrolBls.payment_status === 'paid' ? 'bg-red-400' : 'bg-lime-300', 
                                                        'text-black', 'text-center', 'font-bold', 'text-xs', 'border', 'p-2', 'border-black']">
                                                <button 
                                                    @click="updatePaymentStatus(dataEnrolBls.id)"
                                                    class="text-black">
                                                    {{ dataEnrolBls.payment_status === 'paid' ? 'Set Pending' : 'Set Paid' }}
                                                </button>
                                            </td>
                                            <td class="bg-orange-200 text-black text-center font-bold border p-2 border-black">
                                                <Link :href="route('admin.view_bls_application')" 
                                                    method="post"
                                                    :data="{ id: dataEnrolBls.id }"
                                                    as="button"
                                                    type="button"
                                                    class="text-black">
                                                    View User &#129195;
                                                </Link>
                                            </td>

                                            <td class="bg-gray-700 text-red-500 text-center font-bold border p-2 border-black">
                                                <Link :href="route('admin.delete_bls_application')" 
                                                    method="post"
                                                    :data="{ id: dataEnrolBls.id }"
                                                    as="button"
                                                    type="button"
                                                    class="text-red-500">
                                                    Delete
                                                </Link>
                                            </td>

                                        </tr>
                                        <!-- Additional rows as needed -->
                                    </tbody>
                                </table>
                                <!-- Pagination Links-->
                                <div>
                                    
                                    <PaginationLinks :paginator="dataEnrolBls" />
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
         <!-- column 3 -->

        
                <!-- column 4 Hidden -->

        <div class="flex-none w-full md:w-1/12 mb-2 md:mb-4 p-4 rounded-lg min-w-[220px]">
        </div>
    </div>

    
</template>

<script setup>
import PaginationLinks from './../../../Components/PaginationLinks.vue';
import { ref, watch } from 'vue';
import { router } from '@inertiajs/vue3';
import { debounce } from 'lodash';

const env_read = new URL('../../../../assets/images/envelope_read.png', import.meta.url).href
const env_unread = new URL('../../../../assets/images/envelope_unread.png', import.meta.url).href


// Define props
const props = defineProps({
    dataEnrolBls: Object,
    searchTerm: String,
});

// Reactive search term
const search = ref(props.searchTerm);

// Watch for changes in the search term
watch(
    search, 
    debounce((q) => {
        // Use Inertia to make the request and stay on the same page
        router.get(window.location.pathname, { search: q }, { preserveState: true });
    }, 500)
);

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

/// Update Payment Status
const updatePaymentStatus = async (id) => {
    try {
        // Send a POST request to update the payment status while preserving scroll
        await router.post('/admin/update_bls_payment_status', { id }, { preserveScroll: true });
    } catch (error) {
        console.error('Error updating payment status:', error);
    }
};

// Toggle Read Status
const toggleReadStatus = async (dataEnrolBls) => {
  try {
    const response = await router.post('/admin/update_bls_read_status', 
      { id: dataEnrolBls.id }, 
      { preserveScroll: true }
    );
    console.log('Response:', response);
    
    // Update the local state to reflect the change
    dataEnrolBls.read_unr = dataEnrolBls.read_unr === 'read' ? 'unread' : 'read';
  } catch (error) {
    console.error('Error updating read status:', error.response ? error.response.data : error.message);
    // Handle the error (e.g., show a notification)
  }
};


</script>
