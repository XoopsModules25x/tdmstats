<div style="float:left;"><{$smarty.const._MI_ISTATS_NEWUSER}>:
    <{foreach item=user from=$block.users}>
        <b><{$user.name}></b>
        <{$user.joindate}>,
    <{/foreach}></div>

<br>

<div style="float:left;">Membre en ligne: <b><{$block.online.online_members}></b></div><br>
<div style="float:left;">Inviter en ligne: <b><{$block.online.online_guests}></b></div>
<div style="float:right;">Aujourd'hui: <{$block.stats.today}><br></div><br>
<div style="float:right;">ce mois: <{$block.stats.mth}><br></div><br>
<div style="float:right;">total: <{$block.stats.total}></div><br>

<hr>
<{$smarty.const._MI_ISTATS_NOWONLINE}> : <{$block.online.online_names}><{$block.online.online_module}>
<br>
<{if $block.online.online_total}>
    <{$block.online.online_total}>
    <br>
<{/if}>
<{$smarty.const._MI_ISTATS_USERONLINE}> : <{$block.times}> <br><br>
