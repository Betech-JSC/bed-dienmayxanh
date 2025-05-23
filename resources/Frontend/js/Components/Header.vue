<template>
    <header class="fixed top-0 left-0 w-full shadow-md bg-[#082680] text-white z-[99]">
        <div class="container mx-auto flex justify-between items-center py-3 px-4">
            <!-- Logo + Menu -->
            <div class="flex items-center space-x-6">
                <Link :href="route('home')" class="btnlogo">
                    <img src="/assets/images/logo-white.png" alt="Logo" width="122" height="55" />
                </Link>

                <!-- Máy lạnh dropdown -->
                <div class="relative group hidden md:block">
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

                <!-- Máy lạnh dropdown -->
                <div class="relative group hidden md:block">
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

                <!-- Điện lạnh công nghiệp dropdown -->
                <div class="relative group hidden md:block">
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

                <!-- Dịch vụ khác dropdown -->
                <div class="relative group hidden md:block">
                    <div class="cursor-pointer px-4 hover:text-blue-400">Dịch vụ khác</div>
                    <div
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
                <Link :href="route('posts')" class="hover:text-blue-400 transition hidden md:block">
                    Kinh nghiệm sử dụng
                </Link>
            </div>

            <!-- Contact -->
            <div class="flex items-center space-x-2">
                <i class="icV2-tel text-blue-500"></i>
                <a href="tel:0977333965" class="hover:text-blue-400">
                    <strong>0977333965</strong>
                    <span class="block text-xs">(8h00 - 21h00)</span>
                </a>
            </div>
        </div>
    </header>
</template>
