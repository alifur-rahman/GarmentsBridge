<?php $__env->startSection('title',\App\CPU\translate('Chatting Page')); ?>

<?php $__env->startPush('css_or_js'); ?>
    <style>

        .widget-categories .accordion-heading > a:hover {
            color: #FFD5A4 !important;
        }

        .widget-categories .accordion-heading > a {
            color: #FFD5A4;
        }

        body {
            font-family: 'Titillium Web', sans-serif
        }

        .card {
            border: none
        }

        .totals tr td {
            font-size: 13px
        }


        .product-qty span {
            font-size: 14px;
            color: #6A6A6A;
        }

        a {
            color: #030303;
            cursor: pointer;
        }

        a:hover {
            color: #4884ea;
            cursor: pointer;
        }

        .sidebarL h3:hover + .divider-role {
            border-bottom: 3px solid #1b7fed !important;
            transition: .2s ease-in-out;
        }

        img {
            max-width: 100%;
        }

        .inbox_people {
            background: #ffffff none repeat scroll 0 0;
            float: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;
            overflow: hidden;
            border- <?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>: 1px;
        }

        .inbox_msg {
            border: none;
            clear: both;
            overflow: hidden;
        }

        input {
            border: none;

        }

        .headind_srch {
            padding: <?php echo e(Session::get('direction') === "rtl" ? '10px 20px 10px 29px' : '10px 29px 10px 20px'); ?>;
            overflow: hidden;
            border-bottom: none;
        }

        .recent_heading h4 {
            color: #05728f;
            font-size: 21px;
            margin: auto;
        }

        .form-control {
            border: none;
            box-shadow: none;
        }


        .chat_ib h5 {
            font-size: 13px;
            color: #030303;
            cursor: pointer;
            margin: 0 0 8px 0;
        }

        .chat_ib h5 span {
            font-size: 80%;
            float: <?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>;
            padding: 10px;
            background: #4884ea;
            color: white;
            border-radius: 100%;
        }

        .chat_ib p {
            font-size: 14px;
            color: #989898;
            margin: auto
        }

        .chat_img {
            float: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;
            cursor: pointer;
        }

        .chat_ib {
            float: <?php echo e(Session::get('direction') === "rtl" ? 'right' : 'left'); ?>;
            padding: <?php echo e(Session::get('direction') === "rtl" ? '0 15px 3px 0' : '0 0 3px 15px'); ?>;
            margin-top: 0.56rem;
        }

        .chat_people {
            overflow: hidden;
            clear: both;
        }

        .chat_list {
            border-bottom: none;
            margin: 0;
            padding: 18px 16px 10px;
        }

        .inbox_chat {
            height: 510px;
            overflow-y: scroll;
        }

        .incoming_msg_img {
            width: 6%;
        }

        .received_msg {
            display: inline-block;
            padding: <?php echo e(Session::get('direction') === "rtl" ? '0 10px 0 0' : '0 0 0 10px'); ?>;
            vertical-align: top;
            width: 92%;
        }

        .received_withd_msg p {
            background: #E2F0FF none repeat scroll 0 0;
            border-radius: 10px;
            color: #030303;
            font-size: 14px;
            margin: 0;
            padding: <?php echo e(Session::get('direction') === "rtl" ? '4px 10px 3px 8px' : '4px 8px 3px 10px'); ?>;
            width: 100%;
        }

        .time_date {
            color: #747474;
            display: block;
            font-size: 12px;
            margin: 8px 0 0;
        }

        .received_withd_msg {
            width: 57%;
        }

        .mesgs {
            padding: <?php echo e(Session::get('direction') === "rtl" ? '30px 25px 0 15px' : '30px 15px 0 25px'); ?>;

        }

        .sent_msg p {
            background: #377dff none repeat scroll 0 0;
            border-radius: 8px;
            font-size: 14px;
            margin: 0;
            color: #fff;
            padding: <?php echo e(Session::get('direction') === "rtl" ? '5px 12px 5px 10px' : '5px 10px 5px 12px'); ?>;
            width: 100%;
        }

        .outgoing_msg {
            overflow: hidden;
            margin: 26px 7px 26px;
        }

        .sent_msg {
            float: <?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>;
            width: 46%;
        }

        .input_msg_write input {
            background: rgba(0, 0, 0, 0) none repeat scroll 0 0;
            border: medium none;
            color: #4c4c4c;
            font-size: 15px;
            min-height: 48px;
            width: 100%;
        }

        .type_msg {
            border-top: 1px solid #c4c4c4;
            position: relative;
        }

        .messaging {
            padding: 0 0 0 0;
        }

        .msg_history {
            height: 516px;
            overflow-y: auto;
        }

        .aSend {
            padding: 10px;
            color: #4884ea;
            font-size: 16px;
            font-weight: 600;
        }

        input#msgInputValue:focus {
            box-shadow: none;
        }

        input.form-control:focus {
            box-shadow: none !important;
        }

        html {
            scroll-behavior: smooth;
        }

        @media (max-width: 600px) {

            .sidebar_heading h1 {
                text-align: center;
                color: aliceblue;
                padding-bottom: 17px;
                font-size: 19px;
            }

            .Chat {
                margin-top: 2rem;
            }

            .mr-3 {
                margin-right: 0 !important
            }

            .sent_msg {
                margin- <?php echo e(Session::get('direction') === "rtl" ? 'left' : 'right'); ?>: 7px;
            }
        }

    </style>
