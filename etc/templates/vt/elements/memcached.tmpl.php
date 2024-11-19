<?php
    $__pageTitle = LocaleLoader::Translate("vt.memcached.title");
    $__breadcrumbs = array( array( 'link' => Site::GetWebPath( "vt://modules/memcached" ), 'title' => $__pageTitle ) );
?>
{increal:tmpl://vt/header.tmpl.php}
<div class="main">
    <div class="inner">
        <? if (!empty( $result ) ) { ?>
            {increal:tmpl://vt/elements/menu/breadcrumbs.tmpl.php}
            <div class="pagetitle">
                <div class="controls"><a href="?flush=1" class="add"><span>{lang:vt.memcached.flush}</span></a></div>
                <h1>{$__pageTitle}</h1>
            </div>
            <table class="objects" cellspacing="0" style="width:70%;margin:auto">
                <tr>
                    <th colspan="2">{lang:vt.memcached.common}</th>
                </tr>
                <tr>
                    <td class="header">{lang:vt.memcached.serverVersion}</td>
                    <td class="right">{$result[version]}</td>
                </tr>
                <tr>
                    <td class="header">{lang:vt.memcached.pid}</td>
                    <td class="right">{$result[pid]}</td>
                </tr>
                <tr>
                    <td class="header">{lang:vt.memcached.uptime}</td>
                    <td class="right">{$result[uptime]} сек.</td>
                </tr>
                <tr>
                    <td class="header">{lang:vt.memcached.currItems}</td>
                    <td class="right">{$result[curr_items]}</td>
                </tr>
                <tr>
                    <td class="header">{lang:vt.memcached.totalItems}</td>
                    <td class="right">{$result[total_items]}</td>
                </tr>
                <tr>
                    <td class="header">{lang:vt.memcached.connections}</td>
                    <td class="right">{$result[curr_connections]}</td>
                </tr>
                <tr>
                    <td class="header">{lang:vt.memcached.totalConnections}</td>
                    <td class="right">{$result[total_connections]}</td>
                </tr>
                <tr>
                    <th colspan="2">{lang:vt.memcached.hits}</th>
                </tr>
                <tr>
                    <td class="header">{lang:vt.memcached.cmdGet}</td>
                    <td class="right">{$result[cmd_get]}</td>
                </tr>
                <tr>
                    <td class="header">{lang:vt.memcached.cmdSet}</td>
                    <td class="right">{$result[cmd_set]}</td>
                </tr>
                <tr>
                    <td class="header">{lang:vt.memcached.getHits}</td>
                    <td class="right">{$result[get_hits]} ({$result[percCacheHit]}%)</td>
                </tr>
                <tr>
                    <td class="header">{lang:vt.memcached.getMisses}</td>
                    <td class="right">{$result[get_misses]} ({$result[percCacheMiss]}%)</td>
                </tr>
                <tr>
                    <th colspan="2">{lang:vt.memcached.tags}</th>
                </tr>
                <? foreach( $result["tags"] as $tKey => $tValue ) { ?>
                    <tr class="lr">
                        <td  class="header">{$tKey}</td>
                        <td  class="right">{$tValue}</td>
                    </tr>
                <? } ?>
            </table>
        <? } else { ?>
            <h1 class="error">{lang:vt.memcached.disabled}</h1>
        <? } ?>
    </div>
</div>
{increal:tmpl://vt/footer.tmpl.php}