<template>
    <header class="fixed top-0 left-0 w-full shadow-md bg-[#082680] text-white z-[99]">
        <div class="container mx-auto flex justify-between items-center py-3 px-4">
            <!-- Logo -->
            <div class="flex items-center space-x-4">
                <Link :href="route('home')" class="btnlogo">
                    <img src="/assets/images/logo-white.png" alt="Logo" width="122" height="55" />
                </Link>
            </div>

            <!-- Desktop Menu -->
            <div class="hidden md:flex items-center space-x-6">
                <!-- Giới thiệu -->
                <div class="relative group">
                    <div class="cursor-pointer px-4 hover:text-blue-400">Giới thiệu</div>
                    <div
                        class="absolute left-0 top-full mt-1 bg-white text-black shadow-lg rounded p-3 w-56 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition"
                    >
                        <ul class="space-y-2">
                            <li v-for="(item, index) in $page.props.data.post_about" :key="index">
                                <Link :href="route('posts.show', item.slug)" class="hover:text-blue-600 text-gray-700">
                                    {{ item.title }}
                                </Link>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Máy lạnh -->
                <div class="relative group">
                    <div class="cursor-pointer px-4 hover:text-blue-400">Máy lạnh</div>
                    <div
                        class="absolute left-0 top-full mt-1 bg-white text-black shadow-lg rounded p-3 w-56 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition"
                    >
                        <ul class="space-y-2">
                            <li v-for="(item, index) in $page.props.data.post_maylanh" :key="index">
                                <Link :href="route('posts.show', item.slug)" class="hover:text-blue-600 text-gray-700">
                                    {{ item.title }}
                                </Link>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Điện lạnh công nghiệp -->
                <div class="relative group">
                    <div class="cursor-pointer px-4 hover:text-blue-400">Điện lạnh công nghiệp</div>
                    <div
                        class="absolute left-0 top-full mt-1 bg-white text-black shadow-lg rounded p-3 w-64 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition"
                    >
                        <ul class="space-y-2">
                            <li v-for="(item, index) in $page.props.data.post_dien_lanh_cong_nghiep" :key="index">
                                <Link :href="route('posts.show', item.slug)" class="hover:text-blue-600 text-gray-700">
                                    {{ item.title }}
                                </Link>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Dịch vụ khác -->
                <div class="relative group">
                    <div class="cursor-pointer px-4 hover:text-blue-400">Dịch vụ khác</div>
                    <div
                        v-if="$page.props.data.post_service && $page.props.data.post_service.length"
                        class="absolute left-0 top-full mt-1 bg-white text-black shadow-lg rounded p-3 w-56 opacity-0 invisible group-hover:opacity-100 group-hover:visible transition"
                    >
                        <ul class="space-y-2">
                            <li v-for="(item, index) in $page.props.data.post_service" :key="index">
                                <Link :href="route('posts.show', item.slug)" class="hover:text-blue-600 text-gray-700">
                                    {{ item.title }}
                                </Link>
                            </li>
                        </ul>
                    </div>
                </div>

                <!-- Kinh nghiệm sử dụng -->
                <Link :href="route('posts')" class="hover:text-blue-400 transition"> Kinh nghiệm sử dụng </Link>
            </div>

            <!-- Mobile Hamburger -->
            <div class="md:hidden">
                <button @click="isMobileMenuOpen = !isMobileMenuOpen">
                    <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path
                            stroke-linecap="round"
                            stroke-linejoin="round"
                            stroke-width="2"
                            d="M4 6h16M4 12h16M4 18h16"
                        />
                    </svg>
                </button>
            </div>

            <!-- Contact -->
            <div class="hidden md:flex items-center space-x-2">
                <i class="icV2-tel text-blue-500"></i>
                <a href="tel:0977333965" class="hover:text-blue-400">
                    <strong>0977333965</strong>
                    <span class="block text-xs">(8h00 - 21h00)</span>
                </a>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div v-if="isMobileMenuOpen" class="md:hidden bg-white text-gray-700 shadow-lg p-4">
            <ul class="space-y-4">
                <li>
                    <strong>Giới thiệu</strong>
                    <ul class="ml-4 text-sm space-y-2">
                        <li v-for="(item, index) in $page.props.data.post_about" :key="index">
                            <Link :href="route('posts.show', item.slug)" class="hover:text-blue-600">{{
                                item.title
                            }}</Link>
                        </li>
                    </ul>
                </li>
                <li>
                    <strong>Máy lạnh</strong>
                    <ul class="ml-4 text-sm space-y-2">
                        <li v-for="(item, index) in $page.props.data.post_maylanh" :key="index">
                            <Link :href="route('posts.show', item.slug)" class="hover:text-blue-600">{{
                                item.title
                            }}</Link>
                        </li>
                    </ul>
                </li>
                <li>
                    <strong>Điện lạnh công nghiệp</strong>
                    <ul class="ml-4 text-sm space-y-2">
                        <li v-for="(item, index) in $page.props.data.post_dien_lanh_cong_nghiep" :key="index">
                            <Link :href="route('posts.show', item.slug)" class="hover:text-blue-600">{{
                                item.title
                            }}</Link>
                        </li>
                    </ul>
                </li>
                <li>
                    <strong>Dịch vụ khác</strong>
                    <ul
                        v-if="$page.props.data.post_service && $page.props.data.post_service.length"
                        class="ml-4 text-sm space-y-2"
                    >
                        <li v-for="(item, index) in $page.props.data.post_service" :key="index">
                            <Link :href="route('posts.show', item.slug)" class="hover:text-blue-600">{{
                                item.title
                            }}</Link>
                        </li>
                    </ul>
                </li>
                <strong>
                    <Link :href="route('posts')" class="hover:text-blue-600">Kinh nghiệm sử dụng</Link>
                </strong>
                <li>
                    <a href="tel:0977333965" class="block text-blue-600 font-bold">Gọi: 0977333965</a>
                </li>
            </ul>
        </div>
    </header>
</template>

<script setup>
import { ref } from 'vue'

const isMobileMenuOpen = ref(false)
</script>
