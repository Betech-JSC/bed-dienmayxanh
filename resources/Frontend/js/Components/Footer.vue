<template>
    <footer id="footer-section" class="py-5 bg-gray-warm-100 pb-8">
        <!-- Contact Section -->
        <section class="container space-y-10 p-6 bg-[#D34000] rounded-3xl">
            <div class="grid grid-cols-3 gap-6">
                <!-- Contact Form -->
                <div
                    class="lg:col-span-1 col-span-full max-lg:space-y-6 lg:h-full p-4 md:p-6 xl:p-8 bg-[#2F49D9] rounded-3xl flex flex-col justify-between"
                >
                    <div class="space-y-6">
                        <p class="headline-3 font-bold font-display text-white uppercase">Để lại thông tin liên hệ</p>
                        <div class="space-y-6">
                            <JamFieldSet
                                class="text-white"
                                v-model="form.contact.data['name']"
                                :field="{
                                    rules: rules,
                                    errors: errors,
                                    type: 'text',
                                    placeholder: tt('Họ và tên'),
                                    name: 'name',
                                    fieldName: 'name',
                                    errorText: tt('Họ và tên không hợp lệ'),
                                }"
                                :isSubmit="isSubmit"
                                @setIsSubmit="setIsSubmit"
                            />
                            <JamFieldSet
                                v-model="form.contact.data['phone']"
                                :field="{
                                    rules: rules,
                                    errors: errors,
                                    type: 'number',
                                    placeholder: tt('Số điện thoại'),
                                    name: 'phone',
                                    fieldName: 'phone',
                                    errorText: tt('Số điện thoại không hợp lệ'),
                                }"
                                :isSubmit="isSubmit"
                                @setIsSubmit="setIsSubmit"
                            />
                            <JamFieldSet
                                v-model="form.contact.data['email']"
                                :field="{
                                    rules: rules,
                                    errors: errors,
                                    type: 'email',
                                    placeholder: tt('Email'),
                                    name: 'email',
                                    fieldName: 'email',
                                    errorText: tt('Email không hợp lệ'),
                                }"
                                :isSubmit="isSubmit"
                                @setIsSubmit="setIsSubmit"
                            />
                            <JamFieldSet
                                v-model="form.contact.data['note']"
                                :field="{
                                    rules: rules,
                                    errors: errors,
                                    type: 'text',
                                    placeholder: tt('Nội dung cần tư vấn'),
                                    name: 'note',
                                    fieldName: 'note',
                                    errorText: tt('Nội dung không hợp lệ'),
                                }"
                                :isSubmit="isSubmit"
                                @setIsSubmit="setIsSubmit"
                            />
                        </div>
                        <ButtonFooter @click="contact" title="Nhận tư vấn" :isLoading="isLoading" />
                    </div>
                </div>

                <!-- Social Media Section -->
                <div
                    class="lg:col-span-1 col-span-full max-lg:space-y-6 lg:h-full p-4 md:p-6 xl:p-8 bg-[#CBFF00] rounded-3xl flex flex-col justify-between"
                >
                    <div class="display-3 text-[#18191E] font-bold font-display uppercase flex-1">
                        Theo dõi thêm về hoạt động của Funky
                    </div>
                    <div class="flex items-center space-x-3">
                        <a
                            v-for="(item, index) in socialList"
                            :href="item.link"
                            target="_blank"
                            rel="noopener noreferrer nofollow"
                            :key="index"
                            class="w-10 h-10 flex items-center justify-center rounded-lg bg-gray-warm-25 border-2 border-gray-warm-25 lg:hover:border-black-fks lg:hover:bg-green-fks duration-300 ease-in-out"
                        >
                            <JPicture :src="item.icon" :alt="item.alt" class="picture-cover" />
                        </a>
                    </div>
                </div>

                <!-- Community Section -->
                <div
                    class="lg:col-span-1 col-span-full max-lg:space-y-6 lg:h-full p-4 md:p-6 xl:p-8 bg-[#F4EFE2] rounded-3xl flex flex-col justify-between"
                >
                    <div class="display-3 text-[#18191E] font-bold font-display uppercase flex-1">
                        Khám phá cộng đồng Funky!
                    </div>
                    <div class="space-y-2">
                        <a
                            v-for="(item, index) in buttonList"
                            :href="item.link"
                            target="_blank"
                            rel="noopener noreferrer nofollow"
                            :key="index"
                            class="block"
                        >
                            <ButtonFooter :title="item.title" />
                        </a>
                    </div>
                </div>
            </div>

            <!-- Footer Information -->
            <div class="grid grid-cols-12 lg:space-x-[120px] space-y-6">
                <section class="col-span-full md:col-span-4 space-y-[28px]">
                    <JPicture src="/assets/svg/logo-footer.svg" alt="Funky Logo" class="picture-cover" />
                    <div class="space-y-[12px]">
                        <div class="title-3 text-white font-display font-bold">Thông tin liên hệ</div>
                        <div class="space-y-2">
                            <p class="text-base text-white font-beau font-normal">
                                <span class="font-bold">Địa chỉ: </span>
                                <span>
                                    <a
                                        href="https://maps.app.goo.gl/iRpCBTSBdBFmsAtV7"
                                        target="_blank"
                                        rel="noopener noreferrer nofollow"
                                        class="lg:hover:text-green-fks duration-300 ease-in-out"
                                    >
                                        Lầu 1, 218F/27 Chung Cư Á Châu, Đường Trần Hưng Đạo, Phường 11, Quận 5, Ho Chi
                                        Minh City, Vietnam
                                    </a>
                                </span>
                            </p>
                            <p class="text-base text-white font-beau font-normal">
                                <span class="font-bold">Email: </span>
                                <span>
                                    <a
                                        href="mailto:funkystylemanage@gmail.com"
                                        class="lg:hover:text-green-fks duration-300 ease-in-out"
                                        >funkystylemanage@gmail.com</a
                                    >
                                </span>
                            </p>
                            <p class="text-base text-white font-beau font-normal">
                                <span class="font-bold">Điện thoại: </span>
                                <span>
                                    <a href="tel:0938039170" class="lg:hover:text-green-fks duration-300 ease-in-out">
                                        093 803 91 70</a
                                    >
                                </span>
                            </p>
                        </div>
                    </div>
                </section>

                <!-- Links and Policies -->
                <section class="col-span-full md:col-span-8 grid grid-cols-2 gap-x-8">
                    <div class="space-y-6 text-white md:col-span-1 col-span-full">
                        <div class="title-3 font-display font-bold">Tổng quan</div>
                        <div class="label-1 font-medium font-beau space-y-[12px]">
                            <Link class="block" :href="route('histories.index')">Về chúng tôi</Link>
                            <Link class="block" :href="route('courses.index')">Khóa học </Link>
                            <Link class="block" :href="route('resources.index')">Tài Nguyên</Link>
                            <Link class="block" :href="route('galleries.index')">Gallery</Link>
                            <Link class="block" :href="route('posts')">Blog học thuật</Link>
                        </div>
                    </div>
                    <div v-if="courses && courses.length" class="space-y-6 text-white md:col-span-1 col-span-full">
                        <div class="title-3 font-display font-bold">Các khóa học đang ưu đãi</div>
                        <div class="label-1 font-medium font-beau space-y-[12px]">
                            <Link
                                :href="
                                    route('courses.show', {
                                        slug: item.slug ?? '',
                                    })
                                "
                                v-for="(item, index) in courses"
                                :key="index"
                                class="block"
                            >
                                {{ item.title }}
                            </Link>
                        </div>
                    </div>
                </section>
            </div>
        </section>
    </footer>
    <!-- Footer Bottom -->
    <section class="bg-gray-warm-100">
        <div
            class="border-t border-[#C1C7CD] pt-[12px] container flex items-center justify-between label-1 text-[#79716B] font-normal pb-[24px]"
        >
            <div>Funkystyle @ 2024. All rights reserved.</div>
            <Link :href="route('policies.show', policy[0]?.slug || '')" class="text-gray-500 body-1">Chính sách</Link>
        </div>
    </section>
    <ModalSuccess
        @close="closePopup"
        :isSuccess="isSuccess"
        :title="tt('Đăng ký thành công')"
        :description="
            tt(
                'Hệ thống đã nhận thông tin yêu cầu của khách hàng. Funky sẽ liên hệ và tư vấn Quý khách trong thời gian sớm nhất.'
            )
        "
    />
