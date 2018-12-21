<template>
    <div>
        <div id="hero">
            <video playsinline autoplay muted loop id="video">
                <source src="../assets/video/test.mp4" type="video/mp4">
            </video>
            <div class="hero-intro">
                <h1>Sweet Movement</h1>
                <p>The royal diadem thorough breds.</p>
            </div>
            <div class="hero-back"></div>
        </div>

        <div class="feat">
            <div class="feat-inner card animated fadeInUp">
                <img src="../assets/img/f2.jpg" alt="Beauty for ashes image">
                <h1>Worship</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Ad aliquam consequatur cum exercitationem illo iste libero nobis nostrum nulla,
                    omnis optio quae quam recusandae rem, repellat, similique veritatis voluptatum. Ipsum.
                </p>
            </div>
            <div class="feat-inner card animated fadeInUp">
                <img src="../assets/img/f2.jpg" alt="Beauty for ashes image">
                <h1>Connect</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Ad aliquam consequatur cum exercitationem illo iste libero nobis nostrum nulla,
                    omnis optio quae quam recusandae rem, repellat, similique veritatis voluptatum. Ipsum.
                </p>
            </div>
            <div class="feat-inner card animated fadeInUp">
                <img src="../assets/img/f3.jpg" alt="Beauty for ashes image">
                <h1>Collaborate</h1>
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit.
                    Ad aliquam consequatur cum exercitationem illo iste libero nobis nostrum nulla,
                    omnis optio quae quam recusandae rem, repellat, similique veritatis voluptatum. Ipsum.
                </p>
            </div>
        </div>

        <div class="activities">
            <div class="special animated fadeInUp">
                <img class="activities-img" src="../assets/img/special.jpg" alt="baifc image">
                <div class="activities-inner">
                    <h1>Special Program</h1>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque
                        esse explicabo itaque quod ullam, vel voluptate. Assumenda ea, earum esse in iste
                        laboriosam necessitatibus, placeat quia recusandae reprehenderit soluta temporibus!
                    </p>
                    <nuxt-link to="/events">Learn more</nuxt-link>
                </div>
            </div>

            <div class="workshop reverse animated fadeInUp">
                <img class="activities-img" src="../assets/img/special.jpg" alt="baifc image">
                <div class="activities-inner">
                    <h1>Workshop Program</h1>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque
                        esse explicabo itaque quod ullam, vel voluptate. Assumenda ea, earum esse in iste
                        laboriosam necessitatibus, placeat quia recusandae reprehenderit soluta temporibus!
                    </p>
                    <nuxt-link to="/events">Learn more</nuxt-link>
                </div>
            </div>

            <div class="children animated fadeInUp">
                <img class="activities-img" src="../assets/img/special.jpg" alt="baifc image">
                <div class="activities-inner">
                    <h1>Children Program</h1>
                    <p>
                        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cumque
                        esse explicabo itaque quod ullam, vel voluptate. Assumenda ea, earum esse in iste
                        laboriosam necessitatibus, placeat quia recusandae reprehenderit soluta temporibus!
                    </p>
                    <nuxt-link to="/events">Learn more</nuxt-link>
                </div>
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
    .reverse{
        direction: rtl;
        text-align: left;
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

    }
    .hero-intro h1{
        font-size: 64px;
        margin: 0 0 0 40px;
        color: #fefefe !important;
    }
    .hero-intro p{
        font-size: 18px;
        margin-left: 40px;
        color: #fefefe !important;
    }
    .activities{
        background: url(../assets/img/pattern-back.svg);
        background-size: cover;
    }
    .activities-inner{
        width: 300px;
        justify-self: center;
        margin-bottom: 20px;
    }
    .activities-inner p{
        margin-bottom: 50px;
    }
    .activities-inner a{
        background: #ffc100;
        text-decoration: none;
        padding: 10px 20px;
        transition: .5s ease-in-out;
    }
    .activities-inner a:hover{
        background: cornflowerblue;
    }
    .special, .workshop, .children{
        display: grid;
        grid-gap: 30px;
        grid-row-gap: 30px;
        grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
        /*padding: 24px;*/
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


    @media(min-width: 768px) {
        .activities-img{
            width: 300px;
        }
        .special, .workshop, .children{
            min-height: 400px;
            align-content: center;
        }
        .special img, .workshop img, .children img{
            justify-self: center;
        }
    }

    @media(max-width: 767px) {
        #video, .hero-intro{
            top: 60px;
        }
        .hero-back{
            position: absolute;
            left: 0;
            top: 0;
            margin-top: 60px !important;
        }
        .feat{
            margin: 60px 0;
            display: grid;
            grid-gap: 20px;
            grid-template-columns: repeat(auto-fit, minmax(300px, 1fr));
            grid-auto-rows: auto;

        }
    }
</style>

