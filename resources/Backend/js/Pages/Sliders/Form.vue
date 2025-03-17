<template layout>
    <Form v-model="formData">
        <template #default="{ form }">
            <div class="card">
                <div class="card-header">{{ tt('models.setting.general_information') }}</div>
                <div class="card-body">
                    <Field
                        v-model="form.title"
                        :field="{
                            type: 'text',
                            name: 'title',
                            label: 'Tiêu đề',
                            size: 'sm',
                        }"
                    />
                    <Field
                        v-model="form.description"
                        :field="{
                            type: 'textarea',
                            name: 'description',
                            label: 'Mô tả',
                        }"
                    />
                    <Field
                        v-model="form.image"
                        :field="{
                            type: 'file_upload',
                            name: 'image',
                            label: 'Hình desktop',
                        }"
                    />
                    <!-- <Field
                        v-model="form.image_mobile"
                        :field="{
                            type: 'file_upload',
                            name: 'image_mobile',
                            label: 'Hình mobile',
                        }"
                    /> -->
                    <Field
                        v-model="form.is_video"
                        :field="{
                            type: 'checkbox',
                            name: 'is_video',
                            label: 'Video',
                        }"
                    />
                    <Field
                        v-if="form.is_video"
                        v-model="form.link"
                        :field="{
                            type: 'text',
                            name: 'link',
                            label: 'Link',
                        }"
                    />
                </div>
            </div>
        </template>
        <template #aside="{ form }">
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
                        v-model="form.position_display"
                        :field="{
                            type: 'radio_list',
                            name: 'position_display',
                            label: 'Vị trí hiển thị',
                            options: position_display,
                        }"
                    />
                </div>
            </div>
        </template>
    </Form>
</template>
<script>
export default {
    props: ['item', 'schema', 'data'],
    data() {
        return {
            formData: {
                ...this.item,
                target: this.item.target ?? '_self',
            },
            position_display: this.data.slider.position_display,
        }
    },

    watch: {
        item() {
            this.formData = this.item
        },
    },
}
</script>
