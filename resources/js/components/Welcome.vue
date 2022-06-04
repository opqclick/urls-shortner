<template>
    <div class="container">
        <h1>{{title}}</h1>

        <div class="card">
            <div class="card-header">
                <form method="POST" action="" @submit.prevent = "formSubmit">

                    <div class="input-group mb-3">
                         <input type="text" v-model="link" name="link" id="link" placeholder="Paste your URL here.." class="form-control">

                        <div class="input-group-append">
                            <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <p>{{message}}</p>

        <p v-if="list != null">
            <a :href="list.code"><b>{{baseUrl + '/' +list.code}}</b></a> &nbsp; || &nbsp; <a :href="list.link">{{list.link}}</a>
        </p>
    </div>
</template>
<script>
import {version} from "vue";
import axios from "axios";

export default {
    setup: ()=>({
        title: 'URL shortener using Laravel+Vue',
        btnText: 'Generate',
        version: version

    }),
    data(){
        return {
            link: null,
            list: null,
            message: null,
            baseUrl: window.location.host
        }
    },
    methods: {
        formSubmit(){
            this.list = null
            //console.log(this.link);

            axios.post('/api/generate-short-link', {
                link: this.link
            }).then(response => {
                if (response.data.success){
                    window.location.href = response.data.response.link
                }

                this.list = response.data.response
                this.message = response.data.message

                console.log(response.data);
            }).catch(error => {
                console.log(error);
            })

        }
    }
}
</script>
<style embed>

</style>
