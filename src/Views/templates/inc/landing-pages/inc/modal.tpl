<!-- Modal -->
<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="staticBackdropLabel">{$modalTitle}</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>

            <div class="modal-body">
                <p class="secondary">{$modalDescription}</p>
                {include file="inc/landing-pages/inc/lead-contact-form.tpl" buttonText=$ctaText userMessageLabel="Tell us about your needs"}
            </div>
        </div>
    </div>
</div>
