<script setup>
import BaseHeader from '@components/layout/BaseHeader.vue'
import AppFooter from '@components/layout/AppFooter.vue'
</script>
<template>
  <div class="flex min-h-screen flex-col">
    <BaseHeader />
    <main class="container mx-auto flex-1">
      <slot />
    </main>
    <AppFooter />
  </div>
</template>
