<script setup>
import { Minus, Plus } from '@lucide/vue'

const quantity = defineModel({ 
  type: Number, 
  default: 1 
})

defineProps({
  max: { 
    type: Number, 
    default: 99 
  },
  disabled: { 
    type: Boolean, 
    default: false 
  }
})
</script>

<template>
  <div class="quantity-input" :class="{ 'opacity-45': disabled }">
    <button
      type="button"
      class="quantity-button"
      aria-label="Kevesebb"
      :disabled="disabled || quantity <= 1"
      @click="quantity--"
    >
      <Minus :size="18" />
    </button>

    <span class="min-w-10 px-3.5 text-center font-semibold">{{ quantity }}</span>

    <button
      type="button"
      class="quantity-button"
      aria-label="Több"
      :disabled="disabled || quantity >= max"
      @click="quantity++"
    >
      <Plus :size="18" />
    </button>
  </div>
</template>

<style scoped>
@reference "../../assets/main.css";

.quantity-input {
  @apply inline-flex items-center gap-0.5 rounded-lg border border-border bg-card p-1.5;
}

.quantity-button {
  @apply flex cursor-pointer items-center justify-center rounded-full bg-background p-[9px];
}

.quantity-button:disabled {
  @apply cursor-not-allowed opacity-40;
}
</style>