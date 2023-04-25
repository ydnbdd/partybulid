<?php

global $_W, $_GPC;
$op = $_GPC['op'] ? $_GPC['op'] : 'display';
$param = $this->getParam();
$user = $this->getUser();
if ($op == "display") {
} elseif ($op == "getmore") {
    $pindex = max(1, intval($_GPC['page']));
    $psize = 20;
    $con = " WHERE userid=:userid AND uniacid=:uniacid ";
    $par = array(':uniacid' => $_W['uniacid'], ':userid' => $user['id']);
    $status = intval($_GPC['status']);
    if ($status != 0) {
        $con .= " AND status=:status ";
        $par[':status'] = $status;
    }
    $list = pdo_fetchall("SELECT * FROM " . tablename($this->table_mallog) . $con . " ORDER BY id DESC LIMIT " . ($pindex - 1) * $psize . ',' . $psize, $par);
    if (empty($list)) {
        exit("NOTHAVE");
    }
} elseif ($op == "setlog") {
    $ret = array('ret' => 'error', 'msg' => 'error');
    $logid = intval($_GPC['logid']);
    $mallog = pdo_get($this->table_mallog, array('id' => $logid, 'uniacid' => $_W['uniacid']));
    if (empty($mallog)) {
        $ret['msg'] = "兑换记录信息不存在！";
        exit(json_encode($ret));
    }
    if ($mallog['status'] == 2) {
        $ret['msg'] = "该兑换商品已核销领取！";
        exit(json_encode($ret));
    }
    $malgoods = pdo_get($this->table_malgoods, array('id' => $mallog['goodsid'], 'uniacid' => $_W['uniacid']));
    if (empty($malgoods)) {
        message("商品信息不存在！", referer(), "error");
    }
    $password = trim($_GPC['password']);
    if (!empty($malgoods['password']) && $password != $malgoods['password']) {
        $ret['msg'] = "核销密码不正确！";
        exit(json_encode($ret));
    } elseif ($password != $param['malpassword']) {
        $ret['msg'] = "核销密码不正确！！！";
        exit(json_encode($ret));
    }
    pdo_update($this->table_mallog, array('status' => 2, 'updatetime' => time()), array('id' => $logid));
    $ret['ret'] = 'success';
    $ret['msg'] = "兑换商品核销领取成功。";
    exit(json_encode($ret));
}
include $this->template('mallog');