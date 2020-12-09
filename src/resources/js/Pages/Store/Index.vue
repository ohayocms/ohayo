<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Магазин игровых товаров
            </h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-3">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg grid-cols-1  mr-5" v-for="item in storeItems">
                    <inertia-link :href="'/store/'+item.id">
                        <img :src="'/storage/'+item.image">
                        <p class="p-2"><b>{{ item.name }}</b><span class="text-gray-400 block">{{item.server.name}}</span> </p>
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
    props: ['storeItems']
}
</script>

<style scoped>

</style>
