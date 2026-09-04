<main class="landing-main">
    <section class="hero">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-7" data-aos="fade-up">
                    <span class="eyebrow mb-4">
                        <i class="fa-solid fa-arrow-right-arrow-left"></i>
                        Done-for-you task management implementation
                    </span>

                    <h1 class="fw-bold mb-4 text-light">
                        Move Your Projects Out of Spreadsheets - Without Managing the Migration Yourself
                    </h1>

                    <p class="hero-lead mb-4">Skale helps growing teams choose the right task management platform, migrate their spreadsheet data, configure workflows, train users, and support the system after launch.</p>

                    <ul class="check-list mb-4">
                        <li><i class="fa-solid fa-circle-check"></i><span>Your spreadsheet data migrated for you</span></li>
                        <li><i class="fa-solid fa-circle-check"></i><span>Projects, tasks, owners, deadlines, and statuses configured</span></li>
                        <li><i class="fa-solid fa-circle-check"></i><span>A platform selected around your workflow and budget</span></li>
                        <li><i class="fa-solid fa-circle-check"></i><span>Live training so your team knows exactly what to do</span></li>
                        <li><i class="fa-solid fa-circle-check"></i><span>Optional ongoing support as your process evolves</span></li>
                    </ul>

                    <div class="d-flex flex-column flex-sm-row gap-3 mb-3">
                        {include file="inc/landing-pages/inc/modal-button.tpl" class="btn btn-primary btn-lg px-4" text="Get My Free Migration Plan" describedBy="task management landing page" metaEvent="TaskManagement" metaLabel="Mid Page CTA Button"}
                        {include file="inc/landing-pages/inc/call-button.tpl" class="btn btn-outline-light btn-lg px-4" iconClass="fa-solid fa-phone me-2" text="Call {$smarty.ENV.SITE_PHONE}"}
                    </div>

                    <p class="small text-muted-skale mb-0"><i class="fa-solid fa-shield-halved me-2"></i>Free 30-minute consultation · No platform purchase required · No obligation</p>
                </div>

                <div class="col-lg-5" data-aos="fade-up" data-aos-delay="200">
                    <div id="migration-plan" class="form-panel p-4 p-xl-5">
                        <span class="eyebrow mb-3">Free consultation</span>
                        <h2 class="h3 fw-bold mb-2">Get Your Free Spreadsheet Migration Plan</h2>
                        <p class="text-secondary mb-4">Tell us how your team currently manages projects. We'll help identify the right platform, what should be migrated, and the simplest path to launch.</p>
                        {include file="inc/landing-pages/inc/lead-contact-form.tpl" buttonText="Build My Free Migration Plan" userMessageLabel="What are you currently managing in spreadsheets?" textAreaPlaceholder="Client projects, employee tasks, production schedules, approvals, deadlines, or recurring work"}
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="pb-5 py-5">
        <div class="container">
            <div class="trust-panel" data-aos="fade-up">
                <div class="row g-0">
                    <div class="col-lg-3 trust-item"><strong class="text-light">20+ Years of Experience</strong><span class="text-muted-skale d-block">Building and improving business systems</span></div>
                    <div class="col-lg-3 trust-item"><strong class="text-light">Data Migration Included</strong><span class="text-muted-skale d-block">Your existing spreadsheet work comes with you</span></div>
                    <div class="col-lg-3 trust-item"><strong class="text-light">Team Training Included</strong><span class="text-muted-skale d-block">Your users are prepared before launch</span></div>
                    <div class="col-lg-3 trust-item"><strong class="text-light">Ongoing Support Available</strong><span class="text-muted-skale d-block">You are not left alone after setup</span></div>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 landing-content-width-lg">
                <span class="eyebrow mb-3">When spreadsheets stop working</span>
                <h2 class="display-5 fw-bold text-light">Your Spreadsheet May Be Tracking the Work - But It Is Not Managing It</h2>
                <p class="lead text-muted-skale">As teams and workloads grow, spreadsheets become harder to update, harder to trust, and harder to use for accountability.</p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="100">
                    <article class="card-dark">
                        <div class="icon"><i class="fa-solid fa-copy"></i></div>
                        <h3 class="h5 fw-bold">Version Confusion</h3>
                        <p class="text-muted-skale mb-0">Copies get emailed, renamed, and edited by different people.</p>
                    </article>
                </div>

                <div class="col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="200">
                    <article class="card-dark">
                        <div class="icon"><i class="fa-solid fa-user-tag"></i></div>
                        <h3 class="h5 fw-bold">Unclear Ownership</h3>
                        <p class="text-muted-skale mb-0">A name in a cell is not an assigned task with a due date and reminder.</p>
                    </article>
                </div>

                <div class="col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="300">
                    <article class="card-dark">
                        <div class="icon"><i class="fa-solid fa-bell"></i></div>
                        <h3 class="h5 fw-bold">Constant Follow-Up</h3>
                        <p class="text-muted-skale mb-0">Managers chase updates and build status reports manually.</p>
                    </article>
                </div>

                <div class="col-md-6 col-xl-3" data-aos="fade-up" data-aos-delay="400">
                    <article class="card-dark">
                        <div class="icon"><i class="fa-solid fa-arrow-trend-up"></i></div>
                        <h3 class="h5 fw-bold">Growth Creates Chaos</h3>
                        <p class="text-muted-skale mb-0">More work means more tabs, files, and missed details.</p>
                    </article>
                </div>
            </div>

            <div class="text-center mt-5" data-aos="fade-up">
                {include file="inc/landing-pages/inc/modal-button.tpl" class="btn btn-primary btn-lg" text="Show Me a Better Way" describedBy="task management landing page" metaEvent="TaskManagement" metaLabel="Mid Page CTA Button"}
            </div>
        </div>
    </section>

    <section class="py-5 light-section">
        <div class="container">
            <div class="text-center mx-auto mb-5 landing-content-width-lg">
                <span class="eyebrow mb-3">Everything needed to make the switch</span>
                <h2 class="display-5 fw-bold">You Do Not Have to Figure Out the Platform, Migration, or Setup Alone</h2>
                <p class="lead text-muted-skale">Skale handles the technical and operational work required to move your team into a system that fits how your business operates.</p>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-xl-4">
                    <article class="card-light" data-aos="fade-up" data-aos-delay="50">
                        <div class="icon"><i class="fa-solid fa-magnifying-glass-chart"></i></div>
                        <h3 class="h4 fw-bold text-dark">Workflow Review</h3>
                        <p class="text-muted-skale mb-0">Review spreadsheets, processes, reporting needs, recurring work, and team responsibilities.</p>
                    </article>
                </div>

                <div class="col-md-6 col-xl-4">
                    <article class="card-light" data-aos="fade-up" data-aos-delay="100">
                        <div class="icon"><i class="fa-solid fa-scale-balanced"></i></div>
                        <h3 class="h4 fw-bold">Platform Selection</h3>
                        <p class="text-muted-skale mb-0">Compare practical free and paid options around your workflow and budget.</p>
                    </article>
                </div>

                <div class="col-md-6 col-xl-4">
                    <article class="card-light" data-aos="fade-up" data-aos-delay="150">
                        <div class="icon"><i class="fa-solid fa-file-import"></i></div>
                        <h3 class="h4 fw-bold">Spreadsheet Data Migration</h3>
                        <p class="text-muted-skale mb-0">Clean, organize, map, and import usable project and task data.</p>
                    </article>
                </div>

                <div class="col-md-6 col-xl-4">
                    <article class="card-light" data-aos="fade-up" data-aos-delay="200">
                        <div class="icon"><i class="fa-solid fa-sliders"></i></div>
                        <h3 class="h4 fw-bold">System Configuration</h3>
                        <p class="text-muted-skale mb-0">Build projects, templates, statuses, permissions, dashboards, and automation.</p>
                    </article>
                </div>

                <div class="col-md-6 col-xl-4">
                    <article class="card-light" data-aos="fade-up" data-aos-delay="250">
                        <div class="icon"><i class="fa-solid fa-chalkboard-user"></i></div>
                        <h3 class="h4 fw-bold">Team Training</h3>
                        <p class="text-muted-skale mb-0">Train users around their real responsibilities and daily work.</p>
                    </article>
                </div>

                <div class="col-md-6 col-xl-4">
                    <article class="card-light" data-aos="fade-up" data-aos-delay="300">
                        <div class="icon"><i class="fa-solid fa-headset"></i></div>
                        <h3 class="h4 fw-bold">Launch and Support</h3>
                        <p class="text-muted-skale mb-0">Resolve launch issues, answer questions, and refine workflows over time.</p>
                    </article>
                </div>
            </div>

            <div class="text-center mt-5">
                {include file="inc/landing-pages/inc/modal-button.tpl" class="btn btn-primary btn-lg" text="Get My Migration Plan" describedBy="task management landing page" metaEvent="TaskManagement" metaLabel="Mid Page CTA Button"}
                <p class="text-muted-skale mt-3">Already considering Asana, Monday.com, ClickUp, Trello, or another platform? Skale can help evaluate and implement it.</p>
            </div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="text-center mb-5">
                <span class="eyebrow mb-3">Before and after</span>
                <h2 class="display-5 fw-bold text-light">From Spreadsheet Follow-Up to a System That Keeps Work Moving</h2>
            </div>

            <div class="comparison">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th>Managing Work in Spreadsheets</th>
                            <th>Managing Work in a Task System</th>
                        </tr>
                    </thead>

                    <tbody>
                        <tr data-aos="fade-up" data-aos-delay="50">
                            <td class="before">Multiple files and versions</td>
                            <td class="after">One source of truth</td>
                        </tr>

                        <tr data-aos="fade-up" data-aos-delay="100">
                            <td class="before">Ownership entered as text</td>
                            <td class="after">Tasks assigned to responsible users</td>
                        </tr>

                        <tr data-aos="fade-up" data-aos-delay="150">
                            <td class="before">Manual deadline follow-up</td>
                            <td class="after">Due dates, reminders, and notifications</td>
                        </tr>

                        <tr data-aos="fade-up" data-aos-delay="200">
                            <td class="before">Status reports created by hand</td>
                            <td class="after">Live boards, lists, and dashboards</td>
                        </tr>

                        <tr data-aos="fade-up" data-aos-delay="250">
                            <td class="before">Repetitive work recreated each time</td>
                            <td class="after">Templates and recurring tasks</td>
                        </tr>

                        <tr data-aos="fade-up" data-aos-delay="300">
                            <td class="before">Limited visibility into delays</td>
                            <td class="after">Clear blockers, overdue work, and workload</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <div class="text-center mt-5">
                {include file="inc/landing-pages/inc/modal-button.tpl" class="btn btn-primary btn-lg" text="See What This Could Look Like for My Team" describedBy="task management landing page" metaEvent="TaskManagement" metaLabel="Mid Page CTA Button"}
            </div>
        </div>
    </section>

    <section class="py-5 light-section">
        <div class="container">
            <div class="text-center mb-5">
                <span class="eyebrow mb-3">A practical, guided transition</span>
                <h2 class="display-5 fw-bold">A Clear Path From Your Current Spreadsheet to a Working System</h2>
            </div>

            <div class="row g-4">
                <div class="col-md-6 col-xl" data-aos="fade-left" data-aos-delay="100">
                    <article class="process-card">
                        <span class="number py-1 px-2">1</span>
                        <h3 class="h5 fw-bold text-dark mt-2">Review</h3>
                        <p class="text-muted-skale mb-0">Examine what your spreadsheets track and where work gets lost.</p>
                    </article>
                </div>

                <div class="col-md-6 col-xl" data-aos="fade-left" data-aos-delay="200">
                    <article class="process-card">
                        <span class="number py-1 px-2">2</span>
                        <h3 class="h5 fw-bold text-dark mt-2">Design</h3>
                        <p class="text-muted-skale mb-0">Define projects, tasks, owners, stages, approvals, and reporting.</p>
                    </article>
                </div>

                <div class="col-md-6 col-xl" data-aos="fade-left" data-aos-delay="300">
                    <article class="process-card">
                        <span class="number py-1 px-2">3</span>
                        <h3 class="h5 fw-bold text-dark mt-2">Configure & Migrate</h3>
                        <p class="text-muted-skale mb-0">Build the workspace and move usable spreadsheet data.</p>
                    </article>
                </div>

                <div class="col-md-6 col-xl" data-aos="fade-left" data-aos-delay="400">
                    <article class="process-card">
                        <span class="number py-1 px-2">4</span>
                        <h3 class="h5 fw-bold text-dark mt-2">Test & Train</h3>
                        <p class="text-muted-skale mb-0">Test real workflows and train your team around daily work.</p>
                    </article>
                </div>

                <div class="col-md-6 col-xl" data-aos="fade-left" data-aos-delay="500">
                    <article class="process-card">
                        <span class="number py-1 px-2">5</span>
                        <h3 class="h5 fw-bold text-dark mt-2">Launch & Improve</h3>
                        <p class="text-muted-skale mb-0">Support rollout, resolve issues, and refine the system.</p>
                    </article>
                </div>
            </div>

            <div class="reassurance mt-5"><strong>Your spreadsheet does not disappear on day one.</strong><span class="d-block text-muted-skale">A phased transition gives your team time to verify data and adjust.</span></div>
        </div>
    </section>

    <section class="py-5">
        <div class="container">
            <div class="text-center mx-auto mb-5 landing-content-width-sm">
                <span class="eyebrow mb-3">Platform guidance</span>
                <h2 class="display-5 fw-bold text-light">The Right Platform Is the One Your Team Will Actually Use</h2>
                <p class="lead text-muted-skale">The goal is not expensive software. It is the simplest system that supports your work now and as you grow.</p>
            </div>

            <div class="row g-4">
                <div class="col-lg-6" data-aos="fade-up">
                    <article class="platform-card">
                        <h3 class="h3 fw-bold">A Free Platform May Be Enough When:</h3>
                        <ul class="check-list mt-4">
                            <li><i class="fa-solid fa-circle-check"></i><span>You have a small team</span></li>
                            <li><i class="fa-solid fa-circle-check"></i><span>Your workflows are straightforward</span></li>
                            <li><i class="fa-solid fa-circle-check"></i><span>You need basic assignments and due dates</span></li>
                            <li><i class="fa-solid fa-circle-check"></i><span>You want to prove the process before investing</span></li>
                        </ul>
                    </article>
                </div>

                <div class="col-lg-6" data-aos="fade-up">
                    <article class="platform-card">
                        <h3 class="h3 fw-bold">A Paid Platform May Be Better When:</h3>
                        <ul class="check-list mt-4">
                            <li><i class="fa-solid fa-circle-check"></i><span>Multiple teams or clients share the system</span></li>
                            <li><i class="fa-solid fa-circle-check"></i><span>You need permissions or approval workflows</span></li>
                            <li><i class="fa-solid fa-circle-check"></i><span>You need automation, reporting, or integrations</span></li>
                            <li><i class="fa-solid fa-circle-check"></i><span>You need time or workload tracking</span></li>
                        </ul>
                    </article>
                </div>
            </div>
        </div>
    </section>

    <section class="py-5 light-section">
        <div class="container">
            <div class="text-center mb-5">
                <span class="eyebrow mb-3">Who this is for</span>
                <h2 class="display-5 fw-bold">This Service Is a Strong Fit When…</h2>
            </div>

            <div class="row g-4">
                <div class="col-lg-8">
                    <article class="card-light">
                        <div class="row g-3">
                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Your team manages active work in spreadsheets</div>
                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Deadlines or follow-ups are missed</div>
                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Managers spend too much time asking for updates</div>
                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>Nobody is sure the spreadsheet is current</div>
                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>You want accountability without custom software</div>
                            <div class="col-md-6"><i class="fa-solid fa-check text-success me-2"></i>You do not have time to implement the system</div>
                        </div>
                    </article>
                </div>

                <div class="col-lg-4">
                    <article class="card-light">
                        <h3 class="h4 fw-bold">Probably Not the Right Fit</h3>
                        <p class="text-muted-skale mb-0">This service may not fit if you only need a personal to-do list or software licenses without implementation help.</p>
                    </article>
                </div>
            </div>
        </div>
    </section>

    {include
    file="inc/landing-pages/inc/founder-panel.tpl"
    eyebrow="Experienced, hands-on guidance"
    h2="Your Implementation Is Led by Someone Who Understands Technology and Business Operations"
    p1="I'm Joe Brown, founder of Skale. For more than 20 years, I've helped businesses replace manual processes, organize complex information, connect systems, automate repetitive work, and create technology teams can realistically use."
    p2="I work with you through planning, migration, setup, training, launch, and ongoing improvement."
    }

    {include file="inc/landing-pages/inc/faq.tpl" faq=$data.sections.sectionFAQ}

    <section class="py-5 final-cta rounded-0">
        <div class="container">
            <div class="row align-items-center g-5">
                <div class="col-lg-7">
                    <span class="eyebrow mb-3">Start with a free consultation</span>
                    <h2 class="display-4 fw-bold">Let's Build Your Path Out of Spreadsheets</h2>
                    <p class="lead text-muted-skale">Review your current process, discuss your spreadsheet data, and determine the best way to migrate your team.</p>
                    <div class="d-flex flex-column flex-sm-row gap-3">
                        {include file="inc/landing-pages/inc/modal-button.tpl" class="btn btn-primary btn-lg" text="Get My Free Migration Plan" describedBy="task management landing page" metaEvent="TaskManagement" metaLabel="Mid Page CTA Button"}
                        {include file="inc/landing-pages/inc/call-button.tpl" class="btn btn-outline-light btn-lg" iconClass="fa-solid fa-phone me-2" text="Call {$smarty.ENV.SITE_PHONE}"}
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="form-panel p-4">
                        <h3 class="h4 fw-bold">Request Your Migration Plan</h3>
                        {include file="inc/landing-pages/inc/lead-contact-form.tpl" buttonText="Get My Free Migration Plan" userMessageLabel=""}
                    </div>
                </div>
            </div>
        </div>
    </section>
</main>

<div class="mobile-action-bar d-lg-none fixed-bottom p-2">
    <div class="container">
        <div class="row g-2">
            <div class="col-5">
                {include file="inc/landing-pages/inc/call-button.tpl" class="btn btn-outline-light w-100" iconClass="fa-solid fa-phone me-1" text="Call"}
            </div>

            <div class="col-7">
                {include file="inc/landing-pages/inc/modal-button.tpl" class="btn btn-primary w-100" text="Get Migration Plan" describedBy="task management landing page" metaEvent="TaskManagement" metaLabel="Mid Page CTA Button"}
            </div>
        </div>
    </div>
</div>

{include file="inc/landing-pages/inc/modal.tpl" modalTitle="Get Your Free Migration Plan" ctaText="Get My Free Migration Plan" modalDescription="Tell us how your team currently manages projects. We'll help identify the right platform, what should be migrated, and the simplest path to launch."}
