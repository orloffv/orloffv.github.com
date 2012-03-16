$(function () {
    var $jurl = $.jurlp();

    if ($jurl.host() == 'orloffv.ru' && $jurl.fragment() == '#sms')
    {
       modal();
    }

    $("[data-sms]").click(function()
    {
        if ($jurl.host() != 'orloffv.ru')
        {
            $jurl.url("http://orloffv.ru/#sms");
            $jurl.goto();
        }
        else
        {
            modal();
        }

        return false;
    });

    function modal()
    {
        $.get('sms/popup', function(data)
        {
            $('.modal-content', '#smsModal').html(data);
            $('#smsModal').modal();
        });
    }
});