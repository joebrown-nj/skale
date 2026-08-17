{foreach $services as $service}
    <tr>
        <td class="mobile-padding" style="padding:8px 40px;{if $service@last}padding-bottom:34px;{/if}">
            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0" style="background-color:#f7faf9;"><tr><td style="padding:20px;">
                        <a href="{$site.url|escape:'html'}{$service.path|escape:'html'}" target="_blank" style="text-decoration:none;color:inherit;">
                            <table role="presentation" width="100%" cellspacing="0" cellpadding="0" border="0"><tr>
                                    <td width="38" valign="top" style="width:38px;color:#16a673;font-family:Arial,Helvetica,sans-serif;font-size:22px;font-weight:bold;">{$service@iteration|string_format:'%02d'}</td>
                                    <td style="color:#07111f;font-family:Arial,Helvetica,sans-serif;font-size:16px;line-height:23px;font-weight:bold;">
                                        {$service.title|escape:'html'}
                                        <div style="padding-top:5px;color:#65717d;font-size:14px;line-height:22px;font-weight:normal;">{$service.description|escape:'html'}</div>
                                    </td>
                            </tr></table>
                        </a>
            </td></tr></table>
        </td>
    </tr>
{/foreach}
