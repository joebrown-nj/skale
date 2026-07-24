<!-- FAQ -->
<section class="section-space bg-soft">
    <div class="container">
        <div class="row g-5">
            <div class="col-lg-5">
                <span class="eyebrow">{$data.eyebrow}</span>
                <h2>{$data.heading}</h2>
                <p class="mt-3">{$data.description}</p>
            </div>

            <div class="col-lg-7">
                <div class="accordion" id="growthFaq">
                    {foreach from=$data.items item=faq}
                        <div class="accordion-item">
                            <h3 class="accordion-header">
                                <button class="accordion-button {if $faq@first} {else}collapsed{/if}" type="button" data-bs-toggle="collapse" data-bs-target="#faq{$faq@iteration}" aria-expanded="{if $faq@first}true{else}false{/if}" aria-controls="faq{$faq@iteration}">{$faq.question}</button>
                            </h3>
                            <div id="faq{$faq@iteration}" class="accordion-collapse collapse {if $faq@first}show{/if}" data-bs-parent="#growthFaq">
                                <div class="accordion-body">{$faq.answer}</div>
                            </div>
                        </div>
                    {/foreach}
                </div>
            </div>
        </div>
    </div>
</section>



{* <!-- FAQ -->
<section class="section-space bg-soft">
<div class="container">
<div class="row g-5">
<div class="col-lg-5">
<span class="eyebrow">Common Questions</span>
<h2>What businesses usually want to know before getting started.</h2>
<p class="mt-3">The first conversation is designed to determine fit and uncover opportunities. You do not need to have the solution figured out beforehand.</p>
</div>
<div class="col-lg-7">
<div class="accordion" id="growthFaq">
<div class="accordion-item">
<h3 class="accordion-header">
<button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#faqOne" aria-expanded="true" aria-controls="faqOne">What exactly is growth infrastructure?</button>
</h3>
<div id="faqOne" class="accordion-collapse collapse show" data-bs-parent="#growthFaq">
<div class="accordion-body">Growth infrastructure is the connected system behind how your business attracts prospects, captures leads, follows up, delivers information, measures results, and improves performance. It can include your website, CRM, automation, integrations, marketing, analytics, and operational workflows.</div>
</div>
</div>

<div class="accordion-item">
<h3 class="accordion-header">
<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqTwo" aria-expanded="false" aria-controls="faqTwo">Do we need to replace our current tools?</button>
</h3>
<div id="faqTwo" class="accordion-collapse collapse" data-bs-parent="#growthFaq">
<div class="accordion-body">Not necessarily. Skale first evaluates what is already working. In many cases, the better answer is to improve, connect, or simplify the tools you already use rather than replace everything.</div>
</div>
</div>

<div class="accordion-item">
<h3 class="accordion-header">
<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqThree" aria-expanded="false" aria-controls="faqThree">Can we start with one priority?</button>
</h3>
<div id="faqThree" class="accordion-collapse collapse" data-bs-parent="#growthFaq">
<div class="accordion-body">Yes. Many engagements begin with the highest-impact issue, such as a website conversion problem, CRM setup, reporting gap, or manual workflow. The work can then expand based on results and business priorities.</div>
</div>
</div>

<div class="accordion-item">
<h3 class="accordion-header">
<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqFour" aria-expanded="false" aria-controls="faqFour">How will we know the work is successful?</button>
</h3>
<div id="faqFour" class="accordion-collapse collapse" data-bs-parent="#growthFaq">
<div class="accordion-body">Success measures are defined before implementation. Depending on the engagement, they may include stronger conversion rates, faster response time, fewer manual steps, improved data accuracy, better lead quality, lower acquisition costs, or clearer reporting.</div>
</div>
</div>

<div class="accordion-item">
<h3 class="accordion-header">
<button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faqFive" aria-expanded="false" aria-controls="faqFive">What happens during the free consultation?</button>
</h3>
<div id="faqFive" class="accordion-collapse collapse" data-bs-parent="#growthFaq">
<div class="accordion-body">We discuss your goals, current systems, biggest obstacles, and where you believe opportunities are being lost. You will leave with a clearer view of the problem and the most practical next step, whether or not we work together.</div>
</div>
</div>
</div>
</div>
</div>
</div>
</section> *}
