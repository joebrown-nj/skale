{include file="inc/layout/header.tpl"}

<link rel="stylesheet" href="{$smarty.ENV.WEB_ROOT}css/service-list.min.css" data-ajax-managed-stylesheet="true">

<main>
    <header class="hero">
        <div class="container py-5">
            <div class="row align-items-end g-5">
                <div class="col-xl-9">
                    <div class="eyebrow mb-4"><span class="eyebrow-dot"></span>{$content.text_engineering_systems_for_smarter_growth}</div>
                    <h1 class="fw-bold mb-4 text-white">{$content.text_your_business_doesn_t_need_more}</h1>
                    <p class="hero-copy mb-4">{$content.text_skale_connects_websites_marketing_software_automation}</p>
                    <div class="d-flex flex-column flex-sm-row gap-3">
                        <a class="mbtn btn btn-skale btn-lg" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_CONTACT}">{$content.text_get_your_free_growth_strategy_session}</a>
                        <button class="btn btn-outline-skale btn-lg" onclick="scrollToEl('#explore')">{$content.text_explore_solutions} <i class="bi bi-arrow-down ms-1"></i></button>
                    </div>
                </div>

                <div class="col-xl-3">
                    <div class="hero-proof rounded-skale p-4">
                        <div class="small text-uppercase letter-spacing text-white-50 mb-2">{$content.text_built_differently}</div>
                        <p class="fw-semibold mb-0 text-white">{$content.text_business_first_recommendations_senior_technical_experience}</p>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section id="explore" class="section-padding">
        <div class="container">
            <div class="row justify-content-between align-items-end mb-5 g-4">
                <div class="col-lg-7">
                    <div class="eyebrow text-success mb-3"><span class="eyebrow-dot"></span>{$content.text_the_problems_we_solve}</div>
                    <h2 class="display-5 fw-bold mb-3">{$content.text_does_any_of_this_sound_familiar}</h2>
                    <p class="lead text-secondary mb-0">{$content.text_most_growth_problems_are_not_caused}</p>
                </div>

                <div class="col-lg-4">
                    <div class="service-card">
                        <p class="text-secondary mb-0">{$content.text_start_with_the_problem_you_recognize}</p>
                    </div>
                </div>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-xl-3">
                    <article class="problem-card p-4">
                        <div class="icon-box mb-4">
                            <i class="bi bi-graph-down-arrow"></i>
                        </div>
                        <h3 class="h5 fw-bold">{$content.text_traffic_but_not_enough_leads}</h3>
                        <p class="text-secondary">{$content.text_people_visit_your_website_but_they}</p>
                        <a class="mbtn text-link stretched-link" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_SERVICES_SOLUTIONS}/growth-infrastructure">{$content.text_improve_conversions} <i class="bi bi-arrow-right"></i></a>
                    </article>
                </div>

                <div class="col-md-6 col-xl-3">
                    <article class="problem-card p-4">
                        <div class="icon-box mb-4">
                            <i class="bi bi-arrow-repeat"></i>
                        </div>
                        <h3 class="h5 fw-bold">{$content.text_too_much_repetitive_work}</h3>
                        <p class="text-secondary">{$content.text_your_team_spends_valuable_time_copying}</p>
                        <a class="mbtn text-link stretched-link" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_SERVICES_SOLUTIONS}/automation-and-software">{$content.text_automate_operations} <i class="bi bi-arrow-right"></i></a>
                    </article>
                </div>

                <div class="col-md-6 col-xl-3">
                    <article class="problem-card p-4">
                        <div class="icon-box mb-4">
                            <i class="bi bi-diagram-3"></i>
                        </div>
                        <h3 class="h5 fw-bold">{$content.text_systems_that_do_not_connect}</h3>
                        <p class="text-secondary">{$content.text_important_information_is_scattered_across_tools}</p>
                        <a class="mbtn text-link stretched-link" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_SERVICES_SOLUTIONS}/system-integrations">{$content.text_connect_your_systems} <i class="bi bi-arrow-right"></i></a>
                    </article>
                </div>

                <div class="col-md-6 col-xl-3">
                    <article class="problem-card p-4">
                        <div class="icon-box mb-4">
                            <i class="bi bi-arrows-angle-expand"></i>
                        </div>
                        <h3 class="h5 fw-bold">{$content.text_growth_is_creating_friction}</h3>
                        <p class="text-secondary">{$content.text_processes_that_once_worked_are_becoming}</p>
                        <a class="mbtn text-link stretched-link" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_SERVICES_SOLUTIONS}/strategy-and-optimization">{$content.text_build_a_scalable_plan} <i class="bi bi-arrow-right"></i></a>
                    </article>
                </div>
            </div>
            <div class="text-center mt-5"><p class="h4 fw-bold mb-1">{$content.text_if_you_recognized_your_business_in}</p><p class="text-secondary mb-0">{$content.text_skale_helps_turn_disconnected_efforts_into}</p></div>
        </div>
    </section>

    <section class="goal-section section-padding-sm">
        <div class="container">
            <div class="text-center max-width-copy mx-auto mb-5">
                <div class="eyebrow text-success mb-3"><span class="eyebrow-dot"></span>{$content.text_choose_your_goal}</div>
                <h2 class="display-6 fw-bold">{$content.text_what_are_you_trying_to_improve}</h2>
                <p class="lead text-secondary">{$content.text_choose_the_outcome_that_matters_most}</p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-xl-3">
                    <div class="goal-card d-block p-4">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="icon-box"><i class="bi bi-person-plus"></i></div>
                            <i class="bi bi-arrow-right arrow fs-4"></i>
                        </div>
                        <h3 class="h5 fw-bold mt-4">{$content.text_generate_more_leads}</h3>
                        <p class="text-secondary mb-0">{$content.text_improve_your_website_landing_pages_forms}</p>
                        <a class="mbtn stretched-link" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_SERVICES_SOLUTIONS}/growth-infrastructure"></a>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="goal-card d-block p-4">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="icon-box"><i class="bi bi-gear-wide-connected"></i></div>
                            <i class="bi bi-arrow-right arrow fs-4"></i>
                        </div>
                        <h3 class="h5 fw-bold mt-4">{$content.text_automate_operations_2}</h3>
                        <p class="text-secondary mb-0">{$content.text_replace_repetitive_work_with_reliable_workflows}</p>
                        <a class="mbtn stretched-link" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_SERVICES_SOLUTIONS}/automation-and-software"></a>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="goal-card d-block p-4">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="icon-box"><i class="bi bi-megaphone"></i></div>
                            <i class="bi bi-arrow-right arrow fs-4"></i>
                        </div>
                        <h3 class="h5 fw-bold mt-4">{$content.text_build_demand}</h3>
                        <p class="text-secondary mb-0">{$content.text_create_more_consistent_visibility_and_lead}</p>
                        <a class="mbtn stretched-link" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_SERVICES_SOLUTIONS}/demand-generation"></a>
                    </div>
                </div>

                <div class="col-md-6 col-xl-3">
                    <div class="goal-card d-block p-4">
                        <div class="d-flex justify-content-between align-items-start">
                            <div class="icon-box"><i class="bi bi-compass"></i></div>
                            <i class="bi bi-arrow-right arrow fs-4"></i>
                        </div>
                        <h3 class="h5 fw-bold mt-4">{$content.text_scale_smarter}</h3>
                        <p class="text-secondary mb-0">{$content.text_identify_bottlenecks_prioritize_investments_and_build}</p>
                        <a class="mbtn stretched-link" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_SERVICES_SOLUTIONS}/strategy-and-optimization"></a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="solutions" class="section-padding">
        <div class="container">
            <div class="max-width-copy mb-5">
                <div class="eyebrow text-success mb-3"><span class="eyebrow-dot"></span>{$content.text_explore_our_solutions}</div>
                <h2 class="display-5 fw-bold mb-3">{$content.text_not_isolated_services_a_connected_path}</h2>
                <p class="lead text-secondary">{$content.text_every_engagement_starts_with_the_business}</p>
            </div>

            <article id="growth" class="solution-row">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6 order-lg-2">
                        <div class="solution-visual visual-growth">
                            <div class="visual-window">
                                <div class="window-dots d-flex gap-2 mb-4">
                                    <span></span><span></span><span></span>
                                </div>
                                <div class="mock-line green w-50 mb-3"></div>
                                <div class="mock-line w-75 mb-4"></div>

                                <div class="row g-3">
                                    <div class="col-7">
                                        <div class="mock-block"></div>
                                    </div>

                                    <div class="col-5">
                                        <div class="mock-block"></div>
                                    </div>
                                </div>

                                <div class="mock-line w-100 mt-4"></div>
                                <div class="mock-line w-75 mt-2"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 order-lg-1">
                        <span class="badge text-bg-light border mb-3">{$content.text_growth_infrastructure}</span>
                        <h3 class="display-6 fw-bold">{$content.text_turn_your_website_into_your_best}</h3>
                        <p class="lead text-secondary">{$content.text_a_website_should_do_more_than}</p>
                        <ul class="check-list">
                            <li>{$content.text_website_design_and_development}</li>
                            <li>{$content.text_landing_pages_and_conversion_optimization}</li>
                            <li>{$content.text_crm_lead_tracking_and_customer_journeys}</li>
                            <li>{$content.text_analytics_reporting_and_performance_improvements}</li>
                        </ul>
                        <a class="mbtn btn btn-dark mt-2" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_SERVICES_SOLUTIONS}/growth-infrastructure">{$content.text_explore_growth_infrastructure} <i class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </article>

            <article id="automation" class="solution-row">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6">
                        <div class="solution-visual visual-automation">
                            <div class="visual-window rotate-right">
                                <div class="d-flex justify-content-between align-items-center mb-4">
                                    <div class="mock-line green w-50"></div>
                                    <i class="bi bi-lightning-charge-fill fs-3 text-success"></i>
                                </div>
                                <div class="d-flex align-items-center gap-3 mb-3">
                                    <div class="icon-box flex-shrink-0">
                                        <i class="bi bi-file-earmark-spreadsheet"></i>
                                    </div>
                                    <div class="mock-line w-75"></div>
                                </div>
                                <div class="text-center fs-3 text-success my-2">
                                    <i class="bi bi-arrow-down"></i>
                                </div>
                                <div class="d-flex align-items-center gap-3">
                                    <div class="icon-box flex-shrink-0">
                                        <i class="bi bi-cloud-check"></i>
                                    </div>
                                    <div class="mock-line w-100"></div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <span class="badge text-bg-light border mb-3">{$content.text_automation_software}</span>
                        <h3 class="display-6 fw-bold">{$content.text_stop_paying_people_to_do_robot}</h3>
                        <p class="lead text-secondary">{$content.text_repetitive_tasks_drain_time_and_make}</p>
                        <ul class="check-list">
                            <li>{$content.text_workflow_and_business_process_automation}</li>
                            <li>{$content.text_system_integrations_and_data_synchronization}</li>
                            <li>{$content.text_custom_software_portals_and_internal_tools}</li>
                            <li>{$content.text_ai_assisted_reporting_and_operational_insights}</li>
                        </ul>
                        <a class="mbtn btn btn-dark mt-2" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_SERVICES_SOLUTIONS}/automation-and-software">{$content.text_explore_automation_software} <i class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </article>

            <article id="demand" class="solution-row">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6 order-lg-2">
                        <div class="solution-visual visual-demand">
                            <div class="visual-window">
                                <div class="d-flex align-items-end gap-3" style="height:180px">
                                    <div class="bg-secondary-subtle rounded-top flex-fill" style="height:36%"></div>
                                    <div class="bg-secondary-subtle rounded-top flex-fill" style="height:52%"></div>
                                    <div class="bg-success-subtle rounded-top flex-fill" style="height:73%"></div>
                                    <div class="bg-success rounded-top flex-fill" style="height:94%"></div>
                                </div>
                                <div class="mock-line green w-50 mt-4 mb-3"></div>
                                <div class="mock-line w-75"></div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6 order-lg-1">
                        <span class="badge text-bg-light border mb-3">{$content.text_demand_generation}</span>
                        <h3 class="display-6 fw-bold">{$content.text_build_a_more_predictable_pipeline_of}</h3><p class="lead text-secondary">{$content.text_marketing_works_better_when_every_channel}</p>
                        <ul class="check-list">
                            <li>{$content.text_seo_strategy_and_content_improvement}</li>
                            <li>{$content.text_google_and_meta_paid_advertising}</li>
                            <li>{$content.text_email_marketing_and_lead_nurturing}</li>
                            <li>{$content.text_marketing_analytics_and_campaign_optimization}</li>
                        </ul>
                        <a class="mbtn btn btn-dark mt-2" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_SERVICES_SOLUTIONS}/demand-generation">{$content.text_explore_demand_generation} <i class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </article>

            <article id="strategy" class="solution-row">
                <div class="row align-items-center g-5">
                    <div class="col-lg-6">
                        <div class="solution-visual visual-strategy">
                            <div class="visual-window rotate-right">
                                <div class="d-flex justify-content-between mb-4">
                                    <div>
                                        <div class="mock-line green mb-2" style="width:130px"></div>
                                        <div class="mock-line" style="width:190px"></div>
                                    </div>
                                    <div class="icon-box"><i class="bi bi-bar-chart-line"></i></div>
                                </div>
                                <div class="row g-3">
                                    <div class="col-6">
                                        <div class="mock-block p-3">
                                            <div class="h3 fw-bold mb-1">{$content.text_01}</div>
                                            <div class="mock-line w-75"></div>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="mock-block p-3">
                                            <div class="h3 fw-bold mb-1">{$content.text_02}</div>
                                            <div class="mock-line w-75"></div>
                                        </div>
                                    </div>
                                    <div class="col-12">
                                        <div class="mock-block"></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <span class="badge text-bg-light border mb-3">{$content.text_strategy_optimization}</span>
                        <h3 class="display-6 fw-bold">{$content.text_know_exactly_what_to_improve_next}</h3>
                        <p class="lead text-secondary">{$content.text_more_activity_is_not_always_the}</p>
                        <ul class="check-list">
                            <li>{$content.text_growth_audits_and_system_mapping}</li>
                            <li>{$content.text_technology_and_marketing_roadmaps}</li>
                            <li>{$content.text_analytics_kpi_design_and_reporting}</li>
                            <li>{$content.text_ongoing_optimization_and_strategic_guidance}</li>
                        </ul>
                        <a class="mbtn btn btn-dark mt-2" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_SERVICES_SOLUTIONS}/strategy-and-optimization">{$content.text_explore_strategy_optimization} <i class="bi bi-arrow-right ms-1"></i></a>
                    </div>
                </div>
            </article>
        </div>
    </section>

    <section id="approach" class="system-section section-padding">
        <div class="container">
            <div class="row justify-content-between align-items-end g-4 mb-5">
                <div class="col-lg-7"><div class="eyebrow mb-3"><span class="eyebrow-dot"></span>{$content.text_the_skale_systems_approach}</div><h2 class="display-5 fw-bold text-white">{$content.text_the_best_results_happen_when_everything}</h2></div>
                <div class="col-lg-4"><p class="text-white-50 lead mb-0">{$content.text_most_vendors_improve_one_part_skale}</p></div>
            </div>
            <div class="row align-items-stretch g-3 system-flow">
                <div class="col-6 col-lg"><div class="flow-card"><div class="icon-box mb-3"><i class="bi bi-window"></i></div><h3 class="h6 mb-0">{$content.text_website}</h3></div></div>
                <div class="col-auto d-none d-lg-flex align-items-center"><i class="bi bi-arrow-right flow-arrow"></i></div>
                <div class="col-6 col-lg"><div class="flow-card"><div class="icon-box mb-3"><i class="bi bi-megaphone"></i></div><h3 class="h6 mb-0">{$content.text_marketing}</h3></div></div>
                <div class="col-auto d-none d-lg-flex align-items-center"><i class="bi bi-arrow-right flow-arrow"></i></div>
                <div class="col-6 col-lg"><div class="flow-card"><div class="icon-box mb-3"><i class="bi bi-people"></i></div><h3 class="h6 mb-0">{$content.text_crm}</h3></div></div>
                <div class="col-auto d-none d-lg-flex align-items-center"><i class="bi bi-arrow-right flow-arrow"></i></div>
                <div class="col-6 col-lg"><div class="flow-card"><div class="icon-box mb-3"><i class="bi bi-gear"></i></div><h3 class="h6 mb-0">{$content.text_automation}</h3></div></div>
                <div class="col-auto d-none d-lg-flex align-items-center"><i class="bi bi-arrow-right flow-arrow"></i></div>
                <div class="col-6 col-lg"><div class="flow-card"><div class="icon-box mb-3"><i class="bi bi-bar-chart"></i></div><h3 class="h6 mb-0">{$content.text_reporting}</h3></div></div>
                <div class="col-auto d-none d-lg-flex align-items-center"><i class="bi bi-arrow-right flow-arrow"></i></div>
                <div class="col-6 col-lg"><div class="flow-card"><div class="icon-box mb-3"><i class="bi bi-graph-up-arrow"></i></div><h3 class="h6 mb-0">{$content.text_growth}</h3></div></div>
            </div>
            <div class="row g-4 mt-5">
                <div class="col-lg-4"><h3 class="h4 fw-bold">{$content.text_1_find_the_friction}</h3><p class="text-white-50">{$content.text_we_uncover_the_bottlenecks_missed_opportunities}</p></div>
                <div class="col-lg-4"><h3 class="h4 fw-bold">{$content.text_2_prioritize_the_impact}</h3><p class="text-white-50">{$content.text_we_focus_on_the_changes_most}</p></div>
                <div class="col-lg-4"><h3 class="h4 fw-bold">{$content.text_3_build_for_what_comes_next}</h3><p class="text-white-50">{$content.text_we_implement_practical_systems_designed_to}</p></div>
            </div>
        </div>
    </section>

    <section class="section-padding">
        <div class="container">
            <div class="row g-5 align-items-center">
                <div class="col-lg-5">
                    <div class="eyebrow text-success mb-3">
                        <span class="eyebrow-dot"></span>
                        {$content.text_why_businesses_choose_skale}
                    </div>
                    <h2 class="display-5 fw-bold">{$content.text_a_partner_who_understands_the_whole}</h2>
                    <p class="lead text-secondary">{$content.text_you_should_not_have_to_coordinate}</p>
                    <a class="mbtn btn btn-outline-dark" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_CONTACT}">{$content.text_talk_through_your_challenges}</a>
                </div>

                <div class="col-lg-7"><div class="row g-3">
                        <div class="col-md-6">
                            <div class="reason-card p-4">
                                <div class="icon-box mb-3">
                                    <i class="bi bi-award"></i>
                                </div>
                                <h3 class="h5 fw-bold">{$content.text_20_years_of_experience}</h3>
                                <p class="text-secondary mb-0">{$content.text_senior_engineering_and_consulting_experience_applied}</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="reason-card p-4">
                                <div class="icon-box mb-3">
                                    <i class="bi bi-person-check"></i>
                                </div>
                                <h3 class="h5 fw-bold">{$content.text_founder_led_engagements}</h3>
                                <p class="text-secondary mb-0">{$content.text_direct_access_thoughtful_recommendations_and_accountability}</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="reason-card p-4">
                                <div class="icon-box mb-3">
                                    <i class="bi bi-sliders"></i>
                                </div>
                                <h3 class="h5 fw-bold">{$content.text_built_around_your_business}</h3>
                                <p class="text-secondary mb-0">{$content.text_no_rigid_package_or_generic_playbook}</p>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="reason-card p-4">
                                <div class="icon-box mb-3">
                                    <i class="bi bi-infinity"></i>
                                </div>
                                <h3 class="h5 fw-bold">{$content.text_long_term_thinking}</h3>
                                <p class="text-secondary mb-0">{$content.text_solutions_are_designed_to_reduce_future}</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section-padding-sm bg-light">
        <div class="container">
            <div class="text-center max-width-copy mx-auto mb-5"><h2 class="display-6 fw-bold">{$content.text_typical_agency_vs_the_skale_approach}</h2><p class="lead text-secondary">{$content.text_the_difference_is_not_only_what}</p></div>
            <div class="comparison-table bg-white shadow-sm">
                <div class="row g-0 comparison-head"><div class="col-4">{$content.text_area}</div><div class="col-4">{$content.text_typical_agency}</div><div class="col-4 skale-column">{$content.text_skale}</div></div>

                <div class="row g-0"><div class="col-4 fw-semibold">{$content.text_starting_point}</div><div class="col-4 text-secondary">{$content.text_requested_deliverable}</div><div class="col-4 skale-column fw-semibold">{$content.text_business_outcome}</div></div>

                <div class="row g-0"><div class="col-4 fw-semibold">{$content.text_recommendations}</div><div class="col-4 text-secondary">{$content.text_limited_to_one_service}</div><div class="col-4 skale-column fw-semibold">{$content.text_across_systems_and_teams}</div></div>

                <div class="row g-0"><div class="col-4 fw-semibold">{$content.text_technology}</div><div class="col-4 text-secondary">{$content.text_platform_first}</div><div class="col-4 skale-column fw-semibold">{$content.text_fit_for_purpose}</div></div>

                <div class="row g-0"><div class="col-4 fw-semibold">{$content.text_success}</div><div class="col-4 text-secondary">{$content.text_launch_completed}</div><div class="col-4 skale-column fw-semibold">{$content.text_measurable_improvement}</div></div>
            </div>
        </div>
    </section>

    <section class="section-padding-sm">
        <div class="container">
            <div class="row text-center rounded-skale border overflow-hidden mx-0">
                <div class="col-lg-3 metric"><div class="metric-number">{$content.text_20}</div><div class="text-secondary mt-2">{$content.text_years_of_experience}</div></div>

                <div class="col-lg-3 metric"><div class="metric-number">{$content.text_4}</div><div class="text-secondary mt-2">{$content.text_connected_solution_pillars}</div></div>

                <div class="col-lg-3 metric"><div class="metric-number">{$content.text_1}</div><div class="text-secondary mt-2">{$content.text_partner_across_the_journey}</div></div>

                <div class="col-lg-3 metric"><div class="metric-number">{$content.text_custom}</div><div class="text-secondary mt-2">{$content.text_every_engagement}</div></div>
            </div>
        </div>
    </section>

    <section id="resources" class="section-padding bg-light">
        <div class="container">
            <div class="d-flex flex-column flex-lg-row justify-content-between align-items-lg-end gap-3 mb-5">
                <div>
                    <div class="eyebrow text-success mb-3">
                        <span class="eyebrow-dot"></span>
                        {$content.text_keep_exploring}
                    </div>

                    <h2 class="display-6 fw-bold mb-0">{$content.text_learn_how_businesses_scale_smarter}</h2>
                </div>

                <a class="mbtn text-link" href="{$smarty.ENV.SITE_URL}blog">{$content.text_view_all_insights} <i class="bi bi-arrow-right"></i></a>
            </div>

            <div class="row g-4">
                {foreach from=$data.blogList item=blog key=k}
                    <div class="col-lg-4">
                        <article class="resource-card">
                            <div class="resource-art">
                                <img src="{$smarty.ENV.IMG_ROOT}{$blog->image}" class="card-img-top blog-image" alt="{$blog->title}">
                            </div>

                            <div class="p-4">
                                <span class="small text-uppercase fw-bold text-success letter-spacing">{$blog->category}</span>
                                <h3 class="h4 fw-bold mt-2">{$blog->title}</h3>
                                <p class="text-secondary">{$blog->shortText|truncate:100}</p>
                                <a aria-label="{$content.aria_label_service_list_blog} {$blog->title}" class="mbtn text-link stretched-link" href="{$smarty.ENV.SITE_URL}blog/{$blog->datePosted|date_format:"%Y-%m-%d"}/{$blog->url}">{$content.text_read_the_article} <i class="bi bi-arrow-right"></i></a>
                            </div>
                        </article>
                    </div>
                {/foreach}
            </div>
        </div>
    </section>

    <section id="contact" class="section-padding">
        <div class="container">
            <div class="cta-panel p-4 p-md-5 p-xl-6">
                <div class="row g-5 align-items-start">
                    <div class="col-lg-6">
                        <div class="eyebrow mb-3"><span class="eyebrow-dot"></span>{$content.text_free_consultation}</div>
                        <h2 class="display-5 fw-bold text-white">{$content.text_ready_to_build_systems_that_actually}</h2>
                        <p class="lead text-white-50">{$content.text_tell_us_what_is_getting_in}</p>
                        <div class="d-flex flex-column gap-3 mt-4">
                            <div><i class="bi bi-check-circle-fill text-success me-2"></i>{$content.text_no_pressure_discovery_conversation}</div>
                            <div><i class="bi bi-check-circle-fill text-success me-2"></i>{$content.text_clear_next_step_recommendations}</div>
                            <div><i class="bi bi-check-circle-fill text-success me-2"></i>{$content.text_direct_conversation_with_an_experienced_technical}</div>
                        </div>

                        <div class="mt-5">
                            <div class="small text-white-50 text-uppercase letter-spacing mb-1">{$content.text_prefer_email}</div>
                            <a class="h5 text-white text-decoration-none" href="mailto:{$smarty.ENV.SITE_EMAIL}">{$smarty.ENV.SITE_EMAIL}</a>
                        </div>
                    </div>

                    <div class="col-lg-6">
                        <form class="contact-form bg-white text-dark rounded-skale p-4 p-md-5 ajaxForm" action="{$smarty.ENV.SITE_URL}contact-form" method="post">
                            <input type="hidden" name="form_type" value="service-consultation">
                            <h3 class="h4 fw-bold mb-1">{$content.text_start_the_conversation}</h3>
                            <p class="text-secondary mb-4">{$content.text_share_a_few_details_and_we}</p>
                            <div class="row g-3">
                                <div class="col-md-6"><label class="form-label fw-semibold" for="name">{$content.text_name}</label><input class="form-control" id="name" name="name" type="text" autocomplete="name" required></div>
                                <div class="col-md-6"><label class="form-label fw-semibold" for="email">{$content.text_email}</label><input class="form-control" id="email" name="email" type="email" autocomplete="email" required></div>
                                <div class="col-12"><label class="form-label fw-semibold" for="company">{$content.text_company}</label><input class="form-control" id="company" name="company" type="text" autocomplete="organization"></div>
                                <div class="col-12"><label class="form-label fw-semibold" for="interest">{$content.text_what_would_you_like_to_improve}</label><select class="form-select" id="interest" name="interest" required><option value="" selected disabled>{$content.text_select_the_closest_option}</option><option>{$content.text_generate_more_leads_2}</option><option>{$content.text_improve_my_website}</option><option>{$content.text_automate_repetitive_work}</option><option>{$content.text_connect_business_systems}</option><option>{$content.text_improve_marketing_performance}</option><option>{$content.text_create_a_growth_strategy}</option><option>{$content.text_not_sure_yet}</option></select></div>
                                <div class="col-12"><label class="form-label fw-semibold" for="message">{$content.text_what_is_happening_now}</label><textarea class="form-control" id="comment" name="comment" placeholder="{$content.placeholder_briefly_describe_the_challenge_what_you}"></textarea></div>
                                <div class="col-12"><button class="btn btn-skale btn-lg w-100" type="submit">{$content.text_request_my_free_consultation} <i class="bi bi-arrow-right ms-1"></i></button></div>
                                <div class="col-12"><p class="small text-secondary text-center mb-0">{$content.text_your_information_stays_private_no_spam}</p></div>
                            </div>
                            {include file="inc/layout/cloudflare-turnstile.tpl"}
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<a class="mbtn btn btn-skale sticky-cta d-lg-none" href="{$smarty.ENV.SITE_URL}{$smarty.ENV.URL_CONTACT}"><i class="bi bi-chat-dots me-2"></i>{$content.text_free_consultation_2}</a>

{include file="inc/layout/footer.tpl"}
