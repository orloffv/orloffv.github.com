$(function () {
    var $jurl = $.jurlp();

    if ($jurl.host() == 'orloffv.ru' && $jurl.fragment() == '#sms')
    {
        showModal();
    }

    $("[data-sms]").click(function(e)
    {
        if ($jurl.host() != 'orloffv.ru')
        {
            $jurl.url("http://orloffv.ru/#sms");
            $jurl.goto();
        }
        else
        {
            showModal();
        }

        e.preventDefault();
    });

    function showModal()
    {
        $.get('sms/popup', function(data)
        {
            $('.modal-content', '#smsModal').html(data);
            $('#smsModal').modal();
        });
    }
});
