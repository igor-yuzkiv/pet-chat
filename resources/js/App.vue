<script setup>
import LoadingIndicator from "@/components/loading-indicator/LoadingIndicator.vue";
import {useRootStore} from "@/store/useRootStore.js";
import ConfirmDialogWrapper from "@/components/confirm-dialog/ConfirmDialogWrapper.vue";
const rootStore = useRootStore();
</script>

<template>
    <loading-indicator v-if="rootStore.getLoaderState"></loading-indicator>
    <router-view></router-view>
    <confirm-dialog-wrapper/>
    <div id="x__modals"></div>
</template>

<style>

</style>
