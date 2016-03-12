<?php
defined('ByShopWWI') or exit('Access Invalid!');
/**
 * 團購狀態 
 */
$lang['groupbuy_state_all'] = '全部團購';
$lang['groupbuy_state_verify'] = '未審核';
$lang['groupbuy_state_cancel'] = '已取消';
$lang['groupbuy_state_progress'] = '已通過';
$lang['groupbuy_state_fail'] = '審核失敗';
$lang['groupbuy_state_close'] = '已結束';

/**
 * 團購欄位
 **/
$lang['group_template'] = '團購活動';
$lang['group_template_tip'] = '選擇要參加的團購活動及時間段';
$lang['group_name'] = '團購名稱';
$lang['group_name_tip'] = '團購標題名稱長度最多可輸入30個字元';
$lang['group_goods_sel'] = '選擇商品';
$lang['group_help'] = '團購說明';
$lang['start_time'] = '開始時間';
$lang['end_time'] = '結束時間';
$lang['goods_price'] = '商品原價';
$lang['goods_storage'] = '商品庫存數';
$lang['store_price'] = '商城價';
$lang['groupbuy_price'] = '團購價格';
$lang['groupbuy_price_tip'] = '團購價格為該商品參加活動時的促銷價格<br/>必須是0.01~1000000之間的數字(單位：元)<br/>團購價格應包含郵費，團購商品系統預設不收取郵費';
$lang['limit_type'] = '限制類型';
$lang['virtual_quantity'] = '虛擬數量';
$lang['min_quantity'] = '成團數量';
$lang['sale_quantity'] = '限購數量';
$lang['max_num'] = '商品總數';
$lang['group_intro'] = '本團介紹';
$lang['group_pic'] = '團購圖片';
$lang['group_edit'] = '編輯內容';

$lang['groupbuy_class'] = '團購類別';
$lang['groupbuy_class_tip'] = '請選擇團購商品的所屬類別';
$lang['groupbuy_area'] = '所屬區域';
$lang['groupbuy_goods'] = '團購商品';
$lang['groupbuy_goods_explain'] = '點擊上方輸入框從已發佈商品中選擇要參加團購的商品<br/>如沒有找到您想要參加團購的商品，請重新發佈該商品後再選擇。';
$lang['min_quantity_explain'] = '團購成功的最低數值，預設為 "1"';
$lang['virtual_quantity_explain'] = '虛擬購買數量，只用於前台顯示，不影響成交記錄';
$lang['sale_quantity_explain'] = '每個買家ID可團購的最大數量，不限數量請填 "0"';
$lang['max_num_explain'] = '團購商品總數應等於或小於該商品庫存數量<br/>請提前確認要參與活動的商品庫存數量足夠充足';
$lang['group_pic_explain'] = '用於團購活動頁面展示的圖片,支持jpg、jpeg、gif、png格式上傳<br/>建議選擇尺寸480x350、大小1M內的圖片';
$lang['groupbuy_message_not_start'] = '團購活動尚未開始';
$lang['groupbuy_message_close'] = '團購活動已經結束';
$lang['groupbuy_message_start'] = '數量有限請您儘快下單';
$lang['groupbuy_message_success'] = '團購成功可繼續購買';

/**
 * 錯誤提示
 **/
