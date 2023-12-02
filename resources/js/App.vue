<script setup>
import LoadingIndicator from "@/components/loading-indicator/LoadingIndicator.vue";
import {useRootStore} from "@/store/useRootStore.js";
const rootStore = useRootStore();
</script>

<template>
    <loading-indicator v-if="rootStore.showLoader"></loading-indicator>
    <router-view></router-view>
    <div id="x__modals"></div>
</template>

<style>

</style>
