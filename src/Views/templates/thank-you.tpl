{include file="inc/layout/header.tpl" hideBreadcrumb=true}

<link rel="stylesheet" href="{$smarty.ENV.WEB_ROOT}css/thank-you.min.css" data-ajax-managed-stylesheet="true">

<div class="thank-you-page container-fluid py-5">
    <div class="row justify-content-center align-items-center">
        <div class="col-md-8">
            <div class="card">
                <div class="logo logo-text fw-bold BricolageGrotesque-ExtraBold">
                    <a href="{$smarty.ENV.WEB_ROOT}" class="mbtn" aria-label="{$content.aria_label_thank_you_page_logo_link}">
                        {$content.text_skale}<span class="brand-color">{$content.text_text}</span>
                    </a>
                </div>

                <div class="check">
                    {$content.text_text_2}
                </div>

                <h1 class="text-white">{$content.text_thank_you}<br> <span class="gradient">{$content.text_let_s_scale_together}</span></h1>
                <p>{$content.text_we_ve_received_your_request_and}</p>

                <div class="actions">
                    <a href="/" class="mbtn btn btn-primary" aria-label="{$content.aria_label_thank_you_page_return_home_button}">
                        {$content.text_return_home}
                    </a>

                    <a href="/solutions" class="mbtn btn btn-secondary" aria-label="{$content.aria_label_thank_you_page_explore_solutions_button}">
                        {$content.text_explore_solutions}
                    </a>
                </div>

                <div class="next">
                    <h3 class="text-white">{$content.text_what_happens_next}</h3>

                    <div class="trust-list">
                        <div class="trust-item">{$content.text_we_review_your_request}</div>
                        <div class="trust-item">{$content.text_we_reach_out_within_1_business}</div>
                        <div class="trust-item">{$content.text_we_discuss_your_goals_and_opportunities}</div>
                        <div class="trust-item">{$content.text_we_build_a_strategy_tailored_to}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

{include file="inc/layout/footer.tpl" hideFooter=true}

