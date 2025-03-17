<template>
    <section class="pb-[30px]">
        <Banner
            v-if="$page.props.data.banner.banner_about_1"
            :image="$page.props.data.banner.banner_about_1.image.url"
            :imageMobile="$page.props.data.banner.banner_about_1.image_mobile.url"
            :alt="$page.props.data.banner.banner_about_1.title"
        >
            <div>
                <div class="space-y-3 max-w-[470px] w-full text-white">
                    <h1 class="display-2 font-display uppercase">
                        {{ $page.props.data.banner.banner_about_1.title }}
                    </h1>
                    <p class="body-1 font-beau">
                        {{ $page.props.data.banner.banner_about_1.description }}
                    </p>
                </div>
            </div>
        </Banner>

        <section class="lg:py-20 py-10 bg-white relative overflow-hidden">
            <div class="absolute left-0 bottom-0 h-[800px] aspect-square">
                <img src="/assets/images/about/mask.png" />
            </div>
            <div class="container xl:space-y-[120px] lg:space-y-16 space-y-10">
                <div class="grid grid-cols-2 items-center xl:gap-x-[142px] gap-x-20 max-lg:gap-y-8">
                    <div class="lg:col-span-1 col-span-full">
                        <div class="lg:h-[420px] md:h-[450px] h-[280px] rounded-3xl overflow-hidden">
                            <img src="/assets/images/about/housefunky.png" class="object-cover w-full h-full" />
                        </div>
                    </div>
                    <div class="lg:col-span-1 col-span-full space-y-6">
                        <p class="headline-1 text-gray-90 font-bold font-display">NGÔI NHÀ TĂNG ĐỘNG FUNKY</p>
                        <p class="body-0 text-gray-warm-700 font-normal font-beau">
                            Chào mừng bạn đến với Funky Style – vùng đất sáng tạo dành cho những kiến trúc sư trẻ tương
                            lai. Funky Style là ngôi nhà chuyên đào tạo các phần mềm đồ họa và kỹ năng vẽ tay trong lĩnh
                            vực kiến trúc, mang đến phương pháp học tập độc đáo kết hợp giữa
                            <span class="font-bold">sáng tạo, tư duy thiết kế,</span> và
                            <span class="font-bold"> ứng dụng thực tế</span> trong từng sản phẩm.
                        </p>
                    </div>
                </div>
                <div class="grid grid-cols-2 items-center lg:gap-x-[142px] gap-y-8">
                    <div class="col-span-full lg:hidden block">
                        <div class="lg:h-[420px] md:h-[450px] h-[280px] rounded-3xl overflow-hidden">
                            <img src="/assets/images/about/mission.png" class="object-cover w-full h-full" />
                        </div>
                    </div>
                    <div class="lg:col-span-1 col-span-full space-y-6">
                        <p class="headline-1 text-gray-90 font-bold font-display">Sứ Mệnh Của Chúng Tôi</p>
                        <p class="body-0 text-gray-warm-700 font-normal font-beau">
                            Tại Funky, chúng mình mang trong mình sứ mệnh khai phá tiềm năng sáng tạo và đề cao giá trị
                            ứng dụng trong mỗi khía cạnh kiến trúc và nghệ thuật. Funky tin rằng mỗi học viên đều mang
                            đến những góc nhìn độc đáo và tiếp cận một phong cách học tập linh hoạt, cá nhân hóa để tự
                            tin vững bước lên những nấc thang trên con đường chinh phục Kiến trúc và Nghệ thuật
                        </p>
                    </div>
                    <div class="lg:col-span-1 col-span-full max-lg:hidden block">
                        <div class="lg:h-[420px] md:h-[450px] h-[280px] rounded-3xl overflow-hidden">
                            <img src="/assets/images/about/mission.png" class="object-cover w-full h-full" />
                        </div>
                    </div>
                </div>
                <div class="space-y-6">
                    <p class="display-3 font-bold font-display text-black-fks text-center">Triết lý giáo dục</p>
                    <div class="grid grid-cols-3">
                        <div v-for="(item, index) in about" :key="index" class="col-span-full md:col-span-1 space-y-6">
                            <img
                                :src="item.image.url"
                                :alt="item.image.alt"
                                class="picture-cover w-[200px] h-[200px] mx-auto"
                            />
                            <div class="space-y-1 px-4 py-6 text-center">
                                <h1 class="title-1 font-display font-bold text-black-fks text-center">
                                    {{ item.title }}
                                </h1>
                                <p class="body-1 text-gray-warm-700 font-beau font-normal">
                                    {{ item.desc }}
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section v-if="$page.props.data.banner.banner_about_2">
            <Thumbnail
                :title="$page.props.data.banner.banner_about_2.title"
                color=""
                :desc="$page.props.data.banner.banner_about_2.description"
                :image="$page.props.data.banner.banner_about_2.image.url"
                :check="true"
            />
        </section>

        <section v-if="members && members.length > 0" class="lg:pt-[90px] pt-10 bg-white relative overflow-hidden">
            <div class="absolute left-0 top-1/2 -translate-y-1/2 w-[500px]">
                <img src="/assets/images/about/mask.png" class="w-full h-full" />
            </div>
            <div class="relative">
                <div class="container">
                    <div class="xl:flex xl:items-start xl:gap-x-8 max-xl:space-y-8">
                        <div class="xl:max-w-[260px] w-full">
                            <p class="display-3 font-bold font-display text-black-fks">Đội ngũ giảng viên tại funky</p>
                        </div>
                        <div class="w-full hidden md:grid lg:grid-cols-3 grid-cols-1 gap-6">
                            <div
                                class="rounded-3xl group overflow-hidden"
                                v-for="(item, index) in members"
                                :key="index"
                            >
                                <div class="w-full h-[340px] relative">
                                    <JPicture
                                        :src="item.image?.url || '/assets/images/cover.jpg'"
                                        class="w-full h-full object-cover object-fit"
                                    />
                                    <div
                                        class="list-disc py-3 px-2 body-2 text-white font-normal font-beau absolute translate-x-full w-full h-full bg-[#2F49D9E5] top-0 left-0 group-hover:translate-x-0 duration-300"
                                    >
                                        <div v-html="item.content"></div>
                                    </div>
                                </div>
                                <div class="px-1 py-3 bg-[#F4EFE2] text-center">
                                    <p
                                        class="title-1 font-bold font-display text-black-fks group-hover:text-[#2F49D9] duration-300"
                                    >
                                        {{ item.title }}
                                    </p>
                                    <p class="body-1 font-beau font-normal text-gray-warm-700">
                                        {{ item.description }}
                                    </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="pl-4 pt-8 md:hidden">
                    <JamSlider
                        :config="{
                            draggable: true,
                            prevNextButtons: false,
                            autoPlay: false,
                        }"
                        class="relative"
                    >
                        <div
                            class="rounded-3xl group overflow-hidden w-[320px] mr-4"
                            v-for="(item, index) in members"
                            :key="index"
                        >
                            <div class="w-full h-[340px] relative">
                                <JPicture
                                    :src="item.image?.url || '/assets/images/cover.jpg'"
                                    class="w-full h-full object-cover object-fit"
                                />
                                <div
                                    class="list-disc py-3 px-2 body-2 text-white font-normal font-beau absolute translate-x-full w-full h-full bg-[#2F49D9E5] top-0 left-0 group-hover:translate-x-0 duration-300"
                                >
                                    <div v-html="item.content"></div>
                                </div>
                            </div>
                            <div class="px-1 py-3 bg-[#F4EFE2] text-center">
                                <p
                                    class="title-1 font-bold font-display text-black-fks group-hover:text-[#2F49D9] duration-300"
                                >
                                    {{ item.title }}
                                </p>
                                <p class="body-1 font-beau font-normal text-gray-warm-700">
                                    {{ item.description }}
                                </p>
                            </div>
                        </div>
                    </JamSlider>
                </div>
            </div>
            <div
                v-if="$page.props.data.learning_env && $page.props.data.learning_env.length > 0"
                class="md:pt-[98px] pt-[32px] bg-white"
            >
                <div class="container">
                    <div class="space-y-6 text-center">
                        <p class="display-2 font-bold text-gray-warm-900 font-display">môi trường học</p>
                        <p class="body-1 font-beau text-gray-warm-800 font-normal">
                            Funky là một cộng đồng truyền cảm hứng nơi mọi người được kết nối, chia sẻ kiến thức, và
                            cùng
                            <br />
                            nhau khám phá những khía cạnh mới trong nghệ thuật và kiến trúc.
                        </p>
                    </div>
                </div>
                <div class="mt-6">
                    <ActivitiesAbout :activity="$page.props.data.learning_env" />
                </div>
            </div>
            <div
                v-if="$page.props.data.prizes && $page.props.data.prizes.length > 0"
                class="md:pt-[98px] pt-[32px] bg-white"
            >
                <div class="container">
                    <div class="space-y-6 text-center">
                        <p class="display-2 font-bold text-gray-warm-900 font-display">Giải thưởng</p>
                        <p class="body-1 font-beau text-gray-warm-800 font-normal">
                            Funky là một cộng đồng truyền cảm hứng nơi mọi người được kết nối, chia sẻ kiến thức, và
                            cùng
                            <br />
                            nhau khám phá những khía cạnh mới trong nghệ thuật và kiến trúc.
                        </p>
                    </div>
                </div>
                <div class="mt-6">
                    <ActivitiesAbout :activity="$page.props.data.prizes" />
                </div>
            </div>
        </section>
    </section>
