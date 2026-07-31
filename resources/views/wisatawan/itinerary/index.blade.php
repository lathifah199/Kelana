@extends('layouts.app')

@section('title', 'AI Itinerary Planner — Kelana')

@push('styles')
<style>
    /* ===== GENERAL ===== */
    [x-cloak] { display: none !important; }

    /* Modal dark overlay */
    .modal-backdrop {
        background: rgba(139, 123, 197, 0.55);
        backdrop-filter: blur(6px);
    }

    /* ===== CATEGORY PILLS ===== */
    .kat-pill { transition: all 0.15s ease; }
    .kat-pill.active { transform: scale(1.05); }

    /* ===== COMPANION CARDS ===== */
    .companion-card { transition: all 0.15s ease; cursor: pointer; }
    .companion-card:hover { transform: translateY(-2px); }
    .companion-card.selected {
        border-color: #8678beff !important;
        background: #F3F0FE;
    }

    /* ===== LOCATION SEARCH DROPDOWN ===== */
    .search-dropdown {
        max-height: 220px;
        overflow-y: auto;
        box-shadow: 0 10px 30px rgba(0,0,0,0.12);
    }
    .search-result-item { transition: background 0.1s ease; }
    .search-result-item:hover { background: #F3F0FE; }
</style>
@endpush

@section('content')
<div x-data="itineraryApp()" x-cloak>

{{-- ===================================================
     HERO SECTION
=================================================== --}}
<section class="relative w-full min-h-screen flex items-center justify-center overflow-hidden">

    {{-- VIDEO BACKGROUND --}}
    <video autoplay muted loop playsinline
        class="absolute inset-0 w-full h-full object-cover">
        <source src="{{ asset('videos/batam-hero.mp4') }}" type="video/mp4">
    </video>

    {{-- OVERLAY --}}
    <div class="absolute inset-0 bg-gradient-to-b from-black/20 via-black/10 to-transparent"></div>

    {{-- FLOATING ORBS --}}
    <div class="absolute top-0 left-1/4 w-96 h-96 rounded-full blur-3xl -translate-y-1/2 opacity-20"
         style="background:#A78BFA;"></div>
    <div class="absolute bottom-0 right-1/3 w-80 h-80 rounded-full blur-3xl translate-y-1/2 opacity-15"
         style="background:#6B4CE6;"></div>

    {{-- CONTENT --}}
    <div class="relative z-20 text-center px-4 sm:px-6 max-w-2xl text-white">

        <div class="inline-flex items-center gap-2 bg-white/10 border border-white/20 px-4 py-1.5 rounded-full text-sm font-medium mb-6 text-purple-100">
            <span class="w-2 h-2 rounded-full animate-pulse" style="background:#A78BFA;"></span>
            Smart Planning &middot; Optimized Routes
        </div>

        <h1 class="text-4xl sm:text-5xl md:text-6xl font-bold leading-tight">
            Build Your<br>
            <span style="color: #F5DBB4;">Itinerary</span>
        </h1>

        <p class="mt-4 sm:mt-6 text-base sm:text-lg text-white/85 max-w-xl mx-auto leading-relaxed">
            Choose your interests, set a budget, and get a personalized travel plan — complete with a map and hourly schedule.
        </p>

        <div class="flex flex-col sm:flex-row items-center justify-center gap-4 mt-8">

            {{-- Plan My Trip --}}
            <button @click="openModal()"
            class="inline-flex items-center gap-3 font-bold px-8 py-4 rounded-2xl text-base shadow-lg
            bg-[#F4DBB4] text-[#1e293b] hover:bg-[#f9d497] transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
                Plan My Trip
            </button>

            {{-- My Trips --}}
            <a href="{{ route('itinerary.history') }}"
               class="inline-flex items-center gap-3 font-bold px-8 py-4 rounded-2xl text-base shadow-lg
           bg-[#5F5A98] text-white hover:bg-[#4D497A] transition">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                My Trips
            </a>
        </div>
    </div>

    <div class="absolute bottom-0 left-0 w-full h-32 bg-gradient-to-t from-white to-transparent z-10"></div>
</section>

{{-- ===================================================
     LOADING OVERLAY — Kelana style
=================================================== --}}
<div x-show="isLoading"
     class="fixed inset-0 z-[9999] flex flex-col items-center justify-center"
     style="background:rgba(132, 115, 192, 0.6); backdrop-filter:blur(8px);">

    {{-- Card putih --}}
    <div class="bg-white rounded-3xl shadow-2xl p-8 w-full max-w-sm mx-4 flex flex-col items-center gap-5 relative overflow-hidden">

        {{-- Ring + SVG sunset --}}
        <div class="relative w-36 h-36 flex items-center justify-center">
            {{-- Ring luar --}}
            <div class="absolute w-36 h-36 rounded-full"
                 style="border:2.5px solid transparent; border-top-color:#6B4CE6; border-right-color:#F3C969; animation:ww-spin 2.5s linear infinite;"></div>
            {{-- Ring dalam dashed --}}
            <div class="absolute w-28 h-28 rounded-full"
                 style="border:1.5px dashed rgba(167,139,250,0.5); animation:ww-spin-r 4s linear infinite;"></div>

            {{-- SVG sunset --}}
            <svg width="96" height="96" viewBox="0 0 108 108"
                 xmlns="http://www.w3.org/2000/svg"
                 style="z-index:2; animation:ww-pulse 3s ease-in-out infinite;">
                <defs><clipPath id="kl-itin-clip"><circle cx="54" cy="54" r="50"/></clipPath></defs>
                <circle cx="54" cy="54" r="51" fill="#C9B8E8" stroke="#7C5CBF" stroke-width="2"/>
                <g clip-path="url(#kl-itin-clip)">
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
                    {{-- Waypoints rute --}}
                    <circle cx="22" cy="60" r="3.5" fill="#F3C969" stroke="white" stroke-width="1.5" style="animation:ww-float 2s ease-in-out infinite;"/>
                    <circle cx="54" cy="50" r="3.5" fill="#F3C969" stroke="white" stroke-width="1.5" style="animation:ww-float 2.3s ease-in-out infinite .3s;"/>
                    <circle cx="84" cy="60" r="3.5" fill="#F3C969" stroke="white" stroke-width="1.5" style="animation:ww-float 2s ease-in-out infinite .6s;"/>
                    <path d="M22 60 Q38 44 54 50 Q70 56 84 60" stroke="white" stroke-width="1.5" stroke-dasharray="4 3" fill="none" opacity="0.6"/>
                    <circle cx="54" cy="64" r="18" fill="#FDEBC0" opacity="0.45" style="animation:ww-sun 2s ease-in-out infinite;"/>
                    <circle cx="54" cy="64" r="13" fill="#F8C84A"/>
                    <circle cx="54" cy="64" r="8"  fill="#FEF0A0"/>
                    <ellipse cx="20" cy="22" rx="11" ry="5" fill="white" opacity="0.55"/>
                    <ellipse cx="78" cy="26" rx="9"  ry="4" fill="white" opacity="0.45"/>
                    <circle cx="15" cy="14" r="1.5" fill="white" opacity="0.8" style="animation:ww-star 2s ease-in-out infinite;"/>
                    <circle cx="88" cy="12" r="1.2" fill="white" opacity="0.7" style="animation:ww-star 1.8s ease-in-out infinite .4s;"/>
                    <g transform="translate(84,20)" style="animation:ww-float 2.5s ease-in-out infinite;">
                        <polygon points="0,-8 2,-2 8,0 2,2 0,8 -2,2 -8,0 -2,-2" fill="#F3C969" stroke="#D4A843" stroke-width="0.5"/>
                    </g>
                </g>
                <circle cx="54" cy="54" r="51" fill="none" stroke="#7C5CBF" stroke-width="2"
                        stroke-dasharray="250 70" stroke-dashoffset="20" opacity="0.7"/>
            </svg>

            <span style="position:absolute;top:4px;right:8px;color:#F3C969;font-size:11px;animation:ww-float 2s ease-in-out infinite;pointer-events:none;">✦</span>
            <span style="position:absolute;top:26px;left:4px;color:#A78BFA;font-size:7px;animation:ww-float 2.7s ease-in-out infinite .4s;pointer-events:none;">✦</span>
        </div>

        {{-- Brand --}}
        <div class="flex items-center gap-2">
            <div class="w-2 h-2 rounded-full" style="background:#A78BFA;"></div>
            <span class="font-semibold text-base" style="color:#4F33B8; letter-spacing:1.5px;">Kelana</span>
        </div>

        {{-- Pipeline steps --}}
        <div class="flex items-center gap-1 w-full">
            <template x-for="(step, i) in pipeline" :key="i">
                <div class="flex items-center gap-1 flex-1">
                    <div class="flex flex-col items-center gap-1 flex-shrink-0">
                        <div :class="pipelineStep > i
                            ? 'w-8 h-8 rounded-full flex items-center justify-center text-xs text-white'
                            : pipelineStep === i
                                ? 'w-8 h-8 rounded-full flex items-center justify-center text-xs ring-2 animate-pulse'
                                : 'w-8 h-8 rounded-full flex items-center justify-center text-xs'"
                             :style="pipelineStep > i
                                ? 'background:#6B4CE6;'
                                : pipelineStep === i
                                    ? 'background:#F3F0FE; color:#6B4CE6; outline:2px solid #A78BFA;'
                                    : 'background:#f1f5f9; color:#94a3b8;'">
                            <span x-text="pipelineStep > i ? '✓' : step.icon"></span>
                        </div>
                        <span class="text-xs whitespace-nowrap" style="color:#64748b;" x-text="step.label"></span>
                    </div>
                    <div x-show="i < pipeline.length - 1"
                         :style="pipelineStep > i
                            ? 'flex:1;height:2px;background:#6B4CE6;margin-bottom:16px;'
                            : 'flex:1;height:2px;background:#625598;margin-bottom:16px;'">
                    </div>
                </div>
            </template>
        </div>

        {{-- Pesan loading --}}
        <p class="text-sm font-medium animate-pulse" style="color:#6B4CE6;" x-text="loadingLabel"></p>

        {{-- Ombak bawah --}}
        <div class="absolute bottom-0 left-0 right-0 h-12 overflow-hidden pointer-events-none">
            <svg style="width:200%; animation:ww-wave 5s linear infinite;" viewBox="0 0 800 50" xmlns="http://www.w3.org/2000/svg">
                <path d="M0 30 Q100 10 200 30 Q300 50 400 30 Q500 10 600 30 Q700 50 800 30
                         Q900 10 1000 30 Q1100 50 1200 30 Q1300 10 1400 30 Q1500 50 1600 30
                         L1600 50 L0 50 Z" fill="rgba(107,76,230,0.10)"/>
                <path d="M0 38 Q140 20 280 38 Q420 56 560 38 Q700 20 840 38 Q980 56 1120 38
                         Q1260 20 1400 38 L1600 38 L1600 50 L0 50 Z" fill="rgba(243,201,105,0.07)"/>
            </svg>
        </div>
    </div>
</div>

{{-- ===================================================
     MODAL STEPPER
=================================================== --}}
<div x-show="showModal"
     class="fixed inset-0 z-50 flex items-center justify-center p-4 modal-backdrop"
     @click.self="closeModal()">

    <div class="bg-white rounded-3xl shadow-2xl w-full max-w-lg max-h-[90vh] overflow-hidden flex flex-col"
         @click.stop>

        {{-- Modal header --}}
        <div class="px-6 pt-6 pb-4 border-b border-slate-100">
            <div class="flex items-center justify-between mb-4">
                <h2 class="font-bold text-slate-800 text-lg" x-text="steps[currentStep].title"></h2>
                <button @click="closeModal()"
                    class="w-8 h-8 rounded-full bg-slate-100 hover:bg-slate-200 flex items-center justify-center transition">
                    <svg class="w-4 h-4 text-slate-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>

            {{-- Step dots --}}
            <div class="flex items-center gap-1">
                <template x-for="(step, i) in steps" :key="i">
                    <div class="flex items-center gap-1 flex-1">
                        <div :class="i < currentStep
                                ? 'w-7 h-7 rounded-full text-xs font-bold flex items-center justify-center text-white'
                                : i === currentStep
                                    ? 'w-7 h-7 rounded-full text-xs font-bold flex items-center justify-center ring-2'
                                    : 'w-7 h-7 rounded-full text-xs font-bold flex items-center justify-center bg-slate-100 text-slate-400'"
                             :style="i < currentStep
                                ? 'background:#625598;'
                                : i === currentStep
                                    ? 'background:#F3F0FE; color:#625598; outline:2px solid #857d9eff;'
                                    : ''"
                             x-text="i < currentStep ? '&#10003;' : (i + 1)">
                        </div>
                        <div x-show="i < steps.length - 1"
                            :style="i < currentStep
                                ? 'flex:1;height:2px;background:#625598;'
                                : 'flex:1;height:2px;background:#625598;'">
                        </div>
                    </div>
                </template>
            </div>
            <p class="text-xs text-slate-400 mt-2" x-text="steps[currentStep].subtitle"></p>
        </div>

        {{-- Modal body --}}
        <div class="flex-1 overflow-y-auto px-6 py-5">

            {{-- STEP 1: Interests --}}
            <div x-show="currentStep === 0">
                <div class="flex flex-wrap gap-2">
                    @foreach($kategoris as $kat)
                    <button type="button" @click="toggleKategori({{ $kat->id }})"
                        :class="form.kategori_ids.includes({{ $kat->id }})
                            ? 'kat-pill active px-4 py-2 rounded-xl text-sm font-semibold border-2 text-white shadow-md'
                            : 'kat-pill px-4 py-2 rounded-xl text-sm font-semibold border-2 bg-white border-slate-200 text-slate-600 hover:border-purple-300 hover:bg-purple-50'"
                        :style="form.kategori_ids.includes({{ $kat->id }}) ? 'background:#6B4CE6; border-color:#6B4CE6;' : ''">
                        {{ $kat->nama_kategori }}
                    </button>
                    @endforeach
                </div>
                <p x-show="errors.kategori" class="text-red-500 text-xs mt-3" x-text="errors.kategori"></p>
            </div>

            {{-- STEP 2: Location --}}
            <div x-show="currentStep === 1" class="space-y-3">
                <p class="text-sm text-slate-500">Search for your starting point:</p>
                <div class="relative">
                    <div class="relative flex items-center">
                        <svg class="absolute left-5 w-5 h-5 text-slate-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                        <input type="text"
                            x-model="locationQuery"
                            @input.debounce.500ms="searchLocation()"
                            @keydown.escape="locationResults = []"
                            placeholder="e.g. Nagoya Hill, Hotel XYZ..."
                            class="w-full h-14 pl-14 pr-16 rounded-xl border border-slate-200 text-sm leading-none focus:outline-none focus:ring-2 transition"
                            style="focus:ring-color:#6B4CE6;">
                        <button type="button" @click="useCurrentLocation()"
                            class="absolute right-4 w-10 h-10 flex items-center justify-center rounded-lg transition"
                            style="background:#F3F0FE;">
                            <svg class="w-5 h-5" style="color:#6B4CE6;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                        </button>
                    </div>
                    <div x-show="locationResults.length > 0"
                         class="search-dropdown absolute w-full bg-white border border-slate-200 rounded-xl mt-1 z-10">
                        <template x-for="(loc, i) in locationResults" :key="i">
                            <button type="button" @click="selectLocation(loc)"
                                class="search-result-item w-full text-left px-4 py-3 text-sm border-b border-slate-100 last:border-0">
                                <p class="font-medium text-slate-800 truncate" x-text="loc.display_name.split(',')[0]"></p>
                                <p class="text-xs text-slate-400 truncate" x-text="loc.display_name"></p>
                            </button>
                        </template>
                    </div>
                    <div x-show="isSearching" class="flex items-center gap-2 mt-2 text-xs text-slate-400">
                        <svg class="w-3 h-3 animate-spin" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4z"></path>
                        </svg>
                        Searching...
                    </div>
                </div>

                <div x-show="form.origin_label" class="flex items-center gap-2 rounded-xl px-4 py-3"
                     style="background:#F3F0FE; border:1px solid #A78BFA;">
                    <svg class="w-4 h-4 flex-shrink-0" style="color:#6B4CE6;" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                    <p class="text-sm font-medium truncate" style="color:#4F33B8;" x-text="form.origin_label"></p>
                    <button type="button" @click="clearLocation()" class="ml-auto" style="color:#6B4CE6;">
                        <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                        </svg>
                    </button>
                </div>
                <p class="text-xs text-slate-400">Powered by OpenStreetMap. Used to calculate the nearest route from your starting point.</p>
            </div>

            {{-- STEP 3: Companion --}}
            <div x-show="currentStep === 2">
                <div class="grid grid-cols-2 gap-3">
                    @php
                        $companions = [
                            'solo'     => ['label' => 'Solo',    'desc' => 'Traveling alone, total freedom!'],
                            'pasangan' => ['label' => 'Couple',  'desc' => 'Romantic trip for two'],
                            'keluarga' => ['label' => 'Family',  'desc' => 'Fun for the whole family'],
                            'grup'     => ['label' => 'Group',   'desc' => 'The more the merrier!'],
                        ];
                    @endphp
                    @foreach($companions as $val => $opt)
                    <button type="button" @click="form.companion = '{{ $val }}'"
                        :class="form.companion === '{{ $val }}'
                            ? 'companion-card selected p-4 rounded-2xl border-2 text-left'
                            : 'companion-card p-4 rounded-2xl border-2 border-slate-200 text-left hover:border-purple-300'">
                        <p class="font-bold text-slate-800 text-sm">{{ $opt['label'] }}</p>
                        <p class="text-xs text-slate-400 mt-0.5">{{ $opt['desc'] }}</p>
                    </button>
                    @endforeach
                </div>
            </div>

            {{-- STEP 4: Date & Budget --}}
            <div x-show="currentStep === 3" class="space-y-5">
                <div>
                    <label class="block text-sm font-semibold text-slate-600 mb-2">Visit Date</label>
                    <input type="date" x-model="form.tanggal" :min="today"
                        class="w-full px-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 transition"
                        style="--tw-ring-color:#6B4CE6;">
                    <p x-show="errors.tanggal" class="text-red-500 text-xs mt-1" x-text="errors.tanggal"></p>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-600 mb-2">Budget per Person (entrance fees)</label>
                    <div class="relative mb-3">
                        <span class="absolute left-5 top-[14px] text-slate-400 text-sm">Rp</span>
                        <input type="text"
                            x-model="formattedBudget"
                            @input="form.budget = parseInt($event.target.value.replace(/\./g, '')) || 0"
                            class="w-full pl-10 pr-4 py-3 rounded-xl border border-slate-200 text-sm focus:outline-none focus:ring-2 transition">
                    </div>
                    <div class="flex gap-2 flex-wrap">
                        @foreach($budgetOptions as $val => $label)
                        <button type="button" @click="form.budget = {{ $val }}"
                            :class="form.budget == {{ $val }}
                                ? 'px-3 py-1.5 text-xs rounded-lg border-2 text-white font-semibold'
                                : 'px-3 py-1.5 text-xs rounded-lg border-2 border-slate-200 text-slate-500 hover:border-purple-300'"
                            :style="form.budget == {{ $val }} ? 'background:#6B4CE6; border-color:#6B4CE6;' : ''">
                            {{ $label }}
                        </button>
                        @endforeach
                    </div>
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-600 mb-2">
                        Max Destinations (<span x-text="form.max_destinations"></span> stops)
                    </label>
                    <input type="range" x-model="form.max_destinations" min="2" max="10"
                           class="w-full" style="accent-color:#6B4CE6;">
                    <div class="flex justify-between text-xs text-slate-400 mt-1">
                        <span>2 stops</span>
                        <span>10 stops</span>
                    </div>
                </div>
            </div>

            {{-- STEP 5: Confirm --}}
            <div x-show="currentStep === 4" class="space-y-4">
                <div class="bg-slate-50 rounded-2xl p-4 divide-y divide-slate-200">
                    <div class="flex items-center justify-between py-3">
                        <span class="text-sm text-slate-500">Interests</span>
                        <span class="text-sm font-semibold text-slate-700" x-text="form.kategori_ids.length + ' selected'"></span>
                    </div>
                    <div class="flex items-center justify-between py-3">
                        <span class="text-sm text-slate-500">Starting from</span>
                        <span class="text-sm font-semibold text-slate-700 text-right max-w-44 truncate" x-text="form.origin_label || 'Batam Center'"></span>
                    </div>
                    <div class="flex items-center justify-between py-3">
                        <span class="text-sm text-slate-500">Traveling with</span>
                        <span class="text-sm font-semibold text-slate-700" x-text="companionLabel"></span>
                    </div>
                    <div class="flex items-center justify-between py-3">
                        <span class="text-sm text-slate-500">Date</span>
                        <span class="text-sm font-semibold text-slate-700" x-text="form.tanggal"></span>
                    </div>
                    <div class="flex items-center justify-between py-3">
                        <span class="text-sm text-slate-500">Max budget</span>
                        <span class="text-sm font-semibold text-slate-700">Rp <span x-text="Number(form.budget).toLocaleString('id-ID')"></span></span>
                    </div>
                    <div class="flex items-center justify-between py-3">
                        <span class="text-sm text-slate-500">Max stops</span>
                        <span class="text-sm font-semibold text-slate-700" x-text="form.max_destinations + ' destinations'"></span>
                    </div>
                </div>
                <div x-show="errors.general" class="bg-red-50 border border-red-200 rounded-xl p-3 text-red-700 text-sm" x-text="errors.general"></div>
            </div>
        </div>

        {{-- Modal footer --}}
        <div class="px-6 py-4 border-t border-slate-100 flex items-center justify-between gap-3">
            <button x-show="currentStep > 0" @click="prevStep()"
                class="flex items-center gap-2 px-4 py-2.5 rounded-xl border border-slate-200 text-sm font-medium text-slate-600 hover:bg-slate-50 transition">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"/>
                </svg>
                Back
            </button>
            <div x-show="currentStep === 0" class="text-xs text-slate-400">Select at least 1 category</div>

            <button x-show="currentStep < steps.length - 1" @click="nextStep()"
                class="ml-auto flex items-center gap-2 px-5 py-2.5 rounded-xl text-white text-sm font-semibold transition"
                style="background:#9971bd;">
                Next
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5l7 7-7 7"/>
                </svg>
            </button>

            <button x-show="currentStep === steps.length - 1" @click="generateItinerary()"
                class="ml-auto flex items-center gap-3 px-6 py-2.5 rounded-xl text-white text-sm font-bold shadow-lg hover:shadow-xl hover:-translate-y-0.5 transition-all duration-300"
                style="background:linear-gradient(to right, #aaa1d2ff, #94b7ceff);">
                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                </svg>
                Generate Itinerary
            </button>
        </div>
    </div>
</div>

</div>
@endsection

@push('scripts')
<script>
function itineraryApp() {
    return {
        showModal:   false,
        currentStep: 0,

        steps: [
            { title: 'Choose Your Interests',       subtitle: 'What do you want to explore today? Pick one or more.' },
            { title: 'Departure Location',           subtitle: 'Where will your journey start?' },
            { title: 'Who Are You Traveling With?', subtitle: 'We\'ll tailor recommendations based on your group.' },
            { title: 'Date & Budget',               subtitle: 'When are you going and what\'s your budget?' },
            { title: 'Review & Generate',           subtitle: 'Double-check your preferences before we start.' },
        ],

        pipeline: [
            { icon: '🔍', label: 'Filter'    },
            { icon: '📊', label: 'Bayesian'  },
            { icon: '📏', label: 'Haversine' },
            { icon: '🗺️', label: 'Route'     },
            { icon: '✅', label: 'OSRM'      },
        ],
        pipelineStep: 0,
        loadingLabel: 'Starting...',

        form: {
            kategori_ids:     [],
            budget:           100000,
            companion:        'keluarga',
            tanggal:          new Date().toISOString().split('T')[0],
            origin_lat:       1.1296758,
            origin_lon:       104.0452254,
            origin_label:     '',
            max_destinations: 6,
            available_hours:  8,
        },

        locationQuery:   '',
        locationResults: [],
        isSearching:     false,
        errors:          {},
        isLoading:       false,

        get today() {
            return new Date().toISOString().split('T')[0];
        },
        get formattedBudget() {
            return this.form.budget ? Number(this.form.budget).toLocaleString('id-ID') : '';
        },
        set formattedBudget(val) {
            this.form.budget = parseInt(val.replace(/\./g, '')) || 0;
        },
        get companionLabel() {
            return { solo:'Solo', pasangan:'Couple', keluarga:'Family', grup:'Group' }[this.form.companion] || this.form.companion;
        },

        openModal()  { this.showModal = true; this.currentStep = 0; this.errors = {}; },
        closeModal() { if (!this.isLoading) this.showModal = false; },

        toggleKategori(id) {
            const idx = this.form.kategori_ids.indexOf(id);
            if (idx === -1) this.form.kategori_ids.push(id);
            else            this.form.kategori_ids.splice(idx, 1);
        },

        async searchLocation() {
            const q = this.locationQuery.trim();
            if (q.length < 3) { this.locationResults = []; return; }
            this.isSearching = true;
            try {
                const url = 'https://nominatim.openstreetmap.org/search'
                    + '?format=json&limit=5&addressdetails=1'
                    + '&viewbox=103.9,1.0,104.3,1.3&bounded=0'
                    + '&q=' + encodeURIComponent(q + ' Batam');
                const res  = await fetch(url, { headers: { 'Accept-Language': 'en' } });
                this.locationResults = await res.json();
            } catch (e) {
                this.locationResults = [];
            } finally {
                this.isSearching = false;
            }
        },

        selectLocation(loc) {
            this.form.origin_label = loc.display_name.split(',')[0];
            this.form.origin_lat   = parseFloat(loc.lat);
            this.form.origin_lon   = parseFloat(loc.lon);
            this.locationQuery     = '';
            this.locationResults   = [];
        },

        clearLocation() {
            this.form.origin_label = '';
            this.form.origin_lat   = 1.1296758;
            this.form.origin_lon   = 104.0452254;
        },

        useCurrentLocation() {
            if (!navigator.geolocation) { alert('Geolocation is not supported.'); return; }
            navigator.geolocation.getCurrentPosition(
                pos => {
                    this.form.origin_lat   = pos.coords.latitude;
                    this.form.origin_lon   = pos.coords.longitude;
                    this.form.origin_label = 'My Current Location';
                    this.locationResults   = [];
                },
                err => alert('Could not get location: ' + err.message)
            );
        },

        validateStep() {
            this.errors = {};
            if (this.currentStep === 0 && !this.form.kategori_ids.length) {
                this.errors.kategori = 'Please select at least 1 category.';
                return false;
            }
            if (this.currentStep === 3 && !this.form.tanggal) {
                this.errors.tanggal = 'Please select a visit date.';
                return false;
            }
            return true;
        },

        nextStep() { if (!this.validateStep()) return; if (this.currentStep < this.steps.length - 1) this.currentStep++; },
        prevStep()  { if (this.currentStep > 0) this.currentStep--; },

        async generateItinerary() {
            this.showModal = false;
            this.isLoading = true;
            this.errors    = {};

            const steps = [
                [0, 'Filtering destinations...'],
                [1, 'Calculating scores...'],
                [2, 'Building distance matrix...'],
                [3, 'Optimizing route...'],
                [4, 'Validating via OSRM...'],
            ];

            for (const [step, label] of steps) {
                this.pipelineStep = step;
                this.loadingLabel = label;
                await new Promise(r => setTimeout(r, 500));
            }

            try {
                const response = await fetch('/itinerary/generate', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/json',
                        'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').content,
                        'Accept':       'application/json',
                    },
                    body: JSON.stringify(this.form),
                });

                const json = await response.json();

                if (json.success) {
                    window.location.href = '/itinerary/show/' + json.data.history_id;
                } else {
                    this.errors.general = json.message || 'Something went wrong.';
                    this.showModal      = true;
                    this.currentStep    = 4;
                    this.isLoading      = false;
                }
            } catch (err) {
                this.errors.general = 'Connection failed. Please check your internet.';
                this.showModal      = true;
                this.currentStep    = 4;
                this.isLoading      = false;
            }
        },
    };
}
</script>
@endpush