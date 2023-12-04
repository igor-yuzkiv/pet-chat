<script setup>
defineProps({
    message: {
        type    : Object,
        required: true,
    },
})
</script>

<template>
    <div class="flex">
        {{ message.body }}
    </div>
</template>

<style scoped>

</style>
