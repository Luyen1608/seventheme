<?php
get_header();
// $plugin = ABSPATH."wp-content/plugins/Trading/";
// require ($plugin . "popup-handler.php");
?>
<div class="container luyendv" style="background:#00150f">
<!-- add luyendv -->
<div class=" " style="width: 800px;" >
    <div class="okui-dialog-title-container okui-dialog-header-line">
        <div class="okui-dialog-top-l okui-dialog-top-action-hidden"><i
                class="icon iconfont okui-dialog-top-action-hidden okds-arrow-chevron-left-centered-sm okui-dialog-b-btn"
                id="okdDialogBackBtn"></i></div>
      
    </div>
    <div class="index_main__CeYkl">
        <div class="index_topWrapper__J3H1X">
            <div class="index_mainInfo__lMAEM">
                <div class="index_nameInfo__n2iiS">
                    <div class="index_nameInfoPart__nQiSL"><i style="margin-left: -3px;"
                            class="icon iconfont index_addWeight__Jgcgd okx-trading-strategy-dca index_iconStyle__jKaoO"></i>
                        <p class="index_botName__l5a2o">
                            <?php echo get_post_meta(get_the_ID(), 'list_san_pham_bot', true)?></p>
                    </div>
                    <div class="index_nameInfoPart__nQiSL"><span class="index_botType__T0OCi">Vốn tối thiểu
                            <?php echo get_post_meta(get_the_ID(), 'von_toi_thieu', true)?></span><span
                            class="index_botType__T0OCi index_short__yuai7"><?php echo get_post_meta(get_the_ID(), 'khung_giao_dich', true)?></span><span
                            class="index_botType__T0OCi index_long__uEa5l winlose"><?php echo get_post_meta(get_the_ID(), 'risk_reward', true)?></span>
                    </div>
                </div>
            </div>
            <div class="index_followInfo__cdYRq">
                <div class="index_followAssets__X22Fm"><i
                        class="icon iconfont okx-trading-user index_followCountIcon__RO1K1"></i><span>Số nhà giao
                        dịch
                        bot:&nbsp;</span><span><?php echo get_post_meta(get_the_ID(), 'so_nguoi_da_su_dung', true)?></span>
                </div>
                <div class="index_followAssets__X22Fm">
                    <div class="index_img__+Xu3h">
                        <picture class="okui-image">
                            <source class="okui-image-picture-sizer" style="padding-top: 100%;">
                            <source
                                srcset="../../wp-content/uploads/2024/04/trophy-svgrepo-com.svg">
                            <img class="okui-image-layout okui-image-layout-responsive"
                                src="../../wp-content/uploads/2024/04/trophy-svgrepo-com.svg"
                                alt="Bot giao dịch OKX">
                        </picture>
                    </div><span>Tỉ lệ
                        thắng:&nbsp;</span><span><?php echo get_post_meta(get_the_ID(), 'ty_le_thang', true)?>%</span>
                </div>
            </div>
            <div class="index_leadTraderWrapper__OMfkn">
                <div class="index_item__Q9Xcj"><span class="index_title__qeWLM">Max Drawdow</span><span
                        class="index_detail__Yctcx"><object class="index_linkWrapper__iEON6">
                            <div
                                class="okui-hyperlink okui-hyperlink-secondary okui-hyperlink-no-hover-underline okui-hyperlink-md okui-hyperlink-muted index_content__-Yio2 index_contentClassName__ZHVuF">
                                <a href="/vi/copy-trading/account/C11FB4A4ED5C00D9?tab=bot" rel="noopener"
                                    target="_blank" class="okui-hyperlink-text index_linkClassName__N3o1X">
                                    <div class="index_img__+Xu3h">
                                        <picture class="okui-image">
                                            <source class="okui-image-picture-sizer" style="padding-top: 100%;">
                                            <source
                                                srcset="../../wp-content/uploads/2024/04/money-cash-business-cart-finance-svgrepo-com.svg">
                                            <img class="okui-image-layout okui-image-layout-responsive"
                                                src="../../wp-content/uploads/2024/04/money-cash-business-cart-finance-svgrepo-com.svg"
                                                alt="Bot giao dịch OKX">
                                        </picture>
                                    </div><span
                                        class="index_userName__KX1xz index_nameClassName__cFUZd"><?php echo get_post_meta(get_the_ID(), 'max_drawdow', true)?></span>
                                </a>
                            </div>
                        </object></span></div>
                <div class="index_item__Q9Xcj"><span class="index_title__qeWLM">Lợi nhuận trung bình
                        tháng</span><span
                        class="index_detail__Yctcx"><?php echo get_post_meta(get_the_ID(), 'loi_nhuan_trung_binh_thang', true)?></span>
                </div>
                <div class="index_item__Q9Xcj"><span class="index_title__qeWLM">Lợi nhuận trung bình Quý</span><span
                        class="index_detail__Yctcx"><?php echo get_post_meta(get_the_ID(), 'loi_nhuan_trung_binh_quy', true)?></span>
                </div>
                <div class="index_item__Q9Xcj"><span class="index_title__qeWLM">Lợi nhuận trung bình Năm</span><span
                        class="index_detail__Yctcx"><?php echo get_post_meta(get_the_ID(), 'loi_nhuan_trung_binh_nam', true)?></span>
                </div>
            </div>
        </div>
        <div class="index_content__5V0UF">
            <div class="index_contentMain__hNXjy">
                <div class="index_contentWrapper__lPn-s">
                    <div class="index_scrollBar__9ynKV">
                        <div class="okui-tabs ">
                            <div
                                class="okui-tabs-pane-list okui-tabs-pane-list-xs okui-tabs-pane-list-grey okui-tabs-pane-list-segmented">
                                <div class="okui-tabs-pane-list-wrapper segmented-special-style">
                                    <div class="okui-tabs-pane-list-nav">
                                        <div class="okui-tabs-pane-list-nav-icon icon-left  icon-hide"><i
                                                class="icon iconfont okds-arrow-chevron-right-centered-sm icon-left-inner"></i>
                                        </div>
                                        <div class="okui-tabs-pane-list-nav-icon icon-right  icon-hide"><i
                                                class="icon iconfont okds-arrow-chevron-right-centered-sm"></i>
                                        </div>
                                    </div>
                                    <div class="okui-tabs-pane-list-container okui-tabs-pane-list-average">
                                        <div class="okui-tabs-pane-list-flex-shrink okui-tabs-pane-list-flex">
                                            <div
                                                class="okui-tabs-pane okui-tabs-pane-xs okui-tabs-pane-grey okui-tabs-pane-segmented okui-tabs-pane-segmented-active ">
                                                Biểu đổ thông số</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="okui-tabs-panel-list">
                                <div class="okui-tabs-panel okui-tabs-panel-show">
                                    <div class="index_keyFieldBox__VeZSk">
                                        <div class="index_contentWrapper__FXJb-">
                                            <div>
                                                <div class="index_fieldsWrapper__TU8xC"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="index_profitInfoBox__lxTnt">
                                        <div class="index_profitInfoText__vlR-0">
                                            <div class="index_profitInfoTextMain__JWrLC"><span
                                                    class="index_profitValue__zIXGx index_up__Zdxhj"><?php echo get_post_meta($id, 'loi_nhuan_tblenh', true)?></span><span
                                                    class="index_profitLabel__65y8Z">PNL%</span>
                                            </div>
                                            <div id="chart11" data-chart="<?php echo get_post_meta($id, 'du_lieu_giao_dich', true);?>"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="index_contentWrapper__lPn-s">
                    <div class="index_scrollBar__9ynKV">
                        <div class="okui-tabs ">
                            <div
                                class="okui-tabs-pane-list okui-tabs-pane-list-xs okui-tabs-pane-list-grey okui-tabs-pane-list-segmented">
                                <div class="okui-tabs-pane-list-wrapper segmented-special-style">
                                    <div class="okui-tabs-pane-list-nav">
                                        <div class="okui-tabs-pane-list-nav-icon icon-left  icon-hide"><i
                                                class="icon iconfont okds-arrow-chevron-right-centered-sm icon-left-inner"></i>
                                        </div>
                                        <div class="okui-tabs-pane-list-nav-icon icon-right  icon-hide"><i
                                                class="icon iconfont okds-arrow-chevron-right-centered-sm"></i>
                                        </div>
                                    </div>
                                    <div class="okui-tabs-pane-list-container okui-tabs-pane-list-average">
                                        <div class="okui-tabs-pane-list-flex-shrink okui-tabs-pane-list-flex">
                                            <div
                                                class="okui-tabs-pane okui-tabs-pane-xs okui-tabs-pane-grey okui-tabs-pane-segmented okui-tabs-pane-segmented-active">
                                                Thông tin cơ bản</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="okui-tabs-panel-list">
                                <div class="okui-tabs-panel okui-tabs-panel-show">
                                    <div class="index_fieldBox__PD8Gz">
                                        <div class="index_contentWrapper__FXJb-">
                                            <div>
                                                <div class="index_fieldsWrapper__TU8xC">
                                                    <div class="index_field__ChY21"><span
                                                            class="index_fieldLabel__FqYJE">Thời gian hoạt
                                                            động</span><span
                                                            class="index_fieldValue__1BeeA">
                                                            <?php 
                                                                echo get_field('thong_tin_co_ban', $id)['thoi_gian_hoat_dong']
                                                            ?></span>
                                                    </div>
                                                    <div class="index_field__ChY21"><span
                                                            class="index_fieldLabel__FqYJE">Mức sụt giảm tối đa
                                                            trong 7 ngày</span><span
                                                            class="index_fieldValue__1BeeA"><?php echo get_field('thong_tin_co_ban', $id)['muc_sut_giam_toi_da_trong_7_ngay']?></span>
                                                    </div>
                                                    <div class="index_field__ChY21"><span
                                                            class="index_fieldLabel__FqYJE">Hướng | Đòn
                                                            bẩy</span><span class="index_fieldValue__1BeeA">
                                                            <div class="index_up__glSfD">
                                                                <?php echo get_field('thong_tin_co_ban', $id)['huong_don_bay']?></div>
                                                        </span></div>
                                                    <div class="index_field__ChY21"><span
                                                            class="index_fieldLabel__FqYJE">Số tiền ban
                                                            đầu</span><span
                                                            class="index_fieldValue__1BeeA"><?php echo $basic_info['so_tien_ban_dau']?></span>
                                                    </div>
                                                    <div class="index_field__ChY21"><span
                                                            class="index_fieldLabel__FqYJE">Lời và
                                                            lỗ</span><span
                                                            class="index_fieldValue__1BeeA"><span><?php echo $basic_info['loi_va_lo']?></span><span
                                                                class="index_profitValue__tOnkG index_up__8YqQA"><?php echo $basic_info['loi_va_lo']?></span></span>
                                                    </div>
                                                    <div class="index_field__ChY21"><span
                                                            class="index_fieldLabel__FqYJE">Giá khởi
                                                            điểm</span><span
                                                            class="index_fieldValue__1BeeA"><?php echo $basic_info['gia_khoi_diem']?></span>
                                                    </div>
                                                    <div class="index_field__ChY21"><span
                                                            class="index_fieldLabel__FqYJE">Lời và lỗ khả
                                                            biến</span><span
                                                            class="index_fieldValue__1BeeA"><?php echo $basic_info['loi_va_lo_kha_bien']?></span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- end add luyendv -->
<?php  echo  the_title();?>
<?php echo  the_content();?>
</div>
<?php  get_footer();