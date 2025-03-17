<template>
    <section>
        <Thumbnail
            title="Tài nguyên"
            color="#18191E"
            desc="Nơi lưu trữ tài nguyên về học thuật"
            image="/assets/images/resource/banner-resource.png"
        />
    </section>

    <section class="relative bg-gray-100">
        <div class="absolute inset-0">
            <JPicture src="/assets/images/bg-mask-resource.webp" alt="background mask resource" class="w-full h-full" />
        </div>
        <div class="relative xl:py-20">
            <div class="container grid grid-cols-12 gap-8">
                <div class="xl:col-span-3 col-span-full p-6 rounded-xl bg-white h-fit space-y-3">
                    <p class="body-1 font-normal font-beau text-black-fks">Filter by</p>
                    <div class="flex flex-wrap gap-3">
                        <div
                            class="w-fit rounded-[40px] px-[10px] h-[26px] cursor-pointer title-2 font-display text-black-fks font-bold"
                            :class="{
                                'bg-green-fks': selectedFilter === 'everything',
                                'bg-gray-warm-100 ': selectedFilter !== 'everything',
                            }"
                            @click="applyFilter('everything')"
                        >
                            Everything
                        </div>

                        <div
                            v-for="(tag, index) in data.filter"
                            :key="index"
                            class="w-fit rounded-[40px] px-[10px] h-[26px] cursor-pointer title-2 font-display text-black-fks font-bold"
                            :class="{
                                'bg-green-fks': selectedFilter === tag,
                                'bg-gray-warm-100 ': selectedFilter !== tag,
                            }"
                            @click="applyFilter(tag)"
                        >
                            {{ tag }}
                        </div>
                    </div>
                </div>

                <div class="xl:col-span-9 col-span-full grid grid-cols-1 md:grid-cols-2 xl:grid-cols-3 gap-4">
                    <div
                        v-for="(resource, index) in filteredResources"
                        :key="index"
                        class="w-full p-3 bg-white rounded-3xl space-y-3"
                    >
                        <CardResources :item="resource" :isBorder="false" />
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script>
export default {
    props: ['categories', 'resources'],
    data() {
        return {
            data: {
                filter: ['2d', '3d', 'render'],
                groupedResources: {
                    '2d': [
                        {
                            image: {
                                url: '/assets/images/home/bg-resources.png',
                                alt: 'Description for image 1',
                            },
                            titleButton: 'Tải miễn phí',
                            tag: '2d',
                            vip: false,
                            title: 'Tuyển tập sách dành cho Cảnh Quan 1',
                            type: '2d',
                        },
                        {
                            image: {
                                url: '/assets/images/home/bg-resources.png',
                                alt: 'Description for image 1',
                            },
                            titleButton: 'Tải miễn phí',
                            tag: '2d',
                            vip: false,
                            title: 'Tuyển tập sách dành cho Cảnh Quan 1',
                            type: '2d',
                        },
                        {
                            image: {
                                url: '/assets/images/home/bg-resources.png',
                                alt: 'Description for image 1',
                            },
                            titleButton: 'Tải miễn phí',
                            tag: '2d',
                            vip: false,
                            title: 'Tuyển tập sách dành cho Cảnh Quan 1',
                            type: '2d',
                        },
                        {
                            image: {
                                url: '/assets/images/home/bg-resources.png',
                                alt: 'Description for image 1',
                            },
                            titleButton: 'Tải miễn phí',
                            tag: '2d',
                            vip: false,
                            title: 'Tuyển tập sách dành cho Cảnh Quan 1',
                            type: '2d',
                        },
                    ],
                    '3d': [
                        {
                            image: {
                                url: '/assets/images/home/bg-resources.png',
                                alt: 'Description for image 2',
                            },
                            titleButton: '200.000 đ',
                            tag: '3d',
                            vip: true,
                            title: 'Tuyển tập sách dành cho Cảnh Quan 2',
                            type: '3d',
                        },
                        {
                            image: {
                                url: '/assets/images/home/bg-resources.png',
                                alt: 'Description for image 2',
                            },
                            titleButton: '200.000 đ',
                            tag: '3d',
                            vip: true,
                            title: 'Tuyển tập sách dành cho Cảnh Quan 2',
                            type: '3d',
                        },
                        {
                            image: {
                                url: '/assets/images/home/bg-resources.png',
                                alt: 'Description for image 2',
                            },
                            titleButton: '200.000 đ',
                            tag: '3d',
                            vip: true,
                            title: 'Tuyển tập sách dành cho Cảnh Quan 2',
                            type: '3d',
                        },
                        {
                            image: {
                                url: '/assets/images/home/bg-resources.png',
                                alt: 'Description for image 2',
                            },
                            titleButton: '200.000 đ',
                            tag: '3d',
                            vip: true,
                            title: 'Tuyển tập sách dành cho Cảnh Quan 2',
                            type: '3d',
                        },
                    ],
                    render: [
                        {
                            image: {
                                url: '/assets/images/home/bg-resources.png',
                                alt: 'Description for image 3',
                            },
                            titleButton: 'Tải miễn phí',
                            tag: 'render',
                            vip: false,
                            title: 'Tuyển tập sách dành cho Cảnh Quan 3',
                            type: 'render',
                        },
                        {
                            image: {
                                url: '/assets/images/home/bg-resources.png',
                                alt: 'Description for image 3',
                            },
                            titleButton: 'Tải miễn phí',
                            tag: 'render',
                            vip: false,
                            title: 'Tuyển tập sách dành cho Cảnh Quan 3',
                            type: 'render',
                        },
                        {
                            image: {
                                url: '/assets/images/home/bg-resources.png',
                                alt: 'Description for image 3',
                            },
                            titleButton: 'Tải miễn phí',
                            tag: 'render',
                            vip: false,
                            title: 'Tuyển tập sách dành cho Cảnh Quan 3',
                            type: 'render',
                        },
                        {
                            image: {
                                url: '/assets/images/home/bg-resources.png',
                                alt: 'Description for image 3',
                            },
                            titleButton: 'Tải miễn phí',
                            tag: 'render',
                            vip: false,
                            title: 'Tuyển tập sách dành cho Cảnh Quan 3',
                            type: 'render',
                        },
                    ],
                },
            },
            selectedFilter: 'everything',
        }
    },
    computed: {
        filteredResources() {
            if (this.selectedFilter === 'everything') {
                return Object.values(this.data.groupedResources).flat()
            }

            return this.data.groupedResources[this.selectedFilter] || []
        },
    },
    methods: {
        applyFilter(tag) {
            this.selectedFilter = tag
        },
    },
}
</script>
