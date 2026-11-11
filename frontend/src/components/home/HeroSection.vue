<template>
  <div class="flex flex-col gap-6">
    <h1 class="text-4xl leading-[1.05] lg:text-6xl">Minden csésze egy helyről jön.</h1>
    <p class="max-w-xl text-base text-muted-foreground lg:text-lg">
      Szemes és őrölt kávék, levelestea és kiegészítők, származási ország szerint válogatva. A
      legtöbb termék 250 g-os és 1 kg-os kiszerelésben is kapható.
    </p>
    <div class="flex flex-col gap-3 sm:flex-row">
      <RouterLink
        to="/termekek"
        class="inline-flex items-center justify-center rounded-lg bg-primary px-6 py-3.5 text-sm font-medium text-primary-foreground"
      >
        Termékek böngészése
      </RouterLink>
      <RouterLink
        to="/tea"
        class="inline-flex items-center justify-center rounded-lg border border-primary px-6 py-3.5 text-sm font-medium"
      >
        Teák megtekintése
      </RouterLink>
    </div>
  </div>
</template>
