<{include file="db:tdmstats_index.tpl"}>

<table cellpadding="0" cellspacing="0" style="border-collapse: separate;">
    <tr>
        <td>
            <ul id="tree_menu">

                <li style="width:46%;" class="even">
                    <div><img class="img" src="<{$smarty.const.TDMSTATS_IMAGES_URL}>/resume.png"
                              title="<{$smarty.const._AM_STATS_INFO}>"><br></div>
                    <div><a href="javascript:" onclick="masque('resum')"><h2><{$smarty.const._AM_STATS_INFO}></h2></a>
                        <div style="text-align:left;"><span id="tree_num"><{$lang_total_visits}> <b><{$total}></b></span><br>
                            <span id="tree_num"><{$lang_today}> <b><{$today}></b></span><br>
                            <span id="tree_num"><{$lang_ave_day}> <b><{$ava_day}></b></span></div>
                    </div>
                    <div id="tree_form"><a href="javascript:" onclick="masque('resum')"><{$smarty.const._AM_VIEW}></a>
                    </div>
                </li>

                <!-- tableau resum -->
                <div id="masque_resum" style="display: none;" class="tree_menu even">
                    <div><img class="img" src="<{$smarty.const.TDMSTATS_IMAGES_URL}>/resume.png"
                              title="<{$lang_forecast}>"><br></div>
                    <div><a href="javascript:" onclick="masque('resum')"><h2><{$smarty.const._AM_STATS_INFO}></h2></a>
                        <div style="text-align:left;">
                            <div class="Tableau">
                                <p class="legende">
                                    <span class="col1"><{$smarty.const._AM_TOTAL_VISITS}></span>
                                    <span class="col1"><{$total}></span>
                                    <span class="col1"><{$smarty.const._AM_NOW}></span>
                                    <span class="col1"><{$date_now}></span>
                                </p>

                                <p>
                                    <span class="col1"><{$smarty.const._AM_TODAY}></span>
                                    <span class="col1"><{$today}></span>
                                    <span class="col1"><{$smarty.const._AM_AVE_DAY}></span>
                                    <span class="col1"><{$ava_day}></span>
                                </p>

                                <p class="legende">
                                    <span class="col1"><{$smarty.const._AM_THIS_WEEK}></span>
                                    <span class="col1"><{$this_week}></span>
                                    <span class="col1"><{$smarty.const._AM_AVE_WEEK}></span>
                                    <span class="col1"><{$ava_week}></span>
                                </p>

                                <p>
                                    <span class="col1"><{$smarty.const._AM_THIS_MTH}></span>
                                    <span class="col1"><{$this_mth}></span>
                                    <span class="col1"><{$smarty.const._AM_AVE_MTH}></span>
                                    <span class="col1"><{$ava_mth}></span>
                                </p>

                                <p class="legende">
                                    <span class="col1"><{$smarty.const._AM_TOTAL_DAYS}></span>
                                    <span class="col1"><{$days}></span>
                                    <span class="col1"><{$smarty.const._AM_AVE_HOUR}></span>
                                    <span class="col1"><{$ava_hour}></span>
                                </p>

                                <p>
                                    <span class="col1"><{$smarty.const._AM_MAX_DAYCOUNT}></span>
                                    <span class="col1"><{$max_daycount}></span>
                                    <span class="col1"><{$smarty.const._AM_MAX_DATE}></span>
                                    <span class="col1"><{$max_date}></span>
                                </p>

                                <p class="legende">
                                    <span class="col1"><{$smarty.const._AM_MAX_WEEKCOUNT}></span>
                                    <span class="col1"><{$max_weekcount}></span>
                                    <span class="col1"><{$smarty.const._AM_MAX_WEEK}></span>
                                    <span class="col1"><{$max_week}></span>
                                </p>

                                <p>
                                    <span class="col1"><{$smarty.const._AM_MAX_MTHCOUNT}></span>
                                    <span class="col1"><{$max_mthcount}></span>
                                    <span class="col1"><{$smarty.const._AM_MAX_MTH}></span>
                                    <span class="col1"><{$max_mth}></span>
                                </p>
                            </div>

                        </div>
                    </div>
                    <br style="clear: both;"><br></div>

                <!-- fin -->

                <li style="width:46%;" class="odd">
                    <div><img class="img" src="<{$smarty.const.TDMSTATS_IMAGES_URL}>/tip.png"
                              title="<{$lang_forecast}>"><br></div>
                    <div><a href="javascript:" title="<{$lang_forecast}>"><h2><{$smarty.const._AM_FORECAST}></h2></a>
                        <div style="text-align:left;"><span id="tree_num"><{$smarty.const.AM_AVE}> <b><{$cur_percent}>
                                    %</b> <{$smarty.const.AM_DAILY_VISIT}> <b><{$date_daily}></b>.
                     <br><{$smarty.const.AM_BAS_NBR}> <b><{$daycount}></b>
                     <br><{$smarty.const.AM_SO_FARE}> <b><{$today_hits}></b> <{$smarty.const.AM_PAGE_VIEW}>
