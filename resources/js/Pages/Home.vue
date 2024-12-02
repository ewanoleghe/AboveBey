<template>
    <Head title=" | Home" />
    <div class="bg-lime-300 text-center mb-3 -mt-3">
        <h1 class="text-3xl font-bold p-6">NATCEP-Accredited and Endorsed In-Person NURSE AIDE/ASSISTANT (CNA) Training Courses</h1>
        <!-- New div for paragraph spanning two columns -->
    <div class="flex flex-wrap mx-2 mb-4 justify-center">
        <div class="flex-none w-full md:w-2/3 mb-2 md:mb-4 p-4 mx-2 bg-white rounded-lg shadow-md min-w-[220px]">
            <p class="mt-2 text-xl text-bold pb-3 text-balance">Welcome to Above and Beyond Care. Our certified Caregiver Courses are assessed, audited, 
                and designed to fit seamlessly into your busy lifestyle. Our comprehensive program features 13 essential modules, 
                each tailored to enhance your expertise and confidence in delivering exceptional patient care. Covering everything 
                from foundational nursing skills to specialized patient handling techniques, our course prepares aspiring 
                caregivers with the knowledge and practical skills needed for this vital role. Whether you’re beginning a new 
                career or looking to enhance your existing skills, our Caregiver course will guide you toward a fulfilling 
                path in the healthcare industry.</p>
        </div>
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
                            <h2 class="text-xl font-bold">NURSE AIDE/ASSISTANT TRAINING (CNA)</h2> 
                            <hr class="border-t-2 border-black">
                            <div class="pt-3">
                                <ul>
                                    <li><strong>Total Program Duration:</strong> 90 hours
                                        <ul>
                                            <li><strong>Classroom Hours:</strong> 50</li>
                                            <li><strong>Clinical Hours:</strong> 40</li>
                                        </ul>
                                    </li>
                                    <li><strong>State Exam Passing Rate:</strong> 100%</li>
                                    <li><strong>Payment:</strong> Affordable with payment plan </li>
                                    <li><strong>Job Placement:</strong> Assistance provided</li>
                                    <li><strong>Supplies Included in Tuition</strong> </li>
                                </ul>


                            </div>
                        </div>
                        <Link :href="route('nurseassistant')" class="bg-lime-400 text-black font-bold py-2 px-4 w-full rounded text-center">View More</Link>
                    </div>
                    
                    <div class="w-full md:w-2/3 bg-orange-300 flex flex-col justify-between">
                        <img class="w-full h-72 object-cover" :src="HHA" alt="HHA" />
                        <div class="p-4 flex-grow">
                            <h2 class="text-xl font-bold">HOME HEALTH AIDE TRAINING (CHHHA)</h2>
                            <hr class="border-t-2 border-black">
                            <div class="pt-3">
                                <ul>
                                    <li>&#10145; 3 Wks. 76 hrs. online/hybrid class</li>
                                    <li>&#10145; Self-paced. Learn from home.</li>
                                    <li>&#10145; 2 days skill practice on-site</li>
                                    <li>&#10145; Affordable Tuition</li>
                                    <li>&#10145; Job Placement Available</li>
                                    <li>&#10145; Payment plans available.</li>
                                    <li>&#10145; <strong>Reinstatement of License/Certificate.</strong></li>
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
                                    <li>&#10145; 2 hrs. with Registered Pharmacist</li>
                                    <li>&#10145; 25+ hrs. with Registered Nurse</li>
                                    <li>&#10145; Skill site at a facility known for "Best Memory Care in U.S. News" and "Best Workplace"</li>
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
                                        <li><strong>Basic Life Support BLS Training</strong> 
                                            <ul>
                                                <li>Teaches CPR and AED skills for prehospital and in-facility environments</li>
                                                <li><strong>BLS for Healthcare Providers Course</strong> </li>
                                            </ul>
                                        </li>
                                        <li><strong>Get certified in Basic Life Support with our online BLS certification.</strong> </li>
                                        <li>Expert-led classes cover CPR, AED, and choking techniques. </li>
                                        <li>Supplies Included in Tuition. </li>
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

const cna_group = new URL('../assets/images/cna_group.jpg', import.meta.url).href
const HHA = new URL('../assets/images/HHA.jpg', import.meta.url).href
const medical = new URL('../assets/images/medical.jpg', import.meta.url).href
const bls = new URL('../assets/images/bls.jpg', import.meta.url).href

</script>
