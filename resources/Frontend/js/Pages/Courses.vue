<template>
    <main class="overflow-hidden">
        <section
            class="xl:max-h-[723px] lg:max-h-[650px] max-h-[500px] h-[calc(100vh-89px)]"
            v-if="sliders && sliders.length > 0"
        >
            <Hero :slides="sliders" />
        </section>

        <section
            class="bg-banner-courses relative xl:pt-[277px] xl:pb-[50px] lg:pt-[150px] lg:pb-[50px] md:pt-[100px] md:pb-[10px] max-sm:pt-[80px] max-md:pb-[10px]"
        >
            <div class="grid grid-cols-12 space-y-8 container xl:pb-[46px] lg:pb-[46px] md:pb-[6px]">
                <div
                    class="col-span-5 col-start-1 text-center space-y-6 text-gray-100 max-sm:col-start-1 max-sm:col-span-full"
                >
                    <p
                        class="display-2 font-display flex flex-col justify-start items-start xl:text-[40px] lg:text-[32px] md:text-[32px] max-sm:text-[20px]"
                    >
                        <span>CÁC KHÓA HỌC</span>
                        <span>TẠI FUNKY</span>
                    </p>
                    <p
                        class="body-1 font-normal font-beau flex flex-col justify-start items-start xl:text-[14px] lg:text-[14px] md:text-[12px] max-sm:text-[11px]"
                    >
                        <span>Bước vào thế giới học tập đầy cảm hứng tại Funky,</span>
                        <span>nơi bạn thỏa sức sáng tạo và khai phá tiềm năng</span>
                    </p>
                </div>
            </div>
            <div class="absolute top-0 right-0 flex justify-end items-end h-full">
                <img
                    src="/assets/images/funky-style-courses.png"
                    alt="funky style"
                    class="object-contain xl:w-full lg:w-2/3 md:w-1/2 max-sm:hidden"
                />
            </div>
        </section>

        <section class="md:py-[80px] py-[48px] bg-gray-warm-100 relative z-0">
            <div class="absolute shape-top-course left-0 top-[-350px] z-1">
                <img src="/assets/images/home/shape-couse-top.png" class="w-[1000px] h-[1000px] object-cover" />
            </div>
            <div class="absolute shape-top-course right-[-400px] top-1/2 -translate-y-1/2 z-1">
                <img src="/assets/images/home/shape-couse-top.png" class="w-[1000px] h-[1000px] object-cover" />
            </div>
            <div class="container space-y-20">
                <div class="space-y-8">
                    <p class="display-3 text-[#18191E] font-bold font-display uppercase">các Khóa học 2D -3D</p>
                    <div class="relative z-2 grid grid-cols-3 gap-8">
                        <div v-for="(item, index) in courses" :key="index" class="col-span-full md:col-span-1">
                            <!-- <div class="overflow-hidden rounded-[24px]">
                                <JPicture
                                    :src="item.image.url"
                                    :alt="item.image.alt"
                                    class="picture-cover aspect-square w-full h-full group-hover:scale-[1.05] duration-300"
                                />
                            </div>
                            <div class="pt-6 space-y-4">
                                <p class="title-1 font-display font-bold text-[#2F49D9]">
                                    {{ item.title }}
                                </p>
                                <div
                                    class="body-1 font-normal font-beau flex justify-start gap-x-14 xl:text-[16px] lg:text-[16px] md:text-[10px] max-sm:text-[16px]"
                                >
                                    <div class="flex gap-x-2 items-center">
                                        <img src="/assets/svg/clock.svg" alt="time-icon" />
                                        {{ item.time }}
                                    </div>
                                    <div class="flex gap-x-2 items-center">
                                        <img src="/assets/svg/calendar.svg" alt="calendar-icon" />
                                        {{ item.calendar }}
                                    </div>
                                </div>
                                <p class="body-1 text-gray-700 font-normal font-beau line-clamp-3">
                                    {{ item.desc }}
                                </p>

                                <div class="bg-gray-warm-100 p-2">
                                    <div v-for="(element, index) in item.opening" :key="index" class="gap-y-3">
                                        <div class="flex justify-between font-beau">
                                            <p
                                                class="body-1 text-gray-700 font-normal xl:text-[16px] lg:text-[16px] md:text-[10px] max-sm:text-[16px]"
                                            >
                                                {{ element.month }}
                                            </p>
                                            <div
                                                class="body-2 xl:text-[16px] lg:text-[16px] md:text-[10px] max-sm:text-[16px]"
                                            >
                                                <span
                                                    class="px-3 py-[2px] rounded-full mr-1"
                                                    :class="getStatusColor(element.status1)"
                                                >
                                                    {{ element.status1 }}
                                                </span>
                                                <span
                                                    class="px-3 py-[2px] rounded-full"
                                                    :class="getStatusColor(element.status2)"
                                                >
                                                    {{ element.status2 }}
                                                </span>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <Link
                                    :href="route('histories.index')"
                                    class="w-full px-[18px] py-[10px] bg-white border border-gray-300 rounded-xl button-1 font-display font-bold text-gray-700 uppercase block text-center"
                                >
                                    Chi tiết
                                </Link>
                            </div> -->
                            <CardCourse :course="course" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</template>
