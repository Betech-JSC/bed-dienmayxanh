<template>
    <main>
        <!--Banner-->
        <Banner :breadcrumbs="breadcrumbs" class="pt-[12px] md:pt-[20px] xl:pt-[32px]">
            <h1 class="font-extrabold text-white display-2">
                <span>
                    {{ tt('Cột mốc phát triển của') }}
                </span>
                <br class="lg:hidden" />
                <span>
                    {{ tt('chúng tôi') }}
                </span>
            </h1>
            <div class="relative flex flex-col w-max xl:mt-[24px] md:mt-[17px] mt-[12px] z-[70]" ref="selectYear">
                <div
                    class="flex items-center justify-between label-2 space-x-[13px] text-gray-700 bg-white py-[8px] px-[14px] border border-gray-300"
                    @click="toggleTab"
                >
                    <div>{{ tt('Năm') + ' ' + history.year }}</div>
                    <Chervon :class="`rotate-90 ${histories.length <= 1 ? '' : 'hidden'}`" />
                </div>
                    <div
                        class="absolute z-30 top-[38px] lg:top-10 2xl:top-16 overflow-y-scroll  w-full"
                        id="tabsMobile"
                        v-if="isOpened && histories.length > 1 "
                    >
                        <template v-for="(item, index) in histories" :key="index">
                            <Link
                                v-if="item.has_content"
                                :href="route('histories.show', { slug: item.slug })"
                                class="font-medium text-gray-700 cursor-pointer label-2 py-[8px] xl:px-[14px] md:px-[10px] px-[7px] bg-white border-b border-gray-300 last:border-b-0 hover:bg-blue-500 hover:text-white duration-300 ease-in-out"
                                :class="item.year === history.year ? 'hidden' : 'block'"
                                @click="toggleTab"
                            >
                                <span>{{ item.year }}</span>
                            </Link>
                        </template>
                </div>
            </div>
        </Banner>

        <section v-if="history.sliders.length > 0">
            <SliderBanner
                class="xl:mt-[32px] md:mt-[22px] mt-[16px]"
                :config="{
                    total: history.sliders.length,
                }"
                :items="history.sliders"
            >
            </SliderBanner>
        </section>
        <section class="bg-gray-100 xl:pb-14 md:pb-10 xl:pt-[32px] md:pt-[22px] py-[32px]">
            <div class="container">
                <div class="grid grid-cols-12 gap-y-5 md:gap-5 xl:gap-8">
                    <div class="text-center xl:col-span-8 xl:col-start-3 md:col-span-10 md:col-start-2 col-span-full">
                        <h2 class="font-bold text-blue-700 display-3 xl:mb-[32px] md:mb-[22px] mb-[12px]">
                            {{ history.title }}
                        </h2>
                        <div class="text-gray-700" v-html="history.description"></div>
                    </div>
                    <div class="lg:col-span-10 lg:col-start-2 col-span-full">
                        <div class="prose prose-minestone" v-html="history.content"></div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</template>
<script>
import Chervon from '@/Components/Icons/Chervon.vue'
import SliderBanner from '@/Components/SliderBanner.vue'

export default {
    components: { SliderBanner, Chervon },
    props: ['history', 'histories'],
    data() {
        return {
            breadcrumbs: [
                { title: this.tt('Giới thiệu'), link: this.route('histories.index') },
                { title: this.tt('Cột mốc phát triển của chúng tôi') },
            ],
            isOpened: false,
        }
    },
    mounted() {
        window.addEventListener('click', this.handleClickOutside)
        const TabsOffSetHeight = document.getElementById('tabsMobile')

        if (this.$props.histories.length > 1) {
            const height = TabsOffSetHeight.offsetHeight
            TabsOffSetHeight.style.height = `${height}px max-h-full flex flex-col border border-gray-300`
        }
        else {
            TabsOffSetHeight.style.height = `hidden`
        }
    },
    beforeDestroy() {
        window.removeEventListener('click', this.handleClickOutside)
    },

    methods: {
        toggleTab() {
            this.isOpened = !this.isOpened
        },
        handleClickOutside(event) {
            if (!this.$refs.selectYear.contains(event.target)) {
                this.isOpened = false
            }
        },
    },
}
</script>
