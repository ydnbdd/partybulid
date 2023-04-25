<?php

global $_W, $_GPC;
$op = $_GPC['op'] ? $_GPC['op'] : 'display';
if ($op == "display") {
    $id = intval($_GPC['id']);
    $votitem = pdo_get($this->table_votitem, array('id' => $id, 'uniacid' => $_W['uniacid']));
    if (empty($votitem)) {
        $this->result(1, '信息不存在！');
    }
    $votitem['details'] = str_replace('<img', '<img style="max-width:100%;height:auto" ', htmlspecialchars_decode($votitem['details']));
    $votitem['tilpic'] = tomedia($votitem['tilpic']);
    $this->result(0, '', array('votitem' => $votitem));
}