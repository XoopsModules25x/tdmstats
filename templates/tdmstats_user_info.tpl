<{include file="db:tdmstats_index.tpl"}>

<table cellpadding="0" cellspacing="0" style="border-collapse: separate;">
    <tr>
        <td>

            <ul id="tree_menu">

                <li style="width:46%;" class="even">
                    <div><img class="img" src="<{$smarty.const.TDMSTATS_IMAGES_URL}>/bro.png"><br></div>
                    <div><a href="javascript:" onclick="masque('browser')"><h2><{$smarty.const._AM_BY_BROWSER}></h2></a>
                        <div style="text-align:left;">
                            <{foreach from=$item_browsers  item=item}>
                                <span id="tree_num"><{$item.browser}>
                                    , <{$item.info}> <{$smarty.const._AM_P_VISITS}></span>
                                <br>
                            <{/foreach}>

                        </div>
                    </div>
                    <div id="tree_form"><a href="javascript:" onclick="masque('browser')"><{$smarty.const._AM_VIEW}></a>
                    </div>
                </li>

                <!-- tableau browser -->
                <div id="masque_browser" style="display: none;" class="even tree_menu">
                    <div><img class="img" src="<{$smarty.const.TDMSTATS_IMAGES_URL}>/bro.png"><br></div>
                    <div><a href="javascript:" onclick="masque('browser')"><h2><{$smarty.const._AM_BY_BROWSER}></h2></a>
                        <div style="text-align:left;">
                            <div class="Tableau">
                                <p class="legende">
                                    <span class="col1"><{$smarty.const._AM_BRO_BRO}></span>
                                    <span class="col2"></span>
                                    <span class="col3"><{$smarty.const._AM_DATE_VISITS}></span>
                                    <span class="col4"><{$smarty.const._AM_DATE_PERCENT}></span>
                                </p>
                                <{foreach item=browser_map from=$browsers_map}>
                                    <p>
                                        <span class="col1"><{$browser_map.browser}></span>
                                        <span class="col2"><img src="./assets/images/bar/<{$img_bar}>"
                                                                title="<{$browser_map.percent}>%"
                                                                alt="<{$browser_map.percent}>%"
                                                                width="<{$browser_map.percent}>%" style="height:16px;"></span>
                                        <span class="col3"><{$browser_map.info}></span>
                                        <span class="col3"><{$browser_map.percent}>%</span>
                                    </p>
                                <{/foreach}>
                            </div>

                        </div>
                    </div>
                    <br style="clear: both;"><br></div>
                <!--fin-->

                <li style="width:46%;" class="even">
                    <div><img class="img" src="<{$smarty.const.TDMSTATS_IMAGES_URL}>/os.png"><br></div>
                    <div><a href="javascript:" onclick="masque('os')"><h2><{$smarty.const._AM_BY_OS}></h2></a>
                        <div style="text-align:left;">
                            <{foreach from=$item_os  item=item}>
                                <span id="tree_num"><{$item.os}>, <{$item.info}> <{$smarty.const._AM_P_VISITS}></span>
                                <br>
                            <{/foreach}>

                        </div>
                    </div>
                    <div id="tree_form"><a href="javascript:" onclick="masque('os')"><{$smarty.const._AM_VIEW}></a>
                    </div>
                </li>

                <!-- tableau os -->
                <div id="masque_os" style="display: none;" class="tree_menu even">
                    <div><img class="img" src="<{$smarty.const.TDMSTATS_IMAGES_URL}>/os.png"><br></div>
                    <div><a href="javascript:" onclick="masque('os')"><h2><{$smarty.const._AM_BY_OS}></h2></a>
                        <div style="text-align:left;">
                            <div class="Tableau">
                                <p class="legende">
                                    <span class="col1"><{$smarty.const._AM_BY_OS}></span>
                                    <span class="col2"></span>
                                    <span class="col3"><{$smarty.const._AM_DATE_VISITS}></span>
                                    <span class="col4"><{$smarty.const._AM_DATE_PERCENT}></span>
                                </p>
                                <{foreach item=os_map from=$oss_map}>
                                    <p>
                                        <span class="col1"><{$os_map.os}></span>
                                        <span class="col2"><img src="./assets/images/bar/<{$img_bar}>"
                                                                title="<{$os_map.percent}>%" alt="<{$os_map.percent}>%"
                                                                width="<{$os_map.percent}>%"
                                                                style="height:16px;"></span>
                                        <span class="col3"><{$os_map.info}></span>
                                        <span class="col3"><{$os_map.percent}>%</span>
                                    </p>
                                <{/foreach}>
                            </div>

                        </div>
                    </div>
                    <br style="clear: both;"><br></div>
                <!--fin-->

                <li style="width:46%;" class="even">
                    <div><img class="img" src="<{$smarty.const.TDMSTATS_IMAGES_URL}>/sw.png"><br></div>
                    <div><a href="javascript:" onclick="masque('sw')"><h2><{$smarty.const._AM_SW_SW}></h2></a>
                        <div style="text-align:left;">
                            <{foreach from=$item_sw  item=item}>
                                <span id="tree_num"><{$item.sw}>, <{$item.info}> <{$smarty.const._AM_P_VISITS}></span>
                                <br>
                            <{/foreach}>

                        </div>
                    </div>
                    <div id="tree_form"><a href="javascript:" onclick="masque('sw')"><{$smarty.const._AM_VIEW}></a>
                    </div>
                </li>

                <!-- tableau sw -->
                <div id="masque_sw" style="display: none;" class="tree_menu even">
                    <div><img class="img" src="<{$smarty.const.TDMSTATS_IMAGES_URL}>/sw.png"><br></div>
                    <div><a href="javascript:" onclick="masque('sw')"><h2><{$smarty.const._AM_SW_SW}></h2></a>
                        <div style="text-align:left;">
                            <div class="Tableau">
                                <p class="legende">
                                    <span class="col1"><{$smarty.const._AM_SW_SW}></span>
                                    <span class="col2"></span>
                                    <span class="col3"><{$smarty.const._AM_DATE_VISITS}></span>
                                    <span class="col4"><{$smarty.const._AM_DATE_PERCENT}></span>
                                </p>
                                <{foreach item=sw_map from=$sws_map}>
                                    <p>
                                        <span class="col1"><{$sw_map.sw}></span>
                                        <span class="col2"><img src="./assets/images/bar/<{$img_bar}>"
                                                                title="<{$sw_map.percent}>%" alt="<{$sw_map.percent}>%"
                                                                width="<{$sw_map.percent}>%"
                                                                style="height:16px;"></span>
                                        <span class="col3"><{$sw_map.info}></span>
                                        <span class="col3"><{$sw_map.percent}>%</span>
                                    </p>
                                <{/foreach}>
                            </div>

                        </div>
                    </div>
                    <br style="clear: both;"><br></div>
                <!--fin-->

                <li style="width:46%;" class="even">
                    <div><img class="img" src="<{$smarty.const.TDMSTATS_IMAGES_URL}>/sc.png"><br></div>
                    <div><a href="javascript:" onclick="masque('sc')"><h2><{$smarty.const._AM_SC_SC}></h2></a>
                        <div style="text-align:left;">
                            <{foreach from=$item_sc  item=item}>
                                <span id="tree_num"><{$item.sc}>, <{$item.info}> <{$smarty.const._AM_P_VISITS}></span>
                                <br>
                            <{/foreach}>

                        </div>
                    </div>
                    <div id="tree_form"><a href="javascript:" onclick="masque('sc')"><{$smarty.const._AM_VIEW}></a>
                    </div>
                </li>

                <!-- tableau sc -->
                <div id="masque_sc" style="display: none;" class="tree_menu even">
                    <div><img class="img" src="<{$smarty.const.TDMSTATS_IMAGES_URL}>/sc.png"><br></div>
                    <div><a href="javascript:" onclick="masque('sc')"><h2><{$smarty.const._AM_SC_SC}></h2></a>
                        <div style="text-align:left;">
                            <div class="Tableau">
                                <p class="legende">
                                    <span class="col1"><{$smarty.const._AM_SC_SC}></span>
                                    <span class="col2"></span>
                                    <span class="col3"><{$smarty.const._AM_DATE_VISITS}></span>
                                    <span class="col4"><{$smarty.const._AM_DATE_PERCENT}></span>
                                </p>
                                <{foreach item=sc_map from=$scs_map}>
                                    <p>
                                        <span class="col1"><{$sc_map.sc}></span>
                                        <span class="col2"><img src="./assets/images/bar/<{$img_bar}>"
                                                                title="<{$sc_map.percent}>%" alt="<{$sc_map.percent}>%"
                                                                width="<{$sc_map.percent}>%"
                                                                style="height:16px;"></span>
                                        <span class="col3"><{$sc_map.info}></span>
                                        <span class="col3"><{$sc_map.percent}>%</span>
                                    </p>
                                <{/foreach}>
                            </div>

                        </div>
                    </div>
                    <br style="clear: both;"><br></div>
                <!--fin-->

                <li style="width:46%;" class="even">
                    <div><img class="img" src="<{$smarty.const.TDMSTATS_IMAGES_URL}>/host.png"><br></div>
                    <div><a href="javascript:" onclick="masque('host')"><h2><{$smarty.const._AM_BY_HOST}></h2></a>
                        <div style="text-align:left;">
                            <{foreach from=$item_host  item=item}>
                                <span id="tree_num"><{$item.host}>, <{$item.info}> <{$smarty.const._AM_P_VISITS}></span>
                                <br>
                            <{/foreach}>

                        </div>
                    </div>
                    <div id="tree_form"><a href="javascript:" onclick="masque('host')"><{$smarty.const._AM_VIEW}></a>
                    </div>
                </li>

                <!-- tableau host -->
                <div id="masque_host" style="display: none;" class="tree_menu even">
                    <div><img class="img" src="<{$smarty.const.TDMSTATS_IMAGES_URL}>/host.png"><br></div>
                    <div><a href="javascript:" onclick="masque('host')"><h2><{$smarty.const._AM_BY_HOST}></h2></a>
                        <div style="text-align:left;">
                            <div class="Tableau">
                                <p class="legende">
                                    <span class="col1"><{$smarty.const._AM_BY_HOST}></span>
                                    <span class="col2"></span>
                                    <span class="col3"><{$smarty.const._AM_DATE_VISITS}></span>
                                    <span class="col4"><{$smarty.const._AM_DATE_PERCENT}></span>
                                </p>
                                <{foreach item=host_map from=$hosts_map}>
                                    <p>
                                        <span class="col1"><{$host_map.host}></span>
                                        <span class="col2"><img src="./assets/images/bar/<{$img_bar}>"
                                                                title="<{$host_map.percent}>%"
                                                                alt="<{$host_map.percent}>%"
                                                                width="<{$host_map.percent}>%"
                                                                style="height:16px;"></span>
                                        <span class="col3"><{$host_map.info}></span>
                                        <span class="col3"><{$host_map.percent}>%</span>
                                    </p>
                                <{/foreach}>
                            </div>

                        </div>
                    </div>
                    <br style="clear: both;"><br></div>
                <!--fin-->

                <br style="clear: both;"></ul>
        </td>
    </tr>
</table><br>
