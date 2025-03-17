<template>
    <main class="py-[160px]">
        <section class="">
            <div class="container grid grid-cols-12">
                <div class="col-span-full">
                    <div class="grid grid-cols-12 xl:gap-x-[32px] md:gap-x-[22px] max-lg:gap-y-4 max-md:gap-y-2">
                        <!-- Mobile -->
                        <div v-if="list_sidebar && list_sidebar.length" class="col-span-full lg:hidden">
                            <div
                                @click="togglePolicyMobile"
                                class="relative overflow-hidden bg-white shadow-xs cursor-pointer"
                            >
                                <div
                                    class="w-full relative py-[10px] px-[12px] md:px-[16px] flex items-center space-x-[8px] border-l-[5px] overflow-hidden text-grey-700 text-base border-primary-600"
                                >
                                    {{ content.title }}
                                </div>
                                <div
                                    class="absolute top-0 right-[12px] md:right-[16px] flex items-center justify-center h-full"
                                >
                                    <div
                                        class="scale-150 -rotate-90 opacity-50"
                                        :class="{ '!rotate-90': isOpenMobile }"
                                    >
                                        <IconCaretDown />
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Desktop -->
                        <div
                            v-if="isOpenMobile"
                            class="fixed inset-0 duration-200 bg-black lg:hidden opacity-70"
                            :class="isOpenMobile && 'z-[80]'"
                            @click="togglePolicyMobile"
                        ></div>

                        <div
                            v-if="list_sidebar && list_sidebar.length"
                            class="relative col-span-3 max-lg:fixed max-lg:h-screen max-lg:top-[60px] max-lg:left-0 max-lg:duration-200 max-lg:w-1/2 max-md:w-3/4 bg-white px-4 py-6 rounded-xl"
                            :class="[
                                isOpenMobile ? '' : 'max-lg:transform max-lg:translate-x-[-100%]',
                                isOpenMobile ? 'z-[80]' : '',
                            ]"
                        >
                            <div class="md:sticky md:top-[20px] md:space-y-[12px] space-y-[6px] font-medium">
                                <Link
                                    :href="route('policies.show', policy.slug)"
                                    v-for="(policy, index) in list_sidebar"
                                    :key="index"
                                    class="block"
                                >
                                    <div
                                        class="label-1"
                                        :class="checkActive(policy.slug) ? 'active-tab-policy' : 'tab-policy'"
                                    >
                                        {{ policy.title }}
                                    </div>
                                </Link>
                            </div>
                        </div>

                        <!-- Main Content -->
                        <div v-if="content" class="bg-white col-span-full lg:col-span-9 space-y-[1rem] rounded-3xl p-6">
                            <div v-html="content.content" class="prose" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</template>

<script>
export default {
    props: ['list_sidebar', 'content'],
    data() {
        return {
            isOpenMobile: false,
        }
    },

    methods: {
        togglePolicyMobile() {
            this.isOpenMobile = !this.isOpenMobile
        },

        checkActive(url) {
            const fullPath = this.$page.url
            const arrPath = fullPath.split('/')
            this.currentPolicy = this.list_sidebar.find((x) => x.slug === arrPath[arrPath.length - 1])
            return url == arrPath[arrPath.length - 1]
        },
    },
}
</script>

<style lang="scss">
.active-tab-policy {
    @apply text-[#18191E] font-medium font-beau border-l-2 border-l-[#2F49D9] pl-2;
}

.policy-item {
    svg path {
        @apply duration-200;
    }
}
.tab-policy {
    @apply text-[#79716B] font-medium font-beau pl-2;
}
.icon-policy {
    svg {
        @apply w-[28px] h-[28px];
    }
}
</style>
