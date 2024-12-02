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
    inputClass: {
        type: String,
        default: '',
    },
});

const emit = defineEmits(['update:modelValue']);
</script>

<template>
    <div class="mb-6">
        <label :for="name" class="block font-bold mb-1">{{ name }}</label>
        <input
            :type="type"
            :value="modelValue"
            @input="$emit('update:modelValue', $event.target.value)"
            class="w-full p-2 border rounded focus:outline-none focus:ring focus:ring-lime-300"
            :class="inputClass"
            :disabled="disabled"
        />
        <span v-if="message" class="text-red-600 text-sm">{{ message }}</span>
    </div>
</template>
