{include file="inc/layout/header.tpl"}

{* <!doctype html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">

<title>Websites, Automation & Business Systems That Work Better | Skale</title>

<meta name="description"
content="Skale helps growing businesses fix websites that don't convert, automate manual work, connect disconnected systems, build custom software, and improve marketing and reporting.">

<link
href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css"
rel="stylesheet">

<link
href="https://unpkg.com/aos@2.3.1/dist/aos.css"
rel="stylesheet"> *}

{* <style>

</style>
</head>

<body>

<!-- =========================================================
NAVIGATION
========================================================= -->
<nav class="navbar navbar-expand-lg navbar-dark site-nav sticky-top">
<div class="container">
<a class="navbar-brand" href="/">skale.</a>

<button
class="navbar-toggler"
type="button"
data-bs-toggle="collapse"
data-bs-target="#mainNavigation"
aria-controls="mainNavigation"
aria-expanded="false"
aria-label="Toggle navigation">
<span class="navbar-toggler-icon"></span>
</button>

<div class="collapse navbar-collapse" id="mainNavigation">
<ul class="navbar-nav ms-auto align-items-lg-center gap-lg-2">
<li class="nav-item">
<a class="nav-link" href="#problems">Problems We Solve</a>
</li>

<li class="nav-item">
<a class="nav-link" href="#services">How We Help</a>
</li>

<li class="nav-item">
<a class="nav-link" href="#experience">Our Work</a>
</li>

<li class="nav-item">
<a class="nav-link" href="/about">About</a>
</li>

<li class="nav-item ms-lg-2">
<a class="btn btn-skale"
href="#assessment">
Tell Me What's Not Working
</a>
</li>
</ul>
</div>
</div>
</nav> *}

<link rel="stylesheet" href="{$smarty.ENV.WEB_ROOT}css/home.min.css" data-ajax-managed-stylesheet="true">

<!-- =========================================================
HERO
========================================================= -->
<header class="hero">
    <div class="container">
        <div class="row align-items-center">
            <div class="col-xl-10">
                <div class="hero-eyebrow" data-aos="fade-up">
                {$content.text_websites_automation_software_systems}
            </div>

            <h1 class="text-white" data-aos="fade-up" data-aos-delay="75">
                {$content.text_fix_the_technology_problems_slowing_down_your}
                <span class="text-gradient">{$content.text_fix_the_technology_problems_slowing_down_your_gradient}</span>
            </h1>

        <p class="hero-copy"
        data-aos="fade-up"
        data-aos-delay="150">
        {$content.text_skale_helps_growing_businesses_fix_websites_that}
    </p>

    <div class="hero-problems"
    data-aos="fade-up"
    data-aos-delay="225">

    <span class="hero-problem">
        {$content.text_disconnected_systems}
    </span>

    <span class="hero-problem">
        {$content.text_manual_processes}
    </span>

    <span class="hero-problem">
        {$content.text_websites_that_dont_convert}
    </span>
</div>

<div class="hero-actions d-flex flex-wrap gap-3 mt-4"
data-aos="fade-up"
data-aos-delay="300">

<a class="btn-skale"
href="#assessment">
{$content.text_tell_me_whats_not_working}
</a>

<a class="btn-skale-outline"
href="#problems">
{$content.text_see_problems_we_solve}
</a>
</div>

<div class="hero-trust row g-4"
data-aos="fade-up"
data-aos-delay="375">

<div class="col-sm-4 hero-trust-item">
    <strong>{$content.text_20_years}</strong>
    <span>{$content.text_engineering_technology_experience}</span>
</div>

<div class="col-sm-4 hero-trust-item">
    <strong>{$content.text_founder_led}</strong>
    <span>{$content.text_work_directly_with_senior_expertise}</span>
</div>

<div class="col-sm-4 hero-trust-item">
    <strong>{$content.text_business_first}</strong>
    <span>{$content.text_solve_the_problem_before_choosing_the_tool}</span>
</div>

</div>

</div>
</div>
</div>
</header>


<main>

    <!-- =========================================================
    PROBLEMS
    ========================================================= -->
    <section id="problems"
    class="problem-section section-space">

    <div class="container">

        <div class="section-eyebrow"
        data-aos="fade-up">
        {$content.text_start_with_the_problem}
    </div>

    <h2 class="section-title"
    data-aos="fade-up">
    {$content.text_you_dont_need_to_know_which_service}
</h2>

