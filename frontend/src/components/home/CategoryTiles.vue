<script setup>
import { ref, onMounted } from 'vue'
import { api } from '@utils/http.mjs'

const styles = {
  'szemes-kave': 'bg-secondary',
  'orolt-kave': 'bg-border/60',
  tea: 'bg-tea text-primary-foreground',
  kiegeszitok: 'bg-primary text-primary-foreground'
}

const categories = ref([])
const failed = ref(false)

onMounted(async () => {
  try {
    const response = await api.get('/api/categories')
    categories.value = response.data.data
  } catch {
    failed.value = true
  }
})
</script>

<template>
  <section class="bg-card px-5 py-10 lg:px-20 lg:py-14" aria-labelledby="category-title">
    <h2 id="category-title" class="text-3xl lg:text-4xl">Kategóriák</h2>

    <p v-if="failed" class="mt-6 text-destructive">
      Nem sikerült betölteni a kategóriákat. Próbáld újra később.
    </p>
    <div v-else class="mt-6 grid grid-cols-2 gap-3 lg:grid-cols-4 lg:gap-5">
      <RouterLink
        v-for="category of categories"
        :key="category.id"
        :to="`/termekek?category=${category.slug}`"
        class="flex h-[132px] flex-col justify-between rounded-[10px] p-4 lg:h-[200px] lg:p-5"
        :class="styles[category.slug] ?? 'bg-secondary'"
      >
        <span class="font-display text-xl font-medium tracking-tight lg:text-3xl">
          {{ category.name }}
        </span>
        <span class="text-xs lg:text-sm">{{ category.products_count ?? 0 }} termék</span>      </RouterLink>
    </div>
  </section>
</template>