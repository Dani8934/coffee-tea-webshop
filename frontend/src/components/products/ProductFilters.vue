<script setup>
import { ChevronDown } from '@lucide/vue';
import { computed, ref } from 'vue';

const { typeOptions, originOptions } = defineProps({
    typeOptions: { type: Array, default: () => [] },
    originOptions: { type: Array, default: () => [] }
});

const filters = defineModel({ type: Object, required: true });

const groups = computed(() => [
    { key: 'type', title: 'Kategória', options: typeOptions },
    { key: 'origin', title: 'Származás', options: originOptions }
]);

const openKey = ref(null);

function toggle(key) {
    openKey.value = openKey.value === key ? null : key;
}
</script>
<template>
    <div class="flex gap-2.5 lg:flex-col lg:gap-8" @keydown.esc="openKey = null">
        <div v-if="openKey" class="fixed inset-0 z-10 lg:hidden" @click="openKey = null" />

        <section v-for="group in groups" :key="group.key" class="relative lg:static">
            <h3 class="hidden font-sans text-base font-semibold tracking-normal lg:block">
                {{ group.title }}
            </h3>
            <button
                type="button"
                class="flex items-center gap-2 rounded-lg border border-border bg-card px-4 py-2.5 text-[15px] font-medium lg:hidden"
                :aria-expanded="openKey === group.key"
                @click="toggle(group.key)"
            >
                {{ group.title }}
                <span
                    v-if="filters[group.key].length"
                    class="grid min-w-[18px] place-items-center rounded-full bg-primary px-1 text-xs text-primary-foreground"
                >
                    {{ filters[group.key].length }}
                </span>
                <ChevronDown class="size-4 transition-transform" :class="{ 'rotate-180': openKey === group.key }" />
            </button>

            <div
                class="absolute top-full left-0 z-20 mt-1.5 min-w-52 flex-col gap-3.5 rounded-lg border border-border bg-popover p-4 shadow-lg lg:static lg:mt-3.5 lg:flex lg:min-w-0 lg:rounded-none lg:border-0 lg:bg-transparent lg:p-0 lg:shadow-none"
                :class="openKey === group.key ? 'flex' : 'hidden'"
            >
                <label v-for="option in group.options" :key="option" class="flex cursor-pointer items-center gap-3 text-base font-medium">
                    <input
                        v-model="filters[group.key]"
                        type="checkbox"
                        :value="option"
                        class="size-5 shrink-0 cursor-pointer rounded accent-primary"
                    />
                    {{ option }}
                </label>
            </div>
        </section>
    </div>
</template>
