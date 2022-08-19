<template>
    <textarea class="border-blueGray-400 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-sm shadow-sm" :value="modelValue" @input="$emit('update:modelValue', $event.target.value)" ref="input"></textarea>
</template>

<script>
    export default {
        props: ['modelValue'],

        emits: ['update:modelValue'],

        methods: {
            focus() {
                this.$refs.input.focus()
            }
        }
    }
</script>

