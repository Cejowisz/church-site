<template>
    <footer>
        <div class="footer-first-child">
            <a href="https://facebook.com/morningbeauty" target="_blank"><i class="fa fa-facebook fa-2x"></i></a>
            <a href="https://facebook.com/morningbeauty" target="_blank"><i class="fa fa-instagram fa-2x"></i></a>
            <a href="https://telegram.com/morningbeauty" target="_blank"><i class="fa fa-instagram fa-2x"></i></a>
            <a href="https://twitter.com/morningbeauty" target="_blank"><i class="fa fa-twitter fa-2x"></i></a>
        </div>
        <small>Developed by <a href="http://africinnovate.com">AfricInnovate</a></small>
    </footer>
</template>

<style scoped>
    footer{
        display: grid;
        position: relative;
        grid-template-columns: repeat(4, 1fr);
        align-items: center;
        justify-items: center;
        color: #fefefe;
        height: 50px;
        padding: 15px 2px;
        background: #0D1F51;
    }
    .footer-first-child{
        grid-column: 2 / 3;
    }
    .footer-first-child a{
        margin: 0 20px;
    }
    footer a{
        color: #1d49ce;
        text-decoration: none;
        transition: 1s ease;
    }
    footer a:hover{
        color: #2059ff;
    }

    @media (max-width: 767px) {
        footer{
            height: 50px;
            grid-template-columns: 1fr;
        }
        .fa-3x{
            font-size: 1em;
        }
        .footer-first-child{
            grid-column: 1 / -1;
        }
    }

</style>