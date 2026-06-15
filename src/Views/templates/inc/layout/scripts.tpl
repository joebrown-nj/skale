<script defer src="{$smarty.ENV.WEB_ROOT}js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>

<script defer src="https://code.jquery.com/jquery-3.7.1.min.js" integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

<script defer src="https://unpkg.com/aos@next/dist/aos.js"></script>

{* <script defer src="https://www.googletagmanager.com/gtag/js?id=G-5HMT5HBM1Y"></script> *}

<script async src="https://www.googletagmanager.com/gtag/js?id=AW-1029303333"></script>

<script>
    {literal}
        window.dataLayer = window.dataLayer || [];
        window.gtag = window.gtag || function () {
            dataLayer.push(arguments);
        };

        gtag('js', new Date());
        gtag('config', 'AW-1029303333');
    {/literal}

    {if $p1 == 'thank-you'}
        {literal}
            gtag('event', 'conversion', {'send_to': 'AW-1029303333/_rWXCPer8b4cEKXY5-oD'});
        {/literal}
    {/if}
</script>

<script defer src="{$smarty.ENV.WEB_ROOT}js/main.min.js"></script>
