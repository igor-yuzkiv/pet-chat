<script setup>
import XButton from "@/components/button/XButton.vue";
</script>

<template>
    <div class="flex flex-col h-full w-full overflow-hidden">
        <!--Header-->
        <div class="flex items-center justify-between px-3">
            <div class="flex flex-col">
                <h1 class="text-xl font-medium">Chat Name</h1>
                <div class="flex items-center justify-center gap-x-2 text-sm text-gray-500">
                    <div class="bg-green-500 h-2 w-2 inline-flex shrink-0 grow-0 rounded-full"/>
                    <span class="font-semibold">Online</span>
                    <span> - </span>
                    <span>Last seen 2 hours ago</span>
                </div>
            </div>

            <div class="flex items-center justify-en gap-x-3">
                <x-button icon="material-symbols:search"/>
                <x-button icon="material-symbols:call"/>
                <x-button icon="solar:siderbar-bold-duotone"/>
                <x-button icon="pepicons-pop:dots-y"/>
            </div>
        </div>



    </div>
</template>

<style scoped>

</style>
