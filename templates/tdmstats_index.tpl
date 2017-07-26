<style type="text/css">
    .value {
        border-left: 1px solid #e5e5e5;
        border-right: 1px solid #e5e5e5;
        padding: 0;
        border-bottom: none;
        background: transparent url(../assets/images/gridline58.gif) repeat-x left top;
    }

    .map td {
        padding: 4px 6px;
        border-bottom: 1px solid #e5e5e5;
        border-left: 1px solid #e5e5e5;
    }

    .value img {
        vertical-align: middle;
        margin: 5px 5px 5px 0;
        max-width: 90%;

    }

    .map th {
        text-align: left;
        vertical-align: top;
    }

    .map {
        background: url(../assets/images/bg_fade.png) repeat-x left top;
        width: 100%;
    }

    .map caption {
        font-size: 90%;
        font-style: italic;
    }

    .option {
        padding: 5px 5px 5px 0;
        background-color: #FFF;
    }
</style>

<script type="text/javascript" language="javascript">
    function masque(id) {
        var $tdmstats = jQuery.noConflict();
        $tdmstats(document).ready(function () {
            if ($tdmstats("#masque_" + id + ":visible").length != 0) {
                $tdmstats("#masque_" + id).fadeOut("fast", function () {
                    $tdmstats("#masque_" + id).fadeIn("fast").hide();
                });
            } else {
                $tdmstats("#masque_" + id).fadeOut("fast", function () {
                    $tdmstats("#masque_" + id).slideToggle("fast").show();
                });
            }
        });
    }
</script>

<b>

    <{if $show_index}>
    <b>
        <h2><{$smarty.const._AM_TRAFFIC_REPORT}></h2>
        <hr>
        <b>
            <table cellpadding="0" id="masque_1" cellspacing="0" style="margin:5px;">
                <tr>
                    <td>
                        <ul id="tree_menu">

                            <li style="width:47%;" class="even">
                                <div><img src="<{$smarty.const.TDMSTATS_IMAGES_URL}>/resum.png"
                                          title="<{$smarty.const._AM_SUMMARY}>"><br></div>
                                <div><a href="index.php?action=1" title="<{$smarty.const._AM_SUMMARY}>">
                                        <h2><{$smarty.const._AM_SUMMARY}></h2></a>
                                    <div style="text-align:left;"><span id="tree_num"><{$lang_total_visits}>
                                            <b><{$total}></b></span><b>
                                            <span id="tree_num"><{$lang_today}> <b><{$today}></b></span><b>
                                                <span id="tree_num"><{$lang_ave_day}> <b><{$ava_day}></b></span></div>
                                </div>
                                <div id="tree_form">go win</div>
                            </li>

                            <br style="clear: both;"></ul>
                    </td>
                </tr>
            </table>
            <b>
                <div align="center">
                    <{if $perm_4}>
                        <div style="float:left; text-align:center; width:30%; padding:10px;" class="outer"><a
                                    href="index.php?action=1"><img src="./assets/images/resum.png"
                                                                   title="<{$smarty.const._AM_SUMMARY}>"></a><b><a
                                        href="index.php?action=1"><{$smarty.const._AM_SUMMARY}></a>
                        </div>
                    <{/if}>
                    <{if $perm_8}>
                        <div style="float:left; text-align:center; width:30%; padding:10px;" class="outer">
                            <a href="index.php?action=2"><img src="./assets/images/log.png"
                                                              title="<{$smarty.const._AM_TRAFFIC}>"></a><b><a
                                        href="index.php?action=2"><{$smarty.const._AM_TRAFFIC}></a>
                        </div>
                    <{/if}>
                    <{if $perm_16}>
                        <div style="float:left; text-align:center; width:30%; padding:10px;" class="outer">
                            <a href="index.php?action=3"><img src="./assets/images/user.png"
                                                              title="<{$smarty.const._AM_VISITOR_INFO}>"></a><b><a
                                        href="index.php?action=3"><{$smarty.const._AM_VISITOR_INFO}></a>
                        </div>
                    <{/if}>
                    <br style="clear: both;">
                </div>
                <{/if}>
