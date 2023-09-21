<script setup>
import { ref } from 'vue'
import Datepicker from '@vuepic/vue-datepicker'
import '@vuepic/vue-datepicker/dist/main.css'

const date = ref(new Date())
</script>

<template>
  <Datepicker v-model="date"></Datepicker>
</template>