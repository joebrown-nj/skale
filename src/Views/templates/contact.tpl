{include file="inc/layout/header.tpl"}

<link rel="stylesheet" href="{$smarty.ENV.WEB_ROOT}css/contact.min.css" data-ajax-managed-stylesheet="true">


<section class="hero section-padding" id="contact-form">
    <div class="container hero-content">
        <div class="row align-items-center g-5">

            <div class="col-lg-6">
                <div class="eyebrow">{$content.text_contact_skale}</div>

                <h1>{$content.text_build_faster}<br /><span class="gradient-text">{$content.text_scale_smarter}</span></h1>

                <p>{$content.text_websites_software_automation_and_marketing_systems}</p>

                <div class="trust-list">
                    <div class="trust-item">{$content.text_custom_built_solutions}</div>
                    <div class="trust-item">{$content.text_fast_response_times}</div>
                    <div class="trust-item">{$content.text_strategy_execution}</div>
                    <div class="trust-item">{$content.text_long_term_support}</div>
                </div>
            </div>


            <div class="col-lg-6">
                <div class="glass-card">
                    <h3 class="fw-bold mb-3">{$content.text_start_your_project}</h3>

                    <p class="text-secondary mb-1">
                        {$content.text_tell_us_about_your_goals_and}
                    </p>

                    {include file="inc/contact/contact-form.tpl"}

                    <p class="text-secondary fs-6 mt-4 mb-0">
                        {$content.text_no_pressure_no_obligation_just_a}
                    </p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="section-padding">
    <div class="container">
        <div class="text-center mb-5">
            <div class="eyebrow">{$content.text_why_businesses_choose_skale}</div>

            <h2 class="fw-bold display-5">
                {$content.text_built_differently}<br />{$content.text_built_to_scale}
            </h2>
        </div>

        <div class="row g-4">
            <div class="col-md-6 col-lg-3">
                <div class="feature-card">
                    <h4>{$content.text_strategy_first}</h4>
                    <p>{$content.text_we_build_systems_designed_around_growth}</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="feature-card">
                    <h4>{$content.text_built_to_scale_2}</h4>
                    <p>{$content.text_every_solution_is_designed_for_long}</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="feature-card">
                    <h4>{$content.text_fast_execution}</h4>
                    <p>{$content.text_move_quickly_without_sacrificing_quality_or}</p>
                </div>
            </div>

            <div class="col-md-6 col-lg-3">
                <div class="feature-card">
                    <h4>{$content.text_real_partnership}</h4>
                    <p>{$content.text_we_stay_involved_beyond_launch_to}</p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="section-padding">
    <div class="container">
        <div class="stats">
            <div class="row text-center g-4">
                <div class="col-md-3">
                    <div class="stat-number gradient-text">{$content.text_100}</div>
                    <div class="stat-label">{$content.text_projects_delivered}</div>
                </div>

                <div class="col-md-3">
                    <div class="stat-number gradient-text">{$content.text_1_day}</div>
                    <div class="stat-label">{$content.text_average_response_time}</div>
                </div>

                <div class="col-md-3">
                    <div class="stat-number gradient-text">{$content.text_custom}</div>
                    <div class="stat-label">{$content.text_tailored_solutions}</div>
                </div>

                <div class="col-md-3">
                    <div class="stat-number gradient-text">{$content.text_ongoing}</div>
                    <div class="stat-label">{$content.text_long_term_support_2}</div>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="section-padding">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-lg-8">
                <div class="text-center mb-5">
                    <div class="eyebrow">{$content.text_what_happens_next}</div>

                    <h2 class="fw-bold display-5">
                        {$content.text_simple_process}<br />{$content.text_clear_direction}
                    </h2>
                </div>

                <div class="contact-process-step">
                    <div class="process-number">{$content.text_1}</div>
                    <h4>{$content.text_discovery_call}</h4>
                    <p>{$content.text_we_learn_about_your_business_systems}</p>
                </div>

                <div class="contact-process-step">
                    <div class="process-number">{$content.text_2}</div>
                    <h4>{$content.text_strategy_recommendations}</h4>
                    <p>{$content.text_we_identify_opportunities_and_propose_the}</p>
                </div>

                <div class="contact-process-step">
                    <div class="process-number">{$content.text_3}</div>
                    <h4>{$content.text_build_scale}</h4>
                    <p>{$content.text_we_execute_solutions_designed_to_grow}</p>
                </div>
            </div>
        </div>
    </div>
</section>


<section class="section-padding pt-0">
    <div class="container">
        <div class="cta-box">
            <h2>{$content.text_ready_to_build_something_better}</h2>

            <p>{$content.text_let_s_create_systems_that_help}</p>

            <div class="d-flex flex-wrap justify-content-center gap-3">
                <button onclick="scrollToEl('#contact-form')" class="btn btn-primary-custom px-4 w-auto">
                    {$content.text_book_a_free_consultation}
                </button>

                <a href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_SERVICES_SOLUTIONS}" class="btn btn-outline-custom">
                    {$content.text_view_solutions}
                </a>
            </div>
        </div>
    </div>
