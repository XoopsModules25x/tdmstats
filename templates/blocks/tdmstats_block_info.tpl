<div style="float:left;"><{$smarty.const._MI_ISTATS_NEWUSER}>:
    <{foreach item=user from=$block.users}>
        <b><{$user.name}></b>
        <{$user.joindate}>,
    <{/foreach}></div>

<br>

<div style="float:left;"> <{$smarty.const._MI_ISTATS_ONLINE_MEMBERS}> <b><{$block.online.online_members}></b></div><br>
<div style="float:left;"> <{$smarty.const._MI_ISTATS_ONLINE_GUESTS}> <b><{$block.online.online_guests}></b></div>
<div style="float:right;"> <{$smarty.const._MI_ISTATS_TODAY}> <{$block.stats.today}><br></div><br>
<div style="float:right;"> <{$smarty.const._MI_ISTATS_THIS_MONTH}> <{$block.stats.mth}><br></div><br>
<div style="float:right;"> <{$smarty.const._MI_ISTATS_TOTAL}> <{$block.stats.total}></div><br>

<hr>
<{$smarty.const._MI_ISTATS_NOWONLINE}>: <{$block.online.online_names}><{$block.online.online_module|default:null}>
<br>
<{if $block.online.online_total|default:null}>
    <{$block.online.online_total}>
    <br>
<{/if}>
<{$smarty.const._MI_ISTATS_USERONLINE}>: <{$block.times|default:null}> <br><br>
