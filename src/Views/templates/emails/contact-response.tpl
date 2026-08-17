<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8"><meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="x-apple-disable-message-reformatting"><meta name="format-detection" content="telephone=no,address=no,email=no,date=no,url=no">
        <title>Thanks for contacting {$site.name|escape:'html'}</title>
        {literal}<style>
            body{margin:0!important;padding:0!important;width:100%!important;background-color:#f4f7f9}table{border-collapse:collapse!important}img{border:0;outline:none;text-decoration:none;display:block}a{text-decoration:none}
            @media only screen and (max-width:620px){.email-container{width:100%!important}.mobile-padding{padding-left:24px!important;padding-right:24px!important}.headline{font-size:28px!important;line-height:34px!important}}
        </style>{/literal}
    </head>
    <body style="margin:0;padding:0;background-color:#f4f7f9;">
        <div style="display:none;font-size:1px;color:#f4f7f9;line-height:1px;max-height:0;max-width:0;opacity:0;overflow:hidden;">Thanks for reaching out to {$site.name|escape:'html'}. We received your message and will be in touch soon.</div>
        <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="width:100%;background-color:#f4f7f9;"><tr><td align="center" style="padding:32px 12px;">
                    <table role="presentation" class="email-container" width="600" cellspacing="0" cellpadding="0" border="0" style="width:600px;max-width:600px;background-color:#fff;">
                        <tr><td class="mobile-padding" style="padding:30px 40px;background-color:#07111f;font-family:Arial,Helvetica,sans-serif;">
                                <div style="color:#fff;font-size:27px;line-height:32px;font-weight:bold;"><a href="{$site.url|escape:'html'}" target="_blank" style="color:inherit;">{$site.name|escape:'html'}<span style="color:#2ee6a6;">.</span></a></div>
                                <div style="padding-top:5px;color:#aebbc9;font-size:13px;line-height:18px;">Where Engineering Meets Growth</div>
                        </td></tr>
                        <tr><td class="mobile-padding" style="padding:48px 40px 24px;font-family:Arial,Helvetica,sans-serif;">
                                <div class="headline" style="color:#07111f;font-size:34px;line-height:41px;font-weight:bold;">Thanks for reaching out.</div>
                                {if $content ne ''}<div style="padding-top:18px;color:#4b5563;font-size:17px;line-height:27px;">{$content nofilter}</div>{/if}
                                <div style="padding-top:18px;color:#4b5563;font-size:17px;line-height:27px;">We&#39;ve received your message and will review the details you&#39;ve shared. You can expect to hear from us soon.</div>
                        </td></tr>
                        <tr><td class="mobile-padding" style="padding:0 40px 34px;color:#4b5563;font-family:Arial,Helvetica,sans-serif;font-size:16px;line-height:26px;">At {$site.name|escape:'html'}, we help businesses solve technology problems, improve the way their systems work together, and build infrastructure that supports long-term growth.</td></tr>
                        <tr><td style="padding:0 40px;"><table role="presentation" width="100%"><tr><td style="height:1px;background-color:#e5e7eb;font-size:1px;line-height:1px;">&nbsp;</td></tr></table></td></tr>
                        <tr><td class="mobile-padding" style="padding:34px 40px 16px;color:#07111f;font-family:Arial,Helvetica,sans-serif;font-size:21px;line-height:28px;font-weight:bold;">While you&#39;re here, here&#39;s how we can help.</td></tr>
                        {include file='inc/service-list.tpl'}
                        <tr><td class="mobile-padding" align="center" style="padding:36px 40px;background-color:#eefbf6;font-family:Arial,Helvetica,sans-serif;">
                                <div style="color:#07111f;font-size:21px;line-height:27px;font-weight:bold;">Want to learn more while you wait?</div>
                                <div style="padding:9px 0 22px;color:#53616c;font-size:15px;line-height:23px;">Explore how {$site.name|escape:'html'} helps growing businesses use technology more effectively.</div>
                                <table role="presentation" cellspacing="0" cellpadding="0" border="0" align="center"><tr><td align="center" bgcolor="#16a673" style="border-radius:5px;background-color:#16a673;"><a href="{$site.url|escape:'html'}solutions/" target="_blank" style="display:inline-block;padding:15px 26px;border:1px solid #16a673;border-radius:5px;color:#fff;font-family:Arial,Helvetica,sans-serif;font-size:15px;line-height:18px;font-weight:bold;">Explore {$site.name|escape:'html'} Services</a></td></tr></table>
                        </td></tr>
                        <tr><td class="mobile-padding" style="padding:36px 40px;color:#4b5563;font-family:Arial,Helvetica,sans-serif;font-size:15px;line-height:25px;">Thanks again for contacting us. We&#39;re looking forward to learning more about your business and what you&#39;re trying to accomplish.<div style="padding-top:22px;"><strong style="color:#07111f;">Joe Brown</strong><br>{$site.name|escape:'html'}<br><a href="{$site.url|escape:'html'}" target="_blank" style="color:#168b65;">{$site.url|replace:'https://':''|replace:'http://':''|escape:'html'}</a></div></td></tr>
                        <tr><td class="mobile-padding" align="center" style="padding:26px 40px;background-color:#07111f;color:#8f9dab;font-family:Arial,Helvetica,sans-serif;font-size:12px;line-height:19px;">This email was sent automatically because a contact form was submitted at {$site.name|escape:'html'}.<div style="padding-top:8px;"><a href="{$site.url|escape:'html'}" target="_blank" style="color:#b9c7d3;text-decoration:underline;">Visit {$site.name|escape:'html'}</a></div></td></tr>
                    </table>
        </td></tr></table>
    </body>
</html>
