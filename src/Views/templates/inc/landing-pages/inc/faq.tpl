<section class="py-5 bg-light px-5">
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h2 class="text-center fw-bold mb-5 text-secondary">Frequently Asked Questions</h2>

                <div class="accordion accordion-flush" id="faqAccordion">
                    {foreach from=$faq key=k item=faq}
                        <div class="accordion-item" data-aos="fade-up">
                            <h2 class="accordion-header">
                                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#faq{$k}" aria-expanded="false" aria-controls="faq{$k}">
                                    {$faq.question}
                                </button>
                            </h2>

                            <div id="faq{$k}" class="accordion-collapse collapse" data-bs-parent="#faqAccordion">
                                <div class="accordion-body text-secondary">
                                    {$faq.answer}
                                </div>
                            </div>
                        </div>
                    {/foreach}
                </div>
            </div>
        </div>
    </div>
</section>