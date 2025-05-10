<script setup>
import InputLabel from '@/Components/InputLabel.vue';
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import { Head, useForm, usePage } from '@inertiajs/vue3';
import TextInput from '@/Components/TextInput.vue';
import InputError from '@/Components/InputError.vue';
import PrimaryButton from '@/Components/PrimaryButton.vue';

const props = defineProps({
    user: Object,
})

const form = useForm({
    name: props.user.name,
    email: props.user.email,
})

const submit = () => {
    form.put(`/users/${props.user.id}`)
}

const page = usePage()

</script>
<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Edit Data User</h2>
        </template>

        <div class="w-full px-14 mt-5">

            <div v-if="page.props.flash && page.props.flash.message" class="text-green-500 font-semibold">
                {{ page.props.flash.message }} dsadada
            </div>

            <form @submit.prevent="submit">
                <div class="px-5">
                    <InputLabel for="name">Name</InputLabel>
                    <TextInput v-model="form.name" class="w-1/3 mt-1" id="name" autofocus />
                    <InputError class="mt-2" :message="form.errors.name" />
                    <InputLabel for="email" class="mt-3">Email</InputLabel>
                    <TextInput v-model="form.email" class="w-1/3 mt-1" id="email" />
                    <InputError class="mt-2" :message="form.errors.email" />
                    <div>
                        <PrimaryButton class="mt-5" type="submit">
                            Update
                        </PrimaryButton>
                    </div>
                </div>
            </form>
        </div>
    </AuthenticatedLayout>
</template>