<template>
    <div>
        <div id="hero">
            <video playsinline autoplay muted loop id="video">
                <source src="../assets/video/dd.mp4" type="video/mp4">
            </video>
            <div class="hero-intro">
                <h3>This is the hero</h3>
                <p>This is a statement from hero</p>
            </div>
            <div class="hero-back"></div>
        </div>
        <video playsinline autoplay muted loop id="bgvideo">
            <source src="../assets/video/dd.mp4" type="video/mp4">
        </video>
        <video playsinline autoplay muted loop id="bgvideo">
            <source src="../assets/video/dd.mp4" type="video/mp4">
        </video>
        <video playsinline autoplay muted loop id="bgvideo">
            <source src="../assets/video/dd.mp4" type="video/mp4">
        </video>
    </div>
</template>

<script>

    export default {

        mounted() {
            let el = document.getElementsByTagName('header')
            el[0].style.background = 'transparent'

        }

    }
</script>

<style>
    .add-margin-top{
        margin-top: 0;
    }
    #video {
        /*position: ;*/
        width: 100%;
        height: 100%;
        min-width: 100%;
        min-height: 100%;
    }
    .hero-intro{
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        z-index: 10000;
    }
    .hero-back{
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background: orangered;
        opacity: .6;
    }
    video#bgvideoxx {
        position: fixed;
        top: 50%;
        left: 50%;
        min-width: 100%;
        min-height: 100%;
        width: auto;
        height: auto;
        /*z-index: -100;*/
        -ms-transform: translateX(-50%) translateY(-50%);
        -moz-transform: translateX(-50%) translateY(-50%);
        -webkit-transform: translateX(-50%) translateY(-50%);
        transform: translateX(-50%) translateY(-50%);
        background: url(../assets/img/bg3.jpg) no-repeat;
        background-size: cover;
    }
</style>