<p class="section-intro mt-3"
data-aos="fade-up">
{$content.text_most_businesses_dont_have_a_technology_problem}
</p>

<div class="row g-4 mt-4">

    <!-- CONVERSION -->
    <div class="col-md-6 col-xl-3"
    data-aos="fade-up">

    <article class="problem-card">
        <div class="problem-number">
            {$content.text_01_conversion}
        </div>

        <h3>{$content.text_youre_getting_traffic_but_not_enough_leads}</h3>

        <p>
            {$content.text_visitors_reach_your_website_but_leave_without}
        </p>

        <a href="/website-development"
        class="problem-link">
        {$content.text_fix_website_conversion}
    </a>
</article>
</div>

<!-- MANUAL WORK -->
<div class="col-md-6 col-xl-3"
data-aos="fade-up"
data-aos-delay="75">

<article class="problem-card">
    <div class="problem-number">
        {$content.text_02_efficiency}
    </div>

    <h3>{$content.text_your_team_is_doing_work_that_should}</h3>

    <p>
        {$content.text_employees_copy_data_update_spreadsheets_send_routine}
    </p>

    <a href="/solutions/automation-and-software/"
    class="problem-link">
    {$content.text_reduce_manual_work}
</a>
</article>
</div>

<!-- DISCONNECTED -->
<div class="col-md-6 col-xl-3"
data-aos="fade-up"
data-aos-delay="150">

<article class="problem-card">
    <div class="problem-number">
        {$content.text_03_systems}
    </div>

    <h3>{$content.text_your_systems_dont_talk_to_each_other}</h3>

    <p>
        {$content.text_leads_customer_information_reporting_email_spreadsheets_and}
    </p>

    <a href="/solutions/automation-and-software/"
    class="problem-link">
    {$content.text_connect_your_systems}
</a>
</article>
</div>

<!-- SCALE -->
<div class="col-md-6 col-xl-3"
data-aos="fade-up"
data-aos-delay="225">

<article class="problem-card">
    <div class="problem-number">
        {$content.text_04_scale}
    </div>

    <h3>{$content.text_the_systems_that_used_to_work_are}</h3>

    <p>
        {$content.text_more_customers_employees_data_and_activity_are}
    </p>

    <a href="#assessment"
    class="problem-link">
    {$content.text_find_the_bottleneck}
</a>
</article>
</div>

</div>

<div class="text-center mt-5"
data-aos="fade-up">
<a href="#assessment"
class="btn-skale">
{$content.text_tell_me_whats_not_working_2}
</a>
</div>

</div>
</section>


<!-- =========================================================
EVIDENCE / SELECTED WORK
========================================================= -->
<section id="experience"
class="proof-section section-space">

<div class="container">

    <div class="section-eyebrow text-info"
    data-aos="fade-up">
    {$content.text_selected_work_results}
</div>

<div class="row align-items-end g-4">

    <div class="col-lg-8">
        <h2 class="section-title text-white"
        data-aos="fade-up">
        {$content.text_experience_solving_the_kinds_of_problems_skale}
    </h2>

    <p class="section-intro mt-3"
    data-aos="fade-up">
    {$content.text_skale_is_a_newer_company_but_the}
</p>
</div>

</div>

<div class="row g-4 mt-4">

    <!-- CASE STUDY 1 -->
    <div class="col-lg-4"
    data-aos="fade-up">

    <article class="proof-card">

        <div class="proof-stat">
            {$content.text_weeks_hours}
        </div>

        <h3 class="text-white">
            {$content.text_automated_a_complex_customer_onboarding_workflow}
        </h3>

        <p>
            {$content.text_replaced_a_multi_team_manually_coordinated_data}
        </p>

        <p class="mb-0 fw-semibold text-white">
            {$content.text_automation_integration_data}
        </p>

    </article>
</div>

<!-- CASE STUDY 2 -->
<div class="col-lg-4"
data-aos="fade-up"
data-aos-delay="100">

<article class="proof-card">

    <div class="proof-stat">
        {$content.text_70k_1m}
    </div>

    <h3 class="text-white">
        {$content.text_helped_scale_a_large_product_data_platform}
    </h3>

    <p>
        {$content.text_modernized_the_systems_behind_a_growing_data}
    </p>

    <p class="mb-0 fw-semibold text-white">
        {$content.text_software_architecture_scale}
    </p>

</article>
</div>

