<template>
    <jet-action-section>
        <template #title>
            Двухфакторная аутентификация
        </template>

        <template #description>
            Добавьте дополнительную безопасность к своей учетной записи, используя двухфакторную аутентификацию.
        </template>

        <template #content>
            <h3 class="text-lg font-medium text-gray-900" v-if="twoFactorEnabled">
                 Вы включили двухфакторную аутентификацию.
            </h3>

            <h3 class="text-lg font-medium text-gray-900" v-else>
                Вы не включили двухфакторную аутентификацию.
            </h3>

            <div class="mt-3 max-w-xl text-sm text-gray-600">
                <p>
                    Если двухфакторная аутентификация включена, вам будет предложено ввести безопасный случайный токен во время аутентификации. Вы можете получить этот токен из приложения Google Authenticator на вашем телефоне.
                </p>
            </div>

            <div v-if="twoFactorEnabled">
                <div v-if="qrCode">
                    <div class="mt-4 max-w-xl text-sm text-gray-600">
                        <p class="font-semibold">
                            Теперь включена двухфакторная аутентификация. Отсканируйте следующий QR-код с помощью приложения для вашего телефона.
                        </p>
                    </div>

                    <div class="mt-4 dark:p-4 dark:w-56 dark:bg-white" v-html="qrCode">
                    </div>
                </div>

                <div v-if="recoveryCodes.length > 0">
                    <div class="mt-4 max-w-xl text-sm text-gray-600">
                        <p class="font-semibold">
                            Храните эти коды восстановления в безопасном диспетчере паролей. Их можно использовать для восстановления доступа к вашей учетной записи, если ваше устройство двухфакторной аутентификации потеряно.
                        </p>
                    </div>

                    <div class="grid gap-1 max-w-xl mt-4 px-4 py-4 font-mono text-sm bg-gray-100 rounded-lg">
                        <div v-for="code in recoveryCodes" :key="code">
                            {{ code }}
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-5">
                <div v-if="! twoFactorEnabled">
                    <jet-confirms-password @confirmed="enableTwoFactorAuthentication">
                        <jet-button type="button" :class="{ 'opacity-25': enabling }" :disabled="enabling">
                            Включить
                        </jet-button>
                    </jet-confirms-password>
                </div>

                <div v-else>
                    <jet-confirms-password @confirmed="regenerateRecoveryCodes">
                        <jet-secondary-button class="mr-3"
                                        v-if="recoveryCodes.length > 0">
                            Восстановить коды восстановления
                        </jet-secondary-button>
                    </jet-confirms-password>

                    <jet-confirms-password @confirmed="showRecoveryCodes">
                        <jet-secondary-button class="mr-3" v-if="recoveryCodes.length == 0">
                            Показать коды восстановления
                        </jet-secondary-button>
                    </jet-confirms-password>

                    <jet-confirms-password @confirmed="disableTwoFactorAuthentication">
                        <jet-danger-button
                                        :class="{ 'opacity-25': disabling }"
                                        :disabled="disabling">
                            Выключить
                        </jet-danger-button>
                    </jet-confirms-password>
                </div>
            </div>
        </template>
    </jet-action-section>
</template>

<script>
    import JetActionSection from '@/Jetstream/ActionSection'
    import JetButton from '@/Jetstream/Button'
    import JetConfirmsPassword from '@/Jetstream/ConfirmsPassword'
    import JetDangerButton from '@/Jetstream/DangerButton'
    import JetSecondaryButton from '@/Jetstream/SecondaryButton'

    export default {
        components: {
            JetActionSection,
            JetButton,
            JetConfirmsPassword,
            JetDangerButton,
            JetSecondaryButton,
        },

        data() {
            return {
                enabling: false,
                disabling: false,

                qrCode: null,
                recoveryCodes: [],
            }
        },

        methods: {
            enableTwoFactorAuthentication() {
                this.enabling = true

                this.$inertia.post('/user/two-factor-authentication', {}, {
                    preserveScroll: true,
                }).then(() => {
                    return Promise.all([
                        this.showQrCode(),
                        this.showRecoveryCodes()
                    ])
                }).then(() => {
                    this.enabling = false
                })
            },

            showQrCode() {
                return axios.get('/user/two-factor-qr-code')
                        .then(response => {
                            this.qrCode = response.data.svg
                        })
            },

            showRecoveryCodes() {
                return axios.get('/user/two-factor-recovery-codes')
                        .then(response => {
                            this.recoveryCodes = response.data
                        })
            },

            regenerateRecoveryCodes() {
                axios.post('/user/two-factor-recovery-codes')
                        .then(response => {
                            this.showRecoveryCodes()
                        })
            },

            disableTwoFactorAuthentication() {
                this.disabling = true

                this.$inertia.delete('/user/two-factor-authentication', {
                    preserveScroll: true,
                }).then(() => {
                    this.disabling = false
                })
            },
        },

        computed: {
            twoFactorEnabled() {
                return ! this.enabling && this.$page.user.two_factor_enabled
            }
        }
    }
</script>
