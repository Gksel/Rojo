<?php
class Weixin
{
    public $token = 'gksel';//token
    public $debug =  false;//是否debug的状态标示，方便我们在调试的时候记录一些中间数据
    public $setFlag = false;
    public $msgtype = 'text';   //('text','image','location')
    public $msg = array();
 
    public function __construct($token,$debug)
    {
        $this->token = $token;
        $this->debug = $debug;
    } 
    
    //获得用户发过来的消息（消息内容和消息类型  ）
    public function getMsg()
    {
        $postStr = $GLOBALS["HTTP_RAW_POST_DATA"];
        if ($this->debug) {
			$this->write_log($postStr);
        }
        if (!empty($postStr)) {
            $this->msg = (array)simplexml_load_string($postStr, 'SimpleXMLElement', LIBXML_NOCDATA);
            $this->msgtype = strtolower($this->msg['MsgType']);
        }
    }
    

    //推动视频消息
    public function makevideo($text='')
    {
    	$CreateTime = time();
    	$FuncFlag = $this->setFlag ? 1 : 0;
    	$textTpl = "<xml>
			<ToUserName><![CDATA[{$this->msg['FromUserName']}]]></ToUserName>
			<FromUserName><![CDATA[{$this->msg['ToUserName']}]]></FromUserName>
			<CreateTime>{$CreateTime}</CreateTime>
			<MsgType><![CDATA[video]]></MsgType>
			<MediaId><![CDATA[ND6ncPWvuhJ1FxPwGKAp_LFctPhWm1hfIXSl8fUi7Wo]]></MediaId>
			<ThumbMediaId><![CDATA[vYX5YzkQy4HkkPNd2rM6Bv8hgffWLwoSwTSKYszr-jg]]></ThumbMediaId>
			<MsgId>209024389</MsgId>
		</xml>";
    	return sprintf($textTpl,$text,$FuncFlag);
    }
    
    public function makepicture($media_id, $text=''){
    	$CreateTime = time();
    	$FuncFlag = $this->setFlag ? 1 : 0;
    	$textTpl = "<xml>
    	<ToUserName><![CDATA[{$this->msg['FromUserName']}]]></ToUserName>
    	<FromUserName><![CDATA[{$this->msg['ToUserName']}]]></FromUserName>
    	<CreateTime>{$CreateTime}</CreateTime>
    	<MsgType><![CDATA[image]]></MsgType>
    	<Image>
			<MediaId><![CDATA[".$media_id."]]></MediaId>
		</Image>
    	</xml>";
    	return sprintf($textTpl,$text,$FuncFlag);
    }

    //回复语音消息
    public function makevioce($text='')
    {
    	$CreateTime = time();
    	$FuncFlag = $this->setFlag ? 1 : 0;
    	$textTpl = "<xml>
			<ToUserName><![CDATA[{$this->msg['FromUserName']}]]></ToUserName>
			<FromUserName><![CDATA[{$this->msg['ToUserName']}]]></FromUserName>
			<CreateTime>{$CreateTime}</CreateTime>
			<MsgType><![CDATA[voice]]></MsgType>
			<Voice>
			<MediaId><![CDATA[wpL6LqDKcOxtMmZKqy5kFdp3MXkRiQJajikPobXar0yCz2tL_5YFG2vq5Z2dxJ5y]]></MediaId>
			</Voice>
			</xml>";
    	return sprintf($textTpl,$text,$FuncFlag);
    }
    
