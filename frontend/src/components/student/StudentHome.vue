<template>
  <div class="p-6 space-y-6">
    <ProfileCard />
    <div class="grid grid-cols-1 lg:grid-cols-2 gap-6">
      <BadgesCard />
      <ActivitiesCard />
      <GroupsCard />
      <FormsCard />
    </div>
  </div>
</template>

<script setup>
import ProfileCard from './dashboard/ProfileCard.vue';
import BadgesCard from './dashboard/BadgesCard.vue';
import ActivitiesCard from './dashboard/ActivitiesCard.vue';
import GroupsCard from './dashboard/GroupsCard.vue';
import FormsCard from './dashboard/FormsCard.vue';
</script>