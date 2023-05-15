<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import DaftarJoki from "@/Components/DaftarJoki.vue";
import AuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
import DaftarOrder from "../Components/DaftarOrder.vue";
</script>

<template>
    <Head title="Daftar Order" />

    <DaftarJoki>
        <template #logo>
            <AuthenticationCardLogo />
        </template>
        <DaftarOrder />
    </DaftarJoki>
</template>
