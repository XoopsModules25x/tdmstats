<{include file="db:tdmstats_index.tpl"}>

<table cellpadding="0" cellspacing="0" style="border-collapse: separate;">
    <tr>
        <td>
            <ul id="tree_menu">

                <li style="width:46%;" class="even">
                    <div><img class="img" src="<{$smarty.const.TDMSTATS_IMAGES_URL}>/day.png"
                              title="<{$lang_forecast}>"><br></div>
                    <div><a href="javascript:" onclick="masque('day')"><h2><{$smarty.const._AM_BY_DAY}></h2></a>
                        <div style="text-align:left;">
                            <{foreach from=$item_days  item=item}>
                                <span id="tree_num"><{$item.day}>, <{$item.info}> <{$smarty.const._AM_P_VISITS}></span>
                                <br>
                            <{/foreach}>

                        </div>
                    </div>
                    <div id="tree_form"><a href="javascript:" onclick="masque('day')"><{$smarty.const._AM_VIEW}></a>
                    </div>
                </li>

                <!-- tableau day -->
                <div id="masque_day" style="display: none;" class="tree_menu even">
                    <div><img class="img" src="<{$smarty.const.TDMSTATS_IMAGES_URL}>/day.png"
                              title="<{$lang_forecast}>"><br></div>
                    <div><a href="javascript:" onclick="masque('day')"><h2><{$smarty.const._AM_BY_DAY}></h2></a>
                        <div style="text-align:left;">
                            <div class="Tableau">
                                <p class="legende">
                                    <span class="col1"><{$smarty.const._AM_BY_DAY}></span>
                                    <span class="col2"></span>
                                    <span class="col3"><{$smarty.const._AM_DATE_VISITS}></span>
                                    <span class="col4"><{$smarty.const._AM_DATE_PERCENT}></span>
                                </p>
                                <{foreach item=days_map from=$days_map}>
                                    <p>
                                        <span class="col1"><{$days_map.day}></span>
                                        <span class="col2"><img src="./assets/images/bar/<{$img_bar}>"
                                                                title="<{$days_map.percent}>%"
                                                                alt="<{$days_map.percent}>%"
                                                                width="<{$days_map.percent}>%"
                                                                style="height:16px;"></span>
                                        <span class="col3"><{$days_map.info}></span>
                                        <span class="col3"><{$days_map.percent}>%</span>
                                    </p>
                                <{/foreach}>
                            </div>

                        </div>
                    </div>
                    <br style="clear: both;"><br></div>
                <!--fin-->


                <li style="width:46%;" class="odd">
                    <div><img class="img" src="<{$smarty.const.TDMSTATS_IMAGES_URL}>/weekday.png"
                              title="<{$lang_forecast}>"><br></div>
                    <div><a href="javascript:" onclick="masque('week')"><h2><{$smarty.const._AM_BY_WEEKDAY}></h2></a>
                        <div style="text-align:left;">
                            <{foreach from=$item_weeks  item=item}>
                                <span id="tree_num"><{$item.week_day}>
                                    , <{$item.info}> <{$smarty.const._AM_P_VISITS}></span>
                                <br>
                            <{/foreach}>

                        </div>
                    </div>
                    <div id="tree_form"><a href="javascript:" onclick="masque('week')"><{$smarty.const._AM_VIEW}></a>
                    </div>
                </li>

                <!-- tableau week -->
                <div id="masque_week" style="display: none;" class="tree_menu odd">
                    <div><img class="img" src="<{$smarty.const.TDMSTATS_IMAGES_URL}>/weekday.png"
                              title="<{$lang_forecast}>"><br></div>
                    <div><a href="javascript:" onclick="masque('week')"><h2><{$smarty.const._AM_BY_WEEKDAY}></h2></a>
                        <div style="text-align:left;">
                            <div class="Tableau">
                                <p class="legende">
                                    <span class="col1"><{$smarty.const._AM_BY_WEEKDAY}></span>
                                    <span class="col2"></span>
                                    <span class="col3"><{$smarty.const._AM_DATE_VISITS}></span>
                                    <span class="col4"><{$smarty.const._AM_DATE_PERCENT}></span>
                                </p>
                                <{foreach item=week_days_map from=$week_days_map}>
                                    <p>
                                        <span class="col1"><{$week_days_map.week_day}></span>
                                        <span class="col2"><img src="./assets/images/bar/<{$img_bar}>"
                                                                title="<{$week_days_map.percent}>%"
                                                                alt="<{$week_days_map.percent}>%"
                                                                width="<{$week_days_map.percent}>%"
                                                                style="height:16px;"></span>
                                        <span class="col3"><{$week_days_map.info}></span>
                                        <span class="col3"><{$week_days_map.percent}>%</span>
                                    </p>
                                <{/foreach}>
                            </div>

                        </div>
                    </div>
                    <br style="clear: both;"><br></div>
                <!--fin-->

                <li style="width:46%;" class="even">
                    <div><img class="img" src="<{$smarty.const.TDMSTATS_IMAGES_URL}>/week.png"
                              title="<{$lang_forecast}>"><br></div>
                    <div><a href="javascript:" onclick="masque('last')"><h2><{$smarty.const._AM_BY_WEEK}></h2></a>
                        <div style="text-align:left;">
                            <{foreach from=$item_lasts  item=item}>
                                <span id="tree_num"><{$item.week}>: <{$item.year}>
                                    , <{$item.info}> <{$smarty.const._AM_P_VISITS}></span>
                                <br>
                            <{/foreach}>

                        </div>
                    </div>
                    <div id="tree_form"><a href="javascript:" onclick="masque('last')"><{$smarty.const._AM_VIEW}></a>
                    </div>
                </li>

                <!-- tableau last -->
                <div id="masque_last" style="display: none;" class="tree_menu even">
                    <div><img class="img" src="<{$smarty.const.TDMSTATS_IMAGES_URL}>/week.png"
                              title="<{$lang_forecast}>"><br></div>
                    <div><a href="javascript:" onclick="masque('last')"><h2><{$smarty.const._AM_BY_WEEK}></h2></a>
                        <div style="text-align:left;">
                            <div class="Tableau">
                                <p class="legende">
                                    <span class="col1"><{$smarty.const._AM_BY_WEEK}></span>
                                    <span class="col2"></span>
                                    <span class="col3"><{$smarty.const._AM_DATE_VISITS}></span>
                                    <span class="col4"><{$smarty.const._AM_DATE_PERCENT}></span>
                                </p>
                                <{foreach item=lasts_map from=$lasts_map}>
                                    <p>
                                        <span class="col1"><{$lasts_map.week}> (<{$lasts_map.year}>)</span>
                                        <span class="col2"><img src="./assets/images/bar/<{$img_bar}>"
                                                                title="<{$lasts_map.percent}>%"
                                                                alt="<{$lasts_map.percent}>%"
                                                                width="<{$lasts_map.percent}>%"
                                                                style="height:16px;"></span>
                                        <span class="col3"><{$lasts_map.info}></span>
                                        <span class="col3"><{$lasts_map.percent}>%</span>
                                    </p>
                                <{/foreach}>
                            </div>

                        </div>
                    </div>
                    <br style="clear: both;"><br></div>
                <!--fin-->


                <li style="width:46%;" class="odd">
                    <div><img class="img" src="<{$smarty.const.TDMSTATS_IMAGES_URL}>/mth.png"
                              title="<{$lang_forecast}>"><br></div>
                    <div><a href="javascript:" onclick="masque('mth')"><h2><{$smarty.const._AM_BY_MTH}></h2></a>
                        <div style="text-align:left;">
                            <{foreach from=$item_mths  item=item}>
                                <span id="tree_num"><{$item.mth}>, <{$item.info}> <{$smarty.const._AM_P_VISITS}></span>
                                <br>
                            <{/foreach}>

                        </div>
                    </div>
                    <div id="tree_form"><a href="javascript:" onclick="masque('mth')"><{$smarty.const._AM_VIEW}></a>
                    </div>
                </li>

                <!-- tableau mth -->
                <div id="masque_mth" style="display: none;" class="tree_menu odd">
                    <div><img class="img" src="<{$smarty.const.TDMSTATS_IMAGES_URL}>/mth.png"
                              title="<{$lang_forecast}>"><br></div>
                    <div><a href="javascript:" onclick="masque('mth')"><h2><{$smarty.const._AM_BY_MTH}></h2></a>
                        <div style="text-align:left;">
                            <div class="Tableau">
                                <p class="legende">
                                    <span class="col1"><{$smarty.const._AM_BY_MTH}></span>
                                    <span class="col2"></span>
                                    <span class="col3"><{$smarty.const._AM_DATE_VISITS}></span>
                                    <span class="col4"><{$smarty.const._AM_DATE_PERCENT}></span>
                                </p>
                                <{foreach item=mths_map from=$mths_map}>
                                    <p>
                                        <span class="col1"><{$mths_map.mth}></span>
                                        <span class="col2"><img src="./assets/images/bar/<{$img_bar}>"
                                                                title="<{$mths_map.percent}>%"
                                                                alt="<{$mths_map.percent}>%"
                                                                width="<{$mths_map.percent}>%"
                                                                style="height:16px;"></span>
                                        <span class="col3"><{$mths_map.info}></span>
                                        <span class="col3"><{$mths_map.percent}>%</span>
                                    </p>
                                <{/foreach}>
                            </div>

                        </div>
                    </div>
                    <br style="clear: both;"><br></div>
                <!--fin-->


                <li style="width:46%;" class="even">
                    <div><img class="img" src="<{$smarty.const.TDMSTATS_IMAGES_URL}>/hour.png"
                              title="<{$lang_forecast}>"><br></div>
                    <div><a href="javascript:" onclick="masque('mth')"><h2><{$smarty.const._AM_BY_HOUR}></h2></a>
                        <div style="text-align:left;">
                            <{foreach from=$item_hours  item=item}>
                                <span id="tree_num"><{$item.hour}>
                                    h, <{$item.info}> <{$smarty.const._AM_P_VISITS}></span>
                                <br>
                            <{/foreach}>

                        </div>
                    </div>
                    <div id="tree_form"><a href="javascript:" onclick="masque('hour')"><{$smarty.const._AM_VIEW}></a>
                    </div>
                </li>

                <!-- tableau hours -->
                <div id="masque_hour" style="display: none;" class="tree_menu even">
                    <div><img class="img" src="<{$smarty.const.TDMSTATS_IMAGES_URL}>/hour.png"
                              title="<{$lang_forecast}>"><br></div>
                    <div><a href="javascript:" onclick="masque('hour')"><h2><{$smarty.const._AM_BY_HOUR}></h2></a>
                        <div style="text-align:left;">
                            <div class="Tableau">
                                <p class="legende">
                                    <span class="col1"><{$smarty.const._AM_BY_HOUR}></span>
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
                    <div><img class="img" src="<{$smarty.const.TDMSTATS_IMAGES_URL}>/page.png"
                              title="<{$lang_forecast}>"><br></div>
                    <div><a href="javascript:" onclick="masque('page')"><h2><{$smarty.const._AM_BY_PAGE}></h2></a>
                        <div style="text-align:left;">
                            <{foreach from=$item_pages  item=item}>
                                <span id="tree_num"><{$item.page}>, <{$item.info}> <{$smarty.const._AM_P_VISITS}></span>
                                <br>
                            <{/foreach}>

                        </div>
                    </div>
                    <div id="tree_form"><a href="javascript:" onclick="masque('page')"><{$smarty.const._AM_VIEW}></a>
                    </div>
                </li>

                <!-- tableau pages -->
                <div id="masque_page" style="display: none;" class="tree_menu odd">
                    <div><img class="img" src="<{$smarty.const.TDMSTATS_IMAGES_URL}>/page.png"
                              title="<{$lang_forecast}>"><br></div>
                    <div><a href="javascript:" onclick="masque('page')"><h2><{$smarty.const._AM_BY_PAGE}></h2></a>
                        <div style="text-align:left;">
                            <div class="Tableau">
                                <p class="legende">
                                    <span class="col1"><{$smarty.const._AM_BY_PAGE}></span>
                                    <span class="col2"></span>
                                    <span class="col3"><{$smarty.const._AM_DATE_VISITS}></span>
                                    <span class="col4"><{$smarty.const._AM_DATE_PERCENT}></span>
                                </p>
                                <{foreach item=pages_map from=$pages_map}>
                                    <p>
                                        <span class="col1" title="<{$pages_map.title}>"><{$pages_map.page}></span>
                                        <span class="col2"><img src="./assets/images/bar/<{$img_bar}>"
                                                                title="<{$pages_map.percent}>%"
                                                                alt="<{$pages_map.percent}>%"
                                                                width="<{$pages_map.percent}>%"
                                                                style="height:16px;"></span>
                                        <span class="col3"><{$pages_map.info}></span>
                                        <span class="col3"><{$pages_map.percent}>%</span>
                                    </p>
                                <{/foreach}>
                            </div>

                        </div>
                    </div>
                    <br style="clear: both;"><br></div>
                <!--fin-->

                <li style="width:46%;" class="even">
                    <div><img class="img" src="<{$smarty.const.TDMSTATS_IMAGES_URL}>/module.png"
                              title="<{$lang_forecast}>"><br></div>
                    <div><a href="javascript:" onclick="masque('mth')"><h2><{$smarty.const._AM_BY_MODULE}></h2></a>
                        <div style="text-align:left;">
                            <{foreach from=$item_modules  item=item}>
                                <span id="tree_num"><{$item.module}>
                                    , <{$item.info}> <{$smarty.const._AM_P_VISITS}></span>
                                <br>
                            <{/foreach}>

                        </div>
                    </div>
                    <div id="tree_form"><a href="javascript:" onclick="masque('module')"><{$smarty.const._AM_VIEW}></a>
                    </div>
                </li>

                <!-- tableau module -->
                <div id="masque_module" style="display: none;" class="tree_menu even">
                    <div><img class="img" src="<{$smarty.const.TDMSTATS_IMAGES_URL}>/module.png"
                              title="<{$lang_forecast}>"><br></div>
                    <div><a href="javascript:" onclick="masque('module')"><h2><{$smarty.const._AM_BY_MODULE}></h2></a>
                        <div style="text-align:left;">
                            <div class="Tableau">
                                <p class="legende">
                                    <span class="col1"><{$smarty.const._AM_BY_MODULE}></span>
                                    <span class="col2"></span>
                                    <span class="col3"><{$smarty.const._AM_DATE_VISITS}></span>
                                    <span class="col4"><{$smarty.const._AM_DATE_PERCENT}></span>
                                </p>
                                <{foreach item=modules_map from=$modules_map}>
                                    <p>
                                        <span class="col1"
                                              title="<{$modules_map.modules}>"><{$modules_map.modules}></span>
                                        <span class="col2"><img src="./assets/images/bar/<{$img_bar}>"
                                                                title="<{$modules_map.percent}>%"
                                                                alt="<{$modules_map.percent}>%"
                                                                width="<{$modules_map.percent}>%" style="height:16px;"></span>
                                        <span class="col3"><{$modules_map.info}></span>
                                        <span class="col3"><{$modules_map.percent}>%</span>
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
                    <div><a href="javascript:" onclick="masque('user')"><h2><{$smarty.const._AM_BY_USER}></h2></a>
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
                    <div><a href="javascript:" onclick="masque('pays')"><h2><{$smarty.const._AM_BY_USER}></h2></a>
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