</span></div>
                    </div>
                </li>


                <li style="width:46%;" class="even">
                    <div><img class="img" src="<{$smarty.const.TDMSTATS_IMAGES_URL}>/calender.png"
                              title="<{$lang_forecast}>"><br></div>
                    <div><a href="javascript:" onclick="masque('hour')"><h2><{$smarty.const._AM_TODAY}></h2></a>
                        <div style="text-align:left;">
                            <{foreach from=$item_hours  item=item}>
                                <span id="tree_num"><{$smarty.const._AM_P_A}> <{$item.hour}>
                                    h, <{$item.info}> <{$smarty.const._AM_P_VISITS}></span>
                                <br>
                            <{/foreach}>

                        </div>
                    </div>
                    <div id="tree_form"><a href="javascript:" onclick="masque('hour')"><{$smarty.const._AM_VIEW}></a>
                    </div>
                </li>

                <!-- tableau hour -->
                <div id="masque_hour" style="display: none;" class="tree_menu even">
                    <div><img class="img" src="<{$smarty.const.TDMSTATS_IMAGES_URL}>/calender.png"
                              title="<{$lang_forecast}>"><br></div>
                    <div><a href="javascript:" onclick="masque('hour')"><h2><{$smarty.const._AM_TODAY}></h2></a>
                        <div style="text-align:left;">
                            <div class="Tableau">
                                <p class="legende">
                                    <span class="col1"><{$smarty.const._AM_HR_HOUR}></span>
                                    <span class="col2"></span>
                                    <span class="col3"><{$smarty.const._AM_DATE_VISITS}></span>
                                    <span class="col4"><{$smarty.const._AM_DATE_PERCENT}></span>
                                </p>
                                <{foreach item=hours_map from=$hours_map}>
                                    <p>
                                        <span class="col1"><{$hours_map.hour}></span>
                                        <span class="col2"><img src="./assets/images/bar/<{$img_bar}>"
                                                                title="<{$hours_map.percent}>%"
                                                                alt="<{$hours_map.percent}>%"
                                                                width="<{$hours_map.percent}>%"
                                                                style="height:16px;"></span>
                                        <span class="col3"><{$hours_map.info}></span>
                                        <span class="col3"><{$hours_map.percent}>%</span>
                                    </p>
                                <{/foreach}>
                            </div>

                        </div>
                    </div>
                    <br style="clear: both;"><br></div>
                <!--fin-->


                <li style="width:46%;" class="odd">
                    <div><img class="img" src="<{$smarty.const.TDMSTATS_IMAGES_URL}>/ref.png"
                              title="<{$lang_forecast}>"><br></div>
                    <div><a href="javascript:" onclick="masque('ref')"><h2><{$smarty.const._AM_BY_REF}></h2></a>
                        <div style="text-align:left;">
                            <{foreach from=$item_refs  item=item}>
                                <span id="tree_num"><{$item.url}>, <{$item.info}> <{$smarty.const._AM_P_VISITS}></span>
                                <br>
                            <{/foreach}>
                        </div>
                    </div>
                    <div id="tree_form"><a href="javascript:" onclick="masque('ref')"><{$smarty.const._AM_VIEW}></a>
                    </div>
                </li>

                <!-- tableau ref -->
                <div id="masque_ref" style="display: none;" class="tree_menu even">
                    <div><img class="img" src="<{$smarty.const.TDMSTATS_IMAGES_URL}>/ref.png"
                              title="<{$lang_forecast}>"><br></div>
                    <div><a href="javascript:" onclick="masque('ref')"><h2><{$smarty.const._AM_BY_REF}></h2></a>
                        <div style="text-align:left;">
                            <div class="Tableau">
                                <p class="legende">
                                    <span class="col1"><{$smarty.const._AM_REF_REF}></span>
                                    <span class="col2"></span>
                                    <span class="col3"><{$smarty.const._AM_DATE_VISITS}></span>
                                    <span class="col4"><{$smarty.const._AM_DATE_PERCENT}></span>
                                </p>
                                <{foreach item=refs_map from=$refs_map}>
                                    <p>
                                        <span class="col1"><{$refs_map.ref}></span>
                                        <span class="col2"><img src="./assets/images/bar/<{$img_bar}>"
                                                                title="<{$refs_map.percent}>%"
                                                                alt="<{$refs_map.percent}>%"
                                                                width="<{$refs_map.percent}>%"
                                                                style="height:16px;"></span>
                                        <span class="col3"><{$refs_map.info}></span>
                                        <span class="col3"><{$refs_map.percent}>%</span>
                                    </p>
                                <{/foreach}>
                            </div>

                        </div>
                    </div>
                    <br style="clear: both;"><br></div>
                <!--fin-->


                <li style="width:46%;" class="even">
                    <div><img class="img" src="<{$smarty.const.TDMSTATS_IMAGES_URL}>/word.png"
                              title="<{$lang_forecast}>"><br></div>
                    <div><a href="javascript:" onclick="masque('pays')"><h2><{$smarty.const._AM_BY_COUNTRY}></h2></a>
                        <div style="text-align:left;">
                            <{foreach from=$item_pays  item=item}>
                                <span id="tree_num"><{$item.country}>
                                    , <{$item.info}> <{$smarty.const._AM_P_VISITS}></span>
                                <br>
                            <{/foreach}>

                        </div>
                    </div>
                    <div id="tree_form"><a href="javascript:" onclick="masque('pays')"><{$smarty.const._AM_VIEW}></a>
                    </div>
                </li>

                <!-- tableau pays -->
                <div id="masque_pays" style="display: none;" class="tree_menu even">
                    <div><img class="img" src="<{$smarty.const.TDMSTATS_IMAGES_URL}>/word.png"
                              title="<{$lang_forecast}>"><br></div>
                    <div><a href="javascript:" onclick="masque('pays')"><h2><{$smarty.const._AM_BY_COUNTRY}></h2></a>
                        <div style="text-align:left;">
                            <div class="Tableau">
                                <p class="legende">
                                    <span class="col1"><{$smarty.const._AM_BY_COUNTRY}></span>
                                    <span class="col2"></span>
                                    <span class="col3"><{$smarty.const._AM_DATE_VISITS}></span>
                                    <span class="col4"><{$smarty.const._AM_DATE_PERCENT}></span>
                                </p>
                                <{foreach item=payss_map from=$payss_map}>
                                    <p>
                                        <span class="col1"><{$payss_map.flag}></span>
                                        <span class="col2"><img src="./assets/images/bar/<{$img_bar}>"
                                                                title="<{$payss_map.percent}>%"
                                                                alt="<{$payss_map.percent}>%"
                                                                width="<{$payss_map.percent}>%"
                                                                style="height:16px;"></span>
                                        <span class="col3"><{$payss_map.info}></span>
                                        <span class="col3"><{$payss_map.percent}>%</span>
                                    </p>
                                <{/foreach}>
                            </div>

                        </div>
                    </div>
                    <br style="clear: both;"><br></div>
                <!--fin-->

                <li style="width:46%;" class="even">
                    <div><img class="img" src="<{$smarty.const.TDMSTATS_IMAGES_URL}>/user.png"
                              title="<{$lang_forecast}>"><br></div>
                    <div><a href="javascript:" onclick="masque('user')"><h2><{$smarty.const._AM_BY_TODAY_USER}></h2></a>
                        <div style="text-align:left;">
                            <{foreach from=$item_users  item=item}>
                                <span id="tree_num"><{$item.userid}>, <{$item.info}></span>
                                <br>
                            <{/foreach}>

                        </div>
                    </div>
                    <div id="tree_form"><a href="javascript:" onclick="masque('user')"><{$smarty.const._AM_VIEW}></a>
                    </div>
                </li>

                <!-- tableau user -->
                <div id="masque_user" style="display: none;" class="tree_menu even">
                    <div><img class="img" src="<{$smarty.const.TDMSTATS_IMAGES_URL}>/user.png"
                              title="<{$lang_forecast}>"><br></div>
                    <div><a href="javascript:" onclick="masque('pays')"><h2><{$smarty.const._AM_BY_TODAY_USER}></h2></a>
                        <div style="text-align:left;">
                            <div class="Tableau">
                                <p class="legende">
                                    <span class="col1"><{$smarty.const._AM_BY_USER}></span>
                                    <span class="col2"></span>
                                    <span class="col3"><{$smarty.const._AM_DATE_VISITS}></span>
                                    <span class="col4"><{$smarty.const._AM_DATE_PERCENT}></span>
                                </p>
                                <{foreach item=user_map from=$users_map}>
                                    <p>
                                        <span class="col1"><{$user_map.userid}></span>
                                        <span class="col2"><img src="./assets/images/bar/<{$img_bar}>"
                                                                title="<{$user_map.percent}>%"
                                                                alt="<{$user_map.percent}>%"
                                                                width="<{$user_map.percent}>%"
                                                                style="height:16px;"></span>
                                        <span class="col3"><{$user_map.info}></span>
                                        <span class="col3"><{$user_map.percent}>%</span>
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
