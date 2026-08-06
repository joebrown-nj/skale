{include file="inc/layout/header.tpl"}

{if $data.serviceContent|empty}
    {$data.serviceDetail->content}
{else}
    <main class="service-detail-page {$p2}">
        {if $data.serviceContent.sections.hero && $data.serviceContent.sections.hero.enabled}
            {include file="inc/service/hero.tpl" data=$data.serviceContent.sections.hero}
        {/if}

        {if $data.serviceContent.sections.trustStrip && $data.serviceContent.sections.trustStrip.enabled}
            {include file="inc/service/trustStrip.tpl" data=$data.serviceContent.sections.trustStrip}
        {/if}

        {if $data.serviceContent.sections.problems && $data.serviceContent.sections.problems.enabled}
            {include file="inc/service/problems.tpl" data=$data.serviceContent.sections.problems}
        {/if}

        {if $data.serviceContent.sections.outcomes && $data.serviceContent.sections.outcomes.enabled}
            {include file="inc/service/outcomes.tpl" data=$data.serviceContent.sections.outcomes}
        {/if}

        {* {if $data.serviceContent.sections.components}
        {include file="inc/service/components.tpl" data=$data.serviceContent.sections.components}
        {/if} *}

        {if $data.serviceContent.sections.serviceComponents && $data.serviceContent.sections.serviceComponents.enabled}
            {include file="inc/service/serviceComponents.tpl" data=$data.serviceContent.sections.serviceComponents}
        {/if}

        {if $data.serviceContent.sections.caseStudy && $data.serviceContent.sections.caseStudy.enabled}
            {include file="inc/service/caseStudy.tpl" data=$data.serviceContent.sections.caseStudy}
        {/if}

        {if $data.serviceContent.sections.process && $data.serviceContent.sections.process.enabled}
            {include file="inc/service/process.tpl" data=$data.serviceContent.sections.process}
        {/if}

        {if $data.serviceContent.sections.founder && $data.serviceContent.sections.founder.enabled}
            {include file="inc/service/founder.tpl" data=$data.serviceContent.sections.founder}
        {/if}

        {if $data.serviceContent.sections.qualification && $data.serviceContent.sections.qualification.enabled}
            {include file="inc/service/qualification.tpl" data=$data.serviceContent.sections.qualification}
        {/if}

        {if $data.serviceContent.sections.faq && $data.serviceContent.sections.faq.enabled}
            {include file="inc/service/faq.tpl" data=$data.serviceContent.sections.faq}
        {/if}

        {if $data.serviceContent.sections.finalCta && $data.serviceContent.sections.finalCta.enabled}
            {include file="inc/service/finalCta.tpl" data=$data.serviceContent.sections.finalCta}
        {/if}
    </main>
{/if}

{include file="inc/layout/footer.tpl"}
