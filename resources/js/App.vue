<script setup>
import LoadingIndicator from "@/components/loading-indicator/LoadingIndicator.vue";
import {useRootStore} from "@/store/useRootStore.js";
const rootStore = useRootStore();
</script>

<template>
   <div :class="{dark:rootStore.darkMode}">
       <loading-indicator v-if="rootStore.showLoader"></loading-indicator>
       <router-view></router-view>
       <div id="x__modals"></div>
   </div>
</template>

<style>

</style>
