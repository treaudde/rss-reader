<template>
    <div class="container" id="view-all-feeds">
        <div class="row">
            <div class="col-12">
                <h1>Feed Form Component</h1>
                <div class="row">
                    <div class="col-12">

                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<style scoped>

</style>

<script>
    export default {
        props: ['feedId'],
        data() {
            return {
                rssFeeds:[],
                noFeeds: false
            }
        },
        mounted() {
            console.log(this.feedId);
        },

        methods: {

        }

    }
</script>
