<template>
    <Head title=" | Nurse Assistant" />
    <div class="bg-lime-300 text-center mb-3 -mt-3">
        <h1 class="text-3xl font-bold p-6">NATCEP-Accredited and Endorsed In-Person NURSE AIDE/ASSISTANT (CNA) Training Courses</h1>
        
    </div>

        <div class="flex flex-wrap mx-2 justify-center">
            <!-- column 4 Hidden -->
            <div class="flex-none w-full md:w-1/12 mb-2 md:mb-4 p-4 rounded-lg min-w-[220px]">
                <h1 class="text-2xl font-bold">{{ 'Nurse' }}<br>{{ 'Assistant' }}<br><br>{{ 'CNA' }}<br>{{ 'Training' }}</h1>
            </div>
            <!-- column 2 -->
            <div class="flex-none w-full md:w-4/6 mb-2 md:mb-4 p-4 mx-2 bg-gray-200 rounded-lg shadow-md min-w-[220px]">

                <div class="flex flex-col md:flex-row justify-center space-x-0 md:space-x-4 h-full">
                    <div class="w-full md:w-6/6 bg-orange-300 flex flex-col justify-between mb-4 md:mb-0">
                        <img class="w-full h-72 object-cover"  :src="cna_group"  alt="CNA" />
                        <div class="p-4 flex-grow">
                            <h2 class="text-xl font-bold">NURSE AIDE/ASSISTANT TRAINING (CNA)</h2> 
                            <hr class="border-t-2 border-black">
                            <h2 class="text-xl font-bold my-5">CNA Training Dates</h2> 

                            <!-- Form Goes Here -->

                            <div class="overflow-x-auto p-2">
                                <table class="min-w-full border-collapse">
                                    <thead>
                                        <tr>
                                            <th colspan="2" class="text-black text-center border border-black">Date</th>
                                            <th class="text-black text-center border border-black">Time</th>
                                            <th class="text-black text-center border border-black">Certification Training</th>
                                            <th class="text-black text-center border border-black">Classroom</th>
                                            <th class="text-black text-center border border-black">App. Fee</th>
                                            <th class="text-black text-center border border-black">Details</th>
                                            <th class="text-black text-center font-bold border border-black">Registration Form</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr v-if="takeclass.data.length === 0">
                                            <td colspan="7" class="font-bold text-center tex-2xl mt-5 p-5 animate-pulse">Updating, please check back!</td>
                                        </tr>
                                        <tr v-for="classes in takeclass.data" :key="classes.id">
                                            <td class="bg-gray-600 text-white text-center border border-black">
                                                <span class="text-xl text-white-500 mt-0">{{ getDate(classes.course_start) }}</span><br>
                                            </td>
                                            <td class="bg-gray-700 text-white text-center border border-black">
                                                <span class="text-xl text-white-500 mt-0">{{ getDate(classes.course_end) }}</span><br>
                                            </td>
                                            <td class="text-black text-center border border-black">
                                                <span class="text-xs font-bold text-black-900">{{ formatTime(classes.time_start) }}</span><br>
                                                -<br>
                                                <span class="text-xs font-bold text-black-900">{{ formatTime(classes.time_end) }}</span>
                                            </td>
                                            <td class="text-black text-center border border-black">
                                                <span class="text-xl text-black-900 font-bold">{{ classes.training_code }}</span><br>
                                                <span class="text-xs text-black-900">({{ classes.location }})</span>
                                            </td>
                                            <td class="text-black text-center border border-black">
                                                <span class="text-x text-black-900 font-bold">{{ classes.class_type }}</span><br>
                                            </td>
                                            <td class="text-black text-center border border-black">
                                                <span class="text-xl text-black-900 font-bold">${{ classes.application_fee }}</span><br>
                                            </td>
                                            <td class="text-black text-center border border-black">
                                                <span class="text-x text-black-900">{{ 'See Details' }} &#11167;</span><br>
                                            </td>
                                            <td class="bg-lime-300 text-black text-center font-bold border p-2 border-black">
                                                <Link :href="`/take-a-class/cna/training.application?id=${classes.id}`" class="text-black">
                                                    Sign me up &#129195;
                                                </Link>
                                            </td>

                                        </tr>
                                        <!-- Additional rows as needed -->
                                    </tbody>
                                </table>
                                <!-- Pagination Links-->
                                <div>
                                    
                                    <PaginationLinks :paginator="takeclass" />
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

    <!-- row 2 -->
    <div class="flex flex-wrap mx-2 justify-center">
        <div class="flex-none w-full md:w-1/12 mb-2 md:mb-4 p-4 rounded-lg min-w-[220px]">
            <h1 class="text-3xl font-bold"></h1>
        </div>
        <div class="flex-none w-full md:w-1/3 mb-2 md:mb-4 p-4 mx-2 bg-gray-200 rounded-lg shadow-md min-w-[220px]">
            <h2 class="text-xl font-semibold">Group Registration</h2>
            <p>Content for when a company or an agency is registeration a number of people grater than 5.</p>
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
defineProps({
    takeclass: Object,

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


import PaginationLinks from './../Components/PaginationLinks.vue';


const cna_group = new URL('../../assets/images/cna_group.jpg', import.meta.url).href
const HHA = new URL('../../assets/images/HHA.jpg', import.meta.url).href
const medical = new URL('../../assets/images/medical.jpg', import.meta.url).href
const bls = new URL('../assets/images/bls.jpg', import.meta.url).href

</script>
