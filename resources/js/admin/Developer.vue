
<template>
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8" v-if="$gate.isAdmin()">
                <passport-clients></passport-clients>
                <passport-authorized-clients></passport-authorized-clients>
                <passport-personal-access-tokens></passport-personal-access-tokens>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        mounted() {
        this.$Progress.start();
            console.log('Component mounted.')
        this.$Progress.finish();
        }
    }
</script>