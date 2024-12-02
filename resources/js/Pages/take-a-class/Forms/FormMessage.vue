<template>
    <Head title=" | Contact" />
    <div class="bg-lime-300 text-center mb-3 -mt-3">
        <h1 class="text-3xl font-bold p-6">NATCEP-Accredited and Endorsed In-Person NURSE AIDE/ASSISTANT (CNA) Training Courses</h1>
        
    </div>

        <div class="flex flex-wrap mx-2 justify-center">
            <!-- column 4 Hidden -->
            <div class="flex-none w-full md:w-1/12 mb-2 md:mb-4 p-4 rounded-lg min-w-[220px]">
            </div>
            <!-- column 2 -->
            <div class="flex-none w-full md:w-3/6 mb-2 md:mb-4 p-4 mx-2 bg-gray-200 rounded-lg shadow-md min-w-[220px]">

                <div class="flex flex-col md:flex-row justify-center space-x-0 md:space-x-4 h-full">
                    <div class="w-full md:w-3/3 bg-lime-300 flex flex-col justify-between mb-4 md:mb-0">
                        <div class="p-4 flex-grow mt-5 pt-5 mb-5 pb-5">
                            <hr class="border-t-2 border-black mb-4">
                            <p v-if="$page.props.flash.message" class="p-4 bg-green-200">{{ $page.props.flash.message }} </p>
                            <p v-if="$page.props.flash.message_body" class="p-4 bg-green-200">  {{ $page.props.flash.message_body }}  </p>
                            <p v-else class="p-4 bg-green-200">Welcome to Above and Beyond Care.  </p>
                            <hr class="border-t-2 border-black mt-5">
                            
                        </div>
                                    
                    </div>
                </div>
            </div>
        </div>
         
</template>

<script setup>


</script>
