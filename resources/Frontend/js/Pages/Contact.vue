<template>
    <section class="xl:pt-[68px] md:pt-12 pt-8">
        <div class="container pb-8 xl:pb-16 md:pb-12">
            <div class="grid grid-cols-12 gap-[32px] md:gap-[64px]">
                <div class="lg:col-span-6 col-span-full text-primary-600 flex flex-col justify-between">
                    <div class="space-y-[12px]">
                        <div class="title-2">Contact us</div>
                        <div class="display-3 text-primary-900">
                            Let’s Connect and Explore Quality Solutions Together
                        </div>
                    </div>
                    <div>
                        <div class="space-y-[24px]">
                            <div class="title-1 text-gray-700">VIET NAM U-TREND COMPANY LIMITED</div>
                            <div v-for="(item, index) in infor" :key="index" class="space-y-[8px]">
                                <div class="flex space-x-[12px]">
                                    <JPicture :src="item.icon" alt="" class="picture-cover" />
                                    <div class="label-1 text-gray-800">
                                        {{ item.title }}
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-[1rem]">
                            <JPicture
                                v-for="(item, index) in social"
                                :key="index"
                                :src="item.icon"
                                alt=""
                                class="picture-cover"
                            />
                        </div>
                    </div>
                    <div class="flex items-center space-x-[24px]">
                        <div class="flex items-center space-x-[12px] p-[20px] bg-white rounded-[10px]">
                            <div
                                class="bg-primary-700 rounded-[10px] text-white w-[48px] h-[48px] flex items-center justify-center"
                            >
                                <svg
                                    width="21"
                                    height="19"
                                    viewBox="0 0 21 19"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M7.99865 12C7.99865 12 9.31115 13.5 11.4986 13.5C13.6861 13.5 14.9986 12 14.9986 12M14.2486 7H14.2586M8.74865 7H8.75865M11.4986 18C16.1931 18 19.9986 14.1944 19.9986 9.5C19.9986 4.80558 16.1931 1 11.4986 1C6.80423 1 2.99865 4.80558 2.99865 9.5C2.99865 10.45 3.1545 11.3636 3.44202 12.2166C3.55022 12.5376 3.60432 12.6981 3.61408 12.8214C3.62371 12.9432 3.61643 13.0286 3.5863 13.1469C3.5558 13.2668 3.48844 13.3915 3.35374 13.6408L1.71808 16.6684C1.48477 17.1002 1.36812 17.3161 1.39423 17.4828C1.41697 17.6279 1.5024 17.7557 1.62782 17.8322C1.77183 17.9201 2.01595 17.8948 2.50419 17.8444L7.62521 17.315C7.78029 17.299 7.85783 17.291 7.92851 17.2937C7.99802 17.2963 8.04709 17.3029 8.11488 17.3185C8.1838 17.3344 8.27047 17.3678 8.4438 17.4345C9.39185 17.7998 10.4219 18 11.4986 18ZM14.7486 7C14.7486 7.27614 14.5248 7.5 14.2486 7.5C13.9725 7.5 13.7486 7.27614 13.7486 7C13.7486 6.72386 13.9725 6.5 14.2486 6.5C14.5248 6.5 14.7486 6.72386 14.7486 7ZM9.24865 7C9.24865 7.27614 9.02479 7.5 8.74865 7.5C8.47251 7.5 8.24865 7.27614 8.24865 7C8.24865 6.72386 8.47251 6.5 8.74865 6.5C9.02479 6.5 9.24865 6.72386 9.24865 7Z"
                                        stroke="white"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </div>
                            <div class="space-y-[4px]">
                                <div class="title-3 text-primary-900">Join our supplier group</div>
                                <div class="label-1 text-primary-700">zalo.me/utrend vietnam</div>
                            </div>
                        </div>
                        <div class="flex items-center space-x-[12px] p-[20px] bg-white rounded-[10px]">
                            <div
                                class="bg-primary-700 rounded-[10px] text-white w-[48px] h-[48px] flex items-center justify-center"
                            >
                                <svg
                                    width="21"
                                    height="19"
                                    viewBox="0 0 21 19"
                                    fill="none"
                                    xmlns="http://www.w3.org/2000/svg"
                                >
                                    <path
                                        d="M7.99865 12C7.99865 12 9.31115 13.5 11.4986 13.5C13.6861 13.5 14.9986 12 14.9986 12M14.2486 7H14.2586M8.74865 7H8.75865M11.4986 18C16.1931 18 19.9986 14.1944 19.9986 9.5C19.9986 4.80558 16.1931 1 11.4986 1C6.80423 1 2.99865 4.80558 2.99865 9.5C2.99865 10.45 3.1545 11.3636 3.44202 12.2166C3.55022 12.5376 3.60432 12.6981 3.61408 12.8214C3.62371 12.9432 3.61643 13.0286 3.5863 13.1469C3.5558 13.2668 3.48844 13.3915 3.35374 13.6408L1.71808 16.6684C1.48477 17.1002 1.36812 17.3161 1.39423 17.4828C1.41697 17.6279 1.5024 17.7557 1.62782 17.8322C1.77183 17.9201 2.01595 17.8948 2.50419 17.8444L7.62521 17.315C7.78029 17.299 7.85783 17.291 7.92851 17.2937C7.99802 17.2963 8.04709 17.3029 8.11488 17.3185C8.1838 17.3344 8.27047 17.3678 8.4438 17.4345C9.39185 17.7998 10.4219 18 11.4986 18ZM14.7486 7C14.7486 7.27614 14.5248 7.5 14.2486 7.5C13.9725 7.5 13.7486 7.27614 13.7486 7C13.7486 6.72386 13.9725 6.5 14.2486 6.5C14.5248 6.5 14.7486 6.72386 14.7486 7ZM9.24865 7C9.24865 7.27614 9.02479 7.5 8.74865 7.5C8.47251 7.5 8.24865 7.27614 8.24865 7C8.24865 6.72386 8.47251 6.5 8.74865 6.5C9.02479 6.5 9.24865 6.72386 9.24865 7Z"
                                        stroke="white"
                                        stroke-width="2"
                                        stroke-linecap="round"
                                        stroke-linejoin="round"
                                    />
                                </svg>
                            </div>
                            <div class="space-y-[4px]">
                                <div class="title-3 text-primary-900">Call us</div>
                                <div class="label-1 text-primary-700">0318148569</div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="lg:col-span-6 max-lg:hidden">
                    <div class="space-y-6 p-[32px] bg-primary-100 rounded-[12px]">
                        <div class="space-y-5">
                            <JamFieldSet
                                v-model="form.contact.data['Họ và tên']"
                                :field="{
                                    rules: rules,
                                    errors: errors,
                                    type: 'text',
                                    placeholder: tt('Your name*'),
                                    name: 'Họ và tên',
                                    fieldName: 'Họ và tên',
                                    label: tt('Your name'),
                                    errorText: tt('Your error name'),
                                }"
                                :isSubmit="isSubmit"
                                @setIsSubmit="setIsSubmit"
                                :isContact="true"
                            />
                            <div class="grid md:grid-cols-2 grid-cols-1 xl:gap-x-5 md:gap-x-3.5 max-md:gap-y-5">
                                <JamFieldSet
                                    v-model="form.contact.data['Số điện thoại']"
                                    :field="{
                                        rules: rules,
                                        errors: errors,
                                        type: 'number',
                                        placeholder: tt('Phone number'),
                                        name: 'Số điện thoại',
                                        fieldName: 'Số điện thoại',
                                        label: tt('Form contact phone'),
                                        errorText: tt('Form contact error phone'),
                                    }"
                                    :isSubmit="isSubmit"
                                    @setIsSubmit="setIsSubmit"
                                    :isContact="true"
                                />
                                <JamFieldSet
                                    v-model="form.contact.data['Email']"
                                    :field="{
                                        rules: rules,
                                        errors: errors,
                                        type: 'email',
                                        placeholder: tt('you@company.com'),
                                        name: 'Email',
                                        fieldName: 'Email',
                                        label: tt('Form contact email'),
                                        errorText: tt('Form contact error email'),
                                    }"
                                    :isSubmit="isSubmit"
                                    @setIsSubmit="setIsSubmit"
                                    :isContact="true"
                                />
                            </div>
                            <!-- <div class="relative">
                                <div class="lg:mb-1.5 mb-1 text-gray-700 label-2">
                                    {{ tt('Inquiry') }}<span class="text-red-600">*</span>
                                </div>
                                <div
                                    @click="toggleTypeService($event)"
                                    class="relative z-10 select-shadow border border-gray-300 rounded-lg py-2.5 px-3.5 text-gray-500 cursor-pointer bg-white"
                                >
                                    <div class="flex items-center space-x-[4px]">
                                        <div class="flex-1">
                                            {{
                                                typeServiceActive && typeServiceActive.title
                                                    ? typeServiceActive.title
                                                    : tt('Topic')
                                            }}
                                        </div>
                                        <div class="flex-shrink-0">
                                            <ChevronContact class="rotate-90" />
                                        </div>
                                    </div>
                                </div>
                                <small
                                    v-if="typeServiceActive === null && isEmptyService === true"
                                    class="absolute -bottom-1 text-red-600 translate-y-full leading-[100%]"
                                >
                                    {{ tt('Vui lòng chọn loại dịch vụ') }}
                                </small>
                                <Transition name="fade" mode="out-in">
                                    <div
                                        v-if="isShowTypeService"
                                        class="absolute z-20 w-full top-[104%] shadow-lg max-h-[166px] overflow-y-auto rounded-lg"
                                        v-click-outside="hideBox"
                                    >
                                        <div class="bg-white">
                                            <div
                                                @click="setTypeService(service)"
                                                class="text-gray-500 py-2.5 px-3.5 hover:bg-gray-200 duration-200 cursor-pointer"
                                                v-for="(service, serviceIndex) in servicesList"
                                                :key="serviceIndex"
                                            >
                                                {{ service.title }}
                                            </div>
                                        </div>
                                    </div>
                                </Transition>
                            </div> -->
                            <JamFieldSet
                                v-model="form.contact.data['Nội dung cần hỗ trợ']"
                                :field="{
                                    rules: rules,
                                    errors: errors,
                                    type: 'textarea',
                                    placeholder: tt('Leave us a message...'),
                                    name: 'Nội dung cần hỗ trợ',
                                    fieldName: 'Nội dung cần hỗ trợ',
                                    label: tt('Message'),
                                    rows: `${screenWidth < 1280 && screenWidth >= 1024 ? '4' : '6'}`,
                                }"
                                :isSubmit="isSubmit"
                                @setIsSubmit="setIsSubmit"
                                :isContact="true"
                            />
                        </div>
                        <button class="btn btn-primary !h-[44px] !px-[76.5px] w-full label-1" @click="contact">
                            <div>{{ tt('Send message') }}</div>
                            <i class="gg-spinner" v-if="isLoading"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="py-8 xl:py-16 md:py-12 bg-gray-25" v-if="agencies && agencies.length > 0">
        <ContactMapSection :agencies="agencies" />
    </section>
    <ModalSuccess
        @close="closePopup"
        :isSuccess="isSuccess"
        :title="tt('Yêu cầu thành công')"
        :description="
            tt(
                'Hệ thống đã nhận thông tin yêu cầu của khách hàng. Funky sẽ liên hệ và tư vấn Quý khách trong thời gian sớm nhất.'
            )
        "
    />
