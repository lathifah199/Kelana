<section id="beranda"
    class="relative w-full min-h-screen flex items-center justify-center overflow-hidden">

    <!-- VIDEO -->
    <video autoplay muted loop playsinline
        class="absolute inset-0 w-full h-full object-cover">
        <source src="{{ asset('videos/batam-hero.mp4') }}" type="video/mp4">
    </video>

    <!-- OVERLAY TIPIS (hanya untuk kontras teks, bukan tint ungu) -->
    <div class="absolute inset-0
        bg-gradient-to-b
        from-black/25 via-black/10 to-black/20">
    </div>

    <!-- CONTENT -->
    <div class="relative z-20 text-center px-4 sm:px-6 max-w-2xl">
        <h1 class="text-5xl sm:text-6xl md:text-7xl leading-tight
                   text-[#FEFADD] tracking-wide"
            style="font-family: 'Changa One', cursive; text-shadow: 0 4px 20px rgba(0,0,0,0.4);">
            Kelana
        </h1>

        <p class="mt-3 sm:mt-4 text-base sm:text-lg text-white font-semibold tracking-wide uppercase"
           style="text-shadow: 0 2px 8px rgba(0,0,0,0.5);">
            Know more, Love more, Navigate the Nusantara
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mt-8">

            {{-- Explore Now --}}
            <a href="#destinasi"
                class="inline-flex items-center gap-3 font-bold px-8 py-4 rounded-full text-base shadow-lg
                       bg-[#F4DBB4] text-[#1e293b] hover:bg-[#f9d497] hover:-translate-y-0.5 transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                Explore Now!
            </a>

            {{-- Partner with Us --}}
            <a href="{{ route('mitra.form') }}"
                class="inline-flex items-center gap-3 font-bold px-8 py-4 rounded-full text-base shadow-lg
                       bg-[#E1C5F5] text-[#3B1E6D] hover:bg-[#A78BFA] hover:text-white hover:-translate-y-0.5 transition-all">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0z"/>
                </svg>
                Partner with Us
            </a>
        </div>
    </div>

    <!-- FADE TO NEXT SECTION -->
    <div class="absolute bottom-0 left-0 w-full h-32
                bg-gradient-to-t from-white to-transparent z-10">
    </div>
</section>

<!-- About Section -->
<section class="bg-white py-20">
    <div class="max-w-5xl mx-auto px-6 sm:px-6 lg:px-8">
        
        <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-center">
            
            <!-- LEFT: Text Content -->
            <div>
                <h2 class="text-3xl sm:text-4xl text-[#695596] mb-16 text-center"
            style="font-family: 'Changa One', cursive;">
                    Discover Your Dream Destination
                </h2>
                
                <p class="text-gray-600 text-base sm:text-lg leading-relaxed mb-8">
                    Kelana is here to help you find the best travel experiences in Batam. 
                    From exotic beaches to mouthwatering local cuisine, every journey 
                    will bring new unforgettable stories. Let's explore the beauty of Batam together.
                </p>
                
                <a href="{{ route('destinasi.index') }}" 
                   class="inline-block bg-[#F4DBB4] hover:bg-[#f9d497] 
                          text-black font-semibold px-8 py-3 rounded-full 
                          transition shadow-md hover:shadow-lg">
                    Explore Now
                </a>
            </div>
            
            <!-- Image -->
            <div class="order-1 lg:order-2">
                <div class="relative">
                    <!-- Main Image -->
                    <img src="{{ asset('images/sunset.jpeg') }}" 
                         alt="Batam Tourism"
                         class="w-full h-auto rounded-3xl shadow-2xl object-cover">
                    
                    <!-- Decorative Dots -->
                    <div class="absolute -bottom-6 -left-6 w-24 h-24 opacity-80 hidden lg:block">
                        <svg viewBox="0 0 100 100" fill="#FF9B42">
                            <circle cx="10" cy="10" r="3"/>
                            <circle cx="30" cy="10" r="3"/>
                            <circle cx="50" cy="10" r="3"/>
                            <circle cx="70" cy="10" r="3"/>
                            <circle cx="90" cy="10" r="3"/>
                            
                            <circle cx="10" cy="30" r="3"/>
                            <circle cx="30" cy="30" r="3"/>
                            <circle cx="50" cy="30" r="3"/>
                            <circle cx="70" cy="30" r="3"/>
                            <circle cx="90" cy="30" r="3"/>
                            
                            <circle cx="10" cy="50" r="3"/>
                            <circle cx="30" cy="50" r="3"/>
                            <circle cx="50" cy="50" r="3"/>
                            <circle cx="70" cy="50" r="3"/>
                            <circle cx="90" cy="50" r="3"/>
                            
                            <circle cx="10" cy="70" r="3"/>
                            <circle cx="30" cy="70" r="3"/>
                            <circle cx="50" cy="70" r="3"/>
                            <circle cx="70" cy="70" r="3"/>
                            <circle cx="90" cy="70" r="3"/>
                            
                            <circle cx="10" cy="90" r="3"/>
                            <circle cx="30" cy="90" r="3"/>
                            <circle cx="50" cy="90" r="3"/>
                            <circle cx="70" cy="90" r="3"/>
                            <circle cx="90" cy="90" r="3"/>
                        </svg>
                    </div>
                </div>
            </div>
            
        </div>
        
    </div>
</section>
<section class="bg-white py-20">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">

        <!-- Title -->
        <h2 class="text-3xl sm:text-4xl text-[#695596] mb-16 text-center"
            style="font-family: 'Changa One', cursive;">
            What Kelana Does?
        </h2>

        <!-- Features -->
        <div class="flex flex-col gap-16 sm:gap-20">

            <!-- Feature 1: Image Left, Text Right -->
            <div class="flex flex-col sm:flex-row items-center gap-8 sm:gap-12">
                <div class="flex-shrink-0">
                    <img src="{{ asset('images/what-does-1.png') }}"
                         alt="Destination Recommendations"
                         class="w-40 sm:w-48 h-auto">
                </div>
                <div class="flex-1 text-center sm:text-left">
                    <span class="inline-block px-6 py-2.5 rounded-full
                                 bg-[#F4DBB4] text-[#3B1E6D] font-bold text-lg shadow-sm mb-4">
                        Destination Recommendations
                    </span>
                    <p class="text-gray-500 text-sm sm:text-base leading-relaxed max-w-md mx-auto sm:mx-0">
                        Kelana provides recommendations for destinations, events, and travel activities
                        based on ratings and user reviews.
                    </p>
                </div>
            </div>

            <!-- Feature 2: Text Left, Image Right -->
            <div class="flex flex-col sm:flex-row-reverse items-center gap-8 sm:gap-12">
                <div class="flex-shrink-0">
                    <img src="{{ asset('images/what-does-2.png') }}"
                         alt="Digital Map & Location Info"
                         class="w-40 sm:w-48 h-auto">
                </div>
                <div class="flex-1 text-center sm:text-right">
                    <span class="inline-block px-6 py-2.5 rounded-full
                                 bg-[#F4DBB4] text-[#3B1E6D] font-bold text-lg shadow-sm mb-4">
                        Digital Map & Location Info
                    </span>
                    <p class="text-gray-500 text-sm sm:text-base leading-relaxed max-w-md mx-auto sm:ml-auto sm:mr-0">
                        Digital map integration to display destination locations,
                        travel routes, and surrounding information accurately and intuitively.
                    </p>
                </div>
            </div>

            <!-- Feature 3: Image Left, Text Right -->
            <div class="flex flex-col sm:flex-row items-center gap-8 sm:gap-12">
                <div class="flex-shrink-0">
                    <img src="{{ asset('images/what-does-3.png') }}"
                         alt="Chatbot & Auto Itinerary"
                         class="w-40 sm:w-48 h-auto">
                </div>
                <div class="flex-1 text-center sm:text-left">
                    <span class="inline-block px-6 py-2.5 rounded-full
                                 bg-[#F4DBB4] text-[#3B1E6D] font-bold text-lg shadow-sm mb-4">
                        Chatbot & Auto Itinerary
                    </span>
                    <p class="text-gray-500 text-sm sm:text-base leading-relaxed max-w-md mx-auto sm:mx-0">
                        AI chatbot helps answer traveler questions and
                        automatically creates travel itineraries based on user preferences.
                    </p>
                </div>
            </div>

        </div>
    </div>
</section>