<script setup>
import { ref, onMounted } from 'vue'
import { api } from '@utils/http.mjs'
import ProductCard from '@components/product/ProductCard.vue'

const products = ref([])
const loading = ref(true)
const failed = ref(false)

onMounted(async () => {
  try {
    const response = await api.get('/api/products')
    products.value = response.data.data.slice(0, 4)
  } catch {
    failed.value = true
  } finally {
    loading.value = false
  }
})
</script>

<template>
  <section class="px-5 py-10 lg:px-20 lg:py-14" aria-labelledby="featured-title">
    <h2 id="featured-title" class="text-3xl lg:text-4xl">Kiemelt termékek</h2>

    <p v-if="loading" class="mt-6 text-muted-foreground">Termékek betöltése…</p>
    <p v-else-if="failed" class="mt-6 text-destructive">
      Nem sikerült betölteni a termékeket. Próbáld újra később.
    </p>
    <div v-else class="mt-6 grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
      <ProductCard v-for="product of products" :key="product.id" :product="product" />
    </div>
  </section>
</template>