</template>
<script>
import { validateForm } from '@/validator'
import JamFieldSet from '../Components/Jam/FieldSet.vue'
import JamBreadcrumb from '@/Components/Jam/Breadcrumb.vue'
import ChevronContact from '@/Components/Icons/ChevronContact.vue'
const emptyForm = {
    'Họ và tên': '',
    'Số điện thoại': '',
    Email: '',
    'Nội dung cần hỗ trợ': '',
}
export default {
    props: ['agencies'],
    components: { JamFieldSet, JamBreadcrumb, ChevronContact },
    directives: {
        'click-outside': {
            beforeMount: (el, binding) => {
                el.clickOutsideEvent = (event) => {
                    // here I check that click was outside the el and his children
                    if (!(el == event.target || el.contains(event.target))) {
                        // and if it did, call method provided in attribute value
                        binding.value()
                    }
                }
                document.addEventListener('click', el.clickOutsideEvent)
            },
            unmounted: (el) => {
                document.removeEventListener('click', el.clickOutsideEvent)
            },
        },
    },
    data() {
        return {
            banner: {
                url: '/assets/images/contact/blue-shape.webp',
                alt: 'banner lien he',
            },
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
            breadcrumbs: [
                {
                    title: this.tt('Liên hệ'),
                },
            ],
            isShowTypeService: false,
            servicesList: [],
            typeServiceActive: null,
            isEmptyService: false,
            screenWidth: 0,
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
        }
    },
    mounted() {
        if (this.$page.props.data.services && this.$page.props.data.services.length > 0) {
            this.servicesList = this.$page.props.data.services
        }
        this.screenWidth = window.innerWidth
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
        toggleTypeService(event) {
            event.stopPropagation()
            this.isShowTypeService = !this.isShowTypeService
        },
        setTypeService(item) {
            this.typeServiceActive = item
            this.form.contact.data.Service.id = this.typeServiceActive.id
            this.form.contact.data.Service.title = this.typeServiceActive.title
            this.form.contact.data.Service.slug = this.typeServiceActive.slug
            this.isShowTypeService = false
        },
        hideBox() {
            this.isShowTypeService = false
        },
    },
}
</script>
<style lang="scss" scoped>
/* width */
::-webkit-scrollbar {
    width: 8px;
    background: white;
    border-radius: 30px;
}
/* Handle */
::-webkit-scrollbar-thumb {
    @apply bg-gray-200 rounded-[30px];
}
/* Handle on hover */
::-webkit-scrollbar-thumb:hover {
    @apply bg-gray-400;
}
.select-shadow {
    box-shadow: 0px 1px 2px rgba(16, 24, 40, 0.05);
}
.gg-spinner {
    transform: scale(var(--ggs, 1));
}

.gg-spinner,
.gg-spinner::after,
.gg-spinner::before {
    box-sizing: border-box;
    position: relative;
    display: block;
    width: 1rem;
    height: 1rem;
}

.gg-spinner::after,
.gg-spinner::before {
    content: '';
    position: absolute;
    border-radius: 100px;
}

.gg-spinner::before {
    animation: spinner 1s cubic-bezier(0.6, 0, 0.4, 1) infinite;
    border: 3px solid transparent;
    border-top-color: currentColor;
}

.gg-spinner::after {
    border: 3px solid;
    opacity: 0.2;
}

@keyframes spinner {
    0% {
        transform: rotate(0deg);
    }
    to {
        transform: rotate(359deg);
    }
}
:deep(.banner-shape) {
    img {
        @apply max-md:w-full max-md:h-full max-md:object-cover;
    }
}
</style>
