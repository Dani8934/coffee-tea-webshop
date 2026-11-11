<script setup>
const origins = [
  { name: 'Etiópia', type: 'Szemes kávé' },
  { name: 'Kolumbia', type: 'Szemes kávé' },
  { name: 'Japán', type: 'Zöld tea' },
  { name: 'India', type: 'Fekete tea' },
  { name: 'Brazília', type: 'Őrölt kávé' }
]
</script>

<template>
  <section class="overflow-hidden rounded-[14px] bg-secondary" aria-labelledby="origin-title">
    <h2 id="origin-title" class="px-5 py-4 font-sans text-sm font-medium tracking-normal">
      Böngéssz származási ország szerint
    </h2>
    <ul>
      <li v-for="origin of origins" :key="origin.name" class="border-t border-border">
        <RouterLink
          :to="`/termekek?origin=${encodeURIComponent(origin.name)}`"
          class="flex items-center justify-between gap-4 px-5 py-4 hover:bg-card/60"
        >
          <span class="font-display text-2xl font-medium tracking-tight">{{ origin.name }}</span>
          <span class="text-sm font-medium text-tea">{{ origin.type }}</span>
        </RouterLink>
      </li>
    </ul>
  </section>
</template>
