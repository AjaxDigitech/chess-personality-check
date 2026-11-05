<?php
$canonical = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? 'https://' : 'http://')
    . $_SERVER['HTTP_HOST'] . strtok($_SERVER['REQUEST_URI'], '?');
?>
<!DOCTYPE html>
<html lang="en" data-theme="light">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chess Personality Test What Your Moves Reveal About Your Personality</title>
    <meta name="description" content="Play a quick game of chess and get a real personality read: how patient you are, how you handle risk, and how you make decisions under pressure. no signup.">
    <meta name="robots" content="index, follow">
    <link rel="canonical" href="<?php echo htmlspecialchars($canonical); ?>">

    <meta property="og:type" content="website">
    <meta property="og:title" content="Chess Personality Test What Your Moves Reveal About You">
    <meta property="og:description" content="Play one quick game of chess. We'll read your patience, risk appetite and decision-making style from how you move not how well you play.">
    <meta property="og:url" content="<?php echo htmlspecialchars($canonical); ?>">
    <meta property="og:site_name" content="Ajax Digitech">
    <!-- Replace with a real 1200x630 social image before launch -->
    <meta property="og:image" content="<?php echo htmlspecialchars(rtrim(dirname($canonical), '/')); ?>/og-chess-personality.jpg">
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="Chess Personality Test What Your Moves Reveal About You">
    <meta name="twitter:description" content="One quick game of chess. A real read on how you think, decide and handle pressure.">

    <link rel="icon" href="data:image/svg+xml,<svg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 100 100'><text y='.9em' font-size='90'>♘</text></svg>">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Fraunces:ital,opsz,wght@0,9..144,500;0,9..144,600;0,9..144,700;1,9..144,500&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">

    <script src="https://unpkg.com/react@18/umd/react.production.min.js"></script>
    <script src="https://unpkg.com/react-dom@18/umd/react-dom.production.min.js"></script>
    <script src="https://unpkg.com/@babel/standalone/babel.min.js"></script>

    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "WebApplication",
      "name": "Chess Personality Test",
      "applicationCategory": "LifestyleApplication",
      "operatingSystem": "Any",
      "description": "Play a short game of chess against an engine and receive a personality profile based on how you make decisions, handle pressure and take risks not on chess skill.",
      "offers": { "@type": "Offer", "price": "0", "priceCurrency": "USD" },
      "url": "<?php echo htmlspecialchars($canonical); ?>",
      "publisher": { "@type": "Organization", "name": "Ajax Digitech" }
    }
    </script>
    <script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "FAQPage",
      "mainEntity": [
        {
          "@type": "Question",
          "name": "Is this a real psychological personality test?",
          "acceptedAnswer": { "@type": "Answer", "text": "It's a lightweight, self-reflection tool inspired by decision-making psychology not a clinical assessment. It reads patterns in your moves (speed, risk, recovery from mistakes) to describe tendencies you'll likely recognize in yourself." }
        },
        {
          "@type": "Question",
          "name": "Do I need to know how to play chess?",
          "acceptedAnswer": { "@type": "Answer", "text": "No. You don't need any chess skill or strategy knowledge. The test reads how you approach decisions, not whether your moves are objectively good." }
        },
        {
          "@type": "Question",
          "name": "How long does the chess personality test take?",
          "acceptedAnswer": { "@type": "Answer", "text": "Most games finish in 5 to 10 minutes. You can resign at any point once you have enough moves in to get a read." }
        },
        {
          "@type": "Question",
          "name": "What does it actually measure?",
          "acceptedAnswer": { "@type": "Answer", "text": "Five tendencies: how you approach confrontation, your appetite for risk, your patience under time pressure, how far ahead you plan, and how you recover after a setback." }
        }
      ]
    }
    </script>

    <style>
        :root {
            --bg: #FAFAFA;
            --surface: #FFFFFF;
            --surface-raised: #FFFFFF;
            --text-main: #1B1712;
            --text-muted: #75695B;
            --border: #E7E1D8;
            --accent: #A9793C;
            --accent-soft: rgba(169, 121, 60, 0.14);
            --board-light: #EDE7DC;
            --board-dark: #8A7A64;
            --danger: #B5453C;
            --radius-sm: 4px;
            --radius-md: 10px;
            --shadow-card: 0 1px 2px rgba(27, 23, 18, 0.04);
            --shadow-raised: 0 16px 40px rgba(27, 23, 18, 0.12);
            --header-h: 60px;
            --container-pad: 32px;
            --side-reserve: 0px;
        }
        [data-theme="dark"] {
            --bg: #100E0B;
            --surface: #1A1712;
            --surface-raised: #201C16;
            --text-main: #F3EEE5;
            --text-muted: #A79A87;
            --border: #322C23;
            --accent: #D3A464;
            --accent-soft: rgba(211, 164, 100, 0.16);
            --board-light: #453D31;
            --board-dark: #211D17;
            --shadow-card: 0 1px 2px rgba(0, 0, 0, 0.3);
            --shadow-raised: 0 20px 50px rgba(0, 0, 0, 0.45);
        }

        * { box-sizing: border-box; }
        html { scroll-behavior: smooth; overflow-x: hidden; }
        body {
            margin: 0; padding: 0; background: var(--bg); color: var(--text-main);
            font-family: 'Inter', sans-serif; transition: background 0.3s, color 0.3s;
            -webkit-font-smoothing: antialiased;
            overflow-x: hidden;
            width: 100%;
        }
        body.lock-scroll { overflow: hidden; height: 100dvh; position: fixed; inset: 0; width: 100%; }
        html.lock-scroll { overflow: hidden; }
        h1, h2, h3 { font-family: 'Fraunces', serif; font-weight: 600; letter-spacing: -0.01em; margin: 0; }
        p { line-height: 1.65; }
        a { color: inherit; }

        /* ---------- Site chrome ---------- */
        .site-header {
            position: sticky; top: 0; z-index: 40; height: var(--header-h);
            display: flex; justify-content: space-between; align-items: center;
            padding: 0 5vw; border-bottom: 1px solid var(--border);
            background: color-mix(in srgb, var(--surface) 88%, transparent);
            backdrop-filter: blur(10px);
        }
        .brand { display: flex; align-items: center; gap: 10px; font-family: 'Fraunces', serif; font-weight: 600; font-size: 18px; background: none; border: none; padding: 0; cursor: pointer; color: inherit; }
        .brand-mark { width: 30px; height: 30px; border-radius: 7px; background: var(--text-main); color: var(--bg); display: flex; align-items: center; justify-content: center; font-size: 18px; flex-shrink: 0; }
        .icon-btn { background: transparent; border: 1px solid var(--border); color: var(--text-main); width: 38px; height: 38px; border-radius: 50%; display: flex; justify-content: center; align-items: center; cursor: pointer; transition: border-color 0.2s, background 0.2s; }
        .icon-btn:hover { background: var(--surface); border-color: var(--text-muted); }
        .icon-btn svg { width: 17px; height: 17px; }

        .btn-primary { background: var(--text-main); color: var(--bg); border: none; padding: 14px 26px; border-radius: var(--radius-sm); font-weight: 600; font-size: 15px; cursor: pointer; transition: opacity 0.15s; font-family: inherit; }
        .btn-primary:hover { opacity: 0.85; }
        .btn-secondary { background: transparent; color: var(--text-main); border: 1px solid var(--border); padding: 14px 26px; border-radius: var(--radius-sm); font-weight: 600; font-size: 15px; cursor: pointer; transition: border-color 0.15s, background 0.15s; font-family: inherit; }
        .btn-secondary:hover { background: var(--surface); border-color: var(--text-muted); }
        .btn-row { display: flex; gap: 12px; flex-wrap: wrap; }

        /* ---------- Hero (intro) ---------- */
        .hero { max-width: 700px; margin: 0 auto; padding: 9vh 24px 7vh; text-align: center; }
        .hero-eyebrow { font-size: 14px; color: var(--accent); font-weight: 600; margin-bottom: 18px; }
        .hero h1 { font-size: clamp(32px, 5vw, 50px); line-height: 1.12; margin-bottom: 20px; }
        .hero p.lede { font-size: 18px; color: var(--text-muted); max-width: 520px; margin: 0 auto 34px; }
        .hero-meta { display: flex; gap: 22px; justify-content: center; margin-top: 30px; font-size: 13.5px; color: var(--text-muted); flex-wrap: wrap; }
        .hero-meta span { display: flex; align-items: center; gap: 6px; }
        .hero-meta svg { width: 15px; height: 15px; opacity: 0.75; }

        /* ---------- Game viewport ----------
           Fixed to exactly fill the space below the header so play never
           needs page scroll. Board size is derived with calc()/min() from
           the header height, container padding and sidebar reserve below,
           so it always leaves room for everything else in the column. */
        .game-shell { height: calc(100dvh - var(--header-h)); display: flex; flex-direction: column; overflow: hidden; }
        .app-container { display: flex; flex: 1; min-height: 0; padding: calc(var(--container-pad) / 2) 20px; gap: 24px; justify-content: center; align-items: stretch; max-width: 1300px; margin: 0 auto; width: 100%; overflow: hidden; }

        .board-section { display: flex; flex-direction: column; justify-content: center; width: 100%; max-width: 620px; min-height: 0; flex-shrink: 1; }
        .sidebar { display: flex; flex-direction: column; width: 320px; height: 100%; min-height: 0; flex-shrink: 0; }

        .results-section { width: 100%; max-width: 640px; padding: 6vh 20px 4vh; margin: 0 auto; animation: fadeUp 0.5s cubic-bezier(0.16, 1, 0.3, 1); }

        .avatar-row { display: flex; justify-content: space-between; align-items: center; padding: 10px 0; height: 56px; }
        .avatar { display: flex; align-items: center; gap: 12px; font-weight: 600; font-size: 15px; }
        .avatar-icon { width: 38px; height: 38px; border-radius: var(--radius-sm); background: var(--surface); border: 1px solid var(--border); display: flex; justify-content: center; align-items: center; }
        .avatar-icon svg { width: 19px; height: 19px; color: var(--text-muted); }
        .captures { font-size: 15px; opacity: 0.75; display: flex; align-items: center; height: 20px; margin-top: 2px; letter-spacing: 1px; }
        .adv { font-size: 11.5px; font-weight: 700; color: var(--accent); margin-left: 6px; letter-spacing: 0; }

        .board-wrapper {
            position: relative;
            width: min(100%, calc(100dvh - var(--header-h) - var(--container-pad) - 112px - var(--side-reserve)));
            aspect-ratio: 1;
            margin: 0 auto;
            border-radius: var(--radius-md); box-shadow: var(--shadow-raised); border: 1px solid var(--border); overflow: hidden;
        }
        .board { position: absolute; inset: 0; display: grid; grid-template-columns: repeat(8, 1fr); grid-template-rows: repeat(8, 1fr); }
        .sq { display: flex; justify-content: center; align-items: center; position: relative; }
        .piece { width: 88%; height: 88%; cursor: grab; filter: drop-shadow(0 3px 3px rgba(0,0,0,0.22)); z-index: 10; user-select: none; }
        .piece:active { cursor: grabbing; }

        .dot { position: absolute; width: 24%; height: 24%; border-radius: 50%; background: rgba(0,0,0,0.18); pointer-events: none; }
        [data-theme="dark"] .dot { background: rgba(255,255,255,0.2); }
        .capture-ring { position: absolute; width: 88%; height: 88%; border-radius: 50%; border: 3px solid rgba(0,0,0,0.18); pointer-events: none; }
        [data-theme="dark"] .capture-ring { border-color: rgba(255,255,255,0.2); }

        .history-panel { background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-md); flex: 1; display: flex; flex-direction: column; overflow: hidden; box-shadow: var(--shadow-card); }
        .history-header { padding: 14px 16px; border-bottom: 1px solid var(--border); display: flex; justify-content: space-between; align-items: center; font-size: 13.5px; }
        .history-header .count { color: var(--text-muted); }
        .history-list { flex: 1; overflow-y: auto; padding: 8px 16px; font-family: 'Inter', sans-serif; font-size: 14px; }
        .history-list::-webkit-scrollbar { width: 4px; }
        .history-list::-webkit-scrollbar-thumb { background: var(--border); border-radius: 4px; }
        .move-row { display: flex; padding: 7px 0; border-bottom: 1px solid var(--border); }
        .move-row:last-child { border-bottom: none; }
        .move-num { width: 28px; color: var(--text-muted); }
        .move-w, .move-b { flex: 1; font-weight: 500; font-variant-numeric: tabular-nums; }

        .control-row { display: flex; gap: 10px; margin-bottom: 14px; }
        .theme-select { flex: 1; padding: 9px 12px; border-radius: var(--radius-sm); border: 1px solid var(--border); background: var(--surface); color: var(--text-main); font-family: inherit; font-size: 14px; }

        .promo-modal { position: absolute; inset: 0; background: rgba(20, 16, 10, 0.55); z-index: 100; display: flex; justify-content: center; align-items: center; }
        .promo-box { background: var(--surface); padding: 14px; border-radius: var(--radius-md); display: flex; gap: 10px; box-shadow: var(--shadow-raised); border: 1px solid var(--border); }
        .promo-piece { width: 56px; height: 56px; cursor: pointer; transition: transform 0.15s, border-color 0.15s; background: var(--bg); border-radius: 7px; border: 1px solid var(--border); display: flex; justify-content: center; align-items: center; }
        .promo-piece:hover { transform: translateY(-2px); border-color: var(--accent); }
        .promo-piece img { width: 78%; height: 78%; }

        .live-stat { display: flex; align-items: center; gap: 7px; font-size: 13px; font-weight: 500; color: var(--text-muted); }
        .live-stat svg { width: 15px; height: 15px; }
        .live-stat b { color: var(--text-main); font-weight: 700; }

        /* ---------- Results ---------- */
        .result-kicker { font-size: 14px; color: var(--accent); font-weight: 600; margin-bottom: 14px; }
        .result-archetype { font-size: clamp(30px, 5vw, 44px); margin-bottom: 14px; }
        .result-lede { font-size: 16.5px; color: var(--text-muted); max-width: 480px; margin: 0 0 40px; line-height: 1.65; }

        .trait-card { margin-bottom: 26px; text-align: left; padding: 20px; background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-md); box-shadow: var(--shadow-card); }
        .trait-head { display: flex; justify-content: space-between; font-size: 13.5px; font-weight: 600; color: var(--text-main); margin-bottom: 12px; }
        .trait-head .muted { color: var(--text-muted); font-weight: 500; }
        .trait-track { height: 6px; background: var(--border); border-radius: 4px; overflow: hidden; }
        .trait-fill { height: 100%; background: var(--accent); border-radius: 4px; transition: width 1s cubic-bezier(0.16, 1, 0.3, 1); }
        .trait-blurb { font-size: 14.5px; line-height: 1.65; margin: 12px 0 0; color: var(--text-muted); }

        .results-actions { display: flex; justify-content: center; gap: 12px; margin: 8px 0 10px; flex-wrap: wrap; }

        /* ---------- SEO / editorial sections ---------- */
        .site-section { max-width: 760px; margin: 0 auto; padding: 8vh 24px; border-top: 1px solid var(--border); }
        .site-section h2 { font-size: clamp(24px, 3.4vw, 32px); margin-bottom: 16px; }
        .site-section > p.section-lede { color: var(--text-muted); font-size: 16px; max-width: 560px; margin-bottom: 44px; }

        .steps-list { display: flex; flex-direction: column; gap: 28px; }
        .step-item { display: flex; gap: 18px; }
        .step-num { font-family: 'Fraunces', serif; font-size: 22px; color: var(--accent); width: 34px; flex-shrink: 0; }
        .step-item h3 { font-size: 17px; margin-bottom: 6px; }
        .step-item p { color: var(--text-muted); font-size: 15px; margin: 0; max-width: 480px; }

        .measure-grid { display: grid; grid-template-columns: repeat(2, 1fr); gap: 18px; }
        .measure-card { padding: 18px; border: 1px solid var(--border); border-radius: var(--radius-md); background: var(--surface); }
        .measure-card h3 { font-size: 15.5px; margin-bottom: 8px; }
        .measure-card p { font-size: 14px; color: var(--text-muted); margin: 0; }

        .faq-item { border-bottom: 1px solid var(--border); padding: 20px 0; }
        .faq-item:first-child { padding-top: 0; }
        .faq-q { display: flex; justify-content: space-between; align-items: center; gap: 16px; cursor: pointer; font-weight: 600; font-size: 15.5px; }
        .faq-q svg { width: 16px; height: 16px; flex-shrink: 0; transition: transform 0.2s; color: var(--text-muted); }
        .faq-item[open] .faq-q svg { transform: rotate(45deg); }
        .faq-a { font-size: 15px; color: var(--text-muted); margin: 12px 0 0; max-width: 560px; }

        .site-footer { display: flex; justify-content: space-between; align-items: center; padding: 26px 5vw; border-top: 1px solid var(--border); font-size: 13px; color: var(--text-muted); flex-wrap: wrap; gap: 12px; }
        .site-footer a { font-weight: 600; text-decoration: none; }
        .site-footer a:hover { text-decoration: underline; }

        .like-btn { width: auto; padding: 0 16px; border-radius: 20px; gap: 8px; }
        .like-btn.liked { background: var(--accent-soft); border-color: var(--accent); }

        /* ---------- Home / reset confirmation ---------- */
        .page-modal { position: fixed; inset: 0; background: rgba(20, 16, 10, 0.55); z-index: 200; display: flex; align-items: center; justify-content: center; padding: 20px; }
        .page-modal-box { background: var(--surface); border: 1px solid var(--border); border-radius: var(--radius-md); padding: 28px; max-width: 340px; width: 100%; box-shadow: var(--shadow-raised); text-align: center; }
        .page-modal-box h3 { font-size: 19px; margin-bottom: 10px; }
        .page-modal-box p { font-size: 14.5px; color: var(--text-muted); margin: 0 0 22px; }
        .page-modal-actions { display: flex; gap: 10px; justify-content: center; }
        .page-modal-actions button { flex: 1; }
        .share-modal-box { max-width: 380px; max-height: 88vh; overflow-y: auto; }
        .share-preview-img { width: 100%; border-radius: var(--radius-sm); border: 1px solid var(--border); display: block; }
        .close-text-btn { background: none; border: none; color: var(--text-muted); font-size: 13.5px; font-family: inherit; cursor: pointer; margin-top: 14px; text-decoration: underline; padding: 0; }

        @keyframes fadeUp { from { opacity: 0; transform: translateY(16px); } to { opacity: 1; transform: translateY(0); } }

        @media (max-width: 900px) {
            :root { --container-pad: 20px; --side-reserve: 178px; }
            .app-container { flex-direction: column; gap: 12px; padding: 10px 14px; }
            .board-section { max-width: 100%; }
            .sidebar { width: 100%; height: 150px; }
            .control-row { display: none; }
            .hide-on-mobile { display: none; }
            .measure-grid { grid-template-columns: 1fr; }
            .site-footer { flex-direction: column; text-align: center; }
        }
    </style>
