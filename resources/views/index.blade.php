<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Undangan Digital - {{ $penerima->namapenerima ?? 'NULL' }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Great+Vibes&display=swap" rel="stylesheet">
    <link href="https://unpkg.com/aos@2.3.4/dist/aos.css" rel="stylesheet">
    <meta property="og:title" content="Undangan Digital - {{ $penerima->namapenerima ?? 'NULL' }}" />
    <meta property="og:image" content="{{ asset('storage/'. $undangan->identitaspengantin->fotopengantin??'') }}" />
    <meta property="og:type" content="website" />
    <style>
        html {
            font-size: 15px;
            scroll-behavior: smooth;
        }

        @media (max-width: 640px) {
            html {
                font-size: 17px;
            }
        }
        .nav-item {
            display: flex;
            flex-direction: column;
            align-items: center;
            gap: 4px;
            font-size: 1.4rem;   /* sebelumnya 1.25 */
            color: #db2777;
            transition: transform .25s ease, color .25s ease;
        }

        .nav-text {
            font-size: 0.8rem;
        }

        @media (min-width: 768px) {
            .nav-item {
                font-size: 1.6rem;
            }
            .nav-text {
                font-size: 0.95rem;
            }
        }
        .nav-item:hover {
            transform: scale(1.1);
            color: #be185d;
        }

        .no-scrollbar::-webkit-scrollbar {
            display: none;
        }

        .no-scrollbar {
            -ms-overflow-style: none;  /* IE & Edge */
            scrollbar-width: none;     /* Firefox */
        }

        .mybackground {
            background-color: #151416;
background-image: url("data:image/svg+xml,%3Csvg width='180' height='180' viewBox='0 0 180 180' xmlns='http://www.w3.org/2000/svg'%3E%3Cpath d='M81.28 88H68.413l19.298 19.298L81.28 88zm2.107 0h13.226L90 107.838 83.387 88zm15.334 0h12.866l-19.298 19.298L98.72 88zm-32.927-2.207L73.586 78h32.827l.5.5 7.294 7.293L115.414 87l-24.707 24.707-.707.707L64.586 87l1.207-1.207zm2.62.207L74 80.414 79.586 86H68.414zm16 0L90 80.414 95.586 86H84.414zm16 0L106 80.414 111.586 86h-11.172zm-8-6h11.173L98 85.586 92.414 80zM82 85.586L87.586 80H76.414L82 85.586zM17.414 0L.707 16.707 0 17.414V0h17.414zM4.28 0L0 12.838V0h4.28zm10.306 0L2.288 12.298 6.388 0h8.198zM180 17.414L162.586 0H180v17.414zM165.414 0l12.298 12.298L173.612 0h-8.198zM180 12.838L175.72 0H180v12.838zM0 163h16.413l.5.5 7.294 7.293L25.414 172l-8 8H0v-17zm0 10h6.613l-2.334 7H0v-7zm14.586 7l7-7H8.72l-2.333 7h8.2zM0 165.414L5.586 171H0v-5.586zM10.414 171L16 165.414 21.586 171H10.414zm-8-6h11.172L8 170.586 2.414 165zM180 163h-16.413l-7.794 7.793-1.207 1.207 8 8H180v-17zm-14.586 17l-7-7h12.865l2.333 7h-8.2zM180 173h-6.613l2.334 7H180v-7zm-21.586-2l5.586-5.586 5.586 5.586h-11.172zM180 165.414L174.414 171H180v-5.586zm-8 5.172l5.586-5.586h-11.172l5.586 5.586zM152.933 25.653l1.414 1.414-33.94 33.942-1.416-1.416 33.943-33.94zm1.414 127.28l-1.414 1.414-33.942-33.94 1.416-1.416 33.94 33.943zm-127.28 1.414l-1.414-1.414 33.94-33.942 1.416 1.416-33.943 33.94zm-1.414-127.28l1.414-1.414 33.942 33.94-1.416 1.416-33.94-33.943zM0 85c2.21 0 4 1.79 4 4s-1.79 4-4 4v-8zm180 0c-2.21 0-4 1.79-4 4s1.79 4 4 4v-8zM94 0c0 2.21-1.79 4-4 4s-4-1.79-4-4h8zm0 180c0-2.21-1.79-4-4-4s-4 1.79-4 4h8z' fill='%23cf971f' fill-opacity='0.15' fill-rule='evenodd'/%3E%3C/svg%3E");
        }

        



    </style>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>










<body class="bg-gray-100 overflow-x-hidden mybackground">

<nav id="mainContentNav"
    class="fixed bottom-2 md:bottom-6 left-1/2 -translate-x-1/2 z-50 w-[95%] max-w-[900px] opacity-0 transition-opacity duration-1000">
    
    <div class="backdrop-blur-xl bg-black/60 border border-white/10 shadow-2xl rounded-2xl px-1">
        <div class="flex items-center min-h-[65px] overflow-x-auto scrollbar-hide scroll-smooth">
            
            <div class="flex items-center justify-between w-full min-w-max px-4 gap-4">
                
                <a href="#home" class="nav-item min-w-[64px] group flex flex-col items-center">
                    <span class="text-xl group-hover:scale-110 mt-3 transition-transform">🏠</span>
                    <span class="nav-text text-[10px] uppercase tracking-tighter pt-1">TOP</span>
                </a>

                <a href="#date" class="nav-item min-w-[64px] group flex flex-col items-center">
                    <span class="text-xl group-hover:scale-110 mt-3 transition-transform">📅</span>
                    <span class="nav-text text-[10px] uppercase tracking-tighter pt-1">Acara</span>
                </a>

                <a href="#pengantin" class="nav-item min-w-[64px] group flex flex-col items-center">
                    <span class="text-xl group-hover:scale-110 mt-3 transition-transform">👩‍❤️‍👨</span>
                    <span class="nav-text text-[10px] uppercase tracking-tighter pt-1">Pengantin</span>
                </a>

                <a href="#gallery" class="nav-item min-w-[64px] group flex flex-col items-center">
                    <span class="text-xl group-hover:scale-110 mt-3 transition-transform">🖼️</span>
                    <span class="nav-text text-[10px] uppercase tracking-tighter pt-1">Gallery</span>
                </a>

                <a href="#maps" class="nav-item min-w-[64px] group flex flex-col items-center">
                    <span class="text-xl group-hover:scale-110 mt-3 transition-transform">📍</span>
                    <span class="nav-text text-[10px] uppercase tracking-tighter pt-1">Lokasi</span>
                </a>
                
                <a href="#bank" class="nav-item min-w-[64px] group flex flex-col items-center">
                    <span class="text-xl group-hover:scale-110 mt-3 transition-transform">💳</span>
                    <span class="nav-text text-[10px] uppercase tracking-tighter pt-1">Bank</span>
                </a>

                <a href="#comments" class="nav-item min-w-[64px] group flex flex-col items-center">
                    <span class="text-xl group-hover:scale-110 mt-3 transition-transform">💬</span>
                    <span class="nav-text text-[10px] uppercase tracking-tighter pt-1">Ucapan</span>
                </a>

            </div>
        </div>
    </div>
</nav>

    <!-- 🔒 OPENING -->
<div
    id="opening"
    class="fixed inset-0 z-50 flex items-center justify-center 
           overflow-hidden transition-all duration-[1000] ease-[cubic-bezier(0.22,1,0.36,1)]"
>

    <!-- Background -->
    <div class="absolute inset-0">
        <img 
            src="{{ asset('storage/'. $undangan->identitaspengantin->fotopengantin??'') }}"
            class="w-full h-full object-cover"
            loading="lazy"
            data-aos="zoom-out" data-aos-delay="300"
        >
        <div class="absolute inset-0 bg-gradient-to-b from-black/80 via-black/75 to-black/90"></div>
    </div>

    <!-- Content -->
    <div class="relative text-center px-6 max-w-3xl animate-fade-up">


        <h2 class="text-2xl md:text-3xl font-light text-neutral-200 mb-2">
            Kepada Yth.
        </h2>

        <h3 class="text-3xl md:text-4xl font-medium text-white mb-6 " style="font-family: -apple-system, BlinkMacSystemFont, 'Segoe UI', Roboto, Oxygen, Ubuntu, Cantarell, 'Open Sans', 'Helvetica Neue', sans-serif;">
            {{ $penerima->namapenerima ?? 'NULL' }}
        </h3>

        <div class="inline-flex items-center gap-3 mb-6">
            <span class="w-12 h-[1px] bg-jawa-gold"></span>
            <span class="text-xs font-bold tracking-[0.4em] text-jawa-gold uppercase">✦</span>
            <span class="w-12 h-[1px] bg-jawa-gold"></span>
        </div>

        <p class="text-sm md:text-base text-neutral-300 mb-8 leading-relaxed">
            <i>
                {{ $text1 }}
            </i>
        </p>

                
                <table width="100%" class="mb-7">
                    <tr>
                        <td align="right" colspan="2">
                             <h1 style="font-family: 'Great Vibes', cursive;"
                                class="text-6xl md:text-7xl text-jawa-beige self-start tracking-normal transition-all duration-700 hover:translate-x-2">
                                {{ $undangan->identitaspengantin->namapengantinwanita }}
                            </h1>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                        <td align="right">
                            <span class="text-5xl md:text-7xl text-jawa-gold self-center my-[-10px] md:my-[-30px] z-20 transition-all duration-700" 
                                style="font-family: 'Great Vibes', cursive;">
                                &
                            </span>
                        </td>
                        <td></td>
                    </tr>
                    <tr>
                        <td></td>
                        <td></td>
                        <td align="left">
                            <h1 style="font-family: 'Great Vibes', cursive;"
                                class="text-6xl md:text-7xl text-jawa-beige self-end tracking-normal transition-all duration-700 hover:-translate-x-2 -ml-5">
                                {{ $undangan->identitaspengantin->namapengantinpria }}
                            </h1>
                        </td>
                    </tr>
                </table>
                

        <!-- Button Lebih Halus -->
        <button
            onclick="openInvitation()"
            class="relative group px-12 py-4 overflow-hidden
                border border-jawa-gold/60
                text-jawa-gold tracking-[0.25em]
                uppercase text-sm md:text-base
                transition-all duration-500
                hover:text-black"
        >

            <!-- Background glow saat hover -->
            <span class="absolute inset-0 bg-jawa-gold 
                        translate-y-full group-hover:translate-y-0
                        transition-transform duration-500 ease-out">
            </span>

            <!-- Shine animation -->
            <span class="absolute inset-0 opacity-0 group-hover:opacity-100">
                <span class="absolute top-0 left-[-75%] w-1/2 h-full 
                            bg-gradient-to-r from-transparent via-white/40 to-transparent
                            skew-x-[-20deg]
                            animate-shine">
                </span>
            </span>

            <!-- Text -->
            <span class="relative z-10">
                Buka Undangan
            </span>

        </button>

    </div>

</div>

<audio id="bgMusic" loop>
    <source src="{{ url('backgroundku/music1.mp3', []) }}" type="audio/mpeg">
</audio>

<button
    id="musicToggle"
    onclick="toggleMusic()"
    class="fixed top-4 right-4 z-50
           w-10 h-10 rounded-full
           border border-jawa-gold/60
           text-jawa-gold
           backdrop-blur-md bg-black/40
           flex items-center justify-center
           transition-all duration-700
           opacity-0 translate-y-6 scale-90
           pointer-events-none"
>
    <span id="musicIcon" class="text-xl">🔊</span>
</button>


    <div class="mx-auto w-full lg:max-w-screen-xl lg:px-5 sm:px-0">
        <main
        id="mainContent"
        class="opacity-0 transition-opacity duration-500"
        >

            <section id="home" class="relative min-h-screen w-full bg-jawa-dark overflow-hidden flex items-center justify-center">
                
                <div class="absolute inset-0 opacity-5 mix-blend-overlay" style="background-image: url('https://www.transparenttextures.com/patterns/batik-fabric.png');"></div>

                <div class="absolute -top-2 md:-top-6 left-1/2 -translate-x-1/2 max-w-2xl md:max-w-2xl opacity-30 animate-float-slow pointer-events-none z-0">
                    <img src="{{ url('backgroundku/svg.png', []) }}" 
                        alt="Javanese Ornament Left"
                        data-aos="zoom-in" data-aos-delay="300" 
                        class="w-full h-auto object-contain">
                </div>


                <div class="absolute top-0 left-0 w-full z-20 pointer-events-none">
                    <img src="{{ url('backgroundku/bg3.png', []) }}" 
                        alt="Wedding Ornament Top" 
                        class="w-full h-auto object-cover object-top opacity-90 sm:min-h-[120px]">
                </div>

                <div class="container mx-auto px-6 relative z-10 pt-32 pb-20">
                    <div class="flex flex-col lg:flex-row items-center justify-center gap-12 lg:gap-20">
                        
                        <div class="text-center lg:text-left order-2 lg:order-1 flex-1 max-w-lg">
                            <div class="inline-flex items-center gap-3 mb-7">
                                <span class="w-12 h-[1px] bg-jawa-gold"></span>
                                <span class="text-xs font-bold tracking-[0.4em] text-jawa-gold uppercase">Pernikahan</span>
                                <span class="w-12 h-[1px] bg-jawa-gold"></span>
                            </div>
                            
                            <div class="flex flex-col mb-10 mx-auto lg:mx-0 max-w-[280px] sm:max-w-sm md:max-w-md">
                                <h1 style="font-family: 'Great Vibes', cursive;"
                                    class="text-6xl md:text-8xl text-jawa-beige self-start tracking-normal transition-all duration-700 hover:translate-x-2">
                                    Vera
                                </h1>

                                <span class="text-5xl md:text-7xl text-jawa-gold self-center my-[-10px] md:my-[-30px] -ml-5 z-20 transition-all duration-700" 
                                    style="font-family: 'Great Vibes', cursive;">
                                    &
                                </span>

                                <h1 style="font-family: 'Great Vibes', cursive;"
                                    class="text-6xl md:text-8xl text-jawa-beige self-end tracking-normal transition-all duration-700 hover:-translate-x-2">
                                    {{ $undangan->identitaspengantin->namapengantinpria }}
                                </h1>
                            </div>

                            {{-- <p class="text-jawa-gold-light/60 text-sm italic tracking-widest max-w-[280px] mx-auto lg:mx-0">
                                {{ \Carbon\Carbon::parse($undangan->tanggal)->isoFormat("dddd, DD MMMM YYYY") }}
                            </p> --}}

                            
                            
<div class="w-full md:max-w-xl lg:max-w-2xl md:-mr-20 lg:-mr-32 relative z-30 mx-auto lg:mx-0 mt-8">
    
    <div class="bg-white/5 backdrop-blur-md border border-white/10 rounded-2xl shadow-2xl overflow-hidden transition-all duration-500">
        
        <div class="grid grid-cols-1 grid-rows-1 w-full">
           

            @foreach($doas["islam"] as $index => $item)
            <div class="carousel-item col-start-1 row-start-1 w-full p-6 md:p-8 transition-all duration-700 transform {{ $index === 0 ? 'opacity-100 translate-x-0 relative' : 'opacity-0 translate-x-full absolute' }}">
                <h4 class="text-jawa-gold font-bold text-[10px] md:text-xs tracking-[0.3em] uppercase mb-3 opacity-80">
                    {{ $item[0] }}
                </h4>
                <p class="text-jawa-gold-light/80 text-sm md:text-lg leading-relaxed font-light italic">
                    “{{ $item[1] }}”
                </p>
            </div>
            @endforeach
        </div>

        <div class="flex justify-center gap-2 pb-6">
            @foreach($doas as $index => $item)
            <div class="dot h-1.5 w-1.5 rounded-full bg-jawa-gold/20 transition-all duration-300 {{ $index === 0 ? 'w-6 bg-jawa-gold' : '' }}"></div>
            @endforeach
        </div>
    </div>
</div>

                            
                        </div>

                        <div class="relative order-1 lg:order-2 group">
                            <div class="absolute -inset-4 border-2 border-jawa-gold/40 rounded-[40px] animate-float-frame"></div>
                            
                            <div class="relative w-50 h-70 md:w-80 md:h-[480px] lg:h-[520px] overflow-hidden rounded-[40px] shadow-[0_20px_50px_rgba(0,0,0,0.6)] border border-white/5">
                                <img src="{{ asset('storage/'. $undangan->identitaspengantin->fotopengantin??'') }}" 
                                    alt="Couple" 
                                    loading="lazy"
                                    class="w-full h-full object-cover grayscale-[0.2] contrast-110 group-hover:scale-110 transition duration-1000">
                                
                                <div class="absolute bottom-6 left-6 right-6 p-4 backdrop-blur-md bg-black/40 rounded-2xl border border-white/10 text-jawa-beige text-center">
                                    <p class="text-[10px] tracking-[0.3em] uppercase opacity-70 mb-1">Save the Date</p>
                                    <p class="text-lg font-serif tracking-widest"> {{ \Carbon\Carbon::parse($undangan->tanggal)->isoFormat("DD.MM.YYYY") }}</p>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="absolute bottom-0 left-0 w-full z-20">
                    <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-auto drop-shadow-[0_-10px_10px_rgba(0,0,0,0.5)]">
                        <path d="M0 120L1440 120V40L720 100L0 40V120Z" fill="#2a241970"/>
                        <path d="M0 40L720 100L1440 40" stroke="#c5a059" stroke-width="1" opacity="0.5"/>
                    </svg>
                </div>
                
            </section>     

            <!-- ⏰ SECTION 2: WAKTU & TANGGAL -->
            <section id="date" class="relative min-h-screen flex justify-center bg-gradient-to-b from-jawa-dark  to-[#2a2419] py-20 overflow-hidden">
                
                <div class="absolute -top-2 md:-top-6 left-1/2 -translate-x-1/2 max-w-2xl md:max-w-2xl opacity-30 animate-float-slow pointer-events-none z-0">
                    <img src="{{ url('backgroundku/svg.png', []) }}" 
                        alt="Javanese Ornament Left"
                        data-aos="zoom-in" data-aos-delay="300" 
                        class="w-full h-auto object-contain">
                </div>
                    

                <div class="container mx-auto px-6 relative z-10">
                    <div class="text-center mb-16">
                        <h2 class="text-xs font-bold tracking-[0.6em] text-jawa-gold uppercase mb-4 animate-pulse">Selamat Datang</h2>
                        <h3 class="text-4xl md:text-6xl font-serif text-jawa-beige italic">Tanggal Acara</h3>
                        <div class="flex justify-center items-center gap-4 mt-6">
                            <div class="w-12 h-[1px] bg-jawa-gold/50"></div>
                            <div class="text-jawa-gold">✦</div>
                            <div class="w-12 h-[1px] bg-jawa-gold/50"></div>
                        </div>
                    </div>

                    <div class="flex flex-row flex-nowrap justify-center gap-2 md:gap-6 mb-20 overflow-x-visible">
                        <div class="flex flex-col items-center justify-center w-[22%] aspect-square md:w-32 md:h-32 backdrop-blur-md bg-white/5 border border-jawa-gold/20 rounded-2xl md:rounded-3xl shadow-2xl group hover:border-jawa-gold transition-colors duration-500">
                            <span id="days" class="text-2xl md:text-5xl font-serif text-jawa-gold">00</span>
                            <span class="text-[8px] md:text-xs tracking-[0.1em] md:tracking-[0.2em] text-jawa-beige/50 uppercase mt-1">Hari</span>
                        </div>

                        <div class="flex flex-col items-center justify-center w-[22%] aspect-square md:w-32 md:h-32 backdrop-blur-md bg-white/5 border border-jawa-gold/20 rounded-2xl md:rounded-3xl shadow-2xl group hover:border-jawa-gold transition-colors duration-500">
                            <span id="hours" class="text-2xl md:text-5xl font-serif text-jawa-gold">00</span>
                            <span class="text-[8px] md:text-xs tracking-[0.1em] md:tracking-[0.2em] text-jawa-beige/50 uppercase mt-1">Jam</span>
                        </div>

                        <div class="flex flex-col items-center justify-center w-[22%] aspect-square md:w-32 md:h-32 backdrop-blur-md bg-white/5 border border-jawa-gold/20 rounded-2xl md:rounded-3xl shadow-2xl group hover:border-jawa-gold transition-colors duration-500">
                            <span id="minutes" class="text-2xl md:text-5xl font-serif text-jawa-gold">00</span>
                            <span class="text-[8px] md:text-xs tracking-[0.1em] md:tracking-[0.2em] text-jawa-beige/50 uppercase mt-1">Menit</span>
                        </div>

                        <div class="flex flex-col items-center justify-center w-[22%] aspect-square md:w-32 md:h-32 backdrop-blur-md bg-white/5 border border-jawa-gold/40 rounded-2xl md:rounded-3xl shadow-2xl group hover:border-jawa-gold transition-colors duration-500">
                            <span id="seconds" class="text-2xl md:text-5xl font-serif text-white animate-pulse">00</span>
                            <span class="text-[8px] md:text-xs tracking-[0.1em] md:tracking-[0.2em] text-jawa-gold uppercase mt-1 font-bold">Detik</span>
                        </div>
                    </div>

                    <div class="max-w-xl mx-auto relative group">
                        <div class="absolute -inset-2 border border-jawa-gold/20 rounded-xl scale-95 group-hover:scale-100 transition-transform duration-700"></div>
                        <div class="relative bg-black/20 p-8 rounded-xl text-center">
                            <p class="text-jawa-gold-light text-sm tracking-[0.3em] uppercase mb-4 font-semibold">Akad & Resepsi</p>
                            <p class="text-jawa-beige font-serif text-3xl md:text-4xl mb-2"> {{ strtoupper(\Carbon\Carbon::parse($undangan->tanggal)->isoFormat("dddd")) }}</p>
                            <p class="text-jawa-gold text-4xl md:text-5xl font-bold mb-6 tracking-tight">{{ \Carbon\Carbon::parse($undangan->tanggal)->isoFormat("DD MMMM YYYY") }}</p>
                            <div class="h-[1px] w-1/2 bg-gradient-to-r from-transparent via-jawa-gold to-transparent mx-auto mb-6"></div>
                            <h2 class="text-2xl md:text-3xl text-jawa-gold font-arabic leading-loose">
                                بِسْمِ اللّٰهِ الرَّحْمٰنِ الرَّحِيْمِ
                            </h2>
                            <p class="text-jawa-beige/60 italic font-light leading-relaxed">
                                {{ $text1 }}
                            </p>
                        </div>
                    </div>
                </div>

                <br>
                <div class="absolute bottom-0 left-0 w-full z-20">
                    <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-auto drop-shadow-[0_-10px_10px_rgba(0,0,0,0.5)]">
                        <path d="M0 120L1440 120V40L720 100L0 40V120Z" fill="#2a2419"/>
                        <path d="M0 40L720 100L1440 40" stroke="#c5a059" stroke-width="1" opacity="0.5"/>
                    </svg>
                </div>
            </section>




<section id="pengantin"
    class="relative min-h-screen flex justify-center
        bg-gradient-to-b from-[#2a2419] to-jawa-dark
        py-20 overflow-hidden">

        <div class="absolute -top-2 md:-top-6 left-1/2 -translate-x-1/2 max-w-2xl md:max-w-2xl opacity-30 animate-float-slow pointer-events-none z-0">
                    <img src="{{ url('backgroundku/svg.png', []) }}" 
                        alt="Javanese Ornament Left"
                        data-aos="zoom-in" data-aos-delay="300" 
                        class="w-full h-auto object-contain">
                </div>

    <div class="container mx-auto px-6 relative z-10">

        <!-- Heading -->
        <div class="text-center mb-16">
            <h2 class="text-xs font-bold tracking-[0.6em] text-jawa-gold uppercase mb-4 animate-pulse">
                Selamat Datang
            </h2>
            <h3 class="text-4xl md:text-6xl font-serif text-jawa-beige italic">
                Pengantin
            </h3>
            <div class="flex justify-center items-center gap-4 mt-6">
                <div class="w-12 h-[1px] bg-jawa-gold/50"></div>
                <div class="text-jawa-gold">✦</div>
                <div class="w-12 h-[1px] bg-jawa-gold/50"></div>
            </div>
        </div>


    <div class="grid grid-cols-1 md:grid-cols-2 gap-16 lg:gap-32 items-center max-w-6xl mx-auto relative">
        
        <div class="hidden md:block absolute left-1/2 top-1/2 -translate-x-1/2 -translate-y-1/2 w-px h-80 bg-gradient-to-b from-transparent via-jawa-gold/30 to-transparent"></div>

        <div class="text-center md:text-right space-y-6" data-aos="fade-right" data-aos-duration="1500">
            <div class="relative inline-block group">
                <div class="absolute -inset-1.5 border-2 border-dashed border-jawa-gold/40 rounded-full animate-[spin_10s_linear_infinite]"></div>
                <div class="relative w-32 h-32 md:w-40 md:h-40 rounded-full overflow-hidden border-4 border-jawa-dark shadow-2xl">
                    <img src="{{ Storage::url($undangan->pasfoto->where('pihak', 'L')->first()?->foto) }}" 
                        alt="Mempelai Pria" 
                        loading="lazy"
                        class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                </div>
            </div>

            <div class="space-y-2">
                <h4 class="text-4xl md:text-5xl font-serif text-jawa-gold tracking-wide leading-tight">
                    {{ ucwords($undangan->identitaspengantin->namalengkappengantinpria) }}
                </h4>
                <div class="h-[1px] w-32 bg-gradient-to-l from-jawa-gold/60 to-transparent ms-auto me-auto md:me-0"></div>
            </div>
            
            <div class="space-y-1">
                <p class="text-jawa-beige/60 italic font-serif text-base">Putra {{ strtolower($undangan->identitaspengantin->statusanakpria) }} dari</p>
                <p class="text-white text-lg md:text-xl font-light tracking-wide">
                    <span class="font-semibold text-jawa-gold/90">Bpk. {{ $undangan->orangtua->where("pihak", "L")->first()->namabapak }}</span> <br> 
                    <span class="text-sm opacity-50">&</span> <br>
                    <span class="font-semibold text-jawa-gold/90">Ibu {{ $undangan->orangtua->where("pihak", "L")->first()->namaibu }}</span>
                </p>
            </div>
        </div>

        <div class="text-center md:text-left space-y-6" data-aos="fade-left" data-aos-duration="1500" data-aos-delay="200">
            <div class="relative inline-block group">
                <div class="absolute -inset-1.5 border-2 border-dashed border-jawa-gold/40 rounded-full animate-[spin_15s_linear_infinite_reverse]"></div>
                <div class="relative w-32 h-32 md:w-40 md:h-40 rounded-full overflow-hidden border-4 border-jawa-dark shadow-2xl">
                    <img src="{{ Storage::url($undangan->pasfoto->where('pihak', 'P')->first()?->foto) }}" 
                        alt="Mempelai Wanita" 
                        loading="lazy"
                        class="w-full h-full object-cover group-hover:scale-110 transition duration-700">
                </div>
            </div>

            <div class="space-y-2">
                <h4 class="text-4xl md:text-5xl font-serif text-jawa-gold tracking-wide leading-tight">
                    {{ ucwords($undangan->identitaspengantin->namalengkappengantinwanita) }}
                </h4>
                <div class="h-[1px] w-32 bg-gradient-to-r from-jawa-gold/60 to-transparent ms-auto me-auto md:ms-0"></div>
            </div>
            
            <div class="space-y-1">
                <p class="text-jawa-beige/60 italic font-serif text-base">Putri {{ strtolower($undangan->identitaspengantin->statusanakwanita) }} dari</p>
                <p class="text-white text-lg md:text-xl font-light tracking-wide">
                    <span class="font-semibold text-jawa-gold/90">Bpk. {{ $undangan->orangtua->where("pihak", "P")->first()->namabapak }}</span> <br> 
                    <span class="text-sm opacity-50">&</span> <br>
                    <span class="font-semibold text-jawa-gold/90">Ibu {{ $undangan->orangtua->where("pihak", "P")->first()->namaibu }}</span>
                </p>
            </div>
        </div>
    </div>

    </div>

    <br>
    <br>
    <div class="absolute bottom-0 left-0 w-full z-20">
        <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-auto drop-shadow-[0_-10px_10px_rgba(0,0,0,0.5)]">
            <path d="M0 120L1440 120V40L720 100L0 40V120Z" fill="#2a241970"/>
            <path d="M0 40L720 100L1440 40" stroke="#c5a059" stroke-width="1" opacity="0.5"/>
        </svg>
    </div>



</section>





<section id="gallery"
  class="relative min-h-screen flex justify-center
         bg-gradient-to-b from-jawa-dark to-[#2a2419]
         py-20 overflow-hidden">

    <div class="absolute -top-2 md:-top-6 left-1/2 -translate-x-1/2 max-w-2xl md:max-w-2xl opacity-30 animate-float-slow pointer-events-none z-0">
                    <img src="{{ url('backgroundku/svg.png', []) }}" 
                        alt="Javanese Ornament Left"
                        data-aos="zoom-in" data-aos-delay="300" 
                        class="w-full h-auto object-contain">
                </div>

    <div class="container mx-auto px-6 relative z-10">

        <!-- Heading -->
        <div class="text-center mb-14">
            <h2 class="text-xs font-bold tracking-[0.6em] text-jawa-gold uppercase mb-4 animate-pulse">
                Selamat Datang
            </h2>
            <h3 class="text-4xl md:text-6xl font-serif text-jawa-beige italic">
                Bingkai Kenangan
            </h3>
            <div class="flex justify-center items-center gap-4 mt-6">
                <div class="w-12 h-[1px] bg-jawa-gold/50"></div>
                <div class="text-jawa-gold">✦</div>
                <div class="w-12 h-[1px] bg-jawa-gold/50"></div>
            </div>
        </div>

        <!-- CENTERING WRAPPER -->
        <div class="flex justify-center md:mx-10">

            <!-- MAX WIDTH -->
            <div class="max-w-7xl w-full">

                <div class="relative w-full h-[420px] md:h-[500] flex items-center justify-center overflow-hidden">

                    <!-- Tombol Kiri -->
    <button onclick="prev()" type="button"
        class="absolute left-0 md:left-10 z-50 w-10 h-10 md:w-15 md:h-15 text-xl rounded-full  backdrop-blur-m
               flex items-center justify-center text-jawa-dark text-jawa-gold/80
               hover:bg-black transition bg-[#3a3a3a79]
               border md:border-jawa-gold/40 border-jawa-gold/80
                md:text-jawa-gold
                md:hover:bg-jawa-gold md:hover:text-jawa-dark
                duration-300 flex items-center justify-center gap-2">
        <flux:icon.chevron-double-left />
    </button>

    <div id="carousel"
        class="relative w-[320px] md:w-[380] h-[400px] md:h-[500] flex items-center justify-center"
        style="perspective: 1400px;">
        
         @foreach ($undangan->gallery()->get() as $item)
         <div class="card"><img
                                loading="lazy"
                                data-aos="zoom-out" data-aos-delay="300"
                                src="{{ asset('storage/'. $item->fotogallery) }}"
                                class="w-full h-auto object-cover
                                       scale-105
                                       transition-all duration-700 ease-out
                                       group-hover:scale-110
                                       group-hover:rotate-[0.5deg]
                                       group-hover:saturate-110"
                            />></div>
         @endforeach

        <!-- Tombol Kanan -->
   
    </div>
    <button onclick="next()" type="button"
        class="absolute right-0 md:right-15 z-50 w-10 h-10 md:w-15 md:h-15 text-xl rounded-full  backdrop-blur-m
               flex items-center justify-center transition bg-[#3a3a3a79] text-jawa-gold/80
               border md:border-jawa-gold/40 border-jawa-gold/80
                md:text-jawa-gold
                md:hover:bg-jawa-gold md:hover:text-jawa-dark
                duration-300 flex items-center justify-center gap-2">
        <flux:icon.chevron-double-right />
    </button>
    </div>

    


                {{-- <!-- MASONRY -->
                <div class="inline-block columns-2 md:columns-3 lg:columns-4 gap-4 md:gap-5 space-y-4 md:space-y-5">

                    @foreach ($undangan->gallery()->get() as $item)
                    <!-- CARD -->
                    <div
                        class="break-inside-avoid group relative
                               rounded-[2rem] md:rounded-[1.75rem]
                               border border-jawa-gold/20
                               bg-white/5 backdrop-blur-sm
                               overflow-hidden
                               transition-all duration-700 ease-out
                               hover:-translate-y-2
                               hover:border-jawa-gold
                               hover:shadow-[0_30px_60px_-15px_rgba(197,160,89,0.45)]
                               active:scale-[0.97]
                               animate-[fadeUp_0.9s_ease-out_both]"
                    >

                        <!-- IMAGE FRAME -->
                        <div class="overflow-hidden rounded-[1.85rem] md:rounded-[1.6rem]">

                            <img
                                loading="lazy"
                                data-aos="zoom-out" data-aos-delay="300"
                                src="{{ asset('storage/'. $item->fotogallery) }}"
                                class="w-full h-auto object-cover
                                       scale-105
                                       transition-all duration-700 ease-out
                                       group-hover:scale-110
                                       group-hover:rotate-[0.5deg]
                                       group-hover:saturate-110"
                            />

                        </div>

                        <!-- OVERLAY -->
                        <div
                            class="pointer-events-none absolute inset-0
                                   rounded-[2rem] md:rounded-[1.75rem]
                                   bg-gradient-to-t
                                   from-black/60 via-black/20 to-transparent
                                   opacity-0
                                   group-hover:opacity-100
                                   transition duration-700">
                        </div>

                    </div>
                    <!-- END CARD -->
                        
                    @endforeach



                </div> --}}

            </div>
        </div>

    </div>

    <br>
    <div class="absolute bottom-0 left-0 w-full z-20">
        <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-auto drop-shadow-[0_-10px_10px_rgba(0,0,0,0.5)]">
            <path d="M0 120L1440 120V40L720 100L0 40V120Z" fill="#2a2419"/>
            <path d="M0 40L720 100L1440 40" stroke="#c5a059" stroke-width="1" opacity="0.5"/>
        </svg>
    </div>

</section>



<!-- 🖼️ SECTION 3: MODERN GALLERY -->
<section id="maps"
           class="relative min-h-screen flex justify-center
         bg-gradient-to-b from-[#2a2419] to-jawa-dark  
         py-20 overflow-hidden">

    <div class="absolute -top-2 md:-top-6 left-1/2 -translate-x-1/2 max-w-2xl md:max-w-2xl opacity-30 animate-float-slow pointer-events-none z-0">
                    <img src="{{ url('backgroundku/svg.png', []) }}" 
                        alt="Javanese Ornament Left"
                        data-aos="zoom-in" data-aos-delay="300" 
                        class="w-full h-auto object-contain">
                </div>

    <div class="container mx-auto px-6 relative z-10">

        <!-- Heading -->
        <div class="text-center mb-16">
            <h2 class="text-xs font-bold tracking-[0.6em] text-jawa-gold uppercase mb-4 animate-pulse">
                Selamat Datang
            </h2>
            <h3 class="text-4xl md:text-6xl font-serif text-jawa-beige italic">
                LOKASI
            </h3>
            <div class="flex justify-center items-center gap-4 mt-6">
                <div class="w-12 h-[1px] bg-jawa-gold/50"></div>
                <div class="text-jawa-gold">✦</div>
                <div class="w-12 h-[1px] bg-jawa-gold/50"></div>
            </div>
        </div>


    <div class="max-w-5xl mx-auto px-6 py-0">
        <div class="flex flex-col lg:flex-row items-center justify-center gap-8 lg:gap-16">
            
            <div class="w-full lg:w-5/12 order-2 lg:order-1 text-center lg:text-right space-y-6">
                <div class="space-y-3">
                    <div class="inline-block px-3 py-1 border border-jawa-gold/30 rounded-full mb-1">
                        <span class="text-[10px] tracking-[0.3em] text-jawa-gold uppercase font-bold">Lokasi Resepsi</span>
                    </div>
                    <h4 class="text-3xl md:text-4xl font-serif text-jawa-beige italic leading-tight">
                        {{ $undangan->lokasi->namalokasi }} <br>
                    </h4>
                </div>

                <div class="space-y-1 text-jawa-beige/80 text-base md:text-lg font-light leading-relaxed">
                    <p class="font-semibold text-jawa-gold">Alamat Lengkap</p>
                    <p>{{ $undangan->lokasi->alamat }}</p>
                </div>

                <div class="pt-4">
                    <a href="https://www.google.com/maps/search/?api=1&query={{ $undangan->lokasi->lat }},{{ $undangan->lokasi->long }}" target="_blank" 
                    class="group relative inline-flex items-center gap-3 px-8 py-3 bg-jawa-gold/5 border border-jawa-gold/40 text-jawa-gold overflow-hidden transition-all duration-500 rounded-lg">
                        <span class="absolute inset-0 bg-jawa-gold translate-y-full group-hover:translate-y-0 transition-transform duration-300"></span>
                        <span class="relative z-10 font-bold tracking-widest text-xs group-hover:text-jawa-dark">BUKA GOOGLE MAPS</span>
                        <svg xmlns="http://www.w3.org/2000/svg" class="w-4 h-4 relative z-10 group-hover:text-jawa-dark" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z" />
                        </svg>
                    </a>
                </div>
            </div>


            <div class="w-full lg:w-6/12 order-1 lg:order-2 relative">
                
                <div class="absolute inset-0 bg-jawa-gold/10 blur-[50px] rounded-full scale-75"></div>

                <div class="relative p-[1.5px] overflow-hidden rounded-2xl bg-jawa-gold/20 shadow-2xl">
                    <div class="absolute inset-[-150%] bg-[conic-gradient(from_0deg,transparent_0deg,transparent_150deg,#c5a059_180deg,transparent_210deg)] animate-[spin_3s_linear_infinite]"></div>
                    
                    <div class="relative bg-jawa-dark rounded-2xl p-1 z-10">
                        <div class="overflow-hidden rounded-xl h-[300px] lg:h-[380px]">
                            <iframe 
                                src="https://www.google.com/maps?q={{ $undangan->lokasi->lat}},{{ $undangan->lokasi->long}}&hl=id&z=13&output=embed" 
                                class="w-full h-full grayscale-[0.3] hover:grayscale-0 transition-all duration-700"
                                style="border:0;" 
                                allowfullscreen="" 
                                data-aos="zoom-out" data-aos-delay="300"
                                loading="lazy">
                            </iframe>
                        </div>
                    </div>
                </div>

                <div class="absolute -top-3 -left-3 w-8 h-8 border-t border-l border-jawa-gold/50"></div>
                <div class="absolute -bottom-3 -right-3 w-8 h-8 border-b border-r border-jawa-gold/50"></div>
            </div>

        </div>


    </div>



    </div>

    <br>
    <div class="absolute bottom-0 left-0 w-full z-20">
        <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-auto drop-shadow-[0_-10px_10px_rgba(0,0,0,0.5)]">
            <path d="M0 120L1440 120V40L720 100L0 40V120Z" fill="#2a241970"/>
            <path d="M0 40L720 100L1440 40" stroke="#c5a059" stroke-width="1" opacity="0.5"/>
        </svg>
    </div>

</section>




<!-- 🖼️ SECTION 3: MODERN GALLERY -->
<section id="bank"
  class="relative min-h-screen flex  justify-center
         bg-gradient-to-b from-jawa-dark to-[#2a2419]  
         py-20 overflow-hidden">

         <div class="absolute -top-2 md:-top-6 left-1/2 -translate-x-1/2 max-w-2xl md:max-w-2xl opacity-30 animate-float-slow pointer-events-none z-0">
                    <img src="{{ url('backgroundku/svg.png', []) }}" 
                        alt="Javanese Ornament Left"
                        data-aos="zoom-in" data-aos-delay="300" 
                        class="w-full h-auto object-contain">
                </div>

    <!-- 💝 SECTION DONASI -->
    <div class="container mx-auto px-6 relative z-10">

        <!-- Heading -->
        <div class="text-center mb-16">
            <h2 class="text-xs font-bold tracking-[0.6em] text-jawa-gold uppercase mb-4 animate-pulse">
                Selamat Datang
            </h2>
            <h3 class="text-4xl md:text-6xl font-serif text-jawa-beige italic">
                Rekening Mempelai
            </h3>
            <div class="flex justify-center items-center gap-4 mt-6">
                <div class="w-12 h-[1px] bg-jawa-gold/50"></div>
                <div class="text-jawa-gold">✦</div>
                <div class="w-12 h-[1px] bg-jawa-gold/50"></div>
            </div>
        </div>

        <!-- GRID -->
        <div class="flex justify-center">
            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-2 gap-6">

                @foreach ($undangan->rekening()->get() as $item)
                <div class="w-full max-w-md
                            rounded-3xl border border-jawa-gold/30
                            bg-black/35 backdrop-blur-md p-5
                            transition-all duration-500
                            hover:border-jawa-gold
                            hover:-translate-y-1
                            hover:shadow-[0_20px_40px_-10px_rgba(197,160,89,0.4)]">

                    <!-- TOP -->
                    <div class="flex items-center gap-4 mx-5">

                        <!-- ICON -->
                        <div class="w-16 h-16 flex items-center justify-center
                                    rounded-2xl bg-white/10 shrink-0">
                            <img src="{{ $item->urlgambar }}"
                            data-aos="zoom-out" data-aos-delay="300"
                                class="w-12" alt="{{ $item->namabank }}">
                        </div>

                        <!-- TEXT -->
                        <div>
                            <p class="text-white font-semibold text-lg">{{ $item->namabank }}</p>
                            <p class="text-jawa-beige text-lg font-mono tracking-wide">
                                {{ $item->nomorrekening }}
                            </p>
                            <p class="text-jawa-beige/70 text-sm">
                                {{ $item->atasnama }}
                            </p>
                        </div>
                    </div>

                    <!-- BUTTON -->
                    <button onclick="copyToClipboard(this, '{{ $item->nomorrekening }}')"
                    class="w-full text-sm py-2 rounded-xl mt-2
                        border border-jawa-gold/40
                        text-jawa-gold
                        hover:bg-jawa-gold hover:text-jawa-dark
                        transition duration-300 flex items-center justify-center gap-2">
                    <span>Salin Nomor</span>
                </button>
                </div>
                    
                @endforeach


            </div>
        </div>
    
    </div>

        <br>
        <div class="absolute bottom-0 left-0 w-full z-20">
            <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-auto drop-shadow-[0_-10px_10px_rgba(0,0,0,0.5)]">
                <path d="M0 120L1440 120V40L720 100L0 40V120Z" fill="#2a2419"/>
                <path d="M0 40L720 100L1440 40" stroke="#c5a059" stroke-width="1" opacity="0.5"/>
            </svg>
        </div>

</section>




<!-- 🖼️ SECTION 3: MODERN GALLERY -->
<section id="comments"
  class="relative min-h-screen flex  justify-center
         bg-gradient-to-b from-[#2a2419] to-jawa-dark
         py-20 overflow-hidden">

         <div class="absolute -top-2 md:-top-6 left-1/2 -translate-x-1/2 max-w-2xl md:max-w-2xl opacity-30 animate-float-slow pointer-events-none z-0">
                    <img src="{{ url('backgroundku/svg.png', []) }}" 
                        alt="Javanese Ornament Left"
                        data-aos="zoom-in" data-aos-delay="300" 
                        class="w-full h-auto object-contain">
                </div>

<!-- 💝 SECTION DONASI -->
<div class="container mx-auto px-6 relative z-10">

    <!-- Heading -->
    <div class="text-center mb-16">
        <h2 class="text-xs font-bold tracking-[0.6em] text-jawa-gold uppercase mb-4 animate-pulse">
            Tinggalkan Ucapan & Doa
        </h2>
        <h3 class="text-4xl md:text-6xl font-serif text-jawa-beige italic">
            Ucapan & Doa
        </h3>
        <div class="flex justify-center items-center gap-4 mt-6">
            <div class="w-12 h-[1px] bg-jawa-gold/50"></div>
            <div class="text-jawa-gold">✦</div>
            <div class="w-12 h-[1px] bg-jawa-gold/50"></div>
        </div>
    </div>

<!-- 💬 KOMENTAR SECTION -->
<div class="max-w-4xl mx-auto">

    <livewire:komentar-live :kode="$kode" :kodepenerima="$kodepenerima" />

</div>

</div>

    <br>
    <div class="absolute bottom-0 left-0 w-full z-20">
        <svg viewBox="0 0 1440 120" fill="none" xmlns="http://www.w3.org/2000/svg" class="w-full h-auto drop-shadow-[0_-10px_10px_rgba(0,0,0,0.5)]">
            <path d="M0 120L1440 120V40L720 100L0 40V120Z" fill="#2a241970"/>
            <path d="M0 40L720 100L1440 40" stroke="#c5a059" stroke-width="1" opacity="0.5"/>
        </svg>
    </div>

</section>


<!-- 🖤 FOOTER -->
<footer class="relative bg-jawa-dark pt-10 pb-20 overflow-hidden">

    <!-- Ornamen Background -->
    <div class="absolute inset-0 opacity-[0.04] pointer-events-none"
         style="background-image:url('https://www.transparenttextures.com/patterns/paper-fibers.png');">
    </div>

    <div class="relative z-10 container mx-auto px-5 text-center">

        <p class="mt-0 text-md text-jawa-beige/40">
            Crafted with 🤍 by <span class="text-jawa-gold">Andi Rizky Bayu Putra</span>
        </p>

    </div>
    <br><br>
</footer>





        </main>
    </div>


    <!-- ✨ SCRIPT -->
<script>
const music = document.getElementById('bgMusic');
const musicIcon = document.getElementById('musicIcon');
const toggleBtn = document.getElementById('musicToggle');

function toggleMusic() {
    if (music.paused) {
        music.play();
        musicIcon.textContent = "🔊";
        toggleBtn.classList.add('animate-spin-slow');
    } else {
        music.pause();
        musicIcon.textContent = "🔈";
        toggleBtn.classList.remove('animate-spin-slow');
    }
}


function openInvitation() {
    const opening = document.getElementById('opening');
    const main = document.getElementById('mainContent');
    const nav = document.getElementById('mainContentNav');
    const music = document.getElementById('bgMusic');
    const toggleBtn = document.getElementById('musicToggle');
    
    // Mulai musik dengan volume kecil
    music.volume = 0;
    music.play();

    // Fade in volume perlahan (lebih elegan)
    let volume = 0;
    const fadeAudio = setInterval(() => {
        if (volume < 0.6) {
            volume += 0.05;
            music.volume = volume;
        } else {
            clearInterval(fadeAudio);
        }
    }, 200);

    // Tambah efek cinematic keluar
    opening.classList.add(
        'opacity-0',
        'scale-110',
        'blur-sm'
    );

    // Setelah animasi selesai
    setTimeout(() => {
        opening.style.display = 'none';

        main.classList.remove('opacity-0');
        nav.classList.remove('opacity-0');

        // Fade masuk main content
        toggleBtn.classList.remove(
            'opacity-0',
            'translate-y-6',
            'scale-90',
            'pointer-events-none'
        );
        toggleBtn.classList.add('animate-spin-slow');
        main.classList.add('animate-fade-in');
        nav.classList.add('animate-fade-in');
    }, 500);

     window.scrollTo({
        top: 0,
        behavior: 'smooth' // biar animasi halus
    });
}

        // Atur tanggal target di sini
    const targetDate = new Date("{{ $undangan->tanggal }}").getTime();

    const countdown = setInterval(function() {
        const now = new Date().getTime();
        const distance = targetDate - now;

        // Perhitungan waktu
        const d = Math.floor(distance / (1000 * 60 * 60 * 24));
        const h = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        const m = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        const s = Math.floor((distance % (1000 * 60)) / 1000);

        // Update tampilan (dengan angka 0 di depan jika < 10)
        document.getElementById("days").innerText = d < 10 ? "0" + d : d;
        document.getElementById("hours").innerText = h < 10 ? "0" + h : h;
        document.getElementById("minutes").innerText = m < 10 ? "0" + m : m;
        document.getElementById("seconds").innerText = s < 10 ? "0" + s : s;

        // Jika waktu habis
        if (distance < 0) {
            clearInterval(countdown);
            document.getElementById("days").innerText = "00";
            document.getElementById("hours").innerText = "00";
            document.getElementById("minutes").innerText = "00";
            document.getElementById("seconds").innerText = "00";
        }
    }, 1000);



    document.addEventListener('DOMContentLoaded', function() {
        let current = 0;
        const items = document.querySelectorAll('.carousel-item');
        const dots = document.querySelectorAll('.dot');
        const total = items.length;

        function updateCarousel() {
            items.forEach((item, index) => {
                // Reset posisi semua item
                item.classList.remove('translate-x-0', 'translate-x-full', '-translate-x-full', 'opacity-100', 'opacity-0');
                
                if (index === current) {
                    // Item Aktif
                    item.classList.add('translate-x-0', 'opacity-100');
                } else if (index < current) {
                    // Item yang sudah lewat (geser ke kiri)
                    item.classList.add('-translate-x-full', 'opacity-0');
                } else {
                    // Item yang akan datang (antri di kanan)
                    item.classList.add('translate-x-full', 'opacity-0');
                }
            });

            // Update Bullets
            dots.forEach((dot, index) => {
                if (index === current) {
                    dot.classList.add('w-6', 'bg-jawa-gold');
                    dot.classList.remove('bg-jawa-gold/20');
                } else {
                    dot.classList.remove('w-6', 'bg-jawa-gold');
                    dot.classList.add('bg-jawa-gold/20');
                }
            });
        }

        if(total > 1) {
            setInterval(() => {
                current = (current + 1) % total;
                updateCarousel();
            }, 5000);
        }
    });




    function copyToClipboard(button, text) {
    // Fungsi salin ke clipboard
    navigator.clipboard.writeText(text).then(() => {
        // Ambil elemen span di dalam tombol
        const textElement = button.querySelector('span');
        const originalText = textElement.innerText;

        // Ubah teks dan gaya tombol
        textElement.innerText = 'TERSALIN!';
        button.classList.add('bg-jawa-gold', 'text-jawa-dark');

        // Kembalikan ke semula setelah 2 detik
        setTimeout(() => {
            textElement.innerText = originalText;
            button.classList.remove('bg-jawa-gold', 'text-jawa-dark');
        }, 2000);
    }).catch(err => {
        console.error('Gagal menyalin: ', err);
    });
}



const cards = document.querySelectorAll(".card");
let current = 0;

function updateCards() {
    const total = cards.length;

    const baseSpacing = 110;   // jarak awal
    const compression = 0.08;  // makin besar = makin rapat belakang

    cards.forEach((card, index) => {

        let offset = index - current;

        if (offset > total / 2) offset -= total;
        if (offset < -total / 2) offset += total;

        let abs = Math.abs(offset);
        let direction = offset < 0 ? -1 : 1;

        if (offset === 0) {
            card.style.transform = `
                translateX(0px)
                scale(1)
                rotateY(0deg)
            `;
            card.style.zIndex = 1000;
            card.style.opacity = 1;
            card.style.filter = "blur(0px)";
        } else {

            // 🔥 spacing tetap bertambah tapi makin pelan
            let dynamicSpacing =
                baseSpacing * abs * (1 - abs * compression);

            card.style.transform = `
                translateX(${direction * dynamicSpacing}px)
                scale(${1 - abs * 0.08})
                rotateY(${offset * -15}deg)
            `;

            card.style.zIndex = 1000 - abs;
            
            let blurAmount = Math.pow(abs, 1.2) * 1.2;

            card.style.filter = `
                blur(${blurAmount}px)
                brightness(${1 - abs * 0.05})
            `;
        }
    });
}

function next() {
    current = (current + 1) % cards.length;
    updateCards();
}

function prev() {
    current = (current - 1 + cards.length) % cards.length;
    updateCards();
}

updateCards();


    </script>

    <!-- 🎞️ ANIMASI -->
    <style>
        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        .animate-fade-in {
            animation: fadeIn 1.5s ease-out forwards;
        }
    </style>


<script src="https://unpkg.com/aos@2.3.4/dist/aos.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        AOS.init({
            duration: 1000,
            once: true
        });
    </script>

</body>
</html>
