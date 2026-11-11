<script setup>
import BaseLayout from '@layouts/BaseLayout.vue'
import HeroSection from '@components/home/HeroSection.vue'
import OriginList from '@components/home/OriginList.vue'
import CategoryTiles from '@components/home/CategoryTiles.vue'
import FeaturedProducts from '@components/home/FeaturedProducts.vue'
</script>

<template>
  <BaseLayout>
    <section class="grid items-center gap-8 px-5 py-8 lg:grid-cols-2 lg:gap-16 lg:px-20 lg:py-16">
      <HeroSection />
      <OriginList />
    </section>
    <CategoryTiles />
    <FeaturedProducts />
  </BaseLayout>
</template>

<route lang="yaml">
name: index
meta:
  title: Főoldal
</route>