$lang['groupbuy_unavailable'] = '團購功能沒有開啟';
$lang['no_groupbuy_template_in_progress'] = '沒有正在進行中的團購活動';
$lang['no_groupbuy_info'] = '沒有團購信息';
$lang['no_groupbuy_template_soon'] = '沒有即將開始的團購活動';
$lang['no_groupbuy_template_history'] = '沒有歷史團購活動';
$lang['no_groupbuy'] = '當前沒有團購信息';
$lang['param_error'] = '參數錯誤';
$lang['group_name_error'] = '團購名稱不能為空';
$lang['group_goods_error'] = '請選擇團購商品';
$lang['group_help_error'] = '團購說明不能為空';
$lang['start_time_error'] = '開始時間不能為空';
$lang['end_time_error'] = '結束時間不能為空';
$lang['groupbuy_price_error'] = '請輸入正確的團購價格';
$lang['group_pic_error'] = '團購圖片不能為空，且必須為jpg/gif/png格式';
$lang['min_quantity_error'] = '成團數量不能為空，且必須為大於0的整數';
$lang['virtual_quantity_error'] = '虛擬數量不能為空，且必須為整數';
$lang['sale_quantity_error'] = '限購數量不能為空，其必須為整數';
$lang['max_num_error'] = '商品總數不能為空，且必須小於當前庫存';
$lang['groupbuy_none'] = '平台當前沒有進行中的團購活動';
$lang['group_goods_is_exist'] = '該商品已經在本期團購活動中，請選擇其它商品';
$lang['goods_info'] = '商品信息';
$lang['buyer_list'] = '他們已經買了';
$lang['store_info'] = '店舖信息';
$lang['groupbuy_not_state'] = '團購活動尚未開始';
$lang['groupbuy_closed'] = '團購活動已經結束';
$lang['goods_not_enough'] = '商品庫存不足';
$lang['groupbuy_not_enough'] = '團購餘額不足';
$lang['groupbuy_sale_quantity'] = '您最多只能購買';
$lang['can_not_buy'] = '您不能購買自己發佈的商品';

$lang['groupbuy_add_success'] = '團購活動發佈成功請等待審核';
$lang['groupbuy_add_fail'] = '團購活動發佈失敗';
$lang['groupbuy_edit_success'] = '團購活動編輯成功';
$lang['groupbuy_edit_fail'] = '團購活動編輯失敗';

/**
 * 文字
 **/
$lang['groupbuy_title'] = '商品團購';
$lang['groupbuy_soon'] = '即將開始';
$lang['groupbuy_history'] = '往期團購';
$lang['text_year'] = '年';
$lang['text_month'] = '月';
$lang['text_day'] = '日';
$lang['text_tian'] = '天';
$lang['text_hour'] = '小時';
$lang['text_minute'] = '分';
$lang['text_second'] = '秒';
$lang['text_to'] = '至';
$lang['text_di'] = '第';
$lang['text_qi'] = '期';
$lang['text_groupbuy'] = '團購';
$lang['text_groupbuy_list'] = '團購列表';
$lang['text_groupbuy_detail'] = '團購詳情';
$lang['text_goods_price'] = '市場價';
$lang['text_zhe'] = '折';
$lang['text_discount'] = '折扣';
$lang['text_save'] = '節省';
$lang['groupbuy_buy'] = '我要團';
$lang['groupbuy_close'] = '已結束';
$lang['text_end_time'] = '距離本期結束';
$lang['text_start_time'] = '距離本期開始';
$lang['text_no_limit'] = '不限';
$lang['text_class'] = '分類';
$lang['text_price'] = '價格';
$lang['text_unit_price'] = '單價';
$lang['text_default'] = '預設';
$lang['text_sale'] = '銷量';
$lang['text_rebate'] = '折扣';
$lang['text_order'] = '排序';
$lang['text_country'] = '全國';
$lang['text_people'] = '人';
$lang['text_buy'] = '已購買';
$lang['text_jiangyu'] = '將於';
$lang['text_start'] = '準時開團';
$lang['see_store'] = '逛逛店舖';
$lang['see_goods'] = '查看商品';
$lang['to_see'] = '去看看';
$lang['history_hot'] = '往期熱銷排行';
$lang['current_hot'] = '本期熱門團購';
$lang['text_buyer'] = '買家';
$lang['text_buy_count'] = '購買數量';
$lang['text_buy_now'] = '立即購買';
$lang['text_buy_time'] = '下單時間';
$lang['text_piece'] = '件';
$lang['text_goods_buy'] = '本商品已被團購';
$lang['text_goods_store'] = '商品所在店舖';
$lang['text_goods_commend'] = '店舖推薦商品';
$lang['text_read_agree1'] = '我已閲讀';
$lang['text_read_agree2'] = '並同意';
$lang['text_agreement'] = '團購服務協議';
$lang['agree_must'] = '您必須同意本協議';
$lang['store_goods_album_insert_users_photo'] = '插入相冊圖片';
$lang['text_remain'] = '剩餘';

