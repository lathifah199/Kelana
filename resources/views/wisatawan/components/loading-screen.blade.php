{{-- Kelana Loading Screen Component --}}
{{-- Drop-in replacement dari WayWay loading-screen.blade.php --}}
{{-- Semua id, nama function, dan cara trigger SAMA persis --}}
<div
    id="ww-loading"
    style="display:none;"
    class="fixed inset-0 z-[9999] flex flex-col items-center justify-center bg-white"
>
    {{-- Ombak bawah -- dinaikkan jadi h-24 --}}
    <div class="absolute bottom-0 left-0 right-0 h-24 md:h-40 overflow-hidden pointer-events-none">
        <svg style="width:200%; animation:ww-wave 5s linear infinite;"
             viewBox="0 0 800 96" xmlns="http://www.w3.org/2000/svg">
            <path d="M0 40 Q100 10 200 40 Q300 70 400 40 Q500 10 600 40 Q700 70 800 40
                     Q900 10 1000 40 Q1100 70 1200 40 Q1300 10 1400 40 Q1500 70 1600 40
                     L1600 96 L0 96 Z" fill="rgba(107,76,230,0.10)"/>
            <path d="M0 55 Q120 28 240 55 Q360 82 480 55 Q600 28 720 55 Q840 82 960 55
                     Q1080 28 1200 55 Q1320 82 1440 55 L1440 96 L0 96 Z"
                  fill="rgba(167,139,250,0.08)"/>
            <path d="M0 68 Q140 48 280 68 Q420 88 560 68 Q700 48 840 68 Q980 88 1120 68
                     Q1260 48 1400 68 L1600 68 L1600 96 L0 96 Z"
                  fill="rgba(243,201,105,0.06)"/>
        </svg>
    </div>

    {{-- Ilustrasi sunset dalam lingkaran kompas --}}
    <div class="relative w-40 h-40 flex items-center justify-center">

        {{-- Ring luar berputar --}}
        <div class="absolute w-40 h-40 rounded-full"
             style="border:2.5px solid transparent; border-top-color:#6B4CE6; border-right-color:#F3C969; animation:ww-spin 2.5s linear infinite;"></div>

        {{-- Ring dalam dashed --}}
        <div class="absolute w-[126px] h-[126px] rounded-full"
             style="border:1.5px dashed rgba(167,139,250,0.5); animation:ww-spin-r 4s linear infinite;"></div>

        {{-- SVG sunset --}}
        <svg width="108" height="108" viewBox="0 0 108 108"
             xmlns="http://www.w3.org/2000/svg"
             style="z-index:2; animation:ww-pulse 3s ease-in-out infinite;">
            <defs>
                <clipPath id="kl-clip"><circle cx="54" cy="54" r="50"/></clipPath>
            </defs>
            <circle cx="54" cy="54" r="51" fill="#C9B8E8" stroke="#7C5CBF" stroke-width="2"/>
            <g clip-path="url(#kl-clip)">
                <rect x="4" y="4" width="100" height="100" fill="#D4B8F0"/>
                <ellipse cx="54" cy="10" rx="60" ry="30" fill="#C4A0E8" opacity="0.7"/>
                <ellipse cx="54" cy="28" rx="58" ry="28" fill="#E8A0C0" opacity="0.55"/>
                <ellipse cx="54" cy="44" rx="56" ry="24" fill="#F0B090" opacity="0.5"/>
                <ellipse cx="54" cy="55" rx="56" ry="18" fill="#F5C878" opacity="0.45"/>
                <ellipse cx="54" cy="62" rx="56" ry="12" fill="#F8D890" opacity="0.4"/>
                <rect x="4" y="64" width="100" height="44" fill="#9B8BD4"/>
                <ellipse cx="54" cy="64" rx="52" ry="7" fill="#B8A0E0" opacity="0.6"/>
                <ellipse cx="54" cy="70" rx="7" ry="14" fill="#F8D890" opacity="0.35"/>
                <path d="M4 70 Q20 66 36 70 Q52 74 68 70 Q84 66 104 70 L104 108 L4 108 Z" fill="#8878C8" opacity="0.7"/>
                <path d="M4 80 Q24 76 44 80 Q64 84 84 80 Q96 77 104 80 L104 108 L4 108 Z" fill="#7868B8" opacity="0.8"/>
                <polygon points="4,68 22,38 40,68"  fill="#B09EE0"/>
                <polygon points="14,68 28,46 42,68" fill="#C4B4EC"/>
                <polygon points="62,68 80,40 100,68" fill="#B09EE0"/>
                <polygon points="70,68 82,50 96,68"  fill="#C4B4EC"/>
                <circle cx="54" cy="64" r="20" fill="#FDEBC0" opacity="0.5" style="animation:ww-sun 2s ease-in-out infinite;"/>
                <circle cx="54" cy="64" r="15" fill="#F8C84A" style="animation:ww-sun 2s ease-in-out infinite;"/>
                <circle cx="54" cy="64" r="10" fill="#FADA70"/>
                <circle cx="54" cy="64" r="6"  fill="#FEF0A0"/>
                <ellipse cx="20" cy="22" rx="12" ry="5" fill="white" opacity="0.55"/>
                <ellipse cx="28" cy="20" rx="8"  ry="5" fill="white" opacity="0.5"/>
                <ellipse cx="78" cy="28" rx="10" ry="4" fill="white" opacity="0.45"/>
                <ellipse cx="86" cy="26" rx="7"  ry="4" fill="white" opacity="0.4"/>
                <circle cx="15" cy="14" r="1.5" fill="white" opacity="0.8" style="animation:ww-star 2.1s ease-in-out infinite;"/>
                <circle cx="88" cy="12" r="1.2" fill="white" opacity="0.7" style="animation:ww-star 1.8s ease-in-out infinite .4s;"/>
                <circle cx="70" cy="18" r="1"   fill="white" opacity="0.6" style="animation:ww-star 2.4s ease-in-out infinite .7s;"/>
                <g transform="translate(84,20)" style="animation:ww-float 2.5s ease-in-out infinite;">
                    <polygon points="0,-8 2,-2 8,0 2,2 0,8 -2,2 -8,0 -2,-2" fill="#F3C969" stroke="#D4A843" stroke-width="0.5"/>
                </g>
            </g>
            <circle cx="54" cy="54" r="51" fill="none" stroke="#7C5CBF" stroke-width="2"
                    stroke-dasharray="250 70" stroke-dashoffset="20" opacity="0.7"/>
        </svg>

        <span style="position:absolute; top:6px; right:10px; color:#F3C969; font-size:12px; animation:ww-float 2s ease-in-out infinite; pointer-events:none;">✦</span>
        <span style="position:absolute; top:30px; left:6px; color:#A78BFA; font-size:8px; animation:ww-float 2.7s ease-in-out infinite .4s; pointer-events:none;">✦</span>
    </div>

    {{-- Brand name --}}
    <div class="mt-6 flex items-center gap-2">
        <div class="w-2 h-2 rounded-full" style="background:#A78BFA;"></div>
        <span class="font-semibold text-lg" style="color:#4F33B8; letter-spacing:2px;">Kelana</span>
    </div>

    {{-- Dots --}}
    <div class="flex gap-2 mt-3">
        <div style="width:8px;height:8px;border-radius:50%;background:#6B4CE6;animation:ww-dot 1.4s ease-in-out infinite;"></div>
        <div style="width:8px;height:8px;border-radius:50%;background:#A78BFA;animation:ww-dot 1.4s ease-in-out infinite 0.2s;"></div>
        <div style="width:8px;height:8px;border-radius:50%;background:#F3C969;animation:ww-dot 1.4s ease-in-out infinite 0.4s;"></div>
    </div>

    {{-- Pesan rotating --}}
    <div id="ww-loading-msg" class="mt-3 text-sm font-medium" style="color:#6B4CE6; min-height:20px;">
        Loading...
    </div>

    {{-- Tagline --}}
    <div class="mt-2 text-xs" style="color:#A78BFA; font-style:italic; letter-spacing:1px;">
        Know more, love more, navigate the nusantara
    </div>