</head>
<body>
    <div id="root"></div>

    <noscript>
        <div style="max-width:640px;margin:60px auto;padding:0 24px;font-family:sans-serif;">
            <h1>Chess Personality Test</h1>
            <p>Play a quick game of chess and get a read on your personality — how patient you are, how you handle risk, and how you make decisions under pressure. This test needs JavaScript enabled to run.</p>
        </div>
    </noscript>

    <script type="text/babel">
        const { useState, useRef, useEffect, useCallback, useMemo } = React;

        const FILES = ["a", "b", "c", "d", "e", "f", "g", "h"];
        const VALUES = { P: 1, N: 3, B: 3, R: 5, Q: 9, K: 0 };
        const THEMES = {
            grayscale: { light: 'var(--board-light)', dark: 'var(--board-dark)', highlight: 'rgba(169, 121, 60, 0.35)' },
            wood: { light: '#E8D5B7', dark: '#9B6C47', highlight: 'rgba(255, 255, 255, 0.35)' },
            classic: { light: '#F0D9B5', dark: '#B58863', highlight: 'rgba(20, 85, 30, 0.3)' }
        };

        function initialBoard() {
            const b = Array(8).fill(null).map(() => Array(8).fill(null));
            const back = ["R", "N", "B", "Q", "K", "B", "N", "R"];
            for (let c = 0; c < 8; c++) {
                b[0][c] = { type: back[c], color: "b" }; b[1][c] = { type: "P", color: "b" };
                b[6][c] = { type: "P", color: "w" }; b[7][c] = { type: back[c], color: "w" };
            }
            return b;
        }

        function cloneBoard(b) { return b.map((row) => row.map((p) => (p ? { ...p } : null))); }
        const inB = (r, c) => r >= 0 && r < 8 && c >= 0 && c < 8;
        const sq = (r, c) => FILES[c] + (8 - r);
        const opp = (color) => (color === "w" ? "b" : "w");

        const KNIGHT_D = [[-2, -1], [-2, 1], [-1, -2], [-1, 2], [1, -2], [1, 2], [2, -1], [2, 1]];
        const KING_D = [[-1, -1], [-1, 0], [-1, 1], [0, -1], [0, 1], [1, -1], [1, 0], [1, 1]];
        const BISHOP_D = [[-1, -1], [-1, 1], [1, -1], [1, 1]];
        const ROOK_D = [[-1, 0], [1, 0], [0, -1], [0, 1]];

        function isAttacked(board, r, c, byColor) {
            const dir = byColor === "w" ? 1 : -1;
            for (const dc of [-1, 1]) {
                const pr = r + dir, pc = c + dc;
                if (inB(pr, pc)) { const p = board[pr][pc]; if (p && p.color === byColor && p.type === "P") return true; }
            }
            for (const [dr, dc] of KNIGHT_D) {
                const pr = r + dr, pc = c + dc;
                if (inB(pr, pc)) { const p = board[pr][pc]; if (p && p.color === byColor && p.type === "N") return true; }
            }
            for (const [dr, dc] of KING_D) {
                const pr = r + dr, pc = c + dc;
                if (inB(pr, pc)) { const p = board[pr][pc]; if (p && p.color === byColor && p.type === "K") return true; }
            }
            for (const [dr, dc] of BISHOP_D) {
                let pr = r + dr, pc = c + dc;
                while (inB(pr, pc)) {
                    const p = board[pr][pc];
                    if (p) { if (p.color === byColor && (p.type === "B" || p.type === "Q")) return true; break; }
                    pr += dr; pc += dc;
                }
            }
            for (const [dr, dc] of ROOK_D) {
                let pr = r + dr, pc = c + dc;
                while (inB(pr, pc)) {
                    const p = board[pr][pc];
                    if (p) { if (p.color === byColor && (p.type === "R" || p.type === "Q")) return true; break; }
                    pr += dr; pc += dc;
                }
            }
            return false;
        }

        function findKing(board, color) {
            for (let r = 0; r < 8; r++) for (let c = 0; c < 8; c++) {
                const p = board[r][c]; if (p && p.color === color && p.type === "K") return [r, c];
            }
            return null;
        }

        function genPseudoMoves(board, state, color) {
            const moves = [];
            for (let r = 0; r < 8; r++) for (let c = 0; c < 8; c++) {
                const p = board[r][c];
                if (!p || p.color !== color) continue;
                const add = (tr, tc, extra = {}) => moves.push({ from: [r, c], to: [tr, tc], piece: p, captured: board[tr][tc], ...extra });

                if (p.type === "P") {
                    const dir = color === "w" ? -1 : 1;
                    const startRow = color === "w" ? 6 : 1;
                    const promoRow = color === "w" ? 0 : 7;
                    if (inB(r + dir, c) && !board[r + dir][c]) {
                        add(r + dir, c, { promotion: r + dir === promoRow });
                        if (r === startRow && !board[r + 2 * dir][c]) add(r + 2 * dir, c, { doubleStep: true });
                    }
                    for (const dc of [-1, 1]) {
                        const tr = r + dir, tc = c + dc;
                        if (!inB(tr, tc)) continue;
                        if (board[tr][tc] && board[tr][tc].color !== color) add(tr, tc, { promotion: tr === promoRow });
                        else if (state.enPassant && state.enPassant[0] === tr && state.enPassant[1] === tc) add(tr, tc, { enPassant: true });
                    }
                } else if (p.type === "N") {
                    for (const [dr, dc] of KNIGHT_D) { const tr = r + dr, tc = c + dc; if (inB(tr, tc) && (!board[tr][tc] || board[tr][tc].color !== color)) add(tr, tc); }
                } else if (p.type === "K") {
                    for (const [dr, dc] of KING_D) { const tr = r + dr, tc = c + dc; if (inB(tr, tc) && (!board[tr][tc] || board[tr][tc].color !== color)) add(tr, tc); }
                    const rights = state.castling[color];
                    const row = color === "w" ? 7 : 0;
                    if (r === row && c === 4 && !isAttacked(board, r, c, opp(color))) {
                        if (rights.k && !board[row][5] && !board[row][6] && board[row][7]?.type === "R" && !isAttacked(board, row, 5, opp(color)) && !isAttacked(board, row, 6, opp(color))) add(row, 6, { castle: "k" });
                        if (rights.q && !board[row][1] && !board[row][2] && !board[row][3] && board[row][0]?.type === "R" && !isAttacked(board, row, 3, opp(color)) && !isAttacked(board, row, 2, opp(color))) add(row, 2, { castle: "q" });
                    }
                } else {
                    const dirs = p.type === "B" ? BISHOP_D : p.type === "R" ? ROOK_D : [...BISHOP_D, ...ROOK_D];
                    for (const [dr, dc] of dirs) {
                        let tr = r + dr, tc = c + dc;
                        while (inB(tr, tc)) {
                            if (!board[tr][tc]) add(tr, tc);
                            else { if (board[tr][tc].color !== color) add(tr, tc); break; }
                            tr += dr; tc += dc;
                        }
                    }
                }
            }
            return moves;
        }

        function applyMove(board, state, move) {
            const nb = cloneBoard(board);
            const [fr, fc] = move.from, [tr, tc] = move.to;
            const piece = { ...nb[fr][fc] };
            nb[fr][fc] = null;
            if (move.enPassant) nb[fr][tc] = null;
            if (move.promotion) piece.type = move.promoteTo || "Q";
            nb[tr][tc] = piece;
            if (move.castle === "k") { const row = fr; nb[row][5] = nb[row][7]; nb[row][7] = null; }
            if (move.castle === "q") { const row = fr; nb[row][3] = nb[row][0]; nb[row][0] = null; }
            const ns = { castling: { w: { ...state.castling.w }, b: { ...state.castling.b } }, enPassant: null };
            if (piece.type === "K") { ns.castling[piece.color].k = false; ns.castling[piece.color].q = false; }
            if (piece.type === "R") { if (fc === 0) ns.castling[piece.color].q = false; if (fc === 7) ns.castling[piece.color].k = false; }
            if (move.doubleStep) ns.enPassant = [(fr + tr) / 2, fc];
            return { board: nb, state: ns };
        }

        function legalMoves(board, state, color) {
            const pseudo = genPseudoMoves(board, state, color);
            const legal = [];
            for (const m of pseudo) {
                const { board: nb } = applyMove(board, state, m);
                const kingPos = findKing(nb, color);
                if (kingPos && !isAttacked(nb, kingPos[0], kingPos[1], opp(color))) legal.push(m);
            }
            return legal;
        }

        function isInCheck(board, color) { const k = findKing(board, color); return k ? isAttacked(board, k[0], k[1], opp(color)) : false; }

        function moveNotation(m, isMate, gaveCheck) {
            const p = m.piece.type === "P" ? "" : m.piece.type;
            const cap = m.captured || m.enPassant ? "x" : "";
            const promo = m.promotion ? "=" + (m.promoteTo || "Q") : "";
            const castle = m.castle === "k" ? "O-O" : m.castle === "q" ? "O-O-O" : null;
            if (castle) return castle;
            const fromFile = m.piece.type === "P" && cap ? FILES[m.from[1]] : "";
            const checkMark = isMate ? "#" : (gaveCheck ? "+" : "");
            return `${p}${fromFile}${cap}${sq(m.to[0], m.to[1])}${promo}${checkMark}`;
        }

        const PST = [[0,0,0,0,0,0,0,0],[0,1,1,1,1,1,1,0],[0,1,2,2,2,2,1,0],[0,1,2,3,3,2,1,0],[0,1,2,3,3,2,1,0],[0,1,2,2,2,2,1,0],[0,1,1,1,1,1,1,0],[0,0,0,0,0,0,0,0]];
        function evaluate(board) {
            let score = 0;
            for (let r = 0; r < 8; r++) for (let c = 0; c < 8; c++) {
                const p = board[r][c]; if (!p) continue;
                let v = VALUES[p.type] * 100 + PST[r][c] * 2;
                score += p.color === "w" ? v : -v;
            }
            return score;
        }

        function minimax(board, state, depth, alpha, beta, color, maximizing) {
            const moves = legalMoves(board, state, color);
            if (depth === 0 || moves.length === 0) {
                if (moves.length === 0) return { score: isInCheck(board, color) ? (maximizing ? -10000 : 10000) : 0 };
                return { score: evaluate(board) };
            }
            moves.sort((a, b) => (b.captured ? 1 : 0) - (a.captured ? 1 : 0));
            let best = null;
            let bestScore = maximizing ? -Infinity : Infinity;
            for (const m of moves) {
                const { board: nb, state: ds } = applyMove(board, state, m);
                const res = minimax(nb, ds, depth - 1, alpha, beta, opp(color), !maximizing);
                if (maximizing) { if (res.score > bestScore) { bestScore = res.score; best = m; } alpha = Math.max(alpha, res.score); }
                else { if (res.score < bestScore) { bestScore = res.score; best = m; } beta = Math.min(beta, res.score); }
                if (beta <= alpha) break;
            }
            return { score: bestScore, move: best };
        }

        /* ===========================================================
           ICONS — single line-weight set, no emoji
        =========================================================== */
        const iconProps = { viewBox: "0 0 24 24", fill: "none", stroke: "currentColor", strokeWidth: "1.7", strokeLinecap: "round", strokeLinejoin: "round" };
        const IconEye = (p) => <svg {...iconProps} {...p}><path d="M1 12s4-7 11-7 11 7 11 7-4 7-11 7-11-7-11-7Z"/><circle cx="12" cy="12" r="3"/></svg>;
        const IconFlag = (p) => <svg {...iconProps} {...p}><path d="M5 21V4"/><path d="M5 4h13l-3 4 3 4H5"/></svg>;
        const IconHeart = (p) => <svg {...iconProps} {...p}><path d="M20.84 4.61a5.5 5.5 0 0 0-7.78 0L12 5.67l-1.06-1.06a5.5 5.5 0 0 0-7.78 7.78l1.06 1.06L12 21.23l7.78-7.78 1.06-1.06a5.5 5.5 0 0 0 0-7.78z"/></svg>;
        const IconMoon = (p) => <svg {...iconProps} {...p}><path d="M20 14.5A8.5 8.5 0 1 1 9.5 4a7 7 0 0 0 10.5 10.5Z"/></svg>;
        const IconSun = (p) => <svg {...iconProps} {...p}><circle cx="12" cy="12" r="4.2"/><path d="M12 2v2.4M12 19.6V22M4.9 4.9l1.7 1.7M17.4 17.4l1.7 1.7M2 12h2.4M19.6 12H22M4.9 19.1l1.7-1.7M17.4 6.6l1.7-1.7"/></svg>;
        const IconCpu = (p) => <svg {...iconProps} {...p}><rect x="6" y="6" width="12" height="12" rx="2"/><path d="M9 2v3M15 2v3M9 19v3M15 19v3M2 9h3M2 15h3M19 9h3M19 15h3"/></svg>;
        const IconUser = (p) => <svg {...iconProps} {...p}><circle cx="12" cy="8" r="3.6"/><path d="M4.5 20c1.3-3.7 4-5.6 7.5-5.6s6.2 1.9 7.5 5.6"/></svg>;
        const IconShare = (p) => <svg {...iconProps} {...p}><circle cx="18" cy="5" r="2.6"/><circle cx="6" cy="12" r="2.6"/><circle cx="18" cy="19" r="2.6"/><path d="M8.3 10.7l7.4-4.2M8.3 13.3l7.4 4.2"/></svg>;
        const IconReplay = (p) => <svg {...iconProps} {...p}><path d="M3 12a9 9 0 1 0 3-6.7"/><path d="M3 4v5h5"/></svg>;
        const IconPlus = (p) => <svg {...iconProps} {...p}><path d="M12 5v14M5 12h14"/></svg>;
        const IconTime = (p) => <svg {...iconProps} {...p}><circle cx="12" cy="12" r="9"/><path d="M12 7v5l3.5 2"/></svg>;

        /* ===========================================================
           PIECE ART
        =========================================================== */
        function PieceIcon({ type, color, ...props }) {
            const code = color + type;
            const urls = {
                wK: 'https://upload.wikimedia.org/wikipedia/commons/4/42/Chess_klt45.svg', wQ: 'https://upload.wikimedia.org/wikipedia/commons/1/15/Chess_qlt45.svg', wR: 'https://upload.wikimedia.org/wikipedia/commons/7/72/Chess_rlt45.svg', wB: 'https://upload.wikimedia.org/wikipedia/commons/b/b1/Chess_blt45.svg', wN: 'https://upload.wikimedia.org/wikipedia/commons/7/70/Chess_nlt45.svg', wP: 'https://upload.wikimedia.org/wikipedia/commons/4/45/Chess_plt45.svg',
                bK: 'https://upload.wikimedia.org/wikipedia/commons/f/f0/Chess_kdt45.svg', bQ: 'https://upload.wikimedia.org/wikipedia/commons/4/47/Chess_qdt45.svg', bR: 'https://upload.wikimedia.org/wikipedia/commons/f/ff/Chess_rdt45.svg', bB: 'https://upload.wikimedia.org/wikipedia/commons/9/98/Chess_bdt45.svg', bN: 'https://upload.wikimedia.org/wikipedia/commons/e/ef/Chess_ndt45.svg', bP: 'https://upload.wikimedia.org/wikipedia/commons/c/c7/Chess_pdt45.svg',
            };
            return <img src={urls[code]} className="piece" alt={code} draggable="true" {...props} />;
        }

        function getMaterialAdvantage(board) {
            let w = 0, b = 0;
            board.forEach(row => row.forEach(p => {
                if (p) { if (p.color === 'w') w += VALUES[p.type]; else b += VALUES[p.type]; }
            }));
            return { w: Math.max(0, w - b), b: Math.max(0, b - w) };
        }
        const pieceGlyphs = { P: '♙', N: '♘', B: '♗', R: '♖', Q: '♕' };

        /* ===========================================================
           TRAIT RADAR
        =========================================================== */
        function RadarChart({ traits }) {
            const order = ["confrontation", "risk", "patience", "planning", "resilience"];
            const labels = { confrontation: "Confrontation", risk: "Risk appetite", patience: "Patience", planning: "Planning", resilience: "Recovery" };
            const cx = 150, cy = 138, maxR = 92;
            const pt = (i, val) => {
                const angle = -Math.PI / 2 + (i * 2 * Math.PI) / 5;
                const r = (val / 100) * maxR;
                return [cx + r * Math.cos(angle), cy + r * Math.sin(angle)];
            };
            const dataPts = order.map((k, i) => pt(i, traits[k]));
            const poly = dataPts.map(p => p.join(",")).join(" ");
            const rings = [25, 50, 75, 100];
            return (
                <svg viewBox="0 0 300 275" width="100%" style={{ maxWidth: 320, display: "block", margin: "8px auto 24px" }}>
                    {rings.map(r => ( <polygon key={r} points={order.map((_, i) => pt(i, r).join(",")).join(" ")} fill="none" stroke="var(--border)" strokeWidth="1" /> ))}
                    {order.map((_, i) => <line key={i} x1={cx} y1={cy} x2={pt(i,100)[0]} y2={pt(i,100)[1]} stroke="var(--border)" strokeWidth="1" />)}
                    <polygon points={poly} fill="var(--accent)" fillOpacity="0.16" stroke="var(--accent)" strokeWidth="2" />
                    {dataPts.map((p, i) => <circle key={i} cx={p[0]} cy={p[1]} r="4.5" fill="var(--accent)" />)}
                    {order.map((k, i) => <text key={k} x={pt(i,124)[0]} y={pt(i,124)[1]} textAnchor="middle" dominantBaseline="middle" style={{ fontSize: 11, fill: "var(--text-muted)", fontFamily: "Inter, sans-serif", fontWeight: 600 }}>{labels[k]}</text>)}
                </svg>
            );
        }

        /* Personality-first trait copy  describes real-world tendencies, not chess technique */
        const TRAIT_DEFS = [
            { key: "confrontation", left: "Avoids conflict", right: "Meets it head-on", blurb: (v) => v > 60 ? "You move toward friction instead of away from it. When something needs resolving, you'd rather deal with it now than let it sit in a game or in a conversation." : v < 40 ? "You hold back from forcing a confrontation until you have to. That usually reads as composure, though it can tip into avoidance when a decision is overdue." : "You'll engage with tension when it's worth it, but you don't go looking for it. A measured approach to conflict." },
            { key: "risk", left: "Plays it safe", right: "Takes the leap", blurb: (v) => v > 60 ? "You're comfortable giving something up now for a better position later. That tolerance for short-term loss is a real asset when a decision needs conviction." : v < 40 ? "You protect what you already have before chasing more. Security tends to matter to you more than upside." : "You take risks selectively  calculated rather than reckless, and rarely all-in." },
            { key: "patience", left: "Moves fast", right: "Takes its time", blurb: (v) => v > 60 ? "You slow down before committing, even under time pressure. That deliberateness reduces mistakes, at some cost to speed." : v < 40 ? "You trust your first read and act on it. That instinct serves you well under pressure, though it can mean skipping a second look." : "You balance quick calls with the occasional long think when the stakes are higher." },
            { key: "planning", left: "Improvises", right: "Plans ahead", blurb: (v) => v > 60 ? "You're building toward something rather than reacting move to move. Long-range thinking is where you're most comfortable." : v < 40 ? "You adapt in the moment more than you script ahead. Nimble and responsive, sometimes at the expense of a longer view." : "You sketch a rough plan, then stay flexible about how you get there." },
            { key: "resilience", left: "Rattled by setbacks", right: "Recovers quickly", blurb: (v) => v > 60 ? "A bad turn doesn't derail you for long. You reset and keep making sound decisions, which matters more than avoiding mistakes in the first place." : v < 40 ? "Setbacks tend to stick with you for a few moves after they happen. Worth noticing if it's costing you afterward, not in the moment itself." : "You take a beat after a setback, then get back to a normal decision-making rhythm." },
        ];

        const ARCHETYPES = [
            { test: (t) => t.confrontation > 66 && t.risk > 58, name: "The Bold Initiator", line: "You'd rather create a problem for someone else than wait for one to arrive. Decisive, a little relentless, and comfortable being the one who moves first." },
            { test: (t) => t.patience > 66 && t.resilience > 58, name: "The Steady Hand", line: "Pressure doesn't speed you up. You take the extra beat, absorb setbacks without spiraling, and let other people rush into mistakes." },
            { test: (t) => t.risk > 62 && t.planning < 45, name: "The Fearless Improviser", line: "You'll commit before the picture is fully clear, trusting you can work it out as you go. Exciting to watch, occasionally a little chaotic." },
            { test: (t) => t.planning > 62 && t.confrontation < 45, name: "The Quiet Strategist", line: "You'd rather out-think a situation than out-fight it. Confrontation isn't your instinct a well-set-up position is." },
            { test: () => true, name: "The Balanced Analyst", line: "No single instinct dominates. You read each situation on its own terms and adjust rather than defaulting to one mode." },
        ];

        /* ===========================================================
           SHAREABLE RESULT CARD — renders the full profile (archetype,
           blurb, and all five trait bars) to a canvas so what gets
           shared is something people can actually read, not just a title.
        =========================================================== */
        function wrapCanvasText(ctx, text, x, y, maxWidth, lineHeight) {
            const words = text.split(" ");
            let line = "";
            for (let i = 0; i < words.length; i++) {
                const test = line + words[i] + " ";
                if (ctx.measureText(test).width > maxWidth && line) {
                    ctx.fillText(line.trim(), x, y);
                    line = words[i] + " ";
                    y += lineHeight;
                } else {
                    line = test;
                }
            }
            ctx.fillText(line.trim(), x, y);
            return y + lineHeight;
        }

        async function buildShareCard(archetype, traits, host) {
            if (document.fonts && document.fonts.ready) { try { await document.fonts.ready; } catch (e) {} }
            const W = 1080, H = 1500;
            const canvas = document.createElement("canvas");
            canvas.width = W; canvas.height = H;
            const ctx = canvas.getContext("2d");

            const ink = "#1B1712", muted = "#8A7C6A", border = "#E7E1D8", accent = "#A9793C";

            ctx.fillStyle = "#FBF8F3";
            ctx.fillRect(0, 0, W, H);
            ctx.strokeStyle = border; ctx.lineWidth = 3;
            ctx.strokeRect(28, 28, W - 56, H - 56);

            ctx.fillStyle = accent;
            ctx.font = "600 30px Inter, sans-serif";
            ctx.fillText("♘  CHESS PERSONALITY TEST", 72, 128);

            ctx.fillStyle = muted;
            ctx.font = "600 26px Inter, sans-serif";
            ctx.fillText("MY RESULT", 72, 172);

            ctx.fillStyle = ink;
            ctx.font = "600 68px Fraunces, serif";
            let y = wrapCanvasText(ctx, archetype.name, 72, 268, W - 144, 78);

            y += 14;
            ctx.fillStyle = muted;
            ctx.font = "400 30px Inter, sans-serif";
            y = wrapCanvasText(ctx, archetype.line, 72, y, W - 144, 42);

            y += 44;
            ctx.strokeStyle = border; ctx.lineWidth = 2;
            ctx.beginPath(); ctx.moveTo(72, y); ctx.lineTo(W - 72, y); ctx.stroke();
            y += 56;

            const barW = W - 144;
            for (const td of TRAIT_DEFS) {
                const val = traits[td.key];
                ctx.fillStyle = ink;
                ctx.font = "600 26px Inter, sans-serif";
                ctx.fillText(td.left, 72, y);
                const rightWidth = ctx.measureText(td.right).width;
                ctx.fillText(td.right, W - 72 - rightWidth, y);
                y += 22;

                ctx.fillStyle = border;
                roundRect(ctx, 72, y, barW, 16, 8); ctx.fill();
                ctx.fillStyle = accent;
                roundRect(ctx, 72, y, Math.max(16, barW * (val / 100)), 16, 8); ctx.fill();
                y += 52;
            }

            ctx.strokeStyle = border; ctx.lineWidth = 2;
            ctx.beginPath(); ctx.moveTo(72, H - 110); ctx.lineTo(W - 72, H - 110); ctx.stroke();
            ctx.fillStyle = muted;
            ctx.font = "500 26px Inter, sans-serif";
            ctx.fillText(`Take the test yourself → ${host}`, 72, H - 62);

            return canvas;
        }

        function roundRect(ctx, x, y, w, h, r) {
            ctx.beginPath();
            ctx.moveTo(x + r, y);
            ctx.arcTo(x + w, y, x + w, y + h, r);
            ctx.arcTo(x + w, y + h, x, y + h, r);
            ctx.arcTo(x, y + h, x, y, r);
            ctx.arcTo(x, y, x + w, y, r);
            ctx.closePath();
        }

        /* ===========================================================
           MAIN APP
        =========================================================== */
        function App() {
            const [theme, setTheme] = useState("light");
            const [view, setView] = useState("intro"); // 'intro', 'playing', 'results', 'review'
            const [board, setBoard] = useState(initialBoard);
            const [state, setState] = useState({ castling: { w: { k: true, q: true }, b: { k: true, q: true } }, enPassant: null });
            const [status, setStatus] = useState("playing");
            const [turn, setTurn] = useState("w");
            const [selected, setSelected] = useState(null);
            const [selMoves, setSelMoves] = useState([]);
            const [history, setHistory] = useState([]);
            const historyEndRef = useRef(null);

            const [pendingPromotion, setPendingPromotion] = useState(null);
            const [boardTheme, setBoardTheme] = useState("grayscale");
            const [engineDepth] = useState(2);

            const [dbStats, setDbStats] = useState({ views: 0, likes: 0, completions: 0 });
            const [liked, setLiked] = useState(false);
            const [captured, setCaptured] = useState({ w: [], b: [] });
            const [sharing, setSharing] = useState(false);
            const [shareCard, setShareCard] = useState(null); // { url, blob }
            const [shareStatus, setShareStatus] = useState(null); // 'shared' | 'downloaded'

            const [stats, setStats] = useState({ captures: 0, checks: 0, retreats: 0, earlyQueen: false, quickMoves: 0, totalMoves: 0 });
            const lastMoveTime = useRef(Date.now());
            const [showHomeConfirm, setShowHomeConfirm] = useState(false);

            useEffect(() => { document.documentElement.setAttribute('data-theme', theme); }, [theme]);
            useEffect(() => { if (historyEndRef.current) historyEndRef.current.scrollIntoView({ behavior: 'smooth', block: 'nearest' }); }, [history]);
            // Lock page scroll only while actively at the board — intro/results stay normal pages.
            useEffect(() => {
                const playing = view === 'playing' || view === 'review';
                document.body.classList.toggle('lock-scroll', playing);
                document.documentElement.classList.toggle('lock-scroll', playing);
                if (playing) window.scrollTo(0, 0);
            }, [view]);

            const safeFetch = (action) => fetch(`api.php?action=${action}`).then(res => res.json()).catch(() => ({}));

            useEffect(() => {
                const fetchStats = () => safeFetch('get').then(data => {
                    if (data.page_views) setDbStats({ views: data.page_views, likes: data.total_likes, completions: data.tests_completed });
                });
                safeFetch('view').then(fetchStats);
                const interval = setInterval(fetchStats, 5000);
                return () => clearInterval(interval);
            }, []);

            const handleLike = () => {
                if (liked) return;
                safeFetch('like').then(data => {
                    if (data.total_likes) setDbStats(s => ({ ...s, likes: data.total_likes }));
                    setLiked(true);
                });
            };

            const legalForSelected = useCallback((r, c) => legalMoves(board, state, turn).filter((m) => m.from[0] === r && m.from[1] === c), [board, state, turn]);

            function finalizeMove(m) {
                const boardBefore = board;
                const { board: nb, state: ds } = applyMove(board, state, m);

                const nextColor = opp(turn);
                const nextMoves = legalMoves(nb, ds, nextColor);
                const gaveCheck = isInCheck(nb, nextColor);
                const isMate = nextMoves.length === 0 && gaveCheck;

                setHistory(prev => [...prev, moveNotation(m, isMate, gaveCheck)]);
                if (m.captured) setCaptured(c => ({ ...c, [m.captured.color]: [...c[m.captured.color], m.captured.type] }));

                if (turn === 'w') {
                    const elapsed = Date.now() - lastMoveTime.current;
                    const bk = findKing(boardBefore, "b");
                    let retreat = false;
                    if (bk && m.piece.type !== 'P' && m.piece.type !== 'K') {
                        const before = Math.abs(m.from[0] - bk[0]) + Math.abs(m.from[1] - bk[1]);
                        const after = Math.abs(m.to[0] - bk[0]) + Math.abs(m.to[1] - bk[1]);
                        if (after > before) retreat = true;
                    }
                    setStats(prev => ({
                        captures: prev.captures + (m.captured ? 1 : 0), checks: prev.checks + (gaveCheck ? 1 : 0),
                        retreats: prev.retreats + (retreat ? 1 : 0), earlyQueen: prev.earlyQueen || (m.piece.type === 'Q' && prev.totalMoves < 6),
                        quickMoves: prev.quickMoves + (elapsed < 2500 ? 1 : 0), totalMoves: prev.totalMoves + 1
                    }));
                }

                setBoard(nb); setState({ castling: ds.castling, enPassant: ds.enPassant });
                setSelected(null); setSelMoves([]); setPendingPromotion(null);
                setTurn(nextColor); lastMoveTime.current = Date.now();

                if (nextMoves.length === 0) {
                    setStatus(nextColor === "w" ? "loss" : "win");
                    setView("results");
                    safeFetch('complete').then(() => {
                        safeFetch('get').then(data => {
                            if (data.page_views) setDbStats(s => ({ ...s, completions: data.tests_completed }));
                        });
                    });
                }
            }

            function attemptMove(m) {
                if (m.promotion) setPendingPromotion(m);
                else finalizeMove(m);
            }

            useEffect(() => {
                if (turn !== "b" || status !== "playing" || pendingPromotion || view !== "playing") return;
                const t = setTimeout(() => {
                    const moves = legalMoves(board, state, "b");
                    if (moves.length === 0) return;
                    const res = minimax(board, state, engineDepth, -Infinity, Infinity, "b", false);
                    const move = res.move || moves[Math.floor(Math.random() * moves.length)];
                    if (move.promotion) move.promoteTo = "Q";
                    finalizeMove(move);
                }, 400);
                return () => clearTimeout(t);
            }, [turn, status, board, state, pendingPromotion, view]); // eslint-disable-line

            const onDragStart = (e, r, c) => {
                if (turn !== "w" || status !== "playing") return;
                const piece = board[r][c];
                if (piece && piece.color === "w") {
                    setSelected([r, c]); setSelMoves(legalForSelected(r, c));
                    e.dataTransfer.setData("text/plain", JSON.stringify([r, c]));
                    const img = new Image(); img.src = 'data:image/gif;base64,R0lGODlhAQABAAD/ACwAAAAAAQABAAACADs=';
                    e.dataTransfer.setDragImage(img, 0, 0);
                }
            };
            const onDragOver = (e) => e.preventDefault();
            const onDrop = (e, r, c) => {
                e.preventDefault();
                const data = e.dataTransfer.getData("text/plain");
                if (!data) return;
                const [fr, fc] = JSON.parse(data);
                const move = legalForSelected(fr, fc).find((m) => m.to[0] === r && m.to[1] === c);
                if (move) attemptMove(move);
                else { setSelected(null); setSelMoves([]); }
            };

            const handleSquareClick = (r, c) => {
                if (turn !== "w" || status !== "playing" || pendingPromotion) return;
                if (selected) {
                    const move = selMoves.find((m) => m.to[0] === r && m.to[1] === c);
                    if (move) { attemptMove(move); return; }
                }
                const piece = board[r][c];
                if (piece && piece.color === "w") { setSelected([r, c]); setSelMoves(legalForSelected(r, c)); }
                else { setSelected(null); setSelMoves([]); }
            };

            const resetGame = () => {
                setBoard(initialBoard()); setState({ castling: { w: { k: true, q: true }, b: { k: true, q: true } }, enPassant: null });
                setStatus("playing"); setTurn("w"); setCaptured({ w: [], b: [] }); setHistory([]);
                setStats({ captures: 0, checks: 0, retreats: 0, earlyQueen: false, quickMoves: 0, totalMoves: 0 });
                setPendingPromotion(null); closeShareCard(); setView("playing");
            };

            const goHome = () => {
                setBoard(initialBoard()); setState({ castling: { w: { k: true, q: true }, b: { k: true, q: true } }, enPassant: null });
                setStatus("playing"); setTurn("w"); setCaptured({ w: [], b: [] }); setHistory([]);
                setStats({ captures: 0, checks: 0, retreats: 0, earlyQueen: false, quickMoves: 0, totalMoves: 0 });
                setPendingPromotion(null); closeShareCard(); setShowHomeConfirm(false); setView("intro");
            };

            const handleHomeClick = () => {
                const gameInProgress = view === "playing" && status === "playing" && history.length > 0;
                if (gameInProgress) setShowHomeConfirm(true);
                else goHome();
            };

            const adv = getMaterialAdvantage(board);
            const currentColors = THEMES[boardTheme];

            const traits = useMemo(() => {
                const clamp = v => Math.max(10, Math.min(90, Math.round(v)));
                return {
                    confrontation: clamp(50 + stats.captures * 6 + stats.checks * 8 - stats.retreats * 4),
                    risk: clamp(50 + (stats.earlyQueen ? 20 : -10) + stats.checks * 4),
                    patience: clamp(80 - (stats.quickMoves / Math.max(1, stats.totalMoves)) * 60),
                    planning: clamp(50 + stats.totalMoves * 2 - stats.retreats * 3),
                    resilience: clamp(50 + stats.totalMoves * 1.5 - stats.retreats * 2)
                };
            }, [stats]);

            const archetype = useMemo(() => ARCHETYPES.find(a => a.test(traits)), [traits]);

            const closeShareCard = () => {
                if (shareCard) URL.revokeObjectURL(shareCard.url);
                setShareCard(null); setShareStatus(null);
            };

            // Builds a full result card (archetype + blurb + all five trait bars) as a PNG
            // so whatever gets shared is actually readable, not just a title + link.
            const handleShare = async () => {
                if (sharing) return;
                setSharing(true);
                try {
                    const canvas = await buildShareCard(archetype, traits, window.location.host || "this test");
                    canvas.toBlob((blob) => {
                        setSharing(false);
                        if (!blob) return;
                        const url = URL.createObjectURL(blob);
                        setShareCard({ url, blob });
                    }, "image/png", 0.95);
                } catch (e) {
                    setSharing(false);
                }
            };

            const downloadShareCard = () => {
                if (!shareCard) return;
                const a = document.createElement("a");
                a.href = shareCard.url; a.download = "chess-personality-result.png";
                document.body.appendChild(a); a.click(); document.body.removeChild(a);
                setShareStatus("downloaded");
            };

            const nativeShareCard = async () => {
                if (!shareCard) return;
                const file = new File([shareCard.blob], "chess-personality-result.png", { type: "image/png" });
                if (navigator.share && navigator.canShare && navigator.canShare({ files: [file] })) {
                    try {
                        await navigator.share({ files: [file], title: archetype.name, text: `I got "${archetype.name}" on the Chess Personality Test.` });
                        setShareStatus("shared");
                    } catch (e) { /* user cancelled — no-op */ }
                } else {
                    downloadShareCard();
                }
            };

            return (
                <React.Fragment>
                    <header className="site-header">
                        <button className="brand" onClick={handleHomeClick} aria-label="Back to home">
                            <div className="brand-mark">♘</div>
                            <span>Chess Personality</span>
                        </button>
                        <div style={{ display: 'flex', alignItems: 'center', gap: 18 }}>
                            <div className="live-stat hide-on-mobile"><IconEye /> <b>{dbStats.views}</b> views</div>
                            <div className="live-stat hide-on-mobile"><IconFlag /> <b>{dbStats.completions}</b> completed</div>
                            <button className="icon-btn" onClick={() => setTheme(t => t === 'light' ? 'dark' : 'light')} aria-label="Toggle theme">
                                {theme === 'light' ? <IconMoon /> : <IconSun />}
                            </button>
                        </div>
                    </header>

                    {showHomeConfirm && (
                        <div className="page-modal" onClick={() => setShowHomeConfirm(false)}>
                            <div className="page-modal-box" onClick={(e) => e.stopPropagation()}>
                                <h3>Leave this game?</h3>
                                <p>You're mid-game heading home will reset the board and you'll lose this attempt.</p>
                                <div className="page-modal-actions">
                                    <button className="btn-secondary" onClick={() => setShowHomeConfirm(false)}>Keep playing</button>
                                    <button className="btn-primary" onClick={goHome}>Reset & go home</button>
                                </div>
                            </div>
                        </div>
                    )}

                    {shareCard && (
                        <div className="page-modal" onClick={closeShareCard}>
                            <div className="page-modal-box share-modal-box" onClick={(e) => e.stopPropagation()}>
                                <h3>Your result card</h3>
                                <p>This is what gets shared full profile, not just the title.</p>
                                <img className="share-preview-img" src={shareCard.url} alt="Chess personality result card" />
                                <div className="page-modal-actions" style={{ marginTop: 18 }}>
                                    <button className="btn-secondary" onClick={downloadShareCard}>{shareStatus === 'downloaded' ? 'Downloaded' : 'Download'}</button>
                                    <button className="btn-primary" onClick={nativeShareCard}>{shareStatus === 'shared' ? 'Shared' : 'Share'}</button>
                                </div>
                                <button className="close-text-btn" onClick={closeShareCard}>Close</button>
                            </div>
                        </div>
                    )}

                    {view === "intro" && (
                        <section className="hero">
                            <div className="hero-eyebrow">A 5-minute chess personality test</div>
                            <h1>What your chess moves say about you</h1>
                            <p className="lede">Play one short game against an engine. Ignore the strategy we're not scoring your chess. We're reading your patience, your appetite for risk, and how you handle a setback.</p>
                            <button className="btn-primary" onClick={() => setView('playing')}>Start the test</button>
                            <div className="hero-meta">
                                <span><IconTime /> 5–10 minutes</span>
                                <span><IconUser /> No chess skill needed</span>
                                <span><IconFlag /> {dbStats.completions} people tested</span>
                            </div>
                        </section>
                    )}

                    {view === "results" && (
                        <div className="results-section">
                            <div className="result-kicker">Your result</div>
                            <h1 className="result-archetype">{archetype.name}</h1>
                            <p className="result-lede">{archetype.line}</p>

                            <RadarChart traits={traits} />

                            <div style={{ maxWidth: 560, margin: '10px auto 0' }}>
                                {TRAIT_DEFS.map((td) => (
                                    <div key={td.key} className="trait-card">
                                        <div className="trait-head">
                                            <span className="muted">{td.left}</span><span className="muted">{td.right}</span>
                                        </div>
                                        <div className="trait-track">
                                            <div className="trait-fill" style={{ width: traits[td.key] + "%" }} />
                                        </div>
                                        <p className="trait-blurb">{td.blurb(traits[td.key])}</p>
                                    </div>
                                ))}
                            </div>

                            <div className="results-actions">
                                <button className="btn-secondary" onClick={() => setView('review')}><IconFlag style={{ width: 16, height: 16, marginRight: 8, verticalAlign: -3 }} />Review the board</button>
                                <button className="btn-secondary" onClick={handleShare} disabled={sharing}><IconShare style={{ width: 16, height: 16, marginRight: 8, verticalAlign: -3 }} />{sharing ? 'Preparing…' : 'Share result'}</button>
                                <button className="btn-primary" onClick={resetGame}><IconReplay style={{ width: 16, height: 16, marginRight: 8, verticalAlign: -3 }} />Play again</button>
                            </div>
                        </div>
                    )}

                    {(view === "playing" || view === "review") && (
                        <div className="game-shell">
                            <div className="app-container">
                                <div className="board-section">
                                    <div className="avatar-row">
                                        <div className="avatar">
                                            <div className="avatar-icon"><IconCpu /></div>
                                            <div>
                                                <div>Engine</div>
                                                <div className="captures">{captured.w.map((p,i) => <span key={i}>{pieceGlyphs[p]}</span>)}{adv.b > 0 && <span className="adv">+{adv.b}</span>}</div>
                                            </div>
                                        </div>
                                        <span style={{ fontSize: 13, color: 'var(--text-muted)', fontWeight: 500 }}>{turn === 'b' && status === 'playing' && view === 'playing' ? 'Thinking…' : ''}</span>
                                    </div>

                                    <div className="board-wrapper">
                                        <div className="board">
                                            {board.map((row, r) => row.map((p, c) => {
                                                const dark = (r + c) % 2 === 1;
                                                const isSel = selected && selected[0] === r && selected[1] === c;
                                                const moveHere = selMoves.find((m) => m.to[0] === r && m.to[1] === c);
                                                const kingInCheck = p && p.type === "K" && status === "playing" && isInCheck(board, p.color);
                                                let bg = dark ? currentColors.dark : currentColors.light;
                                                if (kingInCheck) bg = 'var(--danger)'; else if (isSel) bg = currentColors.highlight;

                                                return (
                                                    <div key={`${r}-${c}`} className="sq" style={{ background: bg }} onClick={() => view === 'playing' && handleSquareClick(r, c)} onDragOver={onDragOver} onDrop={(e) => view === 'playing' && onDrop(e, r, c)}>
                                                        {moveHere && !p && <div className="dot" />}
                                                        {moveHere && p && <div className="capture-ring" />}
                                                        {p && <PieceIcon type={p.type} color={p.color} onDragStart={(e) => view === 'playing' && onDragStart(e, r, c)} />}
                                                    </div>
                                                );
                                            }))}
                                        </div>
                                        {pendingPromotion && (
                                            <div className="promo-modal">
                                                <div className="promo-box">
                                                    {['Q', 'R', 'B', 'N'].map(type => (
                                                        <div key={type} className="promo-piece" onClick={() => finalizeMove({...pendingPromotion, promoteTo: type})}>
                                                            <PieceIcon type={type} color="w" draggable="false" />
                                                        </div>
                                                    ))}
                                                </div>
                                            </div>
                                        )}
                                    </div>

                                    <div className="avatar-row">
                                        <div className="avatar">
                                            <div className="avatar-icon"><IconUser /></div>
                                            <div>
                                                <div>You</div>
                                                <div className="captures">{captured.b.map((p,i) => <span key={i}>{pieceGlyphs[p]}</span>)}{adv.w > 0 && <span className="adv">+{adv.w}</span>}</div>
                                            </div>
                                        </div>
                                        <span style={{ fontSize: 13, color: 'var(--accent)', fontWeight: 600 }}>{turn === 'w' && status === 'playing' && view === 'playing' ? 'Your turn' : ''}</span>
                                    </div>
                                </div>

                                <div className="sidebar">
                                    <div className="control-row">
                                        <select className="theme-select" value={boardTheme} onChange={(e) => setBoardTheme(e.target.value)}>
                                            <option value="grayscale">Slate board</option>
                                            <option value="wood">Wood board</option>
                                            <option value="classic">Classic board</option>
                                        </select>
                                    </div>

                                    <div className="history-panel">
                                        <div className="history-header">
                                            <span style={{ fontWeight: 600 }}>Moves</span>
                                            <span className="count">{history.length}</span>
                                        </div>
                                        <div className="history-list">
                                            {history.length === 0 && <div style={{ color: 'var(--text-muted)', fontStyle: 'italic' }}>Make a move to begin.</div>}
                                            {Array.from({ length: Math.ceil(history.length / 2) }).map((_, i) => (
                                                <div key={i} className="move-row">
                                                    <div className="move-num">{i + 1}.</div>
                                                    <div className="move-w">{history[i * 2]}</div>
                                                    <div className="move-b">{history[i * 2 + 1] || ""}</div>
                                                </div>
                                            ))}
                                            <div ref={historyEndRef} />
                                        </div>
                                    </div>

                                    {view === "review" && (
                                        <button className="btn-primary" onClick={() => setView('results')} style={{ marginTop: 14 }}>Back to results</button>
                                    )}
                                </div>
                            </div>
                        </div>
                    )}

                    {view === "intro" && (
                        <React.Fragment>
                            <section className="site-section">
                                <h2>How the test works</h2>
                                <p className="section-lede">There's no board setup and nothing to study. Play naturally and the read comes from the pattern, not any single move.</p>
                                <div className="steps-list">
                                    <div className="step-item">
                                        <div className="step-num">1</div>
                                        <div><h3>Play a short game</h3><p>You play white against a modest engine. Move however feels natural there's no "correct" way to play.</p></div>
                                    </div>
                                    <div className="step-item">
                                        <div className="step-num">2</div>
                                        <div><h3>We track your decisions</h3><p>Move speed, when you trade pieces, how you respond to being put in check, and what you do right after a loss.</p></div>
                                    </div>
                                    <div className="step-item">
                                        <div className="step-num">3</div>
                                        <div><h3>Get your profile</h3><p>The moment the game ends, you get a personality archetype and a breakdown across five traits.</p></div>
                                    </div>
                                </div>
                            </section>

                            <section className="site-section">
                                <h2>What this test measures</h2>
                                <p className="section-lede">Five behavioral tendencies the same ones that tend to show up in how people negotiate, make decisions at work, and handle pressure.</p>
                                <div className="measure-grid">
                                    <div className="measure-card"><h3>Confrontation</h3><p>Whether you move toward friction or wait it out.</p></div>
                                    <div className="measure-card"><h3>Risk appetite</h3><p>How willing you are to give something up now for a better position later.</p></div>
                                    <div className="measure-card"><h3>Patience</h3><p>Whether you trust your first instinct or slow down to check it.</p></div>
                                    <div className="measure-card"><h3>Planning</h3><p>Whether you're building toward something or reacting move to move.</p></div>
                                    <div className="measure-card"><h3>Recovery</h3><p>How quickly you reset your decision-making after a setback.</p></div>
                                </div>
                            </section>

                            <section className="site-section">
                                <h2>Frequently asked questions</h2>
                                <details className="faq-item" open>
                                    <summary className="faq-q">Is this a real psychological personality test?<IconPlus /></summary>
                                    <p className="faq-a">It's a lightweight, self-reflection tool inspired by decision-making psychology not a clinical assessment. It reads patterns in your moves to describe tendencies you'll likely recognize in yourself.</p>
                                </details>
                                <details className="faq-item">
                                    <summary className="faq-q">Do I need to know how to play chess?<IconPlus /></summary>
                                    <p className="faq-a">No. You don't need any chess skill or strategy knowledge. The test reads how you approach decisions, not whether your moves are objectively good.</p>
                                </details>
                                <details className="faq-item">
                                    <summary className="faq-q">How long does it take?<IconPlus /></summary>
                                    <p className="faq-a">Most games finish in 5 to 10 minutes.</p>
                                </details>
                                <details className="faq-item">
                                    <summary className="faq-q">What does it actually measure?<IconPlus /></summary>
                                    <p className="faq-a">Five tendencies: how you approach confrontation, your appetite for risk, your patience under time pressure, how far ahead you plan, and how you recover after a setback.</p>
                                </details>
                            </section>
                        </React.Fragment>
                    )}

                    <footer className="site-footer">
                        <button className={`icon-btn like-btn ${liked ? 'liked' : ''}`} onClick={handleLike}>
                            <IconHeart style={{ color: liked ? 'var(--accent)' : 'currentColor' }} />
                            <span style={{ fontWeight: 600 }}>{dbStats.likes}</span>
                        </button>
                        <span>
                            Built by <a href="https://linkedin.com/in/aijaz-mahdavi" target="_blank" rel="noopener noreferrer">Aijaz Mahdavi</a> · &copy; {new Date().getFullYear()} Ajax Digitech
                        </span>
                    </footer>
                </React.Fragment>
            );
        }

        const root = ReactDOM.createRoot(document.getElementById('root'));
        root.render(<App />);
    </script>
</body>
</html>
