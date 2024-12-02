<template>
    <Head title=" | Nurse Assistant" />
    <div class="bg-lime-300 text-center mb-3 -mt-3">
        <h1 class="text-3xl font-bold p-6">NATCEP-Accredited and Endorsed In-Person NURSE AIDE/ASSISTANT (CNA) Training Courses</h1>
        
    </div>

        <div class="flex flex-wrap mx-2 justify-center">
            <!-- column 4 Hidden -->
            <div class="flex-none w-full md:w-1/12 mb-2 md:mb-4 p-4 rounded-lg min-w-[220px]">
                <h1 class="text-2xl font-bold">{{ 'Nurse' }}<br>{{ 'Assistant' }}</h1>
            </div>
            <!-- column 2 -->
            <div class="flex-none w-full md:w-1/3 mb-2 md:mb-4 p-4 mx-2 bg-gray-200 rounded-lg shadow-md min-w-[220px]">

                <div class="flex flex-col md:flex-row justify-center space-x-0 md:space-x-4 h-full">
                    <div class="w-full md:w-3/3 bg-lime-300 flex flex-col justify-between mb-4 md:mb-0">
                        <img class="w-full h-72 object-cover"  :src="cna_group"  alt="CNA" />
                        <div class="p-4 flex-grow">
                            <h2 class="text-xl font-bold">NURSE AIDE/ASSISTANT TRAINING (CNA)</h2> 
                            <hr class="border-t-2 border-black">
                            <p class="text-xl pt-3">
                                The Certified Nursing Assistant (CNA) program at Above and Beyond Care is designed to equip students 
                                with the knowledge and skills needed to excel in traditional nursing assistant roles within nursing 
                                homes, hospitals, and home care settings. We believe it is our ethical and legal duty to provide 
                                comprehensive education and training, ensuring students are prepared to deliver safe, effective, and 
                                compassionate care. 
                            </p>
                            <p class="text-xl pt-3">
                                The program focuses on developing essential nursing assistant skills, promoting 
                                safety, and incorporating a psychosocial approach to patient and resident care. Our curriculum addresses 
                                the needs of individuals at all stages of life, from infancy to elderly care. Above and Beyond Care’s 
                                CNA program supports our mission to enhance the quality of life for our students through education and 
                                job training, within a community that encourages lifelong learning.
                            </p>
                        </div>
                        <Link 
                            :href="route('take-a-class.cna')" 
                            :class="{'bg-gray-400 cursor-not-allowed': cnaclass.data.length === 0, 'bg-lime-400 text-black': cnaclass.data.length > 0}" 
                            :disabled="cnaclass.data.length === 0"
                            class="font-bold py-2 px-4 w-full rounded text-center"
                            v-if="cnaclass.data.length > 0"
                        >More Training Dates</Link>
                    </div>
                </div>
            </div>
         <!-- column 3 -->

        <div class="flex-none w-full md:w-1/3 mb-2 md:mb-4 p-4 mx-2 bg-gray-200 rounded-lg shadow-md min-w-[220px]">

            <div class="flex flex-col md:flex-row justify-center space-x-0 md:space-x-4 h-full">
                    <div class="w-full md:w-3/3 bg-orange-300 flex flex-col justify-between mb-4 md:mb-0">
                        <div class="p-4 flex-grow">
                            <h2 class="text-xl font-bold">CNA Program Outlook</h2> 
                            <div class="text-xl mt-3 mb-5 pb-5 justify-center">
                                <ul style="list-style-type: none; padding-left: 0;">
                                    <li style="padding-left: 20px; text-indent: -20px; margin-bottom: 2px;">
                                        <span style="font-size: 1.5em; color: black;">•</span> Accredited by NJ Department of Education Health
                                    </li>
                                    <li style="padding-left: 20px; text-indent: -20px; margin-bottom: 2px;">
                                        <span style="font-size: 1.5em; color: black;">•</span> 90 hours, consisting of 50 classroom hours and 40 clinical hours.
                                    </li>
                                    <li style="padding-left: 20px; text-indent: -20px; margin-bottom: 2px;">
                                        <span style="font-size: 1.5em; color: black;">•</span> Nurse Aide in Long Term Care Facilities Training and Competency Evaluation Program (NATCEP).
                                    </li>
                                    <li style="padding-left: 20px; text-indent: -20px; margin-bottom: 2px;">
                                        <span style="font-size: 1.5em; color: black;">•</span> 100% State Exam passing Rate.
                                    </li>
                                    <li style="padding-left: 20px; text-indent: -20px; margin-bottom: 2px;">
                                        <span style="font-size: 1.5em; color: black;">•</span> Affordable Payment Plan
                                    </li>
                                    <li style="padding-left: 20px; text-indent: -20px; margin-bottom: 2px;">
                                        <span style="font-size: 1.5em; color: black;">•</span> Job Placement Available
                                    </li>
                                    <li style="padding-left: 20px; text-indent: -20px; margin-bottom: 2px;">
                                        <span style="font-size: 1.5em; color: black;">•</span> Stethoscope, BP Cuff, Pulse-Ox, Textbooks, Workbook, Uniforms, PSI Exam fee etc. included in the tuition.
                                    </li>
                                </ul>
                            </div>

                            
                            <h2 class="text-xl font-bold">Upcoming Classes (CNA)</h2> 
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
                                            <tr v-if="cnaclass.data.length === 0">
                                                <td colspan="3" class="font-bold text-center tex-2xl mt-5 p-5 animate-pulse">Updating, please check back!</td>
                                            </tr>
                                            <tr v-for="classes in cnaclass.data" :key="classes.id">
                                            <td>{{ classes.training_code ?? 'Updating, please check back' }}</td>
                                            <td>{{ getDate(classes.course_start ?? 'Updating, please check back') }}</td>
                                            <td>{{ getDate(classes.course_end ?? 'Updating, please check back') }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            <hr class="border-t-1 border-black">
                            <p class="mt-5 text-xl ">Each class will feature hands-on activities and expert 
                                    instruction to ensure you get the most out of your learning experience. Don’t miss this opportunity to grow</p>
                        </div>
                        <Link 
                            :href="route('take-a-class.cna')" 
                            :class="{'bg-gray-400 cursor-not-allowed': cnaclass.data.length === 0, 'bg-orange-400 text-black': cnaclass.data.length > 0}" 
                            :disabled="cnaclass.data.length === 0"
                            class="font-bold py-2 px-4 w-full rounded text-center"
                            v-if="cnaclass.data.length > 0"
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
    cnaclass: Object,

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

</script>