</template>

<script>
import { validateForm } from '@/validator'

const emptyForm = {
    name: '',
    phone: '',
    email: '',
    note: '',
}
export default {
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
                name: 'required',
                phone: 'phone|required|min:10|max:11',
                email: 'email|required',
            },
            errors: {},
            isSuccess: false,
            isLoading: false,
            isSubmit: false,
            menus: [
                {
                    title: this.tt('Footer about'),
                    slug: this.route('histories.index'),
                },
                {
                    title: this.tt('Footer job'),
                    slug: this.route('jobs.index'),
                },
                {
                    title: this.tt('Footer contact'),
                    slug: this.route('contact'),
                },
            ],
            services: this.$page.props.data.services,
            socialList: [
                {
                    link: 'https://www.facebook.com/FUNKYstyleAcademy',
                    icon: '/assets/svg/facebook.svg',
                    alt: 'social facebook',
                },
                {
                    link: 'https://www.instagram.com/funky_satellite?igsh=MTQ1Ymw2emJndDBvZg==',
                    icon: '/assets/svg/instagram.svg',
                    alt: 'social instagram',
                },
                {
                    link: 'https://www.threads.net/@funky_satellite',
                    icon: '/assets/svg/thread.svg',
                    alt: 'social thread',
                },
                {
                    link: 'https://www.tiktok.com/@hockientruccungfunky?_t=ZS-8t3CJAwFMji&_r=1',
                    icon: '/assets/svg/tiktok.svg',
                    alt: 'social tiktok',
                },
                {
                    link: 'https://www.youtube.com/@funkystyle3633',
                    icon: '/assets/svg/youtube.svg',
                    alt: 'social youtube',
                },
            ],
            infor: [
                {
                    title: this.tt('28 Đường số 10, KDC Bình Phú, Phường 11, Quận 6, Thành phố Hồ Chí Minh, Việt Nam'),
                    icon: '/assets/svg/icon-map.svg',
                    alt: '',
                },
                {
                    title: this.tt('anna.qiu@utrend-vn.com'),
                    icon: '/assets/svg/mail.svg',
                    alt: '',
                },
                {
                    title: this.tt('0318148569'),
                    icon: '/assets/svg/phone.svg',
                    alt: '',
                },
            ],
            currentYear: '',
            buttonList: [
                {
                    title: 'FUNKY Store',
                    icon: '/assets/svg/icon-map.svg',
                    link: 'https://www.facebook.com/FUNKYstyleStore',
                },
                {
                    title: 'VẼ tay KIẾN TRÚC',
                    icon: '/assets/svg/mail.svg',
                    link: 'https://www.facebook.com/FUNKYstyleSatellite',
                },
                {
                    title: 'cộng đồng cùng học kiến trúc',
                    icon: '/assets/svg/phone.svg',
                    link: 'https://www.facebook.com/groups/1184886178600822',
                },
            ],
        }
    },
    created: function () {
        this.currentYear = new Date().getFullYear()
    },
    computed: {
        courses() {
            return this.$page.props.data.footer_courses || []
        },
        policy() {
            return this.$page.props.data.policies
        },
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
        setIsSubmit(val) {
            this.isSubmit = val
        },
    },
}
</script>
<style lang="scss" scoped>
.bg-footer {
    background: url('/assets/images/footer/background-mobile.webp');
    @apply bg-cover bg-no-repeat;
}
@media screen and (min-width: 768px) {
    .bg-footer {
        background: url('/assets/images/footer/background.webp');
        @apply bg-cover bg-no-repeat;
    }
}
</style>
