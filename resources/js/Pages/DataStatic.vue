<script setup>
const { data } = defineProps({
    data: Array
})

import TextInput from "@/Components/TextInput.vue"
import { ref } from 'vue'

const localData = ref([...data])
const inputValue = ref('')

const newData = () => {
  localData.value.push({
    name: inputValue.value,
    age: 22,
    address: 'Karama',
  })
  inputValue.value = ''
}
</script>

<template>
  <div v-for="(item, index) in localData" :key="index">
    <p class="ml-4">
      {{ index + 1 }}. {{ item.name }}
    </p>
  </div>

  <TextInput v-model="inputValue" class="ml-4" />
  <button class="p-2 text-white ml-4 bg-blue-500" @click="newData">Add Data</button>
</template>
