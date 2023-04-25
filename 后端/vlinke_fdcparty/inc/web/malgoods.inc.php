<?php

global $_W, $_GPC;
load()->func('tpl');
$op = !empty($_GPC['op']) ? $_GPC['op'] : 'display';
if ($op == 'display') {
    $con = " WHERE uniacid=:uniacid ";
    $par[':uniacid'] = $_W['uniacid'];
    $keywords = trim($_GPC['keywords']);
    if (!empty($keywords)) {
        $con .= " AND title LIKE :keywords ";
        $par[':keywords'] = '%' . $keywords . '%';
    }
    $status = intval($_GPC['status']);
    if ($status != 0) {
        $con .= " AND status=:status ";
        $par[':status'] = $status;
    }
    $cateid = intval($_GPC['cateid']);
    if ($cateid != 0) {
        $con .= " AND cateid=:cateid ";
        $par[':cateid'] = $cateid;
    }
    if (isset($_GPC['branchid'])) {
        $con .= " AND branchid=:branchid ";
        $par[':branchid'] = intval($_GPC['branchid']);
    }
    $pindex = max(1, intval($_GPC['page']));
    $psize = 20;
    $list = pdo_fetchall('SELECT * FROM ' . tablename($this->table_malgoods) . $con . ' ORDER BY priority DESC, id DESC LIMIT ' . ($pindex - 1) * $psize . ',' . $psize, $par);
    $total = pdo_fetchcolumn('SELECT count(id) FROM ' . tablename($this->table_malgoods) . $con, $par);
    $pager = pagination($total, $pindex, $psize);
    $cateidarr = array_column($list, 'cateid');
    $branchidarr = array_column($list, 'branchid');
    $malcate = pdo_getall($this->table_malcate, array('uniacid' => $_W['uniacid']), '', 'id');
    $branch = pdo_getall($this->table_branch, array('id' => $branchidarr, 'uniacid' => $_W['uniacid']), '', 'id');
} elseif ($op == 'post') {
    $id = intval($_GPC['id']);
    if (checksubmit('submit')) {
        $cateid = intval($_GPC['cateid']);
        $banderarr = $_GPC['bander'];
        if (empty($banderarr)) {
            $bander = iserializer(array());
        } else {
            $bander = iserializer($banderarr);
        }
        $data = array('uniacid' => $_W['uniacid'], 'cateid' => $cateid, 'title' => trim($_GPC['title']), 'tilpic' => trim($_GPC['tilpic']), 'bander' => $bander, 'integral' => intval($_GPC['integral']), 'stock' => intval($_GPC['stock']), 'sales' => intval($_GPC['sales']), 'details' => $_GPC['details'], 'password' => trim($_GPC['password']), 'status' => intval($_GPC['status']), 'priority' => intval($_GPC['priority']));
        if (!empty($id)) {
            pdo_update($this->table_malgoods, $data, array('id' => $id));
        } else {
            $data['createtime'] = time();
            pdo_insert($this->table_malgoods, $data);
            $id = pdo_insertid();
        }
        message('信息更新成功！', $this->createWebUrl('malgoods', array('op' => 'display')), 'success');
    }
    $malcate = pdo_getall($this->table_malcate, array('uniacid' => $_W['uniacid']));
    $malgoods = pdo_fetch("SELECT * FROM " . tablename($this->table_malgoods) . " WHERE id=:id AND uniacid=:uniacid LIMIT 1 ", array(':id' => $id, ':uniacid' => $_W['uniacid']));
    if (empty($malgoods)) {
        $malgoods = array('bander' => array(), 'integral' => 0, 'stock' => 0, 'sales' => 0, 'status' => 2, 'priority' => 0);
    } else {
        $malgoods['bander'] = iunserializer($malgoods['bander']);
    }
} elseif ($op == 'delete') {
    $id = intval($_GPC['id']);
    pdo_delete($this->table_artmessage, array('malgoodsid' => $id, 'uniacid' => $_W['uniacid']));
    $result = pdo_delete($this->table_malgoods, array('id' => $id));
    if (!empty($result)) {
        message("数据删除成功！", referer(), 'success');
    }
    message("数据删除失败，请刷新页面重试！", referer(), 'error');
} elseif ($op == 'deleteall') {
    $idstr = implode(",", $_GPC['idArr']);
    pdo_query("delete from " . tablename($this->table_artmessage) . " WHERE malgoodsid IN (" . $idstr . ")");
    $result = pdo_query("delete from " . tablename($this->table_malgoods) . " WHERE id IN (" . $idstr . ")");
    if (!empty($result)) {
        exit("success");
    }
    exit("error");
}
include $this->template('malgoods');