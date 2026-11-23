<script setup>
import { computed, ref, watch } from 'vue'
import QuantityInput from '@components/product-detail/QuantityInput.vue'

const { pack } = defineProps({
  pack: { 
    type: Object, 
    required: true 
  }
})

const emit = defineEmits(['add'])

const quantity = ref(1)
const soldOut = computed(() => pack.stock === 0)
const totalPrice = computed(() => pack.price * quantity.value)

function formatPrice(value) {
  return new Intl.NumberFormat('hu-HU', { useGrouping: 'always' }).format(value)
}

watch(() => pack.id, () => {quantity.value = 1})
</script>

<template>
  <div class="flex flex-col gap-6">
    <div class="flex items-center justify-between gap-4">
      <span
        class="font-display text-[40px] font-semibold tracking-tight"
        :class="{ 'text-muted-foreground': soldOut }"
      >
        {{ formatPrice(totalPrice) }} Ft
      </span>

      <span class="stock-badge" :class="{ 'stock-badge--sold-out': soldOut }">
        <span class="size-2 rounded-full" :class="soldOut ? 'bg-destructive' : 'bg-tea'" />
        {{ soldOut ? 'Nincs készleten' : `${pack.stock} db készleten` }}
      </span>
    </div>

    <div class="flex items-stretch gap-3">
      <QuantityInput v-model="quantity" :max="pack.stock" :disabled="soldOut" />
      <button type="button" class="cart-button" :disabled="soldOut" @click="emit('add', quantity)">
        {{ soldOut ? 'Nem rendelhető' : 'Kosárba' }}
      </button>
    </div>
    <p v-if="soldOut" class="text-[15px] leading-[22px] font-medium text-destructive">
      Ez a kiszerelés jelenleg nincs készleten. Válassz másik kiszerelést.
    </p>
  </div>
</template>

<style scoped>
@reference "../../assets/main.css";

.stock-badge {
  @apply inline-flex items-center gap-2 rounded-md bg-muted px-3 py-1.5 text-sm font-medium;
}

.stock-badge--sold-out {
  @apply bg-destructive/15 text-destructive;
}

.cart-button {
  @apply flex-1 cursor-pointer rounded-lg bg-primary px-7 py-4 text-[15px] font-semibold text-primary-foreground;
}

.cart-button:disabled {
  @apply cursor-not-allowed bg-border text-muted-foreground;
}
</style>