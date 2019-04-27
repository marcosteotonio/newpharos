<template>
    <div class="form-group row items-push mb-0">
        <ProfileItem v-for="(profile, index) in profiles" :index="index" :profile="profile" :key="profile.id"></ProfileItem>
    </div>
</template>

<script>

import ProfileItem from './ProfileItem';
import ProfileFilter from './ProfileFilter';

export default {
    name: 'ProfileList',
    components: {
        ProfileItem,
        ProfileFilter
    },
    created() {
        this.$store.dispatch('getProfiles');
    },
    computed: {
        profiles() {
            return this.$store.state.profileList
        }
    }
}
</script>