/**
 * index
 */
$lang['groupbuy_index_no_right']			= '您的店舖等級沒有此權限';
$lang['groupbuy_index_in_audit']			= '您的店舖等級正在審核中';
$lang['groupbuy_index_add_success']			= '添加團購活動成功';
$lang['groupbuy_index_add_fail']			= '添加團購活動失敗';
$lang['groupbuy_index_not_exists']			= '未找到團購活動';
$lang['groupbuy_index_modify_success']		= '修改團購活動成功';
$lang['groupbuy_index_modify_fail']			= '修改團購活動失敗';
$lang['groupbuy_index_default_spec']		= '預設規格';
$lang['groupbuy_index_all_group']			= '全部團購';
$lang['groupbuy_index_unpublish']			= '未發佈';
$lang['groupbuy_index_canceled']			= '已取消';
$lang['groupbuy_index_going']				= '進行中';
$lang['groupbuy_index_finished']			= '已完成';
$lang['groupbuy_index_ended']				= '已結束';
$lang['groupbuy_index_num']					= '(人數)';
$lang['groupbuy_index_amount']				= '(數量)';
$lang['groupbuy_index_desc']				= '說明';
$lang['groupbuy_index_order_num']			= '訂購數';
$lang['groupbuy_index_input_name']			= '請填寫團購名稱';
$lang['groupbuy_index_desc']				= '團購說明';
$lang['groupbuy_index_end_time']			= '結束時間';
$lang['groupbuy_index_search_first']		= '請先搜索團購商品';
$lang['groupbuy_index_input_right_num']		= '請正確填寫成團人數';
$lang['groupbuy_index_input_right_amount']	= '請正確填寫成團件數';
$lang['groupbuy_index_def_quantity_error']  = '請正確填寫已訂購數';
$lang['groupbuy_index_goods_sum_null']		= '商品總數不能為空';
$lang['groupbuy_index_goods_sum_one']		= '商品總數不能小於1';
$lang['groupbuy_index_input_right_price']	= '請正確填寫團購價格';
$lang['groupbuy_index_max_per_user_error']  = '請正確填寫每人限購數量';
$lang['groupbuy_index_input_price']			= '請填寫團購價格';
$lang['groupbuy_index_base_info']			= '團購基本信息';
$lang['groupbuy_index_activity_name']		= '活動名稱';
$lang['groupbuy_index_publish_now']			= '立即發佈';
$lang['groupbuy_index_yes']					= '是';
$lang['groupbuy_index_no']					= '否';
$lang['groupbuy_index_publish_tip']			= '如果“立即發佈”，除“團購說明”外的信息將不能再被更改';
$lang['groupbuy_index_start_time']			= '開始時間';
$lang['groupbuy_index_end_time']			= '結束時間';
$lang['groupbuy_index_goods_info']			= '團購商品信息';
$lang['groupbuy_index_choose_goods']		= '選擇商品';
$lang['groupbuy_index_order_num_now']		= '已訂購數';
$lang['groupbuy_index_order_num_published']	= '發佈後顯示的已訂購數';
$lang['groupbuy_index_condition']			= '限制條件';
$lang['groupbuy_index_by_num']				= '以購買成功人數成團';
$lang['groupbuy_index_by_amount']			= '以產品購買數量成團';
$lang['groupbuy_index_group_num']			= '成團人數';
$lang['groupbuy_index_group_espect_num']	= '能完成團購的期望訂購人數';
$lang['groupbuy_index_group_amount']		= '成團件數';
$lang['groupbuy_index_group_espect_amount']	= '能完成團購的期望訂購件數';
$lang['groupbuy_index_amount_limit']		= '每人限購';
$lang['groupbuy_index_amount_limit_tip']	= '每個參團者最多能訂購的件數，0為不限制';
$lang['groupbuy_index_goods_sum']			= '商品總數';
$lang['groupbuy_index_amount_max_limit']	= '所有參團者最多能訂購的數量，預設為商品庫存數';
$lang['groupbuy_index_intro']				= '本團介紹';
$lang['groupbuy_index_spec_price']			= '規格價格';
$lang['groupbuy_index_spec']				= '規格';
$lang['groupbuy_index_stock']				= '庫存';
$lang['groupbuy_index_store_price']			= '店舖價格';
$lang['groupbuy_index_group_price']			= '團購價';
$lang['groupbuy_index_search']				= '查詢';
$lang['groupbuy_index_submit']				= '提交';
$lang['groupbuy_index_new_group']			= '新增團購';
$lang['groupbuy_index_activity_state']		= '活動狀態';
$lang['groupbuy_index_start_time']			= '起始時間';
$lang['groupbuy_index_group_num']			= '已團購';
$lang['groupbuy_index_to']					= '至';
$lang['groupbuy_index_year']				= '年';
$lang['groupbuy_index_month']				= '月';
$lang['groupbuy_index_day']					= '日';
$lang['groupbuy_index_publish_tip']			= '發佈後除修改說明外不能再被編輯，您確定要發佈嗎';
$lang['groupbuy_index_publish']				= '發佈';
$lang['groupbuy_index_del_tip']				= '若該團購已完成，則刪除該團購將導致未下單的用戶無法下單，您確定要這麼做嗎';
$lang['groupbuy_index_order']				= '訂單';
$lang['groupbuy_index_order_state']			= '訂購情況';
$lang['groupbuy_index_finish_tip']			= '該操作將要把團購設置為成功狀態，您確定要結束預定嗎';
$lang['groupbuy_index_finish']				= '完成';
$lang['groupbuy_index_end']				    = '結束預定';
$lang['groupbuy_index_no_record']			= '沒有找到符合條件的商品';
$lang['groupbuy_index_loading_list']		= '正在加載商品列表';
$lang['groupbuy_index_no_goods']			= '沒有找到相關商品';
$lang['groupbuy_index_choose_goods']		= '選擇商品';
$lang['groupbuy_index_goods_name']			= '商品名稱';
$lang['groupbuy_index_store_class']			= '本店分類';
$lang['groupbuy_index_please_choose']		= '全部分類';
$lang['groupbuy_index_search_back']			= '請先從上面搜索';
$lang['groupbuy_index_publish_success']		= '發佈成功';
$lang['groupbuy_index_change_to_finish']		= '已更改狀態為完成';
$lang['groupbuy_index_group_canceled']			= '團購商品已取消';
$lang['groupbuy_index_modify_intro_success']	= '修改商品說明成功';
$lang['groupbuy_index_modify_order_num_sucess']	= '修改商品訂購數成功';
$lang['groupbuy_index_cancel_reason']			= '取消原因';
$lang['groupbuy_index_username']				= '用戶名';
$lang['groupbuy_index_linkman']					= '聯繫人';
$lang['groupbuy_index_phone']					= '聯繫電話';
$lang['groupbuy_index_jian']					= '件';
$lang['groupbuy_index_no_record_now']			= '暫無訂購記錄';
$lang['groupbuy_index_del_success']		= '刪除團購活動成功';
$lang['groupbuy_index_del_fail']		= '刪除團購活動失敗';
$lang['groupbuy_index_datefail']		= '日期不能小於當日，\n預設團購時間為7天！';
$lang['groupbuy_index_startdatefail']		= '團購開始時間不早于當日，\n預設團購開始時間為當日！';
