<template>
    <Head title=" | Home" />
    <div class="bg-gray-200 text-center mb-3 -mt-3">
        <h1 class="text-3xl">Hello, {{ $page.props.auth.user.name}}.</h1>
            <h6 class="text-sm font-bold">{{ $page.props.auth.user.email}}</h6>
            <p>Welcome to your dashboard. Here you can manage enrollments, create and view classes, and adjust settings.</p>        <!-- New div for paragraph spanning two columns -->
    <div class="flex flex-wrap mx-2 mb-4 justify-center">
        <p v-if="$page.props.flash.message" class="p-4 bg-green-200">{{ $page.props.flash.message }} </p>
                            <p v-if="$page.props.flash.message_body" class="p-4 bg-green-200">  {{ $page.props.flash.message_body }}  </p>
                            
    </div>
    </div>

        <div class="flex flex-wrap mx-2 justify-center">
            <!-- column 4 Hidden -->
            <div class="flex-none w-full md:w-1/12 mb-2 md:mb-4 p-4 rounded-lg min-w-[220px]">
                <h1 class="text-2xl font-bold">{{ "DashBoard" }}</h1>
            </div>
            <!-- column 2 -->
            <div class="flex-none w-full md:w-1/3 mb-2 md:mb-4 p-4 mx-2 bg-gray-200 rounded-lg shadow-md min-w-[220px]">

                <div class="flex flex-col md:flex-row justify-center space-x-0 md:space-x-4 h-full">
                    <div class="w-full md:w-3/3 bg-lime-300 flex flex-col justify-between mb-4 md:mb-0">
                        <div class="p-4 flex-grow">
                            <h2 class="text-xl font-bold">Enrollment Statistics</h2> 
                            <hr class="border-t-2 border-black">
                            <!-- CNA START -->
                            <div class="pt-3">
                                <table class="min-w-full bg-white border border-gray-300">
                                    <thead>
                                        <tr class="bg-gray-200">
                                            <th class="px-4 py-2 text-left" colspan="3">CNA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="border px-4 py-3 text-left font-bold">Total (Till Date)</td>
                                            <td class="border px-4 py-3 font-bold">{{ classData.cnaEnrollment?.length || '--' }}</td>
                                            <td class="border px-4 py-3">
                                                <Link 
                                                    :href="route('cna_all_registration')" 
                                                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 font-bold"
                                                    v-if="classData.cnaEnrollment && classData.cnaEnrollment.length"
                                                >View All</Link>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border px-4 py-3 text-left font-bold">New (Unread)</td>
                                            <td class="border px-4 py-3 font-bold">{{ classData.cnaUnreadCount || '--' }}</td>
                                            <td class="border px-4 py-3">
                                                <Link 
                                                    :href="route('all_unred_registration')" 
                                                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 font-bold"
                                                    v-if="classData.cnaUnreadCount"
                                                >View All</Link>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border px-4 py-3 text-left font-bold">Pending Payment</td>
                                            <td class="border px-4 py-3 font-bold">{{ classData.cnaPaymentPendingCount || '--' }}</td>
                                            <td class="border px-4 py-3">
                                                <Link 
                                                    :href="route('cna_pending_payment')" 
                                                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 font-bold"
                                                    v-if="classData.cnaPaymentPendingCount"
                                                >View All</Link>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- HHA Start -->
                            <div class="pt-3">
                                <table class="min-w-full bg-white border border-gray-300">
                                    <thead>
                                        <tr class="bg-gray-200">
                                            <th class="px-4 py-2 text-left" colspan="3">HHA</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="border px-4 py-3 text-left font-bold">Total (Till Date)</td>
                                            <td class="border px-4 py-3 font-bold">{{ classData.hhaEnrollments?.length || '--' }}</td>
                                            <td class="border px-4 py-3">
                                                <Link 
                                                    :href="route('admin.hha_all_registration')" 
                                                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 font-bold"
                                                    v-if="classData.hhaEnrollments && classData.hhaEnrollments.length"
                                                >View All</Link>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border px-4 py-3 text-left font-bold">New (Unread)</td>
                                            <td class="border px-4 py-3 font-bold">{{ classData.hhaUnreadCount || '--' }}</td>
                                            <td class="border px-4 py-3">
                                                <Link 
                                                    :href="route('hha_unred_registration')" 
                                                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 font-bold"
                                                    v-if="classData.hhaUnreadCount"
                                                >View All</Link>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border px-4 py-3 text-left font-bold">Pending Payment</td>
                                            <td class="border px-4 py-3 font-bold">{{ classData.hhaPaymentPendingCount || '--' }}</td>
                                            <td class="border px-4 py-3">
                                                <Link 
                                                    :href="route('hha_pending_payment')" 
                                                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 font-bold"
                                                    v-if="classData.hhaPaymentPendingCount"
                                                >View All</Link>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Medication Admin Start -->
                            <div class="pt-3">
                                <table class="min-w-full bg-white border border-gray-300">
                                    <thead>
                                        <tr class="bg-gray-200">
                                            <th class="px-4 py-2 text-left" colspan="3">Medication Admin</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="border px-4 py-3 text-left font-bold">Total (Till Date)</td>
                                            <td class="border px-4 py-3 font-bold">{{ classData.medEnrollments?.length || '--' }}</td>
                                            <td class="border px-4 py-3">
                                                <Link 
                                                    :href="route('admin.med_all_registration')" 
                                                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 font-bold"
                                                    v-if="classData.medEnrollments && classData.medEnrollments.length"
                                                >View All</Link>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border px-4 py-3 text-left font-bold">New (Unread)</td>
                                            <td class="border px-4 py-3 font-bold">{{ classData.medUnreadCount || '--' }}</td>
                                            <td class="border px-4 py-3">
                                                <Link 
                                                    :href="route('med_unred_registration')" 
                                                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 font-bold"
                                                    v-if="classData.medUnreadCount"
                                                >View All</Link>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border px-4 py-3 text-left font-bold">Pending Payment</td>
                                            <td class="border px-4 py-3 font-bold">{{ classData.medPaymentPendingCount || '--' }}</td>
                                            <td class="border px-4 py-3">
                                                <Link 
                                                    :href="route('med_pending_payment')" 
                                                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 font-bold"
                                                    v-if="classData.medPaymentPendingCount"
                                                >View All</Link>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- BLS/CPR/AED -->
                            <div class="pt-3">
                                <table class="min-w-full bg-white border border-gray-300">
                                    <thead>
                                        <tr class="bg-gray-200">
                                            <th class="px-4 py-2 text-left" colspan="3">BLS/CPR/AED</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="border px-4 py-3 text-left font-bold">Total (Till Date)</td>
                                            <td class="border px-4 py-3 font-bold">{{ classData.blsEnrollments?.length || '--' }}</td>
                                            <td class="border px-4 py-3">
                                                <Link 
                                                    :href="route('admin.bls_all_registration')" 
                                                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 font-bold"
                                                    v-if="classData.blsEnrollments && classData.blsEnrollments.length"
                                                >View All</Link>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border px-4 py-3 text-left font-bold">New (Unread)</td>
                                            <td class="border px-4 py-3 font-bold">{{ classData.blsUnreadCount || '--' }}</td>
                                            <td class="border px-4 py-3">
                                                <Link 
                                                    :href="route('bls_unred_registration')" 
                                                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 font-bold"
                                                    v-if="classData.blsUnreadCount"
                                                >View All</Link>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border px-4 py-3 text-left font-bold">Pending Payment</td>
                                            <td class="border px-4 py-3 font-bold">{{ classData.blsPaymentPendingCount || '--' }}</td>
                                            <td class="border px-4 py-3">
                                                <Link 
                                                    :href="route('bls_pending_payment')" 
                                                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 font-bold"
                                                    v-if="classData.blsPaymentPendingCount"
                                                >View All</Link>
                                            </td>
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
                            <h2 class="text-xl font-bold">Class Statistics</h2> 
                            <hr class="border-t-2 border-black">
                            <!-- CNA START -->
                            <div class="pt-3">
                                <table class="min-w-full bg-white border border-gray-300">
                                    <thead>
                                        <tr class="bg-gray-200">
                                            <th class="px-4 py-2 text-left" colspan="2">CNA</th>
                                            <th class="px-4 py-2 text-left" colspan="1">
                                                <Link 
                                                    :href="route('admin.register_cna_class')" 
                                                    class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-indigo-600 font-bold"
                                                    v-if="classData.takeClasses && classData.takeClasses.length"
                                                >Add Class</Link>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="border px-4 py-3 text-left font-bold">Total (Till Date)</td>
                                            <td class="border px-4 py-3 font-bold">{{ classData.takeClasses?.length || '--' }}</td>
                                            <td class="border px-4 py-3">
                                                <Link 
                                                    :href="route('admin.cna_all_classes')" 
                                                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 font-bold"
                                                    v-if="classData.takeClasses && classData.takeClasses.length"
                                                >View All</Link>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border px-4 py-3 text-left font-bold">UpComing Class</td>
                                            <td class="border px-4 py-3 font-bold">{{ classData.cnaUpcomingCount || '--' }}</td>
                                            <td class="border px-4 py-3">
                                                <Link 
                                                    :href="route('admin.cna_all_upcoming_classes')" 
                                                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 font-bold"
                                                    v-if="classData.cnaUpcomingCount"
                                                >View All</Link>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border px-4 py-3 text-left font-bold">Pending Payment</td>
                                            <td class="border px-4 py-3 font-bold">{{ classData.cnaPaymentPendingCount || '--' }}</td>
                                            <td class="border px-4 py-3">
                                                <Link 
                                                    :href="route('cna_pending_payment')" 
                                                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 font-bold"
                                                    v-if="classData.cnaPaymentPendingCount"
                                                >View All</Link>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- HHA Start -->
                            <div class="pt-3">
                                <table class="min-w-full bg-white border border-gray-300">
                                    <thead>
                                        <tr class="bg-gray-200">
                                            <th class="px-4 py-2 text-left" colspan="2">HHA</th>
                                            <th class="px-4 py-2 text-left" colspan="1">
                                                <Link 
                                                    :href="route('admin.register_hha_class')" 
                                                    class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-indigo-600 font-bold"
                                                    v-if="classData.takeClasses && classData.takeClasses.length"
                                                >Add Class</Link>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="border px-4 py-3 text-left font-bold">Total (Till Date)</td>
                                            <td class="border px-4 py-3 font-bold">{{ classData.takeClassHhas?.length || '--' }}</td>
                                            <td class="border px-4 py-3">
                                                <Link 
                                                    :href="route('admin.hha_all_classes')" 
                                                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 font-bold"
                                                    v-if="classData.takeClassHhas && classData.takeClassHhas.length"
                                                >View All</Link>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border px-4 py-3 text-left font-bold">UpComing Class</td>
                                            <td class="border px-4 py-3 font-bold">{{ classData.hhaUpcomingCount || '--' }}</td>
                                            <td class="border px-4 py-3">
                                                <Link 
                                                    :href="route('admin.hha_all_upcoming_classes')" 
                                                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 font-bold"
                                                    v-if="classData.hhaUpcomingCount"
                                                >View All</Link>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border px-4 py-3 text-left font-bold">Pending Payment</td>
                                            <td class="border px-4 py-3 font-bold">{{ classData.hhaPaymentPendingCount || '--' }}</td>
                                            <td class="border px-4 py-3">
                                                <Link 
                                                    :href="route('hha_pending_payment')" 
                                                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 font-bold"
                                                    v-if="classData.hhaPaymentPendingCount"
                                                >View All</Link>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <!-- Medication Admin Start -->
                            <div class="pt-3">
                                <table class="min-w-full bg-white border border-gray-300">
                                    <thead>
                                        <tr class="bg-gray-200">
                                            <th class="px-4 py-2 text-left" colspan="2">Medication Admin</th>
                                            <th class="px-4 py-2 text-left" colspan="1">
                                                <Link 
                                                    :href="route('admin.register_med_class')" 
                                                    class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-indigo-600 font-bold"
                                                    v-if="classData.takeClasses && classData.takeClasses.length"
                                                >Add Class</Link>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="border px-4 py-3 text-left font-bold">Total (Till Date)</td>
                                            <td class="border px-4 py-3 font-bold">{{ classData.takeClassMeds?.length || '--' }}</td>
                                            <td class="border px-4 py-3">
                                                <Link 
                                                    :href="route('admin.med_all_classes')" 
                                                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 font-bold"
                                                    v-if="classData.takeClassMeds && classData.takeClassMeds.length"
                                                >View All</Link>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border px-4 py-3 text-left font-bold">UpComing Class</td>
                                            <td class="border px-4 py-3 font-bold">{{ classData.medUpcomingCount || '--' }}</td>
                                            <td class="border px-4 py-3">
                                                <Link 
                                                    :href="route('admin.med_all_upcoming_classes')" 
                                                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 font-bold"
                                                    v-if="classData.medUpcomingCount"
                                                >View All</Link>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border px-4 py-3 text-left font-bold">Pending Payment</td>
                                            <td class="border px-4 py-3 font-bold">{{ classData.medPaymentPendingCount || '--' }}</td>
                                            <td class="border px-4 py-3">
                                                <Link 
                                                    :href="route('med_pending_payment')" 
                                                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 font-bold"
                                                    v-if="classData.medPaymentPendingCount"
                                                >View All</Link>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>

                            <!-- BLS/CPR/AED -->
                            <div class="pt-3">
                                <table class="min-w-full bg-white border border-gray-300">
                                    <thead>
                                        <tr class="bg-gray-200">
                                            <th class="px-4 py-2 text-left" colspan="2">BLS/CPR/AED</th>
                                            <th class="px-4 py-2 text-left" colspan="1">
                                                <Link 
                                                    :href="route('admin.register_bls_class')" 
                                                    class="bg-blue-900 text-white px-4 py-2 rounded hover:bg-indigo-600 font-bold"
                                                    v-if="classData.takeClasses && classData.takeClasses.length"
                                                >Add Class</Link>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td class="border px-4 py-3 text-left font-bold">Total (Till Date)</td>
                                            <td class="border px-4 py-3 font-bold">{{ classData.takeClassBlsCpr?.length || '--' }}</td>
                                            <td class="border px-4 py-3">
                                                <Link 
                                                    :href="route('admin.bls_all_classes')" 
                                                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 font-bold"
                                                    v-if="classData.takeClassBlsCpr && classData.takeClassBlsCpr.length"
                                                >View All</Link>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border px-4 py-3 text-left font-bold">UpComing Class</td>
                                            <td class="border px-4 py-3 font-bold">{{ classData.blsUpcomingCount || '--' }}</td>
                                            <td class="border px-4 py-3">
                                                <Link 
                                                    :href="route('admin.bls_all_upcoming_classes')" 
                                                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 font-bold"
                                                    v-if="classData.blsUpcomingCount"
                                                >View All</Link>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td class="border px-4 py-3 text-left font-bold">Pending Payment</td>
                                            <td class="border px-4 py-3 font-bold">{{ classData.blsPaymentPendingCount || '--' }}</td>
                                            <td class="border px-4 py-3">
                                                <Link 
                                                    :href="route('bls_pending_payment')" 
                                                    class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600 font-bold"
                                                    v-if="classData.blsPaymentPendingCount"
                                                >View All</Link>
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
  
  const props = defineProps({
  classData: {
    type: Object,
    required: true,
    default: () => ({
      cnaEnrollment: [],
      hhaEnrollments: [],
      medEnrollments: [],
      blsEnrollments: [],
      cnaUnreadCount: 0,
      hhaUnreadCount: 0,
      medUnreadCount: 0,
      blsUnreadCount: 0,
      cnaPaymentPendingCount: 0,
      hhaPaymentPendingCount: 0,
      medPaymentPendingCount: 0,
      blsPaymentPendingCount: 0,
    }),
  },
});
  </script>
  
  <style scoped>
  /* Add your styles here if needed */
  </style>
  