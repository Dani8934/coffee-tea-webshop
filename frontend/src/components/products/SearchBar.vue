<script setup>
const search = defineModel({ type: String, default: '' });
</script>
<template>
    <input
        v-model="search"
        type="search"
        placeholder="Keresés névre"
        aria-label="Keresés névre"
        autocomplete="off"
        class="h-12 w-full rounded-lg border border-input bg-card px-5 text-[15px] outline-none placeholder:text-muted-foreground focus-visible:ring-2 focus-visible:ring-ring lg:w-[360px] lg:text-base"
    />
</template>
