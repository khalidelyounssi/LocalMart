<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 280 100" class="h-10 w-auto">
    <defs>
        <filter id="greenGlow" x="-20%" y="-20%" width="140%" height="140%">
            <feGaussianBlur in="SourceAlpha" stdDeviation="4" result="blur" />
            <feOffset in="blur" dx="0" dy="4" result="offsetBlur" />
            <feFlood flood-color="#1DB954" flood-opacity="0.4" result="offsetColor" />
            <feComposite in="offsetColor" in2="offsetBlur" operator="in" result="shadow" />
            <feMerge>
                <feMergeNode in="shadow" />
                <feMergeNode in="SourceGraphic" />
            </feMerge>
        </filter>
    </defs>

    <rect x="10" y="10" width="60" height="60" rx="16" fill="#1DB954" filter="url(#greenGlow)"/>
    
    <path d="M30 45C30 35 38 28 45 28C52 28 60 35 60 45C60 55 52 62 40 62C34 62 30 58 30 45Z" fill="none" stroke="white" stroke-width="3" />
    <path d="M30 45C35 45 40 42 40 35M40 62V28M40 50C45 50 55 55 55 55" stroke="white" stroke-width="3" stroke-linecap="round" fill="none" />

    <text x="85" y="55" fill="#0F172A" style="font-family: 'Inter', sans-serif; font-weight: 800; font-size: 34px; letter-spacing: -1.2px;">LocalMart</text>
</svg>