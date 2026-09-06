{include file="inc/layout/header.tpl"}

<link rel="stylesheet" href="{$smarty.ENV.WEB_ROOT}css/home.min.css" data-ajax-managed-stylesheet="true">

<main class="home">

    <section class="hero">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-7">
                    <div class="hero-kicker" data-aos="fade-up">
                        <span></span>
                        {$content.text_where_engineering_meets_growth}
                    </div>
                    <h1 data-aos="fade-up" data-aos-delay="75">
                        {$content.text_build_a_business_that_works} <span class="text-gradient">{$content.text_smarter_as_it_grows}</span>
                    </h1>
                    <p class="hero-copy mt-4" data-aos="fade-up" data-aos-delay="150">
                        {$content.text_skale_connects_your_website_marketing_software}
                    </p>
                    <div class="hero-actions d-flex flex-column flex-sm-row gap-3 mt-4" data-aos="fade-up" data-aos-delay="225">
                        <a aria-label="{$content.aria_label_home_hero_contact_button}" class="text-white mbtn btn btn-outline-light btn-lg" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_SERVICES_SOLUTIONS}">{$content.text_explore_solutions}</a>
                        <a class="btn btn-link text-white text-decoration-none px-2" onclick="scrollToEl('#problems')">{$content.text_see_what_we_solve} <i class="bi bi-arrow-down ms-1"></i></a>
                    </div>
                    <div class="hero-proof" data-aos="fade-up" data-aos-delay="300">
                        <span><i class="bi bi-check-circle-fill"></i>{$content.text_20_years_of_experience}</span>
                        <span><i class="bi bi-check-circle-fill"></i>{$content.text_founder_led_engagements}</span>
                        <span><i class="bi bi-check-circle-fill"></i>{$content.text_built_around_your_business}</span>
                    </div>
                </div>
                <div class="col-lg-5" data-aos="fade-left" data-aos-delay="175">
                    <div class="hero-form-card">
                        <div class="hero-form-header">
                            <span class="hero-form-eyebrow">{$content.text_free_strategy_session}</span>
                            <h2 class="fs-4 h3 mb-2">{$content.text_what_would_you_like_to_improve}</h2>
                            <p class="mb-0">{$content.text_share_a_few_details_and_get}</p>
                        </div>

                        <form action="{$smarty.ENV.SITE_URL}contact-form" method="POST" class="ajaxForm">
                            <input type="hidden" name="comment" value="home hero">
                            <input type="hidden" name="form_type" value="home-hero">

                            <div class="mb-3">
                                <label class="form-label" for="heroName">{$content.text_name}</label>
                                <input autocomplete="name" class="form-control" id="heroName" name="name" required="" type="text" />
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="email">{$content.text_email}</label>
                                <input autocomplete="email" class="form-control" id="email" name="email" required="" type="email" />
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="phone">{$content.text_phone}</label>
                                <input autocomplete="tel" class="form-control" id="phone" name="phone" type="tel" />
                            </div>

                            <div class="mb-3">
                                <label class="form-label" for="heroInterest">{$content.text_biggest_challenge}</label>
                                <select class="form-select" id="heroInterest" name="interest" required="">
                                    <option disabled="" selected="" value="">{$content.text_select_one}</option>
                                    <option value="website-leads">{$content.text_generate_more_leads}</option>
                                    <option value="new-website">{$content.text_build_a_new_website}</option>
                                    <option value="improve-website">{$content.text_improve_my_current_website}</option>
                                    <option value="automation">{$content.text_automate_manual_work}</option>
                                    <option value="integrations">{$content.text_connect_systems_and_data}</option>
                                    <option value="marketing">{$content.text_improve_marketing_seo_or_ppc}</option>
                                    <option value="unsure">{$content.text_i_am_not_sure_yet}</option>
                                </select>
                            </div>

                            <div aria-hidden="true" class="d-none">
                                <label for="heroWebsite">{$content.text_website}</label>
                                <input autocomplete="off" id="heroWebsite" name="website" tabindex="-1" type="text" />
                            </div>

                            <button class="btn btn-primary btn-lg w-100" type="submit">{$content.text_get_my_recommendation} <i class="bi bi-arrow-right ms-1"></i></button>
                            <p class="hero-form-note mb-0 mt-3"><i class="bi bi-lock me-1"></i>{$content.text_no_spam_no_aggressive_sales_follow}</p>
                            {include file="inc/layout/cloudflare-turnstile.tpl"}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section aria-label="{$content.aria_label_skale_trust_indicators}" class="trust-bar">
        <div class="container">
            <div class="trust-card">
                <div class="row text-center">
                    <div class="col-6 col-lg-3 trust-stat">
                        <strong>{$content.text_20}</strong>
                        <span>{$content.text_years_of_experience}</span>
                    </div>
                    <div class="col-6 col-lg-3 trust-stat">
                        <strong>{$content.text_4}</strong>
                        <span>{$content.text_connected_solution_pillars}</span>
                    </div>
                    <div class="col-6 col-lg-3 trust-stat">
                        <strong>{$content.text_1}</strong>
                        <span>{$content.text_partner_across_the_journey}</span>
                    </div>
                    <div class="col-6 col-lg-3 trust-stat">
                        <strong>{$content.text_custom}</strong>
                        <span>{$content.text_every_engagement}</span>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section-padding" id="problems">
        <div class="container">
            <div class="row align-items-end g-4 mb-5">
                <div class="col-lg-8" data-aos="fade-up">
                    <span class="section-label">{$content.text_the_problems_we_solve}</span>
                    <h2>{$content.text_your_business_may_not_need_another}</h2>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <p class="mb-0">{$content.text_growth_gets_harder_when_websites_marketing}</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-6 col-xl-3" data-aos="fade-up">
                    <article class="problem-card">
                        <span class="problem-number">{$content.text_01_conversion}</span>
                        <h3>{$content.text_traffic_but_not_enough_leads}</h3>
                        <p>{$content.text_people_visit_your_website_but_leave}</p>
                        <a aria-label="{$content.aria_label_home_service_link}" class="stretched-link mbtn problem-link" href="{$smarty.ENV.URL_SERVICES_SOLUTIONS}/growth-infrastructure">{$content.text_improve_conversions} <i class="bi bi-arrow-right"></i></a>
                    </article>
                </div>

                <div class="col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="100">
                    <article class="problem-card">
                        <span class="problem-number">{$content.text_02_efficiency}</span>
                        <h3>{$content.text_too_much_repetitive_work}</h3>
                        <p>{$content.text_your_team_spends_valuable_time_copying}</p>
                        <a aria-label="{$content.aria_label_home_service_link}" class="stretched-link mbtn problem-link" href="{$smarty.ENV.URL_SERVICES_SOLUTIONS}/automation-and-software">{$content.text_automate_operations} <i class="bi bi-arrow-right"></i></a>
                    </article>
                </div>

                <div class="col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="200">
                    <article class="problem-card">
                        <span class="problem-number">{$content.text_03_visibility}</span>
                        <h3>{$content.text_systems_that_do_not_connect}</h3>
                        <p>{$content.text_information_is_scattered_across_tools_creating}</p>
                        <a aria-label="{$content.aria_label_home_service_link}" class="stretched-link mbtn problem-link" href="{$smarty.ENV.URL_SERVICES_SOLUTIONS}/system-integrations">{$content.text_connect_your_systems} <i class="bi bi-arrow-right"></i></a>
                    </article>
                </div>

                <div class="col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="300">
                    <article class="problem-card">
                        <span class="problem-number">{$content.text_04_scale}</span>
                        <h3>{$content.text_growth_is_creating_friction}</h3>
                        <p>{$content.text_processes_that_once_worked_are_becoming}</p>
                        <a aria-label="{$content.aria_label_home_service_link}" class="stretched-link mbtn problem-link" href="{$smarty.ENV.URL_SERVICES_SOLUTIONS}/strategy-and-optimization">{$content.text_build_a_scalable_plan} <i class="bi bi-arrow-right"></i></a>
                    </article>
                </div>
            </div>

            <div class="text-center mt-5" data-aos="fade-up">
                <p class="mb-3">{$content.text_recognize_your_business_in_one_of}</p>
                <a aria-label="{$content.aria_label_home_talk_through_your_challenge_button}" class="mbtn btn btn-outline-primary" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_CONTACT}">{$content.text_talk_through_your_challenge}</a>
            </div>
        </div>
    </section>

    <section class="section-padding-sm pt-0">
        <div class="container">
            <div class="inline-cta" data-aos="fade-up">
                <div>
                    <span class="inline-cta-label">{$content.text_recognize_these_problems}</span>
                    <h2 class="h3 mb-2">{$content.text_let_s_identify_what_is_slowing}</h2>
                    <p class="mb-0">{$content.text_you_do_not_need_to_know}</p>
                </div>
                <a aria-label="{$content.aria_label_home_free_strategy_session_button}" class="mbtn btn btn-primary btn-lg flex-shrink-0" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_CONTACT}">{$content.text_free_strategy_session_2}</a>
            </div>
        </div>
    </section>


    <section class="section-padding outcome-section">
        <div class="container">
            <div class="text-center mx-auto mb-5" data-aos="fade-up" style="max-width: 760px;">
                <span class="section-label justify-content-center">{$content.text_from_friction_to_progress}</span>
                <h2>{$content.text_focus_on_the_outcome_not_a}</h2>
                <p class="section-intro mx-auto">{$content.text_every_engagement_starts_by_understanding_what}</p>
            </div>
            <div class="row g-4 align-items-stretch">
                <div class="col-lg-6" data-aos="fade-right">
                    <div class="home-outcome-card">
                        <span class="badge text-bg-light border mb-3">{$content.text_what_may_be_happening_now}</span>
                        <h3>{$content.text_disconnected_activity_creates_hidden_costs}</h3>
                        <ul class="home-outcome-list">
                            <li><i class="bi bi-x-circle"></i><span>{$content.text_your_website_does_not_clearly_communicate}</span></li>
                            <li><i class="bi bi-x-circle"></i><span>{$content.text_employees_spend_hours_completing_repetitive_tasks}</span></li>
                            <li><i class="bi bi-x-circle"></i><span>{$content.text_marketing_channels_operate_separately_from_sales}</span></li>
                            <li><i class="bi bi-x-circle"></i><span>{$content.text_decisions_are_based_on_incomplete_data}</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6" data-aos="fade-left">
                    <div class="home-outcome-card dark">
                        <span class="badge bg-white text-dark mb-3">{$content.text_what_better_can_look_like}</span>
                        <h3 class="text-white">{$content.text_connected_systems_create_momentum}</h3>
                        <ul class="home-outcome-list">
                            <li><i class="bi bi-check-circle-fill"></i><span>{$content.text_a_clear_customer_journey_that_turns}</span></li>
                            <li><i class="bi bi-check-circle-fill"></i><span>{$content.text_automated_workflows_that_save_time_and}</span></li>
                            <li><i class="bi bi-check-circle-fill"></i><span>{$content.text_tools_and_data_that_move_reliably}</span></li>
                            <li><i class="bi bi-check-circle-fill"></i><span>{$content.text_reporting_that_shows_what_is_working}</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section-padding" id="services">
        <div class="container">
            <div class="row align-items-end g-4 mb-5">
                <div class="col-lg-8" data-aos="fade-up">
                    <span class="section-label">{$content.text_connected_solutions}</span>
                    <h2>{$content.text_everything_your_business_needs_to_grow}</h2>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <p class="mb-0">{$content.text_each_solution_can_stand_alone_or}</p>
                </div>
            </div>
            <div class="row g-4">
                <div class="col-md-6" data-aos="fade-up">
                    <article class="service-card">
                        <div class="icon-box"><i class="bi bi-window"></i></div>
                        <span class="small text-uppercase fw-bold text-secondary mt-4">{$content.text_growth_infrastructure}</span>
                        <h3>{$content.text_turn_your_website_into_your_best}</h3>
                        <p>{$content.text_create_a_faster_clearer_more_credible}</p>
                        <ul class="service-list">
                            <li>{$content.text_website_design_and_development}</li>
                            <li>{$content.text_landing_pages_and_conversion_optimization}</li>
                            <li>{$content.text_crm_lead_tracking_and_customer_journeys}</li>
                            <li>{$content.text_analytics_and_performance_improvements}</li>
                        </ul>
                        <a aria-label="{$content.aria_label_home_growth_infrastructure}" class="stretched-link mbtn btn-link-arrow mt-auto" href="{$smarty.ENV.URL_SERVICES_SOLUTIONS}/growth-infrastructure">{$content.text_explore_growth_infrastructure} <i class="bi bi-arrow-right"></i></a>
                    </article>
                </div>

                <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <article class="service-card">
                        <div class="icon-box"><i class="bi bi-gear-wide-connected"></i></div>
                        <span class="small text-uppercase fw-bold text-secondary mt-4">{$content.text_automation_software}</span>
                        <h3>{$content.text_stop_paying_people_to_do_robot}</h3>
                        <p>{$content.text_streamline_repetitive_processes_connect_your_tools}</p>
                        <ul class="service-list">
                            <li>{$content.text_workflow_and_process_automation}</li>
                            <li>{$content.text_system_integrations_and_data_synchronization}</li>
                            <li>{$content.text_custom_software_portals_and_internal_tools}</li>
                            <li>{$content.text_ai_assisted_reporting_and_insights}</li>
                        </ul>
                        <a aria-label="{$content.aria_label_home_automation_and_software}" class="stretched-link mbtn btn-link-arrow mt-auto" href="{$smarty.ENV.URL_SERVICES_SOLUTIONS}/automation-and-software">{$content.text_explore_automation_software} <i class="bi bi-arrow-right"></i></a>
                    </article>
                </div>

                <div class="col-md-6" data-aos="fade-up">
                    <article class="service-card">
                        <div class="icon-box"><i class="bi bi-bullseye"></i></div>
                        <span class="small text-uppercase fw-bold text-secondary mt-4">{$content.text_demand_generation}</span>
                        <h3>{$content.text_build_a_more_predictable_pipeline_of}</h3>
                        <p>{$content.text_connect_visibility_messaging_conversion_lead_nurturing}</p>
                        <ul class="service-list">
                            <li>{$content.text_seo_strategy_and_content_improvement}</li>
                            <li>{$content.text_google_and_meta_paid_advertising}</li>
                            <li>{$content.text_email_marketing_and_lead_nurturing}</li>
                            <li>{$content.text_campaign_analytics_and_optimization}</li>
                        </ul>
                        <a aria-label="{$content.aria_label_home_demand_generation}" class="stretched-link mbtn btn-link-arrow mt-auto" href="{$smarty.ENV.URL_SERVICES_SOLUTIONS}/demand-generation">{$content.text_explore_demand_generation} <i class="bi bi-arrow-right"></i></a>
                    </article>
                </div>

                <div class="col-md-6" data-aos="fade-up" data-aos-delay="100">
                    <article class="service-card">
                        <div class="icon-box"><i class="bi bi-compass"></i></div>
                        <span class="small text-uppercase fw-bold text-secondary mt-4">{$content.text_strategy_optimization}</span>
                        <h3>{$content.text_know_exactly_what_to_improve_next}</h3>
                        <p>{$content.text_find_bottlenecks_prioritize_investments_and_create}</p>
                        <ul class="service-list">
                            <li>{$content.text_growth_audits_and_system_mapping}</li>
                            <li>{$content.text_technology_and_marketing_roadmaps}</li>
                            <li>{$content.text_analytics_kpis_and_reporting}</li>
                            <li>{$content.text_ongoing_optimization_and_guidance}</li>
                        </ul>
                        <a aria-label="{$content.aria_label_home_strategy_optimization}" class="stretched-link mbtn btn-link-arrow mt-auto" href="{$smarty.ENV.URL_SERVICES_SOLUTIONS}/strategy-and-optimization">{$content.text_explore_strategy_optimization} <i class="bi bi-arrow-right"></i></a>
                    </article>
                </div>
            </div>

            <div class="text-center mt-5" data-aos="fade-up">
                <a aria-label="{$content.aria_label_home_view_all_solutions}" class="mbtn btn btn-outline-primary btn-lg" href="{$smarty.ENV.URL_SERVICES_SOLUTIONS}">{$content.text_view_all_solutions}</a>
            </div>
        </div>
    </section>

    <section class="section-padding-sm pt-0">
        <div class="container">
            <div class="inline-cta inline-cta-light" data-aos="fade-up">
                <div>
                    <span class="inline-cta-label">{$content.text_not_sure_where_to_start}</span>
                    <h2 class="h3 mb-2">{$content.text_tell_us_the_outcome_you_need}</h2>
                    <p class="mb-0">{$content.text_we_will_help_you_determine_whether}</p>
                </div>
                <a class="btn btn-outline-primary btn-lg flex-shrink-0" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_CONTACT}">{$content.text_talk_through_your_goal}</a>
            </div>
        </div>
    </section>


    <section class="section-padding systems-section">
        <div class="container">
            <div class="row align-items-center g-4">
                <div class="col-lg-8" data-aos="fade-up">
                    <span class="section-label text-white">{$content.text_the_skale_systems_approach}</span>
                    <h2 class="text-white">{$content.text_the_best_results_happen_when_every}</h2>
                </div>

                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <p class="mb-0">{$content.text_most_vendors_improve_one_part_skale}</p>
                </div>
            </div>

            <div class="journey-row">
                <div class="journey-step" data-aos="zoom-in">
                    <div class="journey-icon"><i class="bi bi-megaphone"></i></div>
                    <strong>{$content.text_marketing}</strong>
                </div>

                <div class="journey-step" data-aos="zoom-in" data-aos-delay="75">
                    <div class="journey-icon"><i class="bi bi-window"></i></div>
                    <strong>{$content.text_website}</strong>
                </div>

                <div class="journey-step" data-aos="zoom-in" data-aos-delay="150">
                    <div class="journey-icon"><i class="bi bi-person-check"></i></div>
                    <strong>{$content.text_crm}</strong>
                </div>

                <div class="journey-step" data-aos="zoom-in" data-aos-delay="225">
                    <div class="journey-icon"><i class="bi bi-gear"></i></div>
                    <strong>{$content.text_automation}</strong>
                </div>

                <div class="journey-step" data-aos="zoom-in" data-aos-delay="300">
                    <div class="journey-icon"><i class="bi bi-bar-chart"></i></div>
                    <strong>{$content.text_reporting}</strong>
                </div>

                <div class="journey-step" data-aos="zoom-in" data-aos-delay="375">
                    <div class="journey-icon"><i class="bi bi-graph-up-arrow"></i></div>
                    <strong>{$content.text_growth}</strong>
                </div>
            </div>
        </div>
    </section>


    <section class="section-padding">
        <div class="container">
            <div class="text-center mx-auto mb-5" data-aos="fade-up" style="max-width: 760px;">
                <span class="section-label justify-content-center">{$content.text_how_we_work}</span>
                <h2>{$content.text_a_clear_path_from_business_challenge}</h2>
                <p class="section-intro mx-auto">{$content.text_no_unnecessary_complexity_no_generic_package}</p>
            </div>

            <div class="row g-4">
                <div class="col-md-4" data-aos="fade-up">
                    <article class="process-card">
                        <span class="process-count">{$content.text_1}</span>
                        <h3 class="h4 mt-4">{$content.text_find_the_friction}</h3>
                        <p class="mb-0">{$content.text_we_examine_your_customer_journey_workflows}</p>
                    </article>
                </div>

                <div class="col-md-4" data-aos="fade-up" data-aos-delay="100">
                    <article class="process-card">
                        <span class="process-count">{$content.text_2}</span>
                        <h3 class="h4 mt-4">{$content.text_prioritize_the_impact}</h3>
                        <p class="mb-0">{$content.text_we_focus_first_on_the_changes}</p>
                    </article>
                </div>

                <div class="col-md-4" data-aos="fade-up" data-aos-delay="200">
                    <article class="process-card">
                        <span class="process-count">{$content.text_3}</span>
                        <h3 class="h4 mt-4">{$content.text_build_for_what_comes_next}</h3>
                        <p class="mb-0">{$content.text_we_implement_practical_systems_that_solve}</p>
                    </article>
                </div>
            </div>
        </div>
    </section>


    <section class="section-padding trust-section">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-5" data-aos="fade-right">
                    <div class="founder-panel d-flex flex-column justify-content-end">
                        <span class="badge bg-light text-dark align-self-start mb-3">{$content.text_founder_led_consulting}</span>
                        <h3 class="h2">{$content.text_experience_you_can_speak_with_directly}</h3>

                    </div>
                </div>

                <div class="col-lg-7" data-aos="fade-left">
                    <span class="section-label">{$content.text_why_businesses_trust_skale}</span>
                    <h2>{$content.text_a_technical_partner_who_understands_the}</h2>
                    <p class="section-intro">{$content.text_you_should_not_have_to_coordinate}</p>

                    <div class="mt-4">
                        <div class="trust-point">
                            <i class="bi bi-patch-check-fill"></i>
                            <div>
                                <h3 class="h5 mb-1">{$content.text_20_years_of_real_world_experience}</h3>
                                <p class="mb-0">{$content.text_senior_engineering_product_consulting_and_growth}</p>
                            </div>
                        </div>

                        <div class="trust-point">
                            <i class="bi bi-person-workspace"></i>
                            <div>
                                <h3 class="h5 mb-1">{$content.text_direct_access_and_accountability}</h3>
                                <p class="mb-0">{$content.text_founder_led_engagements_mean_thoughtful_recommendations}</p>
                            </div>
                        </div>

                        <div class="trust-point">
                            <i class="bi bi-sliders"></i>
                            <div>
                                <h3 class="h5 mb-1">{$content.text_recommendations_built_around_your_business}</h3>
                                <p class="mb-0">{$content.text_no_rigid_package_preferred_platform_or}</p>
                            </div>
                        </div>

                        <div class="trust-point">
                            <i class="bi bi-infinity"></i>
                            <div>
                                <h3 class="h5 mb-1">{$content.text_long_term_thinking}</h3>
                                <p class="mb-0">{$content.text_every_solution_is_designed_to_reduce}</p>
                            </div>
                        </div>
                    </div>

                    <a aria-label="{$content.aria_label_home_learn_more_about_skale_link}" class="mbtn btn-link-arrow mt-4" href="/about">{$content.text_learn_more_about_skale} <i class="bi bi-arrow-right"></i></a>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding-sm pt-0 trust-section">
        <div class="container">
            <div class="inline-cta inline-cta-dark" data-aos="zoom-in">
                <div>
                    <span class="inline-cta-label text-success">{$content.text_ready_for_a_clearer_next_step}</span>
                    <h2 class="fs-3 h3 mb-2">{$content.text_get_recommendations_based_on_your_business}</h2>
                    <p class="mb-0">{$content.text_start_with_a_short_conversation_about}</p>
                </div>

                <a aria-label="{$content.aria_label_home_request_a_consultation_button}" class="mbtn btn btn-light btn-lg flex-shrink-0 text-dark" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_CONTACT}">{$content.text_request_a_consultation}</a>
            </div>
        </div>
    </section>


    <section class="section-padding">
        <div class="container">
            <div class="row align-items-end g-4 mb-5">
                <div class="col-lg-8" data-aos="fade-up">
                    <span class="section-label">{$content.text_built_differently}</span>
                    <h2>{$content.text_the_difference_is_not_only_what}</h2>
                </div>
                <div class="col-lg-4" data-aos="fade-up" data-aos-delay="100">
                    <p class="mb-0">{$content.text_skale_starts_with_the_business_outcome}</p>
                </div>
            </div>

            <div class="comparison-wrap table-responsive" data-aos="fade-up">
                <table class="table comparison-table">
                    <thead>
                        <tr>
                            <th scope="col">{$content.text_area}</th>
                            <th scope="col">{$content.text_typical_agency}</th>
                            <th scope="col">{$content.text_the_skale_approach}</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th scope="row">{$content.text_starting_point}</th>
                            <td>{$content.text_requested_deliverable}</td>
                            <td><i class="bi bi-check-circle-fill text-success me-2"></i>{$content.text_business_outcome}</td>
                        </tr>
                        <tr>
                            <th scope="row">{$content.text_recommendations}</th>
                            <td>{$content.text_limited_to_one_service}</td>
                            <td><i class="bi bi-check-circle-fill text-success me-2"></i>{$content.text_across_systems_and_teams}</td>
                        </tr>
                        <tr>
                            <th scope="row">{$content.text_technology}</th>
                            <td>{$content.text_platform_first}</td>
                            <td><i class="bi bi-check-circle-fill text-success me-2"></i>{$content.text_fit_for_purpose}</td>
                        </tr>
                        <tr>
                            <th scope="row">{$content.text_communication}</th>
                            <td>{$content.text_passed_between_departments}</td>
                            <td><i class="bi bi-check-circle-fill text-success me-2"></i>{$content.text_direct_founder_led_access}</td>
                        </tr>
                        <tr>
                            <th scope="row">{$content.text_definition_of_success}</th>
                            <td>{$content.text_launch_completed}</td>
                            <td><i class="bi bi-check-circle-fill text-success me-2"></i>{$content.text_measurable_improvement}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>


    <section class="section-padding-sm">
        <div class="container">
            <div class="cta-band p-4 p-md-5" data-aos="zoom-in">
                <div class="row align-items-center g-4">
                    <div class="col-lg-8">
                        <span class="text-uppercase small fw-bold text-success">{$content.text_a_better_next_step}</span>
                        <h2 class="h1 mt-2 mb-3 fs-2">{$content.text_not_sure_which_service_you_need}</h2>
                        <p class="mb-0 fs-5">{$content.text_you_do_not_need_to_diagnose}</p>
                    </div>

                    <div class="col-lg-4 text-lg-end">
                        <a aria-label="{$content.aria_label_home_talk_through_your_challenge_button_2}" class="text-dark mbtn btn btn-light btn-lg" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_CONTACT}">{$content.text_talk_through_your} <br>{$content.text_challenge} <i class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <section class="section-padding">
        <div class="container">
            <div class="row align-items-end g-4 mb-5">
                <div class="col-lg-8" data-aos="fade-up">
                    <span class="section-label">{$content.text_insights_for_smarter_growth}</span>
                    <h2>{$content.text_practical_ideas_you_can_use_before}</h2>
                </div>

                <div class="col-lg-4 text-lg-end" data-aos="fade-up" data-aos-delay="100">
                    <a class="btn btn-outline-primary" href="{$smarty.ENV.SITE_URL}blog">{$content.text_view_all_insights}</a>
                </div>
            </div>

            <div class="row g-4">
                {include file="inc/blog/blog-list-container.tpl" blogList=$data.blogList blogContent=$data.blogContent limit=6}
            </div>
        </div>
    </section>


    <section class="section-padding contact-section" id="contact">
        <div class="container">
            <div class="row g-4 g-lg-5 align-items-stretch">
                <div class="col-lg-5" data-aos="fade-right">
                    <div class="contact-info">
                        <span class="badge bg-light text-dark mb-4">{$content.text_free_consultation}</span>
                        <h2 class="fs-2 text-white">{$content.text_ready_to_remove_what_is_getting}</h2>
                        <p class="fs-5">{$content.text_tell_us_what_you_are_trying}</p>

                        <div class="mt-4">
                            <div class="contact-benefit">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>{$content.text_no_pressure_discovery_conversation}</span>
                            </div>

                            <div class="contact-benefit">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>{$content.text_clear_practical_next_step_recommendations}</span>
                            </div>

                            <div class="contact-benefit">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>{$content.text_direct_conversation_with_an_experienced_technical}</span>
                            </div>

                            <div class="contact-benefit">
                                <i class="bi bi-check-circle-fill"></i>
                                <span>{$content.text_no_aggressive_sales_follow_up}</span>
                            </div>
                        </div>

                        <hr class="border-secondary my-4" />
                        <p class="small text-uppercase fw-bold mb-2">{$content.text_prefer_to_contact_us_directly}</p>
                        {include file="inc/buttons/phone-link.tpl" type="link"}
                        {include file="inc/buttons/email-link.tpl" type="link"}
                    </div>
                </div>

                <div class="col-lg-7" data-aos="fade-left">

                    <form action="{$smarty.ENV.SITE_URL}contact-form" method="POST" class="ajaxForm">
                        <input type="hidden" name="comment" value="home footer form">
                        <input type="hidden" name="form_type" value="home-footer">

                        <div class="mb-4">
                            <span class="section-label">{$content.text_start_the_conversation}</span>
                            <h2 class="fs-4 h3 mb-2">{$content.text_what_would_you_like_to_improve}</h2>
                            <p class="mb-0">{$content.text_share_a_few_details_we_will}</p>
                        </div>

                        <div class="row g-3">
                            <div class="col-md-6">
                                <label class="form-label" for="name">{$content.text_name}</label>
                                <input autocomplete="name" class="form-control" id="name" name="name" required="" type="text" />
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="email">{$content.text_email}</label>
                                <input autocomplete="email" class="form-control" id="email" name="email" required="" type="email" />
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="company">{$content.text_company}</label>
                                <input autocomplete="organization" class="form-control" id="company" name="company" type="text" />
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="phone">{$content.text_phone} <span class="text-secondary fw-normal">{$content.text_optional}</span></label>
                                <input autocomplete="tel" class="form-control" id="phone" name="phone" type="tel" />
                            </div>

                            <div class="col-12">
                                <label class="form-label" for="interest">{$content.text_what_would_you_like_to_improve_2}</label>
                                <select class="form-select" id="interest" name="interest" required="">
                                    <option disabled="" selected="" value="">{$content.text_select_the_closest_option}</option>
                                    <option value="website-leads">{$content.text_generate_more_leads_from_my_website}</option>
                                    <option value="automation">{$content.text_automate_repetitive_work}</option>
                                    <option value="integrations">{$content.text_connect_systems_and_data}</option>
                                    <option value="marketing">{$content.text_improve_marketing_performance}</option>
                                    <option value="strategy">{$content.text_create_a_growth_or_technology_roadmap}</option>
                                    <option value="unsure">{$content.text_i_am_not_sure_yet}</option>
                                </select>
                            </div>

                            <div class="col-12">
                                <label class="form-label" for="comment">{$content.text_what_is_happening_now}</label>
                                <textarea class="form-control" id="comment" name="comment" placeholder="{$content.placeholder_briefly_describe_the_problem_project_or}" required=""></textarea>
                            </div>


                            <div aria-hidden="true" class="d-none">
                                <label for="website">{$content.text_website}</label>
                                <input autocomplete="off" id="website" name="website" tabindex="-1" type="text" />
                            </div>

                            <div class="col-12">
                                <button class="btn btn-primary btn-lg w-100" type="submit">{$content.text_request_my_free_consultation} <i class="bi bi-arrow-right ms-1"></i></button>
                            </div>

                            <div class="col-12">
                                <p class="small text-center mb-0"><i class="bi bi-lock me-1"></i>{$content.text_your_information_stays_private_no_spam}</p>
                            </div>
                        </div>
                        {include file="inc/layout/cloudflare-turnstile.tpl"}
                    </form>
                </div>
            </div>
        </div>
    </section>
</main>

{include file="inc/layout/footer.tpl"}
