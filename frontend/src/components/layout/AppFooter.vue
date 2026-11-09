<script setup>
const title = import.meta.env.VITE_APP_NAME
</script>
<template>
  <footer class="bg-primary text-primary-foreground">
    <div
      class="flex flex-col gap-2 px-5 py-8 lg:flex-row lg:items-center lg:justify-between lg:px-20"
    >
      <span class="font-display text-2xl font-medium tracking-tight">{{ title }}</span>
      <p class="text-sm text-primary-foreground/75">Szállítás 15 000 Ft felett ingyenes</p>
    </div>
  </footer>
</template>
<style scoped></style>
