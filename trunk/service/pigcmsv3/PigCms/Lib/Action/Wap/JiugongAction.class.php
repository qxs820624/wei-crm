<?php
class JiugongAction extends LotteryBaseMoreAction{
	public function index(){
		$agent = $_SERVER['HTTP_USER_AGENT'];
		if(!strpos($agent,"icroMessenger")) {}
		$token		= $this->_get('token');
		$wecha_id	= $this->wecha_id;
		$id 		= $this->_get('id');
		if($id == ''){
			$this->error("不存在的活动");
		}
		$redata		= M('Lottery_record');
		$where 		= array('token'=>$token,'wecha_id'=>$wecha_id,'lid'=>$id);
		$record 	= $redata->where(array('token'=>$token,'wecha_id'=>$wecha_id,'lid'=>$id,'islottery'=>1))->order('time desc')->select();
		$record2 	= $redata->where($where)->order('id DESC')->find();
		
		$Lottery 	= M('Lottery')->where(array('id'=>$id,'token'=>$token,'type'=>10,'status'=>1))->find();
		if(!($Lottery)){
			$this->error("不存在的活动!");
		}
		if($Lottery['guanzhu'] == 1 && $this->isSubscribe() == false){
			$this->memberNotice('',1);
		}elseif(($Lottery['needreg'] == 1 && $this->fans['tel'] == '')){
			$this->memberNotice();
		}
		$Lottery['renametel']=$Lottery['renametel']?$Lottery['renametel']:'手机号';
		$Lottery['renamesn']=$Lottery['renamesn']?$Lottery['renamesn']:'SN码';
		if($Lottery['daynums'] > 0){
			$Lottery['numtype'] = 1;
		}
		$data=$Lottery;
		//显示奖项,说明,时间
		if ($Lottery['enddate'] < time()) {
			 $data['end'] = 1;
			 $data['endinfo'] = $Lottery['endinfo'];
			 $data['lid']		= $Lottery['id'];
			 $this->assign('record',$record);
			 $this->assign('Dazpan',$data);
			 $this->display();
			 exit();
		}
		//抽取次数
		$data['On'] 		= 1;
		$data['token'] 		= $token;
		$data['wecha_id']	= $wecha_id;		
		$data['lid']		= $Lottery['id'];
		$data['usenums'] 	= $record2['usenums'];
		$data['sharecount'] = $record2['sharecount'];
		$data['info']=str_replace('&lt;br&gt;','<br>',$data['info']);
		$data['endinfo']=str_replace('&lt;br&gt;','<br>',$data['endinfo']);
		$this->assign('Dazpan',$data);
		$this->assign('record',$record);
		$where_list = array('token'=>$token,'lid'=>$id);
		$where_list['phone'] = array('neq','');
		$record_list = $redata->where($where_list)->select();
		$this->assign("record_list",$record_list);
		$this->assign('siteUrl',$this->siteUrl);
		$this->display();
	}
	public function getajax(){
		$token 		=	$_POST['token'];
		$wecha_id	=	$_POST['oneid'];
		$id 		=	$_POST['id'];
		$fwy = md5($token.$wecha_id.$id.'PIGCMS'.$this->siteUrl);
		if($fwy == $_POST['fwy']){
			$Lottery=M('Lottery')->where(array('id'=>$id))->find();
			$data=$this->prizeHandle($token,$wecha_id,$Lottery);
			if ($data['end']==3){
				$sn	 	 = $data['sn'];
				$uname	 = $data['wecha_name'];
				$prize	 = $data['prize'];
				$tel 	 = $data['phone'];
				$msg = $data['msg'];
				echo '{"error":1,"msg":"'.$msg.'"}';
				exit;
			}
			if($data['end'] == 4){
				$msg = $data['msg'];
				echo '{"error":1,"msg":"'.$msg.'"}';
				exit;
			}
			if ($data['end']==-1){
				$msg = $data['winprize'];
				echo '{"error":1,"msg":"'.$msg.'"}';
				exit;
			}
			if ($data['end']==-2){
				$msg = $data['winprize'];
				echo '{"error":1,"msg":"'.$msg.'"}';
				exit;
			}
			if ($data['end']==-3){
				$msg = $data['winprize'];
				echo '{"error":1,"msg":"'.$msg.'"}';
				exit;
			}
			
			if ($data['prizetype'] >= 1 && $data['prizetype'] <= 6) {
				echo '{"success":1,"sn":"'.$data['sncode'].'","prizetype":"'.$data['prizetype'].'","usenums":"'.$data['usenums'].'","rid":"'.$data['rid'].'"}';
			}else{
				echo '{"success":0,"prizetype":"","usenums":"'.$data['usenums'].'"}';
			}
			exit();
		}else{
			echo '你真调皮';
		}
	}
}