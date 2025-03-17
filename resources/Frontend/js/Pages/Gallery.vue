<template>
    <Banner
        v-if="$page.props.data.banner.banner_gallery"
        :image="$page.props.data.banner.banner_gallery.image.url"
        :imageMobile="$page.props.data.banner.banner_gallery.image_mobile.url"
        :alt="$page.props.data.banner.banner_gallery.title"
    >
        <div>
            <div class="space-y-3 max-w-[470px] w-full text-white">
                <h1 class="display-2 uppercase font-display">
                    {{ $page.props.data.banner.banner_gallery.title }}
                </h1>
                <p class="body-1 font-beau">
                    {{ $page.props.data.banner.banner_gallery.description }}
                </p>
            </div>
        </div>
    </Banner>

    <section class="relative bg-gray-warm-100">
        <div class="absolute top-0 left-0">
            <JPicture
                src="/assets/images/bg-mask-resource.webp"
                alt="background mask resource"
                class="w-full h-full object-contain"
            />
        </div>
        <div class="relative md:py-12 xl:py-20 py-8">
            <div class="container space-y-8">
                <div class="w-full flex items-center gap-x-3 pb-4 border-b border-b-[#B0B0B4]">
                    <p class="body-1 font-normal font-beau text-black-fks">Filter by</p>
                    <div
                        @click="applyFilter('all')"
                        :class="selectedFilter.id === 'all' ? 'border-green-fks' : ''"
                        class="border-2"
                    >
                        <JPicture src="/assets/images/funky.png" alt="" class="w-[26px] h-[26px] cursor-pointer" />
                    </div>
                    <div class="flex flex-wrap gap-3">
                        <div
                            v-for="(tag, index) in courses"
                            :key="index"
                            @click="applyFilter(tag)"
                            :class="tag.id === selectedFilter.id ? 'border-green-fks' : ''"
                            class="border-2"
                        >
                            <JPicture
                                v-if="tag.icon.url || '/assets/images/cover.jpg'"
                                :src="tag.icon.url || tag.image?.url"
                                :alt="tag.icon.alt"
                                class="w-[26px] h-[26px] cursor-pointer"
                            />
                        </div>
                    </div>
                </div>
                <div
                    class="grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-x-3 md:gap-x-4 xl:gap-x-6 gap-y-4 md:gap-y-6 xl:gap-y-8"
                >
                    <div
                        v-for="(itemGalleryCol, indexGalleryCol) in galleryCol"
                        :key="indexGalleryCol"
                        class="space-y-3 md:space-y-4 xl:space-y-6"
                    >
                        <div
                            v-for="(resource, index) in itemGalleryCol"
                            :key="index"
                            class="w-full group"
                            @click="openModal(resource)"
                        >
                            <div class="w-full rounded-3xl border-[6px] border-white relative group">
                                <div
                                    v-if="selectedFilter?.icon?.url"
                                    class="absolute top-0 left-0 bg-white rounded-br-[20px] flex items-center gap-x-2 pt-3 px-4 pb-[6px] z-[100]"
                                >
                                    <img :src="selectedFilter?.icon?.url" class="w-[28px] h-[28px] rounded-full" />
                                    <p class="label-2 text-gray-warm-700 font-medium font-beau">
                                        {{ selectedFilter?.title }}
                                    </p>
                                </div>
                                <div class="rounded-3xl overflow-hidden relative">
                                    <img
                                        :src="resource.image.url"
                                        :alt="resource.image.alt"
                                        class="w-full h-auto object-cover lg:group-hover:scale-110 duration-300 ease-in-out"
                                    />
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-span-full">
                        <Pagination
                            :total="filteredResources.length"
                            :perPage="perPage"
                            :currentPage="currentPage"
                            @page-changed="changePage"
                        />
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Modal -->
    <div
        v-if="isModalOpen"
        class="fixed inset-0 bg-black-fks bg-opacity-80 z-[1001] flex items-center justify-center"
        @click.self="closeModal"
    >
        <div class="relative overflow-y-auto max-w-[1000px] w-full h-[90vh] flex flex-col justify-center">
            <!-- Close Button -->
            <button
                class="absolute top-3 right-3 text-green-fks w-10 h-10 lg:hover:bg-green-fks lg:hover:text-black-fks duration-300 ease-in-out rounded-full flex items-center justify-center bg-red-fks"
                @click="closeModal"
            >
                <CloseModal />
            </button>
            <!-- Modal Image -->
            <img :src="modalImage.image.url" :alt="modalImage.image.alt" class="w-full h-auto object-contain" />

            <div class="space-y-1 mt-4">
                <div class="headline-3 font-bold text-white font-display">{{ modalImage.title }}</div>
                <div class="body-1 text-white" v-html="modalImage.description"></div>
            </div>
        </div>
    </div>
