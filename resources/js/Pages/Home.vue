<template>
    <Head title=" | Home" />
    
    <div class="relative w-full h-[80vh] bg-cover bg-center bg-no-repeat sm:min-h-[400px] md:min-h-[400px] lg:min-h-[400px] bg-[url('path/to/your/image.jpg')] md:bg-[url('path/to/your/large/image.jpg')]" :style="currentImageStyle"> 
        <!-- replace h-[80vh]  with h-screen  for larger image -->    
        <div class="absolute inset-0 bg-black opacity-40"></div> <!-- Overlay -->
        
        <!-- Adjust the text positioning -->
        <div class="absolute top-10 left-0 right-0 flex flex-col items-center justify-center text-center opacity-90 p-6"> 
            <h1 class="text-5xl font-bold text-white">Career Education in Healthcare</h1>
            <h2 class="text-3xl font-bold text-white">Discover how to go Above and Beyond in your HealthCare Training” Governing Bodies include DOE/DOL/NJDOH/NJBON</h2>
        </div>

        <!-- Navigation Arrows -->
        <div class="absolute left-1 top-1/2 transform -translate-y-1/2 z-20">
            <button @click="changeImage(-1)" class="p-4 text-white bg-black bg-opacity-50 hover:bg-opacity-75 transition text-4xl">
                &lt; <!-- Left Arrow -->
            </button>
        </div>
        <div class="absolute right-1 top-1/2 transform -translate-y-1/2 z-20">
            <button @click="changeImage(1)" class="p-4 text-white bg-black bg-opacity-50 hover:bg-opacity-75 transition text-4xl">
                &gt; <!-- Right Arrow -->
            </button>
        </div>
    </div>

        <div class="flex flex-wrap mx-2 justify-center">
            <!-- column 4 Hidden -->
            <div class="flex-none w-full md:w-1/12 mb-2 md:mb-4 p-4 rounded-lg min-w-[220px]">
                <h1 class="text-2xl font-bold">{{ $page.component }}</h1>
            </div>
            <!-- column 2 -->
            <div class="flex-none w-full md:w-1/3 mb-2 md:mb-4 p-4 mx-2 bg-gray-200 rounded-lg shadow-md min-w-[220px]">

                <div class="flex flex-col md:flex-row justify-center space-x-0 md:space-x-4 h-full">
                    <div class="w-full md:w-2/3 bg-lime-300 flex flex-col justify-between mb-4 md:mb-0">
                        <img class="w-full h-72 object-cover"  :src="cna_group"  alt="CNA" />
                        <div class="p-4 flex-grow">
                            <h2 class="text-xl font-bold">NURSE AIDE TRAINING</h2> 
                            <hr class="border-t-2 border-black">
                            <div class="pt-3">
                                <ul>
                                    <li>&#10145; <strong>Duration:</strong> 90 hours (Classroom + Clinical)</li>
                                    <li>&#10145; <strong>Payment:</strong> Affordable with payment plan </li>
                                    <li>&#10145; <strong>Job Placement:</strong> Assistance provided</li>
                                    <li>&#10145; <strong>Supplies Included in Tuition</strong> </li>
                                    <li>&#10145; <strong>Certification candidates must successfully complete the Nurse Aide in Long Term Care Facilities Training and Competency Evaluation Program (NATCEP)</strong> </li>
                                </ul>


                            </div>
                        </div>
                        <Link :href="route('nurseassistant')" class="bg-lime-400 text-black font-bold py-2 px-4 w-full rounded text-center">View More</Link>
                    </div>
                    
                    <div class="w-full md:w-2/3 bg-orange-300 flex flex-col justify-between">
                        <img class="w-full h-72 object-cover" :src="HHA" alt="HHA" />
                        <div class="p-4 flex-grow">
                            <h2 class="text-xl font-bold">HOME HEALTH AIDE TRAINING</h2>
                            <hr class="border-t-2 border-black">
                            <div class="pt-3">
                                <ul>
                                    <li>&#10145; <strong>Duration:</strong> 3Wks, 76Hrs</li>
                                    <li>&#10145; Online/Hybrid. Self-Paced. Train from any location</li>
                                    <li>&#10145; Self-paced. Learn from home.</li>
                                    <li>&#10145; <strong>Mandatory:</strong> On-site 2 days skill practice</li>
                                    <li>&#10145; Affordable Tuition</li>
                                    <li>&#10145; Job Placement Available</li>
                                    <li>&#10145; Payment plans available.</li>
                                </ul>

                            </div>

                        </div>
                        <Link :href="route('homehealthaid')" class="bg-orange-400 text-black font-bold py-2 px-4 w-full rounded text-center">View More</Link>
                    </div>
                </div>

            </div>
         <!-- column 3 -->

        <div class="flex-none w-full md:w-1/3 mb-2 md:mb-4 p-4 mx-2 bg-gray-200 rounded-lg shadow-md min-w-[220px]">

            <div class="flex flex-col md:flex-row justify-center space-x-0 md:space-x-4 h-full">
                    <div class="w-full md:w-2/3 bg-orange-300 flex flex-col justify-between mb-4 md:mb-0">
                        <img class="w-full h-72 object-cover" :src="medical" alt="MedAdmin" />
                        <div class="p-4 flex-grow">
                            <h2 class="text-xl font-bold">MEDICATION ADMINISTRATION (CMA)</h2> 
                            <hr class="border-t-2 border-black">

                            <div class="pt-3">
                                <ul>
                                    <li>&#10145; <strong>Duration:</strong> 35+ Hrs</li>
                                    <li>&#10145; <strong>Mandatory:</strong> Med Pass in one of the Best Memory Care in U.S News and Best Workplace</li>
                                    <li>&#10145; Program: Approved by New Jersey Department of Health (NJDOH) </li>
                                    <li>&#10145; Job Placement Available</li>
                                </ul>

                            </div>
                        </div>
                        <Link :href="route('medicationadmini')" class="bg-orange-400 text-black font-bold py-2 px-4 w-full rounded text-center">View More</Link>
                    </div>
                    
                    <div class="w-full md:w-2/3 bg-lime-300 flex flex-col justify-between">
                        <img class="w-full h-72 object-cover" :src="bls" 
                            alt="BLS/CPR/AED" />
                            <div class="p-4 mt-1 flex-grow">
                                <h2 class="text-xl font-bold">BLS/CPR/AED</h2> 
                                <br> 
                                <hr class="border-t-2 border-black">
                            
                                <div class="pt-3">
                                    <ul>
                                    <li>&#10145; Monthly BLS/CPR/AED for Adults</li>
                                    <li>&#10145; <strong>Mandatory:</strong> Med Pass in one of the Best Memory Care in U.S News and Best Workplace</li>
                                    <li>&#10145; For Healthcare workers</li>
                                    <li>&#10145; Monthly classes</li>
                                    <li>&#10145; American Heart Association approved</li>
                                </ul>


                                </div>
                            </div>
                            <Link :href="route('bls-cpr-aed')" class="bg-lime-400 text-black font-bold py-2 px-4 w-full rounded text-center">View More</Link>
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
import { ref, computed, onMounted, onBeforeUnmount } from 'vue';

const cna_group = new URL('../assets/images/cna_group.jpg', import.meta.url).href
const HHA = new URL('../assets/images/HHA.jpg', import.meta.url).href
const medical = new URL('../assets/images/medical.jpg', import.meta.url).href
const bls = new URL('../assets/images/bls.jpg', import.meta.url).href


// Array of background images
const images = [
    cna_group, // Image 1
    HHA, // Image 2
    medical, // Image 3
    bls, // Image 4
];

// Reactive state for the current image index
const currentImageIndex = ref(0);

// Computed property for the current image style
const currentImageStyle = computed(() => ({
    backgroundImage: `url(${images[currentImageIndex.value]})`
}));

// Function to change the image based on the direction (1 for right, -1 for left)
const changeImage = (direction) => {
    currentImageIndex.value = (currentImageIndex.value + direction + images.length) % images.length;
};

// Change image every 3 seconds (automatically)
let intervalId;

onMounted(() => {
    // Change the image every 3 seconds
    intervalId = setInterval(() => {
        changeImage(1); // Move to the next image automatically
    }, 3000); // 3000ms = 3 seconds
});

onBeforeUnmount(() => {
    // Clear the interval when the component is destroyed
    clearInterval(intervalId);
});
</script>
