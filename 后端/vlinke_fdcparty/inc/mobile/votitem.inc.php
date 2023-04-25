<?php

global $_W, $_GPC;
$op = $_GPC['op'] ? $_GPC['op'] : 'display';
$param = $this->getParam();
$user = $this->getUser();
if ($op == "display") {
    $id = intval($_GPC['id']);
    $votitem = pdo_get($this->table_votitem, array('id' => $id, 'uniacid' => $_W['uniacid']));
    if (empty($votitem)) {
        $this->result(1, '信息不存在！');
    }
    $votitem['tilpic'] = tomedia($votitem['tilpic']);
}
include $this->template('votitem');