<!-- CASE STUDY 3 -->
<div class="col-lg-4"
data-aos="fade-up"
data-aos-delay="200">

<article class="proof-card">

    <div class="proof-stat">
        {$content.text_40_faster}
    </div>

    <h3 class="text-white">
        {$content.text_improved_application_performance_and_efficiency}
    </h3>

    <p>
        {$content.text_identified_application_and_workflow_bottlenecks_improved_platform}
    </p>

    <p class="mb-0 fw-semibold text-white">
        {$content.text_performance_software_optimization}
    </p>

</article>
</div>

</div>

<p class="proof-disclosure mt-4 mb-0"
data-aos="fade-up">
{$content.text_selected_results_reflect_work_completed_by_skale}
</p>

</div>
</section>


<!-- =========================================================
SERVICES
========================================================= -->
<section id="services"
class="services-section section-space">

<div class="container">

    <div class="row align-items-end g-4">

        <div class="col-lg-8">

            <div class="section-eyebrow"
            data-aos="fade-up">
            {$content.text_how_skale_can_help}
        </div>

        <h2 class="section-title"
        data-aos="fade-up">
        {$content.text_practical_help_across_the_technology_behind_your}
    </h2>

    <p class="section-intro mt-3"
    data-aos="fade-up">
    {$content.text_start_with_one_problem_or_connect_several}
</p>

</div>

</div>

<div class="row g-4 mt-4">

    <!-- WEBSITES -->
    <div class="col-lg-6"
    data-aos="fade-up">

    <article class="service-group">
        <div class="service-group-body">

            <div class="service-icon">{$content.text_01}</div>

            <h3>{$content.text_websites_conversion}</h3>

            <p>
                {$content.text_make_your_website_easier_to_understand_easier}
            </p>

            <ul class="service-list">

                <li>
                    <a href="/website-development">
                        {$content.text_website_design_development}
                    </a>
                </li>

                <li>
                    <a href="/website-development">
                        {$content.text_wordpress_development}
                    </a>
                </li>

                <li>
                    <a href="/website-rescue">
                        {$content.text_website_rescue}
                    </a>
                </li>

                <li>
                    <a href="/website-development">
                        {$content.text_landing_pages}
                    </a>
                </li>

                <li>
                    <a href="/website-development">
                        {$content.text_conversion_optimization}
                    </a>
                </li>

            </ul>

        </div>
    </article>
</div>


<!-- AUTOMATION -->
<div class="col-lg-6"
data-aos="fade-up"
data-aos-delay="100">

<article class="service-group">
    <div class="service-group-body">

        <div class="service-icon">{$content.text_02}</div>

        <h3>{$content.text_automation_crm_integrations}</h3>

        <p>
            {$content.text_reduce_repetitive_work_and_make_information_move}
        </p>

        <ul class="service-list">

            <li>
                <a href="/solutions/automation-and-software/">
                    {$content.text_workflow_automation}
                </a>
            </li>

            <li>
                <a href="/solutions/automation-and-software/">
                    {$content.text_system_integrations}
                </a>
            </li>

            <li>
                <a href="/solutions/automation-and-software/">
                    {$content.text_crm_solutions}
                </a>
            </li>

            <li>
                <a href="/solutions/automation-and-software/">
                    {$content.text_marketing_automation}
                </a>
            </li>

            <li>
                <a href="/solutions/automation-and-software/">
                    {$content.text_data_synchronization}
                </a>
            </li>

        </ul>

    </div>
</article>
</div>


<!-- SOFTWARE -->
<div class="col-lg-6"
data-aos="fade-up">

<article class="service-group">
    <div class="service-group-body">

        <div class="service-icon">{$content.text_03}</div>

        <h3>{$content.text_software_business_systems}</h3>

        <p>
            {$content.text_build_or_modernize_the_software_your_business}
        </p>

        <ul class="service-list">

            <li>
                <a href="/solutions/automation-and-software/">
                    {$content.text_custom_software_development}
                </a>
            </li>

            <li>
                <a href="/solutions/automation-and-software/">
                    {$content.text_internal_business_tools}
                </a>
            </li>

            <li>
                <a href="/solutions/automation-and-software/">
                    {$content.text_customer_partner_portals}
                </a>
            </li>

            <li>
                <a href="/solutions/automation-and-software/">
                    {$content.text_software_modernization}
                </a>
            </li>

            <li>
                <a href="/solutions/automation-and-software/">
                    {$content.text_it_technology_solutions}
                </a>
            </li>

        </ul>

    </div>
