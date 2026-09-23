{include file="inc/layout/header.tpl"}

<main class="portfolio-case-study">
    <!-- ============ HERO ============  -->
    <section class="py-5 py-lg-7 bg-dark text-white overflow-hidden hero-gradient-04">
        <div class="container py-lg-5">
            <div class="row align-items-center g-5">
                <div class="col-lg-7" data-aos="fade-right">
                    <div class="mb-3">
                        <span class="badge rounded-pill bg-light text-dark px-3 py-2">{$data.content.hero.badge}</span>
                    </div>

                    <h1 class="display-3 fw-bold mb-4 text-white">
                        {$data.content.hero.title}
                    </h1>

                    <p class="lead text-white-50 mb-4">
                        {$data.content.hero.description}
                    </p>

                    <div class="d-flex flex-wrap gap-2 mb-4">
                        {foreach from=$data.content.hero.tags item=tag}
                            <span class="badge border border-secondary text-white px-3 py-2">{$tag}</span>
                        {/foreach}
                    </div>

                    <a onclick="scrollToEl('#case-study')" class="btn btn-light btn-lg px-4">{$data.content.hero.button}</a>
                </div>

                <div class="col-lg-5" data-aos="fade-left" data-aos-delay="150">
                    <div class="bg-white text-dark rounded-4 shadow-lg p-4 p-lg-5">
                        <div class="mb-4">
                            <small class="text-uppercase text-muted fw-semibold">{$data.content.hero.panel.heading}</small>
                            <div class="fs-4 fw-bold">{$data.content.hero.panel.title}</div>
                        </div>

                        <div class="mb-4">
                            <small class="text-uppercase text-muted fw-semibold">{$data.content.hero.panel.role}</small>
                            <div class="fw-semibold">
                                {foreach from=$data.content.hero.panel.roleItems item=roleItem}
                                    {$roleItem}<br />
                                {/foreach}
                            </div>
                        </div>

                        <div>
                            <small class="text-uppercase text-muted fw-semibold">{$data.content.hero.panel.footerTitle}</small>
                            <div>{$data.content.hero.panel.footerContent}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============ IMPACT METRICS ============  -->
    <section class="py-5 bg-light border-bottom">
        <div class="container">
            <div class="row g-4 text-center">
                {foreach from=$data.content.metrics item=metric key=key}
                    <div class="col-md-4" data-aos="fade-up" data-aos-delay="{$key*100}">
                        <div class="p-4 border-md-start border-md-end">
                            <div class="display-4 fw-bold mb-2">{$metric.value}</div>
                            <p class="text-muted mb-0">{$metric.label}</p>
                        </div>
                    </div>
                {/foreach}
            </div>
        </div>
    </section>

    <!-- ============ OVERVIEW ============  -->
    <section id="case-study" class="py-5 py-lg-7">
        <div class="container py-lg-4">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div data-aos="fade-up">
                        <span class="text-uppercase fw-bold text-muted small">{$data.content.overview.heading}</span>

                        <h2 class="display-5 fw-bold mt-2 mb-4">
                            {$data.content.overview.title}
                        </h2>

                        <p class="fs-5">
                            {$data.content.overview.copy}
                        </p>

                        <p class="fs-5 text-muted">
                            {$data.content.overview.copySecondary}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============ CHALLENGE ============  -->
    <section class="py-5 py-lg-7 bg-light">
        <div class="container py-lg-4">
            <div class="row g-5 align-items-start">
                <div class="col-lg-5" data-aos="fade-right">
                    <span class="text-uppercase fw-bold text-muted small">{$data.content.challenge.heading}</span>

                    <h2 class="display-5 fw-bold mt-2">
                        {$data.content.challenge.title}
                    </h2>
                </div>

                <div class="col-lg-7" data-aos="fade-left">
                    <p class="fs-5">
                        {$data.content.challenge.copy}
                    </p>

                    <div class="row g-3 mt-3">
                        {foreach from=$data.content.challenge.points item=point}
                            <div class="col-md-6">
                                <div class="bg-white rounded-4 shadow-sm h-100 p-4">
                                    <h3 class="h5 fw-bold">{$point.title}</h3>
                                    <p class="text-muted mb-0">
                                        {$point.copy}
                                    </p>
                                </div>
                            </div>
                        {/foreach}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============ MY ROLE ============  -->
    <section class="py-5 py-lg-7">
        <div class="container py-lg-4">
            <div class="row g-5">
                <div class="col-lg-5" data-aos="fade-up">
                    <span class="text-uppercase fw-bold text-muted small">{$data.content.myRole.heading}</span>

                    <h2 class="display-5 fw-bold mt-2 mb-4">{$data.content.myRole.title}</h2>

                    <p class="fs-5 text-muted">
                        {$data.content.myRole.copy}
                    </p>
                </div>

                <div class="col-lg-7">
                    <div class="row g-4">
                        {foreach from=$data.content.myRole.cards item=card key=key}
                            <div class="col-md-6" data-aos="fade-up" data-aos-delay="{($key + 1)*50}">
                                <div class="border rounded-4 p-4 h-100">
                                    <div class="fs-2 mb-3">{$card.number}</div>
                                    <h3 class="h5 fw-bold">{$card.title}</h3>
                                    <p class="text-muted mb-0">
                                        {$card.copy}
                                    </p>
                                </div>
                            </div>
                        {/foreach}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============ SOLUTION ============  -->
    <section class="py-5 py-lg-7 bg-dark text-white">
        <div class="container py-lg-4">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-lg-8" data-aos="fade-up">
                    <span class="text-uppercase text-white-50 fw-bold small">{$data.content.solution.heading}</span>

                    <h2 class="display-5 fw-bold mt-2 text-white">{$data.content.solution.title}</h2>

                    <p class="lead text-white-50">
                        {$data.content.solution.copy}
                    </p>
                </div>
            </div>

            <div class="row g-4">
                {foreach from=$data.content.solution.cards item=card key=key}
                    <div class="col-md-6 col-lg-4" data-aos="zoom-in" data-aos-delay="{$key*75}">
                        <div class="border border-secondary rounded-4 p-4 h-100">
                            <h3 class="h5 fw-bold">{$card.header}</h3>
                            <p class="text-white-50 mb-0">
                                {$card.copy}
                            </p>
                        </div>
                    </div>
                {/foreach}
            </div>
        </div>
    </section>

    <!-- ============ ARCHITECTURE / VISUAL PLACEHOLDER ============  -->
    <section class="py-5 py-lg-7">
        <div class="container py-lg-4">
            <div class="row align-items-center g-5">
                <div class="col-lg-5" data-aos="fade-right">
                    <span class="text-uppercase fw-bold text-muted small">{$data.content.architecture.heading}</span>

                    <h2 class="display-5 fw-bold mt-2 mb-4">{$data.content.architecture.title}</h2>

                    <p class="fs-5 text-muted">
                        {$data.content.architecture.copy}
                    </p>
                </div>

                <div class="col-lg-7" data-aos="fade-left">
                    <!-- Replace with an architecture diagram, product screenshot or custom graphic -->

                    <div class="bg-light border rounded-4 p-4 p-lg-5">
                        <div class="text-center fw-bold mb-4">{$data.content.architecture.panel.header}</div>

                        <div class="row g-3 text-center">
                            {foreach from=$data.content.architecture.panel.items item=item}
                                <div class="col-md-4">
                                    <div class="bg-white border rounded-3 p-3">{$item}</div>
                                </div>
                            {/foreach}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============ SCALE ============  -->
    <section class="py-5 py-lg-7 bg-light">
        <div class="container py-lg-4">
            <div class="row justify-content-center">
                <div class="col-lg-9 text-center" data-aos="fade-up">
                    <span class="text-uppercase fw-bold text-muted small">{$data.content.scale.heading}</span>

                    <h2 class="display-4 fw-bold mt-2 mb-4">
                        {$data.content.scale.title}
                    </h2>

                    <p class="lead text-muted">
                        {$data.content.scale.copy}
                    </p>
                </div>
            </div>

            <div class="row align-items-center mt-5">
                <div class="col-5 text-end" data-aos="fade-right">
                    <div class="display-5 fw-bold">{$data.content.scale.from}</div>
                    <div class="text-muted">{$data.content.scale.fromTitle}</div>
                </div>

                <div class="col-2 text-center">
                    <div class="fs-2">→</div>
                </div>

                <div class="col-5" data-aos="fade-left">
                    <div class="display-5 fw-bold">{$data.content.scale.to}</div>
                    <div class="text-muted">{$data.content.scale.toTitle}</div>
                </div>
            </div>
        </div>
    </section>

    <!-- ============ BUSINESS IMPACT ============  -->
    <section class="py-5 py-lg-7">
        <div class="container py-lg-4">
            <div class="row justify-content-center mb-5">
                <div class="col-lg-8 text-center" data-aos="fade-up">
                    <span class="text-uppercase fw-bold text-muted small">{$data.content.impact.header}</span>

                    <h2 class="display-5 fw-bold mt-2">
                        {$data.content.impact.title}
                    </h2>
                </div>
            </div>

            <div class="row g-4">
                {foreach from=$data.content.impact.cards item=card key=key}
                    <div class="col-md-6" data-aos="fade-up" data-aos-delay="{$key*100}">
                        <div class="border rounded-4 p-4 p-lg-5 h-100">
                            <div class="display-5 fw-bold mb-3">{$card.number}</div>
                            <h3 class="h4 fw-bold">{$card.title}</h3>
                            <p class="text-muted mb-0">
                                {$card.description}
                            </p>
                        </div>
                    </div>
                {/foreach}
            </div>
        </div>
    </section>

    <!-- ============ LEADERSHIP / TAKEAWAY ============  -->
    <section class="py-5 py-lg-7 bg-light">
        <div class="container py-lg-4">
            <div class="row justify-content-center">
                <div class="col-lg-9" data-aos="fade-up">
                    <div class="bg-white rounded-4 shadow-sm p-4 p-lg-5">
                        <span class="text-uppercase fw-bold text-muted small">{$data.content.leadership.header}</span>

                        <h2 class="display-6 fw-bold mt-2 mb-4">
                            {$data.content.leadership.title}
                        </h2>

                        <p class="fs-5">
                            {$data.content.leadership.copy}
                        </p>

                        <p class="fs-5 mb-0">
                            {$data.content.leadership.copy2}
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    {if !empty($data.testimonials)}
        <!-- ============ TESTIMONIALS ============  -->
        <section class="section-pad text-bg-navy p-5">
            <div class="container">
                <div class="testimonial-wrap" data-aos="fade-up">
                    <div class="section-label" style="color: var(--skale-green)">From someone who was there</div>

                    <span class="quote-mark">“</span>

                    <blockquote class="testimonial-quote">
                        {$data.testimonials[0]->shortText}
                    </blockquote>

                    <div class="testimonial-name">{$data.testimonials[0]->author}</div>

                    <div class="testimonial-role">{$data.testimonials[0]->authorTitle}, {$data.testimonials[0]->company}</div>
                </div>
            </div>
        </section>
    {/if}

    <!-- ============ SKILLS ============  -->
    <section class="py-5">
        <div class="container">
            <div class="text-center mb-4" data-aos="fade-up">
                <h2 class="h3 fw-bold">{$data.content.skills.header}</h2>
            </div>

            <div class="d-flex flex-wrap justify-content-center gap-2" data-aos="fade-up" data-aos-delay="100">
                {foreach from=$data.content.skills.items item=skill}
                    <span class="badge bg-light text-dark border px-3 py-2"> {$skill} </span>
                {/foreach}
            </div>
        </div>
    </section>

    <!-- ============ PORTFOLIO CTA ============  -->
    <section class="py-5 py-lg-7 bg-dark text-white">
        <div class="container py-lg-4">
            <div class="row align-items-center g-4">
                <div class="col-lg-8" data-aos="fade-right">
                    <span class="text-uppercase text-white-50 fw-bold small"> {$data.content.cta.header} </span>

                    <h2 class="display-5 fw-bold mt-2 mb-3 text-white">{$data.content.cta.title}</h2>

                    <p class="lead text-white-50 mb-lg-0">
                        {$data.content.cta.copy}
                    </p>
                </div>

                <div class="col-lg-4 text-lg-end" data-aos="fade-left">
                    <a href="{$data.content.cta.button_link}" class="mbtn btn btn-light btn-lg px-4" aria-label="View all projects footer"> {$data.content.cta.button_text} </a>
                </div>
            </div>
        </div>
    </section>
</main>

{include file="inc/layout/footer.tpl"}