    //回复音乐消息
    public function makemusic($text='')
    {
    	$CreateTime = time();
    	$FuncFlag = $this->setFlag ? 1 : 0;
    	$textTpl = "<xml>
    			<ToUserName><![CDATA[{$this->msg['FromUserName']}]]></ToUserName>
    			<FromUserName><![CDATA[{$this->msg['ToUserName']}]]></FromUserName>
    			<CreateTime>{$CreateTime}</CreateTime>
    			<MsgType><![CDATA[music]]></MsgType><Music>
    			<Title><![CDATA[Mp3 title]]></Title>
    			<Description><![CDATA[Mp3 description]]></Description>
    			<MusicUrl><![CDATA[http://www.gksel.cn/weixin/mp3/bushiyinweijimocaixiangni.mp3]]></MusicUrl>
    			<HQMusicUrl><![CDATA[http://www.gksel.cn/weixin/mp3/bushiyinweijimocaixiangni.mp3]]></HQMusicUrl></Music>
    			<ThumbMediaId><![CDATA[200661684]]></ThumbMediaId>
    			<FuncFlag>0</FuncFlag>
    			</xml>";
    	return sprintf($textTpl,$text,$FuncFlag);
    }
    
    //回复文本消息
    public function makeText($text='')
    {
        $CreateTime = time();
        $FuncFlag = $this->setFlag ? 1 : 0;
        $textTpl = "<xml>
            <ToUserName><![CDATA[{$this->msg['FromUserName']}]]></ToUserName>
            <FromUserName><![CDATA[{$this->msg['ToUserName']}]]></FromUserName>
            <CreateTime>{$CreateTime}</CreateTime>
            <MsgType><![CDATA[text]]></MsgType>
            <Content><![CDATA[%s]]></Content>
            <FuncFlag>%s</FuncFlag>
            </xml>";
        return sprintf($textTpl,$text,$FuncFlag);
    }
    
    //回复文本消息
    public function makeEmptyText($text='')
    {
    	return '';
    }
    
    //根据数组参数回复图文消息
    public function makeNews($newsData=array())
    {
        $CreateTime = time();
        $FuncFlag = $this->setFlag ? 1 : 0;
        $newTplHeader = "<xml>
            <ToUserName><![CDATA[{$this->msg['FromUserName']}]]></ToUserName>
            <FromUserName><![CDATA[{$this->msg['ToUserName']}]]></FromUserName>
            <CreateTime>{$CreateTime}</CreateTime>
            <MsgType><![CDATA[news]]></MsgType>
            <Content><![CDATA[%s]]></Content>
            <ArticleCount>%s</ArticleCount><Articles>";
        $newTplItem = "<item>
            <Title><![CDATA[%s]]></Title>
            <Description><![CDATA[%s]]></Description>
            <PicUrl><![CDATA[%s]]></PicUrl>
            <Url><![CDATA[%s]]></Url>
            </item>";
        $newTplFoot = "</Articles>
            <FuncFlag>%s</FuncFlag>
            </xml>";
        $Content = '';
        $itemsCount = count($newsData['items']);
        $itemsCount = $itemsCount < 10 ? $itemsCount : 10;//微信公众平台图文回复的消息一次最多10条
        if ($itemsCount) {
            foreach ($newsData['items'] as $key => $item) {
                if ($key<=9) {
                    $Content .= sprintf($newTplItem,$item['title'],$item['description'],$item['picurl'],$item['url']);
                }
            }
        }
        $header = sprintf($newTplHeader,$newsData['content'],$itemsCount);
        $footer = sprintf($newTplFoot,$FuncFlag);
        return $header . $Content . $footer;
    }
    
    public function reply($data)
    {
        if ($this->debug) {
            $this->write_log($data);
        }
        echo $data;
    }
    
    public function valid()
    {
        if ($this->checkSignature()) {
            if( $_SERVER['REQUEST_METHOD']=='GET' )
            {
                echo $_GET['echostr'];
                exit;
            }
        }else{
            write_log('认证失败');
            exit;
        }
    }
    
    private function checkSignature()
    {
        $signature = $_GET["signature"];
        $timestamp = $_GET["timestamp"];
        $nonce = $_GET["nonce"];
 
        $tmpArr = array($this->token, $timestamp, $nonce);
        sort($tmpArr);
        $tmpStr = implode( $tmpArr );
        $tmpStr = sha1( $tmpStr );
 
        if( $tmpStr == $signature ){
            return true;
        }else{
            return false;
        }
    }
    
    private function write_log($log){
    	//这里是你记录调试信息的地方  请自行完善   以便中间调试　　
    }
}
?>