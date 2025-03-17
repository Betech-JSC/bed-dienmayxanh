<template>
    <header
        class="fixed inset-x-0 top-[10px] z-[1000] xl:h-[var(--header-height-xl)] lg:h-[var(--header-height-lg)] md:h-[var(--header-height-md)]"
        @mouseleave="menuSelected = null"
    >
        <div class="h-full container">
            <div class="h-full w-full px-4 py-2 rounded-[24px] border border-gray-300 bg-[#F4EFE2] overflow-hidden">
                <div class="flex items-center justify-between h-full">
                    <div class="flex items-center h-full">
                        <Link :href="route('home')" class="xl:w-[216px] w-[180px] block">
                            <JPicture src="/assets/images/header/logo.png" alt="logo" />
                        </Link>
                    </div>
                    <div class="max-lg:hidden">
                        <ul class="flex items-center">
                            <template v-for="(menu, index) in menus" :key="index">
                                <li
                                    v-if="menu && menu.title !== ''"
                                    @mouseover="setMenuSelected(menu)"
                                    @mouseenter="setFirstSubMenu"
                                    class="py-5 flex items-center"
                                    :class="fullPath.includes(menu.slug) ? 'text-red-fks' : 'text-gray-700'"
                                >
                                    <Link
                                        :href="menu.slug"
                                        class="title-2 font-display font-bold px-[12px] hover:text-red-fks duration-300"
                                        :class="index < menus.length - 1 ? 'border-r border-r-[#CEBE93]' : ''"
                                        @click="menuSelected = null"
                                    >
                                        <div class="">{{ menu.title }}</div>
                                    </Link>
                                </li>
                            </template>
                        </ul>
                    </div>
                    <div class="space-x-[12px] hidden lg:flex items-center justify-end">
                        <ButtonPrimary @click="scrollToBottom" title="Tham gia nào !!!"/>
                    </div>
                    <div class="lg:hidden" @click="onToggleMenu()">
                        <div
                            class="w-10 h-10 rounded-xl bg-[#D34000] border border-[#D34000] flex items-center justify-center"
                        >
                            <div
                                :class="
                                    isToggleMenu ? 'opacity-0 hidden duration-700' : 'opacity-100 block duration-700'
                                "
                            >
                                <JPicture src="/assets/svg/show.svg" class="w-full h-full" />
                            </div>
                            <div
                                :class="
                                    !isToggleMenu ? 'opacity-0 hidden duration-700' : 'opacity-100 block duration-700'
                                "
                            >
                                <JPicture src="/assets/svg/close.svg" class="w-full h-full" />
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Menu mobile -->
                <div
                    :style="{
                        maxHeight: isToggleMenu ? elementHeight + 'px' : '0',
                    }"
                    :class="['transition-all duration-300 ease-out']"
                    ref="menuElement"
                >
                    <!-- <div
                    class="absolute top-0 left-0 z-10 w-full h-full duration-300 ease-in-out bg-gray-800 opacity-100 bg-opacity-70"
                    :class="isToggleMenu ? 'opacity-100' : 'opacity-0'"
                    @click="closeMenu"
                ></div> -->
                    <div class="w-full h-full bg-[#F4EFE2] duration-300">
                        <div class="flex flex-col overflow-y-scroll max-h-[calc(100vh-56px)] h-full relative z-10 pt-6">
                            <ul class="flex flex-col space-y-3">
                                <template v-for="(menuMb, menuMbIndex) in menus" :key="menuMbIndex">
                                    <li
                                        class="flex items-center justify-between font-bold title-2 font-display pb-3 border-b border-b-[#CEBE93]"
                                        :class="[fullRoute.includes(menuMb.type) ? 'text-red-fks' : 'text-gray-700']"
                                        v-if="menuMb.type !== 'featured_posts'"
                                    >
                                        <Link
                                            :href="menuMb.slug"
                                            @click="closeMenu()"
                                            class="block"
                                            :class="menuMb.subMenu && menuMb.subMenu.length > 0 ? 'w-4/12' : 'w-full'"
                                            >{{ menuMb.title }}</Link
                                        >
                                        <div
                                            @click="toggleSubMenu(menuMb.subMenu, menuMb.type)"
                                            v-if="menuMb.subMenu && menuMb.subMenu.length > 0"
                                            :class="
                                                menuMb.subMenu && menuMb.subMenu.length > 0
                                                    ? 'w-8/12 flex justify-end'
                                                    : ''
                                            "
                                        >
                                            <DropdownArrow class="-rotate-90" />
                                        </div>
                                    </li>
                                    <li
                                        class="flex items-center justify-between font-bold title-2 font-display pb-3 border-b border-b-[#CEBE93]"
                                        :class="fullPath.includes(menuMb.slug) ? 'text-primary-900' : 'text-white'"
                                        v-else-if="menuMb.type === 'featured_posts' && menuMb.title !== ''"
                                    >
                                        <Link :href="menuMb.slug" @click="closeMenu()" class="block w-full">{{
                                            menuMb.title
                                        }}</Link>
                                    </li>
                                </template>
                            </ul>
                            <div class="mt-3">
                                <div class="space-y-3">
                                    <p class="title-3 font-display font-bold text-gray-warm-700">Thông tin liên hệ</p>
                                    <div class="space-y-2">
                                        <p class="text-base text-gray-warm-700 font-normal font-beau">
                                            <span class="font-bold">Địa chỉ:</span> Lầu 1, 218F/27 Chung Cư Á Châu,
                                            Đường Trần Hưng Đạo, Phường 11, Quận 5, Ho Chi Minh City, Vietnam
                                        </p>
                                        <p class="text-base text-gray-warm-700 font-normal font-beau">
                                            <span class="font-bold">Email:</span> funkystylemanage@gmail.com
                                        </p>
                                        <p class="text-base text-gray-warm-700 font-normal font-beau">
                                            <span class="font-bold">Điện thoại:</span> 093 803 91 70
                                        </p>
                                    </div>
                                </div>
                            </div>
                            <div class="mt-6 flex items-center gap-x-3">
                                <a
                                    @click="closeSubMenu()"
                                    v-for="(item, index) in socials"
                                    :key="index"
                                    :href="item.link"
                                    class="block p-2 w-10 h-10 rounded-lg bg-gray-warm-25"
                                >
                                    <img :src="item.image" :alt="item.image" class="w-6 h-6" />
                                </a>
                            </div>
                        </div>
                        <!-- <div class="absolute bottom-0 left-0">
                        <JPicture src="/assets/images/header/header-shape.png" alt="header shape mobile category" />
                    </div> -->
                    </div>
                    <div
                        class="w-[90vw] md:w-[50vw] h-full bg-[#F4EFE2] absolute z-30 duration-500 ease-in-out flex flex-col overflow-hidden"
                        :class="isToggleSubMenu ? 'right-0' : '-right-full'"
                    >
                        <div
                            class="text-gray-700 flex items-center space-x-[4px] mb-8 mt-6 px-4"
                            @click="closeSubMenu()"
                        >
                            <DropdownArrow class="rotate-90" />
                            <span>{{ tt('Trở về') }}</span>
                        </div>
                        <ul
                            class="flex flex-col space-y-3.5 overflow-y-auto pb-16 menu-listMb max-h-[500px] h-full"
                            v-if="currentSubMenu && currentSubMenu.length > 0"
                        >
                            <li
                                v-for="(subMb, subMbIndex) in currentSubMenu"
                                :key="subMbIndex"
                                class="flex items-center justify-between menu-itemMb"
                            >
                                <Link
                                    :href="
                                        route(
                                            currentType === 'services' ? 'services.show' : 'posts.category',
                                            subMb.slug
                                        )
                                    "
                                    @click="closeMenu()"
                                    class="block w-full px-4 py-2"
                                    :class="activeMenu(subMb.slug) ? 'text-primary-600' : 'text-gray-700'"
                                    >{{ subMb.title }}</Link
                                >
                            </li>
                        </ul>
                        <div class="absolute bottom-0 left-0">
                            <JPicture src="/assets/images/header/header-shape.png" alt="header shape mobile sub menu" />
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
</template>
<script>
import ButtonPrimary from './ButtonPrimary.vue';
import DropdownArrow from './Icons/DropdownArrow.vue'
import Headphone from './Icons/Headphone.vue'
import Mail from './Icons/Mail.vue'
export default {
    props: {
        fullPath: {
            type: String,
            default: '',
        },
        fullRoute: {
            type: String,
            default: '',
        },
    },
    components: { DropdownArrow, Headphone, Mail },
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
            elementHeight: 0,
            socials: [
                {
                    link: 'https://funky.betech-digital.com/',
                    image: '/assets/svg/facebookHeader.svg',
                },
                {
                    link: 'https://funky.betech-digital.com/',
                    image: '/assets/svg/instagramHeader.svg',
                },
                {
                    link: 'https://funky.betech-digital.com/',
                    image: '/assets/svg/threadHeader.svg',
                },
                {
                    link: 'https://funky.betech-digital.com/',
                    image: '/assets/svg/tiktokHeader.svg',
                },
                {
                    link: 'https://funky.betech-digital.com/',
                    image: '/assets/svg/youtubeHeader.svg',
                },
            ],
            menus: [
                {
                    title: this.tt('Về funky'),
                    slug: this.route('histories.index'),
                    type: 'histories',
                    subMenu: [],
                },
                {
                    title: this.tt('Khóa học'),
                    slug: this.route('courses.index'),
                    type: 'courses',
                    subMenu: [],
                },
                {
                    title: this.tt('Tài nguyên'),
                    slug: this.route('resources.index'),
                    type: 'resources',
                    subMenu: [],
                },
                {
                    title: this.tt('Gallery'),
                    slug: this.route('galleries.index'),
                    type: 'galleries',
                    subMenu: [],
                },
                {
                    title: this.tt('Dịch vụ'),
                    slug: this.route('services.index'),
                    type: 'services',
                    subMenu: [],
                },
                {
                    title: this.tt('F.BLog'),
                    slug: this.route('posts'),
                    type: 'posts',
                    subMenu: [],
                },
            ],
            menuSelected: null,
            subMenuSelected: null,
            isActive: '',
            currentLan: null,
            isToggleLanBox: false,
            isToggleMenu: false,
            isToggleSubMenu: false,
            currentType: '',
            currentSubMenu: [],
            languageList: [
                {
                    title: 'VI',
                    image: {
                        url: '/assets/images/header/vi.png',
                        alt: 'vietnam flag',
                    },
                    type: 'vi',
                    link: '/vi',
                },
            ],
        }
    },
    methods: {
        calculateHeight() {
            const element = this.$refs.menuElement
            if (element) {
                this.elementHeight = element.scrollHeight
            }
        },
        setMenuSelected(item) {
            this.menuSelected = item
        },
        setFirstSubMenu() {
            if (this.menuSelected.subMenu && this.menuSelected.subMenu.length > 0) {
                this.subMenuSelected = this.menuSelected.subMenu[0]
            }
        },
        setSubMenuSelected(item) {
            this.subMenuSelected = item
        },
        activeMenu(slug) {
            const splitPath = this.fullPath.split('/')
            return slug === splitPath[splitPath.length - 1]
        },
        toggleLanBox() {
            this.isToggleLanBox = !this.isToggleLanBox
        },
        hideBox() {
            this.isToggleLanBox = false
        },
        onToggleMenu() {
            this.isToggleMenu = !this.isToggleMenu
            if (this.isToggleMenu === true) {
                document.body.classList.add('overflow-hidden')
            } else {
                document.body.classList.remove('overflow-hidden')
            }
        },
        closeMenu() {
            const el = document.body
            el.classList.remove('overflow-hidden', 'menu-is-opened')
            this.isToggleMenu = false
            this.isToggleSubMenu = false
        },
        toggleSubMenu(arr, type) {
            this.isToggleSubMenu = !this.isToggleSubMenu
            this.currentSubMenu = arr
            this.currentType = type
        },
        closeSubMenu() {
            this.isToggleSubMenu = false
        },
        scrollToBottom() {
            window.scrollTo({
                top: document.body.scrollHeight,
                behavior: 'smooth', // Tạo hiệu ứng cuộn mượt
            })
        },
    },
    mounted() {
        this.calculateHeight()
    },
}
</script>
<style lang="scss">
body {
    --header-height-sm: 48px;
    --header-height-md: 48px;
    --header-height-lg: 68px;
    --header-height-xl: 68px;
}
</style>
<style lang="scss" scoped>
.header-shadow {
    box-shadow: 0 0 3px #1018280f, 0 1px 2px #1018280f;
}
.language-box {
    box-shadow: 0px 1px 2px 0px #1018280d;
}
.bg-header {
    clip-path: polygon(0 0, 100% 0%, 88% 100%, 0% 100%);
}
@media screen and (min-width: 375px) {
    .header-shape {
        width: calc(100vw - ((100vw - 425px) / 2));
    }
}
@media screen and (min-width: 768px) {
    .header-shape {
        width: calc(100vw - ((100vw - 768px) / 2));
    }
}
@media screen and (min-width: 1024px) {
    .header-shape {
        width: calc(100vw - ((100vw - 1024px) / 2));
    }
}
@media screen and (min-width: 1280px) {
    .header-shape {
        width: calc(100vw - ((100vw - 1250px) / 2));
    }
}
@media screen and (min-width: 1366px) {
    .header-shape {
        width: calc(100vw - ((100vw - 1280px) / 2));
    }
}
@media screen and (min-width: 1440px) {
    .header-shape {
        width: calc(100vw - ((100vw - 1265px) / 2));
    }
}
.bg-gradient-header {
    background-image: linear-gradient(350.4deg, #2b40b6 3.98%, #2067e3 30%);
}
ul li:last-child {
    border-bottom: none;
}
</style>