</article>
</div>


<!-- MARKETING -->
<div class="col-lg-6"
data-aos="fade-up"
data-aos-delay="100">

<article class="service-group">
    <div class="service-group-body">

        <div class="service-icon">{$content.text_04}</div>

        <h3>{$content.text_marketing_analytics_growth}</h3>

        <p>
            {$content.text_understand_where_opportunities_come_from_improve_the}
        </p>

        <ul class="service-list">

            <li>
                <a href="/services/marketing/">
                    {$content.text_online_marketing}
                </a>
            </li>

            <li>
                <a href="/solutions/demand-generation/">
                    {$content.text_seo}
                </a>
            </li>

            <li>
                <a href="/solutions/demand-generation/">
                    {$content.text_ppc_paid_advertising}
                </a>
            </li>

            <li>
                <a href="/solutions/demand-generation/">
                    {$content.text_email_marketing}
                </a>
            </li>

            <li>
                <a href="/solutions/demand-generation/">
                    {$content.text_marketing_analytics}
                </a>
            </li>

            <li>
                <a href="/solutions/strategy-and-optimization/">
                    {$content.text_analytics_reporting}
                </a>
            </li>

            <li>
                <a href="/solutions/strategy-and-optimization/">
                    {$content.text_strategy_optimization}
                </a>
            </li>

        </ul>

    </div>
</article>
</div>

</div>


<div class="mt-5 p-4 p-lg-5 bg-white border rounded-4"
data-aos="fade-up">

<div class="row align-items-center g-4">

    <div class="col-lg-8">
        <h3 class="fw-bold mb-2">
            {$content.text_not_sure_where_your_problem_belongs}
        </h3>

        <p class="text-secondary mb-0">
            {$content.text_thats_normal_a_lead_generation_problem_might}
        </p>
    </div>

    <div class="col-lg-4 text-lg-end">
        <a href="#assessment"
        class="btn-skale">
        {$content.text_tell_me_whats_not_working_3}
    </a>
</div>

</div>
</div>

</div>
</section>


<!-- =========================================================
CONNECTED SYSTEM APPROACH
========================================================= -->
<section class="section-space">

    <div class="container text-center">

        <div class="section-eyebrow justify-content-center"
        data-aos="fade-up">
        {$content.text_the_skale_approach}
    </div>

    <h2 class="section-title mx-auto"
    data-aos="fade-up">
    {$content.text_fix_the_whole_journey_not_just_one}
</h2>

<p class="section-intro mx-auto mt-3"
data-aos="fade-up">
{$content.text_a_website_can_generate_traffic_and_still}
</p>

<div class="system-flow"
data-aos="fade-up">

<div class="system-step">{$content.text_marketing}</div>
<div class="system-step">{$content.text_website}</div>
<div class="system-step">{$content.text_crm}</div>
<div class="system-step">{$content.text_automation}</div>
<div class="system-step">{$content.text_reporting}</div>
<div class="system-step">{$content.text_growth}</div>

</div>

</div>
</section>


<!-- =========================================================
TECHNOLOGY / COMPETENCY
========================================================= -->
<section class="technology-section section-space-sm">

    <div class="container">

        <div class="row align-items-center g-4">

            <div class="col-lg-4"
            data-aos="fade-right">

            <div class="section-eyebrow">
                {$content.text_technical_depth}
            </div>

            <h2 class="h3 fw-bold">
                {$content.text_experienced_across_the_systems_behind_modern_businesses}
            </h2>

            <p class="text-secondary mb-lg-0">
                {$content.text_technology_is_selected_based_on_the_problem}
            </p>

        </div>

        <div class="col-lg-8"
        data-aos="fade-left">

        <div class="d-flex flex-wrap gap-2">

            <span class="tech-badge">{$content.text_wordpress}</span>
            <span class="tech-badge">{$content.text_react}</span>
            <span class="tech-badge">{$content.text_node_js}</span>
            <span class="tech-badge">{$content.text_php}</span>
            <span class="tech-badge">{$content.text_rest_apis}</span>
            <span class="tech-badge">{$content.text_mysql}</span>
            <span class="tech-badge">{$content.text_google_cloud}</span>
            <span class="tech-badge">{$content.text_aws}</span>
            <span class="tech-badge">{$content.text_azure}</span>
            <span class="tech-badge">{$content.text_crm_integrations}</span>
            <span class="tech-badge">{$content.text_marketing_platforms}</span>
            <span class="tech-badge">{$content.text_analytics}</span>

        </div>

    </div>