</section>
















<div class="contact-page d-none">

    <section class="hero section-padding">
        <div class="container hero-content">
            <div class="row align-items-center g-5">

                <div class="col-lg-6">
                    <div class="eyebrow">{$content.text_contact_skale}</div>

                    <h1 class="text-white">{$content.text_build_faster}<br><span class="gradient-text">{$content.text_scale_smarter}</span></h1>

                    <p>{$content.text_websites_software_automation_and_marketing_systems}</p>

                    <div class="trust-list">
                        <div class="trust-item">
                            {$content.text_custom_built_solutions}
                        </div>
                        <div class="trust-item">
                            {$content.text_fast_response_times}
                        </div>
                        <div class="trust-item">
                            {$content.text_strategy_execution}
                        </div>
                        <div class="trust-item">
                            {$content.text_long_term_support}
                        </div>
                    </div>
                </div>


                <div class="col-lg-6">
                    <div class="glass-card">
                        <h3 class="fw-bold mb-3 text-white">
                            {$content.text_start_your_project}
                        </h3>

                        <p class="small-text mb-4">
                            {$content.text_tell_us_about_your_goals_and}
                        </p>

                        {include file="inc/contact/contact-form.tpl"}

                        <p class="small-text mt-4 mb-0">
                            {$content.text_no_pressure_no_obligation_just_a}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section-padding">
        <div class="container">
            <div class="text-center mb-5">
                <div class="eyebrow">
                    {$content.text_why_businesses_choose_skale}
                </div>
                <h2 class="fw-bold display-5 text-white">
                    {$content.text_built_differently}<br>
                    {$content.text_built_to_scale}
                </h2>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <h4 class="text-white">{$content.text_strategy_first}</h4>
                        <p>{$content.text_we_build_systems_designed_around_growth}</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <h4 class="text-white">{$content.text_built_to_scale_2}</h4>
                        <p>{$content.text_every_solution_is_designed_for_long}</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <h4 class="text-white">{$content.text_fast_execution}</h4>
                        <p>{$content.text_move_quickly_without_sacrificing_quality_or}</p>
                    </div>
                </div>

                <div class="col-md-6 col-lg-3">
                    <div class="feature-card">
                        <h4 class="text-white">{$content.text_real_partnership}</h4>
                        <p>{$content.text_we_stay_involved_beyond_launch_to}</p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section-padding">
        <div class="container">
            <div class="stats">
                <div class="row text-center g-4">
                    <div class="col-md-3">
                        <div class="stat-number gradient-text">
                            {$content.text_100}
                        </div>
                        <div class="stat-label">
                            {$content.text_projects_delivered}
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="stat-number gradient-text">
                            {$content.text_1_day}
                        </div>
                        <div class="stat-label">
                            {$content.text_average_response_time}
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="stat-number gradient-text">
                            {$content.text_custom}
                        </div>
                        <div class="stat-label">
                            {$content.text_tailored_solutions}
                        </div>
                    </div>

                    <div class="col-md-3">
                        <div class="stat-number gradient-text">
                            {$content.text_ongoing}
                        </div>
                        <div class="stat-label">
                            {$content.text_long_term_support_2}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section-padding">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="text-center mb-5">
                        <div class="eyebrow">
                            {$content.text_what_happens_next}
                        </div>
                        <h2 class="fw-bold display-5 text-white">
                            {$content.text_simple_process}<br>
                            {$content.text_clear_direction}
                        </h2>
                    </div>

                    <div class="process-step">
                        <div class="process-number">{$content.text_1}</div>
                        <h4>{$content.text_discovery_call}</h4>
                        <p>
                            {$content.text_we_learn_about_your_business_systems}
                        </p>
                    </div>

                    <div class="process-step">
                        <div class="process-number">{$content.text_2}</div>
                        <h4>{$content.text_strategy_recommendations}</h4>
                        <p>
                            {$content.text_we_identify_opportunities_and_propose_the}
                        </p>
                    </div>

                    <div class="process-step">
                        <div class="process-number">{$content.text_3}</div>
                        <h4>{$content.text_build_scale}</h4>
                        <p>
                            {$content.text_we_execute_solutions_designed_to_grow}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section-padding pt-0">
        <div class="container">
            <div class="cta-box">
                <h2>
                    {$content.text_ready_to_build_something_better}
                </h2>

                <p>
                    {$content.text_let_s_create_systems_that_help}
                </p>

                <div class="d-flex flex-wrap justify-content-center gap-3">
                    <a href="#" class="mbtn btn btn-primary-custom px-4 w-auto" aria-label="{$content.aria_label_contact_page_schedule_consultation_button}">
                        {$content.text_book_a_free_consultation}
                    </a>

                    <a href="/solutions" class="mbtn btn btn-outline-custom" aria-label="{$content.aria_label_contact_page_view_solutions_button}">
                        {$content.text_view_solutions}
                    </a>
                </div>
            </div>
        </div>
    </section>
</div>

{include file="inc/layout/footer.tpl"}


