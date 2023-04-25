<?php

global $_W, $_GPC;
$op = $_GPC['op'] ? $_GPC['op'] : 'display';
$param = $this->getParam();
$user = $this->getUser();
if ($op == "display") {
    $cateid = intval($_GPC['cateid']);
    $userid = intval($_GPC['userid']);
    $keywords = trim($_GPC['keywords']);
    $malcate = pdo_fetch("SELECT * FROM " . tablename($this->table_malcate) . " WHERE uniacid=:uniacid AND id=:cateid ", array(':uniacid' => $_W['uniacid'], ':cateid' => $cateid));
    $malcatelist = pdo_fetchall("SELECT * FROM " . tablename($this->table_malcate) . " WHERE uniacid=:uniacid ORDER BY priority DESC, id DESC", array(':uniacid' => $_W['uniacid']), 'id');
} elseif ($op == "getmore") {
    $pindex = max(1, intval($_GPC['page']));
    $psize = 20;
    $con = " WHERE status=2 AND uniacid=:uniacid ";
    $par = array(':uniacid' => $_W['uniacid']);
    $keywords = trim($_GPC['keywords']);
    if (!empty($keywords)) {
        $con .= " AND title LIKE :keywords ";
        $par[':keywords'] = '%' . $keywords . '%';
    }
    $cateid = intval($_GPC['cateid']);
    if ($cateid != 0) {
        $con .= " AND cateid=:cateid ";
        $par[':cateid'] = $cateid;
    }
    $userid = intval($_GPC['userid']);
    if ($userid != 0) {
        $con .= " AND integral<=:integral ";
        $par[':integral'] = $user['integral'];
    }
    $list = pdo_fetchall("SELECT * FROM " . tablename($this->table_malgoods) . $con . " ORDER BY priority DESC, id DESC LIMIT " . ($pindex - 1) * $psize . ',' . $psize, $par);
    if (empty($list)) {
        exit("NOTHAVE");
    }
}
include $this->template('malcate');