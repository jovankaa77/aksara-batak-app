<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Document</title>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
        @vite('resources/css/app.css')
    </head>

    <body class="font-jua bg-black text-white">
        <section
            class="relative w-full h-[100dvh] max-h-[900px] overflow-hidden flex items-center justify-center rounded-3xl">
            <!-- Background -->
            <img src="{{ asset('img/culture/hero-section-bg.svg') }}" alt="Background"
                class="absolute inset-0 w-full h-full object-cover -z-10 pointer-events-none select-none" />

            <div class="w-full max-w-[1440px] relative h-full">
                <div
                    class="absolute left-6 bottom-10 sm:left-10 md:left-20 lg:left-28 font-poppins flex flex-col gap-4">
                    <h1 class="font-bold text-8xl sm:text-5xl md:text-6xl lg:text-7xl">
                        Blog
                    </h1>
                    <p class="font-extralight w-full sm:w-5/6 md:w-3/4 text-sm sm:text-base">
                        Ikuti kami untuk menikmati cerita-cerita menarik tentang sejarah, kuliner, musik, dan banyak
                        lagi, serta temukan bagaimana budaya Batak tetap relevan dan terus berkembang hingga saat ini.
                        Bergabunglah dalam perjalanan untuk lebih mengenal kekayaan warisan budaya Batak yang tak
                        ternilai!
                    </p>
                </div>
            </div>
        </section>

        <section
            class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28 my-20 lg:my-28 flex flex-col gap-5 items-center">
            <h3 class="text-accent-yellow text-center">DESKRIPSI SELENGKAPNYA</h3>
            <h2 class="text-5xl font-medium tracking-wide text-center">Nikmati virtual tour disetiap detiknya</h2>
            <p class="font-opensans tracking-wide w-3/4 text-center">
                Gambar Di Bawah Ini Merupakan Virtual Tour Untuk Megetahui Keindahan Tempat Hiburan Secara Lansung Serta
                Mengispirasi Agar Semua Orang Bisa Memilih Destinasi Hiburan Selanjutnya
            </p>
            <div id="blog-posts-container" class="w-full">
                @include('blog._grid', ['posts' => $posts, 'pagination' => $pagination])
            </div>
        </section>

        <script>
            document.addEventListener('DOMContentLoaded', function() {
                document.getElementById('search-form').addEventListener('submit', function(e) {
                    e.preventDefault();
                    const form = e.target;
                    const query = new URLSearchParams(new FormData(form)).toString();

                    fetch(`{{ route('blog.index') }}?${query}`, {
                            headers: {
                                'X-Requested-With': 'XMLHttpRequest',
                            }
                        })
                        .then(res => res.text())
                        .then(html => {
                            document.getElementById('blog-posts-container').innerHTML = html;
                            window.history.pushState({}, '', `?${query}`);
                        });
                });

                document.addEventListener('click', function(e) {
                    if (e.target.closest('.pagination a')) {
                        e.preventDefault();
                        const url = e.target.closest('a').href;

                        fetch(url, {
                                headers: {
                                    'X-Requested-With': 'XMLHttpRequest',
                                }
                            })
                            .then(res => res.text())
                            .then(html => {
                                document.getElementById('blog-posts-container').innerHTML = html;
                                window.history.pushState({}, '', url);
                            });
                    }
                });
            });
        </script>
    </body>

</html>
