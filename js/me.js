$(function () {
    var $jurl = $.jurlp();
    $("[data-sms]").click(function()
    {
        if ($jurl.host() != 'orloffv.ru')
        {
            $jurl.url("http://orloffv.ru/sms/send");
            $jurl.goto();
        }
        else
        {
            $.get('sms/popup', function(data)
            {
                $('#modal-content', '#smsModal').html(data);
                $('#smsModal').modal();
            });
        }
    });
});