<?php $__env->stopPush(); ?>

<?php $__env->startSection('content'); ?>
    <div class="content container-fluid">
        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-2">
            <h1 class="h3 mb-0 text-black-50"><?php echo e(\App\CPU\translate('Chatting List')); ?></h1>
        </div>

        <!-- Page Content-->
        <div class="row mt-3">

            <?php if(isset($chattings_user)): ?>
                <div class="col-lg-3 chatSel">
                    <div class="card box-shadow-sm">
                        <div class="inbox_people">
                            <div class="headind_srch">
                                <form
                                    class="form-inline d-flex justify-content-center md-form form-sm active-cyan-2 mt-2">
                                    <input
                                        class="form-control form-control-sm <?php echo e(Session::get('direction') === "rtl" ? 'ml-3' : 'mr-3'); ?> w-75"
                                        id="myInput" type="text"
                                        placeholder="<?php echo e(\App\CPU\translate('Search')); ?>"
                                        aria-label="Search">
                                    <i class="fa fa-search" style="color: #92C6FF" aria-hidden="true"></i>
                                </form>
                                <hr>
                            </div>
                            <div class="inbox_chat">
                                <?php $__currentLoopData = $chattings_user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $chatting): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <div class="chat_list <?php if($key == 0): ?> active <?php endif; ?>"
                                         id="user_<?php echo e($chatting->user_id); ?>">
                                        <div class="chat_people" id="chat_people">
                                            <div class="chat_img">
                                                <img src="<?php echo e(asset('storage/app/public/profile/'.$chatting->image)); ?>"
                                                     onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                     style="border-radius: 15px; width: 30px; height: 30px">
                                            </div>
                                            <div class="chat_ib">
                                                <h5 class="seller <?php if($chatting->seen_by_seller): ?>active-text <?php endif; ?>"
                                                    id="<?php echo e($chatting->user_id); ?>"><?php echo e($chatting->f_name); ?> <?php echo e($chatting->l_name); ?></h5>
                                            </div>
                                        </div>
                                    </div>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                </div>

                <section class="col-lg-8">
                    <div class="card box-shadow-sm Chat">
                        <div class="messaging">
                            <div class="inbox_msg">
                                <div class="mesgs">
                                    <div class="msg_history" id="show_msg">
                                        <?php $__currentLoopData = $chattings; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $message): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <?php if($message->sent_by_customer): ?>
                                                <div class="incoming_msg">
                                                    <div class="incoming_msg_img">
                                                        <img style="width: 30px;height: 30px;border-radius: 50%"
                                                             src="<?php echo e(asset('storage/app/public/profile/'.$message->image)); ?>"
                                                             onerror="this.src='<?php echo e(asset('public/assets/front-end/img/image-place-holder.png')); ?>'"
                                                             alt="">
                                                    </div>
                                                    <div class="received_msg">
                                                        <div class="received_withd_msg">
                                                            <p>
                                                                <?php echo e($message->message); ?>

                                                            </p>
                                                            <span class="time_date"> <?php echo e($message->created_at->format('h:i A')); ?>    |    <?php echo e($message->created_at->format('M d')); ?> </span>
                                                        </div>
                                                    </div>
                                                </div>
                                            <?php else: ?>
                                                <div class="outgoing_msg">
                                                    <div class="sent_msg">
                                                        <p>
                                                            <?php echo e($message->message); ?>

                                                        </p>
                                                        <span class="time_date"> <?php echo e($message->created_at->format('h:i A')); ?>    |    <?php echo e($message->created_at->format('M d')); ?> </span>
                                                    </div>
                                                </div>
                                            <?php endif; ?>
                                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </div>
                                    <div class="type_msg">
                                        <div class="input_msg_write">
                                            <form
                                                class="form-inline d-flex justify-content-center md-form form-sm active-cyan-2 mt-2"
                                                id="myForm">
                                                <?php echo csrf_field(); ?>
                                                <input type="text" id="hidden_value" hidden
                                                       value="<?php echo e($last_chat->user_id); ?>" name="">
                                                <input
                                                    class="form-control form-control-sm <?php echo e(Session::get('direction') === "rtl" ? 'ml-3' : 'mr-3'); ?> w-75"
                                                    id="msgInputValue"
                                                    type="text" placeholder="<?php echo e(\App\CPU\translate('Send a message')); ?>"
                                                    aria-label="Search">
                                                <input class="aSend" type="submit" id="msgSendBtn" style="width: 45px;"
                                                       value="Send">
                                                <i class="fa fa-send" style="color: #92C6FF" aria-hidden="true"></i>

                                            </form>
                                        </div>
                                    </div>
                                </div>

                            </div>
                        </div>
                    </div>

                </section>

            <?php else: ?>
                <div class="offset-md-1 col-md-10" style="display:flex; justify-content: center; align-items: center;">
                    <p><?php echo e(\App\CPU\translate('No conversation found')); ?></p>
                </div>
            <?php endif; ?>

        </div>


    </div>

