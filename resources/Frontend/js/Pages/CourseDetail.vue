<template>
    <section class="container grid grid-cols-12 lg:gap-16 gap-y-6 pt-[100px] lg:pb-12 pb-8">
        <div class="lg:col-span-5 col-span-full rounded-3xl overflow-hidden">
            <img src="/assets/images/home/bg-resources.png" class="lg:w-full w-[350px] aspect-square" />
        </div>
        <div class="lg:col-span-7 col-span-full py-4 space-y-6 w-full lg:w-auto">
            <p class="uppercase headline-1 font-bold font-display text-[#2F49D9]">PHOTOSHOP</p>
            <p class="body-1 font-normal font-beau text-gray-warm-700">
                Khóa học Photoshop tại Funky không chỉ dừng lại ở việc làm quen với phần mềm mà còn là hành trình khám
                phá khả năng sáng tạo vô tận. Bạn sẽ được học cách ứng dụng Photoshop vào các dự án kiến trúc, minh họa
                và thiết kế chuyên sâu, mang đến những tác phẩm đầy ấn tượng.
            </p>
            <div class="py-4 px-3 rounded-xl bg-[#F4EFE2] space-y-4">
                <div>
                    <p class="label-1 font-beau font-medium text-gray-warm-900 pb-1 border-b border-gray-warm-300">
                        Lịch khải giảng
                    </p>
                    <div class="mt-3 space-y-4">
                        <div v-for="(option, index) in options" :key="index" class="space-y-2">
                            <div class="flex items-center gap-x-3">
                                <input type="radio" :id="'option-' + index" :value="index" v-model="selectedOption" />
                                <label :for="'option-' + index" class="flex items-center justify-between w-full">
                                    <p>{{ option.date }}</p>
                                    <div class="flex items-center gap-x-1">
                                        <div
                                            :class="option.type === 'Online' ? 'bg-[#D34000]' : 'bg-[#2F49D9]'"
                                            class="body-2 font-normal font-beau text-white h-5 px-[10px] rounded-[40px]"
                                        >
                                            {{ option.type }}
                                        </div>
                                        <div
                                            :class="option.status === 'Đang mở' ? 'bg-[#CBFF00]' : 'bg-[#D7D3D0]'"
                                            class="body-2 font-normal w-[83px] text-center font-beau text-[#18191E] h-5 px-[10px] rounded-[40px]"
                                        >
                                            {{ option.status }}
                                        </div>
                                    </div>
                                </label>
                            </div>
                            <div v-if="selectedOption === index" class="rounded-xl bg-gray-warm-50 p-2 space-y-4">
                                <div class="flex items-center gap-x-6">
                                    <div class="flex items-center gap-x-2">
                                        <div
                                            class="w-[28px] h-[28px] rounded-full p-1 bg-[#F4EFE2] flex items-center justify-center"
                                        >
                                            <img src="/assets/svg/clock.svg" />
                                        </div>
                                        <p class="text-gray-warm-900 label-2 font-medium font-beau">Thời lượng:</p>
                                        <p class="text-gray-warm-700 body-2 font-normal font-beau">
                                            {{ option.sessions }} buổi
                                        </p>
                                    </div>
                                    <div class="flex items-center gap-x-2">
                                        <div
                                            class="w-[28px] h-[28px] rounded-full p-1 bg-[#F4EFE2] flex items-center justify-center"
                                        >
                                            <img src="/assets/svg/calendar.svg" />
                                        </div>
                                        <p class="text-gray-warm-900 label-2 font-medium font-beau">Thời gian:</p>
                                        <p class="text-gray-warm-700 body-2 font-normal font-beau">
                                            {{ option.time }}
                                        </p>
                                    </div>
                                </div>
                                <div class="flex items-center gap-x-2">
                                    <div
                                        class="w-[28px] h-[28px] rounded-full p-1 bg-[#F4EFE2] flex items-center justify-center"
                                    >
                                        <img src="/assets/svg/mentor.svg" />
                                    </div>
                                    <p class="text-gray-warm-900 label-2 font-medium font-beau">Mentor</p>
                                    <p class="text-gray-warm-700 body-2 font-normal font-beau">
                                        {{ option.mentor }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div>
                    <p class="label-1 font-beau font-bold text-gray-warm-900 pb-1 border-b border-gray-warm-300">
                        Đăng ký theo nhóm
                    </p>
                    <div class="flex flex-wrap items-center gap-3 mt-3">
                        <button
                            v-for="(option, index) in optionsSignin"
                            :key="index"
                            :class="
                                index === selectedOptionSignin ? 'bg-[#2F49D9] text-white' : 'bg-white text-[#44403C]'
                            "
                            class="rounded-lg border border-gray-warm-300 button-1 font-bold font-display h-10 py-2 px-[14px]"
                            @click="selectOptionSignin(index)"
                        >
                            {{ option.name }}
                        </button>
                    </div>
                </div>
                <div class="pt-3 flex items-center justify-end">
                    <div class="flex items-end gap-x-4">
                        <p class="body-1 font-normal font-beau text-gray-warm-700">Chi phí</p>
                        <p class="headline-1 font-bold font-display text-[#2F49D9]">2.500.000 Đ</p>
                    </div>
                </div>
            </div>
            <div class="flex items-center gap-x-4">
                <div class="">
                    <!-- <ButtonAddToCart @click="addToCart('buyNow')" :title="'đăng ký ngay'" /> -->
                </div>
                <div class=""><ButtonSeeMore @click="addToCart('order')" :title="'tìm hiểu thêm'" /></div>
            </div>
        </div>
    </section>

    <section class="w-full h-[200px] md:h-[400px] xl:h-[560px]">
        <img src="/assets/images/products/banner-detail.png" class="w-full h-full object-contain" />
    </section>

    <section class="md:py-12 py-6 bg-[#F4EFE2]">
        <div class="container grid grid-cols-12 md:gap-x-10 gap-y-10">
            <div class="lg:col-span-5 col-span-full display-3 font-display font-bold text-[#2F49D9]">
                KHOÁ HỌC NÀY DÀNH CHO
            </div>
            <div class="lg:col-span-7 col-span-full space-y-3">
                <FAQ :faqItems="faqItems" :type="false" />
            </div>
        </div>
    </section>

    <section class="md:py-12 py-6 bg-[#F4EFE2]">
        <div class="container grid grid-cols-12 space-y-6">
            <div class="col-span-full display-3 font-display font-bold text-[#2F49D9] upperacse">
                Nội dung kiến thức
            </div>
            <div
                class="col-span-full grid grid-cols-2 p-6 rounded-3xl bg-white lg:gap-8 gap-4 lg:max-h-[468px] max-h-[550px]"
            >
                <div class="lg:col-span-1 col-span-full h-full overflow-hidden">
                    <div class="h-[calc(100%-44px)] overflow-y-scroll">
                        <div v-for="(session, index) in knowledgeContent" :key="index">
                            <div
                                :class="
                                    activeIndex === index
                                        ? 'bg-[#2F49D9] rounded-xl transition-all duration-300 ease-out text-white'
                                        : ' text-gray-warm-900'
                                "
                                class="flex items-start gap-x-4 p-3"
                                @click="selectSession(index)"
                            >
                                <p class="max-w-[64px] title-2 font-bold font-display">
                                    {{ session.session }}
                                </p>
                                <div class="space-y-1">
                                    <p class="title-2 font-bold font-display">{{ session.title }}</p>

                                    <p
                                        :style="{
                                            maxHeight: activeIndex === index ? contentHeights[index] + 'px' : '0',
                                            opacity: activeIndex === index ? '1' : '0',
                                        }"
                                        class="body-1 font-normal font-beau content-knowledge"
                                        :class="['transition-all duration-300 ease-out']"
                                    >
                                        {{ session.desc }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <button
                        class="px-[18px] py-[10px] h-[44px] rounded-xl border border-gray-warm-300 bg-white w-fit flex items-center gap-x-2"
                    >
                        <span class="button-1 font-bold font-display text-gray-warm-700">{{
                            tt('tìm hiểu thêm')
                        }}</span>
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                            <path
                                d="M5 14.1666L9.16667 9.99992L5 5.83325M10.8333 14.1666L15 9.99992L10.8333 5.83325"
                                stroke="#D34000"
                                stroke-width="1.66667"
                                stroke-linecap="round"
                                stroke-linejoin="round"
                            />
                        </svg>
                    </button>
                </div>
                <div class="lg:col-span-1 col-span-full rounded-3xl overflow-hidden">
                    <img
                        :src="selectedSession ? selectedSession.image : '/assets/images/products/product.png'"
                        class="w-full h-full object-cover"
                    />
                </div>
            </div>
        </div>
    </section>

    <section class="md:py-12 py-6 bg-[#F4EFE2]">
        <div class="container grid grid-cols-12 space-y-6">
            <div class="col-span-full display-3 font-display font-bold text-[#2F49D9] upperacse">mục tiêu học tập</div>
            <div class="col-span-full grid grid-cols-3 gap-7">
                <div
                    class="lg:col-span-1 col-span-full rounded-2xl border border-gray-warm-300 overflow-hidden bg-white p-3 space-y-6"
                >
                    <div class="w-full h-[344px] rounded-3xl overflow-hidden">
                        <img src="/assets/images/products/product.png" class="w-full h-full object-cover" />
                    </div>
                    <p class="title-1 font-bold font-display text-[#2F49D9] h-16 line-clamp-2">
                        Phát triển khả năng sáng tạo thông qua các bài tập thực tế.
                    </p>
                </div>
                <div
                    class="lg:col-span-1 col-span-full rounded-2xl border border-gray-warm-300 overflow-hidden bg-white p-3 space-y-6"
                >
                    <div class="w-full h-[344px] rounded-3xl overflow-hidden">
                        <img src="/assets/images/products/product.png" class="w-full h-full object-cover" />
                    </div>
                    <p class="title-1 font-bold font-display text-[#2F49D9] h-16 line-clamp-2">
                        Phát triển khả năng sáng tạo thông qua các bài tập thực tế.
                    </p>
                </div>
                <div
                    class="lg:col-span-1 col-span-full rounded-2xl border border-gray-warm-300 overflow-hidden bg-white p-3 space-y-6"
                >
                    <div class="w-full h-[344px] rounded-3xl overflow-hidden">
                        <img src="/assets/images/products/product.png" class="w-full h-full object-cover" />
                    </div>
                    <p class="title-1 font-bold font-display text-[#2F49D9] h-16 line-clamp-2">
                        Phát triển khả năng sáng tạo thông qua các bài tập thực tế.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <section class="md:py-12 py-6 bg-[#F4EFE2] space-y-6">
        <p class="display-2 font-display text-gray-warm-900 font-bold w-full text-center">Sản phẩm học viên</p>
        <div class="relative z-2 space-y-6 py-8">
            <UIMarquee :imagesTop="activities" :imagesBottom="activities2" />
        </div>
    </section>

    <section class="md:py-12 py-6 bg-advise flex items-center justify-center">
        <div class="rounded-3xl p-8 bg-[#CBFF00] space-y-4 lg:max-w-[572px] w-[95%] mx-auto">
            <p class="display-3 text-center font-bold font-display text-[#18191E] uppercase">
                tham gia gia đình <br />
                funky bạn nhé !!
            </p>
            <div class="lg:flex items-center justify-center lg:gap-x-4 max-lg:space-y-3">
                <div class="flex items-center justify-center">
                    <ButtonSeeMore @click="addToCart('order')" :title="'nhận tư vấn'" />
                </div>
                <div class="flex items-center justify-center">
                    <!-- <ButtonAddToCart @click="addToCart('buyNow')" /> -->
                </div>
            </div>
        </div>
    </section>

    <section class="bg-gray-warm-100 md:py-[80px] py-6">
        <div class="container">
            <div class="grid grid-cols-12 xl:gap-x-[72px] lg:gap-x-6 max-lg:gap-y-9 p-8 rounded-[32px]">
                <div class="lg:col-span-3 col-span-full space-y-6">
                    <div
                        class="py-3 bg-[#CBFF00] uppercase headline-1 font-display font-bold text-[#18191E] text-center rounded-xl"
                    >
                        Các câu hỏi thường gặp ?
                    </div>
                </div>
                <div class="lg:col-span-9 col-span-full space-y-3">
                    <FAQ :faqItems="faqItems" :type="true" />
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    data() {
        return {
            options: [
                {
                    date: '25/11/2024',
                    type: 'Online',
                    status: 'Đang mở',
                    sessions: 5,
                    time: 'T2-T4-T6 (19h00-21h00)',
                    mentor: 'Nguyễn Văn A',
                },
                {
                    date: '25/11/2024',
                    type: 'Offline',
                    status: 'Lớp full',
                    sessions: 3,
                    time: 'T2-T4-T6 (19h00-21h00)',
                    mentor: 'Trần Thị B',
                },
                {
                    date: '25/11/2024',
                    type: 'Online',
                    status: 'Đang mở',
                    sessions: 7,
                    time: 'T2-T4-T6 (19h00-21h00)',
                    mentor: 'Lê Minh C',
                },
            ],
            selectedOption: null,
            optionsSignin: [
                { name: 'chim cô đơn', discount: 0 },
                { name: 'nhóm 3 người | Giảm 5%', discount: 5 },
                { name: 'nhóm 5 người | Giảm 10%', discount: 10 },
                { name: 'nhóm 7 người | Giảm 15%', discount: 15 },
            ],
            activities: [
                {
                    image: {
                        url: '/assets/images/active/picture.png',
                        alt: 'Description for image 1',
                    },
                },
                {
                    image: {
                        url: '/assets/images/active/picture.png',
                        alt: 'Description for image 2',
                    },
                },
                {
                    image: {
                        url: '/assets/images/active/picture-2.png',
                        alt: 'Description for image 1',
                    },
                },
                {
                    image: {
                        url: '/assets/images/active/picture-3.png',
                        alt: 'Description for image 2',
                    },
                },
                {
                    image: {
                        url: '/assets/images/active/picture-4.png',
                        alt: 'Description for image 1',
                    },
                },
                {
                    image: {
                        url: '/assets/images/active/picture-5.png',
                        alt: 'Description for image 2',
                    },
                },
            ],
            activities2: [
                {
                    image: {
                        url: '/assets/images/active/picture.png',
                        alt: 'Description for image 1',
                    },
                },
                {
                    image: {
                        url: '/assets/images/active/picture.png',
                        alt: 'Description for image 2',
                    },
                },
                {
                    image: {
                        url: '/assets/images/active/picture-5.png',
                        alt: 'Description for image 1',
                    },
                },
                {
                    image: {
                        url: '/assets/images/active/picture-6.png',
                        alt: 'Description for image 2',
                    },
                },
                {
                    image: {
                        url: '/assets/images/active/picture-7.png',
                        alt: 'Description for image 1',
                    },
                },
                {
                    image: {
                        url: '/assets/images/active/picture-8.png',
                        alt: 'Description for image 2',
                    },
                },
            ],
            selectedOptionSignin: 0,
            knowledgeContent: [
                {
                    session: 'Buổi 1',
                    title: 'Giới thiệu về Vue.js',
                    desc: 'Mô tả buổi 1',
                    currentSession: false,
                    img: '/assets/images/products/product.png',
                },
                {
                    session: 'Buổi 2',
                    title: 'Làm quen với Vue Router',
                    desc: 'Mô tả buổi 2',
                    currentSession: false,
                    img: '/assets/images/products/product.png',
                },
                {
                    session: 'Buổi 3',
                    title: 'Tạo Component trong Vue',
                    desc: 'Mô tả buổi 3',
                    currentSession: false,
                    img: '/assets/images/products/product.png',
                },
                {
                    session: 'Buổi 4',
                    title: 'Quản lý trạng thái với Vuex',
                    desc: 'Mô tả buổi 4',
                    currentSession: false,
                    img: '/assets/images/products/product.png',
                },
                {
                    session: 'Buổi 5',
                    title: 'Phát triển giao diện người dùng với Vuetify',
                    desc: 'Mô tả buổi 5',
                    currentSession: false,
                    img: '/assets/images/products/product.png',
                },
                {
                    session: 'Buổi 6',
                    title: 'Vue.js và API',
                    desc: 'Mô tả buổi 6',
                    currentSession: false,
                    img: '/assets/images/products/product.png',
                },
                {
                    session: 'Buổi 7',
                    title: 'Tích hợp với Firebase',
                    desc: 'Mô tả buổi 7',
                    currentSession: false,
                    img: '/assets/images/products/product.png',
                },
                {
                    session: 'Buổi 8',
                    title: 'Testing trong Vue.js',
                    desc: 'Mô tả buổi 8',
                    currentSession: false,
                    img: '/assets/images/products/product.png',
                },
                {
                    session: 'Buổi 9',
                    title: 'Debugging Vue.js',
                    desc: 'Mô tả buổi 9',
                    currentSession: false,
                    img: '/assets/images/products/product.png',
                },
                {
                    session: 'Buổi 10',
                    title: ' Quản lý lỗi trong Vue.js',
                    desc: 'Mô tả buổi 10',
                    currentSession: false,
                    img: '/assets/images/products/product.png',
                },
                {
                    session: 'Buổi 11',
                    title: ' Tối ưu hiệu suất trong Vue',
                    desc: 'Mô tả buổi 11',
                    currentSession: false,
                    img: '/assets/images/products/product.png',
                },
                {
                    session: 'Buổi 12',
                    title: ' Tổng kết và ôn tập',
                    desc: 'Mô tả buổi 12',
                    currentSession: true,
                    img: '/assets/images/products/product.png',
                },
            ],
            faqItems: [
                {
                    question: 'Học ở FUNKY bạn sẽ nhận được những gì',
                    answer: 'Năng lượng năng động, ngẫu hứng, sáng tạo và bầu không khí ấm cúng gần gũi trong các lớp học là các chất liệu tạo nên Funky mà các mentee luôn yêu thích. Bởi vì Funky không chỉ là nơi dạy học các môn học kỹ năng phần mềm tư duy liên quan Kiến Trúc mà còn là không gian để mọi người cùng quậy, vừa học, vừa chơi, kết nối mọi người lại với nhau. Nếu bạn là người mới, mới biết về Funky hãy xem qua môi trường học tập ở Funky có gì',
                },
                {
                    question: 'FUNKY REVIT CÓ GÌ ',
                    answer: 'Năng lượng năng động, ngẫu hứng, sáng tạo và bầu không khí ấm cúng gần gũi trong các lớp học là các chất liệu tạo nên Funky mà các mentee luôn yêu thích. Bởi vì Funky không chỉ là nơi dạy học các môn học kỹ năng phần mềm tư duy liên quan Kiến Trúc mà còn là không gian để mọi người cùng quậy, vừa học, vừa chơi, kết nối mọi người lại với nhau. Nếu bạn là người mới, mới biết về Funky hãy xem qua môi trường học tập ở Funky có gì',
                },
                {
                    question: 'CUỐI KHÓA THƯỜNG CÓ GÌ VUI?',
                    answer: 'Năng lượng năng động, ngẫu hứng, sáng tạo và bầu không khí ấm cúng gần gũi trong các lớp học là các chất liệu tạo nên Funky mà các mentee luôn yêu thích. Bởi vì Funky không chỉ là nơi dạy học các môn học kỹ năng phần mềm tư duy liên quan Kiến Trúc mà còn là không gian để mọi người cùng quậy, vừa học, vừa chơi, kết nối mọi người lại với nhau. Nếu bạn là người mới, mới biết về Funky hãy xem qua môi trường học tập ở Funky có gì',
                },
                {
                    question: 'CUỐI KHÓA THƯỜNG CÓ GÌ VUI?',
                    answer: 'Năng lượng năng động, ngẫu hứng, sáng tạo và bầu không khí ấm cúng gần gũi trong các lớp học là các chất liệu tạo nên Funky mà các mentee luôn yêu thích. Bởi vì Funky không chỉ là nơi dạy học các môn học kỹ năng phần mềm tư duy liên quan Kiến Trúc mà còn là không gian để mọi người cùng quậy, vừa học, vừa chơi, kết nối mọi người lại với nhau. Nếu bạn là người mới, mới biết về Funky hãy xem qua môi trường học tập ở Funky có gì',
                },
            ],
            activeIndex: null,
            contentHeights: [],
        }
    },
    mounted() {
        this.calculateHeights()
    },
    methods: {
        selectOptionSignin(index) {
            this.selectedOptionSignin = index
        },
        calculateHeights() {
            this.$nextTick(() => {
                const descriptions = document.querySelectorAll('.content-knowledge')
                this.contentHeights = Array.from(descriptions).map((desc) => desc.scrollHeight)
                console.log('contentHeights', this.contentHeights)
            })
        },
        selectSession(index) {
            this.activeIndex = this.activeIndex === index ? null : index
        },
    },
    watch: {
        activeIndex() {
            this.$nextTick(this.calculateHeights)
        },
    },
}
</script>
<style scoped></style>