<script>
import { validateForm } from '@/validator'
import JamFieldSet from '../Components/Jam/FieldSet.vue'
const emptyForm = {
    'Họ và tên': '',
    'Số điện thoại': '',
    Email: '',
    'Nội dung cần hỗ trợ': '',
}
export default {
    components: { JamFieldSet },
    props: ['posts', 'sliders', 'products', 'featuredCategories'],
    data() {
        return {
            form: {
                contact: {
                    data: {
                        ...emptyForm,
                    },
                    type: 'CONTACT_FORM',
                },
            },
            rules: {
                'Họ và tên': 'required|min:3|max:25',
                'Số điện thoại': 'phone|required|min:10|max:11',
                Email: 'email|required',
            },
            errors: {},
            isSuccess: false,
            isLoading: false,
            isSubmit: false,
            services: [
                {
                    title: this.tt('Import and export'),
                    image: {
                        url: '/assets/images/services/import.png',
                        alt: 'Whether you have a team of 2 or 200, our shared team inboxes keep everyone on the same page and in the loop.',
                    },
                    description: this.tt(
                        'Whether you have a team of 2 or 200, our shared team inboxes keep everyone on the same page and in the loop.'
                    ),
                },
                {
                    title: this.tt('Brand management'),
                    image: {
                        url: '/assets/images/services/brand.png',
                        alt: 'english flag',
                    },
                    description: this.tt(
                        'Whether you have a team of 2 or 200, our shared team inboxes keep everyone on the same page and in the loop.'
                    ),
                },
                {
                    title: this.tt('Consulting, and service'),
                    image: {
                        url: '/assets/images/about/consuting.png',
                        alt: 'english flag',
                    },
                    description: this.tt(
                        'Whether you have a team of 2 or 200, our shared team inboxes keep everyone on the same page and in the loop.'
                    ),
                },
            ],
            about: [
                {
                    title: this.tt('sáng tạo'),
                    image: {
                        url: '/assets/images/about/creative.png',
                        alt: 'Whether you have a team of 2 or 200, our shared team inboxes keep everyone on the same page and in the loop.',
                    },
                },
                {
                    title: this.tt('tư duy'),
                    image: {
                        url: '/assets/images/about/thinking.png',
                        alt: 'english flag',
                    },
                },
                {
                    title: this.tt(' ứng dụng'),
                    image: {
                        url: '/assets/images/about/application.png',
                        alt: 'english flag',
                    },
                },
            ],
            courses: [
                {
                    title: this.tt('PHOTOSHOP'),
                    image: {
                        url: '/assets/images/home/photoshop.png',
                        alt: 'Whether you have a team of 2 or 200, our shared team inboxes keep everyone on the same page and in the loop.',
                    },
                    desc: 'Hãy tưởng tượng bạn không chỉ học 𝐏𝐡𝐨𝐭𝐨𝐬𝐡𝐨𝐩, mà còn được hóa thân thành các Crewmate trong Among Us để giải quyết những nhiệm vụ “thiết kế đồ án” khó nhằn!',
                    time: '12 buổi',
                    calendar: 'T2-T4-T6',
                    opening: [
                        {
                            month: '30/11/2024',
                            status1: 'Online',
                            status2: 'Full',
                        },
                        {
                            month: '25/11/2024',
                            status1: 'Offline',
                            status2: 'Open',
                        },
                        {
                            month: '11/11/2024',
                            status1: 'Online',
                            status2: 'Open',
                        },
                    ],
                },
                {
                    title: this.tt('Autocad'),
                    image: {
                        url: '/assets/images/home/autocad.png',
                        alt: 'Whether you have a team of 2 or 200, our shared team inboxes keep everyone on the same page and in the loop.',
                    },
                    desc: 'Hãy tưởng tượng bạn không chỉ học 𝐏𝐡𝐨𝐭𝐨𝐬𝐡𝐨𝐩, mà còn được hóa thân thành các Crewmate trong Among Us để giải quyết những nhiệm vụ “thiết kế đồ án” khó nhằn!',
                    time: '12 buổi',
                    calendar: 'T2-T4-T6',
                    opening: [
                        {
                            month: '25/11/2024',
                            status1: 'Offline',
                            status2: 'Open',
                        },
                        {
                            month: '11/11/2024',
                            status1: 'Online',
                            status2: 'Open',
                        },
                    ],
                },
                {
                    title: this.tt('REVIT ARCHITECTURE'),
                    image: {
                        url: '/assets/images/home/revit.png',
                        alt: 'Whether you have a team of 2 or 200, our shared team inboxes keep everyone on the same page and in the loop.',
                    },
                    desc: 'Hãy tưởng tượng bạn không chỉ học 𝐏𝐡𝐨𝐭𝐨𝐬𝐡𝐨𝐩, mà còn được hóa thân thành các Crewmate trong Among Us để giải quyết những nhiệm vụ “thiết kế đồ án” khó nhằn!',
                    time: '12 buổi',
                    calendar: 'T2-T4-T6',
                    opening: [
                        {
                            month: '25/11/2024',
                            status1: 'Offline',
                            status2: 'Open',
                        },
                        {
                            month: '11/11/2024',
                            status1: 'Online',
                            status2: 'Open',
                        },
                    ],
                },
                {
                    title: this.tt('SKETCHUP'),
                    image: {
                        url: '/assets/images/home/sket.png',
                        alt: 'Whether you have a team of 2 or 200, our shared team inboxes keep everyone on the same page and in the loop.',
                    },
                    desc: 'Hãy tưởng tượng bạn không chỉ học 𝐏𝐡𝐨𝐭𝐨𝐬𝐡𝐨𝐩, mà còn được hóa thân thành các Crewmate trong Among Us để giải quyết những nhiệm vụ “thiết kế đồ án” khó nhằn!',
                    time: '12 buổi',
                    calendar: 'T2-T4-T6',
                    opening: [
                        {
                            month: '11/11/2024',
                            status1: 'Online',
                            status2: 'Open',
                        },
                    ],
                },
                {
                    title: this.tt('LUMION'),
                    image: {
                        url: '/assets/images/home/lumi.png',
                        alt: 'Whether you have a team of 2 or 200, our shared team inboxes keep everyone on the same page and in the loop.',
                    },
                    desc: 'Hãy tưởng tượng bạn không chỉ học 𝐏𝐡𝐨𝐭𝐨𝐬𝐡𝐨𝐩, mà còn được hóa thân thành các Crewmate trong Among Us để giải quyết những nhiệm vụ “thiết kế đồ án” khó nhằn!',
                    time: '12 buổi',
                    calendar: 'T2-T4-T6',
                    opening: [
                        {
                            month: '25/11/2024',
                            status1: 'Offline',
                            status2: 'Open',
                        },
                        {
                            month: '11/11/2024',
                            status1: 'Online',
                            status2: 'Open',
                        },
                    ],
                },
                {
                    title: this.tt('Rhino & Grass Hopper'),
                    image: {
                        url: '/assets/images/home/grasshopper.png',
                        alt: 'Whether you have a team of 2 or 200, our shared team inboxes keep everyone on the same page and in the loop.',
                    },
                    desc: 'Hãy tưởng tượng bạn không chỉ học 𝐏𝐡𝐨𝐭𝐨𝐬𝐡𝐨𝐩, mà còn được hóa thân thành các Crewmate trong Among Us để giải quyết những nhiệm vụ “thiết kế đồ án” khó nhằn!',
                    time: '12 buổi',
                    calendar: 'T2-T4-T6',
                    opening: [
                        {
                            month: '25/11/2024',
                            status1: 'Offline',
                            status2: 'Open',
                        },
                        {
                            month: '11/11/2024',
                            status1: 'Online',
                            status2: 'Open',
                        },
                    ],
                },
                {
                    title: this.tt('D5 RENDER'),
                    image: {
                        url: '/assets/images/home/D5Render.png',
                        alt: 'Whether you have a team of 2 or 200, our shared team inboxes keep everyone on the same page and in the loop.',
                    },
                    desc: 'Hãy tưởng tượng bạn không chỉ học 𝐏𝐡𝐨𝐭𝐨𝐬𝐡𝐨𝐩, mà còn được hóa thân thành các Crewmate trong Among Us để giải quyết những nhiệm vụ “thiết kế đồ án” khó nhằn!',
                    time: '12 buổi',
                    calendar: 'T2-T4-T6',
                    opening: [
                        {
                            month: '11/11/2024',
                            status1: 'Online',
                            status2: 'Open',
                        },
                    ],
                },
                {
                    title: this.tt('3DsMax'),
                    image: {
                        url: '/assets/images/home/3DsMax.png',
                        alt: 'Whether you have a team of 2 or 200, our shared team inboxes keep everyone on the same page and in the loop.',
                    },
                    desc: 'Hãy tưởng tượng bạn không chỉ học 𝐏𝐡𝐨𝐭𝐨𝐬𝐡𝐨𝐩, mà còn được hóa thân thành các Crewmate trong Among Us để giải quyết những nhiệm vụ “thiết kế đồ án” khó nhằn!',
                    time: '12 buổi',
                    calendar: 'T2-T4-T6',
                    opening: [
                        {
                            month: '25/11/2024',
                            status1: 'Offline',
                            status2: 'Open',
                        },
                        {
                            month: '11/11/2024',
                            status1: 'Online',
                            status2: 'Open',
                        },
                    ],
                },
            ],
            coursesHand: [
                {
                    title: this.tt('VẼ MÀU NƯỚC'),
                    image: {
                        url: '/assets/images/home/sket.png',
                        alt: 'Whether you have a team of 2 or 200, our shared team inboxes keep everyone on the same page and in the loop.',
                    },
                    desc: 'Hãy tưởng tượng bạn không chỉ học 𝐏𝐡𝐨𝐭𝐨𝐬𝐡𝐨𝐩, mà còn được hóa thân thành các Crewmate trong Among Us để giải quyết những nhiệm vụ “thiết kế đồ án” khó nhằn!',
                    time: '12 buổi',
                    calendar: 'T2-T4-T6',
                    opening: [
                        {
                            month: '30/11/2024',
                            status1: 'Online',
                            status2: 'Full',
                        },
                        {
                            month: '25/11/2024',
                            status1: 'Offline',
                            status2: 'Open',
                        },
                        {
                            month: '11/11/2024',
                            status1: 'Online',
                            status2: 'Open',
                        },
                    ],
                },
                {
                    title: this.tt('VẼ BÚT KIM'),
                    image: {
                        url: '/assets/images/home/lumi.png',
                        alt: 'Whether you have a team of 2 or 200, our shared team inboxes keep everyone on the same page and in the loop.',
                    },
                    desc: 'Hãy tưởng tượng bạn không chỉ học 𝐏𝐡𝐨𝐭𝐨𝐬𝐡𝐨𝐩, mà còn được hóa thân thành các Crewmate trong Among Us để giải quyết những nhiệm vụ “thiết kế đồ án” khó nhằn!',
                    time: '12 buổi',
                    calendar: 'T2-T4-T6',
                    opening: [
                        {
                            month: '30/11/2024',
                            status1: 'Online',
                            status2: 'Full',
                        },
                        {
                            month: '25/11/2024',
                            status1: 'Offline',
                            status2: 'Open',
                        },
                        {
                            month: '11/11/2024',
                            status1: 'Online',
                            status2: 'Open',
                        },
                    ],
                },
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
        }
    },
    methods: {
        contact() {
            this.isLoading = true
            this.errors = validateForm(this.form.contact.data, this.rules)
            if (Object.keys(this.errors).length > 0) {
                this.isLoading = false
                this.isEmptyService = true
                return false
            }
            if (this.typeServiceActive === null) {
                this.isLoading = false
                this.isEmptyService = true
                return false
            }
            this.$inertia.post('contacts', this.form, {
                preserveScroll: true,
                onSuccess: () => {
                    this.form.contact.data = { ...emptyForm }
                    this.typeServiceActive = null
                    this.isEmptyService = false
                    this.isSuccess = true
                    this.isSubmit = true
                    this.isLoading = false
                    document.body.classList.add('overflow-hidden')
                },
            })
        },
        closePopup() {
            this.isSuccess = false
            document.body.classList.remove('overflow-hidden')
        },

        getStatusColor(status) {
            switch (status) {
                case 'Online':
                    return 'bg-red-fks text-gray-100' // Màu xanh lá
                case 'Offline':
                    return 'bg-blue-fks text-gray-100' // Màu đỏ
                case 'Full':
                    return 'bg-gray-warm-300 px-[18px]' // Màu vàng
                case 'Open':
                    return 'bg-green-fks' // Màu xanh dương
                default:
                    return 'bg-gray-500' // Mặc định
            }
        },

        setIsSubmit(val) {
            this.isSubmit = val
        },
    },
}
</script>
<style scoped>
.bg-about {
    border-bottom: 1px solid #dde1e6;
    background: linear-gradient(180deg, #fff 0%, rgba(255, 255, 255, 0) 100%),
        url('/public/assets/images/shap-banner.png') repeat;
}
.shape-top-course {
    display: flex;
    padding: 0px 0.047px 0.058px 0px;
    flex-direction: column;
    align-items: center;
    mix-blend-mode: exclusion;
}
</style>
