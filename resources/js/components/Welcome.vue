<template>
    <div class="container">
        <h1>{{title}}</h1>

        <div class="card">
            <div class="card-header">
                <form method="POST" action="{{ route('generate.shorten.link.post') }}">

                    <div class="input-group mb-3">
                         <input
                            :value="text"
                            @input="event => text = event.target.value" class="form-control">

                        <div class="input-group-append">
                            <button class="btn btn-success" type="submit">{{btnText}}</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <p>{{version}}</p>
    </div>
</template>
<script>
import {version} from "vue";

export default {
    setup: ()=>({
        title: 'URL shortener using Laravel+Vue',
        btnText: 'Generate',
        version: version
    })
}
</script>
<style embed>

</style>
