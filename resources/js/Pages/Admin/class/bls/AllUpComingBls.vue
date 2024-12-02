<template>
    <Head title=" | Basic Life Support" />
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
                <h1 class="text-2xl font-bold">{{ "All Valid" }} <br>{{ "BLS/CPR/AED Schedule" }}</h1>
            </div>
            <!-- column 2 -->
            <div class="flex-none w-full md:w-4/6 mb-2 md:mb-4 p-4 mx-2 bg-orange-300 rounded-lg shadow-md min-w-[220px]">

                <div class="flex flex-col md:flex-row justify-center space-x-0 md:space-x-4 h-full">
                    <div class="w-full md:w-6/6 bg-gray-200 flex flex-col justify-between mb-4 md:mb-0">
                        <div class="p-4 flex-grow">
                            <h2 class="text-xl font-bold">All BLS/CPR/AED Schedule</h2> 
                            <hr class="border-t-2 border-black">

                            <!-- Form Goes Here -->

                            <div class="overflow-x-auto p-2">
                                <!-- Table Goes Here -->
                             <table class="min-w-full border-collapse">
                                    <thead>
                                        <tr>
                                            <th colspan="2" class="text-black text-center border border-black">Date</th>
                                            <th class="text-black text-center border border-black">Time</th>
                                            <th class="text-black text-center border border-black">Certification Training</th>
                                            <th class="text-black text-center border border-black">Classroom</th>
                                            <th class="text-black text-center border border-black">App. Fee</th>
                                            <th class="text-black text-center border border-black">Reg Total</th>
                                            <th class="text-black text-center border border-black">Details</th>
                                            <th class="text-black text-center font-bold border border-black">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                      <tr v-for="blsClass in blsUpData.data" :key="blsClass.id">
                                        <td class="bg-gray-600 text-white text-center border border-black">
                                                <span class="text-xl text-white-500 mt-0">{{ getDate(blsClass.course_start) }}</span><br>
                                            </td>
                                            <td class="bg-gray-700 text-white text-center border border-black">
                                                <span class="text-xl text-white-500 mt-0">{{ getDate(blsClass.course_end) }}</span><br>
                                            </td>
                                            <td class="text-black text-center border border-black">
                                                <span class="text-xs font-bold text-black-900">{{ formatTime(blsClass.time_start) }}</span><br>
                                                -<br>
                                                <span class="text-xs font-bold text-black-900">{{ formatTime(blsClass.time_end) }}</span>
                                            </td>
                                            <td class="text-black text-center border border-black">
                                                <span class="text-xl text-black-900 font-bold">{{ blsClass.training_code }}</span><br>
                                                <span class="text-xs text-black-900">({{ blsClass.location }})</span>
                                            </td>
                                            <td class="text-black text-center border border-black">
                                                <span class="text-x text-black-900 font-bold">{{ blsClass.class_type }}</span><br>
                                            </td>
                                            <td class="text-black text-center border border-black">
                                                <span class="text-xl text-black-900 font-bold">${{ blsClass.application_fee }}</span><br>
                                            </td>
                                            <td class="text-black text-center border border-black">
                                                <span class="text-x text-black-900 font-bold">{{ blsClass.enrollments_count > 0 ? blsClass.enrollments_count : '--' }}</span><br>
                                                <span class="text-xs text-blue-900 font-bold" v-if="blsClass.enrollments_count > 0">
                                                    <Link :href="route('admin.view_enrol_by_bls_class')" 
                                                        method="get"
                                                        :data="{ id: blsClass.id }"
                                                        as="button"
                                                        type="button"
                                                        class="text-black">
                                                        View User
                                                    </Link>
                                            </span>
                                            </td>
                                            <td :class="isCourseValid(blsClass.course_start) ? 'bg-green-500 text-white' : 'bg-yellow-300 text-black'" 
                                            class="text-center border border-black">
                                                <span class="text-x text-black-900 font-bold">
                                                    {{ isCourseValid(blsClass.course_start) ? 'Valid' : 'Expired' }}
                                                </span><br>
                                                <span>{{ getDate(blsClass.course_start) }}</span> <!-- If you still want to show the date -->
                                            </td>
                                            <td class="bg-red-500 text-black-500 text-center font-bold border p-2 border-black">
                                                <Link :href="route('admin.delete_bls_class')" 
                                                    method="post"
                                                    :data="{ id: blsClass.id }"
                                                    as="button"
                                                    type="button"
                                                    class="text-black-900">
                                                    Delete
                                                </Link>
                                            </td>

                                        </tr>
                                        <!-- Additional rows as needed -->
                                    </tbody>
                                </table>
                                <!-- Pagination Links-->
                                <div>
                                    
                                    <PaginationLinks :paginator="blsUpData" />
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

// Define props
const props = defineProps({
    blsUpData: Object,
});

// Format Date
const getDate = (date) =>
new Date(date).toLocaleDateString("en-us", {
    year: "numeric",
    month: "short",
    day: "numeric",
});

// Check if course is expired or valid
const isCourseValid = (courseStart) => {
    const today = new Date();
    const courseDate = new Date(courseStart);
    return courseDate >= today;
};

// Format Time
const formatTime = (timeString) => {
  const [hours, minutes] = timeString.split(':');
  const hours12 = (hours % 12) || 12; // Convert to 12-hour format
  const ampm = hours < 12 ? 'AM' : 'PM'; // Determine am/pm

  return `${String(hours12).padStart(2, '0')}.${minutes}${ampm}`;
};

</script>
