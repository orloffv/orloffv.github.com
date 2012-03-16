<?php
session_start();

$security = $_SESSION['security'] = uniqid();
?>


<div class="modal-body">
    <div class="control-group">
        <label class="control-label" for="textarea">Сообщение</label>
        <div class="controls">
            <textarea class="input-xlarge" id="text" rows="3"></textarea>
        </div>
        <span class="help-inline"></span>
    </div>
</div>
<div class="modal-footer">
    <a href="#" class="btn btn-success" id="sendSms">Отправить</a>
    <a href="#" class="btn" data-dismiss="modal">Закрыть</a>
</div>

<script>
    $("#sendSms").click(function(){
        var message = $("textarea#text").val();

        if (message)
        {
            $.post('sms/send', {message : message, security : '<?=$security?>'}, function(data) {
                if (data.status == 'success')
                {
                    $(".help-inline", "#smsModal").html('');
                    $('#smsModal').modal('hide');
                }
                else
                {
                    $(".help-inline", "#smsModal").html('Ошибка!');
                }
            }, "json");
        }
        else
        {
            $(".help-inline", "#smsModal").html('Введите сообщение!');
        }

        return false;
    });
</script>