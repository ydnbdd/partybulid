<?php

global $_W, $_GPC;
$uniacid = $_W['uniacid'];
$op = $operation = $_GPC['op'] ? $_GPC['op'] : 'display';
load()->func('tpl');
if ($op == 'display') {
    $pindex = max(1, intval($_GPC['page']));
    $psize = 50;
    $con = ' WHERE l.uniacid=:uniacid ';
    $par[':uniacid'] = $_W['uniacid'];
    $title = trim($_GPC['title']);
    if (!empty($title)) {
        $con .= " AND l.title LIKE :title ";
        $par[':title'] = '%' . $title . '%';
    }
    $status = intval($_GPC['status']);
    if ($status != 0) {
        $con .= " AND l.status=:status ";
        $par[':status'] = $status;
    }
    $realname = trim($_GPC['realname']);
    if (!empty($realname)) {
        $con .= " AND u.realname=:realname ";
        $par[':realname'] = $realname;
    }
    $list = pdo_fetchall("SELECT l.*,u.nickname,u.realname,u.mobile,u.headpic FROM " . tablename($this->table_mallog) . " l LEFT JOIN " . tablename($this->table_user) . " u ON l.userid=u.id " . $con . " ORDER BY l.id DESC LIMIT " . ($pindex - 1) * $psize . "," . $psize, $par);
    $total = pdo_fetchcolumn("SELECT count(l.id) FROM " . tablename($this->table_mallog) . " l LEFT JOIN " . tablename($this->table_user) . " u ON l.userid=u.id " . $con, $par);
    $pager = pagination($total, $pindex, $psize);
    if ($_GPC['output'] == 1) {
        $list_out = pdo_fetchall("SELECT l.*,u.nickname,u.realname,u.mobile,u.headpic FROM " . tablename($this->table_mallog) . " l LEFT JOIN " . tablename($this->table_user) . " u ON l.userid=u.id " . $con . " ORDER BY l.id DESC ", $par);
        foreach ($list_out as $k => $v) {
            $data[$k]['id'] = $v['id'];
            $data[$k]['nickname'] = $v['nickname'];
            $data[$k]['realname'] = $v['realname'];
            $data[$k]['mobile'] = $v['mobile'] . "\t";
            $data[$k]['title'] = $v['title'];
            $data[$k]['integral'] = $v['integral'];
            $data[$k]['status'] = $v['status'] == 1 ? '待领取' : '已领取';
            $data[$k]['createtime'] = date('Y-m-d H:i:s', $v['createtime']) . "\t";
            $data[$k]['updatetime'] = $v['updatetime'] == 0 ? '待领取' : date('Y-m-d H:i:s', $v['updatetime']) . "\t";
        }
        $arrhead = array("序号ID", "昵称", "姓名", "手机号", "姓名", "手机号", "商品名称", "消耗积分", "状态", "兑换时间", "领取时间");
        export_excel($data, $arrhead, time());
        exit;
    }
} elseif ($op == 'setstatus') {
    $id = intval($_GPC['id']);
    $mallog = pdo_get($this->table_mallog, array('id' => $id, 'uniacid' => $_W['uniacid']));
    if (empty($mallog)) {
        message('要核销的兑换记录不存在或是已经被删除！', referer(), 'error');
    }
    if ($mallog['status'] == 2) {
        message('该订单已核销，请不要重复操作！', referer(), 'error');
    }
    pdo_update($this->table_mallog, array('status' => 2, 'updatetime' => time()), array('id' => $id));
    message('订单记录信息核销成功！', referer(), 'success');
} elseif ($op == 'delete') {
    $id = intval($_GPC['id']);
    $mallog = pdo_get($this->table_mallog, array('id' => $id, 'uniacid' => $_W['uniacid']));
    if (empty($mallog)) {
        message('要删除的兑换记录不存在或是已经被删除！', referer(), 'error');
    }
    pdo_delete($this->table_mallog, array('id' => $id));
    message('兑换记录信息删除成功！', referer(), 'success');
} elseif ($op == 'deleteall') {
    $idstr = implode(",", $_GPC['idArr']);
    $result = pdo_query("delete from " . tablename($this->table_mallog) . " WHERE id IN (" . $idstr . ")");
    if (!empty($result)) {
        exit("success");
    }
    exit("error");
}
include $this->template('mallog');