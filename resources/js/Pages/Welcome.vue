<script setup>
import { usePage } from '@inertiajs/vue3'

const { data } = usePage().props
</script>

<template>
  <div>
    <h2>Daftar Mahasiswa:</h2>
    <ul>
      <li v-for="(item, index) in data">
        {{ index + 1 }}.
        Nama: {{ item.name }} |
        NIM: {{ item.nim }} |
        Angkatan: {{ item.angkatan }}
      </li>
      Testing
    </ul>
  </div>
</template>
