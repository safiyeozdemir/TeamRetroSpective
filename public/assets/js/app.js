$(function () {

    const tbodyTds = $('tbody tr td');

    $(".field-area textarea").keypress(function (e) {
        var code = (e.keyCode ? e.keyCode : e.which);
        //alert(code);
        if (code == 13) {

            tbodyTds.each((index, td) => {
                const tbodyTd = tbodyTds.eq(index);

                if(tbodyTd.data('topic-id') == $(this).data('topic-id'))
                {
                    tbodyTd.prepend('<section class="topic-idea animate__animated animate__fadeInDown">'+ $(this).val() + '</section>');

                }
            });
        }
    });
});