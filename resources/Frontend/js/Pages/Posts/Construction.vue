<template>
    <main class="bg-gray-100">
        <section class="pt-[84px] md:pt-[100px] lg:pt-[120px] xl:pt-[160px] pb-10 md:pb-14 xl:pb-20">
            <div class="container">
                <div class="grid grid-cols-12 gap-y-4 md:gap-y-6 xl:gap-y-8 md:gap-x-6 xl:gap-x-10">
                    <div
                        class="xl:col-span-8 xl:col-start-3 space-y-3 text-center md:col-span-10 md:col-start-2 col-span-full"
                    >
                        <div
                            class="w-fit px-[10px] rounded-full bg-[#2F49D9] title-3 font-bold text-white font-display mx-auto"
                        >
                            {{ post.category?.title }}
                        </div>
                        <h1 class="display-3 font-bold font-display text-black-fks">
                            {{ post.title }}
                        </h1>
                        <div class="body-1 text-black-fks font-beau">{{ post.description }}</div>
                    </div>
                    <div class="col-span-full grid grid-cols-4 gap-[24px]">
                        <div v-for="(item, index) in post.images" class="col-span-2 md:col-span-1">
                            <div class="aspect-w-2 aspect-h-1">
                                <JPicture
                                    :src="item?.url || '/assets/images/cover.webp'"
                                    :alt="item?.alt || item.title"
                                    class="object-cover w-full h-full"
                                />
                            </div>
                        </div>
                    </div>
                    <div class="col-span-full md:col-span-8 lg:col-span-9 xl:col-span-7">
                        <div class="prose" v-html="post.content"></div>
                    </div>
                </div>
            </div>
        </section>
    </main>
</template>

<script>
export default {
    props: ['related_posts', 'post'],
    components: {},
    data() {
        const homeBreadcrumb = { name: 'Trang chủ', url: '/' }
        let breadcrumbs = [homeBreadcrumb]

        if (this.post.type === 'POST') {
            breadcrumbs.push(
                {
                    name: this.post.category?.title,
                    url: this.route('posts.categories', {
                        categorySlug: this.post.category?.slug,
                    }),
                },
                { name: this.post.title }
            )
        }

        return { breadcrumbs, activeText: '', collapseActive: false }
    },
    methods: {
        renderTitle(item) {
            switch (item.type) {
                case 'SERVICE':
                    return 'Dịch vụ'

                case 'POST':
                    return item.category?.title
                case 'ADVISER':
                    return 'Cố vấn'
                default:
                    break
            }
        },
    },

    mounted() {
        window.addEventListener('scroll', this.handleScroll)
    },
}
</script>
<style lang="scss" scoped></style>
