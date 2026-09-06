{if !(isset($footer) && $footer === 'false')}
    <!-- =============================== MINIMAL FOOTER ================================ -->
    <footer class="py-4 bg-dark-custom border-top border-secondary">
        <div class="container">
            <div class="d-flex flex-column flex-md-row justify-content-between align-items-center gap-2">
                <a href="https://skaleup.it.com/" class="mbtn brand text-white">
                    skale<span class="brand-dot">.</span>
                </a>

                <div class="small text-white-50">&copy; {$smarty.now|date_format:"%Y"} Skale. All rights reserved.</div>
            </div>
        </div>
    </footer>

    {include file="inc/layout/hidden-links.tpl"}

    {include file="inc/layout/scripts.tpl"}

</body>
</html>
{/if}
