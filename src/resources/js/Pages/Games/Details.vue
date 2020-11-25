<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ game.name }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-3 grid-rows-3">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg grid-cols-1 mr-5 row-span-full col-span-2">
                    <img :src="'/storage/'+game.image">
                    <h2 class="p-4 text-xl">{{ game.name }}</h2>
                    <p class="p-4 pt-0"> {{ game.description }}</p>
                </div>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg grid-cols-1 mr-5 col-span-1 row-span-1">
                    <span class="p-4">
                        <p class="p-4 pt-0 text-center text-2xl text-gray-400">Наши сервера</p>
                        <p class="p-4 pt-0" v-for="mod in game.mods">
                            <span class="text-xl text-gray-300">{{ mod.name }}</span><br>
                            <span class="text-gray-500" v-for="server in mod.servers">
                                {{server.name}} (IP: {{server.address}})
                            </span>
                        </p>

                    </span>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'

export default {
    components: {
        AppLayout
    },
    props: ['game'],
    methods: {}
}
</script>

<style scoped>

</style>
