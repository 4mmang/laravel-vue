<script setup>
import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout.vue';
import DangerButton from "@/Components/DangerButton.vue";
import { Head, useForm } from '@inertiajs/vue3';
import { ref, onMounted } from 'vue';
import axios from 'axios';
import EditButton from '@/Components/EditButton.vue';

const users = ref([]);
const form = useForm({});

const deleteUser = async (id) => {
    if (confirm("Are you sure you want to move this to trash " + id)) {
        try {
            await axios.delete(`/api/users/${id}`);
            users.value = users.value.filter((user) => user.id !== id);
        } catch (error) {
            console.error("Failed to delete user:", error);
        }
    }
};

onMounted(async () => {
    try {
        const response = await axios.get('/api/users');

        users.value = response.data.data;
    } catch (error) {
        console.error('Failed to fetch users:', error);
    }
});
</script>


<template>

    <Head title="Dashboard" />

    <AuthenticatedLayout>
        <template #header>
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">Dashboard</h2>
        </template>

        <div class="py-12">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6 text-gray-900">
                        <table class="table-auto text-center w-full border border-gray-300">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="border text-center px-4 py-2">No</th>
                                    <th class="border text-center px-4 py-2">Name</th>
                                    <th class="border text-center px-4 py-2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr v-for="(user, index) in users" :key="user.id" class="hover:bg-gray-50">
                                    <td class="border px-4 py-2">{{ index + 1 }}</td>
                                    <td class="border px-4 py-2">{{ user.name }}</td>
                                    <td class="border px-4 py-2">
                                        <EditButton :href="`users/${user.id}/edit`"
                                            class="ml-2 py-3 rounded my-auto text-white bg-red-500" />
                                        <DangerButton class="ml-2 py-3 rounded my-auto text-white bg-red-500" @click="
                                            deleteUser(
                                                user.id
                                            )
                                            ">
                                            Delete
                                        </DangerButton>
                                    </td>
                                </tr>
                            </tbody>

                        </table>
                    </div>
                </div>
            </div>
        </div>
    </AuthenticatedLayout>
</template>
