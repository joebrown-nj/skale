{include file="inc/layout/header.tpl" hideMenu=true hideBreadcrumb=true}

<link rel="stylesheet" href="{$smarty.ENV.WEB_ROOT}css/headerFooterHide.css">

<style>
/* 
    * {
        margin: 0;
        padding: 0;
        box-sizing: border-box;
    } */

    body {
        font-family: 'Inter', sans-serif;
        background: #081120;
        color: #fff;
        /* min-height: 100vh; */
        overflow-x: hidden !important;
        position: relative;
    }

    /* Background glow effects */
    .container:before {
        content: '';
        position: absolute;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, #2563eb33, transparent 70%);
        top: -200px;
        left: -100px;
    }

    .container:after {
        content: '';
        position: absolute;
        width: 500px;
        height: 500px;
        background: radial-gradient(circle, #3b82f633, transparent 70%);
        bottom: -250px;
        right: -100px;
    }

    /* .container {
        display: flex;
        justify-content: center;
        align-items: center;
        min-height: 100vh;
        padding: 20px;
        position: relative;
        z-index: 2;
    } */

    .card {
        width: 100%;
        max-width: 720px;
        background: rgba(17, 24, 39, .85);
        backdrop-filter: blur(15px);
        border: 1px solid rgba(255, 255, 255, .08);
        border-radius: 24px;
        padding: 60px;
        text-align: center;
        box-shadow:
            0 20px 60px rgba(0, 0, 0, .4);
    }

    .logo {
        font-size: 34px;
        font-weight: 800;
        margin-bottom: 35px;
    }

    .logo a {
        color: #fff;
        text-decoration: none;
    }

    .check {
        width: 90px;
        height: 90px;
        margin: 0 auto 30px;
        border-radius: 50%;
        background: linear-gradient(135deg, #2563eb, #60a5fa);
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 40px;
    }

    h1 {
        font-size: 48px;
        line-height: 1.1;
        margin-bottom: 20px;
    }

    .gradient {
        background: linear-gradient(90deg, #60a5fa, #2563eb);
        -webkit-background-clip: text;
        -webkit-text-fill-color: transparent;
    }

    p {
        color: #cbd5e1;
        font-size: 18px;
        line-height: 1.8;
        max-width: 550px;
        margin: 0 auto 35px;
    }

    .actions {
        display: flex;
        gap: 15px;
        justify-content: center;
        flex-wrap: wrap;
    }

    .btn {
        display: inline-block;
        padding: 15px 28px;
        border-radius: 10px;
        font-weight: 600;
        text-decoration: none;
        transition: .3s;
    }

    .btn-primary {
        background: linear-gradient(90deg, #2563eb, #3b82f6);
        color: #fff;
    }

    .btn-primary:hover {
        transform: translateY(-3px);
    }

    .btn-secondary {
        border: 1px solid rgba(255, 255, 255, .15);
        color: #fff;
    }

    .btn-secondary:hover {
        background: rgba(255, 255, 255, .05);
    }

    .next {
        margin-top: 40px;
        padding-top: 30px;
        border-top: 1px solid rgba(255, 255, 255, .08);
    }

    .next h3 {
        margin-bottom: 15px;
    }

    .next ul {
        list-style: none;
    }

    .next li {
        color: #94a3b8;
        margin-bottom: 10px;
    }

    @media(max-width:768px) {
        .card {
            padding: 40px 25px;
        }

        h1 {
            font-size: 34px;
        }

        p {
            font-size: 16px;
        }
    }
</style>

<div class="container py-5">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-8">
            <div class="card">
                <div class="logo logo-text fw-bold BricolageGrotesque-ExtraBold">
                    <a href="{$smarty.const.WEB_URL}" class="mbtn" aria-describedby="thank you page logo link">
                        skale<span class="brand-color">.</span>
                    </a>
                </div>

                <div class="check">
                    &check;
                </div>

                <h1>Thank You.<br> <span class="gradient">Let's Scale Together.</span></h1>
                <p>We've received your request and our team will review your information shortly. We're excited to learn more about your goals and explore how Skale can help grow your business.</p>

                <div class="actions">
                    <a href="/" class="mbtn btn btn-primary" aria-describedby="thank you page return home button">
                        Return Home
                    </a>

                    <a href="/solutions" class="mbtn btn btn-secondary" aria-describedby="thank you page explore solutions button">
                        Explore Solutions
                    </a>
                </div>

                <div class="next">
                    <h3>What happens next?</h3>

                    <div class="trust-list">
                        <div class="trust-item">&check; We review your request</div>
                        <div class="trust-item">&check; We reach out within 1 business day</div>
                        <div class="trust-item">&check; We discuss your goals and opportunities</div>
                        <div class="trust-item">&check; We build a strategy tailored to your business</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{include file="inc/layout/footer.tpl" hideFooter=true}