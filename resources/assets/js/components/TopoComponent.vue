<template>
    <nav id="topoComponent" class="navbar navbar-expand-md navbar-light navbar-laravel">
        <div class="container">

            <a class="navbar-brand" v-bind:href="url">
                <i class='fa fa-calendar-alt inverse'></i>
                <span class="inverse" >{{ titulo }}</span>
            </a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <!-- Left Side Of Navbar -->
                <ul class="navbar-nav mr-auto">

                </ul>

                <!-- Right Side Of Navbar -->
                <ul class="navbar-nav ml-auto">
                    <slot></slot>
                </ul>
            </div>
        </div>
    </nav>
</template>

<script>
    export default {
        props: ['titulo', 'url']
    }
</script>
