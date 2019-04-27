<template>
    <div class="col-md-4 col-xl-4">
        <div class="custom-control custom-block custom-control-primary">
            <input type="checkbox" class="custom-control-input" :id="'profile_' + profile.id" name="profile_id[]" :value="profile.id">
            <label class="custom-control-label" v-bind:for="'profile_' + profile.id ">
                <span class="d-flex align-items-center">
                    <img class="img-avatar img-avatar48" :src="profile.avatar" alt="">
                    <span class="ml-2">
                        <span class="font-w700">{{ profile.user.name }}</span>
                        <span class="d-block font-size-sm text-muted">{{ profile.user.email}}</span>
                    </span>
                </span>
            </label>
        </div>
    </div>
</template>

<script>

export default {
    name: 'ProfileItem',
    props: ['index', 'profile']
}
</script>