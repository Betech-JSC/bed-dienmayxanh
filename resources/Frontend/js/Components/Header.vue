<template>
    <header class="fixed top-0 left-0 w-full shadow-md bg-[#082680] text-white z-[1]">
        <div class="container mx-auto flex justify-between items-center py-3 px-4">
            <!-- Logo + Navigation -->
            <div class="flex items-center space-x-6">
                <Link :href="route('home')" class="btnlogo">
                    <img src="/assets/images/logo-white.png" alt="Logo" width="122" height="55" />
                </Link>
                <Link :href="route('home')" class="text-white hover:text-blue-500 transition font-medium">
                    Giới thiệu
                </Link>
                <Link :href="route('posts')" class="text-white hover:text-blue-500 transition font-medium">
                    Tin tức
                </Link>
                <Link :href="route('posts')" class="flex items-center space-x-[8px] px-[1rem]"> Dịch vụ </Link>
            </div>

            <!-- Contact -->
            <div class="flex items-center space-x-2">
                <i class="icV2-tel relative text-blue-500"></i>
                <a href="tel:0977333965" class="text-white hover:text-blue-500">
                    <strong>0977333965</strong>
                    <span class="block text-xs">(8h00 - 21h00)</span>
                </a>
            </div>
        </div>
    </header>
</template>

<script>
export default {
    name: 'HeaderComponent',
}
</script>

<style scoped>
.btnlogo img {
    transition: transform 0.2s ease-in-out;
}
.btnlogo:hover img {
    transform: scale(1.05);
}
</style>
