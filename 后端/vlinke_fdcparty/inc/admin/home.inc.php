<?php

global $_W, $_GPC;
load()->func('tpl');
$op = !empty($_GPC['op']) ? $_GPC['op'] : 'display';
if ($op == "display") {
    $usertol = pdo_fetchcolumn("SELECT count(*) FROM " . tablename($this->table_user) . " WHERE uniacid=:uniacid AND recycle=0 AND branchid IN (" . $lbranchallid . ") ", array(':uniacid' => $_W['uniacid']));
    $leadertol = pdo_fetchcolumn("SELECT count(*) FROM " . tablename($this->table_leader) . " WHERE uniacid=:uniacid AND branchid IN (" . $lbranchallid . ") ", array(':uniacid' => $_W['uniacid']));
    // die;
}
include $this->template("admin/home");