<template>
    <app-layout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                {{ store_item.name }}
            </h2>
        </template>
        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 grid grid-cols-3 grid-rows-3">
                <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg grid-cols-1 mr-5 row-span-2 col-span-2">
                    <img :src="'/storage/'+store_item.image">
                    <h2 class="p-4 text-xl">{{ store_item.name }}</h2>
                    <p class="p-4 pt-0" v-html="store_item.description"> {{ store_item.description }}</p>

                    <div class="p-4 pt-0 col-span-1">
                        <span class="text-xl text-gray-300">Ценники</span>
                        <table class="table-auto w-full overflow-auto">
                            <thead class="w-full">
                            <td>Валюта</td>
                            <td class="text-center">Цена</td>
                            </thead>
                            <tbody>
                            <tr v-for="price in store_item.store_item_prices" v-if="price.value!==-1">
                                <td>{{ price.currency.name }}</td>
                                <td class="text-center">{{ price.value }} {{ price.currency.sign }}</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class=" col-span-1 row-span-1">
                    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg mr-5">
                        <div class="p-4">
                            <p class="p-4 pt-0 text-center text-2xl text-gray-400">Покупка</p>
                            <div class="grid grid-cols-1 grid-flow-row">
                                <div class="p-4 pt-0 col-span-1">
                                    <form @submitted="processBuyItem">
                                        <div class="col-span-6 sm:col-span-4" v-if="countValidCurrencies() > 1">
                                            <label for="currency">Выберите валюту</label>
                                            <select id="currency"
                                                    class="p-2 bg-gray-100 border-solid mt-1 block w-full mb-2"
                                                    v-model="form.currency_id" required>
                                                <option v-for="price in store_item.store_item_prices"
                                                        v-if="price.value!==-1" :value="price.currency.id">
                                                    {{ price.currency.name }}
                                                </option>
                                            </select>
                                            <div class="text-red-600" v-if="errors.currency_id">
                                                {{ errors.currency_id }}
                                            </div>
                                        </div>
                                        <div class="col-span-6 sm:col-span-4" v-if="countValidCurrencies() > 1">
                                            <label for="count">Укажите количество</label>
                                            <input type="number" name="count" value="1" min="1" max="99999" step="1"
                                                   id="count"
                                                   class="bg-gray-100 p-2 border-solid mt-1 block w-full mb-2"/>
                                            <div class="text-red-600" v-if="errors.count">
                                                {{ errors.count }}
                                            </div>
                                        </div>
                                        <button type="submit"
                                                class="bg-gradient-to-r from-teal-400 to-blue-500 text-white rounded p-4 pt-2 pb-2"
                                        >
                                            Оплатить
                                        </button>
                                    </form>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </app-layout>
</template>

<script>
import AppLayout from "../../Layouts/AppLayout";
import Button from "../../Jetstream/Button";

export default {
    components: {
        Button,
        AppLayout
    },
    data() {
        return {
            form: this.$inertia.form({
                '_method': 'POST',
                currency_id: "",
                count: 0,
            }, {
                bag: 'processBuyForm',
                resetOnSuccess: false,
            }),

            photoPreview: null,
        }
    },
    props: [
        'store_item',
        'errors'
    ],
    methods: {
        processBuyItem: function () {
            console.log('processed');
        },
        countValidCurrencies: function () {
            let count = 0;
            for (let i = 0; i < this.store_item.store_item_prices.length; i++) {
                if (this.store_item.store_item_prices[i].value !== -1) {
                    count++;
                }
            }
            return count;
        }
    }
}
</script>

<style scoped>

</style>