</div>

</div>
</section>


<!-- =========================================================
WHO SKALE IS FOR
========================================================= -->
<section class="section-space">

    <div class="container">

        <div class="row g-5 align-items-start">

            <div class="col-lg-5"
            data-aos="fade-right">

            <div class="section-eyebrow">
                {$content.text_who_skale_is_for}
            </div>

            <h2 class="section-title">
                {$content.text_a_strong_fit_when_growing_starts_creating}
            </h2>

            <p class="section-intro mt-3">
                {$content.text_skale_works_best_with_businesses_that_have}
            </p>

            <a href="#assessment"
            class="btn-skale mt-3">
            {$content.text_tell_me_whats_not_working_4}
        </a>

    </div>

    <div class="col-lg-7">

        <div class="row g-3">

            <div class="col-md-6"
            data-aos="fade-up">

            <div class="fit-card">
                <h3>{$content.text_growing_small_and_midsize_businesses}</h3>

                <p>
                    {$content.text_your_company_has_real_customers_and_momentum}
                </p>
            </div>

        </div>

        <div class="col-md-6"
        data-aos="fade-up"
        data-aos-delay="75">

        <div class="fit-card">
            <h3>{$content.text_teams_relying_on_manual_processes}</h3>

            <p>
                {$content.text_spreadsheets_emails_duplicate_entry_and_repetitive_administrative}
            </p>
        </div>

    </div>

    <div class="col-md-6"
    data-aos="fade-up"
    data-aos-delay="150">

    <div class="fit-card">
        <h3>{$content.text_businesses_with_disconnected_tools}</h3>

        <p>
            {$content.text_your_website_crm_marketing_operations_and_reporting}
        </p>
    </div>

</div>

<div class="col-md-6"
data-aos="fade-up"
data-aos-delay="225">

<div class="fit-card">
    <h3>{$content.text_businesses_facing_an_unclear_technology_problem}</h3>

    <p>
        {$content.text_you_know_something_is_inefficient_or_limiting}
    </p>
</div>

</div>

</div>

</div>

</div>

</div>
</section>


<!-- =========================================================
PROCESS
========================================================= -->
<section class="section-space services-section">

    <div class="container">

        <div class="section-eyebrow"
        data-aos="fade-up">
        {$content.text_how_it_works}
    </div>

    <h2 class="section-title"
    data-aos="fade-up">
    {$content.text_start_with_the_business_problem_technology_comes}
</h2>

<div class="row g-5 mt-3">

    <div class="col-md-4"
    data-aos="fade-up">

    <div class="process-number">{$content.text_1}</div>

    <h3 class="h5 fw-bold">
        {$content.text_find_the_friction}
    </h3>

    <p class="text-secondary">
        {$content.text_understand_whats_happening_today_where_time_or}
    </p>

</div>

<div class="col-md-4"
data-aos="fade-up"
data-aos-delay="100">

<div class="process-number">{$content.text_2}</div>

<h3 class="h5 fw-bold">
    {$content.text_identify_the_highest_impact_fix}
</h3>

<p class="text-secondary">
    {$content.text_determine_what_will_create_the_most_meaningful}
</p>

</div>

<div class="col-md-4"
data-aos="fade-up"
data-aos-delay="200">

<div class="process-number">{$content.text_3}</div>

<h3 class="h5 fw-bold">
    {$content.text_build_connect_and_improve}
</h3>

<p class="text-secondary">
    {$content.text_implement_the_solution_measure_whether_its_working}
</p>

</div>

</div>

</div>
</section>


