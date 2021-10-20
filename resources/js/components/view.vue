<template>
    <div>
        <h2 class="text-center">Campaign List</h2>

        <table class="table">
            <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>From Date</th>
                <th>To Date</th>
                <th>Daily Budget</th>
                <th>Total Budget</th>
                <th>Actions</th>
            </tr>
            </thead>
            <tbody>
            <tr v-for="(campaign, index) in campaigns" :key="campaign.id">
                <td>{{ index+1 }}</td>
                <td>{{ campaign.name }}</td>
                <td>{{ campaign.from_date }}</td>
                <td>{{ campaign.to_date }}</td>
                <td>{{ campaign.daily_budget }}</td>
                <td>{{ campaign.total_budget }}</td>
                <td>
                    <div class="btn-group" role="group">
                        <router-link :to="{name: 'edit', params: { id: campaign.id }}" class="btn btn-success">Edit</router-link>
                        <button class="btn btn-info"  @click="opentoview(campaign.images)" data-toggle="modal" data-target="#Modal">View Image</button>
                    </div>
                </td>
            </tr>
            </tbody>
        </table>
        <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Image</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                     <div v-for="image in image_data" :key="image.filename">
                         <img  v-bind:src="'./storage/images/' + image.filename" width="400" />
                     </div>
                </div>

                </div>
            </div>
        </div>
    </div>
</template>

<script>
    export default {
        data() {
            return {
                campaigns: [],
                image_data:[]
            }
        },
        created() {
            this.axios
                .get('http://localhost/api/advertising')
                .then(response => {
                    this.campaigns = response.data.data;
                    //console.log(response.data)
                }).catch(err => console.log(err))
        },
        methods:{
             opentoview(images) {
                for (let image of images) {
                  this.image_data.push(image);
                }
            },
        }
    }
</script>