</template>

<script>
import CloseModal from '@/Components/Icon/CloseModal.vue'
import Pagination from '@/Components/Paginate.vue'

export default {
    components: { Pagination, CloseModal },
    props: ['courses', 'products'],
    data() {
        return {
            selectedFilter: {
                id: 'all',
                products: this.products,
            },
            currentPage: 1,
            perPage: 15,
            galleryCol: [], // Thêm vào data
            isModalOpen: false,
            modalImage: {},
        }
    },
    computed: {
        filteredResources() {
            if (!this.selectedFilter) {
                return this.products
            }
            return this.selectedFilter.products
        },
        paginatedResources() {
            const start = (this.currentPage - 1) * this.perPage
            const end = start + this.perPage
            return this.filteredResources.slice(start, end)
        },
        totalPages() {
            return Math.ceil(this.filteredResources.length / this.perPage)
        },
    },
    watch: {
        // Theo dõi sự thay đổi của paginatedResources
        paginatedResources: {
            immediate: true,
            handler(newValue) {
                if (window.screen.width >= 768) {
                    this.galleryCol = this.groupItemByColumn(newValue, 3)
                } else {
                    this.galleryCol = this.groupItemByColumn(newValue, 2)
                }
            },
        },
    },
    // Thêm mounted để khởi tạo ban đầu
    mounted() {
        // Thêm event listener cho resize
        window.addEventListener('resize', this.handleResize)
        // Khởi tạo galleryCol ban đầu
        this.handleResize()
    },
    // Cleanup event listener
    beforeDestroy() {
        window.removeEventListener('resize', this.handleResize)
    },
    methods: {
        handleResize() {
            if (window.screen.width >= 768) {
                this.galleryCol = this.groupItemByColumn(this.paginatedResources, 3)
            } else {
                this.galleryCol = this.groupItemByColumn(this.paginatedResources, 2)
            }
        },
        groupItemByColumn(items = [], count = 3) {
            if (items.length === 0 || count <= 0) return []
            const numRows = Math.ceil(items.length / count)
            let finalCols = []

            for (let col = 0; col < count; col++) {
                let colData = []
                for (let row = 0; row < numRows; row++) {
                    const dataIndex = col + row * count
                    if (dataIndex < items.length) {
                        colData.push({
                            ...items[dataIndex],
                            realIndex: window.screen.width >= 768 ? col + row * 3 : col + row * 2,
                        })
                    }
                }
                finalCols.push(colData)
            }

            return finalCols
        },
        applyFilter(course) {
            if (course === 'all') {
                return (this.selectedFilter = {
                    id: 'all',
                    products: this.products,
                })
            }
            this.selectedFilter = course
            this.currentPage = 1
        },
        changePage(page) {
            if (page > this.totalPages) {
                this.currentPage = 1
            } else if (page < 1) {
                this.currentPage = this.totalPages
            } else {
                this.currentPage = page
            }
        },
        openModal(obj) {
            this.modalImage = obj
            this.isModalOpen = true
            document.body.style.overflow = 'hidden'
        },
        closeModal() {
            this.isModalOpen = false
            this.modalImage = {}
            document.body.style.overflow = ''
        },
    },
}
</script>
