<template>
    <header class="fixed top-0 left-0 w-full shadow-md bg-[#082680] text-white z-[1]">
        <div class="container mx-auto flex justify-between items-center py-3 px-4">
            <!-- Logo + Navigation -->
            <div class="flex items-center space-x-6">
                <Link to="/" class="btnlogo">
                    <img src="https://cdn.tgdd.vn/mwgcart/tan-tam/images/logo.png" alt="Logo" width="122" height="55" />
                </Link>
                <router-link to="/gioi-thieu" class="text-white hover:text-blue-500 transition font-medium">
                    Giới thiệu
                </router-link>
            </div>

            <!-- Contact -->
            <div class="flex items-center space-x-2">
                <i class="icV2-tel relative text-blue-500"></i>
                <a href="tel:1900232463" class="text-white hover:text-blue-500">
                    <strong>1900 232 463</strong>
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
