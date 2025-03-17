<template>
    <span class="hidden">
        {{ $page.props.route.name }}
    </span>
    <Link
        v-if="can('admin.posts.index')"
        :href="route('admin.posts.index')"
        :class="{ active: isUrl('admin.posts.*') }"
        class="item"
    >
        <ph-newspaper-clipping-light />
        <span>{{ tt('models.table_list.posts') }}</span>
    </Link>
    <Link
        v-if="can('admin.contacts.index')"
        :href="route('admin.contacts.index')"
        :class="{ active: isUrl('admin.contacts.*') }"
        class="item"
    >
        <material-symbols:connect-without-contact />
        <span>{{ tt('models.table_list.contacts') }}</span>
        <span class="badge badge-danger" v-if="newContact">{{ newContact }}</span>
    </Link>
    <Link
        v-if="can('admin.contact-checkout-resources.index')"
        :href="route('admin.contact-checkout-resources.index')"
        :class="{ active: isUrl('admin.contact-checkout-resources.*') }"
        class="item"
    >
        <material-symbols:connect-without-contact />
        <span> Đơn hàng tài nguyên </span>
        <span class="badge badge-danger" v-if="newContactResource">{{ newContactResource }}</span>
    </Link>
    <Link
        v-if="can('admin.contact-checkout-courses.index')"
        :href="route('admin.contact-checkout-courses.index')"
        :class="{ active: isUrl('admin.contact-checkout-courses.*') }"
        class="item"
    >
        <material-symbols:connect-without-contact />
        <span> Đơn hàng khóa học </span>
        <span class="badge badge-danger" v-if="newContactCourse">{{ newContactCourse }}</span>
    </Link>
    <Link
        v-if="can('admin.post-categories.index')"
        :href="route('admin.post-categories.index')"
        :class="{ active: isUrl('admin.post-categories.*') }"
        class="item"
    >
        <bx:category />
        <span>{{ tt('models.table_list.post-categories') }}</span>
    </Link>
    <Link
        v-if="can('admin.course-categories.index')"
        :href="route('admin.course-categories.index')"
        :class="{ active: isUrl('admin.course-categories.*') }"
        class="item"
    >
        <bx:category />
        <span>{{ tt('models.table_list.course-categories') }}</span>
    </Link>
    <Link
        v-if="can('admin.resource-categories.index')"
        :href="route('admin.resource-categories.index')"
        :class="{ active: isUrl('admin.resource-categories.*') }"
        class="item"
    >
        <bx:category />
        <span>{{ tt('models.table_list.resource-categories') }}</span>
    </Link>

    <Link
        v-if="can('admin.services.index')"
        :href="route('admin.services.index')"
        :class="{ active: isUrl('admin.services.*') }"
        class="item"
    >
        <bx:category />
        <span>{{ tt('models.table_list.services') }}</span>
    </Link>
    <Link
        v-if="can('admin.members.index')"
        :href="route('admin.members.index')"
        :class="{ active: isUrl('admin.members.*') }"
        class="item"
    >
        <bx:category />
        <span>{{ tt('models.table_list.members') }}</span>
    </Link>
    <Link
        v-if="can('admin.feedback.index')"
        :href="route('admin.feedback.index')"
        :class="{ active: isUrl('admin.feedback.*') }"
        class="item"
    >
        <bx:category />
        <span>{{ tt('models.table_list.feedback') }}</span>
    </Link>
    <Link
        v-if="can('admin.learning-environments.index')"
        :href="route('admin.learning-environments.index')"
        :class="{ active: isUrl('admin.learning-environments.*') }"
        class="item"
    >
        <material-symbols:connect-without-contact />
        <span> Hình ảnh Môi trường học </span>
    </Link>
    <Link
        v-if="can('admin.prizes.index')"
        :href="route('admin.prizes.index')"
        :class="{ active: isUrl('admin.prizes.*') }"
        class="item"
    >
        <material-symbols:connect-without-contact />
        <span> Giải thưởng </span>
    </Link>
    <Link
        v-if="can('admin.products.index')"
        :href="route('admin.products.index')"
        :class="{ active: isUrl('admin.products.*') }"
        class="item"
    >
        <material-symbols:connect-without-contact />
        <span>{{ tt('models.table_list.products') }}</span>
    </Link>
    <Link
        v-if="can('admin.faqs.index')"
        :href="route('admin.faqs.index')"
        :class="{ active: isUrl('admin.faqs.*') }"
        class="item"
    >
        <material-symbols:connect-without-contact />
        <span>{{ tt('models.table_list.faqs') }}</span>
    </Link>
    <Link
        v-if="can('admin.courses.index')"
        :href="route('admin.courses.index')"
        :class="{ active: isUrl('admin.courses.*') }"
        class="item"
    >
        <material-symbols:connect-without-contact />
        <span>{{ tt('models.table_list.courses') }}</span>
    </Link>
    <Link
        v-if="can('admin.resources.index')"
        :href="route('admin.resources.index')"
        :class="{ active: isUrl('admin.resources.*') }"
        class="item"
    >
        <material-symbols:connect-without-contact />
        <span>{{ tt('models.table_list.resources') }}</span>
    </Link>
    <Link
        v-if="can('admin.sliders.index')"
        :href="route('admin.sliders.index')"
        :class="{ active: isUrl('admin.sliders.*') }"
        class="item"
    >
        <bi:sliders2 />
        <span>{{ tt('models.table_list.sliders') }}</span>
    </Link>
    <Link
        v-if="can('admin.policies.index')"
        :href="route('admin.policies.index')"
        :class="{ active: isUrl('admin.policies.*') }"
        class="item"
    >
        <material-symbols:policy-outline-sharp />
        <span>{{ tt('models.table_list.policies') }}</span>
    </Link>
</template>

<script>
export default {
    computed: {
        newContact() {
            return this.$page.props.data.new_contact_count
        },
        newContactResource() {
            return this.$page.props.data.new_contact_resource_count
        },
        newContactCourse() {
            return this.$page.props.data.new_contact_course_count
        },
    },
}
</script>
<style scoped>
.badge {
    @apply px-2 py-1 text-xs font-medium rounded;
}
.badge-success {
    @apply text-green-700 bg-green-200;
}
.badge-danger {
    @apply text-red-600 bg-red-200;
}
</style>
