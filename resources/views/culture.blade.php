<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Batak Culture</title>
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>

    <body class="font-jua bg-black text-white">
        <section class="relative w-full h-[100dvh] max-h-[900px] overflow-hidden flex items-center justify-center">
            <!-- Background -->
            <img src="{{ asset('img/culture/hero-section-bg.svg') }}" alt="Background"
                class="absolute inset-0 w-full h-full object-cover -z-10 pointer-events-none select-none" />

            <div class="w-full max-w-[1440px] relative h-full">
                <div class="absolute left-6 bottom-10 sm:left-10 md:left-20 lg:left-28 font-poppins">
                    <h1 class="font-bold text-4xl sm:text-5xl md:text-6xl lg:text-7xl">
                        Batak Culture
                    </h1>
                    <p class="font-extralight w-full sm:w-5/6 md:w-3/4 text-sm sm:text-base">
                        360-Degree View Control: Users can rotate the view to explore all angles of a space or scene,
                        providing a more realistic experience.
                    </p>
                </div>
            </div>
        </section>

        <section
            class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28 my-20 lg:my-28 flex flex-col lg:flex-row justify-between gap-12">
            <div class="w-full lg:w-1/2 flex flex-col justify-between gap-6">
                <h2 class="text-[#E5D046]">TOUR GUIDE</h2>
                <h3 class="font-bold text-2xl sm:text-3xl md:text-4xl leading-snug tracking-wider">
                    Hi everyone, We are Maraksara Batak <span class="text-[#E5D046]">Culture</span>
                    <span class="text-[#1DBF9F]">Indon</span><span class="text-[#E5D046]">esian</span> Destinasi Wisata
                    Indonesia
                </h3>
                <p class="font-opensans text-sm sm:text-base md:text-lg lg:w-3/4">
                    Jelajahi kekayaan warisan budaya Batak, mulai dari musik, tarian, hingga
                    bahasa memikat. Nikmati pengalaman interaktif yang menghadirkan tradisi dan cerita Batak secara
                    langsung ke perangkatmu.
                </p>
                <button
                    class="w-full rounded-full bg-[#1DBF9F] shadow shadow-[#E5D046] h-11 font-opensans font-semibold text-sm sm:text-base">
                    Info Lebih Lanjut
                </button>
            </div>
            <div class="w-full lg:w-1/2 flex justify-center lg:justify-end">
                <img src="{{ asset('img/culture/tour-guide-section.svg') }}" alt="Tour Guide"
                    class="w-full max-w-md" />
            </div>
        </section>

        <section class="w-full max-w-[1440px] mx-auto px-6 sm:px-12 lg:px-28">
            <h3 class="text-[#E5D046] text-center my-3 text-sm sm:text-base">KHARISMA INDONESIA</h3>
            <h2 class="text-center text-2xl sm:text-3xl md:text-4xl">Temukan Keindahan Di Negara Indonesia</h2>
            <div class="flex flex-col lg:justify-between lg:flex-row w-full my-10 gap-10">
                <div class="w-full lg:w-1/2 flex justify-center items-center">
                    <img src="{{ asset('img/culture/kharisma-indonesia-section.svg') }}" alt="Kharisma Indonesia"
                        class="w-full max-w-md" />
                </div>
                <div class="w-full lg:w-1/2 flex flex-col justify-center gap-5">
                    <h3 class="text-[#E5D046]">KEBERAGAMAN INDONESIA</h3>
                    <h2 class="text-2xl sm:text-3xl md:text-4xl leading-snug tracking-wide">
                        Keberagaman budaya yang bisa anda nikmati hanya di Indonesia!
                    </h2>
                    <p class="font-opensans text-sm sm:text-base">
                        Beragam budaya bisa kalian temukan di Indonesia. Mulai dari Bahasa Daerah,
                        Tari Tradisional, Senjata Traditional, Baju Daerah dan Lagu Daerah yang bisa kalian nikmati di
                        Indonesia yang kaya akan budaya dan keberagamanya.
                    </p>
                    <p class="text-[#E5D046]">Culture</p>
                </div>
            </div>
        </section>

        <section class="my-20 lg:my-28 px-6 sm:px-12 lg:px-28 w-full max-w-[1440px] mx-auto">
            <div class="w-full flex flex-col lg:flex-row bg-white text-black">
                <div class="w-full lg:w-1/2">
                    <img src="{{ asset('img/culture/footer-bg.svg') }}" alt="The Batak Culture" class="w-full" />
                </div>
                <div class="w-full lg:w-1/2 flex items-center p-6 sm:p-10 lg:pl-16">
                    <p class="font-opensans text-base sm:text-lg md:text-2xl lg:w-3/4">
                        Batak is the third biggest ethnic group in Indonesia.
                        <sup class="underline">[s]</sup> This name is used to identify multiple ethnicities originating
                        from
                        North Sumatra.
                    </p>
                </div>
            </div>
        </section>
    </body>

</html>
