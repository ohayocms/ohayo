<template>
    <div class="col-span-3">
        <h2 class="text-2xl text-gray-400 font-extrabold mb-4">Товары в магазине</h2>
        <div class="grid grid-cols-3 col-span-3 gap-4" v-for="item in store_items">
            <inertia-link :href="'/store/'+item.id">
                <div class="shadow-xl sm:rounded-lg col-span-1 h-100">
                    <img :src="'/storage/'+item.image"/>
                </div>
            </inertia-link>
        </div>
    </div>
</template>

<script>
export default {
    props: [
        'store_items'
    ]
}
</script>

<style scoped>

</style>
