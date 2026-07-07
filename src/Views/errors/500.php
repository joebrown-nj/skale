<?php
declare(strict_types=1);

$pageTitle = htmlspecialchars($siteName, ENT_QUOTES, 'UTF-8');
$safeHomeUrl = htmlspecialchars($homeUrl, ENT_QUOTES, 'UTF-8');
$safeRetryUrl = htmlspecialchars($retryUrl, ENT_QUOTES, 'UTF-8');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Server Error | <?= $pageTitle ?></title>
    <style>
        :root {
            color-scheme: light;
            --bg: #f6f1e8;
            --bg-accent: #fde9cf;
            --panel: rgba(255, 255, 255, 0.9);
            --panel-border: rgba(24, 33, 47, 0.08);
            --text: #18212f;
            --muted: #556274;
            --primary: #18212f;
            --primary-hover: #0f1722;
            --secondary: #ffffff;
            --secondary-hover: #f4f6f9;
            --accent: #c97316;
            --shadow: 0 28px 80px rgba(24, 33, 47, 0.14);
        }

        * {
            box-sizing: border-box;
        }

        body {
            margin: 0;
            min-height: 100vh;
            font-family: "Segoe UI", Tahoma, Geneva, Verdana, sans-serif;
            color: var(--text);
            background:
                radial-gradient(circle at top left, rgba(201, 115, 22, 0.18), transparent 28%),
                radial-gradient(circle at bottom right, rgba(24, 33, 47, 0.1), transparent 24%),
                linear-gradient(135deg, var(--bg) 0%, #fffaf2 100%);
        }

        main {
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 24px;
        }

        .panel {
            width: min(100%, 760px);
            padding: 56px 48px;
            border: 1px solid var(--panel-border);
            border-radius: 28px;
            background: var(--panel);
            box-shadow: var(--shadow);
            backdrop-filter: blur(12px);
            position: relative;
            overflow: hidden;
        }

        .panel::before,
        .panel::after {
            content: "";
            position: absolute;
            border-radius: 999px;
            pointer-events: none;
        }

        .panel::before {
            width: 220px;
            height: 220px;
            top: -120px;
            right: -40px;
            background: radial-gradient(circle, rgba(201, 115, 22, 0.28) 0%, rgba(201, 115, 22, 0) 72%);
        }

        .panel::after {
            width: 180px;
            height: 180px;
            bottom: -100px;
            left: -50px;
            background: radial-gradient(circle, rgba(24, 33, 47, 0.16) 0%, rgba(24, 33, 47, 0) 72%);
        }

        .eyebrow {
            margin: 0 0 14px;
            font-size: 0.78rem;
            font-weight: 700;
            letter-spacing: 0.22em;
            text-transform: uppercase;
            color: var(--accent);
        }

        h1 {
            margin: 0;
            font-size: clamp(3rem, 8vw, 6rem);
            line-height: 0.95;
        }

        h2 {
            margin: 18px 0 0;
            font-size: clamp(1.5rem, 3vw, 2.2rem);
            line-height: 1.15;
        }

        p {
            margin: 18px 0 0;
            max-width: 34rem;
            font-size: 1.05rem;
            line-height: 1.7;
            color: var(--muted);
        }

        .actions {
            display: flex;
            flex-wrap: wrap;
            gap: 14px;
            margin-top: 32px;
        }

        .button {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            min-height: 50px;
            padding: 0 22px;
            border-radius: 999px;
            font-weight: 700;
            text-decoration: none;
            transition: transform 0.18s ease, background-color 0.18s ease, border-color 0.18s ease;
        }

        .button:hover {
            transform: translateY(-1px);
        }

        .button-primary {
            color: #fff;
            background: var(--primary);
        }

        .button-primary:hover {
            background: var(--primary-hover);
        }

        .button-secondary {
            color: var(--text);
            background: var(--secondary);
            border: 1px solid rgba(24, 33, 47, 0.12);
        }

        .button-secondary:hover {
            background: var(--secondary-hover);
        }

        .support {
            margin-top: 26px;
            font-size: 0.95rem;
        }

        .support strong {
            color: var(--text);
        }

        @media (max-width: 640px) {
            .panel {
                padding: 40px 24px;
            }

            .actions {
                flex-direction: column;
            }

            .button {
                width: 100%;
            }
        }
    </style>
</head>
<body>
    <main>
        <section class="panel" aria-labelledby="error-title">
            <p class="eyebrow">500 error</p>
            <h1 id="error-title">We hit a snag.</h1>
            <h2>Something broke on our side.</h2>
            <p>
                <?= $pageTitle ?> ran into an unexpected problem while loading this page.
                Please try again in a moment or head back home.
            </p>
            <div class="actions">
                <a class="button button-primary" href="<?= $safeHomeUrl ?>">Go home</a>
                <a class="button button-secondary" href="<?= $safeRetryUrl ?>">Try again</a>
            </div>
            <p class="support">
                If this keeps happening, <strong>the issue has been logged</strong> so it can be investigated.
            </p>
        </section>
    </main>
</body>
</html>
