<template>
    <Head title=" | Medication Administration" />
    <div class="bg-lime-300 text-center mb-3 -mt-3">
        <h1 class="text-3xl font-bold p-6">In-Person Medication Administration (CMA) Training Courses</h1>
        
    </div>

<div class="flex flex-wrap mx-2 justify-center">
    <!-- column 4 Hidden -->
    <div class="flex-none w-full md:w-1/12 mb-2 md:mb-4 p-4 rounded-lg min-w-[220px]">
        <h1 class="text-2xl font-bold">{{ 'Medication Administration' }}</h1>
    </div>
    <!-- column 2 -->
    <div class="flex-none w-full md:w-1/3 mb-2 md:mb-4 p-4 mx-2 bg-lime-300 rounded-lg shadow-md min-w-[220px]">

        <div class="flex flex-col md:flex-row justify-center space-x-0 md:space-x-4 h-full">
            <div class="w-full md:w-3/3 bg-gray-100 flex flex-col justify-between mb-4 md:mb-0">
                <img class="w-full h-72 object-cover"  :src="cna_group"  alt="CNA" />
                <div class="p-4 flex-grow">
                <h1 class="text-2xl font-bold">{{ 'Medication Administration' }}</h1>
                    <hr class="border-t-2 border-black"> 
                    <p class="text-xl pt-3">
                        This course is designed to equip students with the skills needed to assist residents in assisted 
                        living facilities with administering medications, including oral, inhalation, topical, and 
                        instillation methods, under the direct supervision of licensed professionals in New Jersey. 
                        To apply, individuals must be a current, active Certified Nurse Aide (CNA) or Certified Home 
                        Health Aide (CHHA) in good standing in New Jersey.
                    </p>
                </div>

                <div class="p-4 flex-grow">
                    <h2 class="text-xl font-bold">CMA Training Requirements</h2> 
                    <p class="text-xl pt-3">
                        You must have <strong>ONE</strong> of the following:
                    </p>

                    <div class="text-xl mt-3 mb-2 pb-2 justify-center">
                        <ul style="list-style-type: none; padding-left: 0;">
                            <li style="padding-left: 20px; text-indent: -20px; margin-bottom: 2px;">
                                <span style="font-size: 1.5em; color: black;">•</span> CHHHA License /Certificate
                            </li>
                            <li style="padding-left: 20px; text-indent: -20px; margin-bottom: 2px;">
                                <span style="font-size: 1.5em; color: black;">•</span> Or CNA License.
                            </li>
                            <li style="padding-left: 20px; text-indent: -20px; margin-bottom: 2px;">
                                <span style="font-size: 1.5em; color: black;">•</span> Or PCT License.
                            </li>
                            
                        </ul>
                    </div>                    
                </div>

                <div class="p-4 flex-grow mb-5 pb-5">
                    <h2 class="text-xl font-bold">Our Curriculum</h2> 
                    <div class="text-xl mt-3 mb-5 pb-2 justify-center">
                        <ul style="list-style-type: none; padding-left: 0;">
                            <li style="padding-left: 20px; text-indent: -20px; margin-bottom: 2px;">
                                <span style="font-size: 1.5em; color: black;">•</span> Hands on medication administration skill.
                            </li>
                            <li style="padding-left: 20px; text-indent: -20px; margin-bottom: 2px;">
                                <span style="font-size: 1.5em; color: black;">•</span> On site medication Administration practice.
                            </li>
                            <li style="padding-left: 20px; text-indent: -20px; margin-bottom: 2px;">
                                <span style="font-size: 1.5em; color: black;">•</span> Off-Site (Assisted Living) Medication Administration skill practice.
                            </li>
                            
                        </ul>
                    </div>    
                </div>
                        <Link 
                            :href="route('take-a-class.med')" 
                            :class="{'bg-gray-400 cursor-not-allowed': takeMedclass.data.length === 0, 'bg-gray-300 text-black': takeMedclass.data.length > 0}" 
                            :disabled="takeMedclass.data.length === 0"
                            class="font-bold py-2 px-4 w-full rounded text-center"
                            v-if="takeMedclass.data.length > 0"
                        >More Training Dates</Link>
            </div>
        </div>
    </div>
 <!-- column 3 -->

<div class="flex-none w-full md:w-1/3 mb-2 md:mb-4 p-4 mx-2 bg-orange-300 rounded-lg shadow-md min-w-[220px]">

    <div class="flex flex-col md:flex-row justify-center space-x-0 md:space-x-4 h-full">
            <div class="w-full md:w-3/3 bg-gray-100 flex flex-col justify-between mb-4 md:mb-0">
                <img class="w-full h-72 object-cover" :src="medical" alt="MedAdmin" />
                <div class="p-4 flex-grow">
                    <h2 class="text-xl font-bold">About our CMA Program</h2> 

                    <div class="text-xl mt-3 mb-5 pb-2 justify-center">
                        <ul style="list-style-type: none; padding-left: 0;">
                            <li style="padding-left: 20px; text-indent: -20px; margin-bottom: 2px;">
                                <span style="font-size: 1.5em; color: black;">•</span> 2 hrs. with Registered Pharmacist.
                            </li>
                            <li style="padding-left: 20px; text-indent: -20px; margin-bottom: 2px;">
                                <span style="font-size: 1.5em; color: black;">•</span> 25 plus hrs. with Registered Nurse.
                            </li>
                            <li style="padding-left: 20px; text-indent: -20px; margin-bottom: 2px;">
                                <span style="font-size: 1.5em; color: black;">•</span> Skill site at a facility known for "Best Memory Care in U.S. News" and "Best Workplace.
                            </li>
                            <li style="padding-left: 20px; text-indent: -20px; margin-bottom: 2px;">
                                <span style="font-size: 1.5em; color: black;">•</span> Job Placement Available.
                            </li>
                        </ul>
                    </div>

                        <h2 class="text-xl font-bold">Upcoming Classes (CMA)</h2> 
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
                                            <tr v-if="takeMedclass.data.length === 0">
                                                <td colspan="3" class="font-bold text-center tex-2xl mt-5 p-5 animate-pulse">Updating, please check back!</td>
                                            </tr>
                                            <tr v-for="classes in takeMedclass.data" :key="classes.id">
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
                            :href="route('take-a-class.med')" 
                            :class="{'bg-gray-400 cursor-not-allowed': takeMedclass.data.length === 0, 'bg-gray-300 text-black': takeMedclass.data.length > 0}" 
                            :disabled="takeMedclass.data.length === 0"
                            class="font-bold py-2 px-4 w-full rounded text-center"
                            v-if="takeMedclass.data.length > 0"
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
    takeMedclass: Object,

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

</script>

