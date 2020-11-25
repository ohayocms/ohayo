<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{server.name}}
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-3 gap-4">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg col-span-2">
                    <img :src="'/ohayo/maps/no_map.png'" class="w-full">
                </div>
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg col-span-1 h-auto p-4">
                    <h3>Игроки онлайн:</h3>
                    <table class="table table-borderless w-full">
                        <thead>
                        <td>uid</td>
                        <td>Имя</td>
                        <td>Сессия</td>
                        <td>КДА</td>
                        </thead>
                        <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                        </tbody>
                    </table>
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
    props: ['server'],
    methods: {
        currentPath: () => {
            return window.location.pathname;
        }
    },
}
</script>

<style scoped>

</style>
