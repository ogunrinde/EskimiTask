<template>
    <div>
        <h3 class="text-center">Create Campaign</h3>
        <div class="row">
            <div class="col-md-6">
                <form @submit.prevent="addCampaign">
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
                        <input type="number" class="form-control" v-model="campaign.daily_budget" step="0.25" value="0.00">
                    </div>
                    <div class="form-group">
                        <label>Total Budget</label>
                        <input type="number" class="form-control" v-model="campaign.total_budget" step="0.25" value="0.00">
                    </div>
                     <div class="form-group">
                        <label>Upload Images</label>
                        <input type="file" class="form-control" ref="files" multiple v-on:change="uploadFile()">
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                campaign: {},
                files:null
            }
        },
        methods: {
            addCampaign() {
                const options = {
                    headers: {
                    "Content-Type": "multipart/form-data",
                    },
                };
                const formData = new FormData();
                formData.append("name",this.campaign.name);
                formData.append("from_date",this.campaign.from_date);
                formData.append("to_date", this.campaign.to_date);
                formData.append("daily_budget", this.campaign.daily_budget);
                formData.append("total_budget",this.campaign.total_budget);

                for (let i = 0; i < this.files.length; i++) {
                    formData.append('images[]', this.files[i])
                }
                this.axios
                    .post('http://localhost/api/advertising/store', formData,options)
                    .then(response => (
                        this.$router.push({ name: 'home' })
                    ))
                    .catch(err => console.log(err.response))
                    .finally(() => this.loading = false)
            },
            uploadFile () {
                this.files = this.$refs.files.files;
            },
        }
    }
</script>
