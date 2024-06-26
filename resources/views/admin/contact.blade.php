@extends('layout')
@section('content')

<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title">Liên hệ</h6>
        </div>
        <div class="pull-right">
            <div class="beta-breadcrumb font-large">
            </div>
        </div>
        <div class="clearfix"></div>
    </div>
</div>

</div>
<div class="container">
    <div id="content" class="space-top-none">
        <div class="space50">&nbsp;</div>
        <div class="row">
        <div class="col-sm-8">
    <div class="contact-form-wrapper">
        <h2>Liên Hệ</h2>
        <p>Nếu bạn có bất kỳ câu hỏi hoặc ý kiến nào, hãy gửi thông điệp cho chúng tôi bằng biểu mẫu dưới đây. Chúng tôi sẽ phản hồi lại bạn sớm nhất có thể.</p>

        <form action="{{ route('contact.store') }}" method="post" class="contact-form">
            @csrf
            <div class="form-group">
                <label for="your-name">Họ và Tên <span class="required">*</span></label>
                <input name="your-name" id="your-name" type="text" class="form-control" placeholder="Nhập họ và tên của bạn" required>
            </div>
            <div class="form-group">
                <label for="your-email">Email <span class="required">*</span></label>
                <input name="your-email" id="your-email" type="email" class="form-control" placeholder="Nhập địa chỉ email của bạn" required>
            </div>
            <div class="form-group">
                <label for="your-subject">Chủ Đề</label>
                <input name="your-subject" id="your-subject" type="text" class="form-control" placeholder="Nhập chủ đề">
            </div>
            <div class="form-group">
                <label for="your-message">Tin Nhắn <span class="required">*</span></label>
                <textarea name="your-message" id="your-message" class="form-control" rows="6" placeholder="Nhập tin nhắn của bạn" required></textarea>
            </div>
            <button type="submit" class="btn btn-primary">Gửi Tin Nhắn <i class="fa fa-chevron-right"></i></button>
        </form>
    </div>
</div>
    </div>
    </div>
</div>
@endsection

@section('js')
<script type="text/javascript">
    $(function() {
        var url = window.location.href;
        $(".main-menu a").each(function() {
            if (url == (this.href)) {
                $(this).closest("li").addClass("active");
                $(this).parents('li').addClass('parent-active');
            }
        });
    });

    jQuery(document).ready(function($) {
        'use strict';
        jQuery('#style-selector').animate({
            left: '-213px'
        });
        jQuery('#style-selector a.close').click(function(e) {
            e.preventDefault();
            var div = jQuery('#style-selector');
            if (div.css('left') === '-213px') {
                jQuery('#style-selector').animate({left: '0'
                });
                jQuery(this).removeClass('icon-angle-left');
                jQuery(this).addClass('icon-angle-right');
            } else {
                jQuery('#style-selector').animate({
                    left: '-213px'
                });
                jQuery(this).removeClass('icon-angle-right');
                jQuery(this).addClass('icon-angle-left');
            }
        });
    });
</script>
@endsection