</div>

{{-- CSS Keyframes --}}
<style>
    @keyframes ww-spin  { to { transform: rotate(360deg); } }
    @keyframes ww-spin-r{ to { transform: rotate(-360deg); } }
    @keyframes ww-pulse { 0%,100%{transform:scale(1);}50%{transform:scale(1.06);} }
    @keyframes ww-dot   { 0%,100%{opacity:.25;}50%{opacity:1;} }
    @keyframes ww-float { 0%,100%{transform:translateY(0);}50%{transform:translateY(-7px);} }
    @keyframes ww-wave  { from{transform:translateX(0);}to{transform:translateX(-50%);} }
    @keyframes ww-sun   { 0%,100%{opacity:.85;}50%{opacity:1;} }
    @keyframes ww-star  { 0%,100%{opacity:.5;transform:scale(.85);}50%{opacity:1;transform:scale(1.2);} }
</style>

{{-- JS Helper --}}
<script>
    window.WayWayLoading = {
        messages: {
            login:     ['Welcome, explorer!', 'Loading your journeys...', 'Almost there ✦'],
            logout:    ['Signing you out...', 'Until the next adventure!', 'Goodbye for now...'],
            itinerary: ['Mapping your route...', 'Discovering destinations...', 'Building your itinerary...', 'Calculating distances...'],
            default:   ['Loading...', 'Please wait...', 'Almost there...'],
        },
        _interval: null,
        show(type = 'default') {
            const el    = document.getElementById('ww-loading');
            const msgEl = document.getElementById('ww-loading-msg');
            if (!el) return;
            el.style.display = 'flex';
            const msgs = this.messages[type] || this.messages.default;
            let i = 0;
            msgEl.textContent = msgs[0];
            clearInterval(this._interval);
            this._interval = setInterval(() => {
                i = (i + 1) % msgs.length;
                msgEl.textContent = msgs[i];
            }, 1600);
        },
        hide() {
            const el = document.getElementById('ww-loading');
            if (el) el.style.display = 'none';
            clearInterval(this._interval);
        }
    };
</script>