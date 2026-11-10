<script setup>
import { ref, watch } from 'vue'
import { useRoute } from 'vue-router'
import { Menu, X } from '@lucide/vue'

defineProps({
  cartCount: { 
    type: Number, 
    default: 0 
  }
})

const title = import.meta.env.VITE_APP_NAME

const links = [
  { 
    label: 'Termékek', 
    to: '/termekek' 
  },
  { 
    label: 'Kávé', 
    to: '/kave' 
  },
  { 
    label: 'Tea', 
    to: '/tea' 
  },
  { 
    label: 'Kiegészítők', 
    to: '/kiegeszitok' 
  }
]

const menuOpen = ref(false)
const route = useRoute()

watch(() => route.fullPath, () => (menuOpen.value = false))
</script>

<template>
  <header
    class="sticky top-0 z-40 bg-background lg:static"
    @keydown.esc="menuOpen = false"
  >
    <div class="flex items-center justify-between gap-6 px-5 py-3 lg:px-20 lg:py-5">
      <RouterLink to="/" class="font-display text-2xl font-medium tracking-tight">
        {{ title }}
      </RouterLink>

      <nav class="hidden items-center gap-8 lg:flex" aria-label="Főmenü">
        <RouterLink
          v-for="link of links"
          :key="link.to"
          :to="link.to"
          class="text-sm font-medium hover:underline underline-offset-4"
          active-class="underline"
        >
          {{ link.label }}
        </RouterLink>
      </nav>

      <div class="flex items-center gap-2 lg:gap-6">
        <RouterLink to="/bejelentkezes" class="hidden text-sm font-medium hover:underline underline-offset-4 lg:inline">
          Bejelentkezés
        </RouterLink>
        <RouterLink
          to="/kosar"
          class="inline-flex h-9 items-center rounded-lg bg-primary px-4 text-sm font-medium text-primary-foreground"
        >
          Kosár ({{ cartCount }})
        </RouterLink>
        <button
          type="button"
          class="inline-flex h-9 w-10 items-center justify-center rounded-lg lg:hidden"
          :class="menuOpen ? 'bg-secondary' : ''"
          :aria-expanded="menuOpen"
          aria-controls="mobil-menu"
          @click="menuOpen = !menuOpen"
        >
          <X v-if="menuOpen" class="size-5" aria-hidden="true" />
          <Menu v-else class="size-5" aria-hidden="true" />
          <span class="sr-only">{{ menuOpen ? 'Menü bezárása' : 'Menü megnyitása' }}</span>
        </button>
      </div>
    </div>

    <template v-if="menuOpen">
      <button
        type="button"
        class="absolute inset-x-0 top-full h-screen cursor-default bg-primary/45 lg:hidden"
        tabindex="-1"
        aria-label="Menü bezárása"
        @click="menuOpen = false"
      />
      <nav
        id="mobil-menu"
        class="absolute inset-x-0 top-full border-y border-border bg-card px-5 pt-1 pb-5 shadow-lg lg:hidden"
        aria-label="Főmenü"
      >
        <RouterLink
          v-for="link of links"
          :key="link.to"
          :to="link.to"
          class="block border-b border-border py-3.5 font-display text-2xl font-medium tracking-tight"
        >
          {{ link.label }}
        </RouterLink>
        <RouterLink
          to="/bejelentkezes"
          class="mt-5 flex h-12 items-center justify-center rounded-lg border border-primary text-sm font-semibold"
        >
          Bejelentkezés
        </RouterLink>
      </nav>
    </template>
  </header>
</template>
