<script setup>
const selectedId = defineModel({ 
  type: Number, 
  required: true 
})

defineProps({
  packages: { 
    type: Array, 
    required: true 
  }
})

function formatPrice(value) {
  return new Intl.NumberFormat('hu-HU', { useGrouping: 'always' }).format(value)
}
</script>

<template>
  <div class="flex gap-3" role="radiogroup" aria-label="Kiszerelés">
    <button
      v-for="pack of packages"
      :key="pack.id"
      type="button"
      role="radio"
      :aria-checked="selectedId === pack.id"
      class="variant-button"
      :class="{ 'variant-button--selected': selectedId === pack.id }"
      @click="selectedId = pack.id"
    >
      <span class="text-base font-semibold">{{ pack.size }}</span>
      <span class="text-sm text-muted-foreground">{{ formatPrice(pack.price) }} Ft</span>
      <span v-if="pack.stock === 0" class="text-[13px] font-medium text-destructive">
        Elfogyott
      </span>
    </button>
  </div>
</template>

<style scoped>
@reference "../../assets/main.css";

.variant-button {
  @apply flex flex-1 cursor-pointer flex-col items-start gap-1 rounded-lg border border-border bg-card px-5 py-3.5 text-left sm:flex-none;
}

.variant-button--selected {
  @apply border-2 border-primary px-[19px] py-[13px];
}
</style>