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
    $ptype = intval($_GPC['ptype']);
    if ($ptype != 0) {
        $con .= " AND ptype=:ptype ";
        $par[':ptype'] = $ptype;
    }
    $projectid = intval($_GPC['projectid']);
    if ($projectid != 0) {
        $con .= " AND projectid=:projectid ";
        $par[':projectid'] = $projectid;
    }
    $pindex = max(1, intval($_GPC['page']));
    $psize = 20;
    $list = pdo_fetchall('SELECT * FROM ' . tablename($this->table_votitem) . $con . ' ORDER BY id DESC LIMIT ' . ($pindex - 1) * $psize . ',' . $psize, $par);
    $total = pdo_fetchcolumn('SELECT count(id) FROM ' . tablename($this->table_votitem) . $con, $par);
    $pager = pagination($total, $pindex, $psize);
    $votproject = pdo_getall($this->table_votproject, array('uniacid' => $_W['uniacid']), '', 'id');
    if ($_GPC['output'] == 1) {
        $list = pdo_fetchall('SELECT * FROM ' . tablename($this->table_votitem) . $con . ' ORDER BY vnumber DESC, id DESC ', $par);
        $data = array();
        foreach ($list as $k => $v) {
            $data[$k] = array('id' => $v['id'], 'ptitle' => $votproject[$v['projectid']]['title'], 'itemno' => $v['itemno'] . "\t", 'title' => $v['title'], 'vnumber' => $v['vnumber']);
        }
        $arrhead = array("序号ID", "项目", "编号", "投票项", "得票数");
        export_excel($data, $arrhead, time());
        exit;
    }
} elseif ($op == 'post') {
    $id = intval($_GPC['id']);
    $votitem = pdo_get($this->table_votitem, array('id' => $id, 'uniacid' => $_W['uniacid']));
    if (checksubmit('submit')) {
        $data = array('uniacid' => $_W['uniacid'], 'projectid' => intval($_GPC['projectid']), 'itemno' => trim($_GPC['itemno']), 'title' => trim($_GPC['title']), 'tilpic' => trim($_GPC['tilpic']), 'details' => $_GPC['details'], 'vnumber' => intval($_GPC['vnumber']));
        if (!empty($id)) {
            pdo_update($this->table_votitem, $data, array('id' => $id));
        } else {
            pdo_insert($this->table_votitem, $data);
        }
        message('信息更新成功！', $this->createWebUrl('votitem'), 'success');
    }
    if (empty($votitem)) {
        $votitem = array('vnumber' => 0);
    }
    $votproject = pdo_getall($this->table_votproject, array('uniacid' => $_W['uniacid']), '', 'id');
} elseif ($op == 'delete') {
    $id = intval($_GPC['id']);
    $votitem = pdo_get($this->table_votitem, array('id' => $id, 'uniacid' => $_W['uniacid']));
    if (empty($votitem)) {
        message('要删除的项目不存在或是已经被删除！', referer(), 'error');
    }
    pdo_delete($this->table_votlog, array('itemid' => $id, 'uniacid' => $_W['uniacid']));
    $result = pdo_delete($this->table_votitem, array('id' => $id, 'uniacid' => $_W['uniacid']));
    if (!empty($result)) {
        message("数据删除成功！", referer(), 'success');
    }
    message("数据删除失败，请刷新页面重试！", referer(), 'error');
}
include $this->template('votitem');