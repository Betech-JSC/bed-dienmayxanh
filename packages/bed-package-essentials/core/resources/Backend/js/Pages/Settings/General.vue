<template layout>
    <Head :title="tt('models.titles.setting')" />
    <WrapSetting>
        <Form v-model="formData" :config="{ canDestroy: false, reverse: true, addGrid: false, resource: 'settings' }">
            <template #default="{ form }">
                <div class="card">
                    <div class="card-body">
                        <Field
                            v-model="form.general_business_name"
                            :field="{
                                name: 'general_business_name',
                            }"
                        />
                        <Field
                            v-model="form.general_site_name"
                            :field="{
                                name: 'general_site_name',
                            }"
                        />
                        <Field
                            v-model="form.general_email"
                            :field="{
                                label :'Email',
                                name: 'general_email',
                            }"
                        />
                        <Field
                            v-model="form.general_address"
                            :field="{
                                label :'Địa chỉ',
                                name: 'general_address',
                            }"
                        />
                        <Field
                            v-model="form.general_phone"
                            :field="{
                                label :'Phone',
                                name: 'general_phone',
                            }"
                        />
                    </div>
                </div>
                <SeoFields
                    :modelValue="form"
                    @update:modelValue="form = $event"
                    :config="{
                        hiddenFields: ['seo_slug'],
                    }"
                />
                <Field class="hidden" disabled v-model="form.id" :field="{ default: 'general' }" />
            </template>
        </Form>
    </WrapSetting>
</template>
<script>
import WrapSetting from '@Core/Components/WrapSetting.vue'
export default {
    components: { WrapSetting },
    props: ['item', 'schema'],
    data() {
        return {
            formData: this.item,
        }
    },
}
</script>
