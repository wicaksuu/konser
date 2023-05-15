<script setup>
import { Head, Link, useForm } from "@inertiajs/vue3";
import DaftarCard from "@/Components/DaftarCard.vue";
import AuthenticationCardLogo from "@/Components/AuthenticationCardLogo.vue";
import FormPendaftaran from "../Components/FormPendaftaran.vue";
</script>

<template>
    <Head title="Daftar Joki" />

    <DaftarCard>
        <template #logo>
            <AuthenticationCardLogo />
        </template>
        <FormPendaftaran />
    </DaftarCard>
</template>
