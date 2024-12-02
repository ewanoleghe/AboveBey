<template>
    <Head title=" | BLS/CPR/AED" />
    <div class="bg-red-400 text-center mb-3 -mt-3">
        <h1 class="text-3xl font-bold p-6">Basic Life Support (BLS) Training</h1>
        
    </div>

        <div class="flex flex-wrap mx-2 justify-center">
            <!-- column 4 Hidden -->
            <div class="flex-none w-full md:w-1/12 mb-2 md:mb-4 p-4 rounded-lg min-w-[220px]">
                <h1 class="text-2xl font-bold">{{ 'BLS/CPR/AED' }}</h1>
            </div>
            <!-- column 2 -->
            <div class="flex-none w-full md:w-1/3 mb-2 md:mb-4 p-4 mx-2 bg-gray-200 rounded-lg shadow-md min-w-[220px]">

                <div class="flex flex-col md:flex-row justify-center space-x-0 md:space-x-4 h-full">
                    <div class="w-full md:w-3/3 bg-lime-300 flex flex-col justify-between mb-4 md:mb-0">
                        <img class="w-full h-72 object-cover"  :src="cna_group"  alt="CNA" />
                        <div class="p-4 flex-grow">
                            <h2 class="text-xl font-bold">BASIC LIFE SUPPORT (BLS)</h2> 
                            <hr class="border-t-2 border-black">
                            <p class="text-xl pt-3">
                                Get expert-level Basic Life Support (BLS) training at a competitive price. Our BLS for 
                                Healthcare Providers curriculum is designed to strengthen critical thinking and problem-solving 
                                abilities through realistic, scenario-based learning, ultimately improving patient outcomes. 
                                The program follows the latest AHA guidelines for CPR and Emergency Cardiovascular Care (ECC), 
                                covering essential skills for responding to breathing and cardiac emergencies in adults, 
                                children, and infants, including CPR, AED use, and airway obstruction management.
                            </p>
                            
                            <p class="text-xl pt-3">
                                Delivered by experienced instructors, this course offers flexibility with a hybrid learning approach. 
                                Through our dynamic Simulation Learning platform, you can complete part of your training online, 
                                then engage in hands-on skills sessions in person, allowing you to earn your BLS certification at your own pace.
                            </p>
                        </div>
                        <Link 
                            :href="route('take-a-class.bls')" 
                            :class="{'bg-lime-400 cursor-not-allowed': blsclass.data.length === 0, 'bg-gray-300 text-black': blsclass.data.length > 0}" 
                            :disabled="blsclass.data.length === 0"
                            class="font-bold py-2 px-4 w-full rounded text-center"
                            v-if="blsclass.data.length > 0"
                        >More Training Dates</Link>
                    </div>
                </div>
            </div>
         <!-- column 3 -->

        <div class="flex-none w-full md:w-1/3 mb-2 md:mb-4 p-4 mx-2 bg-gray-200 rounded-lg shadow-md min-w-[220px]">

            <div class="flex flex-col md:flex-row justify-center space-x-0 md:space-x-4 h-full">
                    <div class="w-full md:w-3/3 bg-orange-300 flex flex-col justify-between mb-4 md:mb-0">
                        <img class="w-full h-72 object-cover" :src="medical" alt="MedAdmin" />
                        <div class="p-4 flex-grow">
                            <h2 class="text-xl font-bold">BLS for Healthcare Providers Certification Class</h2> 
                            <hr class="border-t-2 border-black">
                                    <p class="text-xl pt-3">
                                        Our Basic Life Support (BLS) class for healthcare professionals trains participants to 
                                        promptly recognize several life-threatening emergencies, give high-quality CPR, deliver 
                                        appropriate ventilations and provide early use of an AED.
                                    </p>

                                    <h2 class="text-xl font-bold mt-5">Upcoming Classes (BLS)</h2> 
                        <!-- <hr class="border-t-2 border-black"> -->
                        <p class="mt-3 text-xl">We're excited to announce our upcoming training sessions designed to enhance your skills and knowledge! 
                            Join us for a series of interactive classes starting next month.</p>

                            <p class="mt-3 text-xl font-bold">Training Dates</p>

                            <div class="mt-3 text-x ">
                                <hr class="border-t-1 border-black">

                                <table border="1" cellpadding="5" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>Class Name</th>
                                            <th>Start Date</th>
                                            <th>End Date</th>
                                        </tr>
                                    </thead>
                                            <tbody>
                                                <tr v-if="blsclass.data.length === 0">
                                                    <td colspan="3" class="font-bold text-center tex-2xl mt-5 p-5 animate-pulse">Updating, please check back!</td>
                                                </tr>
                                                <tr v-for="classes in blsclass.data" :key="classes.id">
                                                    <td>{{ classes.training_code ?? 'Updating, please check back' }}</td>
                                                    <td>{{ getDate(classes.course_start ?? 'Updating, please check back') }}</td>
                                                    <td>{{ getDate(classes.course_end ?? 'Updating, please check back') }}</td>
                                                </tr>
                                            </tbody>
                                </table>
                                <hr class="border-t-1 border-black">
                            </div>
                            
                        </div>
                        <Link 
                            :href="route('take-a-class.bls')" 
                            :class="{'bg-gray-400 cursor-not-allowed': blsclass.data.length === 0, 'bg-gray-300 text-black': blsclass.data.length > 0}" 
                            :disabled="blsclass.data.length === 0"
                            class="font-bold py-2 px-4 w-full rounded text-center"
                            v-if="blsclass.data.length > 0"
                        >Enroll Now</Link>
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
defineProps({
    blsclass: Object,

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
}

const cna_group = new URL('../assets/images/cna_group.jpg', import.meta.url).href
const HHA = new URL('../assets/images/HHA.jpg', import.meta.url).href
const medical = new URL('../assets/images/medical.jpg', import.meta.url).href
const bls = new URL('../assets/images/bls.jpg', import.meta.url).href

</script>