<!-- =========================================================
FOUNDER / TRUST
========================================================= -->
<section class="section-space">

    <div class="container">

        <div class="row align-items-center g-5">

            <div class="col-lg-7"
            data-aos="fade-right">

            <div class="section-eyebrow">
                {$content.text_founder_led_2}
            </div>

            <h2 class="section-title">
                {$content.text_skale_is_new_the_experience_behind_it}
            </h2>

            <p class="section-intro mt-3">
                {$content.text_im_joe_brown_founder_of_skale_ive}
            </p>

            <p class="text-secondary">
                {$content.text_i_created_skale_to_bring_that_experience}
            </p>

            <p class="text-secondary">
                {$content.text_youll_work_directly_with_someone_who_can}
            </p>

            <a href="/about"
            class="fw-bold text-dark">
            {$content.text_learn_more_about_joe_and_skale}
        </a>

    </div>

    <div class="col-lg-5"
    data-aos="fade-left">

    <div class="p-4 p-lg-5 rounded-4 bg-light border">

        <div class="mb-4">
            <strong class="d-block fs-4">
                {$content.text_senior_level_experience}
            </strong>

            <span class="text-secondary">
                {$content.text_applied_directly_to_your_project}
            </span>
        </div>

        <div class="mb-4">
            <strong class="d-block fs-4">
                {$content.text_direct_communication}
            </strong>

            <span class="text-secondary">
                {$content.text_no_layers_of_account_managers_between_you}
            </span>
        </div>

        <div>
            <strong class="d-block fs-4">
                {$content.text_no_predetermined_solution}
            </strong>

            <span class="text-secondary">
                {$content.text_fix_whats_actually_causing_the_problem}
            </span>
        </div>

    </div>

</div>

</div>

</div>
</section>


<!-- =========================================================
INSIGHTS / GIVE VALUE BEFORE ASK
========================================================= -->
<section class="section-space services-section">

    <div class="container">

        <div class="section-eyebrow"
        data-aos="fade-up">
        {$content.text_practical_insights}
    </div>

    <h2 class="section-title"
    data-aos="fade-up">
    {$content.text_see_how_skale_approaches_common_business_problems}
</h2>

<p class="section-intro mt-3"
data-aos="fade-up">
{$content.text_not_ready_to_contact_anyone_yet_start}
</p>

<div class="row g-4 mt-4">

    <div class="col-lg-4"
    data-aos="fade-up">

    <article class="insight-card">

        <div class="small fw-bold text-uppercase text-secondary mb-2">
            {$content.text_websites_conversion_2}
        </div>

        <h3>
            {$content.text_why_your_website_gets_traffic_but_no}
        </h3>

        <p class="text-secondary">
            {$content.text_see_the_problems_that_can_stop_website}
        </p>

        <a href="/blog/2026-07-24/why-your-website-gets-traffic-but-no-leads"
        class="fw-bold text-dark">
        {$content.text_read_the_article}
    </a>

</article>
</div>


<div class="col-lg-4"
data-aos="fade-up"
data-aos-delay="100">

<article class="insight-card">

    <div class="small fw-bold text-uppercase text-secondary mb-2">
        {$content.text_systems_integration}
    </div>

    <h3>
        {$content.text_the_hidden_cost_of_disconnected_business_systems}
    </h3>

    <p class="text-secondary">
        {$content.text_see_how_disconnected_crms_email_platforms_websites}
    </p>

    <a href="/blog/2026-08-24/the-hidden-cost-of-disconnected-business-systems"
    class="fw-bold text-dark">
    {$content.text_read_the_article_2}
</a>

</article>
</div>


<div class="col-lg-4"
data-aos="fade-up"
data-aos-delay="200">

<article class="insight-card">

    <div class="small fw-bold text-uppercase text-secondary mb-2">
        {$content.text_automation_2}
    </div>

    <h3>
        {$content.text_stop_paying_employees_to_do_robot_work}
    </h3>

    <p class="text-secondary">
        {$content.text_identify_repetitive_work_that_may_be_costing}
    </p>

    <a href="/blog/2026-06-26/stop-paying-employees-to-do-robot-work"
    class="fw-bold text-dark">
    {$content.text_read_the_article_3}
</a>

</article>
</div>

</div>

</div>
</section>


<!-- =========================================================
LOW-FRICTION CTA
========================================================= -->
<section id="assessment"
class="cta-section section-space">

