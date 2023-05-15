<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import PrimaryButton from "@/Components/PrimaryButton.vue";
import ActionMessage from "@/Components/ActionMessage.vue";

defineProps({ errors: Object });
const form = useForm({
    first_name: "",
    last_name: "",
    email: "",
    phone: "",
    ticket: "ultimate_experience",
});

const submit = () => {
    form.post(route("daftar.store"), {
        onFinish: () => form.reset("first_name", "last_name", "email", "phone"),
    });
};
</script>
<template>
    <div class="col-span-12 xl:col-span-6">
        <div class="card">
            <div class="card-body pb-0">
                <h6 class="mb-2 text-xl text-gray-700">Form Joki</h6>
            </div>
            <div class="card-body">
                <form @submit.prevent="submit">
                    <div class="grid gap-6 mb-6 md:grid-cols-2">
                        <div>
                            <label
                                for="first_name"
                                class="block mb-2 text-sm font-medium text-gray-900"
                                >Nama Depan</label
                            >
                            <input
                                type="text"
                                id="first_name"
                                v-model="form.first_name"
                                class="border border-gray-300 text-gray-900 text-sm rounded focus:ring-violet-100 focus:border-violet-500 block w-full p-2.5"
                                placeholder="Wicak"
                            />
                            <div
                                v-if="form.errors.first_name"
                                class="text-xs text-red-500 mt-2"
                            >
                                {{ form.errors.first_name[0] }}
                            </div>
                        </div>
                        <div>
                            <label
                                for="last_name"
                                class="block mb-2 text-sm font-medium text-gray-900"
                                >Nama Belakang</label
                            >
                            <input
                                type="text"
                                id="last_name"
                                v-model="form.last_name"
                                class="border border-gray-300 text-gray-900 text-sm rounded focus:ring-violet-100 focus:border-violet-500 block w-full p-2.5"
                                placeholder="Bayu"
                            />
                            <div
                                v-if="form.errors.last_name"
                                class="text-xs text-red-500 mt-2"
                            >
                                {{ form.errors.last_name[0] }}
                            </div>
                        </div>
                        <div>
                            <label
                                for="phone"
                                class="block mb-2 text-sm font-medium text-gray-900"
                                >Telepon</label
                            >
                            <input
                                type="text"
                                id="phone"
                                v-model="form.phone"
                                class="border border-gray-300 text-gray-900 text-sm rounded focus:ring-violet-100 focus:border-violet-500 block w-full p-2.5"
                                placeholder="0822"
                            />
                            <div
                                v-if="form.errors.phone"
                                class="text-xs text-red-500 mt-2"
                            >
                                {{ form.errors.phone[0] }}
                            </div>
                        </div>

                        <div>
                            <label
                                for="ticket"
                                class="block mb-2 text-sm font-medium text-gray-900"
                                >Pilih Tiket</label
                            >
                            <select
                                class="border border-gray-300 text-gray-900 text-sm rounded focus:ring-violet-100 focus:border-violet-500 block w-full p-2.5"
                                id="ticket"
                                v-model="form.ticket"
                            >
                                <option value="ultimate_experience">
                                    Ultimate Experience (Rp. 500K)
                                </option>
                                <option value="my_universe">
                                    My Universe (Rp. 500K)
                                </option>
                                <option value="cat1">Cat 1 (Rp. 500K)</option>
                                <option value="festival">
                                    Festival (Rp. 400K)
                                </option>
                                <option value="cat1">Cat 2 (Rp. 450K)</option>
                                <option value="cat1">Cat 3 (Rp. 400K)</option>
                                <option value="cat1">Cat 4 (Rp. 400K)</option>
                                <option value="cat1">Cat 5 (Rp. 350K)</option>
                                <option value="cat1">Cat 6 (Rp. 350K)</option>
                                <option value="cat1">Cat 7 (Rp. 350K)</option>
                                <option value="cat1">Cat 8 (Rp. 350K)</option>
                            </select>
                        </div>
                    </div>
                    <div class="mb-6">
                        <label
                            for="email"
                            class="block mb-2 text-sm font-medium text-gray-900"
                            >Alamat Email</label
                        >
                        <input
                            type="email"
                            id="email"
                            v-model="form.email"
                            class="border border-gray-300 text-gray-900 text-sm rounded focus:ring-violet-100 focus:border-violet-500 block w-full p-2.5"
                            placeholder="wicaksu@wicaksu.com"
                        />
                        <div
                            v-if="form.errors.email"
                            class="text-xs text-red-500 mt-2"
                        >
                            {{ form.errors.email[0] }}
                        </div>
                    </div>

                    <div
                        class="flex items-center justify-end px-4 py-3 text-right sm:px-6"
                    >
                        <ActionMessage :on="form.errors.success" class="mr-3">
                            <div
                                v-if="form.errors.success"
                                class="text-l text-green-500 mt-2"
                            >
                                {{ form.errors.success }}
                            </div>
                        </ActionMessage>
                        <PrimaryButton
                            :class="{ 'opacity-25': form.processing }"
                            :disabled="form.processing"
                        >
                            Order
                        </PrimaryButton>
                    </div>
                </form>
            </div>
        </div>
    </div>
</template>
