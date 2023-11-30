<footer class="footer-bg w-full lg:w-1/2 lg:mx-auto">
    <section class="bg-white z-10 flex justify-between items-center px-10 py-5 font-zilla">
        <p class="text-xl text-black drop-shadow">{!! __('footer.buyCoffee') !!} <i class="fa-solid fa-mug-hot"></i></p>
        <p><a href="#" class="buy-coffee-btn text-lg block bg-[#7B5A00]/80 px-12 py-1 drop-shadow">{!! __('footer.buyCoffeeBtn') !!}</a></p>
    </section>
    <section class="lg:px-56">
        <div class="flex justify-around items-center mx-auto py-10 px-5">
            <span class="drop-shadow text-xl">{!! __('footer.followMe') !!}: </span>
            <a href="#"><i class="fa-brands fa-instagram drop-shadow text-2xl hover:text-gray-100/50"></i></a>
            <a href="#"><i class="fa-brands fa-telegram drop-shadow text-2xl hover:text-gray-100/50"></i></a>
            <a href="#"><i class="fa-brands fa-youtube drop-shadow text-2xl hover:text-gray-100/50"></i></a>
            <a href="#"><i class="fa-brands fa-x-twitter drop-shadow text-2xl hover:text-gray-100/50"></i></a>
        </div>
        <!-- Latest Comics -->
        <div class="flex justify-around items-center mx-auto mt-5 px-10 pb-10">
            <span class="first-letter:uppercase">{!! __('footer.latest') !!}: </span>
            <div class="flex flex-col justify-center items-center">
                <span class="text-sm my-2 hover:text-gray-300"><a href="#">lorem ipsum dolor</a></span>
                <span class="text-sm my-2 hover:text-gray-300"><a href="#">lorem ipsum dolor</a></span>
                <span class="text-sm my-2 hover:text-gray-300"><a href="#">lorem ipsum dolor</a></span>
                <span class="text-sm my-2 hover:text-gray-300"><a href="#">lorem ipsum dolor</a></span>
            </div>
        </div>
    </section>
</footer>