<div class="container">

    <div class="row g-5 align-items-center">

        <div class="col-lg-6"
        data-aos="fade-right">

        <div class="section-eyebrow text-info">
            {$content.text_a_better_first_step}
        </div>

        <h2 class="section-title text-white">
            {$content.text_tell_me_whats_not_working_5}
        </h2>

        <p class="section-intro mt-3">
            {$content.text_you_dont_need_a_project_plan_technical}
        </p>

        <p class="text-white fs-5">
            {$content.text_send_a_short_description_of_the_problem}
        </p>

        <div class="mt-4">

            <div class="d-flex gap-3 mb-3">
                <span class="text-info fw-bold">{$content.text_text}</span>
                <span>{$content.text_no_obligation_to_schedule_a_call}</span>
            </div>

            <div class="d-flex gap-3 mb-3">
                <span class="text-info fw-bold">{$content.text_text_2}</span>
                <span>{$content.text_no_generic_sales_pitch}</span>
            </div>

            <div class="d-flex gap-3 mb-3">
                <span class="text-info fw-bold">{$content.text_text_3}</span>
                <span>{$content.text_you_dont_need_to_diagnose_the_solution}</span>
            </div>

            <div class="d-flex gap-3">
                <span class="text-info fw-bold">{$content.text_text_4}</span>
                <span>{$content.text_direct_response_from_skales_founder}</span>
            </div>

        </div>

    </div>


    <div class="col-lg-6"
    data-aos="fade-left">

    <div class="assessment-card">

        <div class="small fw-bold text-uppercase text-secondary mb-2">
            {$content.text_free_quick_assessment}
        </div>

        <h3 class="fw-bold mb-2">
            {$content.text_whats_getting_in_your_way}
        </h3>

        <p class="text-secondary">
            {$content.text_a_few_sentences_are_enough}
        </p>


        <!-- Replace action with your existing form endpoint -->
        <form action="/contact"
        method="post">

        <div class="row g-3">

            <div class="col-md-6">

                <label for="name"
                class="form-label">
                {$content.text_name}
            </label>

            <input
            id="name"
            name="name"
            type="text"
            class="form-control"
            autocomplete="name"
            required>

        </div>

        <div class="col-md-6">

            <label for="email"
            class="form-label">
            {$content.text_email}
        </label>

        <input
        id="email"
        name="email"
        type="email"
        class="form-control"
        autocomplete="email"
        required>

    </div>

    <div class="col-12">

        <label for="website"
        class="form-label">
        {$content.text_website_2}
        <span class="fw-normal text-secondary">
            {$content.text_optional}
        </span>
    </label>

    <input
    id="website"
    name="website"
    type="url"
    class="form-control"
    placeholder="{$content.text_https}">

</div>

<div class="col-12">

    <label for="problem"
    class="form-label">
    {$content.text_whats_not_working}
</label>

<textarea
id="problem"
name="problem"
class="form-control"
placeholder="{$content.text_example_were_getting_website_traffic_but_almost}"
required></textarea>

</div>

<div class="col-12">

    <button type="submit"
    class="btn-skale border-0 w-100">
    {$content.text_tell_me_whats_not_working_6}
</button>

</div>

</div>

</form>

<p class="privacy-copy mt-3 mb-0">
    {$content.text_no_spam_no_aggressive_sales_follow_up}
</p>

</div>

</div>

</div>

</div>
</section>

</main>

{include file="inc/layout/footer.tpl"}


<!-- =========================================================
FOOTER
========================================================= -->
{* <footer>
<div class="container">

<div class="row g-4">

<div class="col-lg-5">

<a href="/"
class="navbar-brand d-inline-block mb-3">
skale.
</a>

<p class="mb-0">
Websites, software, automation, systems, marketing,
and analytics built to help growing businesses work
better.
</p>

</div>

<div class="col-6 col-lg-2 offset-lg-1">

<div class="fw-bold text-white mb-3">
Explore
</div>

<div class="d-flex flex-column gap-2">
<a href="#problems">Problems We Solve</a>
<a href="#services">How We Help</a>
<a href="#experience">Selected Work</a>
<a href="/blog">Insights</a>
</div>

</div>

<div class="col-6 col-lg-2">

<div class="fw-bold text-white mb-3">
Company
</div>

<div class="d-flex flex-column gap-2">
<a href="/about">About</a>
<a href="/contact">Contact</a>
<a href="/website-rescue">Website Rescue</a>
</div>

</div>

<div class="col-lg-2">

<div class="fw-bold text-white mb-3">
Contact
</div>

<div class="d-flex flex-column gap-2">
<a href="tel:7329254044">
732-925-4044
</a>

<a href="mailto:info@skaleup.it.com">
info@skaleup.it.com
</a>
</div>

</div>

</div>

</div>
</footer> *}


{* <script
src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/js/bootstrap.bundle.min.js">
</script>

<script
src="https://unpkg.com/aos@2.3.1/dist/aos.js">
</script>

<script>
AOS.init({
duration: 650,
easing: 'ease-out-cubic',
once: true,
offset: 60
});
</script>

</body>
</html> *}
