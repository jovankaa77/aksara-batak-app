<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta http-equiv="X-UA-Compatible" content="ie=edge" />
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.7.2/css/all.min.css"
            integrity="sha512-Evv84Mr4kqVGRNSgIGL/F/aIDqQb7xQ2vcrdIwxfjThSH8CSR7PBEakCr51Ck+w+/U6swU2Im1vVX0SVk9ABhg=="
            crossorigin="anonymous" referrerpolicy="no-referrer" />
        <title>Aksara Translator</title>

        @vite(['resources/css/app.css', 'resources/css/virtual-keyboard.css', 'resources/js/app.js'])

        <script>
            /**
             * Membacakan teks dari elemen input yang ditentukan.
             * @param {string} inputSelector Selector CSS untuk elemen input (misal: '#inputLatin').
             */
            function speakTextFromInput(inputSelector) {
                const inputElement = document.querySelector(inputSelector);

                if (!inputElement) {
                    console.error("Elemen input tidak ditemukan. Periksa selector Anda.");
                    return;
                }

                const input = inputElement.value;
                if (!input.trim()) {
                    alert("Masukkan teks dulu sebelum dibacakan.");
                    return;
                }

                const utterance = new SpeechSynthesisUtterance(input);
                utterance.lang = "id-ID";

                const voices = speechSynthesis.getVoices();
                const maleVoice = voices.find(
                    (v) => v.lang === "id-ID" && v.name.toLowerCase().includes("male")
                );

                if (maleVoice) {
                    utterance.voice = maleVoice;
                } else {
                    console.log("Suara laki-laki tidak ditemukan. Menggunakan default.");
                }

                utterance.rate = 0.95;
                utterance.pitch = 1;

                const timeout = setTimeout(() => {
                    speechSynthesis.cancel();
                    console.log("🔇 Bacaan dihentikan otomatis setelah 5 detik.");
                }, 5000);

                utterance.onend = () => {
                    clearTimeout(timeout);
                    console.log("✅ Bacaan selesai sebelum timeout.");
                };

                speechSynthesis.speak(utterance);
            }

            function startDictationTo(selector) {
                const input = document.querySelector(selector);

                const micIcon = document.getElementById("micIcon");
                const stopIcon = document.getElementById("stopIcon");
                if (!input) {
                    alert("Elemen tidak ditemukan: " + selector);
                    return;
                }

                // Cek dukungan browser
                const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;
                if (!SpeechRecognition) {
                    alert("Browser kamu tidak mendukung Speech Recognition.");
                    return;
                }

                const recognition = new SpeechRecognition();
                recognition.lang = "id-ID"; // Bahasa Indonesia
                recognition.interimResults = false;
                recognition.maxAlternatives = 1;

                recognition.onstart = () => {
                    micIcon.classList.add("hidden");
                    stopIcon.classList.remove("hidden");
                    input.placeholder = "Sedang mendengarkan...";
                };

                recognition.onerror = (event) => {
                    stopIcon.classList.add("hidden");
                    micIcon.classList.remove("hidden");
                };

                recognition.onresult = (event) => {
                    const transcript = event.results[0][0].transcript;
                    stopIcon.classList.add("hidden");
                    micIcon.classList.remove("hidden");
                    input.value = transcript;
                    transliterateLatinToBatak('#inputLatin', '#outputBatak');
                };

                recognition.onend = () => {
                    stopIcon.classList.add("hidden");
                    micIcon.classList.remove("hidden");
                    input.placeholder = "Masukkan teks...";
                };

                recognition.start();
            }

            const toggleVirtualKeyboard = () => {
                const virtualKeyboard = document.getElementById('virtual-keyboard')
                virtualKeyboard.classList.toggle('hidden');
            }


            // === batak2latn dari script kamu ===
            var batak2latn = {
                "᯦": "​",
                "ᯀ": "a",
                "ᯁ": "a",
                "ᯃ": "ha",
                "ᯄ": "ha",
                "ᯂ": "ha",
                "ᯅ": "ba",
                "ᯆ": "ba",
                "ᯇ": "pa",
                "ᯈ": "pa",
                "ᯉ": "na",
                "ᯊ": "na",
                "ᯋ": "wa",
                "ᯌ": "wa",
                "ᯍ": "wa",
                "ᯎ": "ga",
                "ᯏ": "ga",
                "ᯐ": "ja",
                "ᯑ": "da",
                "ᯒ": "ra",
                "ᯓ": "ra",
                "ᯔ": "ma",
                "ᯕ": "ma",
                "ᯖ": "ta",
                "ᯗ": "ta",
                "ᯘ": "sa",
                "ᯙ": "sa",
                "ᯚ": "sa",
                "ᯛ": "ya",
                "ᯜ": "ya",
                "ᯞ": "la",
                "ᯟ": "la",
                "ᯡ": "ca",
                "ᯂᯧ": "qx",
                "ᯇᯧ": "fx",
                "ᯠ": "nya",
                "ᯝ": "nga",
                "ᯢ": "nda",
                "ᯣ": "mba",
                "ᯤ": "i",
                "ᯥ": "u",
                "ᯧ": "e",
                "ᯩ": "é",
                "ᯇ᯲": "f",
                "ᯪ": "i",
                "ᯫ": "i",
                "ᯬ": "o",
                "ᯭ": "o",
                "ᯨ": "o",
                "ᯮ": "u",
                "ᯱ": "h",
                "ᯰ": "ng",
                "᯳": "​",
                "᯲": "​",
                "ᯀᯧ᯲": "x",
                "ᯂ᯲": "q",
                // Komentar satu dari ini agar tidak error
                // "​": '#',
                // "​": ' '
            };


            // === Membuat latn2batak otomatis ===
            const latn2batak = {};
            for (const [batak, latin] of Object.entries(batak2latn)) {
                if (!latn2batak[latin]) {
                    latn2batak[latin] = batak;
                }
            }

            /**
             * Menerjemahkan teks Latin ke aksara Batak.
             * @param {string} inputSelector Selector CSS untuk elemen input (misal: '#inputLatin').
             * @param {string} outputSelector Selector CSS untuk elemen output (misal: '#output').
             */
            function transliterateLatinToBatak(inputSelector, outputSelector) {
                const inputElement = document.querySelector(inputSelector);
                const outputElement = document.querySelector(outputSelector);

                if (!inputElement || !outputElement) {
                    console.error("Elemen input atau output tidak ditemukan. Periksa selector Anda.");
                    return;
                }

                const input = inputElement.value.toLowerCase();
                let result = "";
                let i = 0;

                const vowels = {
                    a: "", // inherent vowel
                    i: "ᯤ",
                    u: "ᯥ",
                    e: "ᯧ",
                    o: "ᯬ",
                    é: "ᯩ",
                };

                const consonants = {
                    h: "ᯄ",
                    b: "ᯅ",
                    p: "ᯇ",
                    n: "ᯉ",
                    w: "ᯋ",
                    g: "ᯎ",
                    j: "ᯐ",
                    d: "ᯑ",
                    r: "ᯒ",
                    m: "ᯔ",
                    t: "ᯖ",
                    s: "ᯘ",
                    y: "ᯛ",
                    l: "ᯞ",
                    c: "ᯡ",
                    k: "ᯄ᯦", // kh
                    z: "ᯘ",
                    v: "ᯅ",
                    f: "ᯇ᯲", // ditambahkan
                };

                const specials = ["fx", "qx", "mba", "nda", "nya", "nga", "ng", "f", "q", "x"];

                while (i < input.length) {
                    let matched = false;

                    for (let sp of specials) {
                        const segment = input.substr(i, sp.length);
                        if (segment === sp && latn2batak[sp]) {
                            result += latn2batak[sp];
                            i += sp.length;
                            matched = true;
                            break;
                        }
                    }
                    if (matched) continue;

                    const char1 = input[i];
                    const char2 = input[i + 1] || "";

                    if (consonants[char1] && vowels[char2] !== undefined) {
                        result += consonants[char1] + vowels[char2];
                        i += 2;
                        continue;
                    }

                    if (consonants[char1]) {
                        result += consonants[char1];
                        i++;
                        continue;
                    }

                    if (vowels[char1] !== undefined) {
                        result += "ᯀ" + vowels[char1]; // vokal mandiri
                        i++;
                        continue;
                    }

                    result += char1; // karakter tidak dikenal
                    i++;
                }

                outputElement.textContent = result;
            }
        </script>
    </head>

    <body class="bg-black text-white font-poppins">
        <!-- Hero Section -->
        <section class="relative w-full h-[100dvh] max-h-[900px] overflow-hidden flex items-center justify-center">
            <img src="{{ asset('img/culture/hero-section-bg.svg') }}" alt="Background"
                class="absolute inset-0 w-full h-full object-cover -z-10 pointer-events-none select-none" />
            <div class="w-full max-w-[1440px] relative h-full">
                <div
                    class="absolute left-4 bottom-6 sm:left-10 sm:bottom-10 md:left-20 md:bottom-12 lg:left-28 lg:bottom-16 xl:bottom-20">
                    <h1 class="font-bold text-xl sm:text-3xl md:text-6xl lg:text-7xl w-3/4">
                        Aksara Batak Translator
                    </h1>
                    <p class="font-extralight w-full sm:w-5/6 md:w-3/4 text-sm sm:text-base">
                        Explore the beauty of Batak script. Quickly and accurately translate text to Batak script.
                    </p>
                </div>
            </div>
        </section>

        <section class="max-w-[1440px] mx-auto my-20 space-y-4 px-4">
            <h2 class="text-[#FCF800] text-center text-xl font-semibold">Tulis • Baca • Lestarikan</h2>
            <h1 class="font-bold text-4xl text-center">Aksara Batak untuk Semua</h1>
            <p class="pt-4 text-lg text-center">Jelajahi keindahan aksara Batak. Terjemahkan teks dari dan ke aksara
                Batak dengan cepat dan akurat.</p>

            <div class="flex flex-col md:flex-row gap-5 mt-8 items-stretch">
                <div class="flex md:w-1/2 flex-col shadow-sm overflow-hidden">
                    <h3 class="text-2xl">Teks Latin</h3>
                    <textarea id="inputLatin" oninput="autoResize(this); debounceTransliterate()"
                        class="grow min-h-[250px] max-h-[1000px] overflow-hidden resize-none border-t border-r border-l p-6 border-[#3C3C3C] rounded-t-3xl focus:outline-0" ></textarea>
                    <div
                        class="flex justify-between pt-2 px-4 pb-4 border-l border-r border-b rounded-b-3xl border-[#3C3C3C]">
                        <button onclick="startDictationTo('#inputLatin')" class="cursor-pointer" id="dictation-btn">
                            <div id="micIcon">
                                <i class="fa-solid fa-microphone text-[#4F4E4E] text-xl"></i>
                            </div>
                            <div id="stopIcon" class="hidden">
                                <i class="fa-solid fa-stop text-[#4F4E4E] text-xl"></i>
                            </div>
                        </button>
                        <button onclick="toggleVirtualKeyboard()" class="cursor-pointer">
                            <i class="fa-solid fa-keyboard text-[#4F4E4E] text-xl"></i>
                        </button>
                    </div>
                </div>

                <div class="flex md:w-1/2 flex-col shadow-sm overflow-hidden">
                    <h3 class="text-2xl">Aksara Batak</h3>
                    <div id="outputBatak"
                        class="min-h-[250px] border-t border-r border-l p-6 border-[#262626] bg-[#262626] rounded-t-3xl break-words">
                    </div>
                    <div
                        class="flex justify-end gap-5 p-4 pt-2 border-l border-r border-b border-[#3C3C3C] bg-[#262626] rounded-b-3xl">
                        <button onclick="speakTextFromInput('#inputLatin')" class="cursor-pointer">
                            <i class="fa-solid fa-volume-high text-[#7D7D7D] text-xl"></i>
                        </button>
                        <button onclick="copyToClipboard('#outputBatak')" class="cursor-pointer">
                            <i class="fa-solid fa-copy text-[#7D7D7D] text-xl"></i>
                        </button>
                    </div>
                </div>
            </div>
        </section>

        <div id="virtual-keyboard" class="hidden">
            <div class="simple-keyboard text-black"></div>
        </div>

        <script src="https://cdn.jsdelivr.net/npm/simple-keyboard@latest/build/index.js"></script>
        <script>
            const Keyboard = window.SimpleKeyboard.default;

            const myKeyboard = new Keyboard({
                onChange: input => onChange(input),
                onKeyPress: button => onKeyPress(button)
            });

            function onChange(input) {
                document.querySelector("#inputLatin").value = input;
                debounceTransliterate();
            }

            function onKeyPress(button) {
                console.log("Button pressed", button);
            }
        </script>

        <script>
            // Debounce function
            let debounceTimer;

            function debounceTransliterate() {
                clearTimeout(debounceTimer);
                debounceTimer = setTimeout(() => {
                    transliterateLatinToBatak('#inputLatin', '#outputBatak');
                }, 300); // Penundaan 300ms setelah ketikan terakhir
            }

            // Fungsi untuk menyalin teks ke clipboard
            function copyToClipboard(selector) {
                const element = document.querySelector(selector);
                if (!element) {
                    console.error("Elemen tidak ditemukan untuk disalin. Periksa selector Anda.");
                    return;
                }

                // Gunakan navigator.clipboard.writeText() untuk cara modern
                if (navigator.clipboard && navigator.clipboard.writeText) {
                    navigator.clipboard.writeText(element.textContent || element.value)
                        .then(() => {
                            alert('Teks berhasil disalin!');
                        })
                        .catch(err => {
                            console.error('Gagal menyalin teks: ', err);
                            alert('Gagal menyalin teks.');
                        });
                } else {
                    // Fallback untuk browser lama
                    const tempTextArea = document.createElement('textarea');
                    tempTextArea.value = element.textContent || element.value;
                    document.body.appendChild(tempTextArea);
                    tempTextArea.select();
                    document.execCommand('copy');
                    document.body.removeChild(tempTextArea);
                    alert('Teks berhasil disalin (fallback)!');
                }
            }

            function autoResize(textarea) {
                const minHeight = 250; // sesuai dengan Tailwind min-h-[100px]

                textarea.style.height = 'auto';
                const newHeight = Math.max(textarea.scrollHeight, minHeight);
                textarea.style.height = newHeight + 'px';
            }
        </script>
    </body>

</html>
