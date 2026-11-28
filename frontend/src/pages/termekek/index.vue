<script setup>
import ProductFilters from '@components/products/ProductFilters.vue';
import ProductGrid from '@components/products/ProductGrid.vue';
import SearchBar from '@components/products/SearchBar.vue';
import BaseLayout from '@layouts/BaseLayout.vue';
import { api } from '@utils/http.mjs';
import { computed, onMounted, ref, watch } from 'vue';
import { useRoute } from 'vue-router';

const route = useRoute();

const products = ref([]);
const loading = ref(true);
const failed = ref(false);

const search = ref('');
const filters = ref({ type: [], origin: [] });

function normalize(text) {
    return (text ?? '')
        .toLowerCase()
        .normalize('NFD')
        .replace(/\p{M}/gu, '');
}

function filtersFromQuery(query) {
    const next = { type: [], origin: [] };

    if (query.origin) {
        const origin = products.value.find(p => p.origin === query.origin)?.origin;
        if (origin) next.origin = [origin];
    }

    if (query.category) {
        const types = products.value
            .filter(p => p.category?.slug === query.category)
            .map(p => p.type);
        next.type = [...new Set(types)];
    }

    return next;
}

onMounted(async () => {
    try {
        const response = await api.get('/api/products');
        products.value = response.data.data;
        filters.value = filtersFromQuery(route.query);
    } catch {
        failed.value = true;
    } finally {
        loading.value = false;
    }
});

watch(
    () => route.query,
    query => {
        if (!loading.value) filters.value = filtersFromQuery(query);
    }
);

const typeOptions = computed(() => {
    return [...new Set(products.value.map(p => p.type))].filter(Boolean);
});

const originOptions = computed(() => {
    return [...new Set(products.value.map(p => p.origin))].filter(Boolean);
});

const filtered = computed(() => {
    const term = normalize(search.value);
    return products.value.filter(p =>
        normalize(p.name).includes(term) &&
        (filters.value.type.length === 0 || filters.value.type.includes(p.type)) &&
        (filters.value.origin.length === 0 || filters.value.origin.includes(p.origin))
    );
});

function resetAll() {
    search.value = '';
    filters.value = { type: [], origin: [] };
}
</script>
<template>
    <BaseLayout>
        <section class="flex flex-col gap-4 px-5 pt-6 pb-4 lg:flex-row lg:items-center lg:justify-between lg:px-20 lg:py-10">
            <div class="flex flex-col gap-2">
                <h1 class="text-[44px] lg:text-[56px]">Termékek</h1>
                <p class="text-base text-muted-foreground lg:text-lg">Kávék, teák és kiegészítők egy helyen.</p>
            </div>
            <SearchBar v-model="search" />
        </section>

        <section class="flex flex-col gap-5 px-5 pb-8 lg:flex-row lg:items-start lg:gap-12 lg:px-20 lg:pt-6 lg:pb-20">
            <aside class="lg:w-[260px] lg:shrink-0">
                <ProductFilters v-model="filters" :typeOptions :originOptions />
            </aside>
            <ProductGrid :products="filtered" :loading :failed @reset="resetAll" />
        </section>
    </BaseLayout>
</template>
<style scoped></style>
<route lang="yaml">
name: products.index
path: /termekek
meta:
  title: Termékek
</route>
