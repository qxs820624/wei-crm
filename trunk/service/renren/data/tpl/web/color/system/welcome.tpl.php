<?php defined('IN_IA') or exit('Access Denied');?><?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/header-gw', TEMPLATE_INCLUDEPATH)) : (include template('common/header-gw', TEMPLATE_INCLUDEPATH));?>
<ol class="breadcrumb">
	<li><a href="./?refresh"><i class="fa fa-home"></i></a></li>
	<li class="active">系统</li>
</ol>	
<style>
	.block-content .block{
  margin-bottom: 6px;
}
.nbcontent{
	padding:10px;
}
.informer {
  position: absolute;
  left: 90px;
  top: -36px;
  font-size: 40px;
  color: #FFF;
}
.informer .fo {
  font-size: 100px;
  line-height: 16px;
  -moz-opacity: 0.05;
  -khtml-opacity: 0.05;
  opacity: 0.05;
}
</style>
<!--内容-->
<?php  if($_W['isfounder']) { ?>

		<h2 class="content-heading"><span class="fa fa-arrow-circle-o-left"></span> 云服务</h2>
			<div class="content-grid push-20">
	            <div class="row">                         
	                <div class="col-xs-6 col-sm-4 col-lg-2">
	                    <a class="block block-link-hover2 text-center" href="<?php  echo url('system/site');?>">
	                        <div class="block-content block-content-full bg-primary nbcontent">
	                            <i class="fontello-icon-wrench-2 fa-3x text-white"></i>
	                            <div class="font-w600 text-white-op push-5-t">站点设置</div>
	                            <div class="informer informer-default dir-tr"><span class="fo fontello-icon-wrench-2"></span></div>
	                        </div>
	                    </a>
	                </div>   
                        <div class="col-xs-6 col-sm-4 col-lg-2">
	                    <a class="block block-link-hover2 text-center" href="<?php  echo url('system/attachment');?>">
	                        <div class="block-content block-content-full bg-primary nbcontent">
	                            <i class="fontello-icon-folder fa-3x text-white"></i>
	                            <div class="font-w600 text-white-op push-5-t">全局设置</div>
	                            <div class="informer informer-default dir-tr"><span class="fo fontello-icon-folder"></span></div>
	                        </div>
	                    </a>
	                </div>
                    <div class="col-xs-6 col-sm-4 col-lg-2">
	                    <a class="block block-link-hover2 text-center" href="<?php  echo url('extension/service/display');?>">
	                        <div class="block-content block-content-full bg-primary nbcontent">
	                            <i class="fontello-icon-link-3 fa-3x text-white"></i>
	                            <div class="font-w600 text-white-op push-5-t">常用服务</div>
	                            <div class="informer informer-default dir-tr"><span class="fo fontello-icon-link-3"></span></div>
	                        </div>
	                    </a>
	                </div>      
				</div>
		</div>
		<h2 class="content-heading"><span class="fa fa-arrow-circle-o-left"></span> 扩展</h2>
			<div class="content-grid push-20">
	            <div class="row">                         
	                <div class="col-xs-6 col-sm-4 col-lg-2">
	                    <a class="block block-link-hover2 text-center" href="<?php  echo url('extension/module');?>">
	                        <div class="block-content block-content-full bg-primary nbcontent">
	                            <i class="fontello-icon-flag-sw fa-3x text-white"></i>
	                            <div class="font-w600 text-white-op push-5-t">模块管理</div>
	                            <div class="informer informer-default dir-tr"><span class="fo fontello-icon-flag-sw"></span></div>
	                        </div>
	                    </a>
	                </div>
	                <div class="col-xs-6 col-sm-4 col-lg-2">
	                    <a class="block block-link-hover2 text-center" href="<?php  echo url('extension/theme');?>">
	                        <div class="block-content block-content-full bg-primary nbcontent">
	                            <i class="fontello-icon-signal-3 fa-3x text-white"></i>
	                            <div class="font-w600 text-white-op push-5-t">微站风格</div>
	                            <div class="informer informer-default dir-tr"><span class="fo fontello-icon-signal-3"></span></div>
	                        </div>
	                    </a>
	                </div>
	                <div class="col-xs-6 col-sm-4 col-lg-2">
	                    <a class="block block-link-hover2 text-center" href="<?php  echo url('extension/theme/web');?>">
	                        <div class="block-content block-content-full bg-primary nbcontent">
	                            <i class="fontello-icon-smashing fa-3x text-white"></i>
	                            <div class="font-w600 text-white-op push-5-t">后台皮肤</div>
	                            <div class="informer informer-default dir-tr"><span class="fo fontello-icon-smashing"></span></div>
	                        </div>
	                    </a>
	                </div>
	                <div class="col-xs-6 col-sm-4 col-lg-2">
	                    <a class="block block-link-hover2 text-center" href="<?php  echo url('extension/platform');?>">
	                        <div class="block-content block-content-full bg-primary nbcontent">
	                            <i class="fontello-icon-chat-empty fa-3x text-white"></i>
	                            <div class="font-w600 text-white-op push-5-t">微信开放平台</div>
	                            <div class="informer informer-default dir-tr"><span class="fo fontello-icon-chat-empty"></span></div>
	                        </div>
	                    </a>
	                </div>

	            </div>    
	        </div> 
		<h2 class="content-heading"><span class="fa fa-arrow-circle-o-left"></span> 公众号管理/文章/公告</h2>
			<div class="content-grid push-20">
	            <div class="row">                         
	                <div class="col-xs-6 col-sm-4 col-lg-2">
	                    <a class="block block-link-hover2 text-center" href="<?php  echo url('account/display');?>">
	                        <div class="block-content block-content-full bg-primary nbcontent">
	                            <i class="fontello-icon-list-bullet fa-3x text-white"></i>
	                            <div class="font-w600 text-white-op push-5-t">公众号列表</div>
	                            <div class="informer informer-default dir-tr"><span class="fo fontello-icon-list-bullet"></span></div>
	                        </div>
	                    </a>
	                </div>
	                <div class="col-xs-6 col-sm-4 col-lg-2">
	                    <a class="block block-link-hover2 text-center" href="<?php  echo url('account/groups');?>">
	                        <div class="block-content block-content-full bg-primary nbcontent">
	                            <i class="fontello-icon-chat-empty fa-3x text-white"></i>
	                            <div class="font-w600 text-white-op push-5-t">公众号服务套餐</div>
	                            <div class="informer informer-default dir-tr"><span class="fo fontello-icon-chat-empty"></span></div>
	                        </div>
	                    </a>
	                </div>
				        <div class="col-xs-6 col-sm-4 col-lg-2">
	                    <a class="block block-link-hover2 text-center" href="<?php  echo url('article/news');?>">
	                        <div class="block-content block-content-full bg-primary nbcontent">
	                            <i class="fontello-icon-docs fa-3x text-white"></i>
	                            <div class="font-w600 text-white-op push-5-t">文章管理</div>
	                            <div class="informer informer-default dir-tr"><span class="fo fontello-icon-docs"></span></div>
	                        </div>
	                    </a>
	                </div>
	                <div class="col-xs-6 col-sm-4 col-lg-2">
	                    <a class="block block-link-hover2 text-center" href="<?php  echo url('article/notice');?>">
	                        <div class="block-content block-content-full bg-primary nbcontent">
	                            <i class="fontello-icon-bullhorn fa-3x text-white"></i>
	                            <div class="font-w600 text-white-op push-5-t">公告管理</div>
	                            <div class="informer informer-default dir-tr"><span class="fo fontello-icon-bullhorn"></span></div>
	                        </div>
	                    </a>
	                </div>
				</div>
			</div>      
		<h2 class="content-heading"><span class="fa fa-arrow-circle-o-left"></span> 用户管理</h2>
			<div class="content-grid push-20">
	            <div class="row">                         
	                <div class="col-xs-6 col-sm-4 col-lg-2">
	                    <a class="block block-link-hover2 text-center" href="<?php  echo url('user/profile');?>">
	                        <div class="block-content block-content-full bg-primary nbcontent">
	                            <i class="fontello-icon-briefcase fa-3x text-white"></i>
	                            <div class="font-w600 text-white-op push-5-t">我的账户</div>
	                            <div class="informer informer-default dir-tr"><span class="fo fontello-icon-briefcase"></span></div>
	                        </div>
	                    </a>
	                </div>
	                <div class="col-xs-6 col-sm-4 col-lg-2">
	                    <a class="block block-link-hover2 text-center" href="<?php  echo url('user/display');?>">
	                        <div class="block-content block-content-full bg-primary nbcontent">
	                            <i class="fontello-icon-users fa-3x text-white"></i>
	                            <div class="font-w600 text-white-op push-5-t">用户管理</div>
	                            <div class="informer informer-default dir-tr"><span class="fo fontello-icon-users"></span></div>
	                        </div>
	                    </a>
	                </div>
	                <div class="col-xs-6 col-sm-4 col-lg-2">
	                    <a class="block block-link-hover2 text-center" href="<?php  echo url('user/group');?>">
	                        <div class="block-content block-content-full bg-primary nbcontent">
	                            <i class="fontello-icon-th-4 fa-3x text-white"></i>
	                            <div class="font-w600 text-white-op push-5-t">用户组管理</div>
	                            <div class="informer informer-default dir-tr"><span class="fo fontello-icon-th-4"></span></div>
	                        </div>
	                    </a>
	                </div>
	                <div class="col-xs-6 col-sm-4 col-lg-2">
	                    <a class="block block-link-hover2 text-center" href="<?php  echo url('user/registerset');?>">
	                        <div class="block-content block-content-full bg-primary nbcontent">
	                            <i class="fontello-icon-cog-4 fa-3x text-white"></i>
	                            <div class="font-w600 text-white-op push-5-t">用户设置</div>
	                            <div class="informer informer-default dir-tr"><span class="fo fontello-icon-cog-4"></span></div>
	                        </div>
	                    </a>
	                </div>

	        	</div>
	        </div>        

		<h2 class="content-heading"><span class="fa fa-arrow-circle-o-left"></span> 系统管理</h2>
			<div class="content-grid push-20">
	            <div class="row">  
					    <div class="col-xs-6 col-sm-4 col-lg-2">
	                    <a class="block block-link-hover2 text-center" href="<?php  echo url('system/updatecache');?>">
	                        <div class="block-content block-content-full bg-primary nbcontent">
	                            <i class="fontello-icon-arrows-cw-2 fa-3x text-white"></i>
	                            <div class="font-w600 text-white-op push-5-t">更新缓存</div>
	                            <div class="informer informer-default dir-tr"><span class="fo fontello-icon-arrows-cw-2"></span></div>
	                        </div>
	                    </a>
	                </div>     
						<div class="col-xs-6 col-sm-4 col-lg-2">
	                    <a class="block block-link-hover2 text-center" href="<?php  echo url('system/database');?>">
	                        <div class="block-content block-content-full bg-primary nbcontent">
	                            <i class="fontello-icon-database fa-3x text-white"></i>
	                            <div class="font-w600 text-white-op push-5-t">数据库</div>
	                            <div class="informer informer-default dir-tr"><span class="fo fontello-icon-database"></span></div>
	                        </div>
	                    </a>
	                </div>                     
	                <div class="col-xs-6 col-sm-4 col-lg-2">
	                    <a class="block block-link-hover2 text-center" href="<?php  echo url('system/tools');?>">
	                        <div class="block-content block-content-full bg-primary nbcontent">
	                            <i class="fontello-icon-wrench fa-3x text-white"></i>
	                            <div class="font-w600 text-white-op push-5-t">检测工具</div>
	                            <div class="informer informer-default dir-tr"><span class="fo fontello-icon-wrench"></span></div>
	                        </div>
	                    </a>
	                </div>
	                <div class="col-xs-6 col-sm-4 col-lg-2">
	                    <a class="block block-link-hover2 text-center" href="<?php  echo url('system/logs');?>">
	                        <div class="block-content block-content-full bg-primary nbcontent">
	                            <i class="fontello-icon-list-alt fa-3x text-white"></i>
	                            <div class="font-w600 text-white-op push-5-t">查看日志</div>
	                            <div class="informer informer-default dir-tr"><span class="fo fontello-icon-list-alt"></span></div>
	                        </div>
	                    </a>
	                </div>
	                <div class="col-xs-6 col-sm-4 col-lg-2">
	                    <a class="block block-link-hover2 text-center" href="<?php  echo url('system/optimize');?>">
	                        <div class="block-content block-content-full bg-primary nbcontent">
	                            <i class="fontello-icon-gauge fa-3x text-white"></i>
	                            <div class="font-w600 text-white-op push-5-t">性能优化</div>
	                            <div class="informer informer-default dir-tr"><span class="fo fontello-icon-gauge"></span></div>
	                        </div>
	                    </a>
	                </div>


	        	</div>
	        </div>


<?php  } else { ?>
		<h2 class="content-heading"><span class="fa fa-arrow-circle-o-left"></span> 公众号管理</h2>
			<div class="content-grid push-20">
	            <div class="row">                         
	                <div class="col-xs-6 col-sm-4 col-lg-2">
	                    <a class="block block-link-hover2 text-center" href="<?php  echo url('account/display');?>">
	                        <div class="block-content block-content-full bg-primary nbcontent">
	                            <i class="fontello-icon-list-bullet fa-3x text-white"></i>
	                            <div class="font-w600 text-white-op push-5-t">公众号列表</div>
	                            <div class="informer informer-default dir-tr"><span class="fo fontello-icon-list-bullet"></span></div>
	                        </div>
	                    </a>
	                </div>
			</div>
		</div>
		<h2 class="content-heading"><span class="fa fa-arrow-circle-o-left"></span> 用户管理</h2>
			<div class="content-grid push-20">
	            <div class="row">                         
	                <div class="col-xs-6 col-sm-4 col-lg-2">
	                    <a class="block block-link-hover2 text-center" href="<?php  echo url('user/profile');?>">
	                        <div class="block-content block-content-full bg-primary nbcontent">
	                            <i class="fontello-icon-briefcase fa-3x text-white"></i>
	                            <div class="font-w600 text-white-op push-5-t">我的账户</div>
	                            <div class="informer informer-default dir-tr"><span class="fo fontello-icon-briefcase"></span></div>
	                        </div>
	                    </a>
	                </div>

		</div>
	</div>
<?php  } ?>
<script type="text/javascript">
	require(['bootstrap'],function($){
		$('[data-toggle="tooltip"]').hover(function(){
			$(this).tooltip('show');
		},function(){
			$(this).tooltip('hide');
		});
	});
</script>
<?php (!empty($this) && $this instanceof WeModuleSite || 0) ? (include $this->template('common/footer-gw', TEMPLATE_INCLUDEPATH)) : (include template('common/footer-gw', TEMPLATE_INCLUDEPATH));?>