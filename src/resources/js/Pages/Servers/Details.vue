<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ server.name }}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-3 gap-4">
                <div class="col-span-2">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                        <img :src="'/ohayo/maps/no_map.png'" class="w-full">
                    </div>
                    <store-items :store_items="server.store_items" class="mt-2"></store-items>
                </div>
                <div class="col-span-1">
                    <div class="col-span-1" v-if="server.mod.game.type === 2">
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg h-100 p-4">
                            <h3>Игроки онлайн: {{ this.monitoring[0] ? this.monitoring[0].players.online : '0' }}</h3>
                            <span
                                v-for="(player,key,index) in this.monitoring[0] ? this.monitoring[0].players.sample : []">
                        <span><img :src="'https://crafatar.com/avatars/'+player.id"
                                   class="w-6 h-6 inline-flex"> {{ player.name ? player.name : 'Подключается...' }} <br></span>
                    </span>
                        </div>
                    </div>
                    <div class="col-span-1" v-else>
                        <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg h-100 p-4">
                            <h3>Игроки онлайн: {{ this.monitoring[0] ? this.monitoring[0].Players : '0' }}</h3>
                            <table class="table table-borderless w-full">
                                <thead>
                                <td>Имя</td>
                                <td>Сессия</td>
                                <td>Убийств</td>
                                </thead>
                                <tbody>
                                <tr v-for="player in this.monitoring[1]">
                                    <td>{{ player.Name ? player.Name : 'Подключается...' }}</td>
                                    <td>{{ player.TimeF }}</td>
                                    <td>{{ player.Frags }}</td>
                                </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from '@/Layouts/AppLayout'
import StoreItems from "./StoreItems";

const axios = require('axios');
export default {
    components: {
        AppLayout,
        StoreItems
    },
    props: ['server'],
    data: function () {
        return {
            monitoring: []
        }
    },
    methods: {
        currentPath: () => {
            return window.location.pathname;
        },
        async loadMonitoring() {
            const {data} = await axios.get('/servers/' + this.server.id + '/monitoring');
            this.monitoring = data;
        }
    },
    async beforeMount() {
        await this.loadMonitoring();
    }
}
</script>

<style scoped>

</style>
