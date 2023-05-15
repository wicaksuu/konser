<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";

defineProps({ errors: Object, datas: Object });
const form = useForm({
    email: "",
});

const submit = () => {
    form.post(route("order.store"));
};
</script>
<template>
    <div class="relative overflow-x-auto">
        <form @submit.prevent="submit">
            <div
                class="flex items-center justify-end px-4 pb-4 text-right sm:px-6"
            >
                <label for="email" class="sr-only">Search</label>
                <div class="relative mt-1">
                    <div
                        class="absolute inset-y-0 left-0 flex items-center pl-3 pointer-events-none"
                    >
                        <svg
                            class="w-5 h-5 text-gray-500"
                            aria-hidden="true"
                            fill="currentColor"
                            viewBox="0 0 20 20"
                            xmlns="http://www.w3.org/2000/svg"
                        >
                            <path
                                fill-rule="evenodd"
                                d="M8 4a4 4 0 100 8 4 4 0 000-8zM2 8a6 6 0 1110.89 3.476l4.817 4.817a1 1 0 01-1.414 1.414l-4.816-4.816A6 6 0 012 8z"
                                clip-rule="evenodd"
                            ></path>
                        </svg>
                    </div>
                    <input
                        type="email"
                        id="email"
                        v-model="form.email"
                        class="block p-2 pl-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-30 bg-gray-50 focus:ring-blue-500 focus:border-blue-500"
                        placeholder="Masukkan Email"
                        required
                    />
                </div>
                <div class="pl-3">
                    <PrimaryButton
                        :class="{ 'opacity-25': form.processing }"
                        :disabled="form.processing"
                    >
                        cari
                    </PrimaryButton>
                </div>
            </div>
        </form>
        <table class="w-full text-sm text-left text-gray-500">
            <thead class="text-xs text-gray-700 uppercase bg-slate-200">
                <tr>
                    <th scope="col" class="px-6 py-3">ID.</th>
                    <th scope="col" class="px-6 py-3">Email</th>
                    <th scope="col" class="px-6 py-3">Nama Depan</th>
                    <th scope="col" class="px-6 py-3">Nama Belakang</th>
                    <th scope="col" class="px-6 py-3">Telepon</th>
                    <th scope="col" class="px-6 py-3">Tiket</th>
                    <th scope="col" class="px-6 py-3">Status</th>
                </tr>
            </thead>
            <tbody>
                <tr v-if="!form.errors.datas || form.errors.datas.length === 0">
                    <td colspan="7" class="text-center py-4">
                        Mohon masukkan email
                    </td>
                </tr>
                <tr
                    class="bg-white border-b dark:border-gray-700"
                    v-for="(data, id) in form.errors.datas"
                    :key="id"
                >
                    <td class="px-6 py-4">{{ data.id }}</td>
                    <th
                        scope="row"
                        class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap"
                    >
                        {{ data.email }}
                    </th>
                    <td class="px-6 py-4">{{ data.first_name }}</td>
                    <td class="px-6 py-4">{{ data.last_name }}</td>
                    <td class="px-6 py-4">{{ data.phone }}</td>
                    <td class="px-6 py-4">{{ data.ticket }}</td>
                    <td
                        :class="{
                            'bg-yellow-200': data.status === 'Waiting',
                            'bg-red-200': data.status === 'Gagal',
                            'bg-green-200': data.status === 'Sukses',
                        }"
                        class="px-6 py-4"
                    >
                        {{ data.status }}
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