<?php $__env->stopSection(); ?>

<?php $__env->startPush('script'); ?>
    <script>
        $(document).ready(function () {
            var user_id;

            $(".msg_history").stop().animate({scrollTop: $(".msg_history")[0].scrollHeight}, 1000);

            $(".seller").click(function (e) {
                e.stopPropagation();
                user_id = e.target.id;

                //active when click on seller
                $('.chat_list.active').removeClass('active');
                $(`#user_${user_id}`).addClass("active");
                $('.seller').css('color', 'black');
                $(`#user_${user_id} h5`).css('color', '#377dff');
                // $('.inbox_chat').find('h5.active-text').removeClass(".active-text");

                $.ajax({
                    type: "get",
                    url: "message-by-user?user_id=" + user_id,
                    success: function (data) {
                        $('.msg_history').html('');
                        $('.chat_ib').find('#' + user_id).removeClass('active-text');
                        $(".msg_history").stop().animate({scrollTop: $(".msg_history")[0].scrollHeight}, 1000);

                        if (data.length != 0) {
                            data.map((element, index) => {
                                let dateTime = new Date(element.created_at);
                                let month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

                                let time = dateTime.toLocaleTimeString().toLowerCase();
                                let date = month[dateTime.getMonth().toString()] + " " + dateTime.getDate().toString();

                                // let date = new Date(element.created_at);
                                // let newDate = date.toString('dd-MM-yy');

                                if (element.sent_by_seller) {
                                    $(".msg_history").append(`
                  <div class="outgoing_msg" id="outgoing_msg">
                    <div class='sent_msg'>
                      <p>${element.message}</p>
                      <span class='time_date'> ${time}    |    ${date}</span>
                    </div>
                  </div>`
                                    )

                                } else {
                                    $(".msg_history").append(`
                  <div class="incoming_msg" id="incoming_msg">
                    <div class="incoming_msg_img" id="">
                      <img src="${window.location.origin}/storage/app/public/profile/${element.image}" style="border-radius: 10px;" alt="">
                    </div>
                    <div class="received_msg">
                      <div class="received_withd_msg">
                        <p id="receive_msg">${element.message}</p>
                      <span class="time_date"> ${time}    |    ${date}</span></div>
                    </div>
                  </div>`
                                    )
                                }
                                $('#hidden_value').attr("value", user_id);
                            });
                        } else {
                            $(".msg_history").html(`<p> <?php echo e(\App\CPU\translate('No Message available')); ?> </p>`);
                            data = [];
                        }
                        data = "";
                        // $('.msg_history > div').remove();

                    }
                });

                // $('.msg_history').scrollTop($('.msg_history').height());
                $('.type_msg').css('display', 'block');

            });

            $("#myInput").on("keyup", function () {
                var value = $(this).val().toLowerCase();
                $(".chat_list").filter(function () {
                    $(this).toggle($(this).text().toLowerCase().indexOf(value) > -1)
                });
            });

            $("#msgSendBtn").click(function (e) {
                e.preventDefault();
                // get all the inputs into an array.
                var user_id = $('#hidden_value').val();
                var inputs = $('#myForm').find('#msgInputValue').val();

                let data = {
                    message: inputs,
                    user_id: user_id
                }

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="_token"]').attr('content')
                    }
                });

                $.ajax({
                    type: "post",
                    url: '<?php echo e(route('seller.messages.seller_message_store')); ?>',
                    data: data,
                    success: function (respons) {

                        let dateTime = new Date(respons.time);
                        let month = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];

                        let time = dateTime.toLocaleTimeString().toLowerCase();
                        let date = month[dateTime.getMonth().toString()] + " " + dateTime.getDate().toString();

                        $(".msg_history").append(`
              <div class="outgoing_msg" id="outgoing_msg">
                <div class='sent_msg'>
                  <p>${respons.message}</p>
                  <span class='time_date'> now </span>
                </div>
              </div>`
                        )
                    }
                });
                //scrolling
                $(".msg_history").stop().animate({scrollTop: $(".msg_history")[0].scrollHeight}, 200);
                //remove value from input box
                $('#myForm').find('#msgInputValue').val('');
            });
        });
    </script>

<?php $__env->stopPush(); ?>


<?php echo $__env->make('layouts.back-end.app-seller', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH E:\XAMMP\htdocs\GarmentsBridge\resources\views/seller-views/chatting/chat.blade.php ENDPATH**/ ?>