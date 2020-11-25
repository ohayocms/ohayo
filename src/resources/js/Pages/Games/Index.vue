<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Игры, в которых у нас есть свои сервера
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-3">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg grid-cols-1  mr-5" v-for="game in games">
                    <inertia-link :href="'/games/'+game.id">
                        <img :src="'/storage/'+game.image">
                        <p class="p-2"><b>{{ game.name }}</b> - {{ serversCount(game.id) }} активных серверов в
                            {{ game.mods.length }} игровых режимах.</p>
                    </inertia-link>
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
    props: ['games'],
    methods: {
        serversCount: function (id) {
            let count = 0;
            for (let i = 0; i < this.games.length; i++) {
                if (this.games[i].id === id) {
                    for (let j = 0; j < this.games[i].mods.length; j++) {
                        count += this.games[i].mods[j].servers.length;
                    }
                }
            }
            return count;
        }
    }
}
</script>

<style scoped>

</style>
