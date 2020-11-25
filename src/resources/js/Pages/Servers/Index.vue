<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Наши игровые сервера
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto mb-4">
                <div class="overflow-hidden sm:px-6 lg:px-8 grid-cols-1">
                    <p class="text-gray-500">Фильтрация серверов по серверам и модификациям: </p>
                    <div v-for="game in games">
                        <p class="text-gray-400">{{ game.name }}</p>
                        <span class="overflow-hidden grid-cols-1 text-indigo-500 mr-4 cursor-pointer"
                              v-for="mod in game.mods">
                            <inertia-link v-if="currentPath() === '/servers/game/'+game.id+'/modification/'+mod.id"
                                          :href="'/servers/game/'+game.id+'/modification/'+mod.id" class="underline">
                                {{ mod.name }}
                            </inertia-link>
                            <inertia-link v-else :href="'/servers/game/'+game.id+'/modification/'+mod.id">
                                {{ mod.name }}
                            </inertia-link>
                        </span>
                    </div>
                </div>
            </div>
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-3">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg grid-cols-1 mr-5"
                     v-for="server in servers">
                    <inertia-link :href="'/servers/'+server.id">
                        <img :src="'/ohayo/maps/no_map.png'">
                        <p class="p-2">
                            <b>{{ server.name }}</b>.
                            Режим {{ server.mod.name }}
                            <a href="#">Подключиться</a>
                        </p>
                    </inertia-link>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'

let filter = [];
export default {
    components: {
        AppLayout
    },
    props: ['servers', 'games', 'mods'],
    methods: {
        currentPath: () => {
            return window.location.pathname;
        }
    },
}
</script>

<style scoped>

</style>