</template>
<script>
import JamBreadcrumb from '@/Components/Jam/Breadcrumb.vue'
import CardBlog from '@/Components/CardBlog.vue'
import Banner from '@/Components/Banner.vue'

export default {
    props: ['posts', 'sliders'],
    components: {
        JamBreadcrumb,
        CardBlog,
    },
    computed: {
        members() {
            return this.$page.props.data.members || []
        },
    },
    data() {
        return {
            about: [
                {
                    title: this.tt('Sáng tạo bản sắc riêng'),
                    desc: 'Phong cách sáng tạo là không giới hạn, kết hợp xu hướng hiện đại và tôn trọng cá tính riêng,  khơi dậy tư duy độc lập và định hình bản sắc sáng tạo cá nhân',
                    image: {
                        url: '/assets/images/about/creative.png',
                        alt: 'Whether you have a team of 2 or 200, our shared team inboxes keep everyone on the same page and in the loop.',
                    },
                },
                {
                    title: this.tt('Tư duy đổi mới'),
                    desc: 'Xây dựng tư duy đổi mới qua các phương pháp, kết hợp lý thuyết học thuật và thực hành,  giúp học viên mở rộng tầm nhìn và nâng cao kỹ năng giải quyết vấn đề bền vững.',
                    image: {
                        url: '/assets/images/about/thinking.png',
                        alt: 'english flag',
                    },
                },
                {
                    title: this.tt('Ứng dụng thực tiễn'),
                    desc: 'Đón đầu công nghệ kỹ thuật tiên tiến, mở rộng tiềm năng ứng dụng trong kiến trúc và liên ngành, hỗ trợ phát triển nghề nghiệp hiệu quả và bền vững.',
                    image: {
                        url: '/assets/images/about/application.png',
                        alt: 'english flag',
                    },
                },
            ],
        }
    },
}
</script>
