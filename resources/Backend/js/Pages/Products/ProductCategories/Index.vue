<template>
    <div class="grid grid-cols-12 gap-3">
        <div class="col-span-5 p-3 bg-white rounded shadow">
            <Field
                v-if="categories && categories.length"
                :field="{
                    key: 'ProductCategory',
                    label: false,
                    type: 'tree',
                    maxLevel: 4,
                    expandDefaultLevel: 1,
                    keyBy: 'id',
                    labelBy: 'title',
                    childrenBy: 'nodes',
                    options: categories,
                    draggable: false,
                }"
            />
            <hr class="my-8" />
            <div>
                <Button class="btn-primary" :label="tt('models.form.save')" size="sm" @click="initForm()" />
            </div>
        </div>
        <div class="col-span-7 py-3">
            <Form
                :form="form"
                :config="{
                    addGrid: false,
                    showActions: false,
                }"
                :rules="rules"
            >
                <div class="card">
                    <div class="card-body">
                        <Field
                            v-model="form.status"
                            :field="{
                                type: 'radio_list',
                                name: 'status',
                                label: 'Trạng thái',
                                options: schema.columns.status.list,
                            }"
                        />
                        <Field
                            v-model="form.parent_id"
                            :field="{
                                label: 'Menu cha',
                                type: 'dropdown',
                                options: parentCategories,
                                emptyLabel: '-- Danh mục gốc --',
                                labelBy: 'title',
                            }"
                        />
                        <Field
                            v-if="form.id"
                            v-model="form.id"
                            :disabled="true"
                            :field="{
                                label: 'ID',
                            }"
                        />
                        <Field
                            v-model="form.title"
                            :field="{
                                type: 'text',
                                name: 'title',
                                label: 'Tên danh mục',
                            }"
                        />
                        <small v-if="form.id">
                            <span v-for="(item, locale) in form.url" :key="locale">
                                {{ locale }}: <a :href="item" target="_blank" class="link">{{ decodeURI(item) }}</a
                                ><br />
                            </span>
                        </small>
                        <Field
                            v-model="form.position"
                            :field="{
                                name: 'position',
                                label: 'Số thứ tự',
                                type: 'number',
                            }"
                        />
                        <Field
                            v-model="form.description"
                            :field="{
                                label: 'Mô tả',
                                type: 'richtext',
                            }"
                        />
                        <div class="card">
                            <div class="card-body">
                                <Field
                                    v-model="form.image"
                                    :field="{
                                        type: 'file_upload',
                                        name: 'image',
                                    }"
                                />
                                <Field
                                    v-model="form.image_mobile"
                                    :field="{
                                        type: 'file_upload',
                                        name: 'image_mobile',
                                    }"
                                />
                            </div>
                        </div>
                    </div>
                </div>

                <div class="card">
                    <div class="card-body">
                        <Field
                            v-model="form.products"
                            :field="{
                                type: 'select_multiple',
                                name: 'products',
                                keyBy: 'id',
                                options: products,
                            }"
                        />
                    </div>
                </div>

                <SeoFields :modelValue="form" @update:modelValue="form = $event" />

                <div class="flex mt-6">
                    <Button :label="tt('models.form.save')" class="btn-primary" @click="store()" />
                    <Button
                        v-if="form.id"
                        variant="link-danger"
                        label="Xóa"
                        class="ml-auto btn-danger-link"
                        @click="destroy()"
                    />
                </div>
            </Form>
        </div>
    </div>
</template>

<script>
export default {
    props: ['item', 'schema'],

    data() {
        return {
            form: {},
            categories: [],
            parentCategories: [],
            products: [],
            options: [],
        }
    },

    watch: {
        item() {
            this.initForm()
        },
    },

    created() {
        this.getData()
        this.initForm()
    },

    mounted() {
        this.$bus.on('treeSelectedItemProductCategory', (item) => {
            this.selectedItem(item)
        })
    },

    beforeUnmount() {
        this.$bus.off('treeSelectedItemProductCategory')
    },

    methods: {
        getData() {
            const locale = this.getCurrentLocale()
            this.$axios
                .post(this.route(`admin.helper.model-data`, { locale }), {
                    model: 'App\\Models\\Product\\ProductCategory',
                    method: 'getRoot',
                })
                .then((res) => {
                    this.categories = res.data

                    if (this.route().params.id) {
                        const defaultItem = res.data.find((x) => x.id == this.route().params.id)
                        defaultItem && this.selectedItem(defaultItem)
                    }
                })
        },
        getProducts(categoryId) {
            const locale = this.getCurrentLocale()
            this.$axios
                .post(this.route(`admin.helper.model-data`, { locale, categoryId }), {
                    model: 'App\\Models\\Product\\Product',
                    method: 'getRootCategory',
                })
                .then((res) => {
                    this.products = res.data
                })
        },
        getOptions() {
            const locale = this.getCurrentLocale()
            this.$axios
                .post(this.route(`admin.helper.model-data`, { locale }), {
                    model: 'App\\Models\\Option\\Option',
                    method: 'getParentNodes',
                })
                .then((res) => {
                    this.options = res.data
                })
        },
        getParentCategories() {
            const locale = this.getCurrentLocale()
            this.$axios
                .post(this.route(`admin.helper.model-data`, { locale }), {
                    model: 'App\\Models\\Product\\ProductCategory',
                    method: 'getFlattenCategories',
                })
                .then((res) => {
                    this.parentCategories = res.data
                })
        },
        getDataInCategory(categoryId) {
            const locale = this.getCurrentLocale()
            this.$axios
                .post(this.route(`admin.helper.model-data`, { locale, id: categoryId }), {
                    model: 'App\\Models\\Product\\ProductCategory',
                    method: 'getDataDetail',
                })
                .then((res) => {
                    this.form.products = res.data.products ?? []
                    this.form.options = res.data.options ?? []
                })
        },
        store() {
            this.form.parent_id = this.form.parent_id == null ? 0 : this.form.parent_id
            this.$inertia.post(
                this.route(`admin.product-categories.store`, {
                    id: this.form?.id,
                }),
                this.form,
                { onSuccess: () => this.getData() }
            )
        },
        destroy() {
            if (confirm('Bạn chắc chắn muốn xoá đối tượng này?')) {
                const url = this.route(`admin.product-categories.destroy`, {
                    id: this.form.id,
                })
                this.$inertia.post(url, {}, { onSuccess: () => this.getData() })
            }
        },
        selectedItem(item) {
            this.form = {
                options: [],
                products: [],
                ...this.form,
                ...item,
                banner: this.form.banner ?? [],
                banner_mobile: this.form.banner_mobile ?? [],
            }

            if (this.form.id) {
                this.getProducts(this.form.id)
                this.getOptions()
                this.getDataInCategory(this.form.id)
                this.getParentCategories()
            } else {
                this.products = []
                this.options = []
                this.parentCategories = []
            }
        },
        initForm() {
            this.form = this.$inertia.form({
                options: [],
                products: [],
                ...this.item,
            })
            this.form.status = this.form.status ?? 'ACTIVE'
            this.form.view_count = this.form.view_count ?? 0
            this.form.is_home = this.form.is_home ?? false
            this.form.is_hot = this.form.is_hot ?? false
            this.form.is_medicine = this.form.is_medicine ?? false
            this.form.is_featured = this.form.is_featured ?? false
            this.form.banner = this.form.banner ?? []
            this.form.banner_mobile = this.form.banner_mobile ?? []
        },
    },
}
</script>
<style lang="scss">
.multiselect__tags {
    @apply max-w-[100%];
}
</style>
