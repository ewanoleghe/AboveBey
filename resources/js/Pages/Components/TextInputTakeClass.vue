<script setup>
import { defineProps, defineEmits } from 'vue';

const props = defineProps({
    modelValue: {
        type: [String, Number],
        required: true,
    },
    name: {
        type: String,
        required: true,
    },
    type: {
        type: String,
        default: 'text',
    },
    message: String,
    disabled: {
        type: Boolean,
        default: false,
    },
    confirmationItems: {
        type: Array,
        default: () => [],
    },
});

const emit = defineEmits(['update:modelValue']);
</script>

<template>
    <div class="mb-2 w-2/3 rounded">
        <label :for="name" class="w-1/3 font-bold">{{ name }}</label>
        <input
            :type="type"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
            class="border-gray-300 rounded text-gray-700 w-80 h-8"
            :class="{'!ring-red-500': message}"
            :disabled="disabled"
            v-bind="$attrs"  
        />
        <br>
        <small class="text-red-900 font-bold" v-if="message">{{ message }}</small>
    </div>

    <!-- for Check Boxes -->
    <div class="flex flex-col w-full md:w-5/12 mr-2 mb-4">
        <ul>
        <li class="flex items-center" v-for="(item, index) in confirmationItems" :key="index">
            <input 
            type="checkbox" 
            v-model="form.confirmations[item.key]" 
            />
            <a 
            :href="item.url" 
            target="_blank" 
            class="ml-2"
            >
            {{ item.label }}
            </a>
        </li>
        </ul>
    </div>
</template>
