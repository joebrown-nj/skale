{include file="inc/layout/header.tpl"}

<div class="container-fluid">
    <div class="row justify-content-center align-items-center border-bottom py-4 text-bg-dark">
        <div class="col-md-4" style="margin-top: 100px;">
            <h2 class="display-4 fw-bold Bahnschrift logo-bg-small">Unsubscribe</h2>
            {if $data.successMessage != ''}
                <div class="alert alert-success" role="alert">
                    {$data.successMessage}
                </div>
            {/if}

            {if $data.errorMessage != ''}
                <div class="alert alert-danger" role="alert">
                    {$data.errorMessage}
                </div>
            {/if}
        </div>
    </div>
</div>

{include file="inc/layout/footerContactForm.tpl"}
{include file="inc/layout/footer.tpl"}