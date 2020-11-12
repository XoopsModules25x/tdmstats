<table cellspacing="1">
    <{if $block.totalpages|default:null}>
        <tr>
            <td style="font-size: xx-small;"><{$block.lang_p_page}>:</td>
            <td style="font-size: xx-small;"><{$block.totalpages}></td>
        </tr>
    <{/if}>
    <{if $block.lang_total_visits|default:null}>
        <tr>
            <td style="font-size: xx-small;"><{$block.lang_total_visits}>:</td>
            <td style="font-size: xx-small;"><{$block.total}></td>
        </tr>
    <{/if}>
    <{if $block.lang_total_days|default:null}>
        <tr>
            <td style="font-size: xx-small;"><{$block.lang_total_days}>:</td>
            <td style="font-size: xx-small;"><{$block.days}></td>
        </tr>
    <{/if}>
    <{if $block.lang_ave_day|default:null}>
        <tr>
            <td style="font-size: xx-small;"><{$block.lang_ave_day}>:</td>
            <td style="font-size: xx-small;"><{$block.ava_day}></td>
        </tr>
    <{/if}>
    <{if $block.lang_ave_hour|default:null}>
        <tr>
            <td style="font-size: xx-small;"><{$block.lang_ave_hour}>:</td>
            <td style="font-size: xx-small;"><{$block.ava_hour}></td>
        </tr>
    <{/if}>
    <{if $block.lang_ave_week|default:null}>
        <tr>
            <td style="font-size: xx-small;"><{$block.lang_ave_week}>:</td>
            <td style="font-size: xx-small;"><{$block.ava_week}></td>
        </tr>
    <{/if}>
    <{if $block.lang_ave_mth|default:null}>
        <tr>
            <td style="font-size: xx-small;"><{$block.lang_ave_mth}>:</td>
            <td style="font-size: xx-small;"><{$block.ava_mth}></td>
        </tr>
    <{/if}>
    <{if $block.lang_max_date|default:null}>
        <tr>
            <td style="font-size: xx-small;"><{$block.lang_max_date}>:</td>
            <td style="font-size: xx-small;"><{$block.max_date}></td>
        </tr>
    <{/if}>
    <{if $block.lang_max_daycount|default:null}>
        <tr>
            <td style="font-size: xx-small;"><{$block.lang_max_daycount}>:</td>
            <td style="font-size: xx-small;"><{$block.max_daycount}></td>
        </tr>
    <{/if}>
    <{if $block.lang_today|default:null}>
        <tr>
            <td style="font-size: xx-small;"><{$block.lang_today}>:</td>
            <td style="font-size: xx-small;"><{$block.today}></td>
        </tr>
    <{/if}>
    <{if $block.lang_this_week|default:null}>
        <tr>
            <td style="font-size: xx-small;"><{$block.lang_this_week}>:</td>
            <td style="font-size: xx-small;"><{$block.this_week}></td>
        </tr>
    <{/if}>
    <{if $block.lang_this_mth|default:null}>
        <tr>
            <td style="font-size: xx-small;"><{$block.lang_this_mth}>:</td>
            <td style="font-size: xx-small;"><{$block.this_mth}></td>
        </tr>
    <{/if}>
    <{if $block.lang_max_week|default:null}>
        <tr>
            <td style="font-size: xx-small;"><{$block.lang_max_week}>:</td>
            <td style="font-size: xx-small;"><{$block.max_week}></td>
        </tr>
    <{/if}>
    <{if $block.lang_max_weekcount|default:null}>
        <tr>
            <td style="font-size: xx-small;"><{$block.lang_max_weekcount}>:</td>
            <td style="font-size: xx-small;"><{$block.max_weekcount}></td>
        </tr>
    <{/if}>
    <{if $block.lang_max_mth|default:null}>
        <tr>
            <td style="font-size: xx-small;"><{$block.lang_max_mth}>:</td>
            <td style="font-size: xx-small;"><{$block.max_mth}></td>
        </tr>
    <{/if}>
    <{if $block.lang_max_mthcount|default:null}>
        <tr>
            <td style="font-size: xx-small;"><{$block.lang_max_mthcount}>:</td>
            <td style="font-size: xx-small;"><{$block.max_mthcount}></td>
        </tr>
    <{/if}>
</table>
