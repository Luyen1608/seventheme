<div post_id="<?php echo $id ?>"
    class="card okui-hyperlink okui-hyperlink-secondary okui-hyperlink-no-hover-underline okui-hyperlink-md
    okui-hyperlink-medium index_cardItem__KromG">
    <div class="okui-hyperlink-text index_linkClassName__K2uHU">
        <div class="index_cardHeader__TCRQK index_cardHeaderContent__QrpbG index_cardColFlex__DQYJQ">
            <div class="index_cardRowFlex__rCmsM index_spaceBetween__9R-cC">
                <div class="index_cardHeaderTitle__Rpqqe"><i
                        class="icon iconfont index_addWeight__Jgcgd okx-trading-strategy-dca index_iconStyle__jKaoO"></i>
                    <p class="index_botName__jb8QG">
                        <?php echo get_post_meta( $id, 'list_san_pham_bot', true)?>
                    </p>
                </div>
                <div data-testid="okd-popup"
                    class="okui-popup okui-popover okui-popover-sm index_collectTooltip__vgoOU">
                    <div><i
                            class="icon iconfont okds-star-filled index_addStyleWeight__mIetz index_itemNoCollect__3Pv3k"></i>
                    </div>
                </div>
            </div>
            <div class="index_cardRowFlex__rCmsM index_tagBox__fPfYa">
                <div class="index_cardRowFlex__rCmsM index_tagFlexWrap__wpe65"><span
                        class="index_botType__-mEys index_labelItem__tVxUe">Vốn tối thiểu
                        <?php echo get_post_meta($id, 'von_toi_thieu', true)?>M
                        lai
                    </span>
                    <span class="index_direction__VLWtT index_short__aJrkv">
                        <?php echo get_post_meta($id, 'khung_giao_dich', true)?>
                    </span>
                    <span class="winlose index_direction__VLWtT index_long__NB5H4">
                        <?php echo get_post_meta($id, 'risk_reward', true)?>
                    </span>
                </div>
                <div class="index_cardRowFlex__rCmsM index_copyInfo__1MXmR">
                    <div data-testid="okd-popup" class="okui-popup okui-popover okui-popover-sm  ">
                        <div class="index_copyInfoMain__t-Dt7"><i
                                class="icon iconfont okx-trading-user index_copyUserIcon__upkeS"></i><span>
                                <?php echo get_post_meta($id, 'so_nguoi_da_su_dung', true)?>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="index_cardRowFlex__rCmsM index_spaceBetween__9R-cC index_center__O4F0l index_pnl__tzTEI">
            <div class="index_cardColFlex__DQYJQ index_pnlWrapper__pjNcM"><span
                    class="index_pnlRatio__ugTgr index_up__9ikiT index_pnlRatioNum__Bpd4S">
                    <?php echo get_post_meta($id, 'loi_nhuan_trung_binh_nam', true)?>
                </span><span class="index_filedName__u6NnT">Lợi
                    nhuận trung bình/Năm</span></div>
            <div class="chart" data-chart="<?php echo get_post_meta($id, 'du_lieu_giao_dich', true); ?>"></div>
        </div>
        <div class="index_cardRowFlex__rCmsM index_spaceBetween__9R-cC index_info__udxxE">
            <div class="index_cardColFlex__DQYJQ index_cardColLeft__rE0jx index_cardParams__sbDLA">
                <span class="index_filedName__u6NnT index_infoName__IY4B0">Lợi nhuận
                    trung bình/Tháng</span>
                <?php echo get_post_meta($id, 'loi_nhuan_trung_binh_thang', true)?>
            </div>
            <div class="index_cardColFlex__DQYJQ index_cardColMid__cmVtM index_cardParams__sbDLA">
                <div data-testid="okd-popup" class="okui-popup okui-popover okui-popover-sm  ">
                    <div class="index_popoverInnerClassName__nEJXc">
                        <div><span class="index_filedName__u6NnT index_infoName__IY4B0 index_hasToolTip__zYHJy">Lợi
                                nhuận trung bình/Quý</span></div>
                    </div>
                </div>
                <?php echo get_post_meta($id, 'loi_nhuan_trung_binh_quy', true)?>
            </div>
            <div class="index_cardColFlex__DQYJQ index_cardColRight__lI2fd index_cardParams__sbDLA">
                <span class="index_filedName__u6NnT index_infoName__IY4B0 index_scale__YuyPZ">Lợi nhuận trung bình/lệnh</span>
                <?php echo get_post_meta($id, 'loi_nhuan_tblenh', true)?>
            </div>
        </div>
        <div class="index_ccyAndProfitSharing__eUz53">
            <div class="index_ccyGroupContainer__6JM0o">
                <div class="index_ccyItem__DBG-L">
                    <picture class="okui-image tc-ccy-img-box index_ccyItemImg__nV4RF">
                        <img class="okui-image-layout okui-image-layout-responsive"
                            src="../wp-content/uploads/2024/04/trophy-svgrepo-com.svg"
                            alt="ordi logo">
                    </picture><span style="color: var(--okd-color-text-amplifed);font-size: 14px;">Tỉ lệ
                        thắng</span>
                </div>
            </div>
            <div class="index_profitSharing__pRYsS">
                <div class="range" style="--p:<?php echo get_post_meta($id, 'ty_le_thang', true)?>">
                    <div class="range__label">&nbsp;</div>
                </div>
            </div>
        </div>
        <div class="index_cardRowFlex__rCmsM index_botCardFooter__hQ5sb">

            <div 
                class="index_cardColFlex__DQYJQ index_cardColLeft__rE0jx index_cardParams__sbDLA" style="display: -webkit-inline-box;">
                <div style="margin-right: 0px!important;" class="index_ccyItem__DBG-L">
                    <picture style="min-height: 33px;
            min-width: 32px;" class="okui-image tc-ccy-img-box index_ccyItemImg__nV4RF">
                        <img class="okui-image-layout okui-image-layout-responsive"
                            src="../wp-content/uploads/2024/04/money-cash-business-cart-finance-svgrepo-com.svg"
                            alt="ordi logo">
                    </picture>
                </div>
                <div style="display: inline-block;"
                    class="index_cardColFlex__DQYJQ index_cardColLeft__rE0jx index_cardParams__sbDLA">
                    <span class="index_filedName__u6NnT index_infoName__IY4B0 d-flex">Max
                        Drawdow</span>
					<span class="d-flex"><?php echo get_post_meta($id, 'max_drawdow', true)?></span>
                </div>
            </div>
			<a href="<?php echo  the_permalink();?>">
            <button type="button"
                class="okui-btn btn-md btn-fill-grey index_addWeight__Jgcgd index_addWight2__1Gpqb index_btn__m1IoE index_btnActive__mKKnN"><span
																																				  class="btn-content">Xem</span></button></a>
        </div>
</div>
</div>