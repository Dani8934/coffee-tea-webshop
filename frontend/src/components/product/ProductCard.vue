<script setup>
defineProps({
    product: { 
        type: Object, 
        required: true 
    }
})

const formatPrice = (value) =>
  new Intl.NumberFormat('hu-HU', { useGrouping: 'always' }).format(value)
</script>

<template>
  <article class="flex flex-col overflow-hidden rounded-[10px] border border-border bg-card">
    <div class="aspect-[302/190] w-full bg-muted">
      <img
        v-if="product.image"
        :src="product.image"
        :alt="product.name"
        loading="lazy"
        class="size-full object-cover"
      />
    </div>

    <div class="flex flex-1 flex-col gap-1 p-4">
      <p class="text-xs font-medium text-tea">
        {{ product.origin }}<span v-if="product.region">, {{ product.region }}</span>
      </p>
      <h3 class="font-display text-xl font-medium">{{ product.name }}</h3>
      <p class="text-sm text-muted-foreground">{{ product.type }}, {{ product.detail }}</p>

      <ul class="mt-2 flex flex-wrap gap-1.5">
        <li v-for="pack of product.packages" :key="pack.size" class="package-chip">
          {{ pack.size }}
        </li>
      </ul>

      <div class="mt-auto flex items-center justify-between gap-3 pt-4">
        <span class="text-sm font-semibold">
          {{ formatPrice(product.packages[0].price) }} Ft-tól
        </span>
        <RouterLink
          v-if="product.stock > 0"
          :to="`/termekek/${product.slug}`"
          class="details-button"
        >
          Részletek
        </RouterLink>
        <span v-else class="details-button details-button--sold-out">Nincs készleten</span>
      </div>
    </div>
  </article>
</template>

<style scoped>
@reference "../../assets/main.css";

.package-chip {
  @apply rounded-md border border-border px-2 py-0.5 text-xs;
}

.details-button {
  @apply inline-block rounded-md bg-primary px-3 py-2 text-center text-xs leading-4 font-medium text-primary-foreground;
}

.details-button--sold-out {
  @apply cursor-default bg-destructive/15 text-destructive select-none;
}
</style>