<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <title>Batak Songs</title>
        <script src="https://cdn.tailwindcss.com"></script>
        <style>
            .nav-button {
                transition: all 0.3s ease;
            }

            .nav-button:hover {
                transform: scale(1.1);
            }

            .nav-button:active {
                transform: scale(0.95);
            }

            .indicator-dot {
                transition: all 0.3s ease;
            }

            .indicator-dot.active {
                width: 2rem;
                background-color: #ffffff;
            }

            .scroll-container,
            #artist-scroll {
                scroll-behavior: smooth;
                scrollbar-width: none;
                -ms-overflow-style: none;
            }

            .scroll-container::-webkit-scrollbar,
            #artist-scroll::-webkit-scrollbar {
                display: none;
            }
        </style>
    </head>

    <body class="bg-black text-white font-poppins">
        <!-- Hero Section -->
        <section class="relative w-full h-[100dvh] max-h-[900px] overflow-hidden flex items-center justify-center">
            <img src="{{ asset('img/culture/hero-section-bg.svg') }}" alt="Background"
                class="absolute inset-0 w-full h-full object-cover -z-10 pointer-events-none select-none" />
            <div class="w-full max-w-[1440px] relative h-full">
                <div
                    class="absolute left-4 bottom-6 sm:left-10 sm:bottom-10 md:left-20 md:bottom-12 lg:left-28 lg:bottom-16 xl:bottom-20">
                    <h1 class="font-bold text-xl sm:text-3xl md:text-5xl md:text-6xl lg:text-7xl w-3/4">
                        Traditional Music Collection:
                    </h1>
                    <p class="font-extralight w-full sm:w-5/6 md:w-3/4 text-sm sm:text-base">
                        Listen to meaningful Batak songs anytime and anywhere.
                    </p>
                </div>
            </div>
        </section>

        <!-- Shazam Section -->
        <section class="w-full flex justify-center bg-[#1DBF9F]">
            <div class="w-full max-w-[1440px] flex justify-center py-24 px-4">
                <div class="relative w-full md:w-[80%] aspect-[1128/429] flex justify-center items-center">
                    <img src="{{ asset('img/songs/banner.svg') }}" alt="Shazam Banner"
                        class="absolute inset-0 w-full h-full object-cover rounded-3xl" />
                    <img src="{{ asset('img/songs/banner-logo.svg') }}" alt="Shazam Banner Logo"
                        class="absolute top-4 right-4 sm:top-6 sm:right-6 w-12 sm:w-16 md:w-20" />
                    <div class="z-50 text-center px-4">
                        <h2 class="text-[#F8B5D4] text-2xl sm:text-3xl mb-3 font-bold">Shazam</h2>
                        <h1 class="text-white text-xl sm:text-3xl md:text-5xl font-bold">VIRAL CHARTS</h1>
                        <p class="text-[#F8B5D4] my-5 text-sm sm:text-base">The fastest-growing songs this week, as
                            discovered<br />on
                            screens and socials.</p>
                        <button
                            class="text-[#36238A] rounded-lg font-bold bg-white px-6 py-3 sm:px-6 sm:py-4 text-sm sm:text-base">
                            SEE THE CHART
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <!-- Songs Scroll -->
        <section class="w-full max-w-[1440px] mx-auto px-4 py-10">
            <h2 class="font-bold text-3xl mt-4 mb-6">Batak Songs</h2>
            <hr class="mb-6" />
            <div class="relative">
                <div id="songs-container"
                    class="scroll-container flex gap-6 overflow-x-auto pb-4 px-2 border-l border-r border-slate-900 shadow-sm rounded-md mx-0 sm:mx-6 md:mx-12">
                    <div class="flex-none space-y-5 w-[90vw] sm:w-[60vw] md:w-[33.3333%]">
                        <iframe src="https://www.boomplay.com/embed/210246210/MUSIC?colType=5&colID=112784463"
                            class="w-full h-[300px] rounded-md shadow-md" frameborder="0"></iframe>
                        <iframe src="https://www.boomplay.com/embed/44530614/MUSIC?colType=5&colID=16152532"
                            class="w-full h-[300px] rounded-md shadow-md" frameborder="0"></iframe>
                    </div>

                    <div class="flex-none space-y-5 w-[90vw] sm:w-[60vw] md:w-[33.3333%]">
                        <iframe src="https://www.boomplay.com/embed/60943571/MUSIC?colType=5&colID=25554462"
                            class="w-full h-[300px] rounded-md shadow-md" frameborder="0"></iframe>
                        <iframe src="https://www.boomplay.com/embed/65895597/MUSIC?colType=5&colID=28538092"
                            class="w-full h-[300px] rounded-md shadow-md" frameborder="0"></iframe>
                    </div>

                    <div class="flex-none space-y-5 w-[90vw] sm:w-[60vw] md:w-[33.3333%]">
                        <iframe src="https://www.boomplay.com/embed/39388102/MUSIC?colType=5&colID=13438310"
                            class="w-full h-[300px] rounded-md shadow-md" frameborder="0"></iframe>
                        <iframe src="https://www.boomplay.com/embed/164528477/MUSIC?colType=5&colID=89059253"
                            class="w-full h-[300px] rounded-md shadow-md" frameborder="0"></iframe>
                    </div>

                    <div class="flex-none space-y-5 w-[90vw] sm:w-[60vw] md:w-[33.3333%]">
                        <iframe src="https://www.boomplay.com/embed/130855549/MUSIC?colType=5&colID=72126356"
                            class="w-full h-[300px] rounded-md shadow-md" frameborder="0"></iframe>
                        <iframe src="https://www.boomplay.com/embed/67344852/MUSIC?colType=5&colID=29455286"
                            class="w-full h-[300px] rounded-md shadow-md" frameborder="0"></iframe>
                    </div>

                    <div class="flex-none space-y-5 w-[90vw] sm:w-[60vw] md:w-[33.3333%]">
                        <iframe src="https://www.boomplay.com/embed/79315082/MUSIC?colType=5&colID=37741265"
                            class="w-full h-[300px] rounded-md shadow-md" frameborder="0"></iframe>
                        <iframe src="https://www.boomplay.com/embed/173987424/MUSIC?colType=5&colID=93841669"
                            class="w-full h-[300px] rounded-md shadow-md" frameborder="0"></iframe>
                    </div>
                </div>

                <!-- Indicators -->
                <div class="flex justify-center gap-2 mt-6">
                    <div id="indicator-0" class="indicator-dot w-2 h-2 rounded-full bg-white/30 cursor-pointer active">
                    </div>
                    <div id="indicator-1" class="indicator-dot w-2 h-2 rounded-full bg-white/30 cursor-pointer"></div>
                    <div id="indicator-2" class="indicator-dot w-2 h-2 rounded-full bg-white/30 cursor-pointer"></div>
                </div>

                <!-- Arrows -->
                <button id="scrollLeft"
                    class="nav-button absolute right-16 sm:right-14 md:right-16 -bottom-10 w-8 h-8 flex items-center justify-center bg-[#1DBF9F] hover:brightness-[80%] transition-all duration-200 rounded-full shadow z-10 bg-gray-400 cursor-not-allowed" onclick="scrollSection('songs-container', -300, 'scrollLeft', 'scrollRight')">
                    <svg width="9" height="15" viewBox="0 0 9 15" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M0.51121 6.80397C-0.0962343 7.40674 -0.0962343 8.38208 0.51121 8.98563L6.01088 14.4386C6.61832 15.0399 7.60299 15.0399 8.21043 14.4386C8.81788 13.8359 8.81788 12.859 8.21043 12.257L3.81132 7.89519L8.21043 3.53341C8.81788 2.93219 8.81788 1.9553 8.21043 1.35174C7.60299 0.749744 6.61832 0.749744 6.01088 1.35097L0.51121 6.80397Z"
                            fill="white" />
                    </svg>
                </button>

                <button id="scrollRight"
                    class="nav-button absolute right-4 -bottom-10 w-8 h-8 flex items-center justify-center bg-[#1DBF9F] hover:brightness-[80%] transition-all duration-200 rounded-full shadow z-10" onclick="scrollSection('songs-container', 300, 'scrollLeft', 'scrollRight')">
                    <!-- SVG right -->
                    <svg width="9" height="15" viewBox="0 0 9 15" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8.48879 8.99633C9.09624 8.39355 9.09624 7.41822 8.48879 6.81466L2.98912 1.36166C2.38168 0.760438 1.39701 0.760438 0.789568 1.36166C0.182123 1.96444 0.182123 2.94133 0.789568 3.54333L5.18868 7.90511L0.789568 12.2669C0.182123 12.8681 0.182123 13.845 0.789568 14.4485C1.39701 15.0505 2.38168 15.0505 2.98912 14.4493L8.48879 8.99633Z"
                            fill="white" />
                    </svg>
                </button>
            </div>
        </section>

        <!-- Artists Section -->
        <section class="w-full max-w-[1440px] mx-auto px-4 py-10">
            <h2 class="font-bold text-3xl mt-4">Batak Artist</h2>
            <hr class="my-6" />
            <div class="relative">
                <div id="artist-scroll" class="flex flex-nowrap gap-8 overflow-x-auto scroll-smooth pb-4 no-scrollbar"
                    onscroll="updateArrows('artist-scroll', 'left-arrow', 'right-arrow')">
                    <a href="https://open.spotify.com/intl-id/album/6cDuZ3P4YI2gdkfkFhRUW2"
                        class="min-w-[192px] text-center ">
                        <img class="w-full aspect-[7/10] object-cover rounded-xl shadow-md"
                            src="{{ asset('img/artis-batak/Charles Simbolon.webp') }}" alt="Charles Simbolon" />
                        <p class="mt-2 text-sm font-medium">Charles Simbolon</p>
                    </a>
                    <a href="https://open.spotify.com/intl-id/artist/1E4vBvQc0piKFtqzKvxLWB"
                        class="min-w-[192px] text-center">
                        <img class="w-full aspect-[7/10] object-cover rounded-xl shadow-md"
                            src="{{ asset('img/artis-batak/Viky Sianipar.webp') }}" alt="Viky Sianipar" />
                        <p class="mt-2 text-sm font-medium">Viky Sianipar</p>
                    </a>
                    <a href="https://open.spotify.com/intl-id/artist/2CpZI1FRfajLsqnKknm9Ba"
                        class="min-w-[192px] text-center">
                        <img class="w-full aspect-[7/10] object-cover rounded-xl shadow-md"
                            src="{{ asset('img/artis-batak/Trio Ambisi.webp') }}" alt="Trio Ambisi" />
                        <p class="mt-2 text-sm font-medium">Trio Ambisi</p>
                    </a>
                    <a href="https://open.spotify.com/search/jack%20marpaung" class="min-w-[192px] text-center">
                        <img class="w-full aspect-[7/10] object-cover rounded-xl shadow-md"
                            src="{{ asset('img/artis-batak/Jack Marpaung.webp') }}" alt="Jack Marpaung" />
                        <p class="mt-2 text-sm font-medium">Jack Marpaung</p>
                    </a>
                    <a href="https://open.spotify.com/intl-id/artist/7cBEpbivKEN3gj3ymwQogm"
                        class="min-w-[192px] text-center">
                        <img class="w-full aspect-[7/10] object-cover rounded-xl shadow-md"
                            src="{{ asset('img/artis-batak/Rita Butar Butar.webp') }}" alt="Rita Butar Butar" />
                        <p class="mt-2 text-sm font-medium">Rita Butar Butar</p>
                    </a>
                    <a href="https://open.spotify.com/intl-id/artist/5jkUGb40fLj5gL4s4ukiO1"
                        class="min-w-[192px] text-center">
                        <img class="w-full aspect-[7/10] object-cover rounded-xl shadow-md"
                            src="{{ asset('img/artis-batak/Trio Elexis.webp') }}" alt="Trio Elexis" />
                        <p class="mt-2 text-sm font-medium">Trio Elexis</p>
                    </a>
                    <a href="https://open.spotify.com/playlist/6Ehdwovc2d6zpBgzbLc1ky"
                        class="min-w-[192px] text-center">
                        <img class="w-full aspect-[7/10] object-cover rounded-xl shadow-md"
                            src="{{ asset('img/artis-batak/Nahum Situmorang.webp') }}" alt="Nahum Situmorang" />
                        <p class="mt-2 text-sm font-medium">Nahum Situmorang</p>
                    </a>
                    <a href="https://open.spotify.com/intl-id/artist/2P6fjwNbEEkoN4nY2Vljya"
                        class="min-w-[192px] text-center">
                        <img class="w-full aspect-[7/10] object-cover rounded-xl shadow-md"
                            src="{{ asset('img/artis-batak/Omega Trio.webp') }}" alt="Omega Trio" />
                        <p class="mt-2 text-sm font-medium">Omega Trio</p>
                    </a>
                    <a href="https://open.spotify.com/intl-id/artist/3xV62SH45zNKU9SBEgUArK"
                        class="min-w-[192px] text-center">
                        <img class="w-full aspect-[7/10] object-cover rounded-xl shadow-md"
                            src="{{ asset('img/artis-batak/Siantar Rap Foundation.webp') }}"
                            alt="Siantar Rap Foundation" />
                        <p class="mt-2 text-sm font-medium">Siantar Rap Foundation</p>
                    </a>
                </div>

                <!-- Artist arrows -->
                <button id="left-arrow"
                    class="absolute right-16 -bottom-10 w-8 h-8 flex items-center justify-center bg-[#1DBF9F] hover:brightness-[80%] transition-all duration-200 rounded-full shadow z-10 bg-gray-400 cursor-not-allowed" onclick="scrollSection('artist-scroll', -300, 'left-arrow', 'right-arrow')">
                    <svg width="9" height="15" viewBox="0 0 9 15" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M0.51121 6.80397C-0.0962343 7.40674 -0.0962343 8.38208 0.51121 8.98563L6.01088 14.4386C6.61832 15.0399 7.60299 15.0399 8.21043 14.4386C8.81788 13.8359 8.81788 12.859 8.21043 12.257L3.81132 7.89519L8.21043 3.53341C8.81788 2.93219 8.81788 1.9553 8.21043 1.35174C7.60299 0.749744 6.61832 0.749744 6.01088 1.35097L0.51121 6.80397Z"
                            fill="white" />
                    </svg>
                </button>

                <button id="right-arrow"
                    class="absolute right-4 -bottom-10 w-8 h-8 flex items-center justify-center bg-[#1DBF9F] hover:brightness-[80%] transition-all duration-200 rounded-full shadow z-10"
                    onclick="scrollSection('artist-scroll', 300, 'left-arrow', 'right-arrow')">
                    <svg width="9" height="15" viewBox="0 0 9 15" fill="none"
                        xmlns="http://www.w3.org/2000/svg">
                        <path
                            d="M8.48879 8.99633C9.09624 8.39355 9.09624 7.41822 8.48879 6.81466L2.98912 1.36166C2.38168 0.760438 1.39701 0.760438 0.789568 1.36166C0.182123 1.96444 0.182123 2.94133 0.789568 3.54333L5.18868 7.90511L0.789568 12.2669C0.182123 12.8681 0.182123 13.845 0.789568 14.4485C1.39701 15.0505 2.38168 15.0505 2.98912 14.4493L8.48879 8.99633Z"
                            fill="white" />
                    </svg>
                </button>
            </div>
        </section>

        <!-- More Charts Section -->
        <section class="w-full max-w-[1440px] mx-auto px-4 py-10">
            <h1 class="font-bold text-3xl mt-4 mb-6">More Charts</h1>
            <hr class="border-[#1DBF9F]" />
            <div class="flex flex-col lg:flex-row justify-between w-full my-10 gap-8">
                <!-- Chart 1 -->
                <div
                    class="relative w-full lg:w-1/2  aspect-[556/330] flex items-end lg:pb-10 md:pb-6 pb-2 lg:px-10 md:px-6 px-3 rounded-3xl overflow-hidden">
                    <img src="{{ asset('img/songs/more-chart-1.svg') }}" alt="More Chart"
                        class="absolute inset-0 w-full h-full object-cover" />
                    <div class="z-50 text-sm sm:text-base">
                        <h1 class="font-bold leading-[2.5rem] sm:leading-[3rem] text-xl sm:text-3xl md:text-5xl mb-4">
                            Top
                            200<br />Indonesia</h1>
                        <div class="flex flex-col sm:flex-row gap-4 sm:gap-10">
                            <div class="sm:w-4/5">
                                <p>Featuring songs from Melly Mike, Silet Open Up, Jacson Seran, Juan Reza & Diva Aurel,
                                    EMIN & JONY and
                                    more</p>
                            </div>
                            <div class="sm:w-1/5 flex justify-end items-end">
                                <button
                                    class="font-bold bg-[#236D5E]/30 px-8 py-2 sm:px-10 sm:py-3 rounded-xl text-base sm:text-xl">
                                    View
                                </button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Chart 2 -->
                <div
                    class="relative w-full lg:w-1/2  aspect-[556/330] flex items-end lg:pb-10 md:pb-6 pb-2 lg:px-10 md:px-6 px-3 rounded-3xl overflow-hidden">
                    <img src="{{ asset('img/songs/more-chart-2.svg') }}" alt="More Chart"
                        class="absolute inset-0 w-full h-full object-cover" />
                    <div class="z-50 text-sm sm:text-base">
                        <h1
                            class="font-bold leading-[3rem] sm:leading-[3rem] md:leading-[4rem] text-xl sm:text-3xl md:text-5xl mb-4">
                            Top
                            50<br />New York City</h1>
                        <div class="flex flex-col sm:flex-row gap-4 sm:gap-10">
                            <div class="sm:w-4/5">
                                <p>Featuring songs from MOLIY, Silent Addy, Skillibeng & Shenseea, PARTYNEXTDOOR &
                                    Drake, Eddie Vedder and
                                    more</p>
                            </div>
                            <div class="sm:w-1/5 flex justify-end items-end">
                                <button
                                    class="font-bold bg-white/30 px-8 py-2 sm:px-10 sm:py-3 rounded-xl text-base sm:text-xl">
                                    View
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <script>
            // Generic function to scroll a section and update arrow states
            function scrollSection(containerId, distance, leftArrowId, rightArrowId) {
                const container = document.getElementById(containerId);
                container.scrollBy({
                    left: distance,
                    behavior: 'smooth'
                });
                // Update state after scroll animation, a slight delay helps if scroll-behavior is smooth
                setTimeout(() => updateArrows(containerId, leftArrowId, rightArrowId), 300);
            }

            // Generic function to update arrow states based on scroll position
            function updateArrows(containerId, leftArrowId, rightArrowId) {
                const container = document.getElementById(containerId);
                const leftArrow = document.getElementById(leftArrowId);
                const rightArrow = document.getElementById(rightArrowId);

                const scrollLeft = container.scrollLeft;
                const maxScrollLeft = container.scrollWidth - container.clientWidth;

                // Disable/enable left arrow
                if (scrollLeft <= 0) {
                    leftArrow.classList.add('bg-gray-400', 'cursor-not-allowed');
                } else {
                    leftArrow.classList.remove('bg-gray-400', 'cursor-not-allowed');
                }

                // Disable/enable right arrow. A small tolerance is added due to potential sub-pixel rendering differences.
                if (scrollLeft >= maxScrollLeft - 5) {
                    rightArrow.classList.add('bg-gray-400', 'cursor-not-allowed');
                } else {
                    rightArrow.classList.remove('bg-gray-400', 'cursor-not-allowed');
                }
            }

            // --- Batak Songs Specific Logic ---
            const songContainer = document.getElementById('songs-container');
            const songIndicators = document.querySelectorAll('#songs-container + .flex.justify-center.gap-2 .indicator-dot');

            let currentSongIndex = 0;
            // Total number of "pages" or scrollable sections for Batak Songs
            // This needs to be calculated dynamically or based on your layout
            // For md:w-[33.3333%], there are 3 visible items, so (5 total items - 3 visible) + 1 = 3 pages for a full scroll
            // This is a simplified calculation and might need adjustment based on responsive behavior
            const totalSongPages = Math.ceil(songContainer.scrollWidth / songContainer
                .clientWidth); // This is more robust for responsive

            function getSongScrollAmount() {
                // Get the width of one "flex-none" item plus its gap (24px)
                const firstItem = songContainer.querySelector('.flex-none');
                if (firstItem) {
                    const itemWidth = firstItem.offsetWidth;
                    const computedStyle = window.getComputedStyle(songContainer);
                    const gap = parseInt(computedStyle.getPropertyValue('gap')) || 0; // Get gap from CSS
                    return itemWidth + gap;
                }
                return 0;
            }

            function scrollSongToIndex(index) {
                const scrollAmount = getSongScrollAmount();
                songContainer.scrollTo({
                    left: index * scrollAmount,
                    behavior: 'smooth',
                });
                currentSongIndex = index;
                updateSongIndicators();
                updateArrows('songs-container', 'scrollLeft', 'scrollRight'); // Use generic updateArrows
            }

            function updateSongIndicators() {
                songIndicators.forEach((indicator, index) => {
                    indicator.classList.toggle('active', index === currentSongIndex);
                });
            }

            // Event listener for song scroll container to update indicators
            songContainer.addEventListener('scroll', () => {
                const scrollAmount = getSongScrollAmount();
                if (scrollAmount === 0) return; // Avoid division by zero
                const newIndex = Math.round(songContainer.scrollLeft / scrollAmount);
                if (newIndex !== currentSongIndex) {
                    currentSongIndex = newIndex;
                    updateSongIndicators();
                    updateArrows('songs-container', 'scrollLeft', 'scrollRight');
                }
            });

            // Event listeners for song indicators
            songIndicators.forEach((indicator, index) => {
                indicator.addEventListener('click', () => {
                    scrollSongToIndex(index);
                });
            });


            // Initial calls on load and resize
            window.addEventListener('load', () => {
                // Initialize arrow states for both sections
                updateArrows('songs-container', 'scrollLeft', 'scrollRight');
                updateArrows('artist-scroll', 'left-arrow', 'right-arrow');
                // Initialize song indicators
                updateSongIndicators();
            });

            // Re-adjust scroll position and update arrows/indicators on window resize
            window.addEventListener('resize', () => {
                // For Batak Songs, ensure we scroll to the current index's position relative to new width
                scrollSongToIndex(currentSongIndex);
                updateArrows('songs-container', 'scrollLeft', 'scrollRight');
                updateArrows('artist-scroll', 'left-arrow', 'right-arrow');
            });
        </script>
    </body>

</html>
