<?php
  header("Content-type: text/html; charset=utf-8"); 
  define ( "TOKEN", "egaotan" );   
  
  $wechatObj = new WeiXin();

  class WeiXin{
    private static $ACCESS_TOKEN = 0;  //��ǰaccess_token��ֵ
    private static $ACCESS_TIME = 0;  //access_token���һ�θ��µ�ʱ��
    private static $XMLDATA;  //���������xml����
    private static $ARRELE = array();  //��������xml�ڵ� �����ж���������������
    public function __construct()
    {
      // $this->valid();die;   //��������֤
      // $this->createMenu();die;   //�Զ���˵�
      $path = dirname(__FILE__);
      $acpath = $path."/weixin.c";  //������һ��access_token���µ�ʱ��
      $access = $path."/access_token.c";  //���һ�θ��µ�access_token
      $xml = $path."/xmldata.c";   //������һ�ν��յ�xml����
      
      //���access_token�Ƿ����
      if(!file_exists($acpath)){		
        $this->getAssessToken();
        file_put_contents($acpath, self::$ACCESS_TIME);
        file_put_contents($access, self::$ACCESS_TOKEN);		
      }else
      {
        $acint = file_get_contents($acpath)+0;
        if((time()-$acint)>=7000)
        {
          $this->getAssessToken();
          file_put_contents($acpath, self::$ACCESS_TIME);
          file_put_contents($access, self::$ACCESS_TOKEN);
        }else
        {
          self::$ACCESS_TOKEN = file_get_contents($access);
        }
      }
      //У����Ϣ��ʵ�ԣ���ֹ΢������ĵ�������ˮ�����ˣ�
      $this->checkSignature();
      //�������xml���ݴ�Ϊȫ��
      self::$XMLDATA = $GLOBALS["HTTP_RAW_POST_DATA"];
      //���xml������־
      file_put_contents($xml, self::$XMLDATA);

      $this->begin();
    } 
    

    private function begin()
    {

      $postObj = simplexml_load_string(self::$XMLDATA, 'SimpleXMLElement', LIBXML_NOCDATA);
      foreach ($postObj as $key => $value) {
        array_push(self::$ARRELE,$key);
      }
      
      //�¼���Ϣ
      if(in_array("Event", self::$ARRELE))
      {	
        //���û���ע
        if($postObj->Event=="subscribe")
        {
          $textTpl = "
          <xml>
          <ToUserName><![CDATA[".$postObj->FromUserName."]]></ToUserName>
          <FromUserName><![CDATA[".$postObj->ToUserName."]]></FromUserName>
          <CreateTime>".time()."</CreateTime>
          <MsgType><![CDATA[news]]></MsgType>
          <ArticleCount>2</ArticleCount>
          <Articles>
          <item>
          <Title><![CDATA[�������͸������������ȯ��iPhone6�󽱵������ã�]]></Title> 
          <Description><![CDATA[�������͸���]]></Description>
          <PicUrl><![CDATA[http://aidaijia.com/Public/Index/image/tu1.jpg]]></PicUrl>
          <Url><![CDATA[http://aidaijia.com/home]]></Url>
          </item>
          <item>
          <Title><![CDATA[�ƺ��г�զ���ߣ�������ֻ��29]]></Title>
          <Description><![CDATA[���������29Ԫ��]]></Description>
          <PicUrl><![CDATA[http://aidaijia.com/Public/Index/image/syx4.jpg]]></PicUrl>
          <Url><![CDATA[http://aidaijia.com/Index/Index/price]]></Url>
          </item>
          </Articles>
          </xml>";  
          echo $textTpl;
          return ;
        }
        //ȡ����ע
        if($postObj->Event=="unsubscribe")
        {
          $sql = "delete from dj_weixin where wuser='$postObj->FromUserName'";
          $mysqli = new mysqli("localhost", "username", "666666", "driver");
          $mysqli->query($sql);
          $mysqli->close();
          return ;
        }

        //�����û�������
        if($postObj->Event=='LOCATION')
        {
          //�ϱ�����λ���¼�
          if(in_array("Latitude",self::$ARRELE) )
          {
            $time = time();
            $obj = simplexml_load_string(self::$XMLDATA, 'SimpleXMLElement', LIBXML_NOCDATA);
            $sql = "insert into `dj_weixin` (`wuser`, `wlon`, `wlat`, `wtime`,`wto`) values ('$obj->FromUserName', $obj->Longitude, $obj->Latitude, $time,'$obj->ToUserName') ON DUPLICATE KEY UPDATE `wlon` = $obj->Longitude, `wlat` = $obj->Latitude, `wtime` =$time, `wto` ='$obj->ToUserName' ;";
            // $access = dirname(__FILE__)."/access_token.c";
            // file_put_contents($access, $sql);
            $mysqli = new mysqli("localhost", "username", "666666", "driver");
            $mysqli->query($sql);
            $mysqli->close();
            return;
          }
        }
        
      }
      //�û�����������λ����Ϣ
      if(in_array("Location_X",self::$ARRELE))
      {
        self::fdriver();
        return;
      }
      //�Զ���˵��¼�
      if(in_array("EventKey",self::$ARRELE))
      {

        if(substr($postObj->EventKey,0,3)=='WD_')
        {
          self::menuevent();
          return ;
        }
      }
      //��ͨ��Ϣ
      if($postObj->MsgType=='text')
      {
        self::responseMsg();
        return;
      }
    }

    private function checkSignature(){
      $signature = $_GET["signature"];
      $timestamp = $_GET["timestamp"];
      $nonce = $_GET["nonce"];	
          
      $token = TOKEN;
      $tmpArr = array($token, $timestamp, $nonce);
      sort($tmpArr, SORT_STRING);
      $tmpStr = implode( $tmpArr );
      $tmpStr = sha1( $tmpStr );
      
      if( $tmpStr == $signature ){
        return true;
      }else{
        return false;
      }
    }
    
    
    //��ȡaccess_token
    public function getAssessToken(){
      $url = "https://api.weixin.qq.com/cgi-bin/token?grant_type=client_credential&appid=wxfa50fcdbae10f8c8&secret=e845e613792e369034a91b9bd2db513a ";
      $curl = curl_init($url);
      curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);  //���ļ�������ʽ����
      $data = curl_exec($curl);
      $arr = json_decode($data, true); //�ѷ��ص�json�ַ���ת��Ϊ����
      self::$ACCESS_TOKEN = $arr['access_token'];  //����access_token
      self::$ACCESS_TIME = time();  //���һ�λ�ȡaccess_token��ʱ��
      curl_close($curl);
      // echo self::$ACCESS_TOKEN."<br>";
      // echo self::$ACCESS_TIME."<br>";
    }

  

    //�ظ��ı���Ϣ
    public function responseMsg()
    {
        $postObj = simplexml_load_string(self::$XMLDATA, 'SimpleXMLElement', LIBXML_NOCDATA);
      $fromUsername = $postObj->FromUserName;
      $toUsername = $postObj->ToUserName;
      $content = $postObj->Content;
      $contentStr = "";
      if(substr($content,0,1)=='@')
      {
        $pos = substr($content,1);
        if(strlen($pos)!=11)
        {
          $contentStr = "��ܰ��ʾ������д��ȷ���ֻ���";
        }else
        {
          $path = dirname(__FILE__);
          $xmlele = $path."/xmlele.c";
          $sql = "select * from dj_order_info where from_phonenum='$pos' order by orderid desc limit 4";
          $mysqli = new mysqli("localhost", "username", "666666", "driver");
          $result = $mysqli->query($sql);
          $mysqli->close();
          while($obj = $result->fetch_object()){ 
            $contentStr.="����".$obj->order_num."\n------->ʱ��".substr($obj->call_time,5,5)."\n";
          } 
          if($contentStr=='')
            $contentStr = "��ã�û�в�ѯ����ض���";
        }
      }
      $time = time();
      $textTpl = "<xml>
            <ToUserName><![CDATA[%s]]></ToUserName>
            <FromUserName><![CDATA[%s]]></FromUserName>
            <CreateTime>%s</CreateTime>
            <MsgType><![CDATA[%s]]></MsgType>
            <Content><![CDATA[%s]]></Content>
            <FuncFlag>0</FuncFlag>
            </xml>";			 
        $msgType = "text";
        if($contentStr=='')
        $contentStr = "��ã����ǰ����ݣ����������������Ҵ��ݣ����ڶ�����ѯ������΢�������и��ྪϲ��24Сʱ�ͷ�����:4000700029
      ��������һ����ʷ�ƾõĴ��ݹ�˾����˾��������Ϊ�������ž�Ӫ����ּ����ȫ�����кܸߵ�����
      ";
      $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $contentStr);
      echo $resultStr;
    }
    // �Զ���˵��¼���Ϣ
    public static function menuevent()
    {
      $obj = simplexml_load_string(self::$XMLDATA, 'SimpleXMLElement', LIBXML_NOCDATA);
      $eventKey = $obj->EventKey;
      $fromUsername = $obj->FromUserName;
      $toUsername = $postObj->ToUserName;
      $time = time();
      $msgType = "text";
      $content = $eventKey;
      switch($eventKey)
      {
        case "WD_JIAGE":
          $content = "7:00-21:00=>29Ԫ��\n21:00-24:00=>49Ԫ��\n0:00-7:00=>69Ԫ��\n"; break;
        case "WD_ZHAODAIJIA":
          self::finddriver($fromUsername);break;
          // $content = "�뷢�����λ���Ա�Ѱ�Ҹ���˾��:\n1��������·� 'С����' \n2��������·� '+�ż�' \n3����� 'λ��' ͼ��\n4����ɶ�λ���� '����'"; break;
        case "WD_DINGDAN":
          $content = "�뷢��@+�ֻ��Ų�ѯ"; break;
        case "WD_FUWUREXIAN":
          $content = "24Сʱ�������ߣ�4000-7000-29"; break;
        default:
          // $content = "�޷�ʶ��";
      }
      $textTpl = "<xml>
            <ToUserName><![CDATA[%s]]></ToUserName>
            <FromUserName><![CDATA[%s]]></FromUserName>
            <CreateTime>%s</CreateTime>
            <MsgType><![CDATA[%s]]></MsgType>
            <Content><![CDATA[%s]]></Content>
            <FuncFlag>0</FuncFlag>
            </xml>"; 
      $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $msgType, $content);
      echo $resultStr;					
    }
    //Ѱ�Ҹ���˾��������ڿ�����λ�÷�����û����ҷ����ں���Ҫ�ڹ���ƽ̨�����߼�Ȩ�޽ӿڲ�����λ�÷���
    public static function finddriver($username)
    {
      // $access = dirname(__FILE__)."/access_token.c";
      
      $sql = "select * from dj_weixin where wuser = '$username'";
      $mysqli = new mysqli("localhost", "username", "666666", "driver");
      $res = $mysqli->query($sql);
      $mysqli->close();
      $count = 0;
      if($res->num_rows!=0)
      {
        $obj = $res->fetch_object();
        $lon = $obj->wlon;
        $lat = $obj->wlat;
        $fromUsername = $obj->wuser;
        $toUsername = $obj->wto;
        $time = $obj->wtime;
        $nowtime = time();
        if(($nowtime-$time)>120)
        {
          $count=-1;
          goto flag;
        }
        
      }else
      {
        $obj = simplexml_load_string(self::$XMLDATA, 'SimpleXMLElement', LIBXML_NOCDATA);
        $fromUsername = $obj->FromUserName;
        $toUsername = $obj->ToUserName;
        $count = -1;
        goto flag;
      }
      $sql = "call queryDriverByClient($lat,$lon)";
      $mysqli = new mysqli("localhost", "username", "66666666", "driver");
      $result = $mysqli->query($sql);
      $mysqli->close();
      $count = $result->num_rows;
      //���û�л�ȡ���û��ĵ�����Ϣ ֱ����������
      flag :
      $textTpl = "<xml>
            <ToUserName><![CDATA[%s]]></ToUserName>
            <FromUserName><![CDATA[%s]]></FromUserName>
            <CreateTime>%s</CreateTime>
            <MsgType><![CDATA[text]]></MsgType>
            <Content><![CDATA[%s]]></Content>
            <FuncFlag>0</FuncFlag>
            </xml>"; 
      if($count>0)
      {
        $content = "�㸽����".$count."������˾����\n����ȥѡ˾��: http://aidaijia.com/find?lat=".$lat."&lon=".$lon;
      }
      else
      {
        if($count==-1)
          $content = "�޷���ȡ��ĵ���λ�ã�����������ͷ��������ҳ���[�ṩλ����Ϣ]����\n��Ҳ�����ֶ����͵���λ����Ϣ��\n1��������·� 'С����' \n2��������·� '+�ż�' \n3����� 'λ��' ͼ��\n4����ɶ�λ���� '����'";
        else
          $content = "��Ǹ���㸽����û�п���˾��������ԵȻ���ڲ����򲦴�ͷ���ѯ4000-7000-29\n";
      }
      $time = time();
      $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time,	 $content);
      echo $resultStr;
    }

    //Ѱ�Ҹ�����˾��  ���û�п���λ�÷�����û�  (��Ҫ�û��ֶ�����λ����Ϣ)
    public static function fdriver()
    {
      $obj = simplexml_load_string(self::$XMLDATA, 'SimpleXMLElement', LIBXML_NOCDATA);
      
      $lon = $obj->Location_Y ;   //����
      $lat = $obj->Location_X ;  //γ��
      $fromUsername = $obj->FromUserName;
      $toUsername = $obj->ToUserName;
      $sql = "call queryDriverByClient($lat,$lon)";
      $mysqli = new mysqli("localhost", "username", "666666", "driver");
      $result = $mysqli->query($sql);
      $mysqli->close();
      $count = $result->num_rows;
      $textTpl = "<xml>
            <ToUserName><![CDATA[%s]]></ToUserName>
            <FromUserName><![CDATA[%s]]></FromUserName>
            <CreateTime>%s</CreateTime>
            <MsgType><![CDATA[text]]></MsgType>
            <Content><![CDATA[%s]]></Content>
            <FuncFlag>0</FuncFlag>
            </xml>"; 
      if($count>0)
      {
        $content = "�㸽����".$count."������˾����\n����ȥѡ˾��: http://aidaijia.com/find?lat=".$lat."&lon=".$lon;
      }
      else
      {
        $content = "��Ǹ���㸽����û�п���˾��������ԵȻ���ڲ����򲦴�ͷ���ѯ4000-7000-29\n";
      }
      $time = time();
      $resultStr = sprintf($textTpl, $fromUsername, $toUsername, $time, $content);
      echo $resultStr;
    }
    
    //���ò˵�
    public function createMenu(){
      $url = "https://api.weixin.qq.com/cgi-bin/menu/create?access_token=DWJG0l5MhgkJBDfjg032jnOfjwZX3Fatk1PccFNgJuRYr0b8I3w-jd77P2_p95pJd4xtFB_DdZRi5k-WHaSNGA";
      $btnjson =  '{
         "button":[{	
            "type":"click",
            "name":"�Ҵ���",
            "key":"WD_ZHAODAIJIA"
          },
          {
            "name":"΢����",
             "sub_button":[
             {
               "type":"view",
              "name":"΢����",
              "url":"http://aidaijia.com/home"
             },
             {
               "type":"view",
               "name":"·����Ϣ",
               "url":"http://map.baidu.com/mobile/webapp/index/index/foo=bar/vt=map&traffic=on&viewmode=no_ad/?third_party=ucsearchbox#index/index/foo=bar/vt=map&traffic=on&viewmode=no_ad"
             },
             {
               "type":"click",
              "name":"�������",
              "key":"WD_DINGDAN"
             }
             ]
            
          }, 
          {
             "name":"�������",
             "sub_button":[
             {
               "type":"click",
               "name":"��������",
               "key":"WD_FUWUREXIAN"
             },
             {
               "type":"click",
               "name":"�۸��б�",
               "key":"WD_JIAGE"
             },
             {
               "type":"view",
               "name":"���ؿͻ���",
               "url":"http://aidaijia.com/d"
             }
             
           ]
          }]
       }';
      $curl = curl_init();
      curl_setopt($curl, CURLOPT_URL, $url);
      curl_setopt($curl, CURLOPT_POST, 1);
      curl_setopt($curl, CURLOPT_POSTFIELDS, $btnjson);
      $data = curl_exec($curl);
      curl_close($curl);
      echo $data;
    }

    //��֤������
    public function valid()
    {
      $echoStr = $_GET["echostr"];

      //valid signature , option
      if($this->checkSignature()){
        echo $echoStr;
        exit;
      }
    }

    //��β����
    public function __destruct()
    {
      // ..
    }




  }
?>