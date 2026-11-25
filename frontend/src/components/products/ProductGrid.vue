<script setup>
import ProductCard from '@components/product/ProductCard.vue';

const { products, loading, failed } = defineProps({
    products: { type: Array, default: () => [] },
    loading: { type: Boolean, default: false },
    failed: { type: Boolean, default: false }
});

const emit = defineEmits(['reset']);
</script>
<template>
    <div class="min-w-0 flex-1">
        <p v-if="loading" class="text-muted-foreground">Termékek betöltése…</p>

        <p v-else-if="failed" class="text-destructive">
            Nem sikerült betölteni a termékeket. Próbáld újra később.
        </p>

        <div v-else-if="products.length === 0" class="flex flex-col items-start gap-4 py-6">
            <p class="text-muted-foreground">Nincs a keresésnek megfelelő termék.</p>
            <button
                type="button"
                class="rounded-md bg-primary px-3 py-2 text-xs leading-4 font-medium text-primary-foreground"
                @click="emit('reset')"
            >
                Szűrők törlése
            </button>
        </div>

        <div v-else class="grid gap-4 sm:grid-cols-2 lg:grid-cols-3 lg:gap-6">
            <ProductCard v-for="product in products" :key="product.id" :product />
        </div>
    </div>
</template>
