<?php

/**
 * 智慧党建云平台
 *
 * @author xiechunbing 732680577
 * @url http://bbs.we7.cc/
 */
defined('IN_IA') or exit('Access Denied');
!defined('vlinke_fdcparty_PATH') && define('vlinke_fdcparty_PATH', IA_ROOT . '/addons/vlinke_fdcparty/');
require_once IA_ROOT . '/addons/vlinke_fdcparty/inc/functions.php';
class vlinke_fdcpartyModuleWxapp extends WeModuleWxapp
{
    public $table_param = "vlinke_fdcparty_param";
    public $table_branch = "vlinke_fdcparty_branch";
    public $table_user = "vlinke_fdcparty_user";
    public $table_leader = "vlinke_fdcparty_leader";
    public $table_integral = "vlinke_fdcparty_integral";
    public $table_slide = "vlinke_fdcparty_slide";
    public $table_notice = "vlinke_fdcparty_notice";
    public $table_artcate = "vlinke_fdcparty_artcate";
    public $table_article = "vlinke_fdcparty_article";
    public $table_artmessage = "vlinke_fdcparty_artmessage";
    public $table_educate = "vlinke_fdcparty_educate";
    public $table_edulesson = "vlinke_fdcparty_edulesson";
    public $table_educhapter = "vlinke_fdcparty_educhapter";
    public $table_edustudy = "vlinke_fdcparty_edustudy";
    public $table_edulog = "vlinke_fdcparty_edulog";
    public $table_edumessage = "vlinke_fdcparty_edumessage";
    public $table_supmailbox = "vlinke_fdcparty_supmailbox";
    public $table_supproposal = "vlinke_fdcparty_supproposal";
    public $table_supreadily = "vlinke_fdcparty_supreadily";
    public $table_supreport = "vlinke_fdcparty_supreport";
    public $table_expcate = "vlinke_fdcparty_expcate";
    public $table_expense = "vlinke_fdcparty_expense";
    public $table_sercate = "vlinke_fdcparty_sercate";
    public $table_seritem = "vlinke_fdcparty_seritem";
    public $table_serlog = "vlinke_fdcparty_serlog";
    public $table_sermessage = "vlinke_fdcparty_sermessage";
    public $table_activity = "vlinke_fdcparty_activity";
    public $table_actenroll = "vlinke_fdcparty_actenroll";
    public $table_actmessage = "vlinke_fdcparty_actmessage";
    public $table_exacate = "vlinke_fdcparty_exacate";
    public $table_exabank = "vlinke_fdcparty_exabank";
    public $table_exadevery = "vlinke_fdcparty_exadevery";
    public $table_exaday = "vlinke_fdcparty_exaday";
    public $table_exapevery = "vlinke_fdcparty_exapevery";
    public $table_exapaper = "vlinke_fdcparty_exapaper";
    public $table_exaanswer = "vlinke_fdcparty_exaanswer";
    public $table_exaitem = "vlinke_fdcparty_exaitem";
    public $table_bbscate = "vlinke_fdcparty_bbscate";
    public $table_bbstopic = "vlinke_fdcparty_bbstopic";
    public $table_bbszan = "vlinke_fdcparty_bbszan";
    public $table_bbsreply = "vlinke_fdcparty_bbsreply";
    public $table_bbscollect = "vlinke_fdcparty_bbscollect";
    // public function __construct() {
    //     global $_W;
    //     global $_GPC;
    //     if (empty($_W['openid'])) {
    //         $this->result(41009, '请先登录');
    //     }
    // }
    // 附件地址
    public function doPageAttachurl()
    {
        global $_W;
        $this->result(0, '', $_W['attachurl']);
    }
    // 上传图片
    public function doPageUploadimage()
    {
        global $_W, $_GPC;
        load()->func('file');
        $img = file_upload($_FILES['upfile'], 'image', '');
        $this->result(0, '', $img);
    }
    // 积分记录
    public function setIntegral($dataarr, $isrank = 1)
    {
        global $_W;
        $dataarr['uniacid'] = $_W['uniacid'];
        $dataarr['isrank'] = $isrank;
        $dataarr['iyear'] = date("Y");
        $dataarr['iseason'] = date("Y") . ceil(date("m") / 3);
        $dataarr['imonth'] = date("Ym");
        $dataarr['createtime'] = time();
        pdo_insert($this->table_integral, $dataarr);
        $insertid = pdo_insertid();
        pdo_update($this->table_user, array('integral +=' => $dataarr['integral']), array('id' => $dataarr['userid']));
        return $insertid;
    }
    // 支付验证
    public function payResult($params)
    {
        global $_W;
        if ($params['result'] == 'success' && $params['from'] == 'notify') {
            $paynumber = $params['tid'];
            $expense = pdo_get($this->table_expense, array('paynumber' => $paynumber));
            $expenseid = $expense['id'];
            pdo_update($this->table_expense, array('status' => 2, 'paytime' => time()), array('id' => $expenseid));
        }
        if ($params['from'] == 'return') {
            if ($params['result'] == 'success') {
                $this->result(0, "支付成功！");
            } else {
                $this->result(1, "支付失败！");
            }
        }
    }
}