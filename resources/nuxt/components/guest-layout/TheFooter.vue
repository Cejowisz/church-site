<template>
    <footer>
        <a class="footer-first-child" href="https://facebook.com/wisemandesigns" target="_blank"><i class="fa fa-facebook fa-3x"></i></a>
        <a href="https://facebook.com/wisemandesigns" target="_blank"><i class="fa fa-instagram fa-3x"></i></a>
        <a href="https://telegram.com/wisemandesigns" target="_blank"><i class="fa fa-instagram fa-3x"></i></a>
        <a href="https://twitter.com/Wisemandesigns" target="_blank"><i class="fa fa-twitter fa-3x"></i></a>
    </footer>
</template>

<style scoped>
    footer{
        display: grid;
        position: relative;
        grid-template-columns: repeat(6, 1fr);
        align-content: center;
        justify-items: center;
        color: #fefefe;
        height: 50px;
        background: #0D1F51;
    }
    .footer-first-child{
        grid-column: 2 / 3;
    }

    @media (max-width: 767px) {
        footer{
            height: 50px;

        }
        .fa-3x{
            font-size: 1em;
        }
    }

</style>