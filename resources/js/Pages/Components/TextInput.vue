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
});

const emit = defineEmits(['update:modelValue']);
</script>

<template>
    <div class="mb-2 w-2/3 rounded">
        <label :for="name" class="w-1/3">{{ name }}</label>
        <input
            :type="type"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
            class="border-gray-300 rounded text-gray-700 w-80 h-8"
            :class="{'!ring-red-500': message}"
            :disabled="disabled"
        />
        <br>
        <small class="text-red-900 font-bold" v-if="message">{{ message }}</small>
    </div>
</template>
