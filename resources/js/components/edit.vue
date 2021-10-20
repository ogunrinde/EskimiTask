<template>
    <div>
        <h3 class="text-center">Edit Campaign</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="updateCampaign">
                    <div class="form-group">
                        <label>Name</label>
                        <input type="text" class="form-control" v-model="campaign.name">
                    </div>
                    <div class="form-group">
                        <label>From Date</label>
                        <input type="date" class="form-control" v-model="campaign.from_date">
                    </div>
                    <div class="form-group">
                        <label>To Date</label>
                        <input type="date" class="form-control" v-model="campaign.to_date">
                    </div>
                    <div class="form-group">
                        <label>Daily Budget</label>
                        <input type="number" class="form-control" v-model="campaign.daily_budget">
                    </div>
                    <div class="form-group">
                        <label>Total Budget</label>
                        <input type="number" class="form-control" v-model="campaign.total_budget">
                    </div>
                    <button type="submit" class="btn btn-primary">Edit</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                campaign: {}
            }
        },
        created() {
            this.axios
                .get(`http://localhost/api/advertising/${this.$route.params.id}`)
                .then((res) => {
                    this.campaign = res.data.data;
                });
        },
        methods: {
            updateCampaign() {
                this.axios
                    .put(`http://localhost/api/advertising/update/${this.$route.params.id}`, this.campaign)
                    .then((res) => {
                        this.$router.push({ name: 'home' });
                    });
            }
        }
    }
</script>
