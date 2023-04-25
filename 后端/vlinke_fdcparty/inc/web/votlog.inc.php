<?php

global $_W, $_GPC;
load()->func('tpl');
$op = !empty($_GPC['op']) ? $_GPC['op'] : 'display';
if ($op == 'display') {
    $pindex = max(1, intval($_GPC['page']));
    $psize = 50;
    $con = ' WHERE tab.uniacid=:uniacid ';
    $par[':uniacid'] = $_W['uniacid'];
    $keyword = trim($_GPC['keyword']);
    if (!empty($keyword)) {
        $con .= " AND ( project.title LIKE :keyword OR item.title LIKE :keyword OR user.title LIKE :keyword ) ";
        $par[':keyword'] = '%' . $keyword . '%';
    }
    $projectid = intval($_GPC['projectid']);
    if ($projectid != 0) {
        $con .= " AND tab.projectid=:projectid ";
        $par[':projectid'] = $projectid;
    }
    $itemid = intval($_GPC['itemid']);
    if ($itemid != 0) {
        $con .= " AND tab.itemid=:itemid ";
        $par[':itemid'] = $itemid;
    }
    $userid = intval($_GPC['userid']);
    if ($userid != 0) {
        $con .= " AND tab.userid=:userid ";
        $par[':userid'] = $userid;
    }
    $list = pdo_fetchall("SELECT tab.*,user.realname,user.mobile,project.title as ptitle,item.title as ititle FROM " . tablename($this->table_votlog) . " tab LEFT JOIN " . tablename($this->table_user) . " user ON tab.userid=user.id LEFT JOIN " . tablename($this->table_votproject) . " project ON tab.projectid=project.id LEFT JOIN " . tablename($this->table_votitem) . " item ON tab.itemid=item.id " . $con . " ORDER BY tab.id DESC LIMIT " . ($pindex - 1) * $psize . "," . $psize, $par);
    $total = pdo_fetchcolumn("SELECT count(tab.id) FROM " . tablename($this->table_votlog) . " tab LEFT JOIN " . tablename($this->table_user) . " user ON tab.userid=user.id LEFT JOIN " . tablename($this->table_votproject) . " project ON tab.projectid=project.id LEFT JOIN " . tablename($this->table_votitem) . " item ON tab.itemid=item.id " . $con, $par);
    $pager = pagination($total, $pindex, $psize);
    $project = pdo_getall($this->table_votproject, array('uniacid' => $_W['uniacid']), '', 'id');
    if ($_GPC['output'] == 1) {
        $list = pdo_fetchall("SELECT tab.*,user.realname,user.mobile,project.title as ptitle,item.title as ititle FROM " . tablename($this->table_votlog) . " tab LEFT JOIN " . tablename($this->table_user) . " user ON tab.userid=user.id LEFT JOIN " . tablename($this->table_votproject) . " project ON tab.projectid=project.id LEFT JOIN " . tablename($this->table_votitem) . " item ON tab.itemid=item.id " . $con . " ORDER BY tab.id DESC ", $par);
        $data = array();
        foreach ($list as $k => $v) {
            $data[$k] = array('id' => $v['id'], 'ptitle' => $v['ptitle'], 'ititle' => $v['ititle'], 'realname' => $v['realname'], 'mobile' => $v['mobile'] . "\t", 'createtime' => date("Y-m-d H:i:s", $v['createtime']) . "\t");
        }
        $arrhead = array("序号ID", "项目", "投票项", "投票人", "投票人手机号", "投票时间");
        export_excel($data, $arrhead, time());
        exit;
    }
} elseif ($op == 'delete') {
    $id = intval($_GPC['id']);
    $votelog = pdo_get($this->table_votlog, array('id' => $id, 'uniacid' => $_W['uniacid']));
    if (empty($votelog)) {
        message('要删除的数据不存在或是已经被删除！', referer(), 'error');
    }
    $result = pdo_delete($this->table_votlog, array('id' => $id, 'uniacid' => $_W['uniacid']));
    if (!empty($result)) {
        message("数据删除成功！", referer(), 'success');
    }
    message("数据删除失败，请刷新页面重试！", referer(), 'error');
} elseif ($op == 'deleteall') {
    $idstr = implode(",", $_GPC['idArr']);
    $result = pdo_query("delete from " . tablename($this->table_votlog) . " WHERE id IN (" . $idstr . ")");
    if (!empty($result)) {
        exit("success");
    }
    exit("error");
}
include $this->template('votlog');