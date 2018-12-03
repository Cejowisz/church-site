<template>
    <div>
        <div id="hero">
            <video playsinline autoplay muted loop id="video">
                <source src="../assets/video/dd.mp4" type="video/mp4">
            </video>
            <div class="hero-intro">
                <h1>This is the hero</h1>
                <p>Ever since we started creating courses on Scrimba, <br>
                    people have asked us for a proper intro course on React.
                </p>
            </div>
            <div class="hero-back"></div>
        </div>
       
        <div class="feat">
            <div class="feat-inner card">
                <img src="../assets/img/f2.jpg" alt="Beauty for ashes image">
                <h1>Worship</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Ad aliquam consequatur cum exercitationem illo iste libero nobis nostrum nulla,
                    omnis optio quae quam recusandae rem, repellat, similique veritatis voluptatum. Ipsum.
                </p>
            </div>
            <div class="feat-inner card">
                <img src="../assets/img/f2.jpg" alt="Beauty for ashes image">
                <h1>Connect</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Ad aliquam consequatur cum exercitationem illo iste libero nobis nostrum nulla,
                    omnis optio quae quam recusandae rem, repellat, similique veritatis voluptatum. Ipsum.
                </p>
            </div>
            <div class="feat-inner card">
                <img src="../assets/img/f3.jpg" alt="Beauty for ashes image">
                <h1>Collaborate</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Ad aliquam consequatur cum exercitationem illo iste libero nobis nostrum nulla,
                    omnis optio quae quam recusandae rem, repellat, similique veritatis voluptatum. Ipsum.
                </p>
            </div>
        </div>

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

    #hero{
        position: relative;
    }

    #video {
        position: relative;
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
        z-index: 10;
        display: grid;
        align-content: center;
        text-align: center;
        color: #fefefe;
    }
    .hero-intro h1{
        font-size: 64px;
        margin: 0 2px;
    }
    .hero-intro p{
        font-size: 30px;
    }
    @media(max-width: 767px) {
        #video, .hero-intro{
            top: 60px;
        }
        .hero-back{
            position: absolute;
            left: 0;
            top: 100px;
            margin-top: 60px !important;
        }
    }
    .hero-back{
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        background: #2a1ca1;
        opacity: .6;
        overflow-x: hidden;
        z-index: 1;
    }
    .feat{
        margin: 60px 30px;
        display: grid;
        grid-gap: 20px;
        grid-template-columns: repeat(auto-fit, minmax(380px, 1fr));
        grid-auto-rows: auto;
    }
    .feat-inner{
        padding: 25px;
    }
</style>

