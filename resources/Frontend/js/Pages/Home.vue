<template>
    <main class="overflow-hidden">
        <Hero
            v-if="sliders && sliders.length > 0"
            :slides="sliders"
            class="pt-[74px] lg:pt-[90px] xl:pt-[112px] bg-hero-transparent w-full bg-cover bg-center bg-no-repeat"
        />

        <section class="relative md:py-[56px] py-[32px]">
            <div class="absolute w-full h-ful top-0 left-0 z-1">
                <JPicture src="/assets/images/shap-banner.png" class="w-full h-full" />
            </div>
            <div class="relative z-2 grid grid-cols-12 space-y-8 container">
                <div class="xl:col-span-6 col-span-full xl:col-start-4 text-center space-y-6">
                    <p class="display-2 font-bold font-display text-red-fks">
                        BẠN ĐẦY SÁNG TẠO, CÁ TÍNH <br />
                        VÀ FUNKY CŨNG VẬY
                    </p>
                    <p class="body-1 text-gray-700 font-normal font-beau">
                        FunkyStyle là một ngôi nhà đào tạo kiến trúc với bản sắc riêng, phương pháp tiếp cận phần mềm
                        SÁNG TẠO, tư duy, đề cao CÁ TÍNH cá nhân trong các sản phẩm, luôn được đổi mới để thích nghi,
                        giáo án bài giảng rõ ràng và thường xuyên cập nhật mới mỗi khóa.
                    </p>
                </div>
                <div class="col-span-12 grid grid-cols-3">
                    <div v-for="(item, index) in about" :key="index" class="card-nudge space-y-6">
                        <div class="animated-nudge">
                            <JPicture
                                :src="item.image.url"
                                :alt="item.image.alt"
                                class="picture-cover w-[100px] h-[100px] md:w-[200px] md:h-[200px] mx-auto"
                            />
                        </div>
                        <div class="">
                            <h1 class="headline-1 font-display font-bold text-gray-90 text-center">
                                {{ item.title }}
                            </h1>
                        </div>
                    </div>
                </div>
                <div class="col-span-full mx-auto">
                    <Link :href="route('histories.index')" class="btn btn-primary w-fit flex items-center gap-x-2">
                        <span>{{ tt('Về chúng tôi') }}</span>
                        <svg
                            xmlns="http://www.w3.org/2000/svg"
                            width="21"
                            height="20"
                            viewBox="0 0 21 20"
                            fill="currentColor"
                        >
                            <path
                                d="M5.5 14.1666L9.66667 9.99992L5.5 5.83325M11.3333 14.1666L15.5 9.99992L11.3333 5.83325"
                                stroke="currentColor"
                                stroke-width="1.66667"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                    </Link>
                </div>
            </div>
        </section>

        <section class="md:py-[80px] py-[48px] bg-gray-warm-100 relative z-0">
            <div class="absolute shape-top-course left-[-6px] top-0 z-1">
                <JPicture src="/assets/images/home/shape-couse-top.png" class="w-[546px] h-[556px] object-cover" />
            </div>
            <div class="absolute right-0 translate-x-1/2 top-1/2 -translate-y-1/2 z-1">
                <JPicture src="/assets/images/home/shape-course-bottom.png" class="w-[546px] h-[1000px] object-cover" />
            </div>
            <div v-if="course_categories && course_categories.length" class="space-y-20">
                <div v-for="(item, index) in course_categories" :key="index">
                    <div class="container space-y-8">
                        <h2 class="display-3 text-[#18191E] font-bold font-display uppercase">
                            {{ item.title }}
                        </h2>
                        <div v-if="item.courses && item.courses.length > 0">
                            <div class="relative hidden md:grid grid-cols-2 lg:grid-cols-3 md:gap-6 xl:gap-8">
                                <CardCourse
                                    v-for="(course, index) in item.courses"
                                    :key="index"
                                    :course="course"
                                    :isHome="true"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="pl-4 md:hidden">
                        <JamSlider
                            :config="{
                                draggable: true,
                                prevNextButtons: false,
                                autoPlay: false,
                            }"
                            class="relative"
                        >
                            <CardCourse
                                class="w-[320px] mr-4"
                                v-for="(course, index) in item.courses"
                                :key="index"
                                :course="course"
                                :isHome="true"
                            />
                        </JamSlider>
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-gray-warm-100 md:py-[80px] py-[48px] relative overflow-hidden">
            <div class="absolute left-[-340px] top-[-270px] z-1 mix-blend-multiply">
                <img src="/assets/images/home/shape-product.png" class="w-[1000px] h-[1000px] object-cover" />
            </div>
            <div class="absolute right-[-300px] top-1/2 -translate-y-1/2 z-1 mix-blend-multiply">
                <img src="/assets/images/home/shape-center-product.png" class="w-[1000px] h-[1000px] object-cover" />
            </div>
            <div class="absolute left-[-305px] bottom-[-205px] z-1 mix-blend-multiply">
                <img src="/assets/images/home/shape-end-product.png" class="w-[1000px] h-[1000px] object-cover" />
            </div>
            <div class="grid grid-cols-12 space-y-8 container">
                <div class="lg:col-span-6 lg:col-start-4 col-span-full text-center space-y-6">
                    <p class="display-2 font-bold font-display text-[#18191E]">Sản phẩm học viên</p>
                </div>
                <div v-if="products && products.length" class="col-span-12">
                    <div class="relative z-2 xl:p-8 md:p-6 p-4 rounded-[32px] border-red-fks bg-red-fks space-y-[24px]">
                        <UIMarquee
                            :imagesTop="splitArrayProducts().firstHalf"
                            :imagesBottom="splitArrayProducts().secondHalf"
                        />
                    </div>
                </div>
            </div>
        </section>

        <section v-if="feedback && feedback.length" class="relative">
            <div class="w-full h-full absolute z-2">
                <img src="assets/images/home/bg-feedback.png" class="w-full h-full object-cover" />
            </div>
            <div class="space-y-10 container relative z-1 md:py-[80px] py-[56px]">
                <div class="w-full text-center">
                    <p class="display-2 font-bold font-display text-black-fks uppercase">Feedback từ học viên</p>
                </div>
                <div class="grid grid-cols-8 col-start-3 gap-8">
                    <div
                        class="xl:col-span-5 col-span-full px-3 py-6 rounded-3xl h-full bg-white min-h-[250px] md:min-h-[480px] order-2 md:order-1 max-md:max-h-[200px] md:max-h-[480px] overflow-y-auto"
                    >
                        <div class="flex items-start gap-x-4 h-full">
                            <div class="w-3 bg-[#D9D9D9] rounded-[80px] h-full"></div>
                            <div class="flex flex-wrap gap-4">
                                <div
                                    v-for="(feedback, index) in feedback"
                                    :key="index"
                                    @click="selectFeedback(feedback)"
                                    :class="feedback.id === selectedFeedback?.id ? 'bg-blue-fks' : 'bg-transparent'"
                                    class="cursor-pointer flex items-center gap-x-2 py-[6px] pl-2 pr-[10px] border border-gray-warm-500 rounded-full group duration-300 lg:hover:bg-blue-fks lg:hover:border-blue-fks"
                                >
                                    <img
                                        :src="feedback.image.url || ''"
                                        :alt="feedback.image.alt || ''"
                                        class="w-7 h-7 rounded-full"
                                    />
                                    <p
                                        :class="feedback.id === selectedFeedback?.id ? 'text-white' : 'text-gray-700'"
                                        class="label-1 text-gray-700 font-medium font-beau group-hover:text-white duration-300"
                                    >
                                        {{ feedback.title }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div
                        v-if="selectedFeedback"
                        class="xl:col-span-3 col-span-full p-3 rounded-3xl bg-white border border-gray-warm-300 space-y-3 order-1 md:order-2"
                    >
                        <div class="flex items-center gap-x-2">
                            <img
                                :src="selectedFeedback.image.url || ''"
                                :alt="selectedFeedback.image.alt || ''"
                                class="w-10 h-10 rounded-full"
                            />
                            <div>
                                <p class="label-1 text-black-fks font-medium font-beau">
                                    {{ selectedFeedback.title }}
                                </p>
                                <p class="body-2 text-black-fks font-medium font-beau">
                                    {{ selectedFeedback.description }}
                                </p>
                            </div>
                        </div>
                        <p class="body-2 props-feedback prose" v-html="selectedFeedback.content"></p>
                    </div>
                </div>
            </div>
        </section>
        <section v-if="resources && resources.length" class="relative">
            <div class="w-full h-full absolute z-2">
                <img src="assets/images/home/bg-resource.png" class="w-full h-full object-cover" />
            </div>
            <div class="container relative z-1 md:py-[80px] py-[56px]">
                <div
                    class="grid grid-cols-12 xl:gap-x-[72px] lg:gap-x-6 max-lg:gap-y-9 p-4 md:p-6 xl:p-8 rounded-[32px] bg-[#2F49D9]"
                >
                    <div class="lg:col-span-3 col-span-full space-y-6">
                        <div
                            class="py-3 bg-[#CBFF00] uppercase display-3 font-display font-bold text-[#18191E] text-center rounded-xl"
                        >
                            Tài nguyên
                        </div>

                        <Link
                            :href="route('resources.index')"
                            class="max-w-[200px] px-[18px] py-[10px] bg-white border border-gray-warm-300 rounded-xl button-1 font-display font-bold text-gray-700 uppercase block text-center"
                        >
                            Xem thêm
                        </Link>
                    </div>
                    <div class="lg:col-span-9 col-span-full">
                        <UIMarqueeResources :items="resources" />
                    </div>
                </div>
            </div>
        </section>

        <section class="bg-gray-warm-100 md:py-[80px] py-[56px]">
            <div class="container">
                <div
                    class="grid grid-cols-12 xl:gap-x-[72px] lg:gap-x-6 max-lg:gap-y-9 p-4 md:p-6 xl:p-8 rounded-[32px] bg-[#2F49D9]"
                >
                    <div class="lg:col-span-3 col-span-full space-y-6">
                        <div
                            class="py-3 bg-[#CBFF00] uppercase headline-1 font-display font-bold text-[#18191E] text-center rounded-xl"
                        >
                            Các câu hỏi thường gặp ?
                        </div>
                    </div>
                    <div class="lg:col-span-9 col-span-full space-y-3">
                        <FAQ :faqItems="faqs" :type="true" />
                    </div>
                </div>
            </div>
        </section>
    </main>
</template>
<script>
export default {
    props: ['course_categories', 'sliders', 'products', 'featured_posts', 'feedback', 'resources'],
    data() {
        return {
            about: [
                {
                    title: this.tt('sáng tạo'),
                    image: {
                        url: '/assets/images/about/creative.png',
                        alt: 'Sáng tạo',
                    },
                },
                {
                    title: this.tt('tư duy'),
                    image: {
                        url: '/assets/images/about/thinking.png',
                        alt: 'Tư duy',
                    },
                },
                {
                    title: this.tt(' ứng dụng'),
                    image: {
                        url: '/assets/images/about/application.png',
                        alt: 'Ứng dụng',
                    },
                },
            ],

            selectedFeedback: this.feedback[0] ?? null,
            selectedResource: this.resources[0] ?? null,
        }
    },
    computed: {
        faqs() {
            return this.$page.props.data.faqs || []
        },
    },
    methods: {
        splitArrayProducts() {
            const midIndex = Math.floor(this.products.length / 2) // Lấy vị trí giữa của mảng
            const firstHalf = this.products.slice(0, midIndex) // Từ đầu đến giữa
            const secondHalf = this.products.slice(midIndex) // Từ giữa đến cuối

            return { firstHalf, secondHalf } // Trả về một object chứa hai mảng
        },
        selectFeedback(feedback) {
            this.selectedFeedback = feedback
        },

        selectResource(resource) {
            this.selectedResource = resource
        },

        closePopup() {
            this.isSuccess = false
            document.body.classList.remove('overflow-hidden')
        },
        setIsSubmit(val) {
            this.isSubmit = val
        },
    },
}
</script>
<style lang="scss" scoped>
::v-deep(.props-feedback) {
    p {
        @apply text-gray-warm-800 font-normal font-beau line-clamp-[10];
    }
    img {
        @apply mt-3 rounded-3xl overflow-hidden;
    }
}

.bg-about {
    border-bottom: 1px solid #dde1e6;
    background: url('/public/assets/images/shap-banner.png') repeat;
}

.bg-feedback {
    background: url('/public/assets/images/home/bg-feedback.png') no-repeat;
    background-blend-mode: multiply, normal;
}

.shape-top-course {
    display: flex;
    padding: 0px 0.047px 0.058px 0px;
    flex-direction: column;
    align-items: center;
    mix-blend-mode: exclusion;
}

.card-nudge {
    &:hover {
        .animated-nudge {
            animation: nudge 1s linear;
        }
    }
}

@keyframes nudge {
    0% {
        transform: rotate(-7deg);
    }

    33% {
        transform: rotate(7deg);
    }

    66% {
        transform: rotate(-7deg);
    }
}
</style>
