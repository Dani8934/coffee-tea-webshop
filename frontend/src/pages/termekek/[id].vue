<script setup>
import { computed, onMounted, ref } from 'vue'
import { useRoute } from 'vue-router'
import { api } from '@utils/http.mjs'
import BaseLayout from '@layouts/BaseLayout.vue'
import VariantSelector from '@components/product-detail/VariantSelector.vue'
import ProductPurchase from '@components/product-detail/ProductPurchase.vue'

const route = useRoute()

const product = ref(null)
const loading = ref(true)
const failed = ref(false)
const selectedId = ref(null)

const packages = computed(() =>
  product.value ? [...product.value.packages].sort((a, b) => a.price - b.price) : []
)
const selectedPackage = computed(() => packages.value.find((p) => p.id === selectedId.value))

async function loadProduct() {
  try {
    const response = await api.get(`/api/products/${route.params.id}`)
    product.value = response.data.data
    selectedId.value = packages.value[0].id
  } catch {
    failed.value = true
  } finally {
    loading.value = false
  }
}

function addToCart(quantity) {
  console.log('Kosárba:', product.value.id, selectedId.value, quantity)
}

onMounted(loadProduct)
</script>

<template>
  <BaseLayout>
    <p v-if="loading" class="px-5 py-10 text-muted-foreground lg:px-20 lg:py-14">
      Termék betöltése…
    </p>
    <p v-else-if="failed" class="px-5 py-10 text-destructive lg:px-20 lg:py-14">
      Nem sikerült betölteni a terméket. Próbáld újra később.
    </p>

    <template v-else>
      <nav aria-label="Navigációs út" class="px-5 pt-6 pb-4 text-sm text-muted-foreground lg:px-20 lg:pb-8">
        <ol class="flex flex-wrap items-center gap-2">
          <li>Termékek</li>
          <li aria-hidden="true">›</li>
          <li>{{ product.category.name }}</li>
          <li aria-hidden="true">›</li>
          <li class="font-semibold text-foreground" aria-current="page">{{ product.name }}</li>
        </ol>
      </nav>

      <section class="flex flex-col gap-6 px-5 pb-12 lg:flex-row lg:gap-16 lg:px-20 lg:pb-20">
        <div
          class="aspect-[10/6] w-full overflow-hidden rounded-[10px] bg-muted lg:aspect-square lg:w-[600px] lg:shrink-0 lg:rounded-[14px]"
        >
          <img
            v-if="product.image"
            :src="`/images/products/${product.image}`"
            :alt="product.name"
            class="size-full object-cover"
          />
        </div>

        <div class="flex flex-1 flex-col gap-6">
          <div class="flex flex-col gap-2">
            <p class="text-sm font-semibold text-tea lg:text-[15px]">
              {{ product.origin }}<span v-if="product.region">, {{ product.region }}</span>
            </p>
            <h1 class="text-[40px] leading-tight lg:text-[56px]">{{ product.name }}</h1>
            <p class="text-base text-muted-foreground">{{ product.type }}, {{ product.detail }}</p>
          </div>

          <div class="flex flex-col gap-2">
            <p class="text-sm font-semibold">Leírás</p>
            <p class="text-base leading-[26px] lg:text-[17px] lg:leading-7">
              {{ product.description }}
            </p>
          </div>

          <hr class="h-px border-0 bg-border" />

          <div class="flex flex-col gap-3">
            <p class="text-sm font-semibold">Kiszerelés</p>
            <VariantSelector v-model="selectedId" :packages="packages" />
          </div>

          <ProductPurchase :pack="selectedPackage" @add="addToCart" />
        </div>
      </section>
    </template>
  </BaseLayout>
</template>

<route lang="yaml">
name: product-detail
meta:
  title: Termék
</route>