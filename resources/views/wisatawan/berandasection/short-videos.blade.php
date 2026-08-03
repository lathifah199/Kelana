{{-- =========================================================
     SECTION: Kelana Short Videos (Reels/TikTok style)
     Save at: resources/views/partials/short-videos.blade.php
     Include on the homepage with: @include('partials.short-videos')
     ========================================================= --}}

<section class="kelana-reels" id="short-videos">
    <div class="kelana-reels__head">
        <span class="kelana-reels__eyebrow">Watch &amp; Feel</span>
        <h2 class="kelana-reels__title">Kelana in Motion</h2>
        <p class="kelana-reels__subtitle">Swipe sideways for quick glimpses of the Nusantara</p>
    </div>

    <div class="kelana-reels__track" id="reelsTrack">
        {{-- REPEAT this <article> block for each promo video --}}
        <article class="reel-card" data-video-index="0">
            <video
                class="reel-card__video"
                src="{{ asset('videos/promo-1.mp4') }}"
                poster="{{ asset('images/promo-1-thumb.jpeg') }}"
                muted playsinline preload="metadata">
            </video>
            <div class="reel-card__overlay">
                <button type="button" class="reel-card__play" aria-label="Play video">
                    <svg viewBox="0 0 24 24" width="26" height="26" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
                </button>
                <span class="reel-card__label">Nongsa Point Resort</span>
            </div>
        </article>

        <article class="reel-card" data-video-index="1">
            <video
                class="reel-card__video"
                src="{{ asset('videos/promo-2.mp4') }}"
                poster="{{ asset('images/promo-2-thumb.png') }}"
                muted playsinline preload="metadata">
            </video>
            <div class="reel-card__overlay">
                <button type="button" class="reel-card__play" aria-label="Play video">
                    <svg viewBox="0 0 24 24" width="26" height="26" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
                </button>
                <span class="reel-card__label">Mula Patisseri</span>
            </div>
        </article>

        <article class="reel-card" data-video-index="2">
            <video
                class="reel-card__video"
                src="{{ asset('videos/promo-3.mp4') }}"
                poster="{{ asset('images/promo-3-thumb.png') }}"
                muted playsinline preload="metadata">
            </video>
            <div class="reel-card__overlay">
                <button type="button" class="reel-card__play" aria-label="Play video">
                    <svg viewBox="0 0 24 24" width="26" height="26" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
                </button>
                <span class="reel-card__label">Wey Wey Live Seafood</span>
            </div>
        </article>

        {{-- Every new card below MUST have a matching .reel-slide in the popup
             with the SAME data-video-index, or clicking it won't open anything --}}
        <article class="reel-card" data-video-index="3">
            <video
                class="reel-card__video"
                src="{{ asset('videos/promo-4.mp4') }}"
                poster="{{ asset('images/promo-4-thumb.jpeg') }}"
                muted playsinline preload="metadata">
            </video>
            <div class="reel-card__overlay">
                <button type="button" class="reel-card__play" aria-label="Play video">
                    <svg viewBox="0 0 24 24" width="26" height="26" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
                </button>
                <span class="reel-card__label">Komodo Island</span>
            </div>
        </article>

        <article class="reel-card" data-video-index="4">
            <video
                class="reel-card__video"
                src="{{ asset('videos/promo-5.mp4') }}"
                poster="{{ asset('images/promo-5-thumb.jpeg') }}"
                muted playsinline preload="metadata">
            </video>
            <div class="reel-card__overlay">
                <button type="button" class="reel-card__play" aria-label="Play video">
                    <svg viewBox="0 0 24 24" width="26" height="26" fill="currentColor"><path d="M8 5v14l11-7z"/></svg>
                </button>
                <span class="reel-card__label">Taplau Seafood Restaurant</span>
            </div>
        </article>
    </div>
</section>

{{-- =========================================================
     POPUP PLAYER (Reels/TikTok style, vertical scroll-snap)
     ========================================================= --}}
<div class="reel-popup" id="reelPopup" aria-hidden="true">
    <button type="button" class="reel-popup__close" id="reelPopupClose" aria-label="Close">
        <svg viewBox="0 0 24 24" width="22" height="22" fill="none" stroke="currentColor" stroke-width="2.4" stroke-linecap="round">
            <path d="M6 6l12 12M18 6L6 18"/>
        </svg>
    </button>

    <div class="reel-popup__stage" id="reelStage">
        {{-- These slides mirror the cards above 1:1 by data-video-index --}}
        <div class="reel-slide" data-video-index="0">
            <video class="reel-slide__video" src="{{ asset('videos/promo-1.mp4') }}" playsinline></video>
            <div class="reel-slide__caption">Lake Toba</div>
        </div>
        <div class="reel-slide" data-video-index="1">
            <video class="reel-slide__video" src="{{ asset('videos/promo-2.mp4') }}" playsinline></video>
            <div class="reel-slide__caption">Raja Ampat</div>
        </div>
        <div class="reel-slide" data-video-index="2">
            <video class="reel-slide__video" src="{{ asset('videos/promo-3.mp4') }}" playsinline></video>
            <div class="reel-slide__caption">Mount Bromo</div>
        </div>
        <div class="reel-slide" data-video-index="3">
            <video class="reel-slide__video" src="{{ asset('videos/promo-4.mp4') }}" playsinline></video>
            <div class="reel-slide__caption">Komodo Island</div>
        </div>
        <div class="reel-slide" data-video-index="4">
            <video class="reel-slide__video" src="{{ asset('videos/promo-5.mp4') }}" playsinline></video>
            <div class="reel-slide__caption">Bali Rice Terraces</div>
        </div>
    </div>

    <div class="reel-popup__hint" id="reelHint">Scroll down for the next video</div>
</div>

<style>
    :root{
        --kelana-purple-deep: #3B1E6D;
        --kelana-purple-soft: #C4B5FD;
        --kelana-cream: #F4DBB4;
    }

    /* ---------- HOMEPAGE SECTION ---------- */
    .kelana-reels{
        padding: 64px 24px 80px;
        background: linear-gradient(180deg, #FFFFFF 0%, #F7F2FF 100%);
    }
    .kelana-reels__head{
        max-width: 720px;
        margin: 0 auto 32px;
        text-align: center;
    }
    .kelana-reels__eyebrow{
        display: inline-block;
        font-family: 'Changa One', sans-serif;
        font-size: 13px;
        letter-spacing: .12em;
        text-transform: uppercase;
        color: var(--kelana-purple-deep);
        background: var(--kelana-cream);
        padding: 6px 14px;
        border-radius: 999px;
        margin-bottom: 12px;
    }
    .kelana-reels__title{
        font-family: 'Changa One', sans-serif;
        font-size: clamp(26px, 4vw, 38px);
        color: var(--kelana-purple-deep);
        margin: 0 0 8px;
    }
    .kelana-reels__subtitle{
        color: #6b6470;
        font-size: 15px;
        margin: 0;
    }

    .kelana-reels__track{
        display: flex;
        gap: 20px;
        max-width: 1180px;
        margin: 0 auto;
        overflow-x: auto;
        padding: 8px 8px 20px;
        scroll-snap-type: x proximity;
        scrollbar-width: thin;
        scrollbar-color: var(--kelana-purple-soft) transparent;
    }
    .kelana-reels__track::-webkit-scrollbar{ height: 6px; }
    .kelana-reels__track::-webkit-scrollbar-thumb{
        background: var(--kelana-purple-soft);
        border-radius: 999px;
    }

    /* Card width is a percentage of the track, so exactly 3 fit per row on
       desktop and it still scrolls sideways once there are more than 3 */
    .reel-card{
        position: relative;
        flex: 0 0 calc((100% - 40px) / 3); /* 3 per row, 2 gaps of 20px */
        aspect-ratio: 9 / 16;
        max-height: 520px;
        border-radius: 20px;
        overflow: hidden;
        scroll-snap-align: start;
        cursor: pointer;
        box-shadow: 0 10px 24px rgba(59, 30, 109, 0.18);
        transition: transform .25s ease;
    }
    .reel-card:hover{ transform: translateY(-4px); }
    .reel-card__video{
        width: 100%;
        height: 100%;
        object-fit: cover;
        display: block;
        pointer-events: none;
    }
    .reel-card__overlay{
        position: absolute;
        inset: 0;
        display: flex;
        flex-direction: column;
        justify-content: flex-end;
        align-items: center;
        padding: 14px;
        background: linear-gradient(180deg, rgba(59,30,109,0) 45%, rgba(59,30,109,0.75) 100%);
    }
    .reel-card__play{
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        width: 52px;
        height: 52px;
        border-radius: 50%;
        border: none;
        background: rgba(244, 219, 180, 0.92);
        color: var(--kelana-purple-deep);
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
    }
    .reel-card__play svg{ margin-left: 3px; }
    .reel-card__label{
        color: #fff;
        font-family: 'Changa One', sans-serif;
        font-size: 15px;
        letter-spacing: .02em;
    }

    /* ---------- POPUP PLAYER ---------- */
    /* z-index is pushed very high on purpose so it always sits above the site navbar */
    .reel-popup{
        position: fixed;
        inset: 0;
        background: rgba(20, 10, 36, 0.55);
        backdrop-filter: blur(10px);
        -webkit-backdrop-filter: blur(10px);
        z-index: 999999;
        display: none;
    }
    .reel-popup.is-open{ display: block; }

    .reel-popup__close{
        position: absolute;
        top: 18px;
        right: 18px;
        z-index: 20;
        width: 44px;
        height: 44px;
        border-radius: 50%;
        border: none;
        background: rgba(255,255,255,0.18);
        color: #fff;
        display: flex;
        align-items: center;
        justify-content: center;
        cursor: pointer;
        pointer-events: auto;
        backdrop-filter: blur(4px);
    }
    .reel-popup__close:hover{ background: rgba(255,255,255,0.3); }

    .reel-popup__stage{
        height: 100%;
        overflow-y: auto;
        scroll-snap-type: y mandatory;
        scroll-behavior: smooth;
    }
    .reel-slide{
        position: relative;
        height: 100%;
        width: 100%;
        scroll-snap-align: start;
        scroll-snap-stop: always;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .reel-slide__video{
        height: 92vh;
        width: auto;
        max-width: 96vw;
        object-fit: contain;
        border-radius: 14px;
        box-shadow: 0 20px 60px rgba(0,0,0,0.45);
        margin: 0 auto;
    }
    .reel-slide__caption{
        position: absolute;
        left: 50%;
        bottom: 6%;
        transform: translateX(-50%);
        color: #fff;
        font-family: 'Changa One', sans-serif;
        font-size: 18px;
        text-shadow: 0 2px 8px rgba(0,0,0,0.6);
    }

    .reel-popup__hint{
        position: absolute;
        bottom: 14px;
        left: 50%;
        transform: translateX(-50%);
        color: rgba(255,255,255,0.8);
        font-size: 12px;
        letter-spacing: .03em;
        pointer-events: none;
        z-index: 15;
        transition: opacity .3s ease;
    }

    @media (max-width: 900px){
        .reel-card{ flex-basis: calc((100% - 20px) / 2); } /* 2 per row */
    }
    @media (max-width: 600px){
        .reel-card{ flex-basis: 78%; max-height: 460px; } /* 1 + a peek of the next */
    }
    @media (max-width: 768px){
        .reel-slide__video{ height: 88vh; }
    }
</style>

<script>
    (function () {
        const track = document.getElementById('reelsTrack');
        const popup = document.getElementById('reelPopup');
        const stage = document.getElementById('reelStage');
        const closeBtn = document.getElementById('reelPopupClose');
        const hint = document.getElementById('reelHint');

        if (!track || !popup) return;

        const cards = Array.from(track.querySelectorAll('.reel-card'));
        const slides = Array.from(stage.querySelectorAll('.reel-slide'));

        function pauseAllSlides() {
            slides.forEach(s => {
                const v = s.querySelector('video');
                if (v) { v.pause(); }
            });
        }

        function openPopupAt(index) {
            popup.classList.add('is-open');
            popup.setAttribute('aria-hidden', 'false');
            document.body.style.overflow = 'hidden';

            const target = slides[index];
            if (target) {
                stage.scrollTo({ top: target.offsetTop, behavior: 'auto' });
                const v = target.querySelector('video');
                if (v) { v.muted = false; v.currentTime = 0; v.play().catch(() => {}); }
            }

            if (hint) {
                hint.style.opacity = '1';
                clearTimeout(hint._t);
                hint._t = setTimeout(() => { hint.style.opacity = '0'; }, 3000);
            }
        }

        function closePopup() {
            popup.classList.remove('is-open');
            popup.setAttribute('aria-hidden', 'true');
            document.body.style.overflow = '';
            pauseAllSlides();
        }

        // Click a card on the homepage -> open the popup on the matching video
        cards.forEach(card => {
            card.addEventListener('click', () => {
                const index = parseInt(card.dataset.videoIndex, 10) || 0;
                openPopupAt(index);
            });
        });

        // Close (X) button
        closeBtn.addEventListener('click', function (e) {
            e.stopPropagation();
            closePopup();
        });

        // Clicking the empty backdrop area also closes it
        popup.addEventListener('click', (e) => {
            if (e.target === popup || e.target === stage) closePopup();
        });

        // Esc key closes it
        document.addEventListener('keydown', (e) => {
            if (e.key === 'Escape' && popup.classList.contains('is-open')) closePopup();
        });

        // Auto play/pause based on which slide is in view (Reels-style scroll effect)
        const observer = new IntersectionObserver((entries) => {
            entries.forEach(entry => {
                const video = entry.target.querySelector('video');
                if (!video) return;
                if (entry.isIntersecting && entry.intersectionRatio >= 0.6) {
                    video.currentTime = 0;
                    video.muted = false;
                    video.play().catch(() => {});
                } else {
                    video.pause();
                }
            });
        }, { root: stage, threshold: [0, 0.6, 1] });

        slides.forEach(s => observer.observe(s));
    })();
